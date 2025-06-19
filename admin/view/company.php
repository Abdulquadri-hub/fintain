<?php
session_start();
if(!isset($_SESSION["user_id"]) && !isset($_SESSION["user_id"]))
{
	header('Location: login');
}

?>

<section class="animate__animated animate__fadeIn relative">
  <p class="page-title">
    <span>company</span>
  </p>

  <!-- Include Material Icons -->
  


  <!-- here is the tab navigation -->
  <ul
    class="flex cursor-pointer flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 cark:border-gray-700 cark:text-gray-400"
  >
    <!--<li id="rccview" class="me-2 cp viewer" onclick="did('cancelreservationform').classList.add('hidden');this.children[0].classList.add('active', '!text-blue-600');did('lostandfoundview').classList.remove('hidden');this.nextElementSibling.children[0].classList.remove('active', '!text-blue-600');">-->
    <li
      class="me-2 cp viewer optioner !text-blue-600 active"
      name="viewcompany"
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
      name="companyform"
      onclick="runoptioner(this)"
    >
      <p
        class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50"
      >
        Manage
      </p>
    </li>
  </ul>

<form id="companyform" class="hidden">
        <div class="flex flex-col space-y-3 bg-white/90 p-5 xl:p-10 rounded-sm">
            <input type="hidden" name="category" id="category" value="COMPANY">
            <div class="form-group">
              <label for="operatorname" class="control-label">Operator's Name</label>
              <input
                type="text"
                name="operatorname"
                id="operatorname"
                class="form-control comp"
                placeholder="Enter Operator's Name"
                maxlength="200"
                required
              />
            </div>
            <div class="form-group">
              <label for="companyname" class="control-label">Company Name</label>
              <input
                type="text"
                name="companyname"
                id="companyname"
                class="form-control comp"
                placeholder="Enter Company Name"
                maxlength="300"
                required
              />
            </div>
            <div class="form-group">
              <label for="natureofbusiness" class="control-label">Nature of Business</label>
              <textarea
                name="natureofbusiness"
                id="natureofbusiness"
                class="form-control comp"
                placeholder="Enter Nature of Business"
              ></textarea>
            </div>
            <div class="form-group">
              <label for="shopaddress" class="control-label">Shop Address</label>
              <input
                type="text"
                name="shopaddress"
                id="shopaddress"
                class="form-control comp"
                placeholder="Enter Shop Address"
                maxlength="300"
                required
              />
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
              <div class="form-group">
                <label for="shopnumber" class="control-label">Shop Number</label>
                <input
                  type="text"
                  name="shopnumber"
                  id="shopnumber"
                  class="form-control comp1"
                  placeholder="Enter Shop Number"
                  maxlength="30"
                  required
                />
              </div>
              <div class="form-group">
                <label for="phone" class="control-label">Phone Number</label>
                <input
                  type="tel"
                  name="phone"
                  id="phone"
                  class="form-control comp1"
                  placeholder="Enter Phone Number"
                  maxlength="40"
                  required
                />
              </div>
            </div>
            <div class="form-group">
              <label for="businessarea" class="control-label">Business Area</label>
              <input
                type="text"
                name="businessarea"
                id="businessarea"
                class="form-control comp"
                placeholder="Enter Business Area"
                maxlength="200"
              />
            </div>
            <div class="form-group">
              <label for="politicalward" class="control-label">Political Ward</label>
              <input
                type="text"
                name="politicalward"
                id="politicalward"
                class="form-control comp"
                placeholder="Enter Political Ward"
                maxlength="100"
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
    


  <div class="" id="viewcompany">
    <div class="table-content">
      <!--<p class="text-md font-semibold">Balance Brought Forward(B/F): <span id="bbf"></span></p>-->
      <table>
        <thead>
          <tr>
            <th style="width: 10px">s/n</th>
            <th>company NAme</th>
            <th>operator NAme</th>
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
