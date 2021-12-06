@extends('layouts.app')
@section('title','My Properties')
@section('styles')
<style>
        
    button[type=button]:disabled {cursor: no-drop !important;}
    .form__input-container.error_input{border-color: #ff0000;}
    .error-text{color: #ff0000;}
    .sidebar__spoiler-item.active{background-color: #4c73ff;}
    .pagination .page-item {display: inline-block;}
    .pagination .page-item a{display: inline-block;padding: 5px 12px;border: 1px solid #ccc; font-size: 18px;}
    .pagination{text-align: center; padding: 20px;}
    .pagination .page-item.active{background-color: #ccc;padding: 5px 12px;border: 1px solid #ccc; font-size: 18px;}
    .page-item.disabled{cursor: no-drop;padding: 5px 12px;border: 1px solid #ccc; font-size: 18px;}

    </style>
@endsection
@section('content')
<div class="px-3">  
    <div class="theme-container">   
        <div class="page-drawer-container mt-3">
            @include('agent.profile.sidebar')
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            <div class="page-sidenav-content" id="property_data"> 
                @include('agent.partials._property_data')
            </div> 
        </div>  
    </div>  
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });


        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href');
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: page,
                success: function(data) {
                    $('#property_data').html(data);
                    history.pushState({}, null, page);
                }
            });
        }
        

});
</script>
<script>
    //remove properties
    $(document).on('click','.delProperty',function(e){
        e.preventDefault();
        var c = confirm("Are you sure you want to permanently remove this record ?");
        if(! c){
            return false;
        }
        let url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'post',
            dataType: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                if(data.status == 1) {
                    $('body #property_data').html(data.html);
                    toastr.info(data.msg);
                }
                else {
                    toastr.error('Something went wrong!');
                }
            }
        });
    });
</script>
@endsection