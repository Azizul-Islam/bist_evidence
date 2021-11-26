@extends('layouts.app')
@section('title', 'Add Property')
@section('styles')
    <style>
        .text-danger{
            color: var(--mdc-theme-secondary) !important;
        }
        .custom_select {
            border:1px solid rgb(206, 199, 199);
            border-radius: 5px;
            color: rgb(145, 137, 137);
        }
    </style>
@endsection
@section('content')
    <div class="px-3">
        <div class="theme-container">
            <div class="row center-xs middle-xs my-5">
                <div class="mdc-card p-3 p-relative mw-500px">
                    <div class="column center-xs middle-xs text-center">
                        <h1 class="uppercase">Add Your Property</h1>
                        <a href="{{ route('agent.login') }}"
                            class="mdc-button mdc-ripple-surface mdc-ripple-surface--accent accent-color normal w-100">
                            If you are a agent ?Please Sign in!
                        </a>
                    </div>
                    <form action="javascript:void(0);" method="POST" id="add_property">
                        @csrf
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <i class="material-icons mdc-text-field__icon text-muted">person</i>
                            <input class="mdc-text-field__input" type="text" name="name" id="name">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Name</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <span class="text-danger error-text name_error"></span>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <i class="material-icons mdc-text-field__icon text-muted">email</i>
                            <input class="mdc-text-field__input" type="email" name="email" id="email">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Email</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <span class="text-danger error-text email_error"></span>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <i class="material-icons mdc-text-field__icon text-muted">phone</i>
                            <input class="mdc-text-field__input" type="text" name="phone" id="phone">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Phone</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <span class="text-danger error-text phone_error"></span>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <select name="consumer" class="mdc-select__anchor w-100 custom_select" id="">
                                <option value="" class="mdc-list-item">Select User Role</option>
                                <option value="owner" class="mdc-list-item">Owner</option>
                                <option value="manager" class="mdc-list-item">Manager</option>
                                <option value="guard" class="mdc-list-item">Guard</option>
                                <option value="representative" class="mdc-list-item">Representative</option>
                            </select>
                        </div>
                        <span class="text-danger error-text consumer_error"></span>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <select name="purpose" class="mdc-select__anchor w-100 custom_select" id="">
                                <option value="" class="mdc-list-item">Select Purpose</option>
                                <option value="sell" class="mdc-list-item">Sell</option>
                                <option value="rent" class="mdc-list-item">Rent</option>
                            </select>
                        </div>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <select name="category_id" class="mdc-select__anchor w-100 custom_select" id="category_id">
                                <option value="" class="mdc-list-item">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" class="mdc-list-item">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger error-text category_id_error"></span>
                        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field d-none"
                            id="sub_category_div">
                            <select name="sub_category_id" class="mdc-select__anchor w-100" id="sub_category_id">

                            </select>
                        </div>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                            <select name="area_id" class="mdc-select__anchor w-100 custom_select" id="area_id">
                                <option value="" class="mdc-list-item">Select location</option>
                                @foreach ($areas as $item)
                                    <option value="{{ $item->id }}" class="mdc-list-item">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger error-text area_id_error"></span>
                        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field d-none"
                            id="sub_area_div">
                            <select name="sub_area_id" class="mdc-select__anchor w-100" id="sub_area_id">

                            </select>
                        </div>
                        <div class="text-center mt-4">
                            <button class="mdc-button mdc-button--raised bg-accent" type="submit">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Submit</span>
                            </button>
                        </div>
                    </form>
                    <div class="row my-4 px-3 p-relative">
                        <div class="divider w-100"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#category_id').change(function() {
            var category_id = $(this).val();
            if (category_id != null) {
                $.ajax({
                    url: "/category/" + category_id + "/sub",
                    method: 'GET',
                    data: {
                        _token: "{{ csrf_token() }}",
                        category_id: category_id
                    },
                    success: function(response) {
                        var html_option =
                        "<option class='mdc-list-item' value=''>Sub Category</option>";
                        if (response.status) {
                            $("#sub_category_div").removeClass('d-none');
                            $.each(response.data, function(id, name) {
                                html_option += "<option class='mdc-list-item' value='" + id +
                                    "'>" + name +
                                    "</option>";
                            });
                        } else {
                            $("#sub_category_div").addClass('d-none');
                        }
                        $("#sub_category_id").html(html_option);
                    }
                });
            }
        });
        $('#area_id').change(function() {
            var area_id = $(this).val();
            if (area_id != null) {
                $.ajax({
                    url: "/area/" + area_id + "/sub",
                    method: 'GET',
                    data: {
                        _token: "{{ csrf_token() }}",
                        area_id: area_id
                    },
                    success: function(response) {
                        var html_option = "<option class='mdc-list-item' value=''>Sub Area</option>";
                        if (response.status) {
                            $("#sub_area_div").removeClass('d-none');
                            $.each(response.data, function(id, name) {
                                html_option += "<option class='mdc-list-item' value='" + id +
                                    "'>" + name +
                                    "</option>";
                            });
                        } else {
                            $("#sub_area_div").addClass('d-none');
                        }
                        $("#sub_area_id").html(html_option);
                    }
                });
            }
        });

        $('#add_property').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('add-property') }}",
                method: 'POST',
                dataType: 'JSON',
                data: $('#add_property').serialize(),
                beforeSend: function() {
                    $(document).find('span.error-text').text();
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.errors, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#add_property')[0].reset();
                        toastr.success(data.msg);
                    }
                },
            });
        });
    </script>
@endsection
