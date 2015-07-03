<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="alexaVerifyID" content="5H1TzN9QZFKXWbDKifmVj_63G6c"/>
        <meta name="description" content=" Maptags is the worlds easiest Address sharing platform, Maptags shortens your address to your favourite word so sharing your address is easy as sharing a word which takes away the pain of writing address forever. Maptags is integrated to Google Maps hence providing seamless driving directions which ensures you never lose your way ">
        <meta name="keywords" content="address , address label , address search , Maptags, Maptag, #addressrevolution , directions ,ecommerce , ecommerce sites , world map , zip codes">
        <title>Maptags- Imagine Never writing your address again</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/x-icon"/>
        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url() ?>assets/images/favicon.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url() ?>assets/images/favicon.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url() ?>assets/images/favicon.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url() ?>assets/images/favicon.png">
        
<!--  CSS File -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/fileinput.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/fontello/css/fontello.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/fontello/css/animation.css" rel="stylesheet"> 
        <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>assets/css/font-awesome.min.css"/>
        <link href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/jquery.dataTables_themeroller.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet"/>


<!-- JS File-->
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url() ?>assets/js/fileinput.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootbox.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/placesv2.js"></script>
        <script src="<?php echo base_url() ?>assets/js/toastr.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/sharelink.js"></script>

		<!-- Google Api -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>

		<style type="text/css">
          body { 
  			overflow-y:hidden;
          } 
          .label,.fa { 
            margin-right:5px; 
          }
          #login-nav input { 
            margin-bottom: 15px;
            margin-left: 0; 
          }
          .file-drop-zone-title {              
              font-size: 27px;
            }
  		</style>
        <!-- Add fancyBox -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
</head>
<body>
<div class="container nospace">
	<nav class="noshow showmaptag hidden-lg hidden-md" style="display:none;">
						<div class="showmaptag1 noshow mapstag_btn hidden-lg hidden-md col-xs-4" style="margin-top:6px; margin-left:-13px" >
							<a class="noshow btn pull-left btn-danger hidden-lg hidden-md" href="/maptags.html">Know More</a>
						</div>
						<div class="showmaptag1 noshow mapstag_btn hidden-lg hidden-md col-xs-4" style="margin-top:6px;">
							<a class="btn btn-success pull-left hidden-lg hidden-md create-maptag" style="background-color: #ef7126; border-color: #ef7126; margin-left:-5.5px;" href="#">Get Maptag</a>
						</div>
						<div class="showmaptag1 noshow mapstag_btn hidden-lg hidden-md col-xs-4" style="margin-top:6px; margin-left:-6px;">
							<a class="btn btn-success pull-left hidden-lg hidden-md" href="/maptags2.html">Make Money</a>
						</div>
		</nav>
	<nav class="navbar navbar-default " role="navigation">
		<div class="container-fluid">
			    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                    <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo.jpg" alt="" style="width: 116px;"></a>
                </div>
                <div class="fb-like" data-href="https://www.facebook.com/maptagss" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                <div class="collapse navbar-collapse nav-cols" id="bs-example-navbar-collapse-1">
                <div id="showmapta" style="display: none; background-color: #transparent;">
					<div class="banner-text">
						<div style="margin-top:20px; padding-left:4em;" class="mapstag_btn hidden-xs col-lg-3 col-md-3">
							<a class="pull-right btn btn-danger visible-lg" href="/maptags.html">Know more about maptags</a>
							<a class="pull-right btn btn-danger visible-xs" href="/maptags.html">Know More</a>
						</div>
						<div style="margin-top:20px; padding-left:8em;" class="mapstag_btn hidden-xs col-lg-3 col-md-3">
							<a class="btn btn-success pull-left visible-lg create-maptag" style="background-color: #ef7126; border-color: #ef7126;" href="#">Sign up & Create a Maptag</a>
							<a class="btn btn-success pull-left visible-xs create-maptag" style="background-color: #ef7126; border-color: #ef7126;" href="#">Create Maptag</a>
						</div>
						<div style="margin-top:20px; padding-left:8em;" class="mapstag_btn hidden-xs col-lg-2 col-md-2">
							<a class="btn btn-success pull-left visible-lg create-maptag" border-color: #ef7126;" href="/maptags2.html">Make Money</a>
							<a class="btn btn-success pull-left visible-xs create-maptag"  href="/maptags2.html">Make Money</a>
						</div>
					</div>
				</div> 
                    <?php if ($this->session->userdata('logged_in') != TRUE): ?> 
                        <ul class="nav navbar-nav navbar-right nav-custom">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle left-space" data-toggle="dropdown">Sign in<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;margin-left: 22px">
                                    <li>
                                        <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Google"><img src="<?php echo base_url() ?>assets/img/g+.png"></a>
                                        <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Facebook"><img src="<?php echo base_url() ?>assets/img/facebook.png"></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 form-custom">
                                                <form class="form" role="form" method="post" action="<?php echo site_url('user/login') ?>" accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input id="email" name="email" class="form-control" placeholder="user@example.com" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                        <input id="pwd" name="pwd" class="form-control" placeholder="****************" type="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn  btn-success btn-block" name="signin" value="Login">
                                                        <a href="<?php echo base_url() ?>user/register" class="btn  btn-info btn-block">Register new account</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php else: ?>
                        <ul class="nav navbar-nav navbar-right">            
                            <li class="dropdown" style="margin-top: 13px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>
                                        <?php if ($this->session->userdata('profile_pic')) { ?>
                                            <img src="<?php echo $this->session->userdata('profile_pic'); ?>" alt="" style="margin: -4px 8px 0 0;border-radius: 100%;border: 2px solid #FFF;max-width: 40px;">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>profiles/nopic.png" alt="" style="margin: -4px 8px 0 0;border-radius: 100%;border: 2px solid #FFF;max-width: 40px;">
                                        <?php } ?>
                                    </span>
                                    <?php echo $this->session->userdata('fname'); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url() ?>user/my_profile"><span class="fa fa-user"></span>Profile</a></li>
                                    <li><a href="<?php echo base_url() ?>actions/my_credits"><span class="fa fa-money"></span>My Credit</a></li>
                                    <li><a href="<?php echo base_url() ?>actions/my_track_codes"><span class="fa fa-map-marker"></span>My Maptags</a></li>
                                    <li><a href="<?php echo base_url() ?>actions/saved_maptags"><span class="fa fa-map-marker"></span>My Favourites</a></li>
                                    <li><a href="<?php echo base_url() ?>invite/friends"><span class="fa fa-user"></span>My Contacts</a></li>
                                    <li class="divider"></li>
                                    <?php if ($this->session->userdata('logged') == 'social'): ?>
                                        <li><a href="<?php echo base_url() ?>user/social_login/<?php echo $this->session->userdata('provider') ?>?logout"><span class="fa fa-power-off"></span>Logout</a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo base_url() ?>user/logout"><span class="fa fa-power-off"></span>Logout</a></li>
                                    <?php endif ?>
                                </ul>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
		</div>
	</nav>
</div>
<div id="wrapper">
	<div id="main">
		<div id="container nospace">
			        
        