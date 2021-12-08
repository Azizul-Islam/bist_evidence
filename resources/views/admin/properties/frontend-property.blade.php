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
            {{-- <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Properties</h4></div>
                    
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="properties" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Area</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($frontendProperties as $i=>$item)
                
                <tr>
                    
                    <td>
                        #{{ $i + 1 }}
                    </td>
                    
                    <td>{{ $item->name ?? '' }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->category->name ?? '' }}</td>
                    <td>{{ $item->area->name ?? '' }}  {{ $item->sub_area->name ?? '' }}</td>
                    <td><span class="badge {{ $item->purpose == 'sell' ? 'bg-primary' : 'bg-info' }}">{{ ucfirst($item->purpose) }}</span></td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                   
                    <td class="text-end">
                        @if($item->status == 'pending')
                        <div class="btn-group">
                        <form action="{{ route('admin.frontend-property.status',$item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approve" id="">
                                <button class="delBtn btn btn-sm btn-outline-success rounded" title="Approve"><i class="bi bi-check2"></i></button>
                        </form>
                        <form action="{{ route('admin.frontend-property.status',$item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="cancel" id="">
                                <button class="delBtn btn btn-sm btn-outline-danger rounded" title="Cancel"><i class="bi bi-x"></i></button>
                        </form>
                        </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="8">Data not available in this table!</td>
                </tr>
                @endforelse
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

@endsection
@section('scripts')
    <script>
       
        $('input[name=status]').change(function(){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
                url: "{{ route('admin.property.status') }}",
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