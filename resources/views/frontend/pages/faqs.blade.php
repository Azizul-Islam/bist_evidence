@extends('layouts.app')
@section('title','FAQS')
@section('content')
<div class="px-3">  
    <div class="theme-container">  
        <div class="py-5">
            <div class="column center-xs middle-xs text-center">  
                <h1 class="uppercase">Frequently Asked Questions</h1>             
                <p class="text-muted fw-500">Click on a question to expand and reveal the answer.</p>
            </div>
            <div class="expansion-panel-wrapper"> 
                @foreach ($faqs as $item)
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">{{ $item->title }}</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">{{ $item->sub_title }}</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>{{ $item->description }}</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        {{-- <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p> --}}
                    </div>
                </div> 
                @endforeach
                
            </div>
        </div> 
       
    </div>  
</div> 
@endsection