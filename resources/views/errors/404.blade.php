<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.housekey-html.themeseason.com/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Oct 2021 12:10:44 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Thikana Properties</title> 
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/material-components-web.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">  
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/skins/blue.css') }}">  
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>
<body class="mdc-theme--background"> 
    <div class="spinner-wrapper" id="preloader">
        <div class="spinner-container">
            <div class="spinner-outer">
                <div class="spinner">
                    <div class="left mask">
                        <div class="plane"></div>  
                    </div>            
                    <div class="top mask">
                        <div class="plane"></div>
                    </div>
                    <div class="right mask">
                        <div class="plane"></div>  
                    </div>            
                    <div class="triangle">
                        <div class="triangle-plane"></div> 
                    </div>
                    <div class="top-left mask">
                        <div class="plane"></div>
                    </div>
                    <div class="top-right mask">
                        <div class="plane"></div>
                    </div>            
                </div>
                <p class="spinner-text">Thikana Properties</p> 
            </div>
        </div>
    </div>   
    <div class="row center-xs middle-xs h-100">
        <div class="col-xs-10 col-sm-8 col-md-4">
            <div class="mdc-card p-0 mdc-elevation--z6 box">
                <div class="bg-primary box-header">
                    <i class="material-icons mat-icon-xlg">error</i>
                    <h1 class="error">404</h1>
                </div>
                <div class="box-content">
                    <div class="mdc-card mdc-elevation--z8 box-content-inner">
                        <p class="box-text">Opps, it seems that this page does not exist.</p> 
                        <p class="box-text">If you are sure it should, search for it.</p>  
                        {{-- <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field">
                            <input class="mdc-text-field__input" placeholder="Enter search keyword...">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Search keyword</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>  --}}
                    </div>
                    <div class="box-footer"> 
                        <a href="{{ url('/') }}" class="mdc-button mdc-button--raised mx-1">
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons">home</i> 
                        </a> 
                        {{-- <a href="header-default.html" class="mdc-button mdc-button--raised mx-1">
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons">search</i> 
                        </a>   --}}
                    </div>
                </div>
            </div>          
        </div>
    </div> 
    <script src="{{ asset('frontend/js/libs/jquery.min.js') }}"></script> 
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script src="{{ asset('frontend/js/libs/material-components-web.min.js') }}"></script> 
    <script src="{{ asset('frontend/js/libs/swiper.min.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&amp;callback=initMap" async defer></script>
</body>

<!-- Mirrored from www.housekey-html.themeseason.com/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Oct 2021 12:10:44 GMT -->
</html> 