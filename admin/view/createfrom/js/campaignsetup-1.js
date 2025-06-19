    let champaignParamss;
//Tab elements
    let tabs = document.querySelectorAll("[data-tab-value]"); 
    let tabContent = document.querySelectorAll("[data-tab-info]");

    console.log(tabs,tabContent);

 
 
 
     //Facebook Button
  
  
     let facebookLoginBtn = document.querySelector(".facebook-btn");
     console.log(facebookLoginBtn);


function campaignSetup1Active() {
    
    const cparams = JSON.parse(sessionStorage.getItem('c-params'));
    
    document.querySelector('[name="header"]').innerHTML = `
        <h4 class="text-default-900 text-lg sm:text-2xl font-semibold">Create a ${ cparams.campaignType } campaign</h4>
        <p class="text-sm sm:text-[14px]">Keep subscribers engaged by sharing your latest news, promoting your bestselling products, or announcing an upcoming event.</p>
    `
    document.querySelector('#submit').addEventListener('click', function() {
        this.disabled = true
        campaignSubmitHandler()
    })

    champaignParamss = JSON.parse(sessionStorage.getItem('c-params'))
     if(champaignParamss.campaignMedium === "sms"){
        smsElementsReturned()
    }
    if(champaignParamss.campaignMedium === "whatsapp"){
        whatsappElementsReturned()
        }
        
  
        
        
  if (facebookLoginBtn) {
    facebookLoginBtn.addEventListener("click", fetchFacebookLogin);
}
        
    
}


function toggleFacebookButton() {
    facebookLoginBtn.disabled = !tabs[2].classList.contains("active");
}



function campaignSubmitHandler() {
    if (!validateForm('campaignform', ['campaignname'])){
        document.querySelector('#submit').disabled = false
        return
    }
    
    const params = JSON.parse(sessionStorage.getItem('c-params'));
    params.campaignname = document.querySelector('[name="campaignname"]').value.trim()
    console.log(params);
    sessionStorage.setItem('c-params', JSON.stringify(params));
    
    
      // routes depending on campaign type
    if(params.campaignType == 'promotional')router.navigate('/campaign/setup/promotion')
    if(params.campaignType == 'transactional')router.navigate('/campaign/setup/transactional')
}

  
  
  
    // To remove tab if selected medium is SMS
   function smsElementsReturned(){
            
     document.querySelector(".tab-wrapper").classList.add("hidden");
     document.querySelector(".facebook-login-btn-wrapper").classList.add("hidden");
     document.querySelector("#campaignform").classList.remove("hidden");
    
   }
   
   
    
     // To add tab if selected medium is WHATSAPP
     function whatsappElementsReturned(){
            
     document.querySelector(".tab-wrapper").classList.remove("hidden");
         document.querySelector("#campaignform").classList.add("hidden");
        document.querySelector(".facebook-login-btn-wrapper").classList.remove("hidden");
    
     }
     
     


 
 
 
 //Active tab functionality




function switchTab(element){
    let name = element.getAttribute('name')
    for(let i=0;i<document.getElementsByClassName('optioner').length;i++){
            document.getElementsByClassName('optioner')[i].classList.remove('!text-blue-600', 'active')
        if(document.getElementsByClassName('optioner')[i].getAttribute('name') == name){
            document.getElementsByClassName('optioner')[i].classList.add('!text-blue-600', 'active');
            
             if(document.getElementsByClassName('optioner')[2].classList.contains("active")){
                facebookLoginBtn.disabled =false;
            }else{
                facebookLoginBtn.disabled =true;
            }
            document.getElementById(`${name}`).classList.remove('hidden');
           
        }else{
            document.getElementsByClassName('optioner')[i].classList.remove('!text-blue-600', 'active')
            document.getElementById(`${document.getElementsByClassName('optioner')[i].getAttribute('name')}`).classList.add('hidden')
        }
    }
     
}



//Facebook login implementation

// Make the facebook button inactive if the last tab link is not active
 
        
async function fetchFacebookLogin(){
    try{
        const response = await fetch("https://comeandsee.com.ng/kreativerock/admin/controllers/facebook/login");
        
        if (!response.ok) {
      
      notification("Campaign setup can't proceed, please retry!",0)
            return;
    }
   
    const data = await response.json();
    console.log(data,"facebook login button has been clicked");
    
    
    //elements to hide the tab and facebook login button
    const tabWrapper = document.querySelector(".tab-wrapper");
    const hiddenForm = document.querySelector("#campaignform");
    const facebookWrapper = document.querySelector(".facebook-login-btn-wrapper");
    console.log(tabWrapper,hiddenForm,facebookWrapper);
    
    if(data){
        notification("Campaign setup can now proceed",1);
        tabWrapper.classList.add("hidden");
        facebookWrapper.classList.add("hidden");
        hiddenForm.classList.remove("hidden");
   
    }
    
    
   
    
    
    // Creating an achor link for the facebook redirect
    const link = document.createElement("a");
    link.href = data.url;
    link.textContent = "Redirect to facebook";
    link.target = "_blank";
    facebookWrapper.appendChild(link);
    
    setTimeout(()=>{
        link.click();
    },50);
    facebookWrapper.removeChild(link);
    return data;
        
        
    }catch(err){
       return err.message; 
    }
} 


 


