@extends('layouts.admin-app')
@section('title','Area')
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
            <li class="breadcrumb-item active" aria-current="page">Area</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Create Area : </h4></div>
                   
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="@if(!blank($update_area)) {{ route('admin.areas.update',$update_area) }} @else{{ route('admin.areas.store') }} @endif" method="POST">
                @csrf
                @if(!blank($update_area)) @method('PUT') @endif
                <div class="mb-3">
                    <label for="area_name" class="form-label">Location <small>*</small></label>
                    <input type="text" class="form-control @error('area_name') is-invalid @enderror"  @if(!blank($update_area)) value="{{ old('area_name',$update_area->name) }}" @else value="{{ old('area_name') }}" @endif name="area_name" id="area_name"
                        placeholder="Enter Location">
                    @error('area_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach($parent_areas as $area)
                            <option  value="{{ $area->id }}" @if(!blank($update_area) && $update_area->parent_id == $area['id']) selected @endif>{!! $area->name !!}</option>
                        @endforeach
                      </select>
                </div>

                <div class="mb-3">
                    @if(blank($update_area))
                    <button class="btn btn-primary">Submit</button>
                    @else
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.areas.index') }}" class="btn btn-danger">Cancel</a>
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
                    <div class="d-none d-md-flex"><h4>Total areas : </h4></div>
                   
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>S.L</th>
                        <th>Location</th>
                        <th>Parent</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($areas as $i=>$item)
                       
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ App\Models\Area::where('id',$item->parent_id)->value('name') }}</td>
                            {{-- <td>
                                <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                            </td> --}}
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.areas.index',['area_id'=>$item->id]) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                                    
                                  </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">Data Not Found!</td>
                        </tr>
                        @endforelse
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S.L</th>
                        <th>Location</th>
                        <th>Parent</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
                <nav class="mt-4" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $areas->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
            
        </div>

       

    </div>
</div>
@endsection