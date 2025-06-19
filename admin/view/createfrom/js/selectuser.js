async function selectUserActive() {
    datasource = selectusers =  []
    await fetchSelectUsers()
}

async function fetchSelectUsers() {
    let request = await httpRequest('https://comeandsee.com.ng/kreativerock/admin/controllers/user/fetch')
    
    if(!request.status) {
        notification('No records retrieved')
        return
    }
    
    
    if(request.data.length) {
        datasource = selectusers = request.data.filter( item => item.role !== 'SUPERADMIN')
        resolvePagination(datasource, onSelectUsersTableDataSignal)
    }

}

async function onSelectUsersTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => `
    <tr class="${item.role == 'SUPERADMIN' ? 'opacity-0' : ''}" >
        <td class="py-3 ps-4">
            <div class="flex items-center h-5">
                <input id="table-checkbox-1" type="checkbox" class="form-checkbox rounded">
                <label for="table-checkbox-1" class="sr-only">Checkbox</label>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${item.firstname}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${item.lastname}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${item.othernames ?? ''}</td>
        <td style="text-transform:lowercase" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${item.email}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${item.address}</td> 
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${item.status}</td> 
        <td class="flex items-center gap-3">
            <button onclick="selectUseredit('${item.email}')" title="Edit row entry" class="${item.role == 'SUPERADMIN' ? 'hidden' : ''} material-symbols-outlined rounded-full bg-blue-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">edit</button>
            <button onclick="selectUser(event, ${item.id})" title="Select row entry" class="${item.role == 'SUPERADMIN' ? 'hidden' : ''} material-symbols-outlined rounded-full bg-amber-500 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">done</button>
        </td>
    </tr>`
    )
    .join('')
    injectPaginatatedTable(rows)
}

function selectUseredit(id){
    sessionStorage.setItem('edituser', id)
    router.navigate('/user/profile')
}


async function selectUser(event, index) {
    let selectedItem = selectusers.find(item => item.id == index)
    
    if(!selectedItem) {
        return
    }
        
    if(!confirm('You are about to select this user')) return
    
   
    
    let request = await httpRequest(`https://comeandsee.com.ng/kreativerock/admin/controllers/user/fetch?user_id=${selectedItem.id}`)
    
    if(!request.status) {
        notification(request.message, 0)
        return
    }
    
    document.querySelector("#tabledata").innerHTML = `
    <tr class="${request.data.role == 'SUPERADMIN' ? 'opacity-0' : ''}" >
        <td class="py-3 ps-4">
            <div class="flex items-center h-5">
                <input id="table-checkbox-1" type="checkbox" class="form-checkbox rounded">
                <label for="table-checkbox-1" class="sr-only">Checkbox</label>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${request.data.firstname}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${request.data.lastname}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${request.data.othernames ?? ''}</td>
        <td style="text-transform:lowercase" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${request.data.email}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${request.data.address}</td> 
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">${request.data.status}</td> 
        <td class="flex justify-center">
            <button onclick="selectUseredit('${request.data.email}')" title="Edit row entry" class="${request.data == 'SUPERADMIN' ? 'hidden' : ''} material-symbols-outlined rounded-full bg-blue-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">edit</button>
            
        </td>
    </tr>
    
    `
   document.querySelector(".table-status").classList.add("hidden");
    
    notification('User selected successfully!', 1);
    
    
    //Add user transaction history
     const transactions = [
      { user: "John", date: "2025-06-01", type: "credit", amount: 200 },
      { user: "John", date: "2025-06-03", type: "debt", amount: 50 },
      { user: "Jane", date: "2025-06-04", type: "credit", amount: 300 },
      { user: "Jane", date: "2025-06-05", type: "debt", amount: 100 },
      { user: "John", date: "2025-06-06", type: "credit", amount: 150 },
      { user: "Jane", date: "2025-06-07", type: "credit", amount: 200 },
    ];

    function renderTransactions() {
     const startDate = document.getElementById("start-date").value;
      const endDate = document.getElementById("end-date").value;
      const tbody = document.getElementById("transactions-body");
      tbody.innerHTML = "";

      let balance = 0;

      const filtered = transactions
        .filter(tx => {
          const date = new Date(tx.date);
          return (!startDate || new Date(startDate) <= date) &&
                 (!endDate || new Date(endDate) >= date);
        })
        .sort((a, b) => new Date(a.date) - new Date(b.date));

      filtered.forEach(tx => {
        balance += tx.type === "credit" ? tx.amount : -tx.amount;
        const row = `
          <tr class="hover:bg-gray-100">
            <td class="p-3">${tx.date}</td>
            <td class="p-3 text-red-600">${tx.type === "debt" ? tx.amount : '-'}</td>
            <td class="p-3 text-green-600">${tx.type === "credit" ? tx.amount : '-'}</td>
            <td class="p-3 font-bold">${balance}</td>
          </tr>
        `;
        tbody.insertAdjacentHTML("beforeend", row);
      });
    }

   renderTransactions();
  let userHistoryElements = document.querySelector(".user-history");
  if(userHistoryElements ){
      userHistoryElements.classList.remove("hidden")
  }
    
}
