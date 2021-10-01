@extends('layouts.admin-app')
@section('title', 'Property create')
@section('content')
    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Property</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex"><h4>Create Property</h4></div>
                        
                        <div class="dropdown ms-auto">
                            <a href="{{ route('properties.index') }}" class="btn btn-primary btn-icon"><i class="bi bi-arrow-left-circle"></i> Back To List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <small class="text-primary">*</small></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title"
                            placeholder="Enter Title">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Photo" class="form-label">Photo <small class="text-danger">*</small></label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" >
                        @error('photo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price <small class="text-primary">*</small></label>
                                <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price"
                                    placeholder="Enter price">
                                @error('price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" id="address"
                                    placeholder="Enter address">
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="size" class="form-label">Size<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('size') is-invalid @enderror" value="{{ old('size') }}" name="size" id="size"
                                    placeholder="Enter size">
                                @error('size')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Status" class="form-label">Purpose <small class="text-danger">*</small></label>
                                <select name="purpose" class="select2-example form-control">
                                    <option value="">Select one</option>
                                    <option value="sell" {{ old('sell') ? 'selectd' : '' }}>Sell</option>
                                    <option value="rent" {{ old('rent') ? 'selectd' : '' }}>Rent</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrioption <small class="text-danger">(optional)</small></label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="editor" placeholder="Enter description" cols="30" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                        <div class="mb-3">
                            <label for="cat_id" class="form-label">Category <small class="text-danger">*</small></label>
                            <select name="category_id" id="category_id" class="select2-example form-control @error('category_id') is-invalid @enderror">
                                <option value="">Select One</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ old('category_id') ? 'selectd' : '' }}>{!! $item->name !!}</option>
                                @endforeach
                              </select>
                              @error('category_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    {{-- <div class="mb-3 d-none" id="child_cat_div">
                        <label for="child_cat_id" class="form-label">Child Category <small class="text-danger">(optional)</small></label>
                        <select name="child_cat_id" class="select2-example form-control" id="child_cat_id">
                           
                          </select>
                    </div> --}}
                    <div class="row">
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="area_id" class="form-label">Area<small class="text-danger">*</small></label>
                                <select name="area_id" id="area_id" class="form-control @error('area_id') is-invalid @enderror">
                                    <option value="">Select One</option>
                                    @foreach ($areas as $item)
                                    <option value="{{ $item->id }}" {{ old('area_id') ? 'selectd' : '' }}>{{ ucfirst($item->name) }}</option>
                                    @endforeach
                                  </select>
                                  @error('area_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-none" id="sub_area_div">
                                <label for="sub_area_id" class="form-label">Sub Area <small class="text-danger">(optional)</small></label>
                                <select name="sub_area_id" class="select2-example form-control" id="sub_area_id">
                                   
                                  </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="consumer" class="form-label">Consumer<small class="text-danger">(optional)</small></label>
                                <select name="consumer" class="select2-example form-control">
                                    <option value="admin" {{ old('new') ? 'selectd' : '' }}>Admin</option>
                                    <option value="owner" {{ old('owner') ? 'selectd' : '' }}>Owner</option>
                                    <option value="manager" {{ old('manager') ? 'selectd' : '' }}>Manager</option>
                                    <option value="guard" {{ old('guard') ? 'selectd' : '' }}>Guard</option>
                                    <option value="representative" {{ old('representative') ? 'selectd' : '' }}>Representative</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status <small class="text-danger">(optional)</small></label>
                                <select name="status" class="select2-example form-control">
                                    {{-- <option value="">Select one</option> --}}
                                    <option value="active" {{ old('active') ? 'selectd' : '' }}>Active</option>
                                    <option value="inactive" {{ old('inactive') ? 'selectd' : '' }}>Inactive</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    {{-- <h2>Extra</h2>
                    <div class="heading mb-3">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-sm" id="size">Attribute</a>
                        </div>
                    </div>
                    <hr>
                    <div class="add_more">

                    <div id="size_div" class="row size d-none">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="attribute" class="form-label">Attribute<small class="text-danger">*</small></label>
                                <input type="text" name="attribute[]" class="form-control" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-2" style="margin-top: 32px">
                            <div class="mb-3">
                                <div class="btn-group">
                                    <a id="add_btn" class="btn btn-sm btn-info rounded mr-2"><i class="bi bi-plus-circle small"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> --}}

                    <div class="mb-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>

            {{-- <div class="extra_item_add" id="extra_item_add" style="visibility: hidden">
                <div class="extra_item_remove" id="extra_item_remove">
                <div class="row size">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="attribute" class="form-label">Attribute<small class="text-danger">*</small></label>
                            <input type="text" name="attribute[]" class="form-control" id="">
                        </div>
                    </div>
                    
                    <div class="col-md-2" style="margin-top: 32px">
                        <div class="mb-3">
                            <div class="btn-group">
                                <a id="add_btn" class="btn btn-sm btn-info rounded mr-2"><i class="bi bi-plus-circle small"></i></a>
                                <a id="del_btn" class="btn btn-sm btn-primary rounded"><i class="bi bi-dash-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
          </div>    
        </div>
    </div>
@endsection
@section('scripts')
@include('admin.includes.message')
    <script>
       $('#area_id').change(function(){
        var area_id = $(this).val();
        if(area_id != null){
            $.ajax({
                url: "/admin/area/"+area_id+"/sub",
                method: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",
                    area_id: area_id
                },
                success: function(response){
                    var html_option = "<option value=''>--Sub Area--</option>";
                    if(response.status){
                        $("#sub_area_div").removeClass('d-none');
                        $.each(response.data,function(id,name){
                            html_option +="<option value='"+id+"'>"+name+"</option>";
                        });
                    }else{
                        $("#sub_area_div").addClass('d-none');   
                    }
                    $("#sub_area_id").html(html_option);
                }
            });
        }
    });
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click','#size',function(){
                $('#size_div').toggleClass('d-none');
            });
            var counter = 0;
            $(document).on('click','#add_btn',function(e){
                e.preventDefault();
                var total_div = $('#extra_item_add').html();
                $(this).closest('.add_more').append(total_div);
                counter++;
            });
            $(document).on('click','#del_btn',function(){
                $(this).closest('#extra_item_remove').remove();
                counter -=1;
            });
        });
    </script>
@endsection
