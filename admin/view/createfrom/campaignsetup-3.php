<div class="2xl:w-5/6 mx-auto -translate-y-8">
    <div class="flex items-center justify-between">
        <div name="campaignname" class="font-bold text-lg xl:text-2xl"></div>
        <div class="flex items-center lg:justify-end  gap-2 py-4">
            <button type="button" name="submit" class="btn bg-dark text-white rounded-full">Create Campaign</button>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="rounded-3xl bg-gray-100/50 pt-7 h-[400px] xl:h-[500px] 2xl:h-[600px] overflow-hidden border relative">
            <div class="mx-auto w-[80%] md:w-[50%] lg:-translate-x-[20px]">
                <div class="relative">
                    <img src="./images/phone-mock-1.png" alt="Phone Mockup"
                        class="w-full h-[400px] xl:h-[500px] 2xl:h-[600px] rounded-md">
    
                        <div class="absolute top-[43px] w-[89%] left-[15px]">
                            <!-- Header -->
                            <div class="flex justify-between items-center w-full px-4 py-3 bg-gray-100 border-b">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                        stroke="currentColor" class="w-6 h-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    <div class="flex flex-col">
                                        <span class="font-semibold" name="inbox-sender">KreativeRock</span>
                                        <span class="text-xs text-green-600">online</span>
                                    </div>
                                </div>
                                <div class="flex space-x-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M4.5 4.5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h8.25a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3H4.5Z" />
                                        <path d="M19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Chat Messages -->
                            <div class="px-4 py-2 space-y-2 bg-gray-50 h-[calc(100vh-100px)] overflow-y-auto">

                                <!-- System Message -->
                                <div class="text-center text-gray-500 text-sm py-2">
                                    Today
                                </div>

                                <!-- Incoming Message -->
                                <div class="flex items-start space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                                        <p class="text-white text-xs" name="short-sender">KR</p>
                                    </div>
                                    <div class="max-w-[70%] bg-white rounded-lg p-3 shadow">
                                        <p class="text-gray-800 text-xs text-wrap" name="inbox-message">Here's a short preview from a message that came in.</p>
                                        <span class="text-gray-500 text-[10px] mt-1">9:41 AM</span>
                                    </div>
                                </div>

                                <!-- Outgoing Message -->
                                <div class="flex justify-end hidden">
                                    <div class="max-w-[70%] bg-green-500 rounded-lg p-3 shadow">
                                        <p class="text-white text-xs">I'm doing great! Just working on some projects.</p>
                                        <div class="flex items-center justify-end space-x-1 mt-1">
                                            <span class="text-green-100 text-[10px]">9:42 AM</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="16" height="15" class="fill-current text-green-100">
                                                <path d="M10.91 3.316l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                

                                <!-- Outgoing Message with Double Check -->
                                <div class="flex justify-end ">
                                    <div class="max-w-[70%] bg-green-500 rounded-lg p-3 shadow">
                                        <p class="text-white text-xs">Prompt</p>
                                        <div class="flex items-center justify-end space-x-1 mt-1">
                                            <span class="text-green-100 text-[10px]">9:43 AM</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="16" height="15" class="fill-current text-green-100">
                                                <path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033L6.127 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"/>
                                                <path d="M10.91 3.316l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

    <!-- Message Input -->
    <div class="absolute bottom-0 w-full bg-gray-100 p-4 border-t">
        <div class="flex items-center space-x-2">
            <input type="text" placeholder="Type a message" 
                   class="w-full px-4 py-2 rounded-full border focus:outline-none focus:border-green-500">
            <button class="p-2 rounded-full bg-green-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M3.478 2.405a.75.75 0 0 0-.926.94l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.405Z" />
                </svg>
            </button>
        </div>
    </div>
</div>
                </div>
            </div>
            <div class="bg-gray-50 py-3 absolute bottom-0 left-0 font-semibold text-xs text-center w-full">This is a visual
                preview of what it may look like</div>
        </div>
        <div>
            <div class="rounded-md bg-white">
                <form id="campaignform"> 
                    <div class="flex flex-col">
                         <div class="p-5">
                            <div class="font-bold text-base">Sender</div>
                            <div>The name your recipients see when they receive a message from you</div>
                            <div class="mt-5">
                                <div class="flex flex-col gap-1">
                                    <label class="text-default-800 text-sm font-bold inline-block lowercase first-letter:uppercase">Sender name</label>
                                    <input type="text" class="form-input" value="KreativeRock" readonly name="sender">
                                </div>
                            </div>
                        </div>
                        <div class="p-5 rounded-3xl border">
                            <div class="font-bold text-base">What to send</div>
                            <div>The message you wish to send to people</div>
                            <div class="mt-5">
                                <div class="flex flex-col gap-1">
                                    <label class="text-default-800 text-sm font-bold inline-block lowercase first-letter:uppercase">Message</label>
                                    <textarea rows="4" type="text" class="form-input resize-none" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                                <div class="font-bold text-base">Recipients</div>
                                <div>The people who will receive your SMS</div>
                                <div class="mt-5 flex gap-4">
                                    <!-- Card 1 -->
                                    <!-- <div id="card-contacts" onclick="showOption('contacts')" class="cursor-pointer border rounded-lg p-4 text-center w-1/2 hover:bg-gray-100">
                                        <div class="font-bold">Select List</div>
                                        <div class="text-sm text-gray-600">Choose from saved contacts</div>
                                    </div> -->
                                    
                                    <!-- Card 2 -->
                                    <!-- <div id="card-segment" onclick="showOption('segment')" class="cursor-pointer border rounded-lg p-4 text-center w-1/2 hover:bg-gray-100">
                                        <div class="font-bold">Select Segment</div>
                                        <div class="text-sm text-gray-600">Choose a predefined segment</div>
                                    </div> -->
                                </div>

                                <div class="mt-5">
                                    <!-- Contacts Section -->
                                    <!-- <div id="contacts-section" class="hidden">
                                        <div class="flex flex-col gap-1">
                                            <label class="text-default-800 text-sm font-bold inline-block lowercase first-letter:uppercase">Add Contacts</label>
                                            <div class="border rounded-md p-2 flex flex-wrap gap-2" name="contacts-selected">
                                                <span onclick="openContacts()" class="cursor-pointer inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-default-100 text-default-800">
                                                    <span class="w-1.5 h-1.5 inline-block bg-default-400 rounded-full"></span>
                                                    Select List
                                                </span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- Segment Section -->
                                    <div id="segment-section" class="">
                                        <div class="flex flex-col gap-1">
                                            <label class="text-default-800 text-sm font-medium inline-block">Choose Contact Segment</label>
                                            <select class="form-inputs" multiple name="segment_id" id="segment">
                                                <option value="">Select Segment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="p-5">
                            <div class="font-bold text-base">Send now or later</div>
                            <div>Choose the time for your message to be sent and reach your audience effectively.</div>
                            <div class="mt-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3" name="schedule-options">
                                    <div data-schedule="NOW" onclick="this.parentElement.parentElement.nextElementSibling.classList.add('hidden')" class="selected border-amber-500 rounded-md p-3 border transition hover:border-amber-500 cursor-pointer">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/><path d="m21.854 2.147-10.94 10.939"/></svg>
                                            <div class="font-bold">Send now</div>
                                        </div>
                                        <div class="mt-2">Send your campaign immediately to your recipients.</div>
                                    </div>
                                    <div data-schedule="LATER" onclick="this.parentElement.parentElement.nextElementSibling.classList.remove('hidden')" class="rounded-md p-3 border transition hover:border-amber-500 cursor-pointer">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
                                            <div class="font-bold">Send later</div>
                                        </div>
                                        <div class="mt-2">Schedule your campaign at a specific date and time.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1 mt-4 hidden p-5 rounded-md bg-gray-50 border">
                                <label class="text-default-800 text-sm font-bold inline-block lowercase first-letter:uppercase">Schedulate date</label>
                                <input type="datetime-local" id="scheduledate" name="scheduledate" class="form-input">
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="font-bold text-base">Repeat Campaign?</div>
                            <div>We can repeat this broadcast on a selected interval after first sending</div>
                        
                            <div class="flex flex-col gap-1 mt-5" name="repeat">
                                <label class="text-default-800 text-sm font-bold inline-block lowercase first-letter:uppercase">Repeat</label>
                                <select type="datetime-local" id="" name="repeatcampaign" class="form-input">
                                    <option value="NO REPEAT">Don't Repeat</option>
                                    <option value="DAILY">Daily</option>
                                    <option value="WEEKLY">Weekly</option>
                                    <option value="MONTHLY">Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center lg:justify-end  gap-2 py-5">
                            <button type="button" name="submit" id="submitcampaign" class="btn bg-dark text-white rounded-full">Create Campaign</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

<div>
    <div id="overlay-right"
        class="hs-overlay hs-overlay-open:translate-x-0 translate-x-full fixed top-0 right-0 transition-all duration-300 transform h-full max-w-xs w-full z-70 bg-white border-s border-default-200 hidden"
        tabindex="-1">
            <div class="relative overflow-y-auto h-full"> 
                <div
                    class="fixed top-0 bg-white w-full flex justify-between items-center py-3 px-4 border-b border-default-200">
                    <h3 class="text-lg font-bold text-default-600">
                        Contacts
                    </h3>
                    <button type="button" class="hover:text-default-900"
                        data-hs-overlay="#overlay-right">
                        <span class="sr-only">Close modal</span>
                        <i class="i-tabler-x text-lg"></i>
                    </button>
                </div>
                <div class="mt-10 p-4 text-default-600 overflow-y-auto">
                    <div class="mt-1 flex flex-col divide-y" name="contacts-list">
                        <div class="flex flex-col items-center justify-center py-5 gap-4">
                            <div class="font-medium">No Contacts.</div>
                            <a data-navigo href="contact/list" type="button" class="btn rounded-full border border-primary text-primary hover:bg-primary hover:text-white">Create Contact</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>