
                <div class="row item col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"> 
                    <div class="mdc-card property-item grid-item column-4 full-width-page">
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
                                        <div class="row start-xs middle-xs ratings" title="29">      
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
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
                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Details</span> 
                                    </a>  
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div> 