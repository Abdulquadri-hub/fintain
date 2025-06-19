// do the active function
function transactionalActive() {
    
    if(did('goback')) did('goback').addEventListener('click', function() {
        // go back to campaign options
        router.navigate('/campaign/options')
    })

    if(did('iagree')) did('iagree').addEventListener('click', function() {
        did('agreement').classList.add('hidden');
        did('apiground').classList.remove('hidden');
        // scroll to the top by the id apiground of the div apiground
        document.getElementsByClassName('page-content')[0].scrollTop = 0
    })

    getapis()

}

async function getapis() {
  let request = await httpRequest2(baseurl+'/campaign/transactional', null, null, 'json')
  if(request.status){
    did('api-key').value = request.data.api_key
  }else{
    Notification(request.message, 0)
  }
}
 
 // Function to copy content to clipboard
 function copyToClipboard(id) {
  var copyText = document.getElementById(id);
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value); // Optional alert
}
// Function to toggle visibility of the API Key
function toggleAPIKey() {
  var apiKeyField = document.getElementById('api-key');
  var button = document.querySelector('button[onclick="toggleAPIKey()"]');
  if (apiKeyField.style.display === "none") {
    apiKeyField.style.display = "inline-block";
    button.textContent = "Hide Key";
  } else {
    apiKeyField.style.display = "none";
    button.textContent = "Show Key";
  }
}
// Function to simulate sending a test message in the API Playground
function sendTestMessage() {
  var recipient = document.getElementById('recipient').value;
  var message = document.getElementById('message').value;
  var response = document.getElementById('playground-response');

  if (recipient && message) {
    // Simulated API response object
    var simulatedResponse = {
      "status": true,
      "code": 200,
      "recipients_count": 1,
      "data": [
        {
          "recipient": recipient,
          "status": "sent",
          "message_id": "563fae7e-92ff-4eea-9077-6c233d92bdd9",
          "error": null
        }
      ]
    };

    // Convert the response to a formatted JSON string
    response.textContent = JSON.stringify(simulatedResponse, null, 4);
    response.classList.remove('text-gray-600');
    response.classList.add('text-green-600');
  } else {
    response.textContent = "Error: Please provide both recipient and message.";
    response.classList.remove('text-green-600');
    response.classList.add('text-red-600');
  }
}
