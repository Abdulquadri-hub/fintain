<div>
    <div class="mx-auto lg:w-4/5 2xl:w-3/5">
        <div class="flex items-center md:justify-between flex-wrap gap-2 mb-10">
            <h4 class="text-default-900 text-2xl font-semibold capitalize">Handle Promotional Campaign Responses</h4>
        </div>

        <div id="firstcard" class="card mx-auto px-5 py-5">
            <div class="card-body">
                <h3 class="text-2xl font-bold text-default-800">How Will You Handle Responses?</h3>
                <p class="text-default-500 mb-10">Choose whether you want to handle responses or feedback from your users automatically or manually. Select the method that suits your workflow best.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 lg:w-5/6" name="options">
                    <button data-type="automatic" type="button" data-hs-overlay="#overlay-right"
                        class="flex flex-col gap-2 rounded-md border p-3 group cursor-pointer hover:border-amber-500 border-gray-200">
                        <div class="h-16 w-16 rounded-full bg-amber-100 flex items-center justify-center">
                            <img src="./images/ci-1.png" class="w-8">
                        </div>
                        <div class="font-bold text-base text-left">Automated</div>
                    </button>
                    <button data-type="manual" type="button" data-hs-overlay="#overlay-right"
                        class="flex flex-col gap-2 rounded-md border p-3 group cursor-pointer hover:border-amber-500 border-gray-200">
                        <div class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center">
                            <img src="./images/ci-2.png" class="w-8">
                        </div>
                        <div class="font-bold text-base text-left">Manually</div>
                    </button>
                </div>
            </div>
        </div>

<div id="automate" class="hidden card mx-auto px-5 py-5">
    <h2 class="text-2xl font-bold text-default-800">Create Prompts</h2>
    <p class="text-default-500 mb-6">Enter prompts and expected responses for automation.</p>

    <form id="prompt-form">
        <!-- Container where new prompts will be added -->
        <div id="prompt-container">
            <div class="flex gap-4 mb-4 items-center prompt-row">
                <input type="text" name="prompt" placeholder="Enter Keyword" class="border p-2 w-1/3">
                <select name="responseType" class="border hidden p-2 w-1/3">
                    <option value="TEXT">Text</option>
                    <option value="EMAIL">Email</option>
                    <option value="AGE">Age</option>
                    <option value="PHONE">Phone</option>
                    <option value="OTHERS">Others</option>
                </select>
                <input type="text" name="expectedResponse" placeholder="Expected Response" class="border p-2 w-1/3">
                <button type="button" class="text-red-500 remove-prompt">🗑️</button>
            </div>
        </div>

        <button id="goback" class="mt-4 bg-red-400 text-white px-6 py-2 rounded">Back</button>
 
        <!-- Button to add more prompts -->
        <button type="button" class="mt-4 bg-green-500 text-white px-4 py-2 rounded" id="add-prompt">
            + Add Another Prompt
        </button>
        
        <button type="submit" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded">Next</button>
    </form>
</div>

        
        <div class="mt-10">
            <div class="mb-8">
                <h2 class="text-2xl font-semibold">Automated Response Handling</h2>
                <p class="text-gray-500">Set up automated responses to feedback or user interactions, so you can manage them seamlessly without manual intervention.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg border p-6 hover:border-amber-500 transition cursor-pointer">
                    <h3 class="text-lg font-semibold mb-2">Instant Reply</h3>
                    <p class="text-gray-500">Automatically respond to user inquiries with predefined messages or updates.</p>
                </div>

                <div class="bg-white rounded-lg border p-6 hover:border-amber-500 transition cursor-pointer">
                    <h3 class="text-lg font-semibold mb-2">Feedback Collection</h3>
                    <p class="text-gray-500">Set up an automated process to collect feedback from users after an interaction.</p>
                </div>

                <div class="bg-white rounded-lg border p-6 hover:border-amber-500 transition cursor-pointer">
                    <h3 class="text-lg font-semibold mb-2">Response Follow-Up</h3>
                    <p class="text-gray-500">Send automated follow-up messages based on user feedback or responses.</p>
                </div>

                <div class="bg-white rounded-lg border p-6 hover:border-amber-500 transition cursor-pointer">
                    <h3 class="text-lg font-semibold mb-2">Resolution Update</h3>
                    <p class="text-gray-500">Automatically notify users when their feedback or issues have been resolved.</p>
                </div>

                <div class="bg-white rounded-lg border p-6 hover:border-amber-500 transition cursor-pointer">
                    <h3 class="text-lg font-semibold mb-2">Campaign Feedback</h3>
                    <p class="text-gray-500">Automatically send surveys or polls to users about the promotional campaign they were part of.</p>
                </div>

                <div class="bg-white rounded-lg border p-6 hover:border-amber-500 transition cursor-pointer">
                    <h3 class="text-lg font-semibold mb-2">Personalized Follow-Up</h3>
                    <p class="text-gray-500">Send personalized follow-up emails based on user interaction or feedback.</p>
                </div>
            </div>
        </div>
    </div>
</div>
