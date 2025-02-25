<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>Flights.com</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Flights.com">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/animate.min.css">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="/components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/components/flexslider/flexslider.css" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="/css/style.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="/css/updates.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="/css/responsive.css">
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="/css/ie.css" />
    <![endif]-->
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body class="single single-pos">
    
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-left">
                        <?php echo $this->action('languages', 'misc')?>
                        <?php echo $this->action('currencies', 'misc')?>
                    </ul>
                    <ul class="quick-menu pull-right">
                    	<?php if(Zend_Auth::getInstance()->hasIdentity()):?>
                        <li><a href="<?php echo $this->url(array(),'account')?>"><?php echo $this->translate('MY ACCOUNT')?></a></li>
                        <li><a href="<?php echo $this->url(array(),'logout')?>"><?php echo $this->translate('LOGOUT')?></a></li>
                        <?php else:?>
                        <li><a href="#travelo-login" class="soap-popupbox"><?php echo $this->translate('LOGIN')?></a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox"><?php echo $this->translate('SIGNUP')?></a></li>
                        <?php endif?>
                    </ul>
                </div>
            </div>
            
            <div id="travelo-contact" class="travelo-signup-box travelo-box">
                <div class="simple-signup">
                    <div class="login-social">
                        <h4><?php echo $this->translate('Contact us')?></h4>
                    </div>
                    <div class="seperator"></div>
                	<form id="contact-form" method="post" action="<?php echo $this->url(array(), 'contact', true)?>">
                        <div class="form-group">
                            <input name="contact[firstname]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('first name')?> *">
                        </div>
                        <div class="form-group">
                            <input name="contact[lastname]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('last name')?> *">
                        </div>
                        <div class="form-group">
                            <input name="contact[email]" type="email" class="input-text full-width" placeholder="<?php echo $this->translate('email address')?> *">
                        </div>
                        
                        <div class="form-group">
                            <input name="contact[phone]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('phone')?>">
                        </div>
                        <div class="form-group">
                        	<textarea name="contact[about]" rows="5" cols="35" placeholder="<?php echo $this->translate('tell us about')?>"></textarea>
                        </div>
                        <button type="submit" class="full-width btn-medium"><?php echo $this->translate('Send')?></button>
                    </form>
                    <div class="seperator"></div>
                </div>
            </div>
            
            <?php if(!Zend_Auth::getInstance()->hasIdentity()):?>
            <div id="travelo-signup" class="travelo-signup-box travelo-box">
            	<div class="alert alert-error" id="signup-error">
                </div>
                <div class="simple-signup">
                    <div class="login-social">
                        <h4><?php echo $this->translate('Signup')?></h4>
                    </div>
                    <div class="seperator"><label><?php echo $this->translate('Signup')?></label></div>
                	<form id="signup-form" method="post" action="<?php echo $this->url(array(), 'signup', true)?>">
                        <div class="form-group">
                            <input name="user[firstname]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('first name')?> *">
                        </div>
                        <div class="form-group">
                            <input name="user[lastname]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('last name')?> *">
                        </div>
                        <div class="form-group">
                            <input name="user[email]" type="email" class="input-text full-width" placeholder="<?php echo $this->translate('email address')?> *">
                        </div>
                        
                        <div class="form-group">
                            <input name="user[street]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('street')?>">
                        </div>
                        <div class="form-group">
                            <input name="user[town]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('city')?>">
                        </div>
                        <div class="form-group">
                            <input name="user[zip]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('zip')?>">
                        </div>
                        <div class="form-group">
                        	<?php echo $this->countryList('user[country]')?>
                        </div>
                        
                        <div class="form-group">
                            <input id="user-password" name="user[password]" type="password" class="input-text full-width" placeholder="<?php echo $this->translate('password')?> *">
                        </div>
                        <div class="form-group">
                            <input id="confirm_password" name="confirm_password" type="password" class="input-text full-width" placeholder="<?php echo $this->translate('confirm password')?> *">
                        </div>
                        <div class="form-group">
                            <p class="description"><?php echo $this->translate('By signing up, I agree to Flights.com Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.')?></p>
                        </div>
                        <button id="signup-button" type="submit" class="full-width btn-medium"><?php echo $this->translate('SIGNUP')?></button>
                    </form>
                    <div class="seperator"></div>
                <p><?php echo $this->translate('Already a Flights.com member?')?> <a href="#travelo-login" class="goto-login soap-popupbox"><?php echo $this->translate('Login')?></a></p>
                </div>
            </div>
            
            <div id="travelo-login" class="travelo-login-box travelo-box">
            	<div class="alert alert-error" id="login-error">
                </div>
                <div class="login-social">
                    <h4><?php echo $this->translate('Login')?></h4>
                </div>
                <div class="seperator"><label><?php echo $this->translate('Login')?></label></div>
                <form id="login-form" method="post" action="<?php echo $this->url(array(), 'login', true)?>">
                    <div class="form-group">
                        <input name="login[username]" type="text" class="input-text full-width" placeholder="<?php echo $this->translate('username/email address')?>">
                    </div>
                    <div class="form-group">
                        <input name="login[password]" type="password" class="input-text full-width" placeholder="<?php echo $this->translate('password')?>">
                    </div>
                    <div class="form-group">
                    <button id="login-button" type="submit" class="full-width btn-medium"><?php echo $this->translate('Login')?></button>
                    </div>
                </form>
                <div class="seperator"></div>
                <p><?php echo $this->translate('Don\'t have an account? ')?><a href="#travelo-signup" class="goto-signup soap-popupbox"><?php echo $this->translate('Sign up')?></a></p>
            </div>
            <?php endif;?>
            <div class="main-header">
                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="/">
                            <img src="/images/logo.png" />
                        </a>
                    </h1>
                </div>
                
            </div>
        </header>
        
        <?php echo $this->layout()->content?>
        
        <footer id="footer">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row">
                        <?php echo $this->action('list-items', 'blog')?>
                        <div class="col-sm-6 col-md-3">
                            <h2><?php echo $this->translate('Contact Us')?></h2>
                            <p><?php echo $this->translate('Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massaidp nequetiam lore elerisque.')?></p>
                            <button data-target="#travelo-contact" class="soap-popupbox"><?php echo $this->translate('Contact us')?></button>
                            <br />
                            <br />
                            <span><?php echo $this->translate('We respect your privacy')?></span>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h2><?php echo $this->translate('About Flights.com')?></h2>
                            <p><?php echo $this->translate('Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massaidp nequetiam lore elerisque.')?></p>
                            <br />
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br />
                                <a href="#" class="contact-email">help@flights.com</a>
                            </address>
                            <ul class="social-icons clearfix">
                                <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                                <li class="dribble"><a title="dribble" href="#" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>
                                <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom gray-area">
                <div class="container">
                    <div class="logo pull-left">
                        <a href="/">
                            <img src="/images/logo.png" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                        <p>&copy; <?php echo date('Y')?> Fligths.com</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    

    <!-- Javascript -->
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="/js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.1.10.4.min.js"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="/components/revolution_slider/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="/components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>
    
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="/components/jquery.bxslider/jquery.bxslider.min.js"></script>
    
    <!-- load FlexSlider scripts -->
    <script type="text/javascript" src="/components/flexslider/jquery.flexslider-min.js"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="/js/jquery.stellar.min.js"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="/js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="/js/theme-scripts.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/admin/js/jquery.validate.min.js"></script>
    
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq('.revolution-slider').revolution(
            {
                dottedOverlay:"none",
                delay:9000,
                startwidth:1200,
                startheight:646,
                onHoverStop:"on",
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                navigationType:"none",
                shadow:0,
                spinner:"spinner4",
                hideTimerBar:"on",
            });
            tjq("#signup-form").validate({
    			rules: {
    				'user[firstname]': "required",
    				'user[lastname]': "required",
    				'user[email]': 'required',
    				'user[password]': 'required',
    				confirm_password: {
    					required: true,
    					equalTo: "#user-password"
    				}
    			},
    			messages: {
    				'user[firstname]': "<?php echo $this->translate('Please provide first name')?>",
    				'user[lastname]': "<?php echo $this->translate('Please provide last name')?>",
    				'user[email]': "<?php echo $this->translate('Please provide valid email')?>",
    				'user[password]': "<?php echo $this->translate('Please provide password')?>",
    				confirm_password: {
    					required: "<?php echo $this->translate('Please enter password again')?>",
    					equalTo: "<?php echo $this->translate('Both passwords not match')?>"
    				}
    			},
    			submitHandler: function(form){
    				tjq('#signup-button').prop('disabled', true);
    				tjq(form).ajaxSubmit(function(response){
        				if(response.status=='success'){
        					window.location.reload(true);
        				}else{
            				tjq('#signup-error').html(response.error).show()
            				tjq('#signup-button').prop('disabled', false);
        				}
        			});
        		}
    		});
            tjq("#login-form").validate({
    			rules: {
    				'login[username]': 'required',
    				'login[password]': 'required'
    			},
    			messages: {
    				'login[username]': "<?php echo $this->translate('Please provide valid login')?>",
    				'login[password]': "<?php echo $this->translate('Please provide password')?>"
    			},
    			submitHandler: function(form){
    				tjq('#login-button').prop('disabled', true);
    				tjq(form).ajaxSubmit(function(response){
        				if(response.status=='success'){
        					window.location.reload(true);
        				}else{
        					tjq('#login-button').prop('disabled', false);
            				tjq('#login-error').html(response.error).show()
        				}
        			});
        		}
    		});
            tjq("#contact-form").validate({
    			rules: {
    				'contact[firstname]': "required",
    				'contact[lastname]': "required",
    				'contact[email]': 'required',
    				'contact[about]': 'required'
    			},
    			messages: {
    				'contact[firstname]': "<?php echo $this->translate('Please provide first name')?>",
    				'contact[lastname]': "<?php echo $this->translate('Please provide last name')?>",
    				'contact[email]': "<?php echo $this->translate('Please provide valid email')?>",
    				'contact[about]': "<?php echo $this->translate('Please tell us about')?>"
    			},
    			submitHandler: function(form){
    				tjq(form).ajaxSubmit();
    				tjq(".opacity-overlay").fadeOut();
    				form.reset();
        		}
    		});
        });
    </script>
    <?=$this->inlineScript()?>
</body>
</html>

