@extends('layouts.app')
@section('title','Blog')
@section('content')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{ asset('frontend/assets/images/others/contact.jpg') }}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-bottom">
        <h1 class="title">Blog</h1>
        {{-- <p class="desc">Got a question? We'll give you straight answer</p>  --}}
    </div>
</div> 
<div class="px-3">  
    <div class="theme-container">  
        <div class="page-drawer-container single-property mt-3"> 
            <div class="page-sidenav-content">
                <div class="mdc-card p-5 mt-5"> 
                    <h2 class="uppercase text-center fw-500 mb-2">Our Blog</h2>                
                    <div class="row pb-3 p-relative">
                        <div class="divider"></div>
                    </div>  
                    <div class="reviews mt-3">
                        @forelse ($blogs as $item)
                        <div class="review-item">
                            {{-- <img src="assets/images/avatars/avatar-1.png" alt="avatar-1" class="author-img"> --}}
                            <div class="review-content">
                                <p class="d-flex mb-0">
                                    <h2 class="author-name"><a href="{{ route('blog',$item->slug) }}">{{ $item->title }}</a></h2> 
                                </p>
                                <p class="text-muted fw-500 mb-2"><small>{{ date('d M, Y',strtotime($item->created_at)) }}</small></p>
                                <p class="text">{!! Str::limit("$item->description",250,'...') !!}</p>
                                <a href="{{ route('blog',$item->slug) }}" style="float: right" class="mdc-button mdc-button--outlined mdc-ripple-upgraded mb-2" style="--mdc-ripple-fg-size:55px; --mdc-ripple-fg-scale:1.98122; --mdc-ripple-fg-translate-start:40.6875px, -8.40625px; --mdc-ripple-fg-translate-end:18.5938px, -9.5px;">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Details</span> 
                                </a>
                            </div>
                        </div>
                        <div class="row pb-3 p-relative">
                            <div class="divider"></div>
                        </div>
                        @empty
                        <div class="review-item">
                            <div class="review-content">
                                <p class="d-flex mb-0">
                                    <span class="author-name">Blog Is Empty!</span> 
                                </p>
                               
                            </div>
                        </div>
                        @endforelse
                        
                    </div>  
                    
                   
                </div> 
            </div>  
           
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
        </div> 
    </div>  
</div> 
@endsection