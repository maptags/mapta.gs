<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="description" content=" Maptags is the worlds easiest Address sharing platform which takes away the pain of writing address forever. Imagine an Addressing system made for you ,Designed for the smart phone era.    Imagine a single word representing your address so that sharing your address is easy as sharing this word.  it takes 1-min to create a Maptag for your address and after which you will Never write  addresses ever ,  Never get frustrated guiding courier to your place or Never lose your way ">
        <meta name="keywords" content="address , address label , address search , Maptags, Maptag, #addressrevolution , directions ,ecommerce , ecommerce sites , world map , zip codes">


  <title>Maptags- Imagine Never writing your address again </title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Favicons-->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" type="image/x-icon"/>
  <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/favicon.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/favicon.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url()?>assets/images/favicon.png">

  <!-- CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/fileinput.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/fontello/css/fontello.css" rel="stylesheet"> 
  <link href="<?php echo base_url()?>assets/fontello/css/animation.css" rel="stylesheet"> 
  <link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/font-awesome.min.css"/>
  <!-- Owl Carousel Assets -->
  <link href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/jquery.dataTables_themeroller.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet"/>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script async src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script async src="<?php echo base_url()?>assets/js/fileinput.js"></script>
  <script async src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/js/toastr.min.js"></script>


   <meta name="alexaVerifyID" content="5H1TzN9QZFKXWbDKifmVj_63G6c"/>


  <style type="text/css">
        
        label,.fa { 
          margin-right:5px;
           }
        #login-nav input { 
          margin-bottom: 15px;
          margin-left: 0; 
        }
        #main{
          margin-bottom: 200px;
        }
        body{
          overflow-x: hidden;
          overflow-y:scroll;
          margin-bottom: 200px;
        }
        </style>
<script type="text/javascript">
  $(function() {
    $('#example').DataTable({paging: false,searching: false,ordering: true,"info": false});
     

    });
</script>
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

    </head>
    <body>
    <div class="container nospace">
              
    
    <nav class="navbar navbar-default" role="navigation">

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

                         <input id="" name="pwd" class="form-control" placeholder="****************" type="password">

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

            <li><a href="<?php echo base_url() ?>actions/my_track_codes"><span class="fa fa-map-marker"></span>My Maptags</a></li>
            <li><a href="<?php echo base_url() ?>actions/saved_maptags"><span class="fa fa-map-marker"></span>My Saved Maptags</a></li>
            <li><a href="<?php echo base_url() ?>invite/friends"><span class="fa fa-user"></span>My Contacts</a></li>
            
            <li class="divider"></li>

            <?php if ($this->session->userdata('logged')=='social'): ?>



              <li><a href="<?php echo base_url() ?>user/social_login/<?php echo $this->session->userdata('provider') ?>?logout"><span class="fa fa-power-off"></span>Logout</a></li>

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
      <div id="wrapper">
      <!--  -->
        <div id="main">
          <div class="container">
            
