<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null)
{
	header('Location: login');
}

?>

<section class="animate__animated animate__fadeIn relative">
  <p class="page-title">
    <span>individual</span>
  </p>

  <!-- Include Material Icons -->
  


  <!-- here is the tab navigation -->
  <ul
    class="flex cursor-pointer flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 cark:border-gray-700 cark:text-gray-400"
  >
    <!--<li id="rccview" class="me-2 cp viewer" onclick="did('cancelreservationform').classList.add('hidden');this.children[0].classList.add('active', '!text-blue-600');did('lostandfoundview').classList.remove('hidden');this.nextElementSibling.children[0].classList.remove('active', '!text-blue-600');">-->
    <li
      class="me-2 cp viewer optioner !text-blue-600 active"
      name="viewindividual"
      onclick="runoptioner(this)"
    >
      <p
        class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50"
      >
        View
      </p>
    </li>
    <li
      id=""
      class="me-2 cp updater optioner"
      name="individualform"
      onclick="runoptioner(this)"
    >
      <p
        class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50"
      >
        Manage
      </p>
    </li>
  </ul>

    <form id="individualform" class="hidden">
            <div class="flex flex-col space-y-3 bg-white/90 p-5 xl:p-10 rounded-sm">
                <div class="form-group hidden">
                    <label for="category" class="control-label">Category</label>
                    <input
                        type="text"
                        name="category"
                        id="category"
                        class="form-control comp"
                        placeholder="Enter Category"
                        value="INDIVIDUAL"
                        readonly
                    />
                </div>
            <div class="form-group">
                <label for="residentName" class="control-label">Resident's Name</label>
                <input
                type="text"
                name="residentname"
                id="residentName"
                class="form-control comp"
                placeholder="Enter Resident's Name"
                required
                />
            </div>
            <div class="form-group">
                <label for="landlordName" class="control-label">Landlord's Name</label>
                <input
                type="text"
                name="landlordname"
                id="landlordName"
                class="form-control comp"
                placeholder="Enter Landlord's Name"
                required
                />
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="form-group">
                <label for="streetName" class="control-label">Street Name</label>
                <input
                    type="text"
                    name="streetname"
                    id="streetName"
                    class="form-control comp1"
                    placeholder="Enter Street Name"
                    required
                />
                </div>
                <div class="form-group">
                <label for="streetNumber" class="control-label">Street Number</label>
                <input
                    type="text"
                    name="streetnumber"
                    id="streetNumber"
                    class="form-control comp1"
                    placeholder="Enter Street Number"
                    required
                />
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="control-label">City</label>
                <input
                type="text"
                name="city"
                id="city"
                class="form-control comp"
                placeholder="Enter City"
                required
                />
            </div>
            <div class="form-group">
                <label for="state" class="control-label">State</label>
                <input
                type="text"
                name="state"
                id="state"
                class="form-control comp"
                placeholder="Enter State"
                required
                />
            </div>
            <div class="form-group">
                <label for="apartmentCategory" class="control-label">Category of Apartment</label>
                <input
                type="text"
                name="apartmentcategory"
                id="apartmentCategory"
                class="form-control comp"
                placeholder="Enter Category of Apartment"
                />
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="form-group">
                <label for="age" class="control-label">Age</label>
                <input
                    type="number"
                    name="age"
                    id="age"
                    class="form-control comp"
                    placeholder="Enter Age"
                />
                </div>
                <div class="form-group">
                <label for="gender" class="control-label">Gender</label>
                <select
                    name="gender"
                    id="gender"
                    class="form-control"
                    required
                >
                    <option value="" disabled selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label">Phone Number</label>
                <input
                type="tel"
                name="phone"
                id="phone"
                class="form-control comp"
                placeholder="Enter Phone Number"
                required
                />
            </div>
            <div class="form-group">
                <label for="politicalWard" class="control-label">Political Ward</label>
                <input
                type="text"
                name="politicalward"
                id="politicalWard"
                class="form-control comp"
                placeholder="Enter Political Ward"
                required
                />
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div></div>
                <div></div>
                <div class="flex justify-end mt-5">
                <button id="submit" type="button" class="btn">
                    <div class="btnloader" style="display: none"></div>
                    <span>Submit</span>
                </button>
                </div>
            </div>
        </div>
    </form>
    


  <div class="" id="viewindividual">
    <div class="table-content">
      <!--<p class="text-md font-semibold">Balance Brought Forward(B/F): <span id="bbf"></span></p>-->
      <table>
        <thead>
          <tr>
            <th style="width: 10px">s/n</th>
            <th>NAme</th>
            <th>tax number</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody id="tabledata">
          <tr>
            <td colspan="100%" class="text-center opacity-70">
              Table is empty
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="table-status"></div>
  </div>
</section>