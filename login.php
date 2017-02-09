
<!-- All the files that are required -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="/assets/css/style.css">

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<?php
	session_start();
	if(isset($_SESSION['userId'])){
		header("location: http://".$_SERVER['HTTP_HOST']);
		exit;
	}
?>
<div class="text-center login-form" style="padding:50px 0">
	<div class="logo">Log In</div>
	<!-- Main Form -->
	<div class="login-form-1">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="username" required>
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="password" required>
					</div>
					<div class="form-group login-group-checkbox">

					</div>
				</div>
				<button id="user-login" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
	</div>
	<!-- end:Main Form -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/assets/js/custom_script.js"></script>

