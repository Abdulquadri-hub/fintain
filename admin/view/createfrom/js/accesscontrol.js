//let accesscontrolid;

let accesscontrolRole;
const accessctrl_user = ["PROFILE", "CHANGE PASSWORD", "SELECT USER", "DEACTIVATE USER"];

const access_array = [
    ['accessctrl_user', 'USER', accessctrl_user],
];

let accessPage = document.querySelector(".access-page");
let accessHeadingContent = document.querySelector(".access-heading-content");
let adminBtn = document.querySelector(".admin-btn ");
let roleBtn = document.querySelector(".role-btn");
let permissionBtn = document.querySelector(".permission-btn");
let accessBodyContent = document.querySelector(".access-body-content");


// Creating variable for Role,Admin,Permission
let addRoleBtn = document.querySelector(".add-role-btn");
let addAdminBtn = document.querySelector(".add-role-btn");
let addPermissionBtn= document.querySelector(".add-permission-btn"); //Not used yet

//Role Elements
let dialogElement = document.querySelector(".role-modal");
let roleCancelBtn = document.querySelector(".role-cancel-btn");
let xCloseBtn = document.querySelector(".x-close-btn");
let roleSubmitBtn = document.querySelector(".role-submit-btn");

//Permission Elements
const permisssionSubmitBtn = document.querySelector(".permission-submit-btn");

let roles;

let permission = [];






