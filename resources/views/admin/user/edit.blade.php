@extends('layouts.admin-app')
@section('title', 'Admin User Edit')
@section('styles')

@endsection
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Admin User Edit</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex"><h4>Admin User Edit : </h4></div>
                       
                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-icon"><i class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.users.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$admin->name) }}" name="name" id="name"
                                placeholder="Enter name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Email <small class="text-danger">*</small></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$admin->email) }}" name="email" id="name"
                                    placeholder="Enter email">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Phone <small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$admin->phone) }}" name="phone" id="name"
                                    placeholder="Enter phone">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Password <small class="text-danger">*</small></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="name"
                                    placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Confirm Password <small class="text-danger">*</small></label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" id="name"
                                    placeholder="Enter confirm password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Photo" class="form-label">Photo </label>
                                <div class="input-group">
                                   
                                    <input id="thumbnail" class="form-control  @error('photo') is-invalid @enderror" type="file" name="photo">
                                    @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div id="holder" style="margin-top:15px;height:80px;">
                                   <img src="{{ asset('backend/assets/images/user/'.$admin->photo) }}" height="80" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
@endsection
