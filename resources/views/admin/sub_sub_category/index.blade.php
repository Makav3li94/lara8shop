@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Sub SubCategories</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">All Sub SubCategories</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Sub SubCategories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
                                        <th>category</th>
                                        <th>Sub category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($subsubcategories as $key=> $subsubcategory)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$subsubcategory->name}}</td>
                                            <td>{{$subsubcategory->name_fa}}</td>
                                            <td>{{$subsubcategory->category->name}}</td>
                                            <td>{{$subsubcategory->subCategory->name}}</td>
                                            <td><img src="{{asset($subsubcategory->image)}}" width="70" alt="{{$subsubcategory->name}}"></td>

                                            <td width="30%">
                                                <a href="{{route('admin.subsubcategories.edit',$subsubcategory->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <form class="d-inline-block" id="delete_brand_{{$subsubcategory->id}}"
                                                      action="{{route('admin.subsubcategories.destroy',$subsubcategory->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" onclick="deleteElement()" class="btn btn-sm btn-danger" value="Delete">

                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        No Data
                                    @endforelse

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
                                        <th>category</th>
                                        <th>Sub category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{route('admin.subsubcategories.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" id="category_id" onchange="getSubCategory()" class="form-control" id="" required
                                                        data-validation-required-message="This field is required">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="sub_category_id" id="sub_category_id" class="form-control" id="" required
                                                        data-validation-required-message="This field is required">
                                                    <option value="">No Data</option>
                                                </select>
                                            </div>
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
                                                <input type="text" name="name" value="" class="form-control" required data-validation-required-message="This field is required">
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
                                                <input type="text" name="name_fa" value="" class="form-control" required data-validation-required-message="This field is required">
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
                                            <h5>Inage <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" value="" class="form-control" required data-validation-required-message="This field is required">
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
                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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
                                $('#sub_category_id').append('<option value="' + key + '">' + val + '</option>')
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