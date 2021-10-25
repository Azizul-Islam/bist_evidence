@extends('layouts.admin-app')
@section('title', 'Client Edit')
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Client Edit</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex"><h4>Edit Client : </h4></div>
                       
                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-primary btn-icon"><i class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.clients.update',$client) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="link" class="form-label">Link <small class="text-danger">( optional )</small></label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{ old('link',$client->link) }}" name="link" id="link"
                                    placeholder="Enter link">
                                @error('link')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status <small class="text-danger">(optional)</small></label>
                                <select name="status" class="select2-example form-control">
                                    <option value="active" {{ $client->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $client->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                  </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Photo" class="form-label">Photo <small class="text-danger">*</small></label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                                    @error('photo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="photo mt-2">
                                        <img src="{{ asset('frontend/assets/images/clients/'.$client->photo) }}" style="height: 60px" alt="">
                                    </div>
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
@include('admin.includes.message')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

    <script>
        $('#lfm').filemanager('image');
        $('.select2-example').select2({
            placeholder: 'Select'
        });
    </script>
@endsection
