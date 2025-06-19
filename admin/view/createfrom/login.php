<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KreativeRock</title>

    <link rel="stylesheet" type="text/css" href="./auth/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./auth/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="./auth/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="./auth/css/iofrm-theme2.css">
    <link rel="stylesheet" href="./css/index.css">

    <!-- favicon -->
    <link href="../../assets/images/favicon.ico" rel="shortcut icon">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
    .login-dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }
    </style>

</head>

<body>
    <!--login dialog-->
    <dialog class="login-dialog bg-white rounded-[5px]">
        <div class="login-dialog-container py-3 px-4 flex flex-col items-center justify-center">
            <div class="py-2 px-2 rounded-full border-4 border-yellow-200 my-2 w-[50px] h-[50px] md:w-[60px] md:h-[60px] flex items-center justify-center">
                <i class="" style="font-size:2rem; color:yellow">i</i>
            </div>

            <div class="login-dialog--message my-1 w-[80%] md:w-[70%] flex items-center justify-center">
                <p class="text-sm text-gray-500 font-light text-center">Please, kindly click on the link we have sent to
                    your email address to verify your account. If you did not receive it in your inbox, please check
                    your spam folder.</p>
            </div>
            <div class="login-dialog-spam-message  mb-3 w-[90%] md:w-[80%] flex items-center justify-center">
                <p class="text-gray-900 italic  font-semibold text-center">Your email verification is required to
                    continue.</p>
            </div>

            <div class="login-dialog-btn-wrap mb-2">
                <button type="button"
                    class="login-dialog-btn px-3 py-2 rounded-[3px] bg-yellow-500 text-white">Ok</button>
            </div>
        </div>
    </dialog>



        <div class="form-body">
            <div class="iofrm-layout">
                <div class="img-holder">
                    <div class="bg" style="background-image: url('./auth/images/img2.jpg')"></div>
                </div>
                <div class="form-holder">
                    <!--  bg-gradient-to-br from-[#3d8185] to-[#072a2b] -->
                    <div class="form-content oveflow-scoll">
                        <div class="form-items -translate-y-[30px] lg:-translate-y-[0px]">
                            <div class="pb-5 flex items-center justify-center">
                                <img class="logo-size" src="../../images/logo.svg" alt="">
                            </div>

                            <h3>Welcome Back!</h3>
                            <p>Enter your credentials to login</p>
                            <div class="page-links">
                                <a href="login" class="active !bg-transparent">Login</a>
                                <a href="signup">Register</a>
                            </div>

                            <form id="loginform" autocomplete="off">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col gap-1">
                                        <input class="form-control bg-white !text-gray-900 !font-medium" autofocus="on"
                                            name="email" id="email" type="email" placeholder="doe@example.com" required>
                                    </div>

                                    <div class="flex flex-col relative gap-1">
                                        <input class="form-control bg-white !text-gray-900 !font-medium" name="password"
                                            id="password" type="password" placeholder="Password" required>
                                        <span id="pvisible"
                                            class="absolute cursor-pointer top-1/3 right-2 -translate-y-1/3">
                                            <svg class="w-6 h-6 text-gray-800" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="flex flex-col">
                                        <input type="checkbox" id="chk1"><label for="chk1">Remember me</label>
                                    </div>

                                    <div class="form-button">
                                        <button id="submit" type="button" class="ibtn">Login</button>
                                        <a href="password">Forget password?</a>
                                    </div>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="./js/util.js"></script>
        <script src="./js/login.js"></script>
</body>

</html>