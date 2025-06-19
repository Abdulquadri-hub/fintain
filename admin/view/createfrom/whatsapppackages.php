<!DOCTYPE html>
<html lang="en">
<head>
  
  <style>
    #whatsappdialogBox::backdrop {
      background: rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
<section class="animate__animated animate__fadeIn">
    <!-- Page Title -->
    <p class="text-2xl font-bold text-center text-gray-800 mb-5">
        <span>Whatsapp Packages</span>
    </p>

    <!-- Navigation Tabs -->
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 mb-5">
        <li class="me-2 cursor-pointer updater optioner !text-blue-600 active" name="whatsapppackageform" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Create Package</p>
        </li>
        <li class="me-2 cursor-pointer viewer optioner" name="viewwhatsapppackages" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">View Packages</p>
        </li>
    </ul>

    <!-- Create Package Form -->
    <form id="whatsapppackageform" class="space-y-6 bg-white/90 p-8 rounded-2xl shadow-xl max-w-full mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Package Name -->
        <div class="form-group">
            <label class="block text-sm font-medium text-gray-700">Package Name</label>
            <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="whatsapppackagename" id="whatsapppackagename" placeholder="Enter package name">
        </div>

        <!-- Number of Units -->
        <div class="form-group">
            <label class="block text-sm font-medium text-gray-700">Number of Units</label>
            <input type="number" name="whatsappnumberofunits" id="whatsappnumberofunits" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500">
        </div>

        <!-- Cost per Unit -->
        <div class="form-group">
            <label class="block text-sm font-medium text-gray-700">Cost per Unit</label>
            <input type="number" inputmode="numeric" name="whatsappcostperunit" id="whatsappcostperunit" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end">
        <button type="button" id="whatsapppackage-submit" class="btn bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-lg mt-5 transition duration-300 ease-in-out transform hover:scale-105">
            <div class="btnloader hidden"></div>
            <span>Submit</span>
        </button>
    </div>
</form>


    <!-- View SMS Packages Section -->
    <div class="hidden" id="viewwhatsapppackages">
        <!-- Table -->
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="py-3 ps-4">
                                    <div class="flex items-center h-5">
                                        <input id="table-checkbox-all" type="checkbox" class="form-checkbox rounded">
                                        <label for="table-checkbox-all" class="sr-only">Checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Package</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Number of Units</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Cost/Unit</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tabledata" class="divide-y divide-gray-200">
                            <!-- Example Row -->
                            <!-- <tr>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <input type="checkbox" class="form-checkbox rounded">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">Package A</td>
                                <td class="px-6 py-4 text-sm text-gray-800">100</td>
                                <td class="px-6 py-4 text-sm text-gray-800">$5</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</button>
                                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg ml-2">Delete</button>
                                </td>
                            </tr> -->
                            <!-- More Rows Here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Pagination -->
        <div class="table-status flex justify-between items-center mt-6">
            <span class="text-xs text-gray-500" id="pagination-status">Showing 0 - 0 of 0</span>
            <div class="flex gap-4">
                <!-- Pagination Limit -->
                <select id="pagination-limit" class="form-control bg-white p-2 rounded-lg border border-gray-300 cursor-pointer">
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="150">150</option>
                    <option value="200">200</option>
                </select>

                <!-- Pagination Controls -->
                <div class="flex items-center gap-4">
                    <button type="button" id="pagination-prev-button" disabled class="bg-gray-300 text-gray-500 px-4 py-2 rounded-lg">Previous</button>
                    <span id="pagination-numbers" class="flex gap-2">
                        <button class="pagination-number bg-blue-600 text-white px-4 py-2 rounded-lg" page-index="1" type="button" aria-label="Page 1">1</button>
                    </span>
                    <button type="button" id="pagination-next-button" disabled class="bg-gray-300 text-gray-500 px-4 py-2 rounded-lg">Next</button>
                </div>
            </div>
        </div>
    </div>
    
    
  
  <!-- Dialog Element -->
  <dialog id="whatsappdialogBox" class="rounded-xl shadow-lg w-full max-w-sm p-6">
    <form method="dialog" id="whatsappdialogForm" class="space-y-4">
      <h2 class="text-lg font-semibold mb-2">Edit WHATSAPP Package Name</h2>
      <input
        type="text"
        name="editwhatsapppackagename"
        id="editwhatsapppackagename"
        placeholder="Sms package name"
        required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
      />
      <div class="flex justify-end space-x-2">
        <button type="button" id="whatsappcancelBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
          Cancel
        </button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Submit
        </button>
      </div>
    </form>
  </dialog>
  
</section>

</body>
</html>
