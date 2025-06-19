function campaignoptionsActive() {
    const optionsContainer = document.querySelector('[name="options"]')

    if(sessionStorage.getItem('c-params'))sessionStorage.removeItem('c-params')
    
    Array.from(optionsContainer.children).forEach( item => {
        item.addEventListener('click', e => selectCampaignOption(e))
    })

    // do event listener for data-type="sms" and data-type="whatsapp"
    document.querySelector('[data-type="sms"]').addEventListener('click', function() {
        campaignoptionsSubmitHandler('sms')
        
   
    });

    // do event listener for data-type="whatsapp"
    document.querySelector('[data-type="whatsapp"]').addEventListener('click', function() {
        campaignoptionsSubmitHandler('whatsapp')
       
        
       
    });

}

function campaignoptionsSubmitHandler(mediumer) {
    const params = JSON.parse(sessionStorage.getItem('c-params'))??{}
    console.log('mediumer', mediumer)   
    if(mediumer)params.campaignMedium = mediumer
    
    sessionStorage.setItem('c-params', JSON.stringify(params))
    did('options').classList.remove('hidden')
    did('medium-options').classList.add('hidden')
}

function selectCampaignOption(event) {
    const params = JSON.parse(sessionStorage.getItem('c-params'))??{}
    const selected = event.currentTarget
    console.log(selected);
    params.campaignType = selected.dataset.type

    
    if(!selected.dataset.type) {
        notification('Select a valid campaign type')
        return
    }
    
    sessionStorage.setItem('c-params', JSON.stringify(params));
    if(params.campaignType == 'transactional') return router.navigate('/campaign/transactional');
    return router.navigate('/campaign/setup/name');
}