@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Sliders</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">All Sliders</li>
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
                            <h3 class="box-title">All Sliders</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($sliders as $key => $slider)
                                        <tr>
                                            <td><img src="{{asset($slider->image)}}" width="70" alt="{{$slider->name ?? ""}}"></td>
                                            <td>{{$slider->name}}</td>
                                            <td>{{$slider->name_fa}}</td>
                                            <td>{{$slider->status == 1 ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <a href="{{route('admin.sliders.edit',$slider->id)}}"  class="btn btn-sm btn-warning">Edit</a>
                                                <form id="delete_brand_{{$slider->id}}" action="{{route('admin.sliders.destroy',$slider->id)}}" method="post">
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
                                        <th>Image</th>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
                                        <th>Status</th>
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
                            <form method="post" action="{{route('admin.sliders.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
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
                                            <h5> Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description" id="description" class="form-control" required placeholder="Textarea text"></textarea>
                                            </div>
                                            @if($errors->has('description'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('description')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <h5> Description Fa<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description_fa" id="description_fa" class="form-control" required placeholder="Textarea text"></textarea>
                                            </div>
                                            @if($errors->has('description_fa'))
                                                <div class="form-control-feedback">
                                                    <small>
                                                        {{$errors->first('description_fa')}}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <h5>Image <span class="text-danger">*</span></h5>
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
                                        <div class="form-group">
                                            <div class="controls">

                                                <fieldset>
                                                    <input type="checkbox" name="status" id="status" value="1">
                                                    <label for="status">Status</label>
                                                </fieldset>
                                            </div>
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

