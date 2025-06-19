<div class="table-content">
    <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
            <div class="border rounded-lg overflow-hidden">
                <!-- Filters Section -->
                <form id="managecampaignform" class="px-6 py-4 flex justify-between items-center space-x-4 bg-white shadow-sm rounded-lg mb-4">
                    <!-- Date Started Filter -->
                    <div class="flex items-center space-x-2">
                        <label for="start_date" class="text-sm font-medium text-gray-700">Date Started</label>
                        <input type="date" id="start_date" name="start_date" class="px-4 py-2 border border-blue-200 rounded-md text-sm text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Date Ended Filter -->
                    <div class="flex items-center space-x-2">
                        <label for="end_date" class="text-sm font-medium text-gray-700">Date Ended</label>
                        <input type="date" id="end_date" name="end_date" class="px-4 py-2 border border-blue-200 rounded-md text-sm text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Status Filter -->
                    <div class="flex items-center space-x-2">
                        <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="px-4 py-2 border border-blue-200 rounded-md text-sm text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Status</option>
                            <option value="completed">Completed</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <!-- submit button tailwind styled-->
                     <div class="flex justify-center items-center">
                        <button type="button" class="btn bg-yellow-500 text-white" id="submit">
                            <div class="btnloader" style="display: none;" ></div>
                            <span>Submit</span>
                        </button>
                    </div>
                </form>
                <!-- Table Section -->
                <table class="min-w-full divide-y divide-default-200">
                    <thead class="bg-default-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">S/N</th>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Campaign Name</th>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Type</th>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Date Created</th>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">response</th>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Status</th>
                            <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tabledata" class="divide-y divide-default-200"></tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
  