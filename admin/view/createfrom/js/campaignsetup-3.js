// let contacts = new Set()

async function campaignSetup3Active() {
    const campaignParams = JSON.parse(sessionStorage.getItem('c-params'))

    const params = JSON.parse(sessionStorage.getItem('c-params'))
 
    if(params.promotionType == 'automatic')did('submitcampaign').innerHTML = 'Next'
    else did('submitcampaign').innerHTML = 'Create Campaign'
    
    document.querySelector('[name="campaignname"]').innerText = campaignParams.campaignname
    
    const messageInput = document.querySelector('[name="message"]')
    messageInput.addEventListener('keyup', function() {
        const message = this.value?.trim()
        // const content = message.length == 0 ? "Here's a short preview from a message that came in." : message.length > 40 ? message.slice(0, 39) + '...' : message
        const content = message.length == 0 ? "Here's a short preview from a message that came in." : message
        document.querySelector('[name="inbox-message"]').textContent = content;
    })
    
    const senderInput = document.querySelector('[name="sender"]')
    senderInput.addEventListener('keyup', function() {
        const sender = this.value?.trim() 
        const content = sender.length == 0 ? "Sender" : sender.length > 10 ? sender.slice(0, 9) + '...' : sender
        document.querySelector('[name="inbox-sender"]').textContent = content
         // i want it to take the first leter of the first word of the content and check if there is space and take the first letter of the second word and make it uppercase both
        const firstWord = content.split(' ')[0]
        const secondWord = content.split(' ')[1]
        const firstLetter = firstWord ? firstWord.charAt(0).toUpperCase() : ''
        const secondLetter = secondWord ? secondWord.charAt(0).toUpperCase() : ''
        console.log('content', content, 'firstWord', firstWord, 'secondWord', secondWord, 'firstLetter', firstLetter, 'secondLetter', secondLetter)
        document.querySelector('[name="short-sender"]').textContent = firstLetter + secondLetter;
    })
    
    const scheduleOptions = document.querySelector('[name="schedule-options"]').children
    Array.from(scheduleOptions).forEach( item => item.addEventListener('click', function() {
        selectSchedule(this)
    }))
    
    const submitBtns = document.querySelectorAll('[name="submit"]')
    Array.from(submitBtns).forEach( item => item.addEventListener('click', function() {
        createCampaign3(this)
    }))
    
    // fetchContacts()

    await getAllSegments('segment')

    new TomSelect('#segment', {
        plugins: ['remove_button', 'dropdown_input']
    })
}

function showOption(option) {
    document.getElementById('contacts-section').classList.add('hidden');
    document.getElementById('segment-section').classList.add('hidden');

    if (option === 'contacts') {
        document.getElementById('contacts-section').classList.remove('hidden');
    } else if (option === 'segment') {
        document.getElementById('segment-section').classList.remove('hidden');
    }
}

async function createCampaign3(btn) {
    if(!validateContactForm()) {
        return
    }
    
    const payload = getCampaignFormData()

    
    const params = JSON.parse(sessionStorage.getItem('c-params'))
    params.payload = JSON.parse(payload)
    // put the payload in the sessiondata
    sessionStorage.setItem('c-params', JSON.stringify(params))
 
    if(params.promotionType == 'automatic')router.navigate('/campaign/setup/prompt')


    // save it to the sessiondata


    
    const request = await httpRequest('../../admin/controllers/campaign/create', payload, btn)
    
    if(!request.status) {
        notification(request.message ?? 'Sorry! Unable to create campaign', 0)
        return
    }else{
        return notification(request.message, 1)
    }
    
    notification('Sorry! Unable to create campaign', 1)
}

function getCampaignFormData() {
    const campaignParams = JSON.parse(sessionStorage.getItem('c-params'))
    const contactsContainer = document.querySelector('[name="contacts-selected"]')
    const contacts = did('segment').tomselect.getValue();
    const scheduled = document.querySelector('[name="schedule-options"] .selected').dataset.schedule
    const messageInput = document.querySelector('[name="message"]')
    const senderInput = document.querySelector('[name="sender"]')
    const scheduleDateInput = document.querySelector('[name="scheduledate"]')
    const repeatcampaign = document.querySelector('[name="repeatcampaign"]')
    
    const params = {
        campaigntype: campaignParams.campaignType,
        campaignname: campaignParams.campaignname,
        sender: senderInput.value.trim(),
        campaignmessage: messageInput.value.trim(),
        smspages: calculateSmsPages(messageInput.value.trim()),
        contacts,
        scheduled,
        scheduledDate: scheduled == 'NOW' ? null : scheduleDateInput.value,
        repeatcampaign: repeatcampaign.value
    }
    
    return JSON.stringify(params)
}

function calculateSmsPages(text) {
    const maxCharsPerSms = 160; 
    const totalChars = text.length;
    return Math.ceil(totalChars / maxCharsPerSms);
}


