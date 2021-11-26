@extends('layouts.admin-app')
@section('title','Agent List')
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
            <li class="breadcrumb-item active" aria-current="page">Agent List</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Agent List</h4></div>
                    
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
                    <th>S.L</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    {{-- <th class="text-end">Actions</th> --}}
                </tr>
                </thead>
                <tbody>
                @forelse($agents as $i=>$item)
                <tr>
                    
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->phone }}</td>
                   <td>{{ $item->email }}</td>
                   <td>{{ $item->address }}</td>
                   <td>
                    <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                   </td>
                    {{-- <td class="text-end">
                        <div class="btn-group">
                            <a href="" class="btn btn-sm btn-info rounded"><i class="bi bi-eye"></i></a>
                        </div>
                    </td> --}}
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="7">Data Not Found!</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{-- <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $agents->links('pagination::bootstrap-4') }}
            </ul>
        </nav> --}}
    </div>
   
</div>

@endsection
@section('scripts')
    
    @include('admin.includes.message')
    <script>
        $('input[name=status]').change(function(){
            let mode = $(this).prop('checked');
            let id = $(this).val();
            $.ajax({
                url: "{{ route('admin.agent.status') }}",
                method: 'PUT',
                dataType: 'JSON',
                data: {
                    _token: "{{ csrf_token() }}",
                    mode: mode,
                    id: id,
                },
                success: function(data) {
                    if(data.status == 1){
                        toastr.success(data.msg);
                    }else{
                       toastr.error('Something went wrong!');
                    }
                }
            });
        });
    </script>
    
@endsection