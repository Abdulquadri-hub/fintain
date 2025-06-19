 <?php
    session_start();
   
     
     
     if(!isset($_SESSION["user_id"]) && ($_SESSION["role"] !== "SUPERADMIN"))
{
	header('Location: /kreativerock/newadmin/view/login');
}

 ?>

<!DOCTYPE html>



<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>


  .role-modal::backdrop {
      background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black for the role-modal*/
      }
.admin-modal::backdrop{
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black for the admin-modal*/
}

.permission-modal::backdrop{
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black for the permission-modal*/
}



    </style>
</head>
<body>
  <div class="access-page">

    <div class="rounded-[6px] access-heading-content">
       <div class="border-[2px] border-gray-400 text-white px-3 py-4  flex flex-col sm:flex-row justify-normal sm:justify-between rounded-[6px]">
           <div class="container-heading font-semibold text-[0.9rem] md:text-[1.1rem] text-gray-600 ">Access Control</div>
           .<div class="access-buttons flex gap-4 mt-0 ">
               <button type="button" class="admin-btn bg-yellow-600 py-2 px-2 text-white rounded-[5px] text-[0.8rem] sm:text-[1rem]">Manage Admin</button>
               <button type="button" class="role-btn bg-yellow-600 py-2 px-2 text-white rounded-[5px] text-[0.8rem] sm:text-[1rem]">Role</button>
                <button type="button" class="permission-btn bg-yellow-600 py-2 px-2 text-white rounded-[5px] text-[0.8rem] sm:text-[1rem]">Permissions</button>
           </div>
       </div>
    </div>
    
    <section class="access-hero mt-3 my-4 flex gap-12 p-3">
        <h3 class="hero-heading w-[40%] md:w-[30%] text-lg font-semibold sm:text-lg md:text-2xl md:font-bold text-gray-600 self-center">Welcome! Create, manage and control roles and permission</h3>
        <div class="access-image-wrap w-[60%] md:w-[70%] rounded-[10px]">
            <img src="./images/Fingerprint-pana.svg" alt="picture showing an access control" class="w-[94%] md:w-[80%] h-[70%]-"/>
        </div>
    </section>
    <div class="access-body-content mt-[2rem]">
        
    </div>
    
    
    
    <!--Admin section-->
    <section class="admin-section">
    <!--Admin modal-->
    <dialog class="admin-modal relative w-[90%] rounded-[5px]">
    <form class="admin-form-dialog py-8 px-4" >
    <i role="button" class="fa fa-close admin-close-btn absolute top-2 sm:top-3 md:top-4 right-[1rem]" style="font-size:17px;"></i>
    <h4 class="text:lg md:text-xl">Admin Details</h4>
    <div class="admin-input-wrapper flex flex-col gap-3">
        <div class="admin-input-col flex gap-4 flex-col sm:flex-row md:flex-row">
            <input type="text" name="adminfirstname" id="admin-firstname" class="admin-firstname flex-1 py-1 px-1 mt-3 mb-1 rounded-[5px] border border-gray-500 border-[2px] outline-none ring-0 focus:ring-0 focus:ring-offset-0 text-[0.85rem]" placeholder="Add admin firstname"/>
            <input type="text" name="adminlastname" id="admin-lastname" class="admin-lastname flex-1 py-1 px-1 mt-3 mb-1 rounded-[5px] border border-gray-500 border-[2px] outline-none ring-0 focus:ring-0 focus:ring-offset-0 text-[0.85rem]" placeholder="Add admin lastname"/> 
        </div>
        <div class="admin-input-col flex gap-4 flex-col sm:flex-row md:flex-row">
            <input type="email" name="adminemail" id="admin-email" class="admin-email flex-1  px-1 mt-3 mb-1 rounded-[5px] border border-gray-500  outline-none ring-0 focus:ring-0 focus:ring-offset-0 text-[0.85rem]" placeholder="Add admin email"/> 
            <select id="admin-role-select" name="adminrole" class="border border-[2px] border-gray-500 rounded-[5px]">
                <option value="">Select admin role</option>
            </select>
            
            <input type="password" name="adminpassword" id="adminpassword" class="admin-password flex-1 py-1 px-1 mt-3 mb-1 rounded-[5px] border border-gray-500 border-[2px] outline-none ring-0 focus:ring-0 focus:ring-offset-0 text-[0.85rem]" placeholder="Add admin password"/>
            
            
        </div>
    </div>
    
    <div class="flex gap-3 justify-end mt-3">
    <button type="button" class="admin-cancel-btn border border-gray-300 py-2 px-1 rounded-[10px]">Cancel</button>
    <button type="button" class="admin-submit-btn py-2 px-2 bg-gray-700 rounded-[10px] text-white">Submit</button>
    </div>
    </form>
    </dialog>
    
    
    <!--Admin fetched content-->
    
    <div class="admin-body hidden">
     
     <div class="overflow-x-auto">
  <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-2"><i class="fa fa-cog"></i></th>
        <th class="px-4 py-2">Name</th>
        <th class="px-4 py-2">Email</th>
        <th class="px-4 py-2">Role</th>
        <th class="px-4 py-2">Date</th>
      </tr>
    </thead>
    <tbody id="admin-table-body" class="divide-y divide-gray-200">
    
      <!--Admin Rows will be injected here -->
    </tbody>
  </table>
