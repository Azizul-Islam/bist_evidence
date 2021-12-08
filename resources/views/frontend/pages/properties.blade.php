@extends('layouts.app')
@section('title','All Properties')
@section('styles')
    <style>
        
    button[type=button]:disabled {cursor: no-drop !important;}
    .form__input-container.error_input{border-color: #ff0000;}
    .error-text{color: #ff0000;}
    .sidebar__spoiler-item.active{background-color: #4c73ff;}
    .pagination .page-item {display: inline-block;}
    .pagination .page-item a{display: inline-block;padding: 5px 12px;border: 1px solid #ccc; font-size: 18px;}
    .pagination{text-align: center; padding: 20px;}
    .pagination .page-item.active{background-color: #ccc;padding: 5px 12px;border: 1px solid #ccc; font-size: 18px;}
    .page-item.disabled{cursor: no-drop;padding: 5px 12px;border: 1px solid #ccc; font-size: 18px;}

    </style>
@endsection
@section('content')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{ asset('frontend/assets/images/carousel/slide-3.jpg') }}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content mh-200"> 
        {{-- <p class="desc">“Home is where one starts from...” –T.S. Eliot</p>  --}}
    </div>
</div>  
<div class="px-3">  
    <div class="theme-container">  
        <div class="page-drawer-container mt-3">
            <aside class="mdc-drawer mdc-drawer--modal page-sidenav">
                <a href="#" class="h-0"></a>
                <div class="mdc-card">   
                    <form action="{{ route('properties') }}" method="GET" id="filters" class="search-wrapper m-0 o-hidden"> 
                        <div class="column p-2">  
                            <div class="col-xs-12 p-2">
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
                                            <li class="mdc-list-item mdc-list-item--selected category_id" data-value="default">Property Type</li>
                                            @foreach ($categories as $category)
                                            <li class="mdc-list-item category_id" data-value="{{ $category->id }}">{{ $category->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-xs-12 p-2">  
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
                                            <li class="mdc-list-item mdc-list-item--selected status" data-value="default"></li>
                                            <li class="mdc-list-item status" data-value="for sale">For Sale</li>
                                            <li class="mdc-list-item status" data-value="to rent">For Rent</li>
                                            <li class="mdc-list-item status" data-value="open house">Open House</li>
                                            <li class="mdc-list-item status" data-value="noo fees">No Fees</li>
                                            <li class="mdc-list-item status" data-value="hot offer">Hot Offer</li>
                                            <li class="mdc-list-item status" data-value="sold">Sold</li>
                                        </ul>
                                    </div>
                                </div> 

                            </div>  
                            <div class="col-xs-12 p-2">
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
                                            <li class="mdc-list-item mdc-list-item--selected area_id" data-value="default"></li>
                                            @foreach ($areas as $area)
                                            <li class="mdc-list-item area_id" data-value="{{ $area->id }}">{{ $area->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 p-2">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" name="price_range[]" id="price_from">
                                        <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Price From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-6 p-2 to">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" name="price_range[]" id="price_to">
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
                           
                           
                        </div>   
                        <div class="row around-xs middle-xs p-2 mb-5"> 
                            <button class="mdc-button mdc-button--raised bg-warn" type="button" id="clear-filter">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Clear</span> 
                            </button>
                            <button class="mdc-button mdc-button--raised" type="submit">
                                <span class="mdc-button__ripple"></span>
                                <i class="material-icons mdc-button__icon">search</i>
                                <span class="mdc-button__label">Search</span> 
                            </button>  
                        </div>
                    </form>   
                </div>
            </aside>
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            <div class="page-sidenav-content"> 
                <div class="properties-wrapper row mt-0">
                    <div class="row px-2 w-100">  
                        <div class="row mdc-card between-xs middle-xs w-100 p-2 filter-row mdc-elevation--z1 text-muted"> 
                            <button id="page-sidenav-toggle" class="mdc-icon-button material-icons d-md-none d-lg-none d-xl-none"> 
                                more_vert 
                            </button>  
                            <div class="mdc-menu-surface--anchor"> 
                                <button class="mdc-button mdc-ripple-surface text-muted mutable"> 
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label"><span class="mutable">Sort by Default</span></span>
                                    <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                                </button> 
                                <div class="mdc-menu mdc-menu-surface">
                                   
                                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                        <li class="mdc-list-item sortItem" data-value="default" role="menuitem">
                                            <span class="mdc-list-item__text">Sort by Default</span>
                                        </li>
                                        <li class="mdc-list-item sortItem" data-value="newest" role="menuitem">
                                            <span class="mdc-list-item__text" >Newest</span>
                                        </li> 
                                        <li class="mdc-list-item sortItem" data-value="oldest" role="menuitem">
                                            <span class="mdc-list-item__text">Oldest</span>
                                        </li> 
                                        <li class="mdc-list-item sortItem" data-value="popular" role="menuitem">
                                            <span class="mdc-list-item__text">Popular</span>
                                        </li> 
                                        <li class="mdc-list-item sortItem" data-value="priceAsc" role="menuitem">
                                            <span class="mdc-list-item__text">Price (Low to High)</span>
                                        </li> 
                                        <li class="mdc-list-item sortItem" data-value="priceDesc" role="menuitem">
                                            <span class="mdc-list-item__text">Price (High to Low)</span>
                                        </li>
                                    </ul>
                                </div> 
                            </div>
                            <div class="row middle-xs d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                                <div class="mdc-menu-surface--anchor"> 
                                    <button class="mdc-button mdc-ripple-surface text-muted"> 
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Show<span class="mx-2 mutable">8</span></span>
                                        <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                                    </button> 
                                    <div class="mdc-menu mdc-menu-surface">
                                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                            <li class="mdc-list-item" role="menuitem">
                                                <span class="mdc-list-item__text">8</span>
                                            </li>
                                            <li class="mdc-list-item" role="menuitem">
                                                <span class="mdc-list-item__text">12</span>
                                            </li> 
                                            <li class="mdc-list-item" role="menuitem">
                                                <span class="mdc-list-item__text">16</span>
                                            </li> 
                                            <li class="mdc-list-item" role="menuitem">
                                                <span class="mdc-list-item__text">24</span>
                                            </li> 
                                            <li class="mdc-list-item" role="menuitem">
                                                <span class="mdc-list-item__text">36</span>
                                            </li> 
                                        </ul>
                                    </div> 
                                </div>
                                <button class="mdc-icon-button material-icons view-type" data-view-type="list" data-col="1" data-full-width-page="false">view_list</button> 
                                <button class="mdc-icon-button view-type" data-view-type="grid" data-col="2" data-full-width-page="false">
                                    <svg class="material-icons mat-icon-sm" viewBox="0 0 25 25">
                                        <path d="M3,11H11V3H3M3,21H11V13H3M13,21H21V13H13M13,3V11H21V3"/>
                                    </svg>
                                </button> 
                                <button class="mdc-icon-button view-type material-icons d-none d-lg-flex d-xl-flex" data-view-type="grid" data-col="3" data-full-width-page="false">view_module</button> 
                            </div>
                        </div>  
                    </div> 
                    <div class="row start-xs middle-xs py-2 w-100"> 
                        <div class="mdc-chip-set"> 
                            <div class="mdc-chip bg-warn">
                                <div class="mdc-chip__ripple"></div>
                                <span>
                                    <span role="button" tabindex="0" class="mdc-chip__text uppercase">32 found</span>
                                </span> 
                            </div>
                            <div class="mdc-chip">
                                <div class="mdc-chip__ripple"></div>
                                <span>
                                    <span role="button" tabindex="0" class="mdc-chip__text">House</span>
                                </span>
                                <span>
                                    <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                </span>
                            </div> 
                            <div class="mdc-chip">
                                <div class="mdc-chip__ripple"></div>
                                <span>
                                    <span role="button" tabindex="0" class="mdc-chip__text">For sale</span>
                                </span>
                                <span>
                                    <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                </span>
                            </div> 
                            <div class="mdc-chip">
                                <div class="mdc-chip__ripple"></div>
                                <span>
                                    <span role="button" tabindex="0" class="mdc-chip__text">Price > 150000</span>
                                </span>
                                <span>
                                    <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                </span>
                            </div> 
                            <div class="mdc-chip">
                                <div class="mdc-chip__ripple"></div>
                                <span>
                                    <span role="button" tabindex="0" class="mdc-chip__text">Price &lt; 450000</span>
                                </span>
                                <span>
                                    <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                </span>
                            </div>
                        </div> 
                    </div> 
                    @foreach ($properties as $property)
                    <div class="row item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4"> 
                        <div class="mdc-card property-item grid-item column-3">
                            <div class="thumbnail-section">
                                <div class="row property-status">
                                    <span class="{{ $property->purpose == 'for sale' ? 'green' : 'blue' }}">{{ $property->purpose }}</span>
                                    <span class="@if($property->contract == 'no fees') orange @elseif ($property->contract == 'open house') teal @elseif ($property->contract == 'no fees') orange @elseif ($property->contract == 'hot offer') red @else dark @endif">{{ $property->contract }}</span>
                                </div> 
                                <div class="property-image"> 
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($property->images as $image)    
                                            <div class="swiper-slide">
                                                <img src="{{ asset('frontend/assets/images/others/transparent-bg.png') }}" alt="slide image" data-src="{{ asset('backend/properties/'.$image->path) }}" class="slide-item swiper-lazy">
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
                                    <button class="mdc-button add-to-favorite" data-id="{{ $property->id }}" data-url="{{ route('add-to-favorite') }}" title="Add To Favorite">
                                        <i class="material-icons mat-icon-sm">favorite_border</i>
                                    </button>
                                    <button class="mdc-button" title="Add To Compare">
                                        <i class="material-icons mat-icon-sm">compare_arrows</i>
                                    </button>  
                                </div>  
                            </div>
                            <div class="property-content-wrapper"> 
                                <div class="property-content">
                                    <div class="content">
                                        <h1 class="title"><a href="{{ route('property.details',$property->slug) }}">{{ $property->title }}</a></h1>
                                        <p class="row address flex-nowrap">
                                            <i class="material-icons text-muted">location_on</i>
                                            <span>{{ $property->address }}</span>
                                        </p>
                                        <div class="row between-xs middle-xs">
                                            <h3 class="primary-color price">
                                                <span>{{ number_format($property->price,2) }}</span> 
                                            </h3> 
                                            @php
                                            $ratings = App\Models\Review::where('property_id',$property->id)->get();
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
                                                <p>{{ $property->description }}</p>
                                            </div>
                                        </div>
                                        <div class="features mt-3">                    
                                            <p><span>Property size</span><span>{{ $property->size }} ft²</span></p>
                                            <p><span>Bedrooms</span><span>{{ $property->bedroom }}</span></p>
                                            <p><span>Bathrooms</span><span>{{ $property->bathroom }}</span></p>
                                            <p><span>Garages</span><span>{{ $property->garage }}</span></p>
                                        </div>   
                                    </div> 
                                    <div class="grow"></div>
                                    <div class="actions row between-xs middle-xs">
                                        <p class="row date mb-0">
                                            <i class="material-icons text-muted">date_range</i>
                                            <span class="mx-2">{{ date('d M , Y',strtotime($property->year_built)) }}</span>
                                        </p> 
                                        <a href="{{ route('property.details',$property->slug) }}" class="mdc-button mdc-button--outlined">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Details</span> 
                                        </a>  
                                    </div>
                                </div>  
                            </div> 
                        </div>  
                    </div>  
                    @endforeach
                    <div class="row center-xs middle-xs p-2 w-100">                
                        <div class="mdc-card w-100"> 
                            {!! $properties->appends(request()->query())->links('pagination::bootstrap-4') !!}
                           
                        </div>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>  
</div>  
@include('frontend.pages.client')
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
                window.location = "{{ url(''.$route.'') }}?sort="+sort;
            }
        });
        $(document).on('click','.category_id',function(){
            let category_id = $(this).data('value');
            if(category_id == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}?category_id="+category_id;
            }
        });
        $(document).on('click','.area_id',function(){
            let area_id = $(this).data('value');
            if(area_id == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}?area_id="+area_id;
            }
        });
        $(document).on('click','.status',function(){
            let status = $(this).data('value');
            if(status == 'default') {
                window.location = "{{ url(''.$route.'') }}";
            }
            else {
                window.location = "{{ url(''.$route.'') }}?status="+status;
            }
        });
    </script>
@endsection