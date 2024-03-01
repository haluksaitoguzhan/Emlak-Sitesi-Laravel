<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Emlak Kayıt Ol</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{ asset('front')}}/img/icons.png" rel="icon">
<link href="{{ asset('register_login')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Kayıt Ol</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				@if($errors->any())
				<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</div>
				@endif
				<form action="{{ route('my_register_post') }}" method="post">
					@csrf
					<input class="text" type="text" name="name" placeholder="İsminiz" required="">
					<input class="text surname" type="surname" name="surname" placeholder="Soyisminiz" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Şifre" required="">
					<input class="text w3lpass" type="password" name="cpassword" placeholder="Şifreyi onayla" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Şartlar & Koşulları Kabul Ediyorum.</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="KAYDOL">
				</form>
				<p>Mevcut hesabın var mı? <a href="{{ route('my_login_post') }}"> Giriş Yap</a></p>
			</div>
		</div>
		<!-- copyright -->
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>