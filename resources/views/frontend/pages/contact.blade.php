@extends('layouts.app')
@section('title','Contact')
@section('styles')
    <style>
        .text-danger{
            color: var(--mdc-theme-secondary) !important;
        }
    </style>
@endsection
@section('content')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{ asset('frontend/assets/images/others/contact.jpg') }}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-bottom">
        <h1 class="title">Contact Us</h1>
        <p class="desc">Got a question? We'll give you straight answer</p> 
    </div>
</div>  
<div class="px-3">  
    <div class="theme-container"> 
        <div class="mdc-card main-content-header mb-5"> 
            <div class="row around-xs">
                <div class="col-xs-12 col-sm-4">
                    <div class="column center-xs middle-xs text-center">
                        <i class="material-icons mat-icon-lg primary-color">home</i>
                        <h3 class="primary-color py-1">ADDRESS :</h3>
                        <span class="text-muted fw-500">{{ $global->address }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="column center-xs middle-xs text-center">
                        <i class="material-icons mat-icon-lg primary-color">call</i>
                        <h3 class="primary-color py-1">PHONES :</h3>
                        <span class="text-muted fw-500">{{ $global->phone }}</span>
                        <span class="text-muted fw-500">{{ $global->phone1 }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="column center-xs middle-xs text-center">
                        <i class="material-icons mat-icon-lg primary-color">mail_outline</i>
                        <h3 class="primary-color py-1">E-MAIL :</h3>
                        <span class="text-muted fw-500">{{ $global->email }}</span>
                        <span class="text-muted fw-500">{{ $global->email1 }}</span>
                    </div>
                </div> 
                <div class="col-xs-12 mt-3 px-3 p-relative">
                    <div class="divider w-100"></div>
                </div> 
                <h3 class="w-100 text-center py-3">CONTACT US</h3> 
                <form action="javascript:void(0);" id="contact_form" class="contact-form row" method="POST">
                    @csrf 
                    <div class="col-xs-12 col-sm-12 col-md-4 p-2">  
                        <div class="mdc-text-field mdc-text-field--outlined w-100">
                            <input class="mdc-text-field__input" name="name" placeholder="Name is required">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Name *</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div> 
                        <span class="text-danger error-text name_error"></span>  
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 p-2">  
                        <div class="mdc-text-field mdc-text-field--outlined w-100">
                            <input class="mdc-text-field__input" name="email" placeholder="Email is optional">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Email</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div> 
                        <span class="text-danger error-text email_error"></span>  
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-4 p-2">  
                        <div class="mdc-text-field mdc-text-field--outlined w-100">
                            <input class="mdc-text-field__input" name="phone" placeholder="Phone is required">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Phone *</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div> 
                        <span class="text-danger error-text phone_error"></span>  
                    </div>  
                    <div class="col-xs-12 p-2">  
                        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100">
                            <textarea class="mdc-text-field__input" name="message" rows="5" placeholder="Message is required"></textarea>
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Message *</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <span class="text-danger error-text message_error"></span>  
                    </div>   
                    <div class="col-xs-12 w-100 py-3 text-center">
                        <button class="mdc-button mdc-button--raised" id="contactSubBtn" type="submit">
                            <span class="mdc-button__ripple"></span> 
                            <span class="mdc-button__label">Submit</span> 
                        </button>   
                    </div> 
                </form>  
            </div> 
            <div class="mt-5">
                <div id="contact-map"></div>
            </div> 
        </div>
    </div>  
</div>
@endsection

@section('scripts')
    <script>
        $(document).on('click','#contactSubBtn',function(e){
            e.preventDefault();
            $('#contactSubBtn').text('Processing...');
            $('#contactSubBtn').attr('disabled',true);
            $.ajax({
                url: "{{ route('contact') }}",
                method: "POST",
                data: $('#contact_form').serialize(),
                beforeSend: function(){
                    $(document).find('span.error-text').text();
                },
                success: function(data) {
                    if(data.status == 0){
                        $('#contactSubBtn').text('Submit');
                        $('#contactSubBtn').attr('disabled',false);
                        $.each(data.errors,function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else {
                        $('#contactSubBtn').text('Submit');
                        $('#contactSubBtn').attr('disabled',false);
                        $('#contact_form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            });
        });
    </script>
@endsection