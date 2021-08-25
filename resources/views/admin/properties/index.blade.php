@extends('layouts.admin-app')
@section('title','Properties list')
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
            <li class="breadcrumb-item active" aria-current="page">Properties</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Properties</h4></div>
                    
                    <div class="dropdown ms-auto">
                        <a href="{{ route('properties.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="properties" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Address</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($properties as $i=>$item)
                
                <tr>
                    
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    <td>
                        <a href="#">
                            <img src="{{ asset('backend/assets/images/properties/'.$item->photo) }}" class="rounded" width="40"
                                 alt="Property">
                        </a>
                    </td>
                    <td>{{ Str::limit($item->title, 20, '...') }}</td>
                    <td>{{ number_format($item->price,2) }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ Str::limit($item->address, 20, '...') }}</td>
                    <td><span class="badge {{ $item->purpose == 'sell' ? 'bg-primary' : 'bg-info' }}">{{ ucfirst($item->purpose) }}</span></td>
                    <td>
                        <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                    </td>
                   
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="{{ route('properties.edit',$item->id) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                            <form action="{{ route('properties.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                                <button  data-id="{{ $item->id }}" class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="9">Data Not Found!</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $properties->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
   
</div>

@endsection
@section('scripts')
    <script>
       
        $('input[name=status]').change(function(){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
                url: "{{ route('property.status') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id
                },
                success: function(data){
                    if(data.status){
                        toastr.success(data.msg);
                    }else{
                       toastr.error(data.msg);
                    }
                }
            });
        });
    </script>
    
    @include('admin.includes.message')
    
    
@endsection