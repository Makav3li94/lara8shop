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
                        <h4 class="">Sign up</h4>
                        <p class="">Create a new account</p>

                        <form method="POST" action="{{ route('register')}}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control unicase-form-control text-input" id="name">
                                @if($errors->has('name'))
                                    <small class="text-danger">{{$errors->first('name')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control unicase-form-control text-input" id="email">
                                @if($errors->has('email'))
                                    <small class="text-danger">{{$errors->first('email')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone <span>*</span></label>
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control unicase-form-control text-input" id="phone">
                                @if($errors->has('phone'))
                                    <small class="text-danger">{{$errors->first('phone')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="password">
                                @if($errors->has('password'))
                                    <small class="text-danger">{{$errors->first('password')}}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation">
                                @if($errors->has('password_confirmation'))
                                    <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                                @endif
                            </div>
                            <div class="radio outer-xs">


                                    <a href="{{ route('login') }}" class="forgot-password pull-right">Already registerd ? Login</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


