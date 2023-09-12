




@extends('layouts.master')
@section('title', 'Autoglass depot') @push('styles')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="./assets/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->

    

    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/pages/app-chat.css">
    <link rel="stylesheet" type="text/css" href="./assets/app-assets/css/pages/app-chat-list.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/assets/css/style.css">
<style>

.user-chats , .start-chat-area{
        background-image: none !important
}

.btn-transparent{
    box-shadow:none !important
}
.dropdown-toggle::after {
    display:none !important 
}
.custom-switch .custom-control-label::before,.custom-switch .custom-control-label::after {
    height:17px !important
}

.content-body{
height:auto !important
}

.chat-app-window{
    height:625px !important
}

.sidebar-left {
    height:625px !important;
    

}

.container-xxl{
    height: 625px !important; 
}

.chat-application { 
      padding: 23px !important;
    margin: 0px !important;}
    .content-right{
        width:100% !important
    }

    .chat-body p{
        color:white !important
    }

    .chat-left p{
        color:black !important
    }

    .chats{
        width:100%
    }

    .user-chats{
overflow:auto !important
    }

 
</style>


@endpush 

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content chat-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
           
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <!-- Main chat area -->
                        <section class="chat-app-window">
                            

                        <div class="active-chat">
                                <!-- Chat Header -->
                                <div class="chat-navbar" >
                                    <header class="chat-header" style="height:73px!important;text-align:center;justify-content:center;padding:5px">
                                        <div class="d-flex align-items-center">
                                           
                                            <div class="avatar avatar-border user-profile-toggle m-0 mr-1">
                                                <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0" style="    font-size: 17px;">Kristopher Candy</h6>
                                        </div>
                                        
                                    </header>
                                </div>
                                <!--/ Chat Header -->

                                <!-- User Chat messages -->
                                <div class="user-chats ps ps--active-y">
                                    <div class="chats">
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>How can we help? We're here for you! 😄</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Hey John, I am looking for the best admin template.</p>
                                                    <p>Could you please help me to find it out? 🤔</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>It should be Bootstrap 4 compatible.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Yesterday</div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Absolutely!</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Looks clean and fresh UI. 😃</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>It's perfect for my next project.</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>How can I purchase it?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Thanks, from ThemeForest.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>I will purchase it for sure. 👍</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>Thanks.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Great, Feel free to get in touch on</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>https://pixinvent.ticksy.com/</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                

                                <!-- Submit Chat form -->
                                <form class="chat-app-form" action="javascript:void(0);" onsubmit="enterChat();">
                                    <div class="input-group input-group-merge mr-1 form-send-message my-chat-from">
                                        
                                        <input type="text" class="form-control message" placeholder="Type your message or use speech to text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <label for="attach-doc" class="attachment-icon mb-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image cursor-pointer lighten-2 text-secondary"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                    <input type="file" id="attach-doc" hidden=""> </label></span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary send waves-effect waves-float waves-light" onclick="enterChat();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send d-lg-none"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                        <span class="d-none d-lg-block">Send</span>
                                    </button>
                                </form>
                                <!--/ Submit Chat form -->
                            </div>
                        </section>
                        <!--/ Main chat area -->

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->



</div>
@endsection

@push('scripts')
 <!-- BEGIN: Vendor JS-->
    <script src="./assets/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="./assets/app-assets/js/core/app-menu.js"></script>
    <script src="./assets/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="./assets/app-assets/js/scripts/pages/app-chat.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

@endpush


