let smsPackageId;
async function smspackagesActive() {
    const form = document.querySelector('#smspackageform')
    if(form.querySelector('#submit')) form.querySelector('#submit').addEventListener('click', smsPackageSubmitHandler)
    datasource = []
    await fetchSmsPackages()
}

async function onSmsPackageTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => {
        return `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.index + 1 }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.packagename }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.numberofunits } </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"> ${ formatCurrency(item.costperunit) } </td>
                <td class="flex items-center gap-3 mt-2">
                    <button title="Edit row entry" onclick="editsmsPackageSubmitHandler('${item.id}')" id="openDialog" class="material-symbols-outlined rounded-full bg-blue-500 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">edit</button>
                    <button title="Delete row entry"s onclick="removeSmsPackage('${item.id}')" class="material-symbols-outlined rounded-full bg-red-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">delete</button>
                </td>
            </tr>
        `
    }) .join('')
    injectPaginatatedTable(rows)
}

async function fetchSmsPackages() {
    
   try{
       
       
    let request = await fetch('https://comeandsee.com.ng/kreativerock/admin/controllers/packages/sms/fetch');
    let result = await request.json();
    
        datasource = result.data
        datasource.length > 0 && resolvePagination(datasource, onSmsPackageTableDataSignal)
        
         
        
        runoptioner(document.getElementsByClassName('updater')[0])
        smsPackageId = result.data[0].id
        populateData(result.data[0])
        return result;
        
      if (datasource.length === 0) notification('No records retrieved',0)
       
   }catch(err){
      return notification(err.message ?? "Error ocurred", 0);
   }
    
}


async function smsPackageSubmitHandler() {

try{
        const ids = Array.from(document.querySelectorAll('#smspackageform input')).map( item => item.id )
    if(!validateForm('smspackageform', ids)) return
    
    
    
    const payload = await getSmsPackageFormData()
    const request =  await fetch('https://comeandsee.com.ng/kreativerock/admin/controllers/packages/sms/create', {
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
    const smsdialog = document.getElementById('dialogBox');
    const openBtn = document.getElementById('openDialog');
    const smscancelBtn = document.getElementById('cancelBtn');


  

    smscancelBtn.addEventListener('click', () => {
      smsdialog.close();
    });

  


async function editsmsPackageSubmitHandler(id) {
    
    
    try{
    smsdialog.showModal();
    const ids = Array.from(document.querySelectorAll('#dialogForm input')).map( item => item.id );
    if(!validateForm('dialogForm', ids)) return
    
    
    //Input Elements
    let packageName = document.querySelector("#editpackagename").value;
    
     // Creating formData to collect form input 
    const payload = new FormData();
    payload.append("packagename", packageName);
    payload.append("id", id)
    
    const request =  await fetch(`https://comeandsee.com.ng/kreativerock/admin/controllers/packages/sms/edit' }`, {
        method: "POST",
        body:payload,
        
    })
    if(!request.ok) {
        return notification(request.message ?? 'Sorry! We are unable to perform task', 0);
    }
    const result = await request.json();
    
    notification('Saved successfully!', 1);
    location.reload();
     smsdialog.close();
    return result;
    }catch(err){
    notification(err.message ?? 'Saved successfully!', 0); 
    }
}


async function removeSmsPackage(id) {
    if(!confirm('Sure you want to delete this package?')) return 
    
    // let payload = new FormData()
    // payload.append('id', id)
    
    const request =  await fetch(`https://comeandsee.com.ng/kreativerock/admin/controllers/packages/sms/remove?id=${id}`);
    if(!request.ok) {
        return notification(request.message ?? 'Sorry! We are unable to perform task', 0)
    }
    
    notification('Item removed successfully!', 1);
    fetchSmsPackages()
}

function getSmsPackageFormData() {
    //Input Elements
    let packageName = document.querySelector("#packagename").value;
    let numberofUnits = document.querySelector("#numberofunits").value;
    let costperUnit = document.querySelector("#costperunit").value;
    
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



