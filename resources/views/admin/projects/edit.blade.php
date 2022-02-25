@extends('layouts.admin-app')
@section('title', 'Projects Edit')
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Projects</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">
                            <h4>Edit Projects</h4>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-icon"><i
                                    class="bi bi-arrow-left-circle"></i> Back To List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.projects.update',$project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <small class="text-primary">*</small></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title',$project->title) }}" name="title" id="title" placeholder="Enter Title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price Start <small
                                            class="text-primary">*</small></label>
                                    <input type="number" min="0" class="form-control @error('price_start') is-invalid @enderror"
                                        value="{{ old('price_start',$project->price_start) }}" name="price_start" id="price_start" placeholder="Enter price start">
                                    @error('price_start')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price End </label>
                                    <input type="number" min="0" class="form-control @error('price_end') is-invalid @enderror"
                                        value="{{ old('price_end',$project->price_end) }}" name="price_end" id="price_end" placeholder="Enter price end">
                                    @error('price_end')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address',$project->address) }}" name="address" id="address"
                                        placeholder="Enter address">
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Status" class="form-label">Project Status <small
                                            class="text-danger">*</small></label>
                                    <select name="project_status" class="@error('project_status') is-invalid @enderror form-control">
                                        <option value="">Select one</option>
                                        <option value="new" {{ $project->project_status == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="upcoming" {{ $project->project_status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                        <option value="ongoing" {{ $project->project_status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    </select>
                                    @error('project_status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="description" class="form-label">Descrioption </label>
                            <textarea type="text" name="description"
                                class="form-control @error('description') is-invalid @enderror" id="editor"
                                placeholder="Enter description" cols="30" rows="5">{{ old('description',$project->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        
                       
                        <div class="row">
                           <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Photo" class="form-label">Photo <small class="text-danger">*</small></label>
                                <input type="file" required class="form-control @error('photos') is-invalid @enderror" multiple name="photos[]"
                                    id="photo">
                                @error('photos')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <div class="mt-2">
                                    @foreach ($project->images as $photo)
                                    <img src="{{ asset('backend/projects/'.$photo->path) }}" height="100" width="150" alt="">
                                    @endforeach
                                </div>
                            </div>
                           </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Status" class="form-label">Status </label>
                                    <select name="status" class="select2-example form-control">
                                        {{-- <option value="">Select one</option> --}}
                                        <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $project->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
    </div>
@endsection
@section('scripts')
@endsection
