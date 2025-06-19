let companyid
async function companyActive() {
    companyid = ''
    const form = document.querySelector('#companyform')
    if(form.querySelector('#submit')) form.querySelector('#submit').addEventListener('click', companyFormSubmitHandler)
    datasource = []
    await fetchcompany()
    // await getAllcompany(true)
    // new TomSelect('#company', {
    //     // plugins: ['remove_button'],
    //     onInitialize: function() {
    //         console.log(checkpermission('FILTER company'))
    //         if(!checkpermission('FILTER company')) this.setValue(the_user.company);
            // if(!checkpermission('FILTER company')) this.setTextboxValue('readonly', true);
    //     }
    // });
    // await getAllUsers('useridlist', 'id')
}

async function fetchcompany(id) {

    // Show loading state using SweetAlert
    const loadingAlert = Swal.fire({
        title: 'Please wait...',
        text: 'Fetching company data, please wait.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    // let form = document.querySelector('#viewcompanyform');
    // let formData = new FormData();
    // formData.set('department', '');
    // formData.set('company', '');
    // let queryParams = new URLSearchParams(formData).toString();

    if(!id)document.getElementById('tabledata').innerHTML = `<td colspan="100%" class="text-center opacity-70"> Loading... </td>`

    let request = await httpRequest2(`../controllers/fetchpayee.php`, null, document.querySelector('#viewrequisitionform #submit'), 'json', 'POST');
    swal.close(); // Close the loading alert once the request is complete
    if(!id)document.getElementById('tabledata').innerHTML = `<td colspan="100%" class="text-center opacity-70"> No Records Retrieved </td>`
    if(request.status) {
        if(!id){
            if(request.data.length) {
                datasource = request.data.filter(data=>data.category == 'COMPANY')
                resolvePagination(datasource, oncompanyTableDataSignal);
            }
        } else {
            document.getElementsByClassName('updater')[0].click();
            companyid = request.data[0].id;
            populateData(request.data[0]);
        }
    } else {
        return notification('No records retrieved');
    }
}

async function removecompany(id) {
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

            let request = await httpRequest2('../controllers/removevisacountries', id ? getparamm() : null, null, 'json');
            return request;
        },
        allowOutsideClick: () => !Swal.isLoading()
    });

    // Show notification based on the result
    if (confirmed.isConfirmed) {
        fetchcompany();
        return notification(confirmed.value.message);
    }
}


async function oncompanyTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => `
    <tr>
        <td>${index + 1}</td>
        <td>${item.companyname}</td>
        <td>${item.operatorname}</td>
        <td>${item.taxnumber}</td>
        <td class="flex items-center gap-3">
            <button title="Edit row entry" onclick="viewcompany('${item.id}')" class="material-symbols-outlined rounded-full bg-green-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">visibility</button>
            <button title="Edit row entry" onclick="fetchcompany('${item.id}')" class="material-symbols-outlined rounded-full bg-primary-g h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;">edit</button>
        </td>
    </tr>`
    )
    .join('')
    injectPaginatatedTable(rows)
}

async function viewcompany(id) {
    // Find the data object with the matching id
    const thedata = datasource.find(data => data.id === id);

    // If data not found, show an error alert
    if (!thedata) { 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data not found!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Close'
        });
        return;
    }

    // Create HTML content for the modal
    const content = `
        <div style="text-align: left; max-height: 60vh; overflow-y: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Field</th>
                    <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Details</th>
                    </tr>
                    
                <tr>
                    <td style="padding: 8px;">Company Name</td>
                    <td style="padding: 8px;">${thedata.companyname || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Operator Name</td>
                    <td style="padding: 8px;">${thedata.operatorname || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Phone</td>
                    <td style="padding: 8px;">${thedata.phone || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Business Area</td>
                    <td style="padding: 8px;">${thedata.businessarea || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Created At</td>
                    <td style="padding: 8px;">${new Date(thedata.created_at).toLocaleString() || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Nature of Business</td>
                    <td style="padding: 8px;">${thedata.natureofbusiness || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Political Ward</td>
                    <td style="padding: 8px;">${thedata.politicalward || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Shop Address</td>
                    <td style="padding: 8px;">${thedata.shopaddress || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Shop Number</td>
                    <td style="padding: 8px;">${thedata.shopnumber || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Tax Number</td>
                    <td style="padding: 8px;">${thedata.taxnumber || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Status</td>
                    <td style="padding: 8px; color: ${thedata.status === 'ACTIVE' ? 'green' : 'red'}; font-weight: bold;">
                        ${thedata.status || 'N/A'}
                    </td>
                </tr>
            </table>
        </div>
    `;

    // Display the modal using SweetAlert2
    Swal.fire({
        title: `<strong>Company Details</strong>`,
        html: content,
        icon: 'info',
        width: '600px',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'Close',
        confirmButtonColor: '#3085d6',
        customClass: {
            popup: 'swal2-border-radius',
        },
        background: '#f9f9f9',
    });
}

async function companyFormSubmitHandler() {
    if(!validateForm('companyform', getIdFromCls('comp'))) return
    
    let payload = getFormData2(document.querySelector('#companyform'), companyid ? [['id', companyid]] : null);

    const confirmed = await Swal.fire({
        title: companyid ? 'Updating...' : 'Submitting...',
        text: 'Please wait while we submit your data.',
        icon: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: async () => {
            Swal.showLoading();
            let request = await httpRequest2('../controllers/addpayee.php', payload, document.querySelector('#companyform #submit'), 'json', 'POST');
            Swal.close();

            if (request.status) {
                notification('Record saved successfully!', 1);
                const form = document.querySelector('#companyform');
                form.reset();
                if(companyid)form.querySelectorAll('input, select, textarea').forEach(input => input.value = '');
                companyid = '';
                document.getElementsByClassName('viewer')[0].click();
                fetchcompany();
            } else {    
                notification(request.message, 0);
            }
        }
    });
}