</div>

<!-- Role Pagination Controls -->
<div class="flex justify-center mt-4 space-x-2" id="admin-pagination"></div>
   </div> 
    
    </section>
    
    
    
    <!--Role section-->
    <section class="role-section">
    
    <!--Role modal-->
    <dialog class="role-modal relative w-[90%] rounded-[5px]">
    <form class="role-form-dialog py-9 px-4">
    <i role="button" class="fa fa-close x-close-btn absolute top-2 sm:top-3 md:top-4 right-[1rem]" style="font-size:17px;"></i>
    <h4 class="text:lg md:text-xl">Role Details</h4>
    <input type="text" name="role" id="role" class="role-input w-full py-1 px-1 mt-3 mb-1 rounded-[5px] border border-gray-500 border-[2px] outline-none ring-0 focus:ring-0 focus:ring-offset-0 text-[0.85rem]" placeholder="Add role name"/>
    <div class="flex gap-3 justify-end mt-3">
    <button type="button" class="role-cancel-btn border border-gray-400 py-2 px-1 rounded-[10px]">Cancel</button>
    <button type="button" class="role-submit-btn py-2 px-2 bg-gray-700 rounded-[10px] text-white">Submit</button>
    </div>
    </form>
    </dialog>
    
     <div class="role-body hidden">
     
     <div class="overflow-x-auto">
  <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-2"><i class="fa fa-cog"></i></th>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Name</th>
        <th class="px-4 py-2">Permissions</th>
      </tr>
    </thead>
    <tbody id="table-body" class="divide-y divide-gray-200">
    
      <!--Role Rows will be injected here -->
    </tbody>
  </table>
</div>

<!-- Role Pagination Controls -->
<div class="flex justify-center mt-4 space-x-2" id="pagination"></div>

     
     
     </div>
    </section>
    
    
    
   <section class="permission-section">
    
    <!--Permission modal-->
    <dialog class="permission-modal relative w-[90%] rounded-[5px]">
    <form class="permission-form-dialog py-9 px-4">
    <i role="button" class="fa fa-close permission-close-btn absolute top-2 sm:top-3 md:top-4 right-[1rem]" style="font-size:17px;"></i>
    <h4 class="text:lg md:text-xl">Permission Details</h4>
    <input type="text" name="permission" id="permission" class="permission-input w-full py-1 px-1 mt-3 mb-1 rounded-[5px] border border-gray-500 border-[2px] outline-none ring-0 focus:ring-0 focus:ring-offset-0 text-[0.85rem]" placeholder="Add permission name"/>
    <div class="flex gap-3 justify-end mt-3">
    <button type="button" class="permission-cancel-btn border border-gray-400 py-2 px-1 rounded-[10px]">Cancel</button>
    <button type="button" class="permission-submit-btn py-2 px-2 bg-gray-700 rounded-[10px] text-white">Submit</button>
    </div>
    </form>
    </dialog>
    
    
    
    <div class="permission-body hidden">
     
     <div class="overflow-x-auto">
  <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-2"><i class="fa fa-cog"></i></th>
        <th class="px-4 py-2">Name</th>
        
      </tr>
    </thead>
    <tbody id="permission-table-body" class="divide-y divide-gray-200">
    
      <!--Permission Rows will be injected here -->
    </tbody>
  </table>
</div>

<!-- Permission Pagination Controls -->
<div class="flex justify-center mt-4 space-x-2" id="permission-pagination"></div>

     
     
     </div>
    
    </section>
    
</div>
</body>
</html>
