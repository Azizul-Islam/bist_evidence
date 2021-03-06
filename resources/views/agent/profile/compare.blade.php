@extends('layouts.app')
@section('title','Compare')
@section('content')
<div class="px-3">  
    <div class="theme-container">  
        <div class="py-3">
            <div class="mdc-card p-3 row between-xs middle-xs compare-toolbar">
                <h3 class="uppercase">Compare: 5</h3>  
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
                <button class="mdc-fab mdc-fab--mini bg-warn d-sm-none d-md-none d-lg-none d-xl-none" type="button">
                    <span class="mdc-fab__ripple"></span>
                    <span class="mdc-fab__icon material-icons">cancel</span>
                </button>
                <button class="mdc-button mdc-button--raised bg-warn d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex" type="button">
                    <span class="mdc-button__ripple"></span>
                    <span class="mdc-button__label">Clear All</span> 
                </button> 
            </div>  
            <div class="compare-carousel mt-3">   
                <div class="swiper-container carousel-outer"> 
                    <div class="swiper-wrapper">  
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item">
                                <div class="thumbnail-section">  
                                    <button class="mdc-icon-button remove" type="button"> 
                                        <i class="material-icons mat-icon-lg warn-color">highlight_off</i>
                                    </button>   
                                    <div class="property-image"> 
                                        <img src="assets/images/props/office/1-medium.jpg" alt="product image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">Centrally located office</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>1052 W 91st St, Los Angeles, CA 90044, USA</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">$6,500 /month</span> 
                                            </div> 
                                            <div class="details py-3">
                                                <div class="item">
                                                  <span>Property Type:</span>
                                                  <span>Office</span>
                                                </div> 
                                                <div class="item">
                                                  <span>Property Status:</span>
                                                  <div class="list">
                                                    <span>For Rent</span>
                                                    <span class="last">No Fees</span>
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>City:</span>
                                                  <span>Los Angeles</span>
                                                </div>
                                                <div class="item">
                                                  <span>Zip Code:</span>
                                                  <span>90044</span>
                                                </div>
                                                <div class="item">
                                                    <span>Neighborhood:</span>
                                                    <div class="list">
                                                      <span>Hollywood</span>
                                                      <span class="last">Highland Park</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span>Street:</span>
                                                    <div class="list">
                                                        <span>Hollywood Street #2</span>
                                                        <span class="last">Highland Park Street #1</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                  <span>Bedrooms:</span>
                                                  <span>4</span>
                                                </div>
                                                <div class="item">
                                                  <span>Bathrooms:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Garages:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Property size:</span>
                                                  <span>1500 ft??</span>
                                                </div>
                                                <div class="item">
                                                  <span>Year Built:</span>
                                                  <span>2012</span>
                                                </div>
                                                <div class="item">
                                                  <span>Features:</span>
                                                  <div class="list">
                                                    <span>Air Conditioning</span>
                                                    <span>Barbeque</span>
                                                    <span>Dryer</span>
                                                    <span>Microwave</span>
                                                    <span>Refrigerator</span>
                                                    <span>Fireplace</span>
                                                    <span>Sauna</span>
                                                    <span>TV Cable</span>
                                                    <span>WiFi</span> 
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>Published:</span>
                                                  <span>12 September, 2013</span>
                                                </div>                         
                                            </div> 
                                            <p class="uppercase text-center fw-500 mb-2">description</p>
                                            <p class="text-muted fw-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium magnam veniam sit reprehenderit deserunt ad voluptates id aperiam veritatis! Nobis saepe quos eveniet numquam vitae quis, tenetur consectetur impedit dolore.</p> 
                                        </div> 
                                        <div class="grow"></div>
                                        <div class="actions row center-xs middle-xs"> 
                                            <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">More info</span> 
                                            </a> 
                                        </div>
                                    </div>  
                                </div> 
                            </div>                  
                        </div> 
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item">
                                <div class="thumbnail-section">  
                                    <button class="mdc-icon-button remove" type="button"> 
                                        <i class="material-icons mat-icon-lg warn-color">highlight_off</i>
                                    </button>   
                                    <div class="property-image"> 
                                        <img src="assets/images/props/flat-2/1-medium.jpg" alt="product image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">Spacious and warm flat</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>55 W Jackson Blvd, Chicago, IL 60604, USA</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">$1,450,000</span> 
                                            </div>
                                            <div class="details py-3">
                                                <div class="item">
                                                  <span>Property Type:</span>
                                                  <span>Apartment</span>
                                                </div> 
                                                <div class="item">
                                                  <span>Property Status:</span>
                                                  <div class="list">
                                                    <span>Hot Offer</span>
                                                    <span class="last">No Fees</span>
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>City:</span>
                                                  <span>Chicago</span>
                                                </div>
                                                <div class="item">
                                                  <span>Zip Code:</span>
                                                  <span>60604</span>
                                                </div>
                                                <div class="item">
                                                    <span>Neighborhood:</span>
                                                    <div class="list"> 
                                                      <span class="last">Riverdale</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span>Street:</span>
                                                    <div class="list"> 
                                                        <span class="last">Riverdale Street #1</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                  <span>Bedrooms:</span>
                                                  <span>5</span>
                                                </div>
                                                <div class="item">
                                                  <span>Bathrooms:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Garages:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Property size:</span>
                                                  <span>1700 ft??</span>
                                                </div>
                                                <div class="item">
                                                  <span>Year Built:</span>
                                                  <span>2002</span>
                                                </div>
                                                <div class="item">
                                                  <span>Features:</span>
                                                  <div class="list">
                                                    <span>Air Conditioning</span>
                                                    <span>Barbeque</span>
                                                    <span>Dryer</span>
                                                    <span>Microwave</span>
                                                    <span>Refrigerator</span>
                                                    <span>Fireplace</span>
                                                    <span>Sauna</span>
                                                    <span>TV Cable</span>
                                                    <span>WiFi</span> 
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>Published:</span>
                                                  <span>12 October, 2016</span>
                                                </div>                         
                                            </div> 
                                            <p class="uppercase text-center fw-500 mb-2">description</p>
                                            <p class="text-muted fw-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium magnam veniam sit reprehenderit deserunt ad voluptates id aperiam veritatis! Nobis saepe quos eveniet numquam vitae quis, tenetur consectetur impedit dolore.</p> 
                                        </div> 
                                        <div class="grow"></div>
                                        <div class="actions row center-xs middle-xs"> 
                                            <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">More info</span> 
                                            </a> 
                                        </div>
                                    </div>  
                                </div> 
                            </div>                  
                        </div> 
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item">
                                <div class="thumbnail-section">  
                                    <button class="mdc-icon-button remove" type="button"> 
                                        <i class="material-icons mat-icon-lg warn-color">highlight_off</i>
                                    </button>   
                                    <div class="property-image"> 
                                        <img src="assets/images/props/house-3/1-medium.jpg" alt="product image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">House with a pool</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>5921 17th Ave S, Seattle, WA 98108, USA</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">$6,500 /month</span> 
                                            </div>
                                            <div class="details py-3">
                                                <div class="item">
                                                  <span>Property Type:</span>
                                                  <span>House</span>
                                                </div> 
                                                <div class="item">
                                                  <span>Property Status:</span>
                                                  <div class="list">
                                                    <span>Sold</span>
                                                    <span class="last">For Sale</span>
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>City:</span>
                                                  <span>Seattle</span>
                                                </div>
                                                <div class="item">
                                                  <span>Zip Code:</span>
                                                  <span>98108</span>
                                                </div>
                                                <div class="item">
                                                    <span>Neighborhood:</span>
                                                    <div class="list">
                                                      <span>Queen Anne</span>
                                                      <span class="last">Belltown</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span>Street:</span>
                                                    <div class="list">
                                                        <span>Queen Anne Street #1</span>
                                                        <span class="last">Belltown Street #2</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                  <span>Bedrooms:</span>
                                                  <span>5</span>
                                                </div>
                                                <div class="item">
                                                  <span>Bathrooms:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Garages:</span>
                                                  <span>1</span>
                                                </div>
                                                <div class="item">
                                                  <span>Property size:</span>
                                                  <span>2200 ft??</span>
                                                </div>
                                                <div class="item">
                                                  <span>Year Built:</span>
                                                  <span>2007</span>
                                                </div>
                                                <div class="item">
                                                  <span>Features:</span>
                                                  <div class="list">
                                                    <span>Air Conditioning</span>
                                                    <span>Barbeque</span>
                                                    <span>Dryer</span>
                                                    <span>Microwave</span>
                                                    <span>Refrigerator</span>
                                                    <span>Fireplace</span>
                                                    <span>Sauna</span>
                                                    <span>TV Cable</span>
                                                    <span>WiFi</span> 
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>Published:</span>
                                                  <span>20 November, 2017</span>
                                                </div>                         
                                            </div> 
                                            <p class="uppercase text-center fw-500 mb-2">description</p>
                                            <p class="text-muted fw-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium magnam veniam sit reprehenderit deserunt ad voluptates id aperiam veritatis! Nobis saepe quos eveniet numquam vitae quis, tenetur consectetur impedit dolore.</p> 
                                        </div> 
                                        <div class="grow"></div>
                                        <div class="actions row center-xs middle-xs"> 
                                            <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">More info</span> 
                                            </a> 
                                        </div>
                                    </div>  
                                </div> 
                            </div>                  
                        </div>
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item">
                                <div class="thumbnail-section">  
                                    <button class="mdc-icon-button remove" type="button"> 
                                        <i class="material-icons mat-icon-lg warn-color">highlight_off</i>
                                    </button>   
                                    <div class="property-image"> 
                                        <img src="assets/images/props/house-2/1-medium.jpg" alt="product image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">Bright and sunny house</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>1400 W 44th St, Chicago, IL 60609, USA</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">$9,000 /month</span> 
                                            </div> 
                                            <div class="details py-3">
                                                <div class="item">
                                                  <span>Property Type:</span>
                                                  <span>House</span>
                                                </div> 
                                                <div class="item">
                                                  <span>Property Status:</span>
                                                  <div class="list">
                                                    <span>For Rent</span>
                                                    <span class="last">No Fees</span>
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>City:</span>
                                                  <span>Chicago</span>
                                                </div>
                                                <div class="item">
                                                  <span>Zip Code:</span>
                                                  <span>60609</span>
                                                </div>
                                                <div class="item">
                                                    <span>Neighborhood:</span>
                                                    <div class="list">
                                                      <span>Englewood</span>
                                                      <span class="last">Austin</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span>Street:</span>
                                                    <div class="list">
                                                        <span>Englewood Street #2</span>
                                                        <span class="last">Austin Street #2</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                  <span>Bedrooms:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Bathrooms:</span>
                                                  <span>1</span>
                                                </div>
                                                <div class="item">
                                                  <span>Garages:</span>
                                                  <span>1</span>
                                                </div>
                                                <div class="item">
                                                  <span>Property size:</span>
                                                  <span>1600 ft??</span>
                                                </div>
                                                <div class="item">
                                                  <span>Year Built:</span>
                                                  <span>2018</span>
                                                </div>
                                                <div class="item">
                                                  <span>Features:</span>
                                                  <div class="list">
                                                    <span>Air Conditioning</span>
                                                    <span>Barbeque</span>
                                                    <span>Dryer</span>
                                                    <span>Microwave</span>
                                                    <span>Refrigerator</span>
                                                    <span>Fireplace</span>
                                                    <span>Sauna</span>
                                                    <span>TV Cable</span>
                                                    <span>WiFi</span> 
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>Published:</span>
                                                  <span>19 September, 2019</span>
                                                </div>                         
                                            </div> 
                                            <p class="uppercase text-center fw-500 mb-2">description</p>
                                            <p class="text-muted fw-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium magnam veniam sit reprehenderit deserunt ad voluptates id aperiam veritatis! Nobis saepe quos eveniet numquam vitae quis, tenetur consectetur impedit dolore.</p> 
                                        </div> 
                                        <div class="grow"></div>
                                        <div class="actions row center-xs middle-xs"> 
                                            <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">More info</span> 
                                            </a> 
                                        </div>
                                    </div>  
                                </div> 
                            </div>                  
                        </div>
                        <div class="swiper-slide"> 
                            <div class="mdc-card property-item grid-item column-4 full-width-page compare-item">
                                <div class="thumbnail-section">  
                                    <button class="mdc-icon-button remove" type="button"> 
                                        <i class="material-icons mat-icon-lg warn-color">highlight_off</i>
                                    </button>   
                                    <div class="property-image"> 
                                        <img src="assets/images/props/apartment/1-medium.jpg" alt="product image">                                               
                                    </div>  
                                </div>
                                <div class="property-content-wrapper"> 
                                    <div class="property-content">
                                        <div class="content">
                                            <h2 class="title"><a href="#">Centrally located office</a></h2>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span>1052 W 91st St, Los Angeles, CA 90044, USA</span>
                                            </p> 
                                            <div class="mdc-chip bg-primary center-xs w-100">
                                                <div class="mdc-chip__ripple"></div> 
                                                <span class="mdc-chip__text">$6,500 /month</span> 
                                            </div> 
                                            <div class="details py-3">
                                                <div class="item">
                                                  <span>Property Type:</span>
                                                  <span>Office</span>
                                                </div> 
                                                <div class="item">
                                                  <span>Property Status:</span>
                                                  <div class="list">
                                                    <span>For Rent</span>
                                                    <span class="last">No Fees</span>
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>City:</span>
                                                  <span>Los Angeles</span>
                                                </div>
                                                <div class="item">
                                                  <span>Zip Code:</span>
                                                  <span>90044</span>
                                                </div>
                                                <div class="item">
                                                    <span>Neighborhood:</span>
                                                    <div class="list">
                                                      <span>Hollywood</span>
                                                      <span class="last">Highland Park</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span>Street:</span>
                                                    <div class="list">
                                                        <span>Hollywood Street #2</span>
                                                        <span class="last">Highland Park Street #1</span>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                  <span>Bedrooms:</span>
                                                  <span>4</span>
                                                </div>
                                                <div class="item">
                                                  <span>Bathrooms:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Garages:</span>
                                                  <span>2</span>
                                                </div>
                                                <div class="item">
                                                  <span>Property size:</span>
                                                  <span>1500 ft??</span>
                                                </div>
                                                <div class="item">
                                                  <span>Year Built:</span>
                                                  <span>2012</span>
                                                </div>
                                                <div class="item">
                                                  <span>Features:</span>
                                                  <div class="list">
                                                    <span>Air Conditioning</span>
                                                    <span>Barbeque</span>
                                                    <span>Dryer</span>
                                                    <span>Microwave</span>
                                                    <span>Refrigerator</span>
                                                    <span>Fireplace</span>
                                                    <span>Sauna</span>
                                                    <span>TV Cable</span>
                                                    <span>WiFi</span> 
                                                  </div>
                                                </div> 
                                                <div class="item">
                                                  <span>Published:</span>
                                                  <span>12 September, 2013</span>
                                                </div>                         
                                            </div> 
                                            <p class="uppercase text-center fw-500 mb-2">description</p>
                                            <p class="text-muted fw-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium magnam veniam sit reprehenderit deserunt ad voluptates id aperiam veritatis! Nobis saepe quos eveniet numquam vitae quis, tenetur consectetur impedit dolore.</p> 
                                        </div> 
                                        <div class="grow"></div>
                                        <div class="actions row center-xs middle-xs"> 
                                            <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">More info</span> 
                                            </a> 
                                        </div>
                                    </div>  
                                </div> 
                            </div>                  
                        </div> 
                    </div>  
                </div>
            </div>   
        </div> 
    </div>  
</div> 
@endsection