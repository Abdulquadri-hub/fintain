let segmentid
async function segmentActive() {
    datasource = [];
    const form = document.getElementById('segmentform') 
    console.log(form)
    if(form.querySelector('#submit'))form.querySelector('#submit').addEventListener('click', submitSegment);
    await fetchsegment()
}

async function fetchsegment(id) {
    if(!id)segmentid = '';
    if(id)segmentid = id;

    // Show loading state using SweetAlert
    const loadingAlert = Swal.fire({
        title: 'Please wait...',
        text: 'Fetching segment data, please wait.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    let form = document.querySelector('#segmentform');
    let formData = new FormData(form);
    // // formData.set('department', '');
    // // formData.set('segment', '');
    // let queryParams = new URLSearchParams(formData).toString();

    if(!id)document.getElementById('tabledata').innerHTML = `<td colspan="100%" class="text-center opacity-70"> Loading... </td>`

    // let payload = getFormData2(document.querySelector('#segmentform'), segmentid ? [['id', segmentid]] : []);

    let request = await httpRequest2(baseurl + '/segment/fetch' + (id ? '?id=' + id : ''),  null, null, 'json', 'GET');

    swal.close(); // Close the loading alert once the request is complete
    if(!id)document.getElementById('tabledata').innerHTML = `<td colspan="100%" class="text-center opacity-70"> No Records Retrieved </td>`
    if(request.status) {
        if(!id){
            if(request.data.length) {
                datasource = request.data
                // resolvePagination(datasource, onsegmentHistoryTableDataSignal, addFFooterTableDataSignal);
                resolvePagination(datasource, onsegmentHistoryTableDataSignal);
            }
        } else {
            // document.getElementsByClassName('updater')[0].click();
            segmentid = request.data.id;
            populateData(request.data);
        }
    } else {
        return notification('No records retrieved');
    }
}

// async function (id) {
//     if(request.status) {
//         datasource = request.data
//         datasource.length && resolvePagination(datasource, onsegmentHistoryTableDataSignal, addFFooterTableDataSignal)

//     } else return notification('No records retrieved', 0)
// }

async function removesegment(id) {
    // Ask for confirmation using SweetAlert with async and loader
    const confirmed = await Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            function getparamm() {
                let paramstr = new FormData();
                paramstr.append('id', id);
                return paramstr;
            }

            let request = await httpRequest2(baseurl+'/segment/delete?segment_id='+id, null, null, 'json');
            return request;
        },
        allowOutsideClick: () => !Swal.isLoading()
    });

    // Show notification based on the result
    if (confirmed.isConfirmed) {
        fetchsegment();
        return notification(confirmed.value.message);
    }
}

async function onsegmentHistoryTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => {
        return `
            <tr>
                <td scope="col" class="px-6 py-3 text-center text-sm">${ item.index + 1 }</td>
                <td scope="col" class="px-6 py-3 text-start text-sm">${ item.name }</td>    
                 <td scope="col" class="flex items-center gap-3 justify-center whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                    <button title="Edit row entry" class="material-symbols-outlined rounded-full bg-blue-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;" onclick="fetchsegment('${item.id}')">edit</button>
                    <button title="Delete row entry" class="material-symbols-outlined rounded-full bg-red-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;" onclick="removesegment('${item.id}')">delete</button>
                </td>
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
            <td colspan="1" class="!uppercase !text-sm font-bold">Total</td>
            <td class="!font-bold">${totalQtyIn}</td>
            <td class="!font-bold">${totalQtyOut}</td>
            <td class="!font-bold">${formatCurrency(totalAmount)}</td>
            <td colspan="3"></td>
        </tr>
    `;

    return footerRow;
}

function submitSegment() {
    const segment = document.querySelector('#segment').value
    if(!segment) return notification('Segment is required', 0)
    
    let payload = getFormData2(document.querySelector('#segmentform'), segmentid ? [['segment_id', segmentid]] : []);
    
    httpRequest2(`${baseurl}/segment/${segmentid ? 'edit' : 'create'}`, payload, document.querySelector('#submit'), 'json')
        .then(response => {
            if(response.status) {
                notification(response.message, 1)
                did('segment').value = '';
                fetchsegment()
            } else {
                notification('Segment could not be added', 0)
            }
        })
        .catch(error => {
            notification('Segment could not be added', 0)
        })
}

