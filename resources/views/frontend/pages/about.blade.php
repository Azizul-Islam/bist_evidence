@extends('layouts.app')
@section('title','about')
@section('content')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{ asset('frontend/assets/images/others/about.jpg') }}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-bottom">
        <h1 class="title">About Us</h1>
        <p class="desc">We help you for find your house key</p> 
    </div>
</div>  
<div class="px-3">  
    <div class="theme-container"> 
        <div class="mdc-card main-content-header pt-0"> 
            <div class="section pt-0">
                <div class="px-3">
                    <div class="theme-container">
                        <h1 class="section-title">our story</h1> 
                        <p class="px-3">Nam enim diam, euismod in tincidunt in, euismod nec ligula. Aliquam erat volutpat. Integer vulputate lacus a volutpat aliquet. Mauris suscipit sollicitudin purus, et congue lectus dignissim vel. Vestibulum purus arcu, eleifend a odio non, bibendum dictum lectus. Nam vulputate accumsan quam facilisis aliquet. Cras accumsan et elit a consequat.</p>
                        <div class="row"> 
                            <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                <div class="row start-xs middle-xs">
                                    <i class="material-icons mat-icon-xlg primary-color">business</i>
                                    <h2 class="capitalize fw-600 mx-2">About company</h2>
                                </div>                            
                                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper lobortis quam, id imperdiet mi feugiat quis. Cras a odio posuere, rhoncus quam vitae, commodo neque. Nunc mollis velit vulputate, volutpat diam vitae, egestas turpis. In posuere tempor lorem, sit amet pulvinar nunc accumsan a. Quisque sem tellus, congue at eleifend sit amet, consectetur sit amet est. Integer sodales quam quis elit commodo consequat. Aenean posuere augue a justo gravida elementum laoreet tincidunt enim. Nullam sagittis mauris id dui scelerisque, eget dignissim est hendrerit. Praesent fringilla commodo egestas. Suspendisse bibendum purus vitae mi mattis laoreet.</p>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                <div class="row start-xs middle-xs">
                                    <i class="material-icons mat-icon-xlg primary-color">list_alt</i>
                                    <h2 class="capitalize fw-600 mx-2">Vision</h2>
                                </div> 
                                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper lobortis quam, id imperdiet mi feugiat quis. Cras a odio posuere, rhoncus quam vitae, commodo neque. Nunc mollis velit vulputate, volutpat diam vitae, egestas turpis. In posuere tempor lorem, sit amet pulvinar nunc accumsan a. Quisque sem tellus, congue at eleifend sit amet, consectetur sit amet est. Integer sodales quam quis elit commodo consequat. Aenean posuere augue a justo gravida elementum laoreet tincidunt enim. Nullam sagittis mauris id dui scelerisque, eget dignissim est hendrerit. Praesent fringilla commodo egestas. Suspendisse bibendum purus vitae mi mattis laoreet.</p>
                            </div> 
                        </div>  
                    </div>
                </div>   
            </div>  
        </div>
    </div>  
</div> 
{{-- our mission part start --}}
@include('frontend.pages.our_mission')
{{-- our mission part end --}}

{{-- our service part start --}}
@include('frontend.pages.service')
{{-- our service part end --}}

 {{-- agents section start --}}
 @include('frontend.pages.agent')
 {{-- agents section end --}}
 
 {{-- clients section start --}}
 @include('frontend.pages.client')
 {{-- clients section end --}}
 
@endsection