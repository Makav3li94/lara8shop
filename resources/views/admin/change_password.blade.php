@extends('admin.admin_layout')

@section('content')
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Change password</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Profile</li>
                                <li class="breadcrumb-item active" aria-current="page">Change password</li>
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
                    <h4 class="box-title">Change password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('admin.update.password')}}" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Current password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="current_password" value="" class="form-control" required
                                                       data-validation-required-message="This field is required">
                                            </div>
                                            {{--                                            <div class="form-control-feedback">--}}
                                            {{--                                                <small>Add <code>required</code> attribute to field for required validation.</small>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                        <div class="form-group">
                                            <h5>New password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" value="" class="form-control" required
                                                       data-validation-required-message="This field is required">
                                            </div>
                                            {{--                                            <div class="form-control-feedback">--}}
                                            {{--                                                <small>Add <code>required</code> attribute to field for required validation.</small>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                        <div class="form-group">
                                            <h5>Confirm New password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password_confirmation" value="" class="form-control" required
                                                       data-validation-required-message="This field is required">
                                            </div>
                                            {{--                                            <div class="form-control-feedback">--}}
                                            {{--                                                <small>Add <code>required</code> attribute to field for required validation.</small>--}}
                                            {{--                                            </div>--}}
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