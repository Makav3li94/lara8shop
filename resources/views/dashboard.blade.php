@extends('frontend.front_layout')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 text-center">
                    <img src="{{
                     (!empty(auth()->user()->profile_photo_path)) ?
                     url('upload/user_images/'.auth()->user()->profile_photo_path) :
                      url('upload/admin_images/def_avatar.png') }}" class="card-img-top mb-2" style="border-radius: 50%" width="100" alt="">
                    <br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.edit')}}" class="btn btn-primary btn-sm btn-block">Profile update</a>
                        <a href="{{route('user.edit.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-3">

                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hi {{auth()->user()->name}}</span>
                            <strong>Welcome to your shop</strong>
                        </h3>
                    </div>
                </div>
            </div>
            {{--            End row--}}
        </div>
    </div>
@endsection