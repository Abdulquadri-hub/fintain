<div class="card rounded-lg">
    <div class="card-body">
        <div class="table-content">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-default-200">
                            <thead class="bg-default-50">
                                <tr>
                                    <th scope="col" class="py-3 ps-4">
                                        <div class="flex items-center h-5">
                                            <input id="table-checkbox-all" type="checkbox"
                                                class="form-checkbox rounded">
                                            <label for="table-checkbox-all" class="sr-only">Checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">First&nbsp;Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Last&nbsp;Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Othernames</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Email</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Address</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Status</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabledata" class="divide-y divide-default-200">
                                 <tr>
                                    <td colspan="100%" class="text-center opacity-70 py-5"> Table is empty</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-status flex justify-between lg:items-end mt-10"></div>
        
        
        
     <div class="bg-gray-50 min-h-screen p-8 overflow-x-auto user-history hidden">
  <div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-6">
    <h1 class="text-xl md:text-3xl font-bold mb-6 text-left text-gray-800">💳 Transaction History</h1>

    <!-- Filters -->
    <div class="flex flex-wrap items-end gap-4 mb-6">
   
      <div>
        <label class="block text-sm font-semibold text-gray-600 mb-1">Start Date</label>
        <input type="date" id="start-date" onchange="renderTransactions()" class="border rounded px-3 py-2 w-[70%] sm:w-44  md:w-44">
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-600 mb-1">End Date</label>
        <input type="date" id="end-date" onchange="renderTransactions()" class="border rounded px-3 py-2  w-[70%] sm:w-44 md:w-44">
      </div>
    </div>

    <!-- Transaction Table -->
    <div class="overflow-x-auto border rounded shadow-sm">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-blue-100 text-blue-900 font-semibold">
          <tr>
            <th class="p-3 text-[13px] sm:text-sm md:text-sm">Date</th>
            <th class="p-3 text-red-600">Debt</th>
            <th class="p-3 text-green-600">Credit</th>
            <th class="p-3">Balance</th>
          </tr>
        </thead>
        <tbody id="transactions-body" class="bg-white divide-y divide-gray-200">
          <!-- Transactions will be inserted here -->
        </tbody>
      </table>
    </div>
  </div>

  
</div>
    </div>
    
    
    
    
    
</div>
