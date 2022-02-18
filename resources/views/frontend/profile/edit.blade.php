@extends('frontend.front_layout')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 text-center">
                    <img src="{{
                     (!empty($user->profile_photo_path)) ?
                     url('upload/user_images/'.$user->profile_photo_path) :
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
                            <span class="text-danger">Hi {{$user->name}}</span>
                            <strong>Welcome to your shop</strong>
                        </h3>
                        <div class="card-body">
                            <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span>*</span></label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control unicase-form-control text-input" id="name">
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email">Email <span>*</span></label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control unicase-form-control text-input" id="email">
                                    @if($errors->has('email'))
                                        <small class="text-danger">{{$errors->first('email')}}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone <span>*</span></label>
                                    <input type="text" name="phone" value="{{$user->phone ?? ''}}" class="form-control unicase-form-control text-input" id="phone">
                                    @if($errors->has('phone'))
                                        <small class="text-danger">{{$errors->first('phone')}}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="profile_photo_path">Profile image <span>*</span></label>
                                    <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input" id="profile_photo_path">
                                    @if($errors->has('profile_photo_path'))
                                        <small class="text-danger">{{$errors->first('profile_photo_path')}}</small>
                                    @endif
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--            End row--}}
        </div>
    </div>
@endsection