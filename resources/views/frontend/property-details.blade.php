<!doctype html>
<html lang="en">

<!-- Mirrored from vetra.laborasyon.com/demos/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 03:57:10 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Realstate | @yield('title')  </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}"/>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('backend/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css') }}" type="text/css">
    <!-- Bootstrap Docs -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/bootstrap-docs.css') }}" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('backend/libs/slick/slick.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('backend/libs/dataTable/datatables.min.css') }}" type="text/css">
    <!-- Main style file -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/libs/animate/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/libs/select2/css/select2.min.css') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    

    @yield('styles')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



<!-- layout-wrapper -->
<div class="layout-wrapper">
    
   
    <!-- content -->
    <div class="content ">
    
        <div class="row">
            <div class="col-md-12">
    
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="slick-wrapper">
                                    
                                    <div class="slick-nav-wrapper">
                                        <div class="slider-nav">
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ asset('backend/assets/properties/'.$property->photo) }}" class="w-100 rounded"
                                                     alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="d-flex justify-content-between align-items-start mt-4 mt-md-0">
                                    <div>
                                        <div class="small text-muted mb-2">Property Details</div>
                                        <h2>{{ $property->title }}</h2>
                                        <p>
                                            @if($property->purpose == 'sell')
                                            <span class="badge bg-success">{{ ucfirst($property->purpose) }}</span>
                                            @else
                                            <span class="badge bg-primary">{{ ucfirst($property->purpose) }}</span>
                                            @endif
                                        </p>
                                        <p><strong>Address: </strong>{{ $property->address }}</p>
                                        <div class="d-flex gap-3 mb-3 align-items-center">
                                            {{-- <h4 class="text-muted mb-0">
                                                <del>$699,99</del>
                                            </h4> --}}
                                            <h4 class="mb-0">{{ number_format($property->price,2) }}</h4>
                                        </div>
                                       
                                        <p>Features:</p>
                                        <p><strong><i class="bi bi-bounding-box-circles"></i> Size: </strong> {{ $property->size }}</p>
                                        <p><strong><i class="bi bi-bank"></i> Type: </strong> {{ $property->category->name }} @if(!blank($property->sub_category_id)) , {{ $property->sub_category->name }} @endif</p>
                                        <p><strong><i class="bi bi-geo-alt"> </i>Location: </strong> {{ $property->area->name }} @if(!blank($property->sub_area_id)) , {{ $property->sub_area->name }} @endif</p>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                                   aria-controls="description" aria-selected="true">Descriptions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#floor-plan" role="tab"
                                   aria-controls="floor-plan" aria-selected="false">Floor Plan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sss-tab" data-bs-toggle="tab" href="#loaction" role="tab"
                                   aria-controls="loaction" aria-selected="false">Location & Nearby</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                 aria-labelledby="description-tab">
                                <p class="font-weight-bold">{!! $property->description !!}</p>

                            </div>
                            <div class="tab-pane fade" id="floor-plan" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-5">
                                            <p>Floor Plans gose to here.</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="loaction" role="tabpanel" aria-labelledby="sss-tab">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-5">
                                            <p>Location and nearby gose to here.</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>

    </div>
    <!-- ./ content -->

    

</div>
<!-- ./ layout-wrapper -->

<!-- Bundle scripts -->
<script src="{{ asset('backend/libs/bundle.js') }}"></script>

<!-- Apex chart -->
<script src="{{ asset('backend/libs/charts/apex/apexcharts.min.js') }}"></script>

<!-- Slick -->
<script src="{{ asset('backend/libs/slick/slick.min.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('backend/dist/js/examples/dashboard.js') }}"></script>

<!-- Main Javascript file -->
<script src="{{ asset('backend/dist/js/app.min.js') }}"></script>
<script src="{{ asset('backend/libs/dataTable/datatables.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/libs/ckeditor5/ckeditor.js') }}"></script>
<script src="{{ asset('backend/dist/js/examples/ckeditor.js') }}"></script>
<script src="{{ asset('backend/libs/select2/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $('#datatable-example').DataTable({
        responsive: true
    });
</script>
@yield('scripts')
</body>

<!-- Mirrored from vetra.laborasyon.com/demos/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 03:57:43 GMT -->
</html>
