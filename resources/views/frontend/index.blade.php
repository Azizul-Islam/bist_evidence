@extends('layouts.app')  
@section('styles')
    <style>
        .section.default:before{ 
        background-image: url('{{ asset("frontend/assets/images/others/default-bg.png") }}');
        background-repeat: repeat;
        background-size: 350px;
        background-position: center;
        opacity: 1;
        }
        .section.testimonials:before{ 
        background-image: url("{{ asset('frontend/assets/images/props/flat-1/3-big.jpg') }}"); 
        }
        .section.agents:before{ 
        background-image: url("{{ asset('frontend/assets/images/props/office-2/4-big.jpg') }}"); 
        }
    </style>
@endsection
@section('content')

    {{-- <div class="header-image-wrapper">
        <div class="bg bg-anime" style="background-image: url('{{ asset('frontend/assets/images/others/homepage.jpg') }}');"></div>
        <div class="mask"></div>            
        <div class="header-image-content home-page offset-bottom">
            <h1 class="title">Find your house key</h1>
            <p class="desc">Leading Real Estate Company</p>
            <div class="mt-4">
                <a href="{{ route('about') }}" class="mdc-button mdc-button--raised">
                    <span class="mdc-button__ripple"></span>
                    <span class="mdc-button__label">about us</span> 
                </a>
                <a href="{{ route('contact') }}" class="mdc-button mdc-button--raised">
                    <span class="mdc-button__ripple"></span>
                    <span class="mdc-button__label">contact</span> 
                </a>      
            </div>
        </div>
    </div>   --}}
    <div class="header-carousel offset-bottom">
        <div class="swiper-container h-100">
            <div class="swiper-wrapper h-100">
                @foreach ($properties as $item)
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="{{ asset('backend/properties/banner/'.$item->featured_image) }}">
                        <div class="swiper-lazy-preloader"></div> 
                        <span class="d-none" data-slide-title="{{ Str::limit($item->title,30,'...') }}"></span>
                        <span class="d-none" data-slide-location="{{ $item->address }}"></span>
                        <span class="d-none" data-slide-price="{{ number_format($item->price,2) }}"></span> 
                    </div> 
                </div>
                @endforeach  
                
            </div>     
            <button class="swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                <span class="mdc-fab__ripple"></span>
                <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
            </button>
            <button class="swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                <span class="mdc-fab__ripple"></span>
                <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
            </button>  
            <div class="slide-info column center-xs middle-xs">
                <div id="active-slide-info" class="mdc-card p-4 column center-xs middle-xs">
                    <h1 class="slide-title">Title</h1>
                    <p class="location row center-xs middle-xs"> 
                        <i class="material-icons mat-icon-lg primary-color">location_on</i>
                        <span class="px-1">Location</span>
                    </p> 
                    <a href="#" class="mdc-button mdc-button--raised price"> 
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">price</span>    
                    </a>                  
                </div>  
            </div>  
        </div>
    </div>
    <div class="px-3">  
        <div class="theme-container"> 
            <div class="mdc-card main-content-header">  
                <form action="{{ route('properties') }}" method="GET" id="filters" class="search-wrapper"> 
                    <div class="row">  
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                            
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
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                                    <ul class="mdc-list" id="category_id">
                                        <li class="mdc-list-item mdc-list-item--selected " value=""></li>
                                        @foreach ($categories as $category)
                                        <li class="mdc-list-item" value="{{ $category->id }}">{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>   
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
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
                                    <ul class="mdc-list" id="status">
                                        <li class="mdc-list-item mdc-list-item--selected" value=""></li>
                                        <li class="mdc-list-item" value="for sale">For Sale</li>
                                        <li class="mdc-list-item" value="to rent">For Rent</li>
                                        <li class="mdc-list-item" value="open house">Open House</li>
                                        <li class="mdc-list-item" value="noo fees">No Fees</li>
                                        <li class="mdc-list-item" value="hot offer">Hot Offer</li>
                                        <li class="mdc-list-item" value="sold">Sold</li>
                                    </ul>
                                </div>
                            </div> 

                        </div>   
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" name="price_range[]" id="price_range[]">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Price From</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" name="price_range[]" id="price_range[]">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Price To</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>  
                    </div>    
                     
                    <div class="row center-xs middle-xs p-2"> 
                        
                        <button class="mdc-button mdc-button--raised" id="searchBtn" type="submit">
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons mdc-button__icon">search</i>
                            <span class="mdc-button__label">Search</span> 
                        </button>  
                    </div>
                    
                </form> 
            </div>  
            @if(count($properties) > 0)
            <div class="properties-wrapper row"> 
                <div class="row start-xs middle-xs py-2 w-100"> 
                    <div class="mdc-chip-set"> 
                        <div class="mdc-chip bg-warn">
                            <div class="mdc-chip__ripple"></div>
                            <span>
                                <span role="button" tabindex="0" class="mdc-chip__text uppercase">{{ count($properties) }} found</span>
                            </span> 
                        </div>
                       
                    </div> 
                </div> 
                
                @foreach ($properties as $property)
                    @include('frontend.pages._single_property')
                @endforeach
                <div class="row center-xs middle-xs p-2 mt-2 w-100">                
                    <a href="{{ route('properties') }}" class="mdc-button mdc-button--raised">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">load more</span> 
                    </a>
                </div> 
            </div> 
            @endif
        </div>  
    </div> 
    {{-- our mission part start --}}
    @include('frontend.pages.our_mission')
    {{-- our mission part end --}}

    {{-- our service part start --}}
    @include('frontend.pages.service')
    {{-- our service part end --}}
    
    {{-- testimonials section start --}}
    @include('frontend.pages.testimonials')
    {{-- testimonials section end --}}
    
    @if(!blank($hotOfferProperty))
    <div class="section mt-3">
        <div class="px-3">
            <div class="theme-container">
                <h1 class="section-title">Hot offer today</h1>  
                <div class="mdc-card property-item list-item full-width-page">
                    <div class="thumbnail-section">
                        <div class="row property-status">
                            <span class="{{ $hotOfferProperty->purpose == 'for sale' ? 'green' : 'blue' }}">{{ $hotOfferProperty->purpose }}</span>
                                <span class="@if($hotOfferProperty->contract == 'no fees') orange @elseif ($hotOfferProperty->contract == 'open house') teal @elseif ($hotOfferProperty->contract == 'no fees') orange @elseif ($hotOfferProperty->contract == 'hot offer') red @else dark @endif">{{ $hotOfferProperty->contract }}</span>
                        </div> 
                        <div class="property-image"> 
                            <div class="swiper-container">
                                <div class="swiper-wrapper"> 
                                    @foreach ($hotOfferProperty->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/images/others/transparent-bg.png') }}') }}" alt="slide image" data-src="{{ asset('backend/properties/'.$image->path) }}" class="slide-item swiper-lazy">
                                        <div class="swiper-lazy-preloader"></div> 
                                    </div> 
                                    @endforeach
                                     
                                </div>  
                                <div class="swiper-pagination white"></div>  
                                <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                            </div>  
                        </div> 
                        <div class="control-icons">
                            <button class="mdc-button add-to-favorite" data-id="{{ $hotOfferProperty->id }}" data-url="{{ route('add-to-favorite') }}" title="Add To Favorite">
                                <i class="material-icons mat-icon-sm">favorite_border</i>
                            </button>
                            {{-- <button class="mdc-button" title="Add To Compare">
                                <i class="material-icons mat-icon-sm">compare_arrows</i>
                            </button>   --}}
                        </div>  
                    </div>
                    <div class="property-content-wrapper"> 
                        <div class="property-content">
                            <div class="content">
                                <h1 class="title"><a href="{{ route('property.details',$hotOfferProperty->slug) }}">{{ $hotOfferProperty->title }}</a></h1>
                                <p class="row address flex-nowrap">
                                    <i class="material-icons text-muted">location_on</i>
                                    <span>{{ $hotOfferProperty->address }}</span>
                                </p>
                                <div class="row between-xs middle-xs">
                                    <h3 class="primary-color price">
                                        <span>{{ number_format($hotOfferProperty->price,2) }}</span> 
                                    </h3> 
                                    @php
                                        $ratings = App\Models\Review::where('property_id',$hotOfferProperty->id)->get();
                                        $ratingValue = [];
                                        foreach($ratings as $aRating) {
                                            $ratingValue[] = $aRating->rating;
                                        }
                                        $ratingAvarage = null;
                                        if(count($ratings) != 0 && $ratingValue != null){
                                            $ratingAvarage = ceil(collect($ratingValue)->sum() / $ratings->count());
                                        }
                                    @endphp
                                    <div class="row start-xs middle-xs ratings" title="29">      
                                        @if($ratingAvarage == 1)     
                                        <i class="material-icons mat-icon-sm">star</i>
                                        @elseif($ratingAvarage == 2)
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        @elseif($ratingAvarage == 3)
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        @elseif($ratingAvarage == 4)
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        @elseif($ratingAvarage == 5)
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                    <div class="description mt-3"> 
                                        <p>{{ $hotOfferProperty->description }}</p>
                                    </div>
                                </div>
                                <div class="features mt-3">                    
                                    <p><span>Property size</span><span>{{ $hotOfferProperty->size }} ft²</span></p>
                                    <p><span>Bedrooms</span><span>{{ $hotOfferProperty->bedroom }}</span></p>
                                    <p><span>Bathrooms</span><span>{{ $hotOfferProperty->bathroom }}</span></p>
                                    <p><span>Garages</span><span>{{ $hotOfferProperty->garage }}</span></p>
                                </div>   
                            </div> 
                            <div class="grow"></div>
                            <div class="actions row between-xs middle-xs">
                                <p class="row date mb-0">
                                    <i class="material-icons text-muted">date_range</i>
                                    <span class="mx-2">{{ date('Y',strtotime($hotOfferProperty->year_built)) }}</span>
                                </p> 
                                <a href="{{ route('property.details',$hotOfferProperty->slug) }}" class="mdc-button mdc-button--outlined">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Details</span> 
                                </a>  
                            </div>
                        </div>  
                    </div> 
                </div>  
            </div>
        </div>   
    </div> 
    @endif
    @if(count($featureProperties) > 0)
    <div class="section mt-3">
        <div class="px-3">
            <div class="theme-container">
                <h1 class="section-title">Featured properties</h1>  
                <div class="properties-carousel">   
                    <div class="swiper-container carousel-outer"> 
                        <div class="swiper-wrapper">  
                            @foreach ($featureProperties as $property)
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
    </div>
    @endif
    @if(App\Models\Agent::where('status','active')->latest()->count() > 0)
    {{-- agents section start --}}
    <div class="section agents">
        <div class="px-3">
            <div class="theme-container">
                <h1 class="section-title">Meet our agents</h1> 
                <div class="agents-carousel"> 
                    <div class="swiper-container carousel-outer"> 
                        <div class="swiper-wrapper">  
                           
                            @include('frontend.pages.agent')
                            
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
                <div class="w-100 text-center mt-5">                
                    <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Our agents</span> 
                    </a>
                </div>  
            </div>
        </div>   
    </div>  
   @endif
    {{-- agents section end --}}
    
    {{-- clients section start --}}
    @include('frontend.pages.client')
    {{-- clients section end --}}

    {{-- sister-concern section start --}}
    @include('frontend.pages.sister-concern')
    {{-- sister-concern section end --}}

    {{-- media-partner section start --}}
    @include('frontend.pages.media-partner')
    {{-- media-partner section end --}}
 
