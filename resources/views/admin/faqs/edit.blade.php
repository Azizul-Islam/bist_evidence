@extends('layouts.admin-app')
@section('title', 'Faqs Edit')
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Faqs Edit</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">
                            <h4>Edit Faqs : </h4>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-primary btn-icon"><i
                                    class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.faqs.update',$faq) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title',$faq->title) }}" name="title" id="title" placeholder="Enter title">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sub_title" class="form-label">Sub Title <small class="text-danger">(Optional)</small></label>
                                    <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                                        value="{{ old('sub_title',$faq->sub_title) }}" name="sub_title" id="name" placeholder="Enter sub title">
                                    @error('sub_title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <small
                                            class="text-danger">*</small></label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description" placeholder="Enter description">{{ old('description',$faq->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
    @include('admin.includes.message')
    
@endsection