async function accesscontrolActive() {
    
    accesscontrolRole = JSON.parse(sessionStorage.getItem("user"));
    if(accesscontrolRole.role !== "SUPERADMIN" && window.location.href === "/access" ){
        notification("You can't access this page", 0);
        window.location.href="./"
    }
    
    let content = {};
    
    content.admin = `<div class="admin-content">
     <div class="admin-header bg-gray-900 flex justify-between items-center p-3 rounded-[3px]">
     <p class="text-white">Manage Admins</p>
     
     <button type="button" class="add-admin-btn py-1 px-2 bg-green-700 rounded-[3px]" onclick="openAdminModal()">
     <div class="flex gap-2 text-white items-center ">
     <i class="fa fa-plus-circle" style="font-size:14px; color:white"></i>
     <p>Add New Admin</p>
     </div>
     </button>
     
     </div>
     <div class="manage-admin-body">
     
     </div>
    <div>`;
    
    content.role = `<div class="role-content">
     <div class="role-header bg-gray-900 flex justify-between items-center p-3 rounded-[3px]">
     <p class="text-white">Manage Roles</p>
     
     <button type="button" class="add-role-btn py-1 px-2 bg-green-700 rounded-[3px]" onclick="openRoleModal()">
     <div class="flex gap-2 text-white items-center ">
     <i class="fa fa-plus-circle" style="font-size:14px; color:white"></i>
     <p>Add New Role</p>
     </div>
     </button>
     
     </div>
    
    <div>`;
    
    content.permission = `<div class="permission-content">
     <div class="permision-header bg-gray-900 flex justify-between items-center p-3 rounded-[3px]">
     <p class="text-white">Manage Permissions</p>
     
     <button type="button" class="add-permission-btn py-1 px-2 bg-green-700 rounded-[3px]" onclick="openPermissionModal()">
     <div class="flex gap-2 text-white items-center">
     <i class="fa fa-plus-circle" style="font-size:14px; color:white"></i>
     <p>Add New Permission</p>
     </div>
     </button>
     
     </div>
     
    <div>`
    
    if(adminBtn){
        adminBtn.addEventListener("click", function(){
            accessBodyContent.innerHTML = content.admin;
            document.querySelector(".admin-body").classList.remove("hidden");
            document.querySelector(".role-body").classList.add("hidden");
            document.querySelector(".permission-body").classList.add("hidden");
            document.querySelector(".access-hero").style.display = "none";
        }, false)
    }
    
     if(roleBtn){
        roleBtn.addEventListener("click", function(){
            accessBodyContent.innerHTML = content.role;
            document.querySelector(".admin-body").classList.add("hidden");
            document.querySelector(".role-body").classList.remove("hidden");
            document.querySelector(".permission-body").classList.add("hidden");
            document.querySelector(".access-hero").style.display = "none";
        }, false)
    }
    
        if(permissionBtn){
        permissionBtn.addEventListener("click", function(){
            accessBodyContent.innerHTML = content.permission;
            document.querySelector(".admin-body").classList.add("hidden");
            document.querySelector(".role-body").classList.add("hidden");
            document.querySelector(".permission-body").classList.remove("hidden");
            document.querySelector(".access-hero").style.display = "none";
        }, false)
    };
    
// fetch user roles
    
 roles = [];
let exactPage = 1;
const rowsPerPage = 5;

async function getUserRole() {
  try {
    const response = await fetch("https://comeandsee.com.ng/kreativerock/admin/controllers/roles_and_permissions/handle?action=get_user_roles");

    if (!response.ok) {
      return notification("Couldn't get user roles", 0);
    }

    const result = await response.json();
    roles = result.data;

    renderTable(exactPage);
    renderPagination();
  } catch (err) {
    return notification(err.message, 0);
  }
}

function renderTable(page) {
  const tableBody = document.getElementById("table-body");
  if (tableBody) {
    tableBody.innerHTML = "";
  }

  let start = (page - 1) * rowsPerPage;
  let end = start + rowsPerPage;
  let pageRoles = roles.slice(start, end);

  pageRoles.forEach(role => {
    const row = document.createElement("tr");
    row.classList.add("hover:bg-gray-50");

    row.innerHTML = `
      <td class="px-4 py-2">
        <button class="flex gap-1 bg-green-600 text-white px-2 py-1 rounded">
          <span>+</span>
          <span>PERMISSION</span>
        </button>
      </td>
      <td class="px-4 py-2">${role.id}</td>
      <td class="px-4 py-2">${role.name}</td>
      <td class="px-4 py-2">Permission</td>
    `;

    tableBody.appendChild(row);
  });
}

function renderPagination() {
  const paginationContainer = document.getElementById("pagination");
  paginationContainer.innerHTML = "";

  const totalPages = Math.ceil(roles.length / rowsPerPage);

  // Prev button
  const prevBtn = document.createElement("button");
  prevBtn.textContent = "Prev";
  prevBtn.className = `px-3 py-1 rounded border mr-2 ${
    exactPage === 1 ? "bg-gray-500 text-white cursor-not-allowed" : "bg-gray-900 text-white hover:bg-gray-500 hover:text-white transition"
  }`;
  prevBtn.disabled = exactPage === 1;
  prevBtn.addEventListener("click", () => {
    if (exactPage > 1) {
      exactPage--;
      renderTable(exactPage);
      renderPagination();
    }
  });
  paginationContainer.appendChild(prevBtn);

  // Page number buttons
  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    btn.className = `px-3 py-1 rounded border mx-1 ${
      i === exactPage ? "bg-yellow-700 text-white" : "bg-white text-gray-300 hover:bg-yellow-500 hover:text-white transition"
    }`;
    btn.addEventListener("click", () => {
      exactPage = i;
      renderTable(exactPage);
      renderPagination();
    });
    paginationContainer.appendChild(btn);
  }

  // Next button
  const nextBtn = document.createElement("button");
  nextBtn.textContent = "Next";
  nextBtn.className = `px-3 py-1 rounded border ml-2 ${
    exactPage === totalPages ? "bg-gray-500 text-white" : "bg-gray-900 text-white hover:bg-gray-500 hover:text-white transition"
  }`;
  nextBtn.disabled = exactPage === totalPages;
  nextBtn.addEventListener("click", () => {
    if (exactPage < totalPages) {
      exactPage++;
      renderTable(exactPage);
      renderPagination();
    }
  });
  paginationContainer.appendChild(nextBtn);
}

// Initial  getUserRole fetch
getUserRole(); 



//fetch  user permission

let permissionExactPage = 1;
const permissionPerPage = 5;

async function getUserPermission() {
  try {
    const permissionResponse = await fetch("https://comeandsee.com.ng/kreativerock/admin/controllers/roles_and_permissions/handle?action=get_all_permissions");

    if (!permissionResponse.ok) {
      return notification("Couldn't get user permission", 0);
    }

    const permissionResult = await permissionResponse.json();
    permission.push(permissionResult.data);

    renderPermissionTable(permissionExactPage);
    renderPermissionPagination();
  } catch (err) {
    return notification(err.message, 0);
  }
}

