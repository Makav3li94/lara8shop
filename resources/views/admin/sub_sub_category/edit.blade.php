@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Sub sub category edit</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Categories</li>
                                <li class="breadcrumb-item active" aria-current="page">Sub sub category edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Sub sub category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{route('admin.subsubcategories.update',$subsubCategory)}}" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" id="category_id" class="form-control" id="" required data-validation-required-message="This field is required">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"  {{$subsubCategory->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('category_id'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('category_id')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="sub_category_id" id="sub_category_id" class="form-control"  required
                                                        data-validation-required-message="This field is required">
                                                    <option value="">No Data</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="old_sub_category_id" id="old_sub_category_id" value="{{$subsubCategory->sub_category_id}}">
                                            @if($errors->has('sub_category_id'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('sub_category_id')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <h5>Name (En) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{$subsubCategory->name}}" class="form-control" required
                                                       data-validation-required-message="This field is required">
                                            </div>
                                            @if($errors->has('name'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('name')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <h5>Name (FA) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name_fa" value="{{$subsubCategory->name_fa}}" class="form-control" required
                                                       data-validation-required-message="This field is required">
                                            </div>
                                            @if($errors->has('name_fa'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('name_fa')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <h5>Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <img src="{{asset($subsubCategory->image)}}" width="100" alt="">
                                                <input type="file" name="image" value="" class="form-control">
                                            </div>
                                            @if($errors->has('image'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('image')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Update Brand">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection

@section('scripts')
    <script async>
        $(document).ready(function () {
            getSubCategory()
        })

        function getSubCategory() {
            var category_id = $('#category_id').val()
            var selected;
            if (category_id) {
                $.ajax({
                    url: "{{url('admin/subsubcategories/ajax')}}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (!$.trim(data)) {
                            $('#sub_category_id').empty()
                            $('#sub_category_id').append('<option value="">Notting found !</option>')
                        } else {
                            $('#sub_category_id').empty()
                            $.each(data, function (key, val) {
                                if ($('#old_sub_category_id').val() == key) {
                                    selected = 'selected'
                                    console.log(123)
                                }
                                $('#sub_category_id').append('<option value="' + key + '" ' + selected + '>' + val + '</option>')
                            })
                        }

                    }
                })
            } else {
                $('#sub_category_id').empty()
                console.log('An Error Happened')
            }
        }
    </script>
@endsection