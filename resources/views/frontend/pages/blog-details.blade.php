@extends('layouts.app')
@section('title','Blog Details')
@section('content')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{ asset('frontend/assets/images/others/contact.jpg') }}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-bottom">
        <h1 class="title">Blog Details</h1>
    </div>
</div> 
<div class="px-3">  
    <div class="theme-container">  
        <div class="page-drawer-container single-property mt-3"> 
            <div class="page-sidenav-content">
                <div class="mdc-card p-5 mt-5"> 
                    <h2 class="uppercase text-center fw-500 mb-2">Blog Details</h2>                
                    <div class="row pb-3 p-relative">
                        <div class="divider"></div>
                    </div>  
                    <div class="reviews mt-3">
                        <div class="review-item">
                            <div class="review-content">
                                <p class="d-flex mb-0">
                                    <span class="author-name">{{ $blog->title }}</span> 
                                </p>
                                <p class="text-muted fw-500 mb-2"><small>{{ date('d M, Y',strtotime($blog->created_at)) }}</small></p>
                                <p class="text">{!! $blog->description !!}</p>
                               
                            </div>
                        </div>
                        <div class="row pb-3 p-relative">
                            <div class="divider"></div>
                        </div>
                       
                        
                    </div>  
                    
                   
                </div> 
            </div>  
           
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
        </div> 
    </div>  
</div> 
@endsection