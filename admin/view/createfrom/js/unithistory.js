






async function unithistoryActive() {
    datasource = [];
    await fetchSmsUnitsHistory()
}



async function fetchSmsUnitsHistory() {
    let request = await httpRequest2('https://comeandsee.com.ng/kreativerock/admin/controllers/sms/transactions', null, null, 'json')
    if(request.status) {
       
        datasource = request.data
 
            
    
        datasource.length && resolvePagination(datasource, onSmsUnitHistoryTableDataSignal, addFFooterTableDataSignal);
          

    } else return notification('No records retrieved', 0)
}



let startDate = document.querySelector(".start-date");
let endDate = document.querySelector(".end-date");
const filterButton = document.querySelector(".filter-btn");

if (filterButton) {
  filterButton.addEventListener("click", async function () {
    const startValue = startDate.value;
    const endValue = endDate.value;

    // Check if both dates are selected
    if (!startValue || !endValue) {
      console.warn("Start or End date is missing.");
      return;
    }

    const start = new Date(startValue);
    const end = new Date(endValue);

    const filtered = datasource
      .filter(unit => {
        const date = new Date(unit.transactiondate);
        return date >= start && date <= end;
      })
      .sort((a, b) => new Date(a.transactiondate) - new Date(b.transactiondate));

    console.log("Filtered Results:", filtered);

    if (filtered.length) {
      resolvePagination(filtered, onSmsUnitHistoryTableDataSignal, addFFooterTableDataSignal);
    }
  });
}



async function onSmsUnitHistoryTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => {
        return `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.index + 1 }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.qtyin }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.qtyout }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ formatCurrency(item.amount) }</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"> ${ formatDate(item.transactiondate) } </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"> ${ item.paymentmethod } </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"> ${ item.reference } </td>
            </tr>
        `
    }) .join('')
    injectPaginatatedTable(rows)
}


function addFFooterTableDataSignal() {
    let totalQtyIn = datasource.reduce((acc, item) => acc + (+item.qtyin), 0);
    let totalQtyOut = datasource.reduce((acc, item) => acc + (+item.qtyout), 0);
    let totalAmount = datasource.reduce((acc, item) => acc + (+item.amount), 0);

    let footerRow = `
        <tr colspan="1">
            <td colspan="1" class="px-6 py-4 whitespace-nowrap text-sm text-default-800 !uppercase !text-sm font-bold">Total</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800 !font-bold">${totalQtyIn}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800 !font-bold">${totalQtyOut}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800 !font-bold">${formatCurrency(totalAmount)}</td>
            <td colspan="3"></td>
        </tr>
    `;

    return footerRow;
}
