@extends('layouts.app')  
@section('styles')
    
@endsection
@section('content')

    <div class="header-image-wrapper">
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
    </div>  
    <div class="px-3">  
        <div class="theme-container"> 
            <div class="mdc-card main-content-header">  
                <form action="javascript:void(0);" id="filters" class="search-wrapper"> 
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
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
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
                                <input class="mdc-text-field__input">
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
                    <div class="row d-none" id="more-filters"> 
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
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
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
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
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
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
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
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
                        <div class="col-xs-6 col-md-2 p-2"> 
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bedrooms From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bedrooms To</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2"> 
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bathrooms From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bathrooms To</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2"> 
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Garages From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Garages To</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Area From</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Area To</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Year Built From</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Year Built To</label>
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
                    </div>   
                    <div class="row center-xs middle-xs p-2"> 
                        <button class="mdc-button mdc-button--raised bg-warn" type="button" id="clear-filter">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Clear</span> 
                        </button>
                        <button class="mdc-button mdc-button--raised mx-2" type="button" id="show-more-filters">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Advanced</span> 
                        </button>
                        <button class="mdc-button mdc-button--raised mx-2 d-none" type="button" id="hide-more-filters">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Hide</span> 
                        </button>
                        <button class="mdc-button mdc-button--raised" type="submit">
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
                <div class="row p-2 w-100">  
                    <div class="row mdc-card between-xs middle-xs w-100 p-2 filter-row mdc-elevation--z1 text-muted">  
                        <div class="mdc-menu-surface--anchor"> 
                            <button class="mdc-button mdc-ripple-surface text-muted mutable"> 
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label"><span class="mutable">Sort by Default</span></span>
                                <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                            </button> 
                            <div class="mdc-menu mdc-menu-surface">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Sort by Default</span>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Newest</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Oldest</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Popular</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Price (Low to High)</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
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
                            <button class="mdc-icon-button material-icons view-type" data-view-type="list" data-col="1" data-full-width-page="true">view_list</button> 
                            <button class="mdc-icon-button view-type" data-view-type="grid" data-col="2" data-full-width-page="true">
                                <svg class="material-icons mat-icon-sm" viewBox="0 0 25 25">
                                    <path d="M3,11H11V3H3M3,21H11V13H3M13,21H21V13H13M13,3V11H21V3"/>
                                </svg>
                            </button> 
                            <button class="mdc-icon-button view-type material-icons d-none d-md-flex d-lg-flex d-xl-flex" data-view-type="grid" data-col="3" data-full-width-page="true">view_module</button> 
                            <button class="mdc-icon-button view-type material-icons d-none d-lg-flex d-xl-flex" data-view-type="grid" data-col="4" data-full-width-page="true">view_comfy</button> 
                        </div>
                    </div>  
                </div> 
                @foreach ($properties as $property)
                    @include('frontend.pages._single_property')
                @endforeach
                <div class="row center-xs middle-xs p-2 mt-2 w-100">                
                    <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
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
                                <h1 class="title"><a href="{{ route('property.details',$hotOfferProperty->slug) }}">{{ $hotOfferProperty->title }}</a></h1>
                                <p class="row address flex-nowrap">
                                    <i class="material-icons text-muted">location_on</i>
                                    <span>{{ $hotOfferProperty->address }}</span>
                                </p>
                                <div class="row between-xs middle-xs">
                                    <h3 class="primary-color price">
                                        <span>{{ number_format($hotOfferProperty->price,2) }}</span> 
                                    </h3> 
                                    <div class="row start-xs middle-xs ratings" title="29">      
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star</i>
                                        <i class="material-icons mat-icon-sm">star_half</i>
                                        <i class="material-icons mat-icon-sm">star_border</i>
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
                                    <span class="mx-2">{{ date('d M, Y',strtotime($hotOfferProperty->year_built)) }}</span>
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
    {{-- agents section start --}}
    @include('frontend.pages.agent')
    {{-- agents section end --}}
    
    {{-- clients section start --}}
    @include('frontend.pages.client')
    {{-- clients section end --}}
 
@endsection