@extends('layouts.admin-app')
@section('content')
<div class="profile-cover bg-image mb-4" data-image="{{ asset('backend/assets/images/profile-bg.jpg') }}">
    <div
        class="container d-flex align-items-center justify-content-center h-100 flex-column flex-md-row text-center text-md-start">
        <div class="avatar avatar-xl me-3">
            <img src="{{ asset('backend/assets/images/default.png') }}" class="rounded-circle"
                 alt="...">
        </div>
        <div class="my-4 my-md-0">
            <h3 class="mb-1">{{ $customerResponse->property->title ?? '' }}</h3>
            <small>{{ ucfirst($customerResponse->status) }}</small>
        </div>
        <div class="ms-md-auto">
            <a href="{{ route('admin.customer-response.index') }}" class="btn btn-primary btn-lg btn-icon">
                <i class="bi bi-arrow-left-circle"></i> Back To List
            </a>
        </div>
    </div>
</div>

<div class="row g-4">
<div class="col-lg-7 col-md-12">
<div class="card mb-4">
    <div class="card-body">
        <h6 class="card-title mb-4">Response Details</h6>
        <form class="d-flex">
           
            <div class="flex-grow-1">
               
                <div class="item-inner" style="float: left;margin-right:15px">
                    <p class="btn btn-icon" data-bs-toggle="tooltip" title="Location">
                        <i class="bi bi-geo-alt me-0"></i>
                    </p>
                    <p><strong>{{ $customerResponse->property->area->name ?? '' }}  @if(!blank($customerResponse->property->sub_area_id)) →&nbsp {{ $customerResponse->property->sub_area->name ?? '' }} @endif</strong></p>
                </div>
                <div class="item-inner" style="float: left;margin-right:15px">
                    <p class="btn btn-icon" data-bs-toggle="tooltip" title="Location">
                        <i class="bi bi-telephone me-0"></i>
                    </p>
                    <p><strong>{{ $customerResponse->phone }}</strong></p>
                </div>
                @if(!blank($customerResponse->email))
                <div class="item-inner" style="float: left">
                    <p class="btn btn-icon" data-bs-toggle="tooltip" title="Location">
                        <i class="bi bi-envelope me-0"></i>
                    </p>
                    <p><strong>{{ $customerResponse->email }}</strong></p>
                </div>
                @endif
                
            </div>
        </form>
    </div>
</div>

    </div>
    {{-- <div class="col-lg-5 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row row-vertical-border text-center">
                    <div class="col-4 text-warning">
                        <h4>{{ $req_count }}</h4>
                        <span>Projects Request</span>
                    </div>
                    <div class="col-4 text-info">
                        <h4>{{ ucfirst($frontendProperty->status) }}</h4>
                        <span>Status</span>
                    </div>
                    <div class="col-4 text-success">
                        <h4>{{ ucfirst($frontendProperty->purpose) }}</h4>
                        <span>Purpose</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection