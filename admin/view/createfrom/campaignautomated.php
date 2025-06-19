<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background: #f3f4f6;
}

.prompt-row {
    transition: all 0.3s ease;
    background: linear-gradient(145deg, #ffffff 0%, #f9fafb 100%);
    border: 1px solid #e5e7eb;
}

.prompt-row:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

textarea,
input,
select {
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

textarea:focus,
input:focus,
select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.add-prompt-btn {
    background: #3b82f6;
    transition: all 0.3s ease;
}

.add-prompt-btn:hover {
    background: #2563eb;
    transform: scale(1.05);
}

.btn-remove {
    transition: all 0.3s ease;
}

.btn-remove:hover {
    color: #ef4444;
    /* transform: rotate(90deg); */
}
</style>

<div class="mx-auto lg:w-4/5 2xl:w-3/5 p-6">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2 flex capitalize gap-2">✨ Automate Your <span id="option">Loading...</span> Workflow</h2>
        <p class="text-gray-600">Create automated prompts with intelligent response handling</p>
    </div>

    <form id="prompt-form" class="space-y-8">
        <div id="prompt-container" class="space-y-6">
            <!-- Initial Prompt Card -->
            <div class="prompt-card prompt-row group relative overflow-auto">
                <div class="flex flex-col md:flex-row gap-4 items-start">
                    <div class="flex-1 w-full space-y-4">
                        <textarea class="message w-full p-3 rounded-lg bg-white resize-none"
                            placeholder="✍️ Enter your prompt..." rows="3"></textarea>

                        <select class="response-type w-full p-3 rounded-lg bg-white">
                            <option value="">Select Response Type</option>
                            <option value="KEYWORD">Keyword Match</option>
                            <option value="TEXT">Full Text Response</option>
                        </select>
                        <div class="dynamic-fields grid grid-cols-1 md:grid-cols-3 gap-4">

                                <!-- Keyword Fields (Hidden by default) -->
                                <div class="keyword-group hidden space-y-2 col-span-3">
                                    <div class="keyworder grid-cols-1 grid md:grid-cols-4 gap-2">
                                        <input type="text" class="keyword flex-1 border-[#D3D7E0] border-sm shadow-sm p-2 rounded-lg" placeholder="Keyword">
                                        <textarea type="text" class="expected-response border-[#D3D7E0] border-sm shadow-sm flex-1 p-2 rounded-lg col-span-2" style="resize: auto"
                                            placeholder="Expected Response"></textarea>
                                        <!-- <button type="button" class="btn-remove keyword-remove px-3">−</button> -->
                                        <button title="Delete row entry" class="btn-remove keyword-remove my-auto material-symbols-outlined rounded-full bg-red-600 h-8 w-8 text-white drop-shadow-md text-xs" style="font-size: 18px;" >delete</button>
                                    </div>
                                </div>

                                <!-- Text Response Field (Hidden by default) -->
                                <div class="text-response-group w-full hidden col-span-3">
                                    <textarea type="text" class="expected-response w-[90%] border-[#D3D7E0] border-sm shadow-sm p-3 rounded-lg" style="resize: auto;"
                                        placeholder="Expected Response"></textarea>
                                </div>
                        </div>
                    </div>

                    <div class="flex md:flex-col gap-2 md:absolute md:right-4 md:top-4">
                        <button type="button"
                            class="add-keyword px-3 py-1 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200">+
                            Keyword</button>
                        <button type="button"
                            class="btn-remove prompt-remove px-3 py-1 bg-red-100 text-red-600 rounded-lg hover:bg-red-200">🗑
                            Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-4">
            <button type="button" id="add-prompt-btn"
                class="add-prompt-btn text-white px-6 py-2 rounded-lg font-medium">
                ➕ Add New Prompt
            </button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700">
                🚀 Save Automation
            </button>
        </div>
    </form>
</div>