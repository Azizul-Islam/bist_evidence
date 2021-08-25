<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            
        </style>
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    </head>
    <body class="antialiased">
    <section class="sectionOne">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-12 col-sm-12">
                    <span>Cell: 01738040305</span>
                </div>
                <div class="col-md-8 col-12 col-sm-12" style="text-align: center">
                    <span class="address">Head Office: Wirless Gate,T&T Road Gazipur</span>
                </div>
                <div class="col-md-2 col-12 col-sm-12">
                    <span><a href="">Sign up or login</a></span>
                </div>
            </div>
        </div>
    </section>
    <section class="sectionTwo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-md navbar-dark main-nav">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse flex-1">
                                <ul class="nav navbar-nav w-100">
                                    <li class="nav-item active custom-nav-item">
                                        <a class="nav-link" href="#">Home</a>
                                    </li>
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="#">New Projects</a>
                                    </li>
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="{{ route('frontend.add-property') }}">Add Property</a>
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="order-first order-md-0 d-flex justify-content-center">
                                <a class="navbar-brand mx-0" href="#"><img src="{{ asset('logo.png') }}" alt=""></a>
                            </div>
                            <div class="collapse navbar-collapse flex-1">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="#">Our Plan</a>
                                    </li>
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="#">Our Service</a>
                                    </li>
                                    <li class="nav-item custom-nav-item">
                                        <a class="nav-link" href="#">Agent Finder</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionThree">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('frontend/images/banner/banner1.jpg') }}" alt="First slide">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h5>This is Title</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui atque totam aut ea doloremque hic corporis</p>
                </div> --}}
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('frontend/images/banner/banner2.jpg') }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('frontend/images/banner/banner3.jpg') }}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section>

    <section class="sectionFour">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                <div class="title-area text-center">
                    <h2>Welcome To Thikana Properties & Developer Limited</h2>
                    <p>See How Thikana can help</p>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="servie-inner">
                    <img src="{{ asset('frontend/images/home/home.png') }}" alt="">
                    <div class="service-content">
                        <h4>Buy A home</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum recusandae nemo veritatis dicta, sapiente incidunt vel deserunt iure expedita minus, illo consectetur itaque sequi atque repudiandae quia perspiciatis libero. Ducimus.</p>
                        <a href="" class="btn btn-outline-info">Learn More...</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="servie-inner">
                    <img src="{{ asset('frontend/images/home/home.png') }}" alt="">
                    <div class="service-content">
                        <h4>Buy A home</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum recusandae nemo veritatis dicta, sapiente incidunt vel deserunt iure expedita minus, illo consectetur itaque sequi atque repudiandae quia perspiciatis libero. Ducimus.</p>
                        <a href="" class="btn btn-outline-info">Learn More...</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="servie-inner">
                    <img src="{{ asset('frontend/images/home/home.png') }}" alt="">
                    <div class="service-content">
                        <h4>Buy A home</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum recusandae nemo veritatis dicta, sapiente incidunt vel deserunt iure expedita minus, illo consectetur itaque sequi atque repudiandae quia perspiciatis libero. Ducimus.</p>
                        <a href="" class="btn btn-outline-info">Learn More...</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionFive">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                <div class="title-area text-center">
                    <h2>Our Properties</h2>
                </div>
                </div>
            </div>
            <div class="row">
                @foreach ($properties as $item)
                <div class="col-md-4">
                    <div class="property-inner">
                        <div class="box">
                            <div class="photo" style="background-image: url('{{ asset('backend/assets/properties/'.$item->photo) }}')">
                                <div class="desc text-center">{{ number_format($item->price,2) }} TK</div>
                            </div>
                            <div class="title">
                                <h5><a href="#">{{ Str::limit($item->title, 40, '...') }}</a></h4>
                                <p>{{ $item->address }}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
            {{ $properties->links('pagination::bootstrap-4') }}
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
