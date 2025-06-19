async function managecampaignActive() {
    datasource = []
    did('submit').addEventListener('click', function() {
        fetchCampaigns()
    })
    await fetchCampaigns()
}

async function fetchCampaigns() {
    // Use SweetAlert2 for loading state
    const loadingAlert = Swal.fire({
        title: 'Please wait...',
        text: 'Fetching Campaigns, please wait.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        let form = document.querySelector('#managecampaignform');
        let formData = new FormData(form);

        // Construct query parameters
        let queryParams = new URLSearchParams(formData).toString();
        const url = `${baseurl}/campaign/fetch${queryParams ? `?${queryParams}` : ''}`;

        // Use fetch API instead of httpRequest (assuming it's a custom function)
        const response = await fetch(url, {
            method: 'GET', // or POST, depending on your API
            headers: {
                'Content-Type': 'application/json' // Important if sending JSON
                // Add any other headers like Authorization if needed
            }
        });

        if (!response.ok) {
            const errorText = await response.text(); // Get error message from server
            throw new Error(`HTTP error! status: ${response.status}, message: ${errorText}`);
        }

        const request = await response.json(); // Parse the JSON response

        if (!request.status) {
            Swal.close(); // Close loading alert before showing error
            return notification('No records retrieved');
        }

        datasource = request.data;
        resolvePagination(datasource, onManageCampaignTableDataSignal);

    } catch (error) {
        console.error("Error fetching campaigns:", error);
        Swal.close(); // Close loading alert on error
        notification(`An error occurred: ${error.message}`); // Show a user-friendly error message
    } finally {
        Swal.close(); // Ensure loading alert is closed even if successful
    }
}


async function onManageCampaignTableDataSignal() {
    let rows = getSignaledDatasource().map((item, index) => `
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.index + 1 }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.name }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.type }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ formatDate(item.created_at) }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">${ item.response_handling }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800 ${ item.status == 'completed' ? 'text-green-600' : ''}">${ item.status }</td>
            <td class="flex items-center justify-center mt-3 gap-3">
                <button title="View campaign" class=" material-symbols-outlined rounded-full bg-white h-8 w-8 text-green-600 drop-shadow-md text-xs " style="font-size: 18px;" onclick="viewcampaignmodal(${item.id})">visibility</button>
                <button title="Edit campaign" class=" material-symbols-outlined rounded-full bg-blue-600 h-8 w-8 text-white drop-shadow-md text-xs ${ item.status == 'draft' || item.status == 'scheduled' ? '' : 'hidden' }" style="font-size: 18px;" onclick="redirectWithProp(${item.id}, 'sms/campaign')">Edit</button>
                <button title="Start campaign" class=" material-symbols-outlined rounded-full bg-primary-g h-8 w-8 text-white drop-shadow-md text-xs ${ item.status == 'draft' ? '' : 'hidden' }" style="font-size: 18px;" onclick="campaignAction('launch', ${item.id}, event)">play_arrow</button>
                <button title="View campaign conversations" class=" material-symbols-outlined rounded-full bg-green-600 h-8 w-8 text-white drop-shadow-md text-xs ${ item.status == 'draft' ? 'hidden' : '' }" style="font-size: 18px;" onclick="redirectWithProp(${item.id}, 'campaign/conversations')">chat</button>
                <button title="Delete campaign & its conversations" class=" material-symbols-outlined rounded-full bg-red-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;" onclick="campaignAction('delete', ${item.id}, event)">delete</button> 
            </td>
        </tr>`
    )
    .join('')
    injectPaginatatedTable(rows)
}

async function viewcampaignmodal(campaignId) {
    const thedata = datasource.find(item => item.id == campaignId);

    if (!thedata) {
        Swal.fire("Error", "Campaign not found.", "error");
        return;
    }

    Swal.fire({
        title: '',
        html: `
            <div class="p-6 bg-white/10 backdrop-blur-md rounded-xl shadow-lg border border-gray-100 max-w-2xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-white">📢 Campaign Overview</h2>
                    <p class="text-sm text-gray-300">Detailed insights about the campaign</p>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-white">
                    
                    <!-- Campaign Name -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-blue-400 text-lg">📌</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Campaign Name</p>
                            <p class="text-md font-semibold">${thedata.name}</p>
                        </div>
                    </div>

                    <!-- Campaign Type -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-green-400 text-lg">🛠️</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Campaign Type</p>
                            <p class="text-md font-semibold">${thedata.type}</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-yellow-400 text-lg">⚡</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Status</p>
                            <p class="text-md font-semibold">${thedata.status}</p>
                        </div>
                    </div>

                    <!-- Date Created -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-purple-400 text-lg">📅</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Date Created</p>
                            <p class="text-md font-semibold">${formatDate(thedata.created_at)}</p>
                        </div>
                    </div>

                    <!-- Date Started -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">                    
                        <span class="text-orange-400 text-lg">⏳</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Response Handling</p>
                            <p class="text-md font-semibold">${thedata.response_handling}</p>
                        </div>
                    </div>

                    <!-- Date Ended -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-red-400 text-lg">🛑</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Date Ended</p>
                            <p class="text-md font-semibold">N/A</p>
                        </div>
                    </div>

                    <!-- Channel -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-cyan-400 text-lg">📡</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Channel</p>
                            <p class="text-md font-semibold">${thedata.channel}</p>
                        </div>
                    </div>

                    <!-- Repeat Interval -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow">
                        <span class="text-indigo-400 text-lg">🔄</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Repeat Interval</p>
                            <p class="text-md font-semibold">${thedata.repeat_interval}</p>
                        </div>
                    </div>

                    <!-- Phone Numbers -->
                    <div class="flex items-center space-x-3 p-4 bg-gray-800 rounded-lg shadow col-span-2">
                        <span class="text-pink-400 text-lg">📞</span>
                        <div>
                            <p class="text-xs uppercase text-gray-400">Phone Numbers</p>
                            <p class="text-md font-semibold">${formatPhoneNumbers(thedata.phone_numbers)}</p>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="p-4 bg-gray-800 rounded-lg shadow col-span-2">
                        <p class="text-xs uppercase text-gray-400">📩 Message</p>
                        <p class="text-md font-semibold mt-2 text-gray-300">${thedata.message}</p>
                    </div>
                </div>
            </div>
        `,
        showCloseButton: true,
        showCancelButton: false,
        confirmButtonText: 'Close',
        buttonsStyling: false,
        customClass: {
            confirmButton: 'bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 ease-in-out transform hover:scale-105',
            popup: 'rounded-lg shadow-xl backdrop-blur-md bg-gray-900/90 text-white',
        },
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        didOpen: () => {
            Swal.hideLoading();
        }
    });
}

// Format phone numbers
function formatPhoneNumbers(phoneNumbersString) {
    try {
        const phoneNumbers = JSON.parse(phoneNumbersString);
        return phoneNumbers.join(", ");
    } catch (error) {
        console.error("Error parsing phone numbers:", error);
        return "Invalid phone numbers";
    }
}



async function campaignAction(action, campaignId, event) {
    if (action === 'delete' && !confirm('Are you sure you want to delete this?')) {
        return 
    }
    
    const payload = new FormData()
    payload.append('submitaction', action)
    payload.append('campaign_id', campaignId)
    
    let request = await httpRequest(`../controllers/sms/${ action == 'delete' ? 'deletesmscampaign' : 'lauchcampaign' }`, payload, event.currentTarget, 'json')
    
    if(!request.status) {
        notification(request.message ?? 'Sorry! Unable to complete request', 0)
        return
    }
    
    notification(request.message ?? 'Campaign request completed!', 1)
    fetchCampaigns()
}

