@extends('layouts.admin-app')
@section('title','Category list')
@section('styles')

@endsection
@section('content')
<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">
                    <i class="bi bi-globe2 small me-2"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Create Categories : </h4></div>
                   
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="@if(!blank($update_category)) {{ route('categories.update',$update_category) }} @else{{ route('categories.store') }} @endif" method="POST">
                @csrf
                @if(!blank($update_category)) @method('PUT') @endif
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category <small>*</small></label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror"  @if(!blank($update_category)) value="{{ old('category_name',$update_category->name) }}" @else value="{{ old('category_name') }}" @endif name="category_name" id="category_name"
                        placeholder="Enter category name">
                    @error('category_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Category</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach($parent_categories as $category)
                            <option  value="{{ $category->id }}" @if(!blank($update_category) && $update_category->parent_id === $category['id']) selected @endif>{!! $category->name !!}</option>
                        @endforeach
                      </select>
                </div>
                
                {{-- <div class="mb-3">
                    <label for="Status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        
                        <option value="active" {{ old('active') ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('inactive') ? 'selected' : '' }}>Inactive</option>
                      </select>
                </div> --}}
               
              

                <div class="mb-3">
                    @if(blank($update_category))
                    <button class="btn btn-primary">Submit</button>
                    @else
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
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
                    <div class="d-none d-md-flex"><h4>Total Categories : </h4></div>
                   
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>S.L</th>
                        <th>Title</th>
                        <th>Parent</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $i=>$item)
                       
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ App\Models\Category::where('id',$item->parent_id)->value('name') }}</td>
                            {{-- <td>
                                <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                            </td> --}}
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('categories.index',['category_id'=>$item->id]) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                                    {{-- <form action="{{ route('categories.destroy',$item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="deletebutton" data-id="{{ $item->id }}" class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                                    
                                    </form> --}}
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
                        <th>Title</th>
                        <th>Parent</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
                <nav class="mt-4" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
            
        </div>

       

    </div>
</div>
@endsection
@section('scripts')
    {{-- <script>
        $('input[name=status]').change(function(){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(mode);
            $.ajax({
                url: "{{ route('category.status') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id
                },
                success: function(data){
                    if(data.status){
                       toastr.success(data.msg)
                        // alert(data.msg);
                    }else{
                        toastr.error("Something went wrong!");
                    }
                }
            });
        });
    </script>
       <script>
        $('#deletebutton').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-post-form').submit();
                }
            })
        });
    </script> --}}

        @include('admin.includes.message')
    
    
@endsection