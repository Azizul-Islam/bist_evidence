@extends('layouts.app')
@section('title','Property Details')
@section('styles')
    <style>
        .text-danger{
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="px-3">  
        <div class="theme-container">  
            <div class="page-drawer-container single-property mt-3"> 
                <div class="page-sidenav-content">
                    <div class="mdc-card row between-xs middle-xs p-3">             
                        <div>
                            <h2 class="uppercase">{{ $property->title }}</h2>
                            <p class="row flex-nowrap address mb-0">
                                <i class="material-icons text-muted">location_on</i>
                                <span class="fw-500 text-muted">{{ $property->address }}</span>
                            </p>
                        </div>
                        <div class="column mx-3"> 
                            <h2 class="primary-color price">
                                <span>{{ number_format($property->price,2) }}</span> 
                            </h2> 
                            <div class="row start-xs middle-xs ratings" title="29">      
                                <i class="material-icons mat-icon-sm">star</i>
                                <i class="material-icons mat-icon-sm">star</i>
                                <i class="material-icons mat-icon-sm">star</i>
                                <i class="material-icons mat-icon-sm">star</i>
                                <i class="material-icons mat-icon-sm">star_half</i>
                            </div>  
                        </div>
                        <button id="page-sidenav-toggle" class="mdc-icon-button material-icons text-muted d-md-none d-lg-none d-xl-none"> 
                            more_vert 
                        </button>
                    </div>
                    <div class="mdc-card p-3 mt-3">  
                        <div class="main-carousel mb-3"> 
                            <div class="control-icons">
                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                    <i class="material-icons">favorite_border</i>
                                </button>
                                <button class="mdc-button" title="Add To Compare">
                                    <i class="material-icons">compare_arrows</i>
                                </button>  
                            </div>  
                            <div class="swiper-container">
                                <div class="swiper-wrapper"> 
                                    @foreach ($property->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/images/others/transparent-bg.png') }}" alt="slide image" data-src="{{ asset('backend/properties/'.$image->path) }}" class="slide-item swiper-lazy">
                                        <div class="swiper-lazy-preloader"></div> 
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
                            </div>
                        </div> 

                        <div class="small-carousel">   
                            <div id="small-carousel" class="swiper-container"> 
                                <div class="swiper-wrapper"> 
                                    @foreach ($property->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/images/others/transparent-bg.png') }}" alt="slide image" data-src="{{ asset('backend/properties/'.$image->path) }}" class="slide-item swiper-lazy">
                                        <div class="swiper-lazy-preloader"></div> 
                                    </div> 
                                    @endforeach 
                                    
                                </div>  
                            </div>
                        </div>


                    </div>
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Description</h2>  
                        <p>{{ $property->description }}</p>
                    </div>
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Details</h2>  
                        <div class="row details">
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Property Type:</span>
                                <span>{{ ucfirst($property->category->name ?? '') }} | {{ ucfirst($property->sub_category->name) ?? '' }}</span>
                            </div> 
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Property Status:</span>
                                <div class="row list">
                                    <span>{{ ucfirst($property->contract) }}</span>
                                    {{-- <span class="last">No Fees</span> --}}
                                </div>
                            </div> 
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>City:</span>
                                <span>{{ $property->city }}</span>
                            </div>
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Zip Code:</span>
                                <span>{{ $property->zip_code }}</span>
                            </div> 
                            {{-- <div class="row col-xs-12 col-sm-6 item">
                                <span>Neighborhood:</span>
                                <div class="row list">
                                    <span>Astoria</span>
                                    <span class="last">Midtown</span>
                                </div> 
                            </div> --}}
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Street:</span>
                                <div class="row list">
                                    <span>{{ $property->street }}</span>
                                    {{-- <span class="last">Midtown Street #2</span> --}}
                                </div>
                            </div>
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Bedrooms:</span>
                                <span>{{ $property->bedroom }}</span>
                            </div>
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Bathrooms:</span>
                                <span>{{ $property->bathroom }}</span>
                            </div>
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Garages:</span>
                                <span>{{ $property->garage }}</span>
                            </div>
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Property size:</span>
                                <span>{{ $property->size }} ft²</span>
                            </div>
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>Year Built:</span>
                                <span>{{ date('Y',strtotime($property->year_built)) }}</span>
                            </div>
                        </div>   
                    </div>
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Amenities</h2>  
                        <div class="row">
                            @foreach ($property->amenities as $item)
                            <div class="col-xs-12 col-sm-4 row middle-xs">
                                <i class="material-icons mat-icon-sm primary-color">check</i>
                                <span class="mx-2">{{ $item->name }}</span>
                            </div>
                            @endforeach
                            
                        </div> 
                    </div>
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Additional features</h2>  
                        <div class="row details">
                            @foreach ($property->features as $item)
                            <div class="row col-xs-12 col-sm-6 item">
                                <span>{{ $item->feature_name }}:</span>
                                <span>{{ $item->feature_value }}</span>
                            </div>
                            @endforeach
                            
                        </div> 
                    </div>
                   
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Location</h2> 
                        <div id="contact-map"></div>
                    </div>
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Plans</h2> 
                        <div class="expansion-panel-wrapper"> 
                            @foreach ($property->floorPlans as $item)
                            <div class="mdc-card expansion-panel">
                                <div class="row between-xs middle-xs expansion-panel-header">
                                    <div class="fw-500">{{ $item->floor_name }}</div>
                                    <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex"> 
                                        <span>Area: <span class="fw-500">{{ $item->floor_size }} ft²</span></span>
                                        <span class="mx-3">Rooms: <span class="fw-500">{{ $item->floor_room }}</span></span>
                                        <span>Baths: <span class="fw-500">{{ $item->floor_bath }}</span></span>  
                                    </div>                         
                                </div>
                                <div class="expansion-panel-body text-center">
                                    <img src="{{ asset('backend/properties/floor/'.$item->floor_photo) }}" alt="plan-1" class="mw-100">
                                    <p>{{ $item->floor_description }}</p>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                    <div class="mdc-card p-3 mt-3"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Videos</h2> 
                        <div class="videoWrapper">
                            {!! $property->video_link !!}
                        </div> 
                    </div>
                    {{-- <div class="mdc-card p-3 mt-3 row between-xs middle-xs"> 
                        <span>ID:<span class="fw-500 mx-2">1</span></span>
                        <span>Published:<span class="fw-500 mx-2">12 August, 2012</span></span>
                        <span>Last Update:<span class="fw-500 mx-2">20 May, 2019</span></span>
                        <span>Views:<span class="fw-500 mx-2">322</span></span> 
                    </div>  --}}
                    

                    {{-- <div class="mdc-card p-5 mt-5"> 
                        <h2 class="uppercase text-center fw-500 mb-2">Leave a Reply</h2>                
                        <div class="row pb-3 p-relative">
                            <div class="divider"></div>
                        </div>  
                        <div class="reviews mt-3">
                            <div class="review-item">
                                <img src="{{ asset('frontend/assets/images/avatars/avatar-1.png') }}" alt="avatar-1" class="author-img">
                                <div class="review-content">
                                    <p class="d-flex mb-0">
                                        <span class="author-name">Bruno Vespa</span> 
                                        <i class="material-icons text-muted px-1" title="Dissatisfied">sentiment_dissatisfied</i>
                                    </p>
                                    <p class="text-muted fw-500 mb-2"><small>13 January, 2018 at 7:09</small></p>
                                    <p class="text">Integer id eros et mi fringilla imperdiet. In dictum turpis eget magna viverra condimentum. Ut malesuada interdum ultrices. Proin tristique sem pellentesque, posuere dui in, maximus magna. Aenean vehicula, tortor gravida elementum tincidunt, justo lorem vestibulum ex, eget egestas arcu tellus in magna.</p>
                                </div> 
                            </div> 
                            <div class="review-item">
                                <img src="{{ asset('frontend/assets/images/avatars/avatar-2.png') }}" alt="avatar-2" class="author-img">
                                <div class="review-content">
                                    <p class="d-flex mb-0">
                                        <span class="author-name">Julia Aniston</span> 
                                        <i class="material-icons text-muted px-1" title="Very Satisfied">sentiment_very_satisfied</i>
                                    </p>
                                    <p class="text-muted fw-500 mb-2"><small>04 February, 2018 at 10:22</small></p>
                                    <p class="text">Nulla accumsan, lacus sed suscipit rutrum, turpis augue accumsan metus, in accumsan urna mi vehicula lorem. Pellentesque semper nibh vitae augue placerat finibus. Nulla sed porttitor nunc, quis tristique sem. Quisque in varius nisl. Integer turpis lorem, ultricies sed sem nec, commodo molestie arcu. Nulla finibus ex tortor, et suscipit magna semper consectetur. Cras sit amet metus dui. Maecenas eget dui at ex varius malesuada vel non felis.</p>
                                </div> 
                            </div> 
                            <div class="review-item">
                                <img src="{{ asset('frontend/assets/images/avatars/avatar-3.png') }}" alt="avatar-3" class="author-img">
                                <div class="review-content">
                                    <p class="d-flex mb-0">
                                        <span class="author-name">Andy Warhol</span> 
                                        <i class="material-icons text-muted px-1" title="Neutral">sentiment_neutral</i>
                                    </p>
                                    <p class="text-muted fw-500 mb-2"><small>14 February, 2018 at 11:10</small></p>
                                    <p class="text">Pellentesque hendrerit vel turpis aliquam placerat. Suspendisse ullamcorper congue feugiat. Etiam gravida metus ac massa posuere venenatis. Pellentesque vehicula lobortis dolor, ac pretium dolor maximus quis. Fusce vitae iaculis mauris, quis posuere ex. Mauris vitae convallis nibh. Etiam eget enim at orci interdum maximus nec in ante.</p>
                                </div> 
                            </div> 
                        </div>  
                        <h3 class="uppercase mt-3">Leave your review</h3>
                        <div class="row pb-2 p-relative">
                            <div class="divider"></div>
                        </div> 
                        <p class="mt-3 text-muted">Your email address will not be published. Required fields are marked *</p>
                        <h3 class="row flex-nowrap middle-xs my-2 text-muted">
                            <span>Your Rating:</span> 
                            <button class="mdc-icon-button d-flex middle-xs center-xs p-0" title="Very Dissatisfied"> 
                                <span class="material-icons mat-icon-lg">sentiment_very_dissatisfied</span>
                            </button>  
                            <button class="mdc-icon-button d-flex middle-xs center-xs p-0" title="Dissatisfied"> 
                                <span class="material-icons mat-icon-lg">sentiment_dissatisfied</span>
                            </button>  
                            <button class="mdc-icon-button d-flex middle-xs center-xs p-0" title="Neutral"> 
                                <span class="material-icons mat-icon-lg">sentiment_neutral</span>
                            </button>  
                            <button class="mdc-icon-button d-flex middle-xs center-xs p-0" title="Satisfied"> 
                                <span class="material-icons mat-icon-lg">sentiment_satisfied</span>
                            </button>  
                            <button class="mdc-icon-button d-flex middle-xs center-xs p-0" title="Very Satisfied"> 
                                <span class="material-icons mat-icon-lg">sentiment_very_satisfied</span>
                            </button>  
                        </h3> 
                        <form action="javascript:void(0);" class="row comment-form"> 
                            <div class="col-xs-12">
                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 custom-field my-2">
                                    <textarea class="mdc-text-field__input" rows="5"></textarea>
                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label for="feedback-message" class="mdc-floating-label">Your review</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Your name</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Your email</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-xs-12 text-center mt-3">
                                <button class="mdc-button mdc-button--raised" type="button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Submit review</span> 
                                </button> 
                            </div> 
                        </form>   
                    </div>  --}}
                </div>  
                <aside class="mdc-drawer mdc-drawer--modal page-sidenav">
                    <a href="#" class="h-0"></a>
                    <div class="mdc-card p-3"> 
                        {{-- <div class="widget">  
                            <div class="mdc-card o-hidden">
                                <a href="agent.html">
                                    <img src="assets/images/agents/a-4.jpg" alt="agent-4" class="d-block mw-100">
                                </a>
                                <div class="p-3">
                                    <h2 class="fw-600">Michael Blair</h2> 
                                    <div class="row start-xs middle-xs ratings" title="15">      
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star_half</i>
                                    </div> 
                                    <p class="mt-3 text-muted fw-500">Phasellus sed metus leo. Donec laoreet, lacus ut suscipit convallis, erat enim eleifend nulla, at sagittis enim urna et lacus.</p>                                    
                                    <p class="row middle-xs"><i class="material-icons primary-color" title="Organization">business</i><span class="mx-2 text-muted fw-500">HouseKey</span></p>
                                    <p class="row middle-xs"><i class="material-icons primary-color">email</i><span class="mx-2 text-muted fw-500">michael.b@housekey.com</span></p>
                                    <p class="row middle-xs"><i class="material-icons primary-color">call</i><span class="mx-2 text-muted fw-500">(267) 388-1637</span></p>
                                    <div class="row pb-3 p-relative">
                                        <div class="divider"></div>
                                    </div> 
                                    <div class="row between-xs middle-xs">
                                        <div class="row start-xs middle-xs"> 
                                            <a href="https://www.facebook.com/" target="blank" class="social-icon" title="facebook">
                                                <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                  <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                                                </svg>
                                            </a> 
                                            <a href="https://twitter.com/" target="blank" class="social-icon" title="twitter">
                                                <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                    <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                                                </svg>
                                            </a>
                                            <a href="https://www.linkedin.com/" target="blank" class="social-icon" title="linkedin"> 
                                                <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                  <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                                                </svg>
                                            </a>
                                            <a href="https://instagram.com/" target="blank" class="social-icon" title="instagram"> 
                                                <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                    <path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                                                </svg>
                                            </a> 
                                            <a href="http://www.agent.com/" target="blank" class="social-icon" title="website"> 
                                                <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                    <path d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" />
                                                </svg>
                                            </a> 
                                        </div> 
                                        <a href="javascript:void(0);" class="mdc-button">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">View Profile</span>
                                        </a>
                                    </div> 
                                </div>  
                            </div>  
                        </div>   --}}
                        <div class="widget">
                            <div class="widget-title bg-primary">Reply to the listing</div>
                            <form action="javascript:void(0);" method="POST" id="customer_submit"> 
                                @csrf
                                <input type="hidden" name="property_id" id="property_id" value="{{ $property->id }}">
                                <p>Interested in renting or buying this property? Then send us an email.</p>
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" name="name" id="name">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Name</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                                <span class="text-danger error-text name_error"></span>
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" name="email" id="email">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Email</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                                <span class="text-danger error-text email_error"></span>
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" name="phone" id="phone">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Phone</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                                <span class="text-danger error-text phone_error"></span>
                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 custom-field my-2">
                                    <textarea class="mdc-text-field__input" name="message" id="message" rows="5" placeholder="Message is required"></textarea>
                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label for="feedback-message" class="mdc-floating-label">Message</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                                <span class="text-danger error-text message_error"></span>
                                <div class="row around-xs middle-xs p-2 mb-3"> 
                                    <button class="mdc-button mdc-button--raised bg-accent" type="submit">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Send email</span> 
                                    </button> 
                                </div> 
                            </form>  
                        </div>
                        {{-- <div class="widget">
                            <div class="widget-title bg-primary">Mortgage Calculator</div>
                            <form action="javascript:void(0);">  
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" placeholder="$">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Principal Amount</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" placeholder="$">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Down Payment</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" placeholder="%">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Interest Rate</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>  
                                <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                    <input class="mdc-text-field__input" placeholder="Number of Years">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Period</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="row around-xs middle-xs p-2 mb-3"> 
                                    <button class="mdc-button mdc-button--raised bg-accent" type="button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Calculate Mortgage</span> 
                                    </button> 
                                </div> 
                            </form>  
                        </div> --}}
                        <div class="widget">
                            <div class="widget-title bg-primary">Featured Properties</div>
                            @foreach ($featureProperties as $property)
                            <div class="mdc-card property-item grid-item column-3 mb-3">
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
                                        <button class="mdc-button add-to-favorite" title="Add To Favorite">
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
                            @endforeach

                        </div>
                    </div>
                </aside>
                <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            </div> 
        </div>  
    </div>  
    <div class="section mt-3">
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
    </div>  
@endsection

@section('scripts')
    <script>
        $('#customer_submit').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('customer-response.store') }}",
                method: "POST",
                dataType: 'JSON',
                data: $('#customer_submit').serialize(),
                beforeSend: function(){
                    $(document).find('span.error-text').text();
                },
                success: function(data) {
                    if(data.status == 0) {
                        $.each(data.errors,function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else {
                        $('#customer_submit')[0].reset();
                        toastr.success(data.msg);
                    }
                },
            });
        });
    </script>
@endsection