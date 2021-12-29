@extends('layouts.admin-app')
@section('title', 'Property Edit')
@section('styles')
    <style>
        .mdc-icon-button{
            width: 48px !important;
        }
        .showImage{
            height: 80px;width:100px;margin-right:5px
        }
        
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/libs/material-components-web.min.css') }}">   
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> 
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
                            <h4>Edit Property</h4>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.properties.index') }}" class="btn btn-primary btn-icon"><i
                                    class="bi bi-arrow-left-circle"></i> Back To List</a>
                        </div>
                    </div>
                </div>
            </div>
            @if($errors)
            @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $error }}
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
                    <form action="{{ route('admin.properties.update',$property) }}" id="update_property"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="tab-content tab-content--active">  
                                <div class="row" id="sp-basic-form">  
                                <div class="col-xs-12 p-3">
                                    <h1 class="fw-500 text-center">Basic</h1>
                                </div> 
                                <div class="col-xs-12 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input name="title" value="{{ old('title',$property->title) }}" class="mdc-text-field__input @error('title') is-invlid @enderror"  type="text">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Title *</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>  
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea">
                                        <textarea class="mdc-text-field__input" rows="5" name="description" type="text">{{ old('description',$property->description) }}</textarea>
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
                                        <input class="mdc-text-field__input" type="text" name="price" value="{{ old('price',$property->price) }}">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Price *</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <select name="contract" required class="form-control" id="">
                                        <option value="">Select Contract *</option>
                                        {{-- <option value="pending" {{ $property->contract == 'pending' ? 'selected' : '' }}>Pending</option> --}}
                                        <option value="hot offer" {{ $property->contract == 'hot offer' ? 'selected' : '' }}>Hot Offer</option>
                                        <option value="open house" {{ $property->contract == 'open house' ? 'selected' : '' }}>Open House</option>
                                        <option value="no fees" {{ $property->contract == 'no fees' ? 'selected' : '' }}>No Fees</option>
                                        <option value="sold" {{ $property->contract == 'sold' ? 'selected' : '' }}>Sold</option>
                                    </select>
                                </div> 
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <select name="category_id" required class="form-control" id="category_id">
                                        <option value="">Select Category *</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" {{ $property->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if(isset($property->sub_category_id))
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <select name="sub_category_id" class="form-control" id="sub_category_id">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($subCategories as $item)
                                            <option value="{{ $item->id }}" {{ $property->sub_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                @else
                                <div class="col-xs-12 col-sm-6 p-2 d-none" id="sub_category_div">
                                    <select name="sub_category_id" class="form-control" id="sub_category_id">
                                       
                                    </select>
                                </div> 
                                @endif    
                                <div class="col-xs-12 mt-2">  
                                    <input class="form-control" type="file" multiple name="photos[]" >
                                    <div class="mt-2">
                                        @foreach ($property->images as $item)
                                            <img src="{{ asset('backend/properties/'.$item->path) }}"  class="showImage" >
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <label class="">Purpose *</label><br>
                                    <input class="" type="radio" name="purpose" {{ $property->purpose == 'for sale' ? 'checked' : '' }} value="for sale" id="for sale"> <label for="for sale">For Sale</label>
                                    <input class="" type="radio" name="purpose" {{ $property->purpose == 'to rent' ? 'checked' : '' }} value="to rent" id="to rent"> <label for="to rent">To Rent</label>
                                    <input class="" type="radio" name="purpose" {{ $property->purpose == 'buy' ? 'checked' : '' }} value="buy" id="buy"> <label for="buy">Buy</label>
                                </div>
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <label class="">Completion Status *</label><br>
                                    <input class="" type="radio" name="completion_status" {{ $property->completion_status == 'ready' ? 'checked' : '' }} value="ready" id="ready"> <label for="ready">Ready</label>
                                    <input class="" type="radio" name="completion_status" {{ $property->completion_status == 'under constraction' ? 'checked' : '' }} value="under constraction" id="under constraction"> <label for="under constraction">Under Constraction</label>
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
                                    <h1 class="fw-500 text-center">Address *</h1>
                                </div> 
                                <div class="col-xs-12 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                        <i class="material-icons mdc-text-field__icon text-muted">location_on</i>
                                        <input class="mdc-text-field__input" required type="text" name="address" value="{{ old('address',$property->address) }}">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Address</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>  
                                </div>  
                                {{-- <div class="col-xs-12 p-2">
                                    <div id="contact-map"></div>
                                </div>  --}}
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <select name="area_id" required class="form-control" id="area_id">
                                        <option value="">Select Area *</option>
                                        @foreach ($areas as $item)
                                            <option value="{{ $item->id }}" {{ $property->area_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if(isset($property->sub_area_id))
                                <div class="col-xs-12 col-sm-6 p-2">
                                    <select name="sub_area_id" class="form-control" id="sub_area_id">
                                        <option value="">Select One</option>
                                        @foreach ($sub_areas as $item)
                                            <option value="{{ $item->id }}" {{ $property->sub_area_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else 
                                <div class="col-xs-12 col-sm-6 p-2 d-none" id="sub_area_div">
                                    <select name="sub_area_id" class="form-control" id="sub_area_id">

                                    </select>
                                </div>
                                @endif
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" type="text" value="{{ old('street',$property->street) }}" name="street">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Street</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-6 p-2">  
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" type="text" value="{{ old('zip_code',$property->zip_code) }}" name="zip_code">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Zip Code</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
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
                                        <input class="mdc-text-field__input" name="bedroom" type="number" value="{{ old('bedroom',$property->bedroom) }}">
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
                                        <input class="mdc-text-field__input" type="number" name="bathroom" value="{{ old('bathroom',$property->bathroom) }}" >
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
                                        <input class="mdc-text-field__input" type="number" name="garage" value="{{ old('garage',$property->garage) }}">
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
                                        <input class="mdc-text-field__input" type="number" name="size" value="{{ old('size',$property->size) }}">
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
                                        <input class="mdc-text-field__input" type="date" name="year_built"  value="{{ old('year_built',$property->year_built) }}">
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
                                       
                                        @foreach ($amenities as $item)
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox" value="{{ $item->id }}" name="amenity_id[]" @if(in_array($item->id,$propertyAmenities)) checked @endif class="mdc-checkbox__native-control" id="{{ $item->id }}"/>
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="{{ $item->id }}" >{{ $item->name }}</label>
                                        </div>
                                        @endforeach  
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
                                        
                                    </div>
                                    <div class="steps">
                                        <div class="step-section">
                                            <div class="row middle-xs">
                                                <div class="col-xs-1 text-center fw-500">
                                                    <span class="num"></span>
                                                </div>
                                                <div class="col-xs-10">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-12 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input class="mdc-text-field__input" name="video_link" type="text" value="{{ old('video_link',$property->video_link) }}">
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
                                            </div> 
                                        </div> 
                                    </div>  
                                </div> 
                                
                                <div class="col-xs-12 p-0 dynamic-steps">
                                    <div class="row middle-xs my-3 px-2">
                                        <p class="mb-0"><span class="uppercase fw-500">Plans</span></p>                            
                                        <button class="mdc-icon-button material-icons primary-color add-step" type="button" data-template-name="plans">add_circle</button>  
                                    </div>
                                    
                                   @foreach ($property->floorPlans as $i=>$floor)
                                   <div class="steps">
                                    <div class="step-section">
                                        <div class="row middle-xs">
                                            {{-- <div class="col-xs-1 text-center fw-500">
                                                <span class="num">{{ $i+1 }}</span>
                                            </div> --}}
                                            <div class="col-xs-10">
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-5 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input type="hidden" name="floor_id[]" value="{{ $floor->id }}" id="">
                                                            <input class="mdc-text-field__input" type="text" value="{{ old('floor_name',$floor->floor_name) }}" name="floor_name[]">
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
                                                            <input class="mdc-text-field__input" type="text" value="{{ old('floor_description',$floor->floor_description) }}" name="floor_description[]">
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
                                                            <input class="mdc-text-field__input" name="floor_size[]" value="{{ old('floor_size',$floor->floor_size) }}" type="number">
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
                                                            <input class="mdc-text-field__input" type="number" value="{{ old('floor_room',$floor->floor_room) }}" name="floor_room[]">
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
                                                            <input class="mdc-text-field__input" type="number" value="{{ old('floor_bath',$floor->floor_bath) }}" name="floor_bath[]">
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
                                                       <input type="file" name="floor_photo[]" class="floor_photo" data-id="{{ $floor->id }}"  class="form-control">
                                                        <div>
                                                            <img src="{{ asset('backend/properties/floor/'.$floor->floor_photo) }}" class="showImage" alt="">
                                                        </div>
                                                    </div>  
                                                </div> 
                                            </div>
                                            <div class="col-xs-1 text-center">
                                                <button class="mdc-icon-button material-icons warn-color remove-btn" data-url="{{ route('admin.floor.destroy',$floor->id) }}" data-id="{{ $floor->id }}" type="button">cancel</button> 
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                                   @endforeach 
                                   @if(count($property->floorPlans) == 0)
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
                                                            <input class="mdc-text-field__input" type="text" name="floor_name[]">
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
                                                            <input class="mdc-text-field__input" type="text" name="floor_description[]">
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
                                                            <input class="mdc-text-field__input" name="floor_size[]" type="number">
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
                                                            <input class="mdc-text-field__input" type="number" name="floor_room[]">
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
                                                            <input class="mdc-text-field__input" type="number" name="floor_bath[]">
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
                                                       <input type="file" name="floor_photo[]" class="form-control">
                                                    </div>  
                                                </div> 
                                            </div>
                                            <div class="col-xs-1 text-center">
                                                <button class="mdc-icon-button material-icons warn-color remove-step" type="button">cancel</button> 
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                                   @endif

                                </div>
                                <script id="plans" type="text/template">
                                    <div class="step-section">
                                        <div class="row middle-xs">
                                           
                                            <div class="col-xs-10">
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-5 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input" type="text" name="floor_name[]">
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
                                                            <input class="mdc-text-field__input" type="text" name="floor_description[]">
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
                                                            <input class="mdc-text-field__input" name="floor_size[]" type="number">
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
                                                            <input class="mdc-text-field__input" type="number" name="floor_room[]">
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
                                                            <input class="mdc-text-field__input" type="number" name="floor_bath[]">
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
                                                       <input type="file" name="floor_photo[]" class="form-control">
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
                                    @foreach ($property->features as $i=>$feature)
                                    <div class="steps">
                                        <div class="step-section">
                                            <div class="row middle-xs">
                                                {{-- <div class="col-xs-1 text-center fw-500">
                                                    <span class="num">{{ $i+1 }}</span>
                                                </div> --}}
                                                <div class="col-xs-10">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-5 p-2">  
                                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                                <input type="hidden" name="feature_id[]" value="{{ $feature->id }}" id="">
                                                                <input class="mdc-text-field__input" type="text" value="{{ old('feature_name',$feature->feature_name) }}" name="feature_name[]">
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
                                                                <input class="mdc-text-field__input" type="text" value="{{ old('feature_value',$feature->feature_value) }}" name="feature_value[]">
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
                                                    <button class="mdc-icon-button material-icons warn-color remove-feature-step" data-url="{{ route('admin.feature.destroy',$feature->id) }}" type="button">cancel</button> 
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>  
                                    @endforeach
                                    @if(count($property->features) == 0)
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
                                                                <input class="mdc-text-field__input" type="text" name="feature_name[]">
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
                                                                <input class="mdc-text-field__input" type="text" name="feature_value[]">
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
                                    @endif
                                </div> 
                                <script id="features" type="text/template">
                                    <div class="step-section">
                                        <div class="row middle-xs">
                                            
                                            <div class="col-xs-10">
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-5 p-2">  
                                                        <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input class="mdc-text-field__input" type="text" name="feature_name[]">
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
                                                            <input class="mdc-text-field__input" type="text" name="feature_value[]">
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
                                                <input type="checkbox" id="featured" {{ $property->is_featured == true ? 'checked' : '' }} name="is_featured" class="mdc-switch__native-control">
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
                                        <span class="mdc-button__label">Update</span> 
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
    <script src="{{ asset('frontend/js/libs/dropzone.js') }}"></script>  
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&amp;callback=initMap" async defer></script>  
    <script>
        $('#category_id').change(function() {
            var category_id = $(this).val();
            if (category_id != null) {
                $.ajax({
                    url: "/category/" + category_id + "/sub",
                    method: 'GET',
                    data: {
                        _token: "{{ csrf_token() }}",
                        category_id: category_id
                    },
                    success: function(response) {
                        var html_option = "<option value=''>--Sub Category--</option>";
                        if (response.status) {
                            $("#sub_category_div").removeClass('d-none');
                            $.each(response.data, function(id, name) {
                                html_option += "<option value='" + id + "'>" + name +
                                    "</option>";
                            });
                        } else {
                            $("#sub_category_div").addClass('d-none');
                        }
                        $("#sub_category_id").html(html_option);
                    }
                });
            }
        });
        $('#area_id').change(function() {
            var area_id = $(this).val();
            if (area_id != null) {
                $.ajax({
                    url: "/area/" + area_id + "/sub",
                    method: 'GET',
                    data: {
                        _token: "{{ csrf_token() }}",
                        area_id: area_id
                    },
                    success: function(response) {
                        var html_option = "<option value=''>--Sub Area--</option>";
                        if (response.status) {
                            $("#sub_area_div").removeClass('d-none');
                            $.each(response.data, function(id, name) {
                                html_option += "<option value='" + id + "'>" + name +
                                    "</option>";
                            });
                        } else {
                            $("#sub_area_div").addClass('d-none');
                        }
                        $("#sub_area_id").html(html_option);
                    }
                });
            }
        });
    </script>

    <script>
        //remove floor plans
        $(document).on('click','.remove-btn',function(){
            var c = confirm("Are you sure you want to permanently remove this record ?");
			if(! c){
				return false;
			}
            let id = $(this).data('id');
            let url = $(this).data('url');
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    toastr.success(data.msg);
                }
            });
            $(this).closest(".step-section").remove();
        });
        //remove feature
        $(document).on('click','.remove-feature-step',function(){
            var c = confirm("Are you sure you want to permanently remove this record ?");
			if(! c){
				return false;
			}
            let url = $(this).data('url');
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    toastr.success(data.msg);
                }
            });
            $(this).closest(".step-section").remove();
        });

        //update photo
        $(document).on('change','.floor_photo',function(){
            let photo = $(this)[0].files[0];
            let id = $(this).data('id');
            // let formData = new formData($('#update_property')[0]);
            // formData.append('photo',photo);
            // formData.append('id',id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.floor-photo.update') }}",
                method: "POST",
                dataType: 'JSON',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log(data);
                },
            });
        });
    </script>

@endsection
