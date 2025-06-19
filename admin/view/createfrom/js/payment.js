









let unitParams = [];


async function paymentActive() {
    
    const queryParams = getQueryParams(window.location.href)
    let paramsStored = sessionStorage.setItem("unitParams", JSON.stringify(queryParams));
    unitParams.push(JSON.parse(sessionStorage.getItem("unitParams")));
    // if(!['sms'].includes(queryParams.module)) {
    //     history.back()
    //     return
    // }
    
    //   if(!['whatsapp'].includes(queryParams.module)) {
    //     history.back()
    //     return
    // }
    
    if(queryParams.module == 'sms') {
        await fetchSmsPackage(queryParams.packagename)
    }else if(queryParams.module == 'whatsapp'){
        await fetchWhatsappPackage(queryParams.packagename)
    }
}

async function fetchSmsPackage(packageName, returnResponse=false) {
    const queryParams = getQueryParams(window.location.href)
    let payload = new FormData()
    payload.append('packagename', packageName)
    
    let request = await httpRequest('https://comeandsee.com.ng/kreativerock/admin/controllers/packages/sms/fetch', packageName ? payload : null, null, 'json')
    if(request.status) {
        const selectedPackage = request.data.find( item => item.packagename == queryParams.packagename)
        if(returnResponse) return selectedPackage
        
        const amount = parseFloat(selectedPackage.costperunit) * parseInt(queryParams.qty);
        addPaymentMethods(amount)
    } else return notification('Encountered some error!', 0)
}



async function fetchWhatsappPackage(packageName, returnResponse=false) {
    const queryParams = getQueryParams(window.location.href)
    let payload = new FormData()
    payload.append('packagename', packageName)
    
    let request = await httpRequest('https://comeandsee.com.ng/kreativerock/admin/controllers/packages/whatsapp/fetch', packageName ? payload : null, null, 'json')
    if(request.status) {
        const selectedPackage = request.data.find( item => item.packagename == queryParams.packagename)
        if(returnResponse) return selectedPackage
        
        const amount = parseFloat(selectedPackage.costperunit) * parseInt(queryParams.qty);
        addPaymentMethods(amount)
    } else return notification('Encountered some error!', 0)
}



function addPaymentMethods(totalAmount) { 
    let paymentMethods = [
        {
            name: "FlutterWave",
            logo: "./images/flutterwave.png",
        },
        {
            name: "Paystack",
            logo: "./images/paystack.png",
            disabled: true
        },
    ]
    
    const methods = paymentMethods.map( (item, index) => `
        <div name="${item.name}" selected="${index == 0 && 'true'}" class="${ item.disabled && 'opacity-30 !cursor-not-allowed grayscale'} flex items-center gap-3 hover:bg-green-50 hover:border-gray-300 border border-transparent p-3 rounded-md cursor-pointer transition ${index == 0 && 'bg-white !border-green-500'}">
            <span class="rounded-full h-10 w-10 flex items-center justify-center bg-cover bg-center bg-white" style="background-image:url(${item.logo})"></span>
            <h4 class="font-bold">Pay with ${item.name} </h4>
        </div>
    `).join('')
    
    document.querySelector('[name="content"]').innerHTML = `
        <div class="flex flex-col p-5 bg-white">${methods}</div>
        <div class="p-3 mt-5 bg-green-100 border border-green-400 text-green-700 rounded-md flex gap-2">
            <span class="material-symbols-outlined">info</span>
            <p class="text-sm">You will be redirected to a third-party site to complete your payment.</p>
        </div>
    `
    if(document.querySelector('button#pay')) {
        document.querySelector('button#pay').addEventListener('click', paymentSubmitHandler);
        document.querySelector('button#pay').removeAttribute('disabled')
        document.querySelector('button#pay').innerHTML = `Pay ${formatCurrency(totalAmount)}`
        
    }
    selectPaymentMethod()
}

function selectPaymentMethod() {
    const paymentMethods = document.querySelector('[name="content"]').firstElementChild;

    Array.from(paymentMethods.children).forEach(method => {
        method.addEventListener('click', function (e) {
            Array.from(paymentMethods.children).forEach(m => {
                m.classList.remove('bg-white', '!border-green-500');
                m.classList.add('hover:bg-green-50', 'hover:border-gray-300');
                m.removeAttribute('selected')
            });

            this.classList.add('bg-white', '!border-green-500');
            this.classList.remove('hover:bg-green-50', 'hover:border-gray-300');
            this.setAttribute('selected', true)
        });
    });
}


async function paymentSubmitHandler() {
    const payload = await getPayloadData()
    const queryParams = getQueryParams(window.location.href)
    
    const paymentMethods = document.querySelector('[name="content"]').firstElementChild
    const selected = paymentMethods.querySelector('[selected="true"]')
    const payBtn = document.querySelector('button#pay')
    let request;
    
    if(selected.getAttribute('name') == 'FlutterWave' && unitParams[0].module == "sms"){
        request =  await httpRequest('https://comeandsee.com.ng/kreativerock/admin/controllers/sms/checkoutsms', payload,  payBtn)
    } else if(selected.getAttribute('name') == 'FlutterWave' && unitParams[0].module =='whatsapp'){
        request =  await httpRequest('https://comeandsee.com.ng/kreativerock/admin/controllers/whatsapp/checkout', payload,  payBtn)
    } else return notification('Payment Option Selected is not available', 0)

    if(!request) {
        return notification('Sorry! We are unable to initiate this transaction', 0)
    }
   
    
    location.assign(request.data.data.link)
    sessionStorage.removeItem("unitParams");
    unitParams = []
}

async function getPayloadData() {
    const queryParams = getQueryParams(window.location.href)
    let data ;
    
    if(queryParams.module == 'sms') {
        let request =  await fetchSmsPackage(queryParams.package, true);
        let getUserInfo = await fetch('https://comeandsee.com.ng/kreativerock/admin/controllers/fetchuserprofile');
        let fetchedUser = await getUserInfo.json();
        data = {
            user: fetchedUser.email,
            packageid: request.id,
            qty: queryParams.qty,
            amount: parseFloat(request.costperunit) * parseInt(queryParams.qty),
            callback: location.origin + BASE_HREF + `/payment/confirmation?module=${ encodeURIComponent(queryParams.module) }&service=${ encodeURIComponent(queryParams.service) }`
        }
    }else if(queryParams.module == 'whatsapp') {
        let request =  await fetchWhatsappPackage(queryParams.package, true);
        let getUserInfo = await fetch('https://comeandsee.com.ng/kreativerock/admin/controllers/fetchuserprofile');
        let fetchedUser = await getUserInfo.json();
        data = {
            user: fetchedUser.email,
            packageid: request.id,
            qty: queryParams.qty,
            amount: parseFloat(request.costperunit) * parseInt(queryParams.qty),
            callback: location.origin + BASE_HREF + `/payment/confirmation?module=${ encodeURIComponent(queryParams.module) }&service=${ encodeURIComponent(queryParams.service) }`
        }
    }
    
    const payload = new FormData();
    for (let key in data) {
        if (data.hasOwnProperty(key)) {
            payload.append(key, data[key]);
        }
    }
    
    return payload;
}

