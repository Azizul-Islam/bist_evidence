@extends('layouts.app')
@section('title','Projects')
@section('styles')
    <style>
       
    </style>
@endsection
@section('content')
<div class="px-3">  
    <div class="theme-container">  
        <div class="py-3">
            @if(count($newProjects) > 0)  
            <div class="mdc-card p-3 row between-xs middle-xs compare-toolbar">
                <h3 class="uppercase">New Project: {{ count($newProjects) }}</h3>  
                <div class="row center-xs middle-xs"> 
                    <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary mx-2">
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                    </button>
                    <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary mx-2"> 
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                    </button>  
                </div>  
                
            </div>
           
            <div class="compare-carousel mt-3">    
                <div class="swiper-container carousel-outer"> 
                    <div class="swiper-wrapper">
                        @foreach ($newProjects as $project)
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item" >
                                <div class="thumbnail-section">  
                                      
                                    <div class="property-image"> 
                                        <img src="{{ asset('backend/projects/'.$project->photo) }}" alt="project image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">{{ $project->title }}</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>{{ $project->address }}</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">BDT {{ number_format($project->price_start) }} TO {{ number_format($project->price_end) }}</span> 
                                            </div> 
                                           
                                        </div> 
                                       
                                    </div>  
                                </div> 
                            </div>                  
                        </div> 
                        @endforeach  
                    </div>  
                </div>
            </div>  
            @endif 
            @if(count($upcomingProjects) > 0)  
            <div class="mdc-card p-3 row between-xs middle-xs compare-toolbar">
                <h3 class="uppercase">Upcoming Projects: {{ count($upcomingProjects) }}</h3>  
                <div class="row center-xs middle-xs"> 
                    <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary mx-2">
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                    </button>
                    <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary mx-2"> 
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                    </button>  
                </div>  
                
            </div>
            <div class="compare-carousel mt-3">   
                <div class="swiper-container carousel-outer"> 
                    <div class="swiper-wrapper">
                        @foreach ($upcomingProjects as $project)
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item" >
                                <div class="thumbnail-section">  
                                      
                                    <div class="property-image"> 
                                        <img src="{{ asset('backend/projects/'.$project->photo) }}" alt="project image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">{{ $project->title }}</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>{{ $project->address }}</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">BDT {{ number_format($project->price_start) }} TO {{ number_format($project->price_end) }}</span> 
                                            </div> 
                                           
                                        </div> 
                                       
                                    </div>  
                                </div> 
                            </div>                  
                        </div> 
                        @endforeach  
                    </div>  
                </div>
            </div>  
            @endif 
            @if(count($ongoingProjects) > 0)
            <div class="mdc-card p-3 row between-xs middle-xs compare-toolbar">
                <h3 class="uppercase">On Going Project: {{ count($ongoingProjects) }}</h3>  
                <div class="row center-xs middle-xs"> 
                    <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary mx-2">
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                    </button>
                    <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary mx-2"> 
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                    </button>  
                </div>  
                
            </div>  
            <div class="compare-carousel mt-3">  
                <div class="swiper-container carousel-outer"> 
                    <div class="swiper-wrapper">
                        @foreach ($ongoingProjects as $project)
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item" >
                                <div class="thumbnail-section">  
                                      
                                    <div class="property-image"> 
                                        <img src="{{ asset('backend/projects/'.$project->photo) }}" alt="project image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">{{ $project->title }}</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>{{ $project->address }}</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">BDT {{ number_format($project->price_start) }} TO {{ number_format($project->price_end) }}</span> 
                                            </div> 
                                           
                                        </div> 
                                       
                                    </div>  
                                </div> 
                            </div>                  
                        </div> 
                        @endforeach  
                    </div>  
                </div>
            </div>  
            @endif 
        </div> 
    </div>  
</div> 
@endsection