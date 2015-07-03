<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Maptags- Imagine Never writing your address again</title>

 <meta name="description" content=" Maptags is the worlds easiest Address sharing platform, Maptags shortens your address to your favourite word so sharing your address is easy as sharing a word which takes away the pain of writing address forever. Maptags is integrated to Google Maps hence providing seamless driving directions which ensures you never lose your way ">
        <meta name="keywords" content="address , address label , address search , Maptags, Maptag, #addressrevolution , directions ,ecommerce , ecommerce sites , world map , zip codes">



  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="alexaVerifyID" content="5H1TzN9QZFKXWbDKifmVj_63G6c"/>
  <!-- CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/fileinput.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.1.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/fontello/css/fontello.css" rel="stylesheet"> 
  <link href="<?php echo base_url()?>assets/fontello/css/animation.css" rel="stylesheet"> 
  <link rel="stylesheet" media="screen" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"/>
  <!-- Owl Carousel Assets -->
  <link href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/jquery.dataTables_themeroller.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
  <script src="<?php echo base_url()?>assets/js/fileinput.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
  <style type="text/css">
          #map-canvas { 
            height: 780px 
          } 
          .label,.fa { 
            margin-right:5px; 
          }
          #login-nav input { 
            margin-bottom: 15px;
            margin-left: 0; 
          }

  </style>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places,drawing"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
  <!-- Add fancyBox -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
  <!-- Optionally add helpers - button, thumbnail and/or media -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script src="<?php echo base_url()?>assets/js/bootbox.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/placesv2.js"></script>
</head>
    <body>
      <div id="wrapper">
        <div class="container nospace">
          <nav class="navbar navbar-default " role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo.jpg" alt="" style="width: 116px;"></a>
              </div>
              <div class="collapse navbar-collapse nav-cols" id="bs-example-navbar-collapse-1">
                <?php if($this->session->userdata('logged_in')!=TRUE): ?> 
                 <ul class="nav navbar-nav navbar-right nav-custom">
                  <li class="dropdown">
                   <a href="#" class="dropdown-toggle left-space" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                   <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;margin-left: 22px">
                    <li>
                     <div class="row">
                      <div class="col-md-12">
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
              <li class="divider"></li>
              <li>
               <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Google"><img src="<?php echo base_url() ?>assets/img/g+.png"></a>
               <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Twitter"><img src="<?php echo base_url() ?>assets/img/twitter.png"></a>
             </li>
           </ul>
         </li>
       </ul>
     <?php else: ?>
      <ul class="nav navbar-nav navbar-right">            
        <li class="dropdown" style="margin-top: 13px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span>
          <?php if($this->session->userdata('profile_pic')){ ?>
          
          <img src="<?php echo $this->session->userdata('profile_pic'); ?>" alt="" style="margin: -4px 8px 0 0;border-radius: 100%;border: 2px solid #FFF;max-width: 40px;">
          <?php } else{ ?>
          <img src="<?php echo base_url() ?>profiles/nopic.png" alt="" style="margin: -4px 8px 0 0;border-radius: 100%;border: 2px solid #FFF;max-width: 40px;">
          <?php } ?>
          </span>
          <?php echo $this->session->userdata('fname'); ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>user/my_profile"><span class="fa fa-user"></span>Profile</a></li>
            <li><a href="<?php echo base_url() ?>actions/my_credits"><span class="fa fa-money"></span>My Credit</a></li>
            <li><a href="<?php echo base_url() ?>actions/my_track_codes"><span class="fa fa-map-marker"></span>My Track codes</a></li>
            <li class="divider"></li>
            <?php if ($this->session->userdata('logged')=='social'): ?>

              <li><a href="<?php echo base_url() ?>user/social_login/Google?logout"><span class="fa fa-power-off"></span>Logout</a></li>
            <?php else: ?>
              <li><a href="<?php echo base_url() ?>user/logout"><span class="fa fa-power-off"></span>Logout</a></li>
            <?php endif ?>
          </ul>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>
</div>
<div id="main">
  <div class="container nospace">
   