@extends('layouts.app')
@section('title','Dynamic Page')
@section('content')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{ isset($page->photo) ? asset('backend/pages/'.$page->photo) : asset('frontend/assets/images/others/about.jpg') }}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-bottom">
        <h1 class="title">{{ $page->title }}</h1>
    </div>
</div>  
<div class="px-3">  
    <div class="theme-container">  
        <div class="my-5">
            <div class="mdc-card p-5 my-3">
                {!! $page->description !!}
            </div> 
        </div> 
    </div>  
</div> 
@endsection