@extends('layouts.admin-app')
@section('title', 'Testimonial create')
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Testimonial create</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">
                            <h4>Create Testimonial : </h4>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary btn-icon"><i
                                    class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name" id="name" placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                        value="{{ old('designation') }}" name="designation" id="name" placeholder="Enter designation">
                                    @error('designation')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Company Name <small class="text-danger">(Optional)</small></label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        value="{{ old('company_name') }}" name="company_name" id="name" placeholder="Enter company name">
                                    @error('company_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Photo" class="form-label">Photo <small
                                            class="text-danger">(Optional)</small></label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        name="photo">
                                    @error('photo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment <small
                                            class="text-danger">*</small></label>
                                    <textarea type="text" class="form-control @error('comment') is-invalid @enderror"
                                        name="comment" placeholder="Enter comment">{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.includes.message')
    
@endsection
