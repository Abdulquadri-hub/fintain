let whatzappPackageId;
async function whatsapppackagesActive() {
    const form = document.querySelector('#whatsapppackageform')
    if(form.querySelector('#whatsapppackage-submit')) form.querySelector('#whatsapppackage-submit').addEventListener('click', whatsaappPackageSubmitHandler)
    datasource = []
    await fetchWhatsappPackages()
}

async function onWhatsappPackageTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => {
        return `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.index + 1 }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.packagename }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.numberofunits } </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"> ${ formatCurrency(item.costperunit) } </td>
                <td class="flex items-center gap-3 mt-2">
                    <button title="Edit row entry" onclick="editwhatsappPackageSubmitHandler('${item.id}')" id="openDialog" class="material-symbols-outlined rounded-full bg-blue-500 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">edit</button>
                    <button title="Delete row entry"s onclick="removeWhatsappPackage('${item.id}')" class="material-symbols-outlined rounded-full bg-red-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">delete</button>
                </td>
            </tr>
        `
    }) .join('')
    injectPaginatatedTable(rows)
}

async function fetchWhatsappPackages() {
    
   try{
       
       
    let request = await fetch('https://comeandsee.com.ng/kreativerock/admin/controllers/packages/whatsapp/fetch');
    let result = await request.json();
    
        datasource = result.data
        datasource.length > 0 && resolvePagination(datasource, onWhatsappPackageTableDataSignal)
        
         
        
        runoptioner(document.getElementsByClassName('updater')[0])
        whatzappPackageId = result.data[0].id
        populateData(result.data[0])
        return result;
        
      if (datasource.length === 0) notification('No records retrieved',0)
       
   }catch(err){
      return notification(err.message ?? "Error ocurred", 0);
   }
    
}


async function whatsaappPackageSubmitHandler() {

try{
        const ids = Array.from(document.querySelectorAll('#whatsapppackageform input')).map( item => item.id )
    if(!validateForm('whatsapppackageform', ids)) return
    
    
    
    const payload = await getWhatsappPackageFormData();
    const request =  await fetch('https://comeandsee.com.ng/kreativerock/admin/controllers/packages/whatsapp/create', {
        method: "POST",
        body:payload,
        
    })
    if(!request.ok) {
        return notification(request.message ?? 'Sorry! We are unable to perform task', 0);
    }
    const result = await request.json();
    
    notification('Saved successfully!', 1);
    location.reload();
    return result;
}catch(err){
    notification(err.message ?? 'Saved successfully!', 0);
}

}





// Edit Dialog
    const whatsappdialog = document.getElementById('whatsappdialogBox');
    const whatsappopenBtn = document.getElementById('whatsappopenDialog');
    const whatsappcancelBtn = document.getElementById('whatsappcancelBtn');


  

    whatsappcancelBtn.addEventListener('click', () => {
      whatsappdialog.close();
    });

  


async function editwhatsappPackageSubmitHandler(id) {
    
    
    try{
    whatsappdialog.showModal();
    const ids = Array.from(document.querySelectorAll('#whatsappdialogForm input')).map( item => item.id );
    if(!validateForm('whatsappdialogForm', ids)) return
    
    
    //Input Elements
    let packageName = document.querySelector("editwhatsapppackagename").value;
    
     // Creating formData to collect form input 
    const payload = new FormData();
    payload.append("packagename", packageName);
    payload.append("id", id)
    
    const request =  await fetch(`https://comeandsee.com.ng/kreativerock/admin/controllers/packages/whatsapp/edit' }`, {
        method: "POST",
        body:payload,
        
    })
    if(!request.ok) {
        return notification(request.message ?? 'Sorry! We are unable to perform task', 0);
    }
    const result = await request.json();
    
    notification('Saved successfully!', 1);
    location.reload();
     whatsappdialog.close();
    return result;
    }catch(err){
    notification(err.message ?? 'Saved successfully!', 0); 
    }
}


async function removeWhatsappPackage(id) {
    if(!confirm('Sure you want to delete this package?')) return 
    
    // let payload = new FormData()
    // payload.append('id', id)
    
    const request =  await fetch(`https://comeandsee.com.ng/kreativerock/admin/controllers/packages/whatsapp/remove?id=${id}`)
    if(!request.ok) {
        return notification(request.message ?? 'Sorry! We are unable to perform task', 0)
    }
    
    notification('Item removed successfully!', 1);
    fetchSmsPackages()
}

function getWhatsappPackageFormData() {
    //Input Elements
    let packageName = document.querySelector("#whatsapppackagename").value;
    let numberofUnits = document.querySelector("#whatsappnumberofunits").value;
    let costperUnit = document.querySelector("#whatsappcostperunit").value;
    
    // Creating formData to collect form input 
    const payload = new FormData();
    payload.append("packagename", packageName);
    payload.append("numberofunits", numberofUnits);
    payload.append("costperunit",costperUnit);
    
    // if(smsPackageId) {
    //     payload.append('id', smsPackageId)
    // }
    
    return payload
}



