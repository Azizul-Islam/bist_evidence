@extends('layouts.admin-app')
@section('title','Blog')
@section('content')

<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">
                    <i class="bi bi-globe2 small me-2"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 bd-content">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex"><h4>Total Blog : {{ count($blogs) }}</h4></div>
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Create</a>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                   <tbody>
                       @forelse ($blogs as $i=>$item)
                       <tr>
                        <td>{{ $i + 1 }}</td>
                       <td>{{ Str::limit($item->title,30,'...') }}</td>
                       <td>{!! Str::limit("$item->description",30,'...') !!}</td>
                       <td>{{ date('d M ,Y',strtotime($item->created_at)) }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.blogs.edit',$item) }}" class="btn btn-sm btn-info rounded"><i class="bi bi-pencil small"></i></a>
                                <form  action="{{ route('admin.blogs.destroy',$item) }}" onclick="return confirm('Are you sure?')" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button  type="submit" data-id="{{ $item->id }}" class="delBtn btn btn-sm btn-primary rounded"><i class="bi bi-trash"></i></button>
                                
                                </form>
                              </div>
                        </td>
                       
                    </tr>
                       @empty
                           <tr>
                               <td class="text-center text-danger" colspan="5">Data not available in this table!</td>
                           </tr>
                       @endforelse
                   </tbody>
                    <tfoot>
                    <tr>
                        <th>S.L</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created Date</th>
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
