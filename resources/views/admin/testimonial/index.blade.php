@extends('layouts.admin-app')
@section('title','Testimoial')
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
            <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 bd-content">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Testimonials : {{ count($testimonials) }}</h4></div>
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="datatable-example" class="table">
                    <thead>
                    <tr>
                        <th>S.L</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $i=>$item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                <img src="{{ asset('frontend/assets/images/testimonials/'.$item->photo) }}" style="height: 60px" alt="">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ ucfirst($item->designation) }}</td>
                           <td>{{ Str::limit($item->comment,40,'...') }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.testimonials.edit',$item) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                                    <form id="delete-client-form" action="{{ route('admin.testimonials.destroy',$item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="deleteTestimonial" type="submit" data-id="{{ $item->id }}" class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                                    
                                    </form>
                                  </div>
                            </td>                           
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No data found!</td>
                        </tr>
                        @endforelse
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S.L</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Comment</th>
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
                url: "{{ route('admin.client.status') }}",
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
    <script>
        //delete testimonial
        $(document).on('click','#deleteTestimonial',function(e){
            e.preventDefault();
            let id = $(this).data('id');
            let url = "{{ route('admin.testimonials.destroy',":id") }}";
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
                            location.reload();
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