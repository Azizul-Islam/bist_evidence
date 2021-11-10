<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.housekey-html.themeseason.com/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Oct 2021 12:11:10 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Housekey</title> 
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/material-components-web.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">  
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('frontend/css/skins/blue.css') }}">  
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    @yield('styles') 
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
    <div class="options transition">
        <button id="options-toggle" class="mdc-button options-icon mdc-elevation--z0"> 
            <i class="material-icons m-0 palette">palette</i>
            <i class="material-icons m-0 close">close</i>
        </button>
        <div class="mdc-card column between-xs middle-xs">
            <div class="skin-primary blue" data-name="blue"></div>
            <div class="skin-primary green" data-name="green"></div>
            <div class="skin-primary red" data-name="red"></div>
            <div class="skin-primary pink" data-name="pink"></div>
            <div class="skin-primary purple" data-name="purple"></div>
            <div class="skin-primary grey" data-name="grey"></div> 
            <div class="skin-primary orange-dark" data-name="orange-dark"><div class="skin-secondary"></div></div> 
        </div> 
    </div> 
    <main class="h-100">   
       <div class="column center-xs middle-xs h-100 p-3 lock-screen">
            <form action="{{ route('agent.login') }}" class="row center-xs middle-xs" method="POST">
                @csrf
                <h3 class="name text-muted">{{ auth()->user()->name }}</h3>  
                @if(auth()->user()->photo == null)
                <img src="{{ asset('frontend/assets/agents/default_photo.png') }}" alt="user-image" width="50">
                @else
                <img src="{{ asset('frontend/assets/agents/'.auth()->user()->photo) }}" alt="user-image" width="50">
                @endif           
                <input  type="hidden" name="email" value="{{ auth()->user()->email }}"> 
                <input placeholder="Enter password" type="password" name="password"> 
                <button class="mdc-icon-button material-icons submit primary-color" type="submit">arrow_forward</button>  
                <a href="{{ route('agent.login') }}" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary primary-color normal">
                    Or sign in as a different user
                </a>  
            </form>
            <p class="time"></p> 
       </div>
    </main> 
    <script src="{{ asset('frontend/js/libs/jquery.min.js') }}"></script> 
    <script src="{{ asset('frontend/js/libs/material-components-web.min.js') }}"></script> 
    <script src="{{ asset('frontend/js/libs/swiper.min.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&amp;callback=initMap" async defer></script>
    @include('admin.includes.message')
    @yield('scripts')
</body>

<!-- Mirrored from www.housekey-html.themeseason.com/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Oct 2021 12:11:10 GMT -->
</html>