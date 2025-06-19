<section class="animate__animated animate__fadeIn">
    
    
    
    
    
    
    
  
  
   <div class="whatsapp-transaction-history-section"> 
    <p class="page-title">
        <span>Whatsapp Units</span>
    </p>
    
    
         <div class="date-section  border border-gray-200 p-5 rounded my-5">
        <h2 class="text-gray-800 font-medium md:font-semibold text-lg md:text-2xl">Filter transaction by start to end date</h2>
        
       <div class="flex gap-3 flex-col sm:flex-row md:flex-row">
        <div class="date-wrapper flex-col sm:flex-row md:flex-row mt-3 md:mt-4 flex gap-3 w-[100%] sm:w-[80%] md:w-[80%]">
            <div class="flex flex-col md:flex-1">
                <p class="font-medium gray-300">Start Date</p>
                <input type="date"  class="start-date p-2 rounded" />
            </div>
            <div class="flex flex-col md:flex-1">
                <p class="font-medium gray-300">End Date</p>
                <input type="date"  class="end-date p-2 rounded" />
            </div>
        </div>
        
        <div class="w-[10%] sm:w-[20%] md:w-[20%] flex-1 flex items-end md:justify-end">
   
            <button class="filter-btn  text-white rounded text-lg py-1 px-3" style="background:orange;"><span>Submit</span></button>
      </div>
        
        </div> 
        
    </div>
    
    
    
    
    <div id="whatsappunitstable">
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">S/N</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Qty Bought</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Qty Used</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Amount</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Transaction Date</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Method</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Reference</th>
                            </tr>
                        </thead>
                        <tbody id="tabledata" class="divide-y divide-gray-200">
                            <!-- Example Row -->
                            <!-- <tr>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <input type="checkbox" class="form-checkbox rounded">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">1</td>
                                <td class="px-6 py-4 text-sm text-gray-800">50</td>
                                <td class="px-6 py-4 text-sm text-gray-800">25</td>
                                <td class="px-6 py-4 text-sm text-gray-800">$100</td>
                                <td class="px-6 py-4 text-sm text-gray-800">2025-02-08</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Credit</td>
                                <td class="px-6 py-4 text-sm text-gray-800">ABCD1234</td>
                            </tr> -->
                            <!-- More Rows Here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="table-status flex justify-around md:justify-between mt-5">
            <span class="text-xs text-gray-500" id="pagination-status">Showing 0 - 0 of 0</span>
            <span class=" flex justify-between gap-6">
                <span>
                    <select id="pagination-limit" class="form-control !bg-white cursor-pointer px-2">
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="70">70</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="200">200</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                        <option value="750">750</option>
                        <option value="1000">1000</option>
                        <option value="1500">1500</option>
                    </select>
                </span>
                <span class="flex pagination">
                    <button type="button" id="pagination-prev-button" disabled="true">previous</button>
                    <span id="pagination-numbers">
                        <button class="pagination-number" page-index="1" type="button" aria-label="Page 1">1</button>
                    </span>
                    <button type="button" id="pagination-next-button" disabled="true">next</button>
                </span>
            </span>
        </div>
    </div>
    </div>
    
    
    

    
</section>