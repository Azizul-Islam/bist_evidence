@extends('layouts.admin-app')
@section('title', 'Blog Edit')
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
                <li class="breadcrumb-item active" aria-current="Blog">Blog Edit</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex"><h4>Edit Blog : </h4></div>
                       
                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary btn-icon"><i class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blogs.update',$blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$blog->title) }}" name="title" id="title"
                                placeholder="Enter title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <small class="text-danger">*</small></label>
                            <textarea type="text" id="editor" rows="10" class="form-control @error('description') is-invalid @enderror"  name="description"
                                placeholder="Enter description">{{ old('description',$blog->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
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
