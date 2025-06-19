function campaignpromotionautoActive() {
    // do event listener for data-type="automatic"
    document.querySelector('[data-type="automatic"]').addEventListener('click', function() {
        campaignpromotionautoSubmitHandler('automatic')
    });

    // do event listener for data-type="manual"
    document.querySelector('[data-type="manual"]').addEventListener('click', function() {
        // router.navigate('/campaign/setup/edit')
        campaignpromotionautoSubmitHandler('manual')
    });

    // did('goback').addEventListener('click', e=>{
    //     e.preventDefault();
    //     // did('automate').classList.add('hidden');
    //     // did('firstcard').classList.remove('hidden');
    // })

}

function campaignpromotionautoSubmitHandler(ptype) {
    const params = JSON.parse(sessionStorage.getItem('c-params'))
    params.promotionType = ptype
     
    sessionStorage.setItem('c-params', JSON.stringify(params)) 
    if(params.campaignMedium == 'sms')router.navigate('/campaign/setup/edit')   
    if(params.campaignMedium == 'whatsapp')router.navigate('/campaign/setup/edit/whatsapp')   
}