function renderPermissionTable(page) {
  const tableBody = document.getElementById("permission-table-body");
  if (tableBody) {
    tableBody.innerHTML = "";
  }

  let start = (page - 1) * permissionPerPage;
  let end = start + permissionPerPage;
  let pagePermission
  if (!Array.isArray(permission)) {
  console.error("Expected permission to be an array, but got:", permission);
  return;
}else{
  pagePermission = permission.slice(start, end);
}
  const dateOptions = {
  year: 'numeric',
  month: 'long',
  day: 'numeric',
  
};

  pagePermission.forEach(permit => {
    const row = document.createElement("tr");
    row.classList.add("hover:bg-gray-50");
    

    

    row.innerHTML = `
      <td class="px-4 py-2">
        <button class="flex gap-2 bg-green-600 text-white px-2 py-1 rounded">
          <span role="button" class="permission-edit-btn rounded-[5px] bg-green-700 py-1 px-1"><i class="fa fa-pencil" style="color:white;"></i></span>
          <span role="button" class="permission-delete-btn rounded-[5px] bg-green-700 py-1 px-1"><i class="fa fa-trash" style="color:white;"></i></span>
          
        </button>
      </td>
      <td class="px-4 py-2">${permit.name}</td>
      <td class="px-4 py-2">${permit.email}</td>
      <td class="px-4 py-2">${permit.role}</td>
      <td class="px-4 py-2">${new Intl.DateTimeFormat('en-US', dateOptions).format(permit.created)}</td>
      
    `;

    tableBody.appendChild(row);
  });
}

function renderPermissionPagination() {
  const paginationContainer = document.getElementById("permission-pagination");
  paginationContainer.innerHTML = "";

  const totalPages = Math.ceil(roles.length / permissionPerPage);

  // Prev button
  const prevBtn = document.createElement("button");
  prevBtn.textContent = "Prev";
  prevBtn.className = `px-3 py-1 rounded border mr-2 ${
    permissionExactPage === 1 ? "bg-gray-500 text-white cursor-not-allowed" : "bg-gray-900 text-white hover:bg-gray-500 hover:text-white transition"
  }`;
  prevBtn.disabled = permissionExactPage === 1;
  prevBtn.addEventListener("click", () => {
    if (permissionExactPage > 1) {
      permissionExactPage--;
      renderPermissionTable(permissionExactPage);
      renderPermissionPagination();
    }
  });
  paginationContainer.appendChild(prevBtn);

  // Page number buttons
  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    btn.className = `px-3 py-1 rounded border mx-1 ${
      i === permissionExactPage ? "bg-yellow-700 text-white" : "bg-white text-gray-300 hover:bg-yellow-500 hover:text-white transition"
    }`;
    btn.addEventListener("click", () => {
      permissionExactPage = i;
      renderPermissionTable(permissionExactPage);
      renderPermissionPagination();
    });
    paginationContainer.appendChild(btn);
  }

  // Next button
  const nextBtn = document.createElement("button");
  nextBtn.textContent = "Next";
  nextBtn.className = `px-3 py-1 rounded border ml-2 ${
    permissionExactPage === totalPages ? "bg-gray-500 text-white" : "bg-gray-900 text-white hover:bg-gray-500 hover:text-white transition"
  }`;
  nextBtn.disabled = permissionExactPage === totalPages;
  nextBtn.addEventListener("click", () => {
    if (permissionExactPage < totalPages) {
      permissionExactPage++;
      renderPermissionTable(exactPage);
      renderPermissionPagination();
    }
  });
  paginationContainer.appendChild(nextBtn);
}

// Initial user permission fetch
getUserPermission(); 



}

// accessControlActive function ends here




//OpenRoleModal

function openRoleModal(){
 
    dialogElement.showModal();
        
}


let roleinputElement = document.querySelector(".role-input");
//closeRoleModal
const cancelRoleModal =()=>{
    roleinputElement.value ="";
    dialogElement.close();
}

//close role modal button interaction
xCloseBtn.addEventListener("click", cancelRoleModal);
roleCancelBtn.addEventListener("click", cancelRoleModal);

//integrating create role API




