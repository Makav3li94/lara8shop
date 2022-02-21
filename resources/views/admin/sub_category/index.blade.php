@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Categories</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">All Categories</li>
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
                            <h3 class="box-title">All categories</h3>
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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        @forelse($category->subCategory as $key => $subcategory)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$subcategory->name}}</td>
                                                <td>{{$subcategory->name_fa}}</td>
                                                <td>{{$subcategory->category->name}}</td>
                                                <td><img src="{{asset($subcategory->image)}}" width="70" alt="{{$subcategory->name}}"></td>
                                                <td>
                                                    <a href="{{route('admin.subcategories.edit',$subcategory->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form id="delete_brand_{{$subcategory->id}}" action="{{route('admin.subcategories.destroy',$subcategory->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" onclick="deleteElement()" class="btn btn-sm btn-danger" value="Delete">

                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            No Data
                                        @endforelse
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
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
                            <form method="post" action="{{route('admin.subcategories.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" id="" required data-validation-required-message="This field is required">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
