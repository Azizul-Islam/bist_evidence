@extends('layouts.app')
@section('title','Register')
@section('styles')
    <style>
        .text-danger{
            color: var(--mdc-theme-secondary) !important;
        }
    </style>
@endsection
@section('content')
<div class="px-3">  
    <div class="theme-container">  
        <div class="row center-xs middle-xs my-5"> 
            <div class="mdc-card p-3 p-relative mw-500px">
                <div class="column center-xs middle-xs text-center">  
                    <h1 class="uppercase">Register</h1>
                    <a href="{{ route('agent.login') }}" class="mdc-button mdc-ripple-surface mdc-ripple-surface--accent accent-color normal w-100">
                        Already have an account? Sign in!
                    </a>  
                </div>
                <form action="javascript:void(0);" method="POST" id="agent_form">
                    @csrf  
                        
                       
                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                        <i class="material-icons mdc-text-field__icon text-muted">person</i>
                        <input class="mdc-text-field__input" type="text" name="name" id="name">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label">Name</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                    <span class="text-danger error-text name_error"></span>  
                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                        <i class="material-icons mdc-text-field__icon text-muted" >email</i>
                        <input class="mdc-text-field__input" type="email" name="email" id="email">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label">Email</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                    <span class="text-danger error-text email_error"></span>  
                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                        <i class="material-icons mdc-text-field__icon text-muted" >phone</i>
                        <input class="mdc-text-field__input" type="text" name="phone" id="phone">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label">Phone</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                    <span class="text-danger error-text phone_error"></span>
                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon mdc-text-field--with-trailing-icon w-100 custom-field mt-4 custom-field">
                        <i class="material-icons mdc-text-field__icon text-muted">lock</i>
                        <i class="material-icons mdc-text-field__icon text-muted password-toggle" tabindex="1">visibility_off</i>
                        <input class="mdc-text-field__input" type="password" name="password" id="password">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label">Password</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                    <span class="text-danger error-text password_error"></span> 
                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon mdc-text-field--with-trailing-icon w-100 custom-field mt-4 custom-field">
                        <i class="material-icons mdc-text-field__icon text-muted">lock</i>
                        <i class="material-icons mdc-text-field__icon text-muted password-toggle" tabindex="1">visibility_off</i>
                        <input class="mdc-text-field__input" type="password" name="password_confirmation" id="password_confirmation">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label">Confirm Password</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div> 
                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon mdc-text-field--with-trailing-icon w-100 custom-field mt-4 custom-field">
                        <input  type="radio" name="user_type" checked value="agent" id="agent"> <label for="agent">Agent</label>
                        <input  type="radio" name="user_type" value="customer" id="customer"> <label for="customer">Customer</label>
                    </div>
                    
                    <div class="text-center mt-4"> 
                        <button class="mdc-button mdc-button--raised bg-accent" type="submit">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Create an Account</span> 
                        </button>
                    </div>  
                </form>
                <div class="row my-4 px-3 p-relative">
                    <div class="divider w-100"></div> 
                </div>  
                <div class="row center-xs middle-xs"> 
                    <small>By clicking the "Create an Account" button you agree with our</small>
                    <a href="{{ route('terms') }}" class="mdc-button normal">
                        <span class="mdc-button__ripple"></span> 
                        <span class="mdc-button__label">Terms and conditions</span> 
                    </a>  
                </div>
            </div>                    
        </div>   
    </div>  
</div> 
@endsection
@section('scripts')
    <script>
        $('#agent_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('agent.register') }}",
                method: 'POST',
                dataType: 'JSON',
                data: $('#agent_form').serialize(),
                beforeSend: function() {
                    $(document).find('span.error-text').text();
                },
                success: function(data) {
                    if(data.status == 0) {
                        $.each(data.errors,function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else {
                        $('#agent_form')[0].reset();
                        toastr.success(data.msg);
                    }
                },

            });
        });
    </script>
@endsection