@extends('layouts.admin-app')
@section('title','Consumer Request')
@section('styles')

@endsection
@section('content')
<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    <i class="bi bi-globe2 small me-2"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Consumer Request</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Consumer Request</h4></div>
                    
                    {{-- <div class="dropdown ms-auto">
                        <a href="{{ route('properties.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="properties" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    {{-- <th>Email</th> --}}
                    <th>Location</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($consumer_requests as $i=>$item)
                
                <tr>
                    
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->phone }}</td>
                   {{-- <td>{{ $item->email }}</td> --}}
                   <td>{{ $item->area->name }} →&nbsp @if(!blank($item->sub_area_id)) {{ $item->sub_area->name }} @endif</td>
                   <td><span class="badge {{ $item->purpose == 'sell' ? 'bg-primary' : 'bg-info' }}">{{ ucfirst($item->purpose) }}</span></td>
                   <td>{{ $item->status }}</td>
                   <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        --
                        {{-- <div class="btn-group">
                            <a href="{{ route('properties.edit',$item->id) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                            <form action="{{ route('properties.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                                <button  data-id="{{ $item->id }}" class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                            </form>
                        </div> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="8">Data Not Found!</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $consumer_requests->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
   
</div>

@endsection
@section('scripts')
    
    @include('admin.includes.message')
    
    
@endsection