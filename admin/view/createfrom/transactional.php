<div id="apiground" class="hidden mx-auto lg:w-4/5 2xl:w-3/5">
  <!-- Header Section -->
  <div class="flex items-center justify-between mb-12">
    <h4 class="text-gray-900 text-3xl font-semibold capitalize">API Information & Playground</h4>
    <div class="flex space-x-4">
      <!-- Optional buttons can be added here -->
      <!--
      <button class="bg-amber-500 text-white py-2 px-4 rounded-md hover:bg-amber-600 transition">Docs</button>
      <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">Test API</button>
      -->
    </div>
  </div>

  <!-- Main Layout (Two Columns) -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
    <!-- Left Side: API Info (Sticky) -->
    <div class="sticky top-20 h-[calc(100vh-120px)] space-y-8">
      <!-- API URL -->
      <div class="bg-gradient-to-r from-blue-100 to-blue-200 p-8 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold text-gray-800">API URL</h3>
        <p class="text-gray-600 mb-4">This is the URL you'll use to interact with the API.</p>
        <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-md">
          <input type="text" id="api-url" value="https://comeandsee.com.ng/kreativerock/api/v1" readonly class="bg-transparent text-gray-700 border-none w-3/4">
          <button onclick="copyToClipboard('api-url')" class="bg-amber-500 text-white py-2 px-4 rounded-md hover:bg-amber-600 transition">Copy</button>
        </div>
      </div>
      <!-- API Key -->
      <div class="bg-gradient-to-r from-green-100 to-green-300 p-8 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold text-gray-800">API Key</h3>
        <p class="text-gray-600 mb-4">Your unique API key for authentication.</p>
        <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-md">
          <!-- Initially hidden; toggle to show -->
          <input type="text" id="api-key" value="Loading..." readonly class="bg-transparent text-gray-700 border-none w-3/4" style="display: none;">
          <button onclick="toggleAPIKey()" class="bg-amber-500 text-white py-2 px-4 rounded-md hover:bg-amber-600 transition">Show Key</button>
          <button onclick="copyToClipboard('api-key')" class="bg-amber-500 text-white py-2 px-4 rounded-md hover:bg-amber-600 transition ml-2">Copy</button>
        </div>
      </div>
    </div>

    <!-- Right Side: API Documentation & Playground -->
    <div class="space-y-8">
      <!-- API Documentation (Sticky) -->
      <div class="sticky top-20 bg-white p-4 rounded-lg shadow-lg space-y-6">
        <!-- Overview Section -->
        <div class="bg-gray-50 p-6 rounded-md shadow-md">
          <h5 class="font-semibold text-gray-700 text-xl mb-2">Base URL</h5>
          <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto">https://comeandsee.com.ng/kreativerock/api/v1</pre>
          <h5 class="font-semibold text-gray-700 text-xl mt-4 mb-2">Authentication</h5>
          <p class="text-gray-500">Include your API key in the request header: <code class="bg-gray-200 px-2 py-1 rounded-sm">X-API-Key: your_api_key_here</code></p>
          <h5 class="font-semibold text-gray-700 text-xl mt-4 mb-2">Rate Limiting</h5>
          <p class="text-gray-500">Maximum of 1,000 requests per hour. If the limit is exceeded, the API returns a 429 status code along with the time remaining until the limit resets.</p>
        </div>

        <!-- Endpoints Section -->
        <div class="bg-gray-50 p-6 rounded-md shadow-md space-y-6">
          <!-- Send Message Endpoint -->
          <div>
            <h5 class="font-semibold text-gray-700 text-xl">1. Send Message</h5>
            <p class="text-gray-500 mb-2">Send SMS messages to one or multiple recipients using the endpoint <code class="bg-gray-200 px-2 py-1 rounded-sm">POST /message/send</code>. The request should be in JSON format.</p>
            <h5 class="font-semibold text-gray-700">Request:</h5>
            <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto">
{
    "recipient": "+2349156504412",
    "message": "Your verification code is 123456"
}
            </pre>
            <h5 class="font-semibold text-gray-700">Success Response:</h5>
            <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto">
{
    "status": true,
    "code": 200,
    "recipients_count": 1,
    "data": [
        {
            "recipient": "+2349156504412",
            "status": "sent",
            "message_id": "563fae7e-92ff-4eea-9077-6c233d92bdd9",
            "error": null
        }
    ]
}
            </pre>
            <h5 class="font-semibold text-gray-700 mt-2">Error Response (Example: Insufficient Units):</h5>
            <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto">
{
    "status": false,
    "code": 442,
    "message": "Insufficient units"
}
            </pre>
          </div>

          <!-- Check Message Status Endpoint -->
          <div>
            <h5 class="font-semibold text-gray-700 text-xl">2. Check Message Status</h5>
            <p class="text-gray-500 mb-2">Retrieve the delivery status of a sent message using the endpoint <code class="bg-gray-200 px-2 py-1 rounded-sm">POST /message/status</code>.</p>
            <h5 class="font-semibold text-gray-700">Request:</h5>
            <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto">
{
    "message_id": "302d5f43-bb30-45dc-9778-0a91521a95cb"
}
            </pre>
            <h5 class="font-semibold text-gray-700">Success Response:</h5>
            <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto">
{
    "status": true,
    "code": 200,
    "data": {
        "RCSMessage": {
            "msgId": "302d5f43-bb30-45dc-9778-0a91521a95cb",
            "status": "failed",
            "timestamp": "2025-02-10T00:23:12.338"
        },
        "reason": {
            "text": "Number is rcs disabled or Bot is not launched with number's provider"
        }
    },
    "cached": false
}
            </pre>
          </div>
        </div>

        <!-- Best Practices & Support Section -->
        <div class="bg-gray-50 p-6 rounded-md shadow-md">
          <h5 class="font-semibold text-gray-700 text-xl mb-2">Best Practices</h5>
          <ul class="list-disc list-inside text-gray-600">
            <li>Always include proper error handling in your integration.</li>
            <li>Use idempotency keys for important messages to prevent duplicates.</li>
            <li>Validate phone numbers before sending.</li>
            <li>Keep messages within the 160-character limit.</li>
            <li>Handle rate limits appropriately in your application.</li>
          </ul>
          <h5 class="font-semibold text-gray-700 text-xl mt-4 mb-2">Support</h5>
          <p class="text-gray-500">For additional support or questions, please contact the KreativeRock support team.</p>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <h3 class="text-2xl font-bold text-gray-800 mb-6">API Playground</h3>
          <div class="space-y-6">
            <div class="space-y-4">
              <div>
                <label for="recipient" class="block text-gray-700 font-semibold">Recipient</label>
                <input type="text" id="recipient" class="w-full p-4 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500" placeholder="+2349156504412">
              </div>
              <div>
                <label for="message" class="block text-gray-700 font-semibold">Message</label>
                <textarea id="message" class="w-full p-4 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Your verification code is 123456"></textarea>
              </div>
              <button onclick="sendTestMessage()" class="bg-amber-500 text-white px-6 py-3 rounded-md hover:bg-amber-600 transition">Send Test Message</button>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-gray-700">Response</h4>
              <pre class="bg-gray-200 p-4 rounded-md text-gray-600 overflow-auto" id="playground-response">No response yet...</pre>
            </div>
          </div>
        </div>
      </div>

      <!-- API Playground -->
    </div>
  </div>
