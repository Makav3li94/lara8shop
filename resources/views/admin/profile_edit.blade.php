@extends('admin.admin_layout')

@section('content')
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Profile edit</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Profile</li>
                                <li class="breadcrumb-item active" aria-current="page">Profile edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Profile edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{$admin->name}}" class="form-control" required
                                                       data-validation-required-message="This field is required">
                                            </div>
                                            {{--                                            <div class="form-control-feedback">--}}
                                            {{--                                                <small>Add <code>required</code> attribute to field for required validation.</small>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{$admin->email}}" class="form-control" required
                                                       data-validation-required-message="This field is required"></div>
                                        </div>
                                        <div class="form-group">
                                            <img class="avatar avatar-xxl avatar-bordered" id="show_profile_photo"
                                                 src="{{(!empty($admin->profile_photo_path) ? url('upload/admin_images/'.$admin->profile_photo_path) : url('upload/admin_images/def_avatar.png'))}}"
                                                 alt="">
                                            <h5>Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" id="profile_photo_path" name="profile_photo_path" class="form-control" required></div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#profile_photo_path').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_profile_photo').attr('src', e.target.result)
                };
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endsection