@extends('layouts.login')

@section('content')

    <section class="flexbox-container">
    <div class="container-login100" style="background-image: url({{ URL::asset('assets/admin/images/icons/bg-01.jpg') }});">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{asset('assets/admin/images/logo/Smarts.png')}}" alt="LOGO"/>

                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-4 pt-2">
                            <span>{{__('admin/loging.log in to the control panel')}} </span>
                        </h6>
                    </div>
                    @include('dashboard.includes.alerts.errors')
                    @include('dashboard.includes.alerts.success')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal form-simple" action="{{route('admin.post.login')}}" method="post"
                                  novalidate>
                                
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                <div class="wrap-input100 validate-input">
                                    <input type="text" name="email" class="input100"
                                           value="" id="email" placeholder="{{__('admin/loging.enter your email')}}">
                                           <span class="focus-input100"></span>
                                          {{-- <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>--}}
                                    </div>

                                    @error('email')
                                     <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </fieldset>
                                <div class="form-group row">
                                </div>
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                <div class="" >
                                    <input type="password" name="password" class="input100" 
                                           value=""  id="user-password" placeholder="{{__('admin/loging.enter the password')}}">
                                           <span class="focus-input100"></span>
                                           {{-- <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>--}}
                                    </div>

                                    @error('password')
                                     <span class="text-danger">{{$message}}</span>
                                     @enderror
                                    

                                </fieldset>
                            
                                <div class="form-group row">
                                    
                                {{--<div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" name="remember_me" id="remember-me"
                                                   class="chk-remember">
                                            <label for="remember-me">{{__('admin/loging.remember me')}}</label>
                                        </fieldset>
                                    </div>--}}

                                </div>
                                <div class="container-login100-form-btn m-t-17">
                                <button type="submit" class="login100-form-btn">
                                    <i class="ft-unlock"></i>
                                {{__('admin/loging.login')}}
                                </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </section>
    @stop
  
