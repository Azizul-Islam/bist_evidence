@extends('layouts.app')
@section('title','Property Details')
@section('styles')
  
@endsection
@section('content')
    <div class="px-3">  
        <div class="theme-container">  
            <div class="page-drawer-container single-property mt-3"> 
                <div class="page-sidenav-content">
                    <div class="mdc-card row between-xs middle-xs p-3">             
                        <div>
                            <h2 class="uppercase">{{ $project->title }}</h2>
                            <p class="row flex-nowrap address mb-0">
                                <i class="material-icons text-muted">location_on</i>
                                <span class="fw-500 text-muted">{{ $project->address }}</span>
                            </p>
                        </div>
                        <div class="column mx-3"> 
                            <h2 class="primary-color price">
                                <span>{{ number_format($project->price_start,2) }} TO {{ number_format($project->price_end,2) }}</span> 
                            </h2>  
                        </div>
                        <button id="page-sidenav-toggle" class="mdc-icon-button material-icons text-muted d-md-none d-lg-none d-xl-none"> 
                            more_vert 
                        </button>
                    </div>
                    <div class="mdc-card p-3 mt-3" style="width:50%">
                        <div class="mdc-card property-item grid-item column-3 mb-3">
                            <div class="thumbnail-section">
                               
                                <div class="property-image"> 
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($project->images as $photo)    
                                            <div class="swiper-slide">
                                                <img src="{{ asset('frontend/assets/images/others/transparent-bg.png') }}" alt="slide image" data-src="{{ asset('backend/projects/'.$photo->path) }}" class="slide-item swiper-lazy">
                                                <div class="swiper-lazy-preloader"></div> 
                                            </div> 
                                            @endforeach
    
                                        </div>  
                                        <div class="swiper-pagination white"></div>  
                                        <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                        <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                    </div>  
                                </div> 
                               
                            </div>
                           
                        </div> 
                    </div>
                    <div class="mdc-card p-3 mt-3" > 
                        <div>
                            <p>
                                <h4>Project Title: {{ $project->title }}</h4><hr>
                            </p>
                           
                            {{-- <h2 class="uppercase text-center fw-500 mb-2">Description</h2>   --}}
                        </div>
                       
                        <p>
                           Location: {{ $project->address }}
                        </p>
                        <p>
                            Price: {{ number_format($project->price_start,2) }} TO {{ number_format($project->price_end,2) }} 
                        </p>
                        <p>{!! $project->description !!}</p>
                    </div>
                   
                </div>  
                <aside class="mdc-drawer mdc-drawer--modal page-sidenav">
                    <a href="#" class="h-0"></a>
                    
                </aside>
                <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            </div> 
        </div>  
    </div>  
    {{-- <div class="section mt-3">
        <div class="px-3">
            <div class="theme-container">
                <h1 class="section-title">Related properties</h1>  
                <div class="properties-carousel">   
                    <div class="swiper-container carousel-outer"> 
                        <div class="swiper-wrapper">  
                            @foreach ($relatedProperties as $property)
                                @include('frontend.pages.slider_property')
                            @endforeach
                        </div>  
                        <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                            <span class="mdc-fab__ripple"></span>
                            <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                        </button>
                        <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                            <span class="mdc-fab__ripple"></span>
                            <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                        </button> 
                    </div>
                </div> 
            </div>
        </div>   
    </div>   --}}
@endsection

@section('scripts')
   
@endsection