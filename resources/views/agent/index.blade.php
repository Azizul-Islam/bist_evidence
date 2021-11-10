@extends('layouts.app')
@section('styles')
    <style>
        .text-danger{
            color: var(--mdc-theme-secondary) !important;
        }
    </style>
@endsection
@section('title','Dashboard')
@section('content')
<div class="px-3">  
    <div class="theme-container">   
        <div class="page-drawer-container mt-3">
           @include('agent.profile.sidebar')
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            <div class="page-sidenav-content"> 
                <div class="row mdc-card between-xs middle-xs w-100 p-2 mdc-elevation--z1 text-muted d-md-none d-lg-none d-xl-none mb-3">
                    <button id="page-sidenav-toggle" class="mdc-icon-button material-icons">more_vert</button> 
                    <h3 class="fw-500">My Account</h3>
                </div> 
                <div class="mdc-card p-3 row mb-3">
                    <div class="col-xs-12 col-md-6 px-3">
                        <h2 class="text-muted text-center fw-600 mb-3">Account details</h2>
                        <form action="javascript:void(0);" method="POST" id="update_form">
                            @csrf  
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input class="mdc-text-field__input" type="text" name="name" value="{{ old('name',$user->name) }}">
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
                                <input class="mdc-text-field__input" type="email" readonly value="{{ $user->email }}">
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
                                <input class="mdc-text-field__input" type="text" name="phone" value="{{ old('phone',$user->phone) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Phone</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>  
                            <span class="text-danger error-text phone_error"></span>
                            
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="file" name="photo">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Organization</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="address" value="{{ old('address',$user->address) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Address</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="organization" value="{{ old('organization',$user->organization) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Organization</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="facebook" value="{{ old('facebook',$user->facebook) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Facebook</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="twitter" value="{{ old('twitter',$user->twitter) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Twitter</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="linkedin" value="{{ old('linkedin',$user->linkedin) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Linkedin</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="instagram" value="{{ old('instagram',$user->instagram) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Instagram</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="text" name="website" value="{{ old('website',$user->website) }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Website</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="row around-xs middle-xs p-2 mb-3"> 
                                <button class="mdc-button mdc-button--raised" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Update profile</span> 
                                </button> 
                            </div> 
                        </form>  
                    </div>
                    <div class="col-xs-12 col-md-6 px-3">
                        <h2 class="text-muted text-center fw-600 mb-3">Password change</h2>
                        <form action="javascript:void(0);" method="POST" id="update_password">
                            @csrf  
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input class="mdc-text-field__input" type="password" name="oldpassword">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Current Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <span class="text-danger error-text oldpassword_error"></span>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="password" name="password">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">New Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <span class="text-danger error-text password_error"></span>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="password" name="password_confirmation">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Confirm New Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>  
                            <div class="row around-xs middle-xs p-2 mb-3"> 
                                <button class="mdc-button mdc-button--raised" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Change password</span> 
                                </button> 
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
    <script>
        $('#update_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('agent.profile.update') }}",
                method: "PUT",
                dataType: 'JSON',
                data: $('#update_form').serialize(),
                beforeSend: function(){
                    $(document).find('span.error-text').text();
                },
                success: function(data) {
                    if(data.status) {
                        toastr.success(data.msg);
                        // location.reload();
                    }
                    else{
                        toastr.error('Something went wrong!');
                    }
                },
            });
        });

        $('#update_password').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('agent.password.update') }}",
                method: 'PUT',
                dataType: 'JSON',
                data: $('#update_password').serialize(),
                beforeSend: function(){
                    $(document).find('span.error-text').text();
                },
                success: function(data){
                    
                    if(data.status == 0) {
                        $.each(data.errors,function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else{
                        $('#update_password')[0].reset();
                        toastr.success(data.msg);
                    }
                },
            });
        });

    </script>
@endsection