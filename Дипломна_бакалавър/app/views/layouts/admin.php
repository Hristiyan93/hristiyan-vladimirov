<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="" />

	<title><?php echo $this->translate('Flights.com | Administration')?></title>

	<link rel="stylesheet" href="/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="/admin/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="/admin/css/bootstrap.css">
	<link rel="stylesheet" href="/admin/css/neon-core.css">
	<link rel="stylesheet" href="/admin/css/neon-theme.css">
	<link rel="stylesheet" href="/admin/css/neon-forms.css">
	<link rel="stylesheet" href="/admin/css/custom.css">
	<?php echo $this->headLink()?>

	<script src="/admin/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="/admin/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="/admin/dashboard">
						<img src="/admin/images/logo@2x.png" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
			<?php echo $this->navigation()->menu()->setMinDepth(0)
			->setPartial('common/admin/menu.php');?>
			
		</div>

	</div>

	<div class="main-content">
				
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo $this->userInfo(Models_Wrapper_User::INFO_PICTURE);?>" alt="" class="img-circle" width="44" />
							<?php echo $this->userInfo(Models_Wrapper_User::INFO_NAME);?>
						</a>
		
					</li>
		
				</ul>
				
				
			</div>
			
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
					<?php echo $this->partial('common/admin/languages.php')?>
					<li class="sep"></li>
					<li>
						<a href="/admin/index/logout">
							<?php echo $this->translate('Logout')?> <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>
		
		<div class="row">
			
			<div class="col-md-12">
			
				<?php echo $this->navigation()->breadcrumbs()->setPartial('common/admin/breadcrumbs.php')
				->setMinDepth(0);?>
			</div>
		</div>
		
		<hr />
		
		<?php echo $this->layout()->content?>
		
		<!-- Footer -->
		<footer class="main">
			
			&copy; <?php print(date('Y'));?> <strong>Flights.com</strong>
		
		</footer>
	</div>

	
</div>
	<!-- Bottom scripts (common) -->
	<script src="/admin/js/gsap/main-gsap.js"></script>
	<script src="/admin/js/underscore-min.js"></script>
	<script src="/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="/admin/js/bootstrap.js"></script>
	<script src="/admin/js/joinable.js"></script>
	<script src="/admin/js/resizeable.js"></script>
	<script src="/admin/js/neon-api.js"></script>
	
	
	<!-- Page specific scripts -->
	<?php echo $this->headScript();?>

	<!-- JavaScripts initializations and stuff -->
	<script src="/admin/js/neon-custom.js"></script>

</body>
</html>