@extends('layouts.admin-app')
@section('title', 'Page Edit')
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Page Edit</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex"><h4>Edit Page : </h4></div>
                       
                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.pages.index') }}" class="btn btn-primary btn-icon"><i class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.pages.update',$page) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$page->title) }}" name="title" id="title"
                                placeholder="Enter title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <small class="text-danger">*</small></label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror"  name="description" id="editor"
                                placeholder="Enter description">{{ old('description',$page->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                           
                            <div class="mb-3">
                                <label for="Photo" class="form-label">Cover Photo <small class="text-danger"></small></label>
                                
                                <input class="form-control  @error('photo') is-invalid @enderror" type="file" name="photo">
                                @error('photo')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                  <div id="holder" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $page->photo }}" height="100" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status <small class="text-danger">(optional)</small></label>
                                <select name="status" class="select2-example form-control">
                                    <option value="active" {{ $page->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $page->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                  </select>
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