</div>




<div id="agreement" class=" mx-auto lg:w-4/5 2xl:w-3/5">
  <!-- Header Section -->
  <div class="flex items-center md:justify-between flex-wrap gap-2 mb-10">
    <h4 class="text-default-900 text-2xl font-semibold capitalize">Transactional API Service Agreement</h4>
  </div>

  <!-- Terms of Use Agreement Section -->
  <div class="card mx-auto px-5 py-5">
    <div class="card-body">
      <h3 class="text-2xl font-bold text-default-800">Terms of Use</h3>
      <p class="text-default-500 mb-10">By using the Transactional API Service, you agree to the following terms and conditions.</p>

      <!-- Introduction Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">Introduction</h4>
        <p class="text-gray-500">This Service Agreement (“Agreement”) outlines the terms and conditions under which you may access and use the Transactional API service provided by Kreative Rock. By purchasing and using the API service, you agree to comply with these terms and conditions. Please read this Agreement carefully before proceeding.</p>
      </div>

      <!-- Service Scope Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">Service Scope</h4>
        <p class="text-gray-500">The Transactional API allows you to send messages to your customers, based on transactional events such as purchases, order confirmations, and account notifications. The API provides the infrastructure and access for sending bulk or individual messages using specified communication channels (e.g., SMS, Email, etc.).</p>
      </div>

      <!-- User Responsibilities Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">User Responsibilities</h4>
        <ul class="list-disc pl-5 text-gray-500">
          <li>You must comply with all applicable laws and regulations, including data protection and privacy laws when using the API service.</li>
          <li>You are responsible for ensuring that your use of the API does not infringe on the rights of third parties, including intellectual property rights.</li>
          <li>You must not use the service for sending unsolicited or spam messages.</li>
          <li>You agree to maintain the confidentiality of any API keys or credentials provided by Kreative Rock.</li>
        </ul>
      </div>

      <!-- Terms of Service Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">Terms of Service</h4>
        <p class="text-gray-500">By accessing the API service, you agree to the following terms:</p>
        <ul class="list-disc pl-5 text-gray-500">
          <li>Kreative Rock provides the API service on an “as-is” basis, with no warranties or guarantees about uptime or message delivery.</li>
          <li>The service may be subject to limitations, such as message volume, message length, and API request limits. Please refer to the pricing and usage documentation for more details.</li>
          <li>Kreative Rock reserves the right to modify or discontinue the API service, in whole or in part, with or without notice.</li>
          <li>We may terminate your access to the API service if you violate any of these terms.</li>
        </ul>
      </div>

      <!-- Pricing and Payment Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">Pricing and Payment</h4>
        <p class="text-gray-500">You agree to pay for the API service according to the pricing structure outlined on our website or in your contract. Payments are due based on the chosen plan or subscription model. Failure to pay may result in suspension or termination of service.</p>
      </div>

      <!-- Data Privacy Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">Data Privacy</h4>
        <p class="text-gray-500">We value your privacy and are committed to protecting your data. By using the API service, you acknowledge that we may process your personal data in accordance with our Privacy Policy.</p>
      </div>

      <!-- Termination of Service Section -->
      <div class="mb-10">
        <h4 class="text-xl font-semibold">Termination of Service</h4>
        <p class="text-gray-500">You may terminate your use of the API service at any time by ceasing to use it and notifying Kreative Rock. We may terminate or suspend your access to the service for violation of these terms or for other reasons as outlined in our Terms of Service.</p>
      </div>

      <!-- Agreement Acceptance Section -->
      <div class="text-center mb-10">
        <p class="text-gray-500">By clicking “I Agree” below, you confirm that you have read, understood, and agreed to the terms and conditions of this Service Agreement.</p>
        <button id="goback" class="bg-red-500 mr-10 text-white px-6 py-2 rounded-md mt-4 cursor-pointer">Back</button>
        <button id="iagree" class="bg-green-500 text-white px-6 py-2 rounded-md mt-4 cursor-pointer">I Agree</button>
      </div>
    </div>
  </div> 
</div>