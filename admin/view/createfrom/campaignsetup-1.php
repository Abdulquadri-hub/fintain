<!DOCTYPE html>



<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        
.tab-container .tab-links{

	color:black
}
.tab-container .tab-links:hover{
   color:blue;
}














    </style>
</head>
<body>
  
<div class="mx-auto lg:w-3/5 2xl:w-2/5 card">
    <div class="card-body lg:p-10">
        <div class="flex flex-col gap-2 mb-8" name="header"></div>
        
        <!-- Creating of tab-->
        
        <div class="tab-wrapper hidden">
             <p class="text-xs my-2">Please go through the tabs below and be sure you meet the requirements before you proceed</p>
            <!--tab Links-->
            <div class="tab-container flex  gap-4 sm:gap-4 md:gap-6 lg:gap-6 shadow-md py-4 pl-2 items-center tabs">
                <div name="tab_1" class="optioner !text-blue-600 tab-links active flex flex-col sm:flex-row md:flex-row gap-1 sm:gap-2 md:gap-2 lg:gap-2 cursor-pointer hover:text-blue-500 items-center hover:p-1 sm:hover:p-3 hover:bg-gray-200 " onclick="switchTab(this)" >
                    <div class="first-tab h-4 w-4 rounded-full border text-xs font-light flex items-center justify-center self-start sm:self-normal md:self-normal lg:self-normal">1</div>
                    <p class="text-[10px] sm:text-xs font-light">Phone number</p>
                </div>
                <div name="tab_2" class="optioner tab-links flex flex-col sm:flex-row md:flex-row gap-1 sm:gap-2 md:gap-2 lg:gap-2 cursor-pointer hover:text-blue-500 items-center hover:p-1 sm:hover:p-3 hover:bg-gray-200 ml-2 md:ml-0" onclick="switchTab(this)" >
                    <div class="second-tab h-4 w-4 rounded-full border text-xs font-light flex items-center justify-center self-start sm:self-normal md:self-normal lg:self-normal">2</div>
                    <p class="text-[10px] sm:text-xs font-light">Facebook account</p>
                </div>
                 <div name="tab_3" class="optioner tab-links flex flex-col sm:flex-row md:flex-row gap-1 sm:gap-2 md:gap-2 lg:gap-2 cursor-pointer hover:text-blue-500 items-center hover:p-1 sm:hover:p-3 hover:bg-gray-200 ml-2 md:ml-0" onclick="switchTab(this)" >
                    <div class="third-tab h-4 w-4 rounded-full border text-xs font-light flex items-center justify-center self-start sm:self-normal md:self-normal lg:self-normal">3</div>
                    <p class="text-[10px] sm:text-xs font-light">Business info</p>
                </div>
            </div>
            
            <div class="outlett my-6">
                
               
                <!--Tab contents-->
                <div class="phonenumber-info tab-content tabs_tab" id="tab_1" data-tab-info>
                    <h3 class="mb-[1rem] text-sm font-bold">To use Whatsapp business, You must have a valid and a specially dedicated number</h3>
                    <div class="steps-required-wrap flex gap-3 flex-col">
                      <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-external-link" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">A verification code will be sent for you to verify your number</p>
                      </div>
                       <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-hand-stop-o" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">The phone number used must abide by specified criteria by Whatsapp Business <a href="https://faq.whatsapp.com/1344487902959714" target="_blank" ><span class="text-blue-700 cursor-pointer">See Criteria</span></a></p>
                      </div>
                         <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa  fa-link" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">The phone number should not be linked to another whatsapp Business</p>
                      </div>
                        
                    </div>
                </div>
            
              <div class="facebook-info tab-content tabs_tab hidden" id="tab_2" data-tab-info>
                        <h3 class="mb-[1rem] text-sm font-bold">A business email linked to your Facebook account is necessary</h3>
                    <div class="steps-required-wrap flex gap-3 flex-col">
                      <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-laptop" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">Authenticate facebook business account <a href="https://web.facebook.com/business/help/2058515294227817?id=180505742745347&_rdc=1&_rdr" target="_blank"><span class="text-blue-700 cursor-pointer">authenticate</span></a></p>
                      </div>
                       <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-code-fork" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">Generate a code and enter it on required field</p>
                      </div>
                         <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-close" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">Confirm and exit tab</p>
                      </div>
                        
                    </div>
                   </div>
                   
                     <div class="business-info tab-content tabs_tab hidden" id="tab_3" data-tab-info>
                             <h3 class="mb-[1rem] text-sm font-bold">Get your business info ready</h3>
                    <div class="steps-required-wrap flex gap-3 flex-col">
                      <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-laptop" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">Get your business legal name and address, and how you want your business displayed here</p>
                      </div>
                       <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-clone" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">A valid business website and make sure you verify your account with Meta, as it increases the number of messages per day and avoids un-needed account disabling</p>
                      </div>
                         <div class="flex gap-2 items-center">
                           <div class="bg-yellow-200 p-2 sm:p-3 rounded-[4px] flex items-center justify-center text-[10px]"><i class="fa fa-columns" style="font-size:14px;"></i></div> 
                            <p class="text-[10px] sm:text-xs">When your business account is verified it can be linked to more contact numbers than the limit of two </p>
                      </div>
                        
                    </div>
                      </div>
            </div>
        </div>
        
        <div class="facebook-login-btn-wrapper flex mt-2 py-2 justify-end hidden">
            <button class="facebook-btn py-2 px-4 rounded-full text-white bg-gray-700 " disabled>Facebook Login</button>
        </div>
    
         
        <form id="campaignform" class="hidden">
            <div class="flex flex-col gap-1">
                <label class="text-default-800 text-sm font-medium inline-block">Campaign Name</label>
                <input type="text" class="form-input" name="campaignname" id="campaignname">
            </div>
            
         <div class="flex items-center lg:justify-end gap-5 mt-10">
                <button type="button" onclick="window.history.back()" type="button" class="btn bg-light text-default-900 rounded-full">Back</button>
                <button id="submit" type="button" class="btn bg-dark text-white rounded-full">Create Campaign</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
