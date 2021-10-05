@extends('layouts.admin-app')
@section('title','Amenity')
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
            <li class="breadcrumb-item active" aria-current="page">Amenity</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Create Amenity : </h4></div>
                   
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="@if(!blank($amenity)) {{ route('admin.amenities.update',$amenity) }} @else{{ route('admin.amenities.store') }} @endif" method="POST">
                @csrf
                @if(!blank($amenity)) @method('PUT') @endif
                <div class="mb-3">
                    <label for="amenity_name" class="form-label">Name <small class="text-danger">*</small></label>
                    <input type="text" class="form-control @error('amenity_name') is-invalid @enderror"  @if(!blank($amenity)) value="{{ old('amenity_name',$amenity->name) }}" @else value="{{ old('amenity_name') }}" @endif name="amenity_name" id="amenity_name"
                        placeholder="Enter Amenity name">
                    @error('amenity_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    @if(blank($amenity))
                    <button class="btn btn-primary">Submit</button>
                    @else
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.amenities.index') }}" class="btn btn-danger">Cancel</a>
                    @endif
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Amenities : </h4></div>
                   
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th>S.L</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($amenities as $i=>$item)
                        
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.amenities.index',['amenity_id'=>$item->id]) }}" class="mr-2 btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                                        <form onsubmit="return confirm('Are you sure?')" action="{{ route('admin.amenities.destroy',$item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger rounded"><i class="bi bi-trash small"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="4">No data abailable in this table!</td>
                            </tr>
                            @endforelse
                        
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.L</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- <nav class="mt-4" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $areas->links('pagination::bootstrap-4') }}
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
        @include('admin.includes.message')
    
    
@endsection