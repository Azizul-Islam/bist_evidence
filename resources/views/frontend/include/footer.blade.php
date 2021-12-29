<footer>  
    <div class="px-3">
        <div class="theme-container"> 
            {{-- <div class="row center-xs middle-xs content py-5">
                <div class="column center-xs middle-xs col-xs-12 col-lg-4 col-md-5"> 
                    <h2 class="uppercase">Subscribe our Newsletter</h2>
                    <p class="desc mb-1">Stay up to date with our latest news and properties</p>
                </div>
                <form action="javascript:void(0);" class="subscribe-form row col-xs-12 col-md-5">
                    <input type="text" placeholder="Your email address..." class="subscribe-input"> 
                    <button type="submit" class="mdc-button mdc-button--raised subscribe-btn">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Subscribe</span> 
                    </button>
                </form>
            </div>  --}}
            <div class="py-5 content"> 
                <div class="row between-xs"> 
                    <div class="col-xs-12 col-sm-5 col-md-4 p-0"> 
                        <a class="logo" href="{{ url('/') }}"> 
                            <img src="{{ asset('frontend/assets/Logo.png') }}" style="height: 37px;width:212px" alt="logo">
                        </a>  
                        <p class="mt-5 mb-3 desc">{!! $global->footer_description ?? '' !!}</p>
                        <p class="row middle-xs mt-2">
                            <i class="material-icons primary-color">location_on</i>
                            <span class="mx-2">{{ $global->address ?? '' }}</span>
                        </p>
                        <p class="row middle-xs mt-1">
                            <i class="material-icons primary-color">call</i> 
                            <span class="mx-2">{{ $global->phone ?? '' }}</span>
                        </p>
                        <p class="row middle-xs mt-1"> 
                            <i class="material-icons primary-color">mail_outline</i> 
                            <span class="mx-2">{{ $global->email ?? '' }}</span>
                        </p>
                        <p class="row middle-xs mt-1"> 
                            <i class="material-icons primary-color">schedule</i> 
                            <span class="mx-2">{{ $global->on_of_time ?? '' }}</span>
                        </p> 
                        <div class="row start-xs middle-xs desc">
                            <a href="{{ $global->facebook }}" target="blank" class="social-icon">
                                <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                    <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                                </svg>
                            </a>
                            <a href="{{ $global->twitter }}" target="blank" class="social-icon">
                                <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                    <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                                </svg> 
                            </a>
                            <a href="{{ $global->linkedin }}" target="blank" class="social-icon"> 
                                <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                    <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                                </svg>
                            </a>
                            <a href="{{ $global->gmail }}" target="blank" class="social-icon"> 
                                <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                    <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" />
                                </svg>
                            </a>
                        </div>  
                    </div> 
                    <div class="col-xs-12 col-sm-5 col-md-3 p-0 feedback"> 
                        <h2 class="uppercase">Usefull Links</h2>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <ul class="footer-menu" style="margin-top: 10px;list-style-type:circle">
                                    @foreach (App\Models\Page::where(['status'=>'active','is_service'=>0])->take(4)->get() as $item)
                                    <li style="padding: 5px 0;"><a style="color: #fff;font-size:15px;" href="{{ route('page',$item->slug) }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <ul class="footer-menu" style="margin-top: 10px;list-style-type:circle">
                                    <li style="padding: 5px 0;"><a style="color: #fff;font-size:15px;" href="{{ route('projects') }}">Projects</a></li>
                                    <li style="padding: 5px 0;"><a style="color: #fff;font-size:15px;" href="{{ route('faqs') }}">FAQS</a></li>
                                    @foreach (App\Models\Page::where(['status'=>'active','is_service'=>0])->skip(4)->take(2)->get() as $item)
                                    <li style="padding: 5px 0;"><a style="color: #fff;font-size:15px;" href="{{ route('page',$item->slug) }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                       
                        {{-- <h2 class="uppercase">Feedback</h2> --}}
                        <form action="javascript:void(0);" class="feedback-form pt-2" id="feedbac_form">
                            @csrf  
                            <div class="mdc-text-field mdc-text-field--outlined w-100">
                                <input id="feedback-email" class="mdc-text-field__input" name="phone" type="text" placeholder="Phone is required">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="feedback-email" class="mdc-floating-label">Phone</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <span class="text-danger error-text phone_error"></span>
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 mt-4">
                                <textarea id="feedback-message" class="mdc-text-field__input" name="message" type="text" rows="5" placeholder="Message is required"></textarea>
                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="feedback-message" class="mdc-floating-label">Message for us</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <span class="text-danger error-text message_error"></span> 
                            <div class="w-100 text-center mt-4">
                                <button type="submit" id="feedback_btn" class="mdc-button mdc-button--raised">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Feedback</span> 
                                </button> 
                            </div> 
                        </form> 
                    </div> 
                    <div class="col-xs-12 col-md-4 p-0 location"> 
                        <h2 class="uppercase mb-3">Our location</h2>
                        {{-- <div id="location-map"></div> --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3644.9544824018994!2d90.38650031430197!3d23.99738438521454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWireless%20Gate%2C%20T%26T%20Road%2C%20Gazipur%20(Abdul%20Hakim%20Super%20Market)!5e0!3m2!1sen!2sbd!4v1640156803476!5m2!1sen!2sbd" width="440" height="340" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>  
            </div> 
            <div class="row between-xs middle-xs copyright">
                <p>Copyright © 2021 All Rights Reserved BIST</p>
                <p>Developed by 
                    <a class="mdc-button" href="http://azizul.intels.co/" target="_blank"> 
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Azizul Islam</span> 
                    </a>
                </p>
            </div> 
        </div>
    </div>      
</footer>  
{{-- <div id="favorites-snackbar" class="mdc-snackbar">
    <div class="mdc-snackbar__surface">
        <div class="mdc-snackbar__label">The property has been added to favorites.</div>
        <div class="mdc-snackbar__actions">
            <button type="button" class="mdc-button mdc-snackbar__action">
            <div class="mdc-button__ripple"></div>
            <span class="mdc-button__label">
                <i class="material-icons warn-color">close</i>
            </span>
            </button>
        </div>
    </div>
</div>  --}}

<div id="back-to-top"><i class="material-icons">arrow_upward</i></div>