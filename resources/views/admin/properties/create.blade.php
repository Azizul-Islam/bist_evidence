@extends('layouts.admin-app')
@section('title', 'Property create')
@section('styles')
    <style>
        .mdc-icon-button{
            width: 48px !important;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/libs/swiper.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/material-components-web.min.css') }}">   
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> 
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/skins/blue.css') }}">   --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">  
@endsection
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Property</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">
                            <h4>Create Property</h4>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.properties.index') }}" class="btn btn-primary btn-icon"><i
                                    class="bi bi-arrow-left-circle"></i> Back To List</a>
                        </div>
                    </div>
                </div>
            </div>
            @if($errors->any())
            @foreach ($errors->any() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endforeach
            @endif
            <div class="py-3">
                <div class="mdc-card p-3"> 
                    <div class="mdc-tab-bar-wrapper submit-property">  
                        <div class="mdc-tab-bar mb-3">
                            <div class="mdc-tab-scroller">
                                <div class="mdc-tab-scroller__scroll-area">
                                    <div class="mdc-tab-scroller__scroll-content">
                                        <button class="mdc-tab mdc-tab--active" tabindex="0">
                                            <span class="mdc-tab__content">
                                            <span class="mdc-tab__text-label">Basic</span>
                                            </span>
                                            <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span>
                                        </button>
                                        <button class="mdc-tab mdc-tab" tabindex="0">
                                            <span class="mdc-tab__content">
                                            <span class="mdc-tab__text-label">Address</span>
                                            </span>
                                            <span class="mdc-tab-indicator mdc-tab-indicator">
                                            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span>
                                        </button> 
                                        <button class="mdc-tab mdc-tab" tabindex="0">
                                            <span class="mdc-tab__content">
                                            <span class="mdc-tab__text-label">Additional</span>
                                            </span>
                                            <span class="mdc-tab-indicator mdc-tab-indicator">
                                            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span>
                                        </button> 
                                        <button class="mdc-tab mdc-tab" tabindex="0">
                                            <span class="mdc-tab__content">
                                            <span class="mdc-tab__text-label">Media</span>
                                            </span>
                                            <span class="mdc-tab-indicator mdc-tab-indicator">
                                            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span>
                                        </button> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <form action="{{ route('admin.properties.store') }}" method="POST" >
                            @csrf
                        <div class="tab-content tab-content--active">  
                                <div class="row" id="sp-basic-form">  
                                <div class="col-xs-12 p-3">
                                    <h1 class="fw-500 text-center">Basic</h1>
                                </div> 
                                <div class="col-xs-12 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" name="title" value="{{ old('title') }}" type="text">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Title</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    
                                </div>  
                                <div class="col-xs-12 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea">
                                        <textarea class="mdc-text-field__input" rows="5" name="description" type="text"></textarea>
                                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Description</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Price ($)</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Price (€)</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text"></div>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property Type</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                <li class="mdc-list-item" data-value="1">Office</li>
                                                <li class="mdc-list-item" data-value="2">House</li>
                                                <li class="mdc-list-item" data-value="3">Apartment</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text"></div>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property Status</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                <li class="mdc-list-item" data-value="1">For Sale</li>
                                                <li class="mdc-list-item" data-value="2">For Rent</li>
                                                <li class="mdc-list-item" data-value="3">Open House</li>
                                                <li class="mdc-list-item" data-value="4">No Fees</li>
                                                <li class="mdc-list-item" data-value="5">Hot Offer</li>
                                                <li class="mdc-list-item" data-value="6">Sold</li>
                                            </ul>
                                        </div>
                                    </div> 
    
                                </div>  
                                <div class="col-xs-12 mt-2">  
                                    <label class="text-muted">GALLERY (max 8 images)</label> 
                                    <div id="property-images" class="dropzone needsclick">
                                        <div class="dz-message needsclick text-muted">    
                                            Drop files here or click to upload.
                                        </div>
                                    </div>  
                                </div>  
                                <div class="col-xs-12 p-2 mt-3 end-xs"> 
                                    <button class="mdc-button mdc-button--raised next-tab" type="button">
                                        <span class="mdc-button__ripple"></span> 
                                        <span class="mdc-button__label">Next</span> 
                                        <i class="material-icons mdc-button__icon">navigate_next</i>
                                    </button>  
                                </div>  
                            </div>  
                        </div> 
                    
                        <div class="tab-content"> 
                                <div id="sp-address-form" class="row">
                                <div class="col-xs-12 p-3">
                                    <h1 class="fw-500 text-center">Address</h1>
                                </div> 
                                <div class="col-xs-12 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                        <i class="material-icons mdc-text-field__icon text-muted">location_on</i>
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Location</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>  
                                </div>  
                                <div class="col-xs-12 p-2">
                                    <div id="contact-map"></div>
                                </div> 
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text"></div>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">City</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                <li class="mdc-list-item" data-value="1">New York</li>
                                                <li class="mdc-list-item" data-value="2">Chicago</li>
                                                <li class="mdc-list-item" data-value="3">Los Angeles</li>
                                                <li class="mdc-list-item" data-value="4">Seattle</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Zip Code</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text"></div>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Neighborhood</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                <li class="mdc-list-item" data-value="1">Astoria</li>
                                                <li class="mdc-list-item" data-value="2">Midtown</li>
                                                <li class="mdc-list-item" data-value="3">Chinatown</li>
                                                <li class="mdc-list-item" data-value="4">Austin</li>
                                                <li class="mdc-list-item" data-value="5">Englewood</li>
                                                <li class="mdc-list-item" data-value="6">Riverdale</li>
                                                <li class="mdc-list-item" data-value="7">Hollywood</li>
                                                <li class="mdc-list-item" data-value="8">Sherman Oaks</li>
                                                <li class="mdc-list-item" data-value="9">Highland Park</li>
                                                <li class="mdc-list-item" data-value="10">Belltown</li>
    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text"></div>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Street</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                <li class="mdc-list-item" data-value="1">Astoria Street #1</li>
                                                <li class="mdc-list-item" data-value="2">Astoria Street #2</li>
                                                <li class="mdc-list-item" data-value="3">Midtown Street #1</li>
                                                <li class="mdc-list-item" data-value="4">Midtown Street #2</li>
                                                <li class="mdc-list-item" data-value="5">Chinatown Street #1</li>
                                                <li class="mdc-list-item" data-value="6">Chinatown Street #2</li>
                                                <li class="mdc-list-item" data-value="7">Austin Street #1</li>
                                                <li class="mdc-list-item" data-value="8">Austin Street #2</li>
                                                <li class="mdc-list-item" data-value="9">Englewood Street #1</li>
                                                <li class="mdc-list-item" data-value="10">Englewood Street #2</li> 
                                                <li class="mdc-list-item" data-value="11">Riverdale Street #1</li>
                                                <li class="mdc-list-item" data-value="12">Riverdale Street #2</li>
                                                <li class="mdc-list-item" data-value="13">Hollywood Street #1</li>
                                                <li class="mdc-list-item" data-value="14">Hollywood Street #2</li>
                                                <li class="mdc-list-item" data-value="15">Sherman Oaks Street #1</li>
                                                <li class="mdc-list-item" data-value="16">Sherman Oaks Street #2</li>
                                                <li class="mdc-list-item" data-value="17">Highland Park Street #1</li>
                                                <li class="mdc-list-item" data-value="18">Highland Park Street #2</li>
                                                <li class="mdc-list-item" data-value="19">Belltown Street #1</li>
                                                <li class="mdc-list-item" data-value="20">Belltown Street #2</li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-xs-12 p-2 mt-3 between-xs"> 
                                    <button class="mdc-button mdc-button--raised prev-tab" type="button">
                                        <span class="mdc-button__ripple"></span> 
                                        <i class="material-icons mdc-button__icon">navigate_before</i>
                                        <span class="mdc-button__label">Back</span>  
                                    </button>
                                    <button class="mdc-button mdc-button--raised next-tab" type="button">
                                        <span class="mdc-button__ripple"></span> 
                                        <span class="mdc-button__label">Next</span> 
                                        <i class="material-icons mdc-button__icon">navigate_next</i>
                                    </button>  
                                </div>  
                               
                            </div>
                            
                        </div>
                        <div class="tab-content"> 
                                <div class="row" id="sp-additional-form">
                                <div class="col-xs-12 p-3">
                                    <h1 class="fw-500 text-center">Additional</h1>
                                </div>  
                                <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Bedrooms</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Bathrooms</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Garages</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Area (ft²)</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Year Built</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div>  
                                <div class="col-xs-12 mb-2 p-0"> 
                                    <p class="uppercase m-2 fw-500">Features</p>  
                                    <div class="features">
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="air-conditioning"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="air-conditioning">Air Conditioning</label>
                                        </div>    
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="barbeque"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="barbeque">Barbeque</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="dryer"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="dryer">Dryer</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="microwave"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="microwave">Microwave</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="refrigerator"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="refrigerator">Refrigerator</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="tv-cable"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="tv-cable">TV Cable</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="sauna"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="sauna">Sauna</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="wi-fi"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="wi-fi">WiFi</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="fireplace"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="fireplace">Fireplace</label>
                                        </div> 
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="gym"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="gym">Gym</label>
                                        </div>
                                    </div> 
                                </div>   
                                <div class="col-xs-12 p-2 mt-3 between-xs"> 
                                    <button class="mdc-button mdc-button--raised prev-tab" type="button">
                                        <span class="mdc-button__ripple"></span> 
                                        <i class="material-icons mdc-button__icon">navigate_before</i>
                                        <span class="mdc-button__label">Back</span>  
                                    </button>
                                    <button class="mdc-button mdc-button--raised next-tab" type="button">
                                        <span class="mdc-button__ripple"></span> 
                                        <span class="mdc-button__label">Next</span> 
                                        <i class="material-icons mdc-button__icon">navigate_next</i>
                                    </button>  
                                </div>  
                            </div> 
                        </div>
                        <div class="tab-content"> 
                                <div class="row"  id="sp-media-form">
                                <div class="col-xs-12 p-3">
                                    <h1 class="fw-500 text-center">Media</h1>
                                </div>  
                                <div class="col-xs-12 p-0 dynamic-steps">
                                    <div class="row middle-xs my-3 px-2">
                                        <p class="mb-0"><span class="uppercase fw-500">Videos</span><span class="text-muted mx-3">(video link to .mp4)</span></p>                            
                                        <button class="mdc-icon-button material-icons primary-color add-step" type="button" data-template-name="videos">add_circle</button>  
                                    </div>
                                    <div class="steps">
                                        <div class="step-section">
                                            <div class="row middle-xs">
                                                <div class="col-xs-1 text-center fw-500">
                                                    <span class="num">1</span>
                                                </div>
                                                <div class="col-xs-10">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-5 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Name</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="col-xs-12 col-sm-7 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Link</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                    </div> 
                                                </div>
                                                <div class="col-xs-1 text-center">
                                                    <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>  
                                </div> 
                                <script id="videos" type="text/template">
                                    <div class="step-section">
                                        <div class="row middle-xs">
                                            <div class="col-xs-1 text-center fw-500 number"></div>
                                            <div class="col-xs-10">
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-5 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Name</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-7 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Link</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                </div> 
                                            </div>
                                            <div class="col-xs-1 text-center">
                                                <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                            </div>
                                        </div> 
                                    </div>
                                </script> 
                                <div class="col-xs-12 p-0 dynamic-steps">
                                    <div class="row middle-xs my-3 px-2">
                                        <p class="mb-0"><span class="uppercase fw-500">Plans</span></p>                            
                                        <button class="mdc-icon-button material-icons primary-color add-step" type="button" data-template-name="plans">add_circle</button>  
                                    </div>
                                    <div class="steps">
                                        <div class="step-section">
                                            <div class="row middle-xs">
                                                <div class="col-xs-1 text-center fw-500">
                                                    <span class="num">1</span>
                                                </div>
                                                <div class="col-xs-10">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-5 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Name</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="col-xs-12 col-sm-7 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Desc</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="col-xs-12 col-sm-4 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Area (ft²)</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                        <div class="col-xs-12 col-sm-4 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Rooms</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                        <div class="col-xs-12 col-sm-4 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Baths</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                        <div class="col-xs-12 mt-2">  
                                                            <label class="text-muted">Image</label> 
                                                            <div id="plan-image-1" class="dropzone needsclick">
                                                                <div class="dz-message needsclick text-muted">    
                                                                    Drop file here or click to upload.
                                                                </div>
                                                            </div>  
                                                        </div>  
                                                    </div> 
                                                </div>
                                                <div class="col-xs-1 text-center">
                                                    <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>  
                                </div>
                                <script id="plans" type="text/template">
                                    <div class="step-section">
                                        <div class="row middle-xs">
                                            <div class="col-xs-1 text-center fw-500 number"></div>
                                            <div class="col-xs-10">
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-5 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Name</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-7 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Desc</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-4 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Area (ft²)</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                    <div class="col-xs-12 col-sm-4 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Rooms</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                    <div class="col-xs-12 col-sm-4 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Baths</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="col-xs-12 mt-2">  
                                                        <label class="text-muted">Image</label> 
                                                        <div id="plan-image" class="dropzone needsclick">
                                                            <div class="dz-message needsclick text-muted">    
                                                                Drop file here or click to upload.
                                                            </div>
                                                        </div>  
                                                    </div>  
                                                </div> 
                                            </div>
                                            <div class="col-xs-1 text-center">
                                                <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                            </div>
                                        </div> 
                                    </div>  
                                </script>  
                                <div class="col-xs-12 p-0 dynamic-steps">
                                    <div class="row middle-xs my-3 px-2">
                                        <p class="mb-0"><span class="uppercase fw-500">Additional features</span></p>                            
                                        <button class="mdc-icon-button material-icons primary-color add-step" type="button" data-template-name="features">add_circle</button>  
                                    </div>
                                    <div class="steps">
                                        <div class="step-section">
                                            <div class="row middle-xs">
                                                <div class="col-xs-1 text-center fw-500">
                                                    <span class="num">1</span>
                                                </div>
                                                <div class="col-xs-10">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-5 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Name</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="col-xs-12 col-sm-7 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input">
                                                                <div class="mdc-notched-outline">
                                                                    <div class="mdc-notched-outline__leading"></div>
                                                                    <div class="mdc-notched-outline__notch">
                                                                        <label class="mdc-floating-label">Value</label>
                                                                    </div>
                                                                    <div class="mdc-notched-outline__trailing"></div>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                    </div> 
                                                </div>
                                                <div class="col-xs-1 text-center">
                                                    <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>  
                                </div> 
                                <script id="features" type="text/template">
                                    <div class="step-section">
                                        <div class="row middle-xs">
                                            <div class="col-xs-1 text-center fw-500 number"></div>
                                            <div class="col-xs-10">
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-5 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Name</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-7 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label class="mdc-floating-label">Value</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                </div> 
                                            </div>
                                            <div class="col-xs-1 text-center">
                                                <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                            </div>
                                        </div> 
                                    </div>
                                </script>  
                                <div class="col-xs-12 py-3 row middle-xs">
                                    <div class="mdc-switch">
                                        <div class="mdc-switch__track"></div>
                                        <div class="mdc-switch__thumb-underlay">
                                            <div class="mdc-switch__thumb">
                                                <input type="checkbox" id="featured" class="mdc-switch__native-control">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="featured" class="mx-2">Featured</label>
                                </div>  
                                <div class="col-xs-12 p-2 mt-3 between-xs"> 
                                    <button class="mdc-button mdc-button--raised prev-tab" type="button">
                                        <span class="mdc-button__ripple"></span> 
                                        <i class="material-icons mdc-button__icon">navigate_before</i>
                                        <span class="mdc-button__label">Back</span>  
                                    </button>
                                    <button class="mdc-button mdc-button--raised " type="submit">
                                        <span class="mdc-button__ripple"></span> 
                                        <span class="mdc-button__label">Submit</span> 
                                        <i class="material-icons mdc-button__icon">navigate_next</i>
                                    </button>  
                                </div>  
                            </div>
                        </div>
                    </form>
                    </div>  
                   
                </div>
            </div> 
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    @include('admin.includes.message')
    <script src="{{ asset('frontend/js/libs/material-components-web.min.js') }}"></script> 
    {{-- <script src="{{ asset('frontend/js/libs/swiper.min.js') }}"></script>   --}}
    <script src="{{ asset('frontend/js/libs/dropzone.js') }}"></script>  
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&amp;callback=initMap" async defer></script>  

@endsection