async function createRole() {
    
     //Role  input Elements
const roleInputElement = document.querySelector(".role-input");
  try {
    // Get the input value inside the function to reflect the current value
    let roleInputValue = roleInputElement.value.trim();
    let payload = new FormData();
    payload.append("name", roleInputValue);

    const existingError = roleInputElement.nextElementSibling;
    const errorElement = document.createElement("p");

    if (existingError && existingError.tagName === 'P') {
     roleInputElement.classList.remove("border-red-500");
    roleInputElement.classList.add("border-gray-500");
      existingError.remove();
    }

    if (roleInputValue === "" || roleInputValue.length <= 2) {
      roleInputElement.classList.add("border-red-500");
      errorElement.classList.add("roleInputError");
      errorElement.textContent = "Please fill in role name";
      errorElement.style.color = "red";
      errorElement.style.fontSize = "12px";
      roleInputElement.insertAdjacentElement('afterend', errorElement);
      notification("Fill in role name", 0);
      return;
    }

    const response = await fetch(
      "https://comeandsee.com.ng/kreativerock/admin/controllers/roles_and_permissions/handle?action=create_role",
      {
        method: "POST",
        body: payload,
      }
    );

    if (!response.ok) {
      return notification("Role creation failed, please try again!", 0);
    }

    const result = await response.json();
    notification("Role created successfully", 1);
    document.querySelector(".role-form-dialog").reset();
    roleInputElement.style.borderColor = "gray";
    const postError = roleInputElement.nextElementSibling;
    if (postError && postError.tagName === 'P') {
      postError.remove();
    }
    dialogElement.close();
    console.log("Role created successfully", result);
    return result;

  } catch (err) {
    return notification(err.message || "An unexpected error occurred", 0);
  }
}

roleSubmitBtn.addEventListener("click", function (e) {
  e.preventDefault();
  createRole();
});




//Admin Elements
const adminDialogElement = document.querySelector(".admin-modal");
const adminCancelBtn = document.querySelector(".admin-cancel-btn");
const adminCloseBtn = document.querySelector(".admin-close-btn");
const adminSubmitBtn = document.querySelector(".admin-submit-btn");


//OpenAdminModal

function openAdminModal(){
 
            adminDialogElement.showModal();
        
}

//closeAdminModal
function cancelAdminModal(){
   
    adminDialogElement.close();
}



//close Admin modal button interaction
adminCloseBtn.addEventListener("click", cancelAdminModal);
adminCancelBtn .addEventListener("click", cancelAdminModal)




//Permisssion Elements
const permissionDialogElement = document.querySelector(".permission-modal");
const permissionCancelBtn = document.querySelector(".permission-cancel-btn");
const permissionCloseBtn = document.querySelector(".permission-close-btn");
const permissionSubmitBtn = document.querySelector(".permission-submit-btn");


//OpenPermisssionModal

function openPermissionModal(){
 
            permissionDialogElement.showModal();
        
}

//closePermisssionModal
function cancelPermissionModal(){
   
    permissionDialogElement.close();
}



//close permission modal button interaction
permissionCloseBtn.addEventListener("click", cancelPermissionModal);
permissionCancelBtn.addEventListener("click", cancelPermissionModal);



//create Permission logic


async function createPermission() {
    
  const permissionInputElement = document.querySelector(".permission-input");
  try {
    // Get the input value inside the function to reflect the current value
    let permissionInputValue = permissionInputElement.value.trim();
     let permisssionPayload = new FormData();
     permisssionPayload.append("name",permissionInputValue);

    const permissionError = roleInputElement.nextElementSibling;
    const permissionErrorElement = document.createElement("p");

    if (permissionError && permissionError.tagName === 'P') {
     permissionInputElement.classList.remove("border-red-500");
    permissionInputElement.classList.add("border-gray-500");
      permissionError.remove();
    }

    if (permissionInputValue === "" || permissionInputValue.length <= 2) {
      permissionInputElement.classList.add("border-red-500");
      permissionErrorElement.classList.add("roleInputError");
      permissionErrorElement.textContent = "Please fill in role name";
      permissionErrorElement.style.color = "red";
      permissionErrorElement.style.fontSize = "12px";
      permissionInputElement.insertAdjacentElement('afterend', permissionErrorElement);
      notification("Fill in permission name", 0);
      return;
    }

    const permissionResponse = await fetch(
      "https://comeandsee.com.ng/kreativerock/admin/controllers/roles_and_permissions/handle?action=create_permission",
      {
        method: "POST",
        body: permisssionPayload, 
      }
    );

    if (!permissionResponse.ok) {
      return notification("Permission creation failed, please try again!", 0);
    }

    const permissionResult = await permissionResponse.json();
    notification("Permission created successfully", 1);
    document.querySelector(".permission-form-dialog").reset();
    permissionInputElement.style.borderColor = "gray";
    const permissionPostError = permissionInputElement.nextElementSibling;
    if (permissionPostError && permissionPostError.tagName === 'P') {
      permissionPostError.remove();
    }
    permissionDialogElement.close();
    console.log("Permission created successfully", permissionResult);
    return permissionResult;

  } catch (err) {
    return notification(err.message || "An unexpected error occurred", 0);
  }
}

permisssionSubmitBtn.addEventListener("click", function (e) {
  e.preventDefault();
  createPermission();
});

