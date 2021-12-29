@extends('layouts.admin-app')
@section('title','Projects list')
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
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Projects</h4></div>
                    
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
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
                    <th>Price Range</th>
                    <th>Address</th>
                    <th>Project Status</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $i=>$item)
                
                <tr>
                    
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    <td>
                        <a href="#">
                            <img src="{{ asset('backend/projects/'.$item->photo) }}" class="rounded" width="80" height="80"
                                 alt="Project">
                        </a>
                    </td>
                    <td>{{ Str::limit($item->title, 20, '...') }}</td>
                    <td>{{ number_format($item->price_start) }} To {{ number_format($item->price_end) }}</td>
                    <td>{{ Str::limit($item->address, 15, '...') }}</td>
                    <td>
                        <span class="badge @if($item->project_status == 'new') bg-primary @elseif ($item->project_status == 'upcoming') bg-info @else bg-success @endif }}">{{ ucfirst($item->project_status) }}</span>
                    </td>
                    <td>
                        <input type="checkbox" name="status"  data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}" data-size="sm" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                    </td>
                   
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.projects.edit',$item) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                            <form action="{{ route('admin.projects.destroy',$item) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                                <button class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="9">Data not available in this table!</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $projects->links('pagination::bootstrap-4') }}
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
                url: "{{ route('admin.project.status') }}",
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
    
   
    
    
@endsection