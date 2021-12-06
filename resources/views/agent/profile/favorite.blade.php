@extends('layouts.app')
@section('title','Favorite')
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
            <div class="page-sidenav-content" id="favorite_data"> 
                @include('agent.partials._favorite_data')
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
                    $('#favorite_data').html(data);
                    history.pushState({}, null, page);
                }
            });
        }
        

});
</script>

//remove favorite
<script>
    $(document).on('click','.delFavorite',function(e){
        e.preventDefault();
        // return confirm('Are you sure?');
        let id = $(this).data('id');
        let url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                if(data.status == 1) {
                    $('body #favorite_data').html(data.html);
                    $('body #user_menu_count').html(data.html1);
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