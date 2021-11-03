@extends('layouts.app')
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
                        <form action="javascript:void(0);">  
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Name</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Email</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Phone</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>  
                            <div class="my-2 col-xs-6 p-0">  
                                <label class="text-muted">Image</label> 
                                <div id="user-profile-image" class="dropzone needsclick">
                                    <div class="dz-message needsclick text-muted">    
                                        Drop file here or click to upload.
                                    </div>
                                </div> 
                                <div id="dropzone-preview-template" class="d-none plan-image-template">
                                    <div class="dz-preview dz-file-preview">
                                        <div class="dz-image"><img src="assets/images/others/transparent-bg.png" data-dz-thumbnail="" alt="prop-image"></div>
                                        <div class="dz-details">
                                            <div class="dz-size"><span data-dz-size=""></span></div>
                                            <div class="dz-filename"><span data-dz-name=""></span></div>
                                        </div>
                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                        <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                        <div class="dz-success-mark">
                                            <i class="material-icons mat-icon-xlg">check</i> 
                                        </div>
                                        <div class="dz-error-mark">
                                            <i class="material-icons mat-icon-xlg">cancel</i> 
                                        </div> 
                                    </div>
                                </div>  
                            </div> 
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Organization</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Facebook</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Twitter</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Linkedin</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Instagram</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Website</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="row around-xs middle-xs p-2 mb-3"> 
                                <button class="mdc-button mdc-button--raised" type="button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Update profile</span> 
                                </button> 
                            </div> 
                        </form>  
                    </div>
                    <div class="col-xs-12 col-md-6 px-3">
                        <h2 class="text-muted text-center fw-600 mb-3">Password change</h2>
                        <form action="javascript:void(0);">  
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="password">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Current Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="password">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">New Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <input class="mdc-text-field__input" type="password">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Confirm New Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>  
                            <div class="row around-xs middle-xs p-2 mb-3"> 
                                <button class="mdc-button mdc-button--raised" type="button">
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