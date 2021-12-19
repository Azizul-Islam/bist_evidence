@extends('layouts.admin-app')
@section('title','Page')
@section('content')

<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">
                    <i class="bi bi-globe2 small me-2"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Page</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 bd-content">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Pages : {{ count($pages) }}</h4></div>
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>S.L</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                   <tbody>
                       @forelse ($pages as $i=>$item)
                       <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            <img src="{{ asset('backend/pages/'.$item->photo) }}" width="100" alt="">
                        </td>
                       <td>{{ $item->title }}</td>
                       
                       
                        <td>
                            <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.pages.edit',$item) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                                <form id="delete-page-form" action="{{ route('admin.pages.destroy',$item) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button  type="submit" data-id="{{ $item->id }}" class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                                
                                </form>
                              </div>
                        </td>
                       
                    </tr>
                       @empty
                           <tr>
                               <td class="text-center text-danger" colspan="6">No Data Found!</td>
                           </tr>
                       @endforelse
                   </tbody>
                    <tfoot>
                    <tr>
                        <th>S.L</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
            
        </div>

    </div>
</div>
@endsection
@section('scripts')
    <script>
        $('input[name=status]').change(function(){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
                url: "{{ route('admin.page.status') }}",
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
                        toastr.error('Something went wrong!');
                    }
                }
            });
        });
    </script>
@endsection