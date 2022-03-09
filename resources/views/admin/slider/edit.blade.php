@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Slider</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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
                            <h3 class="box-title">Edit Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{route('admin.sliders.update',$slider->id)}}" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Name (En) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{$slider->name}}" class="form-control" required
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
                                                <input type="text" name="name_fa" value="{{$slider->name_fa}}" class="form-control" required
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
                                                <img src="{{asset($slider->image)}}" width="100" alt="">
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
                                        <div class="form-group">
                                            <h5> Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description" id="description" class="form-control" required
                                                          placeholder="Textarea text">{!! $slider->description !!}</textarea>
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
                                                <textarea name="description_fa" id="description_fa" class="form-control" required
                                                          placeholder="Textarea text">{!! $slider->description_fa !!}</textarea>
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
                                            <div class="controls">

                                                <fieldset>
                                                    <input type="checkbox" name="status" id="status" {{$slider->status == 1 ? 'checked' :''}} value="1">
                                                    <label for="status">Status</label>
                                                </fieldset>
                                            </div>
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

