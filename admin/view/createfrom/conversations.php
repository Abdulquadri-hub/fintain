<!DOCTYPE html>

<head>
    <style>
        
        /* Animation for messages */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fadeInUp {
      animation: fadeInUp 0.4s ease;
    }
    
    .conversation-container .remove{
        display: none;
    }
    .conversation-container .add{
        display : flex;
    }
    </style>
</head>


<body>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- Conversation wrapper -->

<section class="conversation-wrapper py-4 px-2">
<!--Conversation Header  -->
<div class="conversation-header flex space-x-3 fixed top-[60px] sm:top-[100px] mr-[20px] bg-white shadow-md rounded-md mb-5 sm:mb-3 p-4">
  <div class="flex items-start"><i class="fa fa-commenting-o fa-2x"></i></div>
  
	<h2 class="text-lg font-bold">Welcome! Get the conversation going</h2>
  
</div>

<!-- Conversation state buttons -->

<div class="conversation-btns-wrap flex gap-3 mt-[3rem]">
	<button class="conversation-closed p-2 rounded-lg text-white text-sm font-medium bg-yellow-500">Closed</button>
	<button class="conversation-open p-2 rounded-lg text-white text-sm font-medium bg-blue-300">Open</button>
	<button class="conversation-contact p-2 rounded-lg text-white text-sm font-medium bg-slate-500">Get contacts</button>
</div>

<!-- Fetch Contacts -->
 <template class="contact-wrap mt-[2rem]">
	<div name="contacts-on-list grid col-1 sm:col-2 lg:grid-col-3" id="list-contact"></div>
 </template>

<!-- Conversation container -->
<div class="conversation-container flex flex-col mt-[2rem] mx-auto relative hidden">
    <div class="absolute top-1 right-4 mt-[1.5rem]"><i class="fa fa-close close-btn" style="font-size:16px;"></i></div>
<div class="fetch-conversation-wrap bg-white flex-1 p-4 overflow-y-auto mt-[1.7rem]"></div>
</div>

<!-- Conversation TextArea for typing conversation -->
 <div class="conversation-textarea-wrap flex flex-col gap-4 mt-[2rem]">
	<h3 class="text-sm font-extrabold mb-1">What can I help you with!</h3>
	<div class="textarea-btn-form py-5 px-4 rounded-lg border border-blue-600 flex flex-col">
		<textarea name="conversation-text" id="convo-text" class="conver-text w-full flex-1 focus:outline-none focus:ring-0 rounded-md bg-white border-none p-3" placeholder="Ask anything..."></textarea>
         <button class="convo-reply-btn bg-slate-800 hover:bg-slate-700 text-white text-sm p-2 rounded-lg rounded-md flex-1 flex items-center justify-center sm:self-end  mt-4" id="submit">Send</button>

	</div>

 </div>


</section>



</body>

</html>