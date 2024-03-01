<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Emlak Giriş</title>
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
<!-- <div class="agileits-top col-md-12">
<span><p>Admin olarak giriş yap <a href="{{ route('admin_giris') }}"> Giriş Yap</a></p></span>
</div> -->
<div class="myclass">
	<span><p>Admin olarak giriş yap  <a class="white-input" href="{{ route('admin_giris') }}" target="_blank">  Giriş Yap?</a></p></span>
</div>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Giriş Yap</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				@if($errors->any())
				<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</div>
				@endif
				<form action="{{ route('my_login_post') }}" method="post">
                    @csrf
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Şifre" required="">
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit" value="GİRİŞ YAP">
				</form>
				<p>Mevcut hesabın yok mu? <a href="{{ route('my_register_post') }}"> Kaydol</a></p><br>
				
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