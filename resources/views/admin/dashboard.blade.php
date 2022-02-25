@extends('layouts.admin-app')
@section('title','Admin Dashboard')
@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
   
   
    <div class="col-lg-5 col-md-12">
        <div class="card widget">
            <div class="card-header">
                <h5 class="card-title">Activity Overview</h5>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-house-door text-secondary"></i>
                            </div>
                            <h5 class="my-3">Properties</h5>
                            <div class="text-muted">{{ \App\Models\Property::count() }} New</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-receipt text-warning"></i>
                            </div>
                            <h5 class="my-3">Aminities</h5>
                            <div class="text-muted">{{ \App\Models\Amenity::count() }}</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-geo-alt text-info"></i>
                            </div>
                            <h5 class="my-3">Area</h5>
                            <div class="text-muted">{{ App\Models\Area::count() }}</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-layers text-success"></i>
                            </div>
                            <h5 class="my-3">Cateogry</h5>
                            <div class="text-muted">{{ App\Models\Category::count() }}</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-12">
        <div class="card widget">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Recent Properties</h5>
                <div class="dropdown ms-auto">
                    <a href="#" data-bs-toggle="dropdown" class="btn btn-sm btn-floating" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted">Properties added today. Click <a href="{{ route('admin.properties.create') }}">here</a> for add more property</p>
                <div class="table-responsive">
                    <table class="table table-custom mb-0" id="recent-products">
                        <thead>
                        <tr>
                            <th>
                                <input class="form-check-input select-all" type="checkbox"
                                       data-select-all-target="#recent-products" id="defaultCheck1">
                            </th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Property::latest()->limit(4)->get() as $property)
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox">
                            </td>
                            <td>
                                <a href="#">
                                    <img src="{{ asset('backend/properties/'.$property->images[0]->path) }}" class="rounded" width="40"
                                         alt="...">
                                </a>
                            </td>
                            <td>{{ Str::limit($property->title,20,'...') }}</td>
                            <td class="text-end">
                                <div class="d-flex">
                                    <div class="dropdown ms-auto">
                                        <a href="#" data-bs-toggle="dropdown"
                                           class="btn btn-floating"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection