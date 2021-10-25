@extends('layouts.admin-app')
@section('title','Service')
@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
<link rel="stylesheet" href="{{ asset('frontend/css/libs/material-components-web.min.css') }}">  
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
            <li class="breadcrumb-item active" aria-current="page">Service</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Service List</h4></div>
                    
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#addService" id="test" data-bs-whatever="@mdo"><i class="bi bi-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="properties" >
                <thead>
                <tr>
                    <th>S.L</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody id="serviceRow">
                {{-- @forelse($services as $i=>$item)
                <tr>
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    <td>
                        <i class="material-icons mat-icon-xlg primary-color">{{ $item->icon }}</i>
                    </td>
                    <td>{{ Str::limit($item->title, 30, '...') }}</td>
                    <td>{{ Str::limit($item->description, 30, '...') }}</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.service.edit',$item) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                            <form action="{{ route('admin.service.destroy',$item) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                                <button class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="5">Data not available in this table!</td>
                </tr>
                @endforelse --}}
                </tbody>
            </table>
        </div>
        {{-- <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $properties->links('pagination::bootstrap-4') }}
            </ul>
        </nav> --}}
    </div>
   
</div>

<div class="modal fade" id="addService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="submit_form">
            @csrf
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Icon:</label>
                <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" id="recipient-name">
                <span class="text-danger error-text icon_error"></span>
            </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="recipient-name">
            <span class="text-danger error-text title_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" name="description" id="message-text">{{ old('description') }}</textarea>
            <span class="text-danger error-text description_error"></span>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{-- // edit service --}}
<div class="modal fade" id="editService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="update_service">
              @csrf
              <div class="mb-3">
                  <label for="" class="col-form-label">Icon:</label>
                  <input type="hidden" name="service_id"  class="form-control" id="edit_service_id">
                  <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" id="icon">
                  <span class="text-danger error-text icon_error"></span>
              </div>
            <div class="mb-3">
              <label for="" class="col-form-label">Title:</label>
              <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title">
              <span class="text-danger error-text title_error"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
              <span class="text-danger error-text description_error"></span>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="{{ asset('frontend/js/libs/material-components-web.min.js') }}"></script> 
     <script>
         function allService() {
             $.ajax({
                 url: "{{ route('admin.service.allservice') }}",
                 method: 'GET',
                 dataTypa: 'JSON',
                 success: function(data) {
                     let html = '';
                    $.each(data, function(k,v){
                        html +=
                        '<tr>'+
                            '<td>'+(k+1)+'</td>'+
                            '<td><i class="material-icons mat-icon-xlg primary-color">'+v.icon+'</i></td>'+
                            '<td>'+v.title+'</td>'+
                            '<td>'+v.description+'</td>'+
                            '<td class="text-end">'+
                                '<div class="btn-group">'+
                                    '<a href="" data-bs-toggle="modal" data-bs-target="#editService" data-bs-whatever="@mdo" onclick="editService('+v.id+')" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>'+
                                    '<form action="" method="POST" onsubmit="">'+
                                        '<button class="delBtn btn btn-sm btn-primary rounded" data-id="'+v.id+'"><i class="bi bi-trash"></i></button>'+
                                    '</form>'+
                               '</div>'+
                            '</td>'+
                        '</tr>';
                    });
                    $('#serviceRow').html(html);
                 },
             });
         }
         allService();
        $('#submit_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('admin.service.store') }}",
                method: 'POST',
                data: $('#submit_form').serialize(),
                dataTypa: 'JSON',
                beforeSend: function() {
                    $(document).find('span.error-text').text();
                },
                success: function(data){
                    if(data.status == 0) {
                        $.each(data.errors, function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else {
                        $('#submit_form')[0].reset();
                        $('#addService').modal('hide');
                        allService();
                        toastr.success(data.msg);
                    }
                }
            });
        });

        //edit service 
        function editService(id) {
            let url = "{{ route('admin.service.edit', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'GET',
                dataTypa: 'JSON',
                success: function(data) {
                    $('#edit_service_id').val(data.id);
                    $('#icon').val(data.icon);
                    $('#title').val(data.title);
                    $('#description').val(data.description);
                },
            });
        }

        //update_service

        $('#update_service').on('submit',function(e){
            e.preventDefault();
            let id = $('#edit_service_id').val();
            let url = "{{ route('admin.service.update',":id") }}";
            url = url.replace(':id',id);
            $.ajax({
                url: url,
                method: 'PUT',
                dataType: 'JSON',
                data: $('#update_service').serialize(),
                beforeSend: function() {
                    $(document).find('span.error-text').text();
                },
                success: function(data) {
                    if(data.status == 0) {
                        $.each(data.errors,function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else {
                        $('#update_service')[0].reset();
                        $('#editService').modal('hide');
                        allService();
                        toastr.success(data.msg);
                    }
                }
            });
        });

        //delete service
        $(document).on('click','.delBtn',function(e){
            e.preventDefault();
            let id = $(this).data('id');
            let url = "{{ route('admin.service.destroy',":id") }}";
            url = url.replace(':id',id);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: url,
                    method: "DELETE",
                    dataType: 'JSON',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function (data) {
                        if(data.status) {
                            allService();
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                    },         
                });
                   
                }
                });
            
        });


     </script>
    
@endsection