@extends('layouts.admin-app')
@section('title','Setting')
@section('content')
<div class="row flex-column-reverse flex-md-row">
    <div class="col-md-12">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Contact</h6>
                        <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name',$global->company_name) }}">
                                    @error('company_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Website</label>
                                    <input type="text" name="company_website" class="form-control @error('website') is-invalid @enderror" value="{{ old('company_website',$global->company_website) }}">
                                    @error('website')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$global->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone 1</label>
                                    <input type="text" name="phone1" class="form-control @error('phone1') is-invalid @enderror" value="{{ old('phone1',$global->phone1) }}">
                                    @error('phone1')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email',$global->email) }}">
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email 1</label>
                                    <input type="email" name="email1" class="form-control" value="{{ old('email1',$global->email1) }}">
                                    @error('email1')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Company Address</label>
                                    <textarea name="address" tepe="text" class="form-control">{{ old('address',$global->address) }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Footer Description</label>
                                    <textarea name="footer_description" tepe="text" id="editor" class="form-control">{{ old('footer_description',$global->footer_description) }}</textarea>
                                    @error('footer_description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Get In Touch Title</label>
                                    <input type="text" name="get_in_touch_title" class="form-control" value="{{ old('get_in_touch_title',$global->get_in_touch_title) }}">
                                    @error('get_in_touch_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Get In Touch Description</label>
                                    <input type="text" name="get_in_touch_description" class="form-control" value="{{ old('get_in_touch_description',$global->get_in_touch_description) }}">
                                    @error('get_in_touch_description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Copyright Text</label>
                                    <textarea name="copyright" tepe="text" id="editor"  class="form-control">{{ old('copyright',$global->copyright) }}</textarea>
                                    @error('copyright')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Logo</label>
                                    <input type="file" name="company_logo" class="form-control @error('company_logo') is-invalid @enderror" >
                                    @error('company_logo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ asset($global->logo) }}" class="mt-2" height="50" width="200" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Favicon</label>
                                    <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror" value="">
                                    @error('favicon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ asset($global->favicon) }}" class="mt-2" height="50" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Footer Logo</label>
                                <input type="file" name="footer_logo" class="form-control @error('footer_logo') is-invalid @enderror" >
                                @error('footer_logo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <img src="{{ asset($global->footer_logo) }}" style="background: black" class="mt-2" height="50" width="200" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Get In Touch Photo</label>
                                <input type="file" name="get_in_touch_photo" class="form-control @error('get_in_touch_photo') is-invalid @enderror" >
                                @error('get_in_touch_photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <img src="{{ asset($global->get_in_touch_photo) }}" class="mt-2" height="50" width="200" alt="">
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                   <button class="btn btn-primary">Save</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
</div>
<div class="row flex-column-reverse flex-md-row">
    <div class="col-md-12">
        {{-- <div class="card sticky-top mb-4 mb-md-0"> --}}
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-4">Social Link</h6>
                    <form action="{{ route('admin.settings.social.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" name="twitter" class="form-control"
                                           value="{{ $global->twitter }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gmail</label>
                                    <input type="text" name="gmail" class="form-control"
                                           value="{{ $global->gmail }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" name="facebook" class="form-control"
                                           value="{{ $global->facebook }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" name="instagram" class="form-control"
                                           value="{{ $global->instagram }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control"
                                           value="{{ $global->linkedin }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Youtube</label>
                                    <input type="text" name="youtube" class="form-control"
                                           value="{{ $global->youtube }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>


@endsection
