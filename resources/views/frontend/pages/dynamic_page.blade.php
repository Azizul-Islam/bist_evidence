@extends('layouts.app')
@section('title','Terms')
@section('content')
<div class="px-3">  
    <div class="theme-container">  
        <div class="my-5">
            <div class="column center-xs middle-xs text-center">  
              <h1 class="uppercase">{{ $page->title ?? '' }}</h1>             
              {{-- <p class="text-muted fw-500">In using this website you are deemed to have read and agreed to the following terms and conditions:</p> --}}
            </div> 
            <div class="mdc-card p-5 my-3">
                {!! $page->description !!}
            </div> 
        </div> 
    </div>  
</div> 
@endsection