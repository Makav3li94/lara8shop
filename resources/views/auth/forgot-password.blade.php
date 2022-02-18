@extends('frontend.front_layout')

@section('content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 sign-in">
                        <h4 class="">Forget password</h4>
                        <p class="">Enter your email to reset your password</p>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                @if($errors->has('email'))
                                    <small class="text-danger">{{$errors->first('email')}}</small>
                                @endif
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

