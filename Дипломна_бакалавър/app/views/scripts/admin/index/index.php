<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="" />

	<title><?php echo $this->translate('Flights.com | Login')?></title>

	<link rel="stylesheet" href="/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="/admin/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="/admin/css/bootstrap.css">
	<link rel="stylesheet" href="/admin/css/neon-core.css">
	<link rel="stylesheet" href="/admin/css/neon-theme.css">
	<link rel="stylesheet" href="/admin/css/neon-forms.css">
	<link rel="stylesheet" href="/admin/css/custom.css">

	<script src="/admin/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="/admin/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="index.html" class="logo">
				<img src="/admin/images/logo@2x.png" width="120" alt="" />
			</a>
			
			<p class="description"><?php echo $this->translate('Please authorize yourself to continue')?>!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span><?php echo $this->translate('logging in...')?></span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3 id="error_message"><?php echo $this->translate('Invalid username or password')?></h3>
				<p><?php echo $this->translate('Please enter your username and password')?></p>
			</div>
			
			<form method="post" role="form" id="form_login">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<?php echo $this->formText('username', null, array(
						    'class' => 'form-control',
						    'placeholder' => $this->translate('Username'),
						    'autocomplete' => 'off'
						))?>
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<?php echo $this->formPassword('password', null, array(
						    'class' => 'form-control',
						    'placeholder' => $this->translate('Password'),
						    'autocomplete' => 'off'
						))?>
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						<?php echo $this->translate('Login')?>
					</button>
				</div>
				
			</form>
			
			
			
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="/admin/js/gsap/main-gsap.js"></script>
	<script src="/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="/admin/js/bootstrap.js"></script>
	<script src="/admin/js/joinable.js"></script>
	<script src="/admin/js/resizeable.js"></script>
	<script src="/admin/js/neon-api.js"></script>
	<script src="/admin/js/jquery.validate.min.js"></script>
	<script src="/admin/js/neon-login.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/admin/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="/admin/js/neon-demo.js"></script>

</body>
</html>