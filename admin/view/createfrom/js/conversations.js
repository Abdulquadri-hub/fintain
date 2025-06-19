//Getting the elements neeeded for conversation state buttons
const closedConversatnBtn = document.querySelector(".conversation-closed");
const openConversatnBtn = document.querySelector(".conversation-open");

//Getting the element neeeded for getting all contacts
const contactBtn = document.querySelector(".conversation-contact");


//function to get all created contact
function getContacts(){
    //Elements for Contacts
    const contactWrap = document.importNode(document.querySelector(".contact-wrap").content,true);
    const contactsFetchWrap= contactWrap.querySelector(".contacts-on-list");
  

    let data =[]
    const URL = "https://comeandsee.com.ng/kreativerock/admin/controllers/conversation/contacts"
    const fetchContactRequest = fetch(URL).then((response)=>{
        
        if(!response.ok) {
            notification("Contact not fetched, please retry!",0)
            return;
        }
        return response.json();
    }).then((result)=>{
        console.log(result);
        data =result;
        if(!data.length)  {
            notification("No contact, create your contact");
            
        }
        if(data.length){
            contactsFetchWrap.innerHtml =data.map((contact)=>{
        return `
        <div class="p-3 border border-slate-600 transition transform duration-200 ease-in-out hover:border-slate-300 hover:scale-105 hover:shadow-md rounded-md" data-contact="${contact.contact_id}" onclick="">
           <div class="flex gap-3">
             <div class="h-12 w-12 rounded-full bg-slate-800 text-white font-semibold">${contact.firstname.substring(0,1).toUpperCase()}${contact.lastname.substring(0,1).toUpperCase()}</div>
             <div class="flex flex-col gap-1">
                <p>${contact.firstname}${contact.lastname}</p>
                <p>${contact.email}</p>
             </div>
           </div>
           <div class="mt-[2rem]>
           <p>${contact.sms ? contact.sms : contact.whatsapp}</p>
           </div>
        </div>
        `
    })

              notification("Contacts fetched successfully")
              
        }
    });
              
}

// clicking the Get contact Button
contactBtn.addEventListener("click",getContacts);




//Elements for fetching conversation
const overallconvoWrap = document.querySelector(".conversation-container"); //The outer conversation container
const closeBtn = document.querySelector(".close-btn");
const convoBtnSend = document.querySelector("#submit"); //Submit button


//Elements for Typing message  and sending conversation
      const input =  document.getElementById('convo-text'); 
      const chatContainer = document.querySelector(".fetch-conversation-wrap"); 
      
      console.log(convoBtnSend,closeBtn,overallconvoWrap,input);
      
function sendMessage() {
    
    
     
      const message = input.value.trim();
      console.log(message);

      if (message !== "") {
        // Create message wrapper
        const messageWrapper = document.createElement('div');
        messageWrapper.className = 'flex justify-end animate-fadeInUp'; // Sent messages align right

        // Create message bubble
        const messageBubble = document.createElement('div');
        messageBubble.className = 'bg-green-200 p-2 rounded-lg max-w-xs my-2';
        
        // Message text
        const text = document.createElement('div');
        text.innerText = message;

        // Timestamp
        const timestamp = document.createElement('div');
        timestamp.className = 'text-xs text-gray-500 text-right mt-1';
        timestamp.innerText = getCurrentTime();

        messageBubble.appendChild(text);
        messageBubble.appendChild(timestamp);
        messageWrapper.appendChild(messageBubble);

        // Add to chat container
        chatContainer.appendChild(messageWrapper);

        // Clear input
        input.value = "";

        // Scroll to bottom
        chatContainer.scrollTop = chatContainer.scrollHeight;

        // Simulate a reply after 1.5 seconds
        setTimeout(receiveMessage, 1500);
      }
    }

    function receiveMessage() {
      const chatContainer = document.querySelector(".fetch-conversation-wrap");
      
      // Create message wrapper
      const messageWrapper = document.createElement('div');
      messageWrapper.className = 'flex justify-start animate-fadeInUp'; // Received messages align left

      // Create message bubble
      const messageBubble = document.createElement('div');
      messageBubble.className = 'bg-white p-2 rounded-lg max-w-xs my-2 shadow';

      // Message text
      const text = document.createElement('div');
      text.innerText = "This is an auto-reply from KreativeRock!";

      // Timestamp
      const timestamp = document.createElement('div');
      timestamp.className = 'text-xs text-gray-500 text-right mt-1';
      timestamp.innerText = getCurrentTime();

      messageBubble.appendChild(text);
      messageBubble.appendChild(timestamp);
      messageWrapper.appendChild(messageBubble);

      chatContainer.appendChild(messageWrapper);

      // Scroll to bottom
      chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function getCurrentTime() {
      const now = new Date();
      return now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0');
    }

    // Allow pressing Enter key to send
    const textArea =  document.getElementById('convo-text');
    textArea.addEventListener('keydown', (e)=>{

      if (e.code === 'Enter') {
        sendMessage();
        if( overallconvoWrap.classList.contains("hidden")){
        overallconvoWrap.classList.remove("hidden");
        }
      }
            console.log("Enter key pressed");
    })
    
    //Button clicked
    convoBtnSend.addEventListener("click", function(e){
 
        sendMessage();
        if( overallconvoWrap.classList.contains("hidden")){
         overallconvoWrap.classList.remove("hidden");
        }
        console.log("Button clicked");
    })

//Close button on the conversation fetched messages
   closeBtn.addEventListener("click", (e)=>{
    e.stopPropagation();
    overallconvoWrap.classList.add("hidden");
   })