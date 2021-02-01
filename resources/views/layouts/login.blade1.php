<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="{{app()->getLocale()==='ar' ? 'rtl' : 'ltr'}}">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('assets/admin/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css1/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
    @include('dashboard.includes.alerts.errors')
                    @include('dashboard.includes.alerts.success')
	    <div class="container-login100" style="background-image: url({{ URL::asset('assets/admin/images/icons/bg-01.jpg') }});">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Sign In With
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="{{asset('assets/admin/images/icons/icon-google.png')}}" alt="GOOGLE">
						Google
					</a>
					<form class="form-horizontal form-simple" action="{{route('admin.post.login')}}" method="post"
                                  novalidate>
                                
                                @csrf
                                
					<div class="p-t-31 p-b-9">
                    <fieldset>
						<span class="txt1">
							Username
						</span>
					</div>
                    
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="email" id="email" placeholder="{{__('admin/loging.enter your email')}}">
						<span class="focus-input100"></span>
					</div>
					@error('email')
                     <span class="text-danger">{{$message}}</span>
                    @enderror
                    </fieldset>
					<div class="p-t-13 p-b-9">
						<span class="txt1">
                        <fieldset>
							Password
						</span>

						<a href="#" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>
                    
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="password" id="user-password"   placeholder="{{__('admin/loging.enter the password')}}">
						<span class="focus-input100"></span>
					</div>
                    @error('password')
                      <span class="text-danger">{{$message}}</span>
                   @enderror
                    </fieldset>
					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
                        {{__('admin/loging.login')}}
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Sign up now
						</a>
                    </div>
                    </form>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/vendors/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/vendors/js1/popper.js')}}"></script>
	<script src="{{asset('assets/admin/vendors/js1/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/vendors/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/vendors/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets/admin/vendors/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/vendors/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/admin/js/main.js')}}"></script>

</body>
</html>