@endsection

@section('scripts')
    <script>
        $(document).on('click','.add-to-favorite',function(){
            let url = $(this).data('url');
            let id = $(this).data('id');
            $.ajax({
                url: url,
                method: "POST",
                dataType: "JSON",
                data: {
                    _token: "{{ csrf_token() }}",
                    property_id: id,
                },
                success: function(data) {
                    if(data.status == 1) {
                        $('body #user_menu_count').html(data.html);
                        toastr.success(data.msg);
                    }
                    else {
                        toastr.error(data.msg);
                    }
                }
            });
        });
        //sort properties 
        $(document).on('click','.sortItem',function(){
            let sort = $(this).data('value');
            if(sort == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}"+"/properties"+"?sort="+sort;
            }
        });
        $(document).on('click','.category_id',function(){
            let category_id = $(this).data('value');
            if(category_id == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}"+"/properties"+"?category_id="+category_id;
            }
        });
        $(document).on('click','.area_id',function(){
            let area_id = $(this).data('value');
            if(area_id == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}"+"/properties"+"?area_id="+area_id;
            }
        });
        $(document).on('click','.status',function(){
            let status = $(this).data('value');
            if(status == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}"+"/properties"+"?status="+status;
            }
        });

        // $(document).on('click','#searchBtn',function(e){
        //     e.preventDefault();
        //     let category_id = $('#category_id li.mdc-list-item--selected').attr('value');
        //     let status = $('#status li.mdc-list-item--selected').attr('value');
        //     $.ajax({
        //         url: "{{ route('properties') }}",
        //         method: 'GET',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             category_id: category_id,
        //             status: status,
        //             url: "{{ route('properties') }}"
        //         },
        //         success: function(data){
        //             console.loc(data);
        //         },
        //     });
        // });
    </script>
@endsection