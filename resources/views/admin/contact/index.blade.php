@extends('layouts.admin-app')
@section('title','Contact')
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
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Contact</h4></div>
                    
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
                    <th>Message</th>
                    <th>Date</th>
                    {{-- <th class="text-end">Actions</th> --}}
                </tr>
                </thead>
                <tbody>
                @forelse($contacts as $i=>$item)
                <tr>
                    
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->phone }}</td>
                   <td>{{ $item->email }}</td>
                   <td>{{ Str::limit($item->message,40,'...') }}</td>
                   {{-- <td>
                    <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'read' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Read" data-off="Unread" data-onstyle="success" data-offstyle="danger">
                   </td> --}}
                   <td>{{ $item->created_at->diffForHumans() }}</td>
                    {{-- <td class="text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.customer-response.show',$item->id) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-eye"></i></a>
                        </div>
                    </td> --}}
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="6">Data Not Found!</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $contacts->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
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
                url: "{{ route('admin.customer-response.status') }}",
                method: 'PUT',
                dataType: 'JSON',
                data: {
                    _token: "{{ csrf_token() }}",
                    mode: mode,
                    id: id,
                },
                success: function(data) {
                    if(data.status){
                        toastr.success(data.msg);
                    }else{
                       toastr.error('Something went wrong!');
                    }
                }
            });
        });
    </script>
    
@endsection