function validateContactForm() {
    let error = 0
    
    const senderInput = document.querySelector('[name="sender"]')
    if(senderInput.value < 1) {
        error +=  1
        senderInput.classList.add('!border-red-500')
    } else {
        senderInput.classList.remove('!border-red-500')
    }
    
    const messageInput = document.querySelector('[name="message"]')
    if(messageInput.value < 1) {
        error +=  1
        messageInput.parentElement.parentElement.parentElement.classList.add('!border-red-500')
    } else {
        messageInput.parentElement.parentElement.parentElement.classList.remove('!border-red-500')
    }
    
    // const contacts = document.querySelector('[name="contacts-selected"]')
    // if(!Array.from(contacts.querySelectorAll('.item')).length) {
    //     error +=  1
    //     contacts.classList.add('!border-red-500')
    // } else {
    //     contacts.classList.remove('!border-red-500')
    // }

    if(error > 0) {
        console.log('Please edit your campaign!', error)
        notification('Please edit your campaign!', 0)
        return false
    }
    

    return true
}
 
function selectSchedule(child) {
    Array.from(document.querySelector('[name="schedule-options"]').children).forEach( item =>  {
        item.classList.remove('selected', 'border-amber-500')
    })
    
    child.classList.add('selected', 'border-amber-500')
}

async function fetchContacts() {
    const request = await fetchContactsGroup()

    if(!request.length) {
        return
    }
    
    const contactMaps = request.map( item => {
        const params = getContactsIdParams(item.contactsid)
        
        return `
            <div class="flex py-2 gap-2" data-id="${ item.contactsid }">
                <span class="h-8 w-8 rounded-full flex items-center justify-center">
                    <input onchange="selectContact(event)" type="checkbox" class="appearance-none !outline-none !ring-0 rounded">
                </span>
                <div>
                    <div class="text-sm">${ params.date }  - ${ params.time }</div>
                    <div class="font-medium">${ item.group.length } Contacts</div>
                </div>
            </div>
        `
    })
    
    document.querySelector('[name="contacts-list"]').innerHTML = contactMaps
}


function getContactsIdParams(idString) {
    const spl = idString.split('|')

    return  {
        date: new Date(spl[0]).toLocaleDateString(),
        time: new Date(spl.slice(0, 1).join(':')).toLocaleTimeString(),
        contact: parseFloat(spl.pop()).toLocaleString('en-US')
    }
    
}

function selectContact(event) {
    event.stopPropagation()
    const input = event.currentTarget
    const selectionContainer = document.querySelector('[name="contacts-selected"]')
    const contactid = input.parentElement.parentElement.dataset.id
    
    if(!input.checked) {
        contacts.delete(contactid)
        selectionContainer.querySelector(`[data-id="${ contactid }"]`).remove()
        return
    }
    
    contacts.add(contactid)
    const params = getContactsIdParams(contactid)
    
    const badge = `
        <span onclick="unselectContact(event)" data-id="${ contactid }" class="item inline-flex items-center gap-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-primary/25 text-primary-800">
            ${ params.contact } Contacts 
            <button type="button" class="flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-primary hover:bg-primary-200 hover:text-primary focus:outline-none focus:bg-primary-200 focus:text-primary">
                <span class="sr-only">Remove badge</span>
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                </svg>
            </button>
        </span>
    `
    
    selectionContainer.innerHTML += badge
}


function unselectContact(event) {
    event.stopPropagation()
    
    const el = event.currentTarget
    const contactid = el.dataset.id
    
    contacts.delete(contactid)
    document.querySelector(`[name="contacts-list"] [data-id="${contactid}"] input`).checked = false;
    el.remove()
}

function openContacts() {
    document.querySelector('[data-hs-overlay="#overlay-right"]').click()
}

function closeContacts() {
    document.querySelector('[data-hs-overlay="#overlay-right"]').click()
}

function contactsMock() {
    return {
        status: true,
        data: [
          {
            id: null,
            contactId: 1,
            userId: 1,
            type: "FORM",
            contactsid: "2024-12-30|21:03:12|344455",
            email: "jobsonokosun@gmail.com",
            firstname: "oreva",
            lastname: "orior",
            createdAt: "2024-12-30 22:03:12",
            sms: "+2347053127291",
            whatsapp: "+2347053127291",
            landline: "+2347053127291"
          },
          {
            id: null,
            contactId: 1,
            userId: 1,
            type: "FORM",
            contactsid: "2024-12-30|21:04:12|368885",
            email: "jobsonokosun@gmail.com",
            firstname: "oreva",
            lastname: "orior",
            createdAt: "2024-12-30 22:04:12",
            sms: "+2347053127291",
            whatsapp: "+2347053127291",
            landline: "+2347053127291"
          },
          {
            id: null,
            contactsId: 1,
            userId: 1,
            type: "FILE",
            contactsid: "2024-12-30|23:23:12|50",
            email: "kemi@example.com",
            firstname: "Kemi",
            lastname: "Adebayo",
            createdAt: "2024-12-31 00:23:12",
            sms: "+2348109876543",
            whatsapp: "+2348109876543",
            landline: "+2348109876543"
          },

        ]
    }
}

