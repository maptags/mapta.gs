<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
<meta name="alexaVerifyID" content="5H1TzN9QZFKXWbDKifmVj_63G6c"/>

 <meta name="description" content=" Maptags is the worlds easiest Address sharing platform, Maptags shortens your address to your favourite word so sharing your address is easy as sharing a word which takes away the pain of writing address forever. Maptags is integrated to Google Maps hence providing seamless driving directions which ensures you never lose your way ">
        <meta name="keywords" content="address , address label , address search , Maptags, Maptag, #addressrevolution , directions ,ecommerce , ecommerce sites , world map , zip codes">

    <title>Maptags- Imagine Never writing your address again</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" type="image/x-icon"/>
  <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/favicon.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/favicon.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url()?>assets/images/favicon.png">

  <!-- CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/fileinput.css" rel="stylesheet">
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
            height: 780px; 
            width:100%;
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
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
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

  
  <script type="text/javascript">
   var map;
   var geocoder;

   function initialize() {
    geocoder = new google.maps.Geocoder();



  }
   function showlocation() {
         // One-shot position request.
         navigator.geolocation.getCurrentPosition(callback);
       }

       function callback(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        document.getElementById('latitude').innerHTML = lat;
        document.getElementById('longitude').innerHTML = lon;
        //codeLatLng(lat, lon);
        var latLong = new google.maps.LatLng(lat, lon);
        var intialmarker = new google.maps.Marker({
          position: latLong,
          
        });      
        intialmarker.setMap(map);
        map.setZoom(15);
        map.setCenter(intialmarker.getPosition());
        
      }
      
      google.maps.event.addDomListener(window, 'load', initMap);
      //google.maps.event.addDomListener(window, 'resize', initMap);
      function initMap() {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {

          center: new google.maps.LatLng(21.125498, 81.914063),

          zoom: 4,

          mapTypeId: google.maps.MapTypeId.ROADMAP

        };

        map = new google.maps.Map(document.getElementById("map-canvas"), 

          mapOptions);
         
         google.maps.event.addListener(map, 'click', function(event) {
            sharecodeMarker();
        });
         


      }



      var uId =  <?php if (($this->session->userdata('member_id'))){ echo $this->session->userdata('member_id'); } else { echo 0; }?>  

      var reqURL = "<?php echo $this->uri->segment(1); ?>"; 
     
        if (navigator.geolocation) {
            //navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
        } 
        function successFunction(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            codeLatLng(lat, lng);
        }

        function errorFunction(){
            alert("Geocoder failed");
        }
      function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      //console.log(results);
        if (results[1]) {

       /* var indice=0;
        for (var j=0; j<results.length; j++)
        {
            if (results[j].types[0]=='locality')
                {
                    indice=j;
                    break;
                }
            }
        //alert('The good number is: '+j);
        //console.log(results[j]);
        for (var i=0; i<results[j].address_components.length; i++)
            {
                if (results[j].address_components[i].types[0] == "locality") {
                        //this is the object you are looking for
                        city = results[j].address_components[i];
                    }
                if (results[j].address_components[i].types[0] == "administrative_area_level_1") {
                        //this is the object you are looking for
                        region = results[j].address_components[i];
                    }
                if (results[j].address_components[i].types[0] == "country") {
                        //this is the object you are looking for
                        country = results[j].address_components[i];
                    }

            }*/

            var address = results[0].address_components;
            var zip;
            console.log(address);
            $('#city').val(address[1].long_name);
            $('#state').val(address[3].long_name);
            $('#address1').val(address[2].long_name);
            zip = address[5].long_name;
            
              $('#zip').val(zip);
            
              //$('#zip').val(address[6].long_name);

            } else {
              //alert("No results found");
            }
        //}
      } else {
        //alert("Geocoder failed due to: " + status);
      }
    });
  }
    function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
     function saveLocation(ymarker){
      console.log(ymarker);
      placeLat = ymarker.getPosition().lat();

      placeLng = ymarker.getPosition().lng();
      codeLatLng(placeLat, placeLng);
      $('#share_maptag').modal('toggle');

      }
function closeTo(maptag) {
      var name;
      if(maptag === null){
        name = "<?php echo $this->uri->segment(1)?>";
      }
      else{
        name = maptag;
      }
        console.log( name);
        var request = $.ajax({

            url: "http://mapta.gs/actions/save_maptag",

            type: "POST",

            data: { name : name },

            dataType: "html"

          });

           

          request.done(function( msg ) {

            $( ".log" ).html( msg );

          });

           

          request.fail(function( jqXHR, textStatus ) {

            alert( "Request failed: " + textStatus );

          });
}
      $(function() {
        
        $('#share').click(function() {
         var $place = $('.roosh').val();

              var $address= $('#address').val();

              var $address1= $('#address1').val();

              var $Phone= $('#phone').val();

              var $website= $('#website').val();

              var $description= $('#description').val();

              var $city= $('#city').val();

              var $state= $('#state').val();

              var $zip= $('#zip').val();

              //console.log($('#roosh').val());

              //console.log($('#address').val());



              var request = $.ajax({

                url: "<?php echo base_url() ?>test/add_track_code",

                type: "POST",

                data: {u_id: uId, lat: placeLat, lng: placeLng, place: $place, address: $address, address1: $address1, city: $city, state: $state, zip: $zip, Phone: $Phone, website: $website, description: $description},

                dataType: "json",

              });



              request.done(function( msg ) {



                if(msg.code === 1){
                  //console.log(msg.lid);
                 $('#share_maptag').modal('hide');

                  toastr.success('Successfully Added');
                  
                    var rr = $.ajax({

                        url: "<?php echo base_url() ?>test/show_last_maptag",

                        type: "POST",

                        data: {insert_id: msg.insert_id},

                        dataType: "json",

                    });
                    /* */
                    rr.done(function( m ) {

                      $(".modal-body #modalname").html( '<a href="<?php echo base_url() ?>'+m.name+'">http://mapta.gs/'+m.name+'</a>' );
                      $(".modal-body #icons-share").html( '<div id="share-buttons"><div class="item"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/'+m.name+'" onclick="return popitup(https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/'+m.name+')" target="_blank"><img src="http://mapta.gs/assets/images/share/facebook.png" alt="Facebook"/></a><span class="cap"></span></div> <div class="item"><a href="https://twitter.com/intent/tweet?text=http://mapta.gs/'+m.name+'" onclick="return popitup(https://twitter.com/intent/tweet?text=http://mapta.gs/'+m.name+')" target="_blank"><img src="http://mapta.gs/assets/images/share/twitter.png" alt="Twitter"/></a><span class="cap"></span></div>  <div class="item"><a href="https://plus.google.com/share?url=http://mapta.gs/'+m.name+'" onclick="return popitup(https://plus.google.com/share?url=http://mapta.gs/'+m.name+')" target="_blank"><img src="http://mapta.gs/assets/images/share/google.png" alt="Google"/></a>' );
                      $('#show_maptag').modal('show');
                     } ); 

                }

                else if(msg.code === 2){

                  //dlg2.modal("hide");

                  toastr.warning("Oops, You can only have 50 Tracking Locations");

                }

                else if(msg.code === 3){

                  toastr.error("Track Code name is taken, Try Another");

                }

                else if(msg.code === 4){

                  toastr.warning("Please Enter only alphabets for maptag");

                }

                else{



                  toastr.error("something went wrong try again");

                }  

              });

              request.fail(function( jqXHR, textStatus ) {

                alert( "Request failed: " + textStatus );

              });

              return false;
            
      });
            
$('.panel-heading span.clickable').on("click", function (e) {

 

  if ($(this).hasClass('panel-collapsed')) {
      console.log('hi');
                // expand the panel
                //console.log('expand');
                $(this).parents('.panel').find('.panel-body').slideDown();

                $(this).removeClass('panel-collapsed');

                $(this).find('i').removeClass('fa fa-plus-square').addClass('fa fa-minus-square');

              }

              else {

                // collapse the panel
                //console.log('collapse')
                $(this).parents('.panel').find('.panel-body').slideUp();

                $(this).addClass('panel-collapsed');

                $(this).find('i').removeClass('fa fa-minus-square').addClass('fa fa-plus-square');

              }

            });
        <?php if(!($this->uri->segment(1))){ ?>
          geoFindMe();
        <?php } ?>

        $("#input-702").fileinput({

          uploadUrl: "<?php echo base_url() ?>test/add_track_image",

          maxFileCount: 5,

          overwriteInitial: false,

          allowedFileTypes: ["image"]

        });
        $('#input-702').on('fileloaded', function(event, file, previewId, index, reader) {
              
              console.log('hi');
          });
      });

      </script>
      
    <!--[if lt IE 9]>

      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

      <![endif]-->
      <style type="text/css">

        body{

          overflow: hidden;

        }

        .left-space{

          margin-left: 25px;

        }

        #share-buttons img {

          width: 30px;
          border: 0;

          box-shadow: 0;

          display: inline;

        }

      </style>
      
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"jSv+k1aQeSI1/9", domain:"mapta.gs",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=jSv+k1aQeSI1/9" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  

    </head>

    <body onload="initialize()">
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
              <div class="fb-like" data-href="https://www.facebook.com/maptags" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

              <div class="collapse navbar-collapse nav-cols" id="bs-example-navbar-collapse-1">

                <?php if($this->session->userdata('logged_in')!=TRUE): ?> 

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
            <li><a href="<?php echo base_url() ?>actions/saved_maptags"><span class="fa fa-map-marker"></span>My Favourites</a></li>

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

<div id="main">

  <div class="container nospace">

    
<div class="modal fade" id="share_maptag" tabindex="-1" role="dialog" aria-labelledby="share_maptagLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Create MapTag</h4>

      </div>

      <div class="modal-body search-model">
      <div class="container" id="frm">

      <div class="row" style="margin-top: 0;padding:0;">

        <div class="col-md-10">

          <form class="form-horizontal" name="fmadd">

            <div class="form-group">

              <label for="roosh" class="col-sm-2 control-label" style="padding-top: 14px;">Maptag</label>

              <div class="col-sm-6">

                <input type="text" class="roosh form-control" name="roosh" placeholder="Track Code">

              </div>

              <div class="col-sm-4">



               <span class="log" style="padding-top: 14px;"></span>

             </div>

           </div>

         </form>

         <div class="panel panel-default">

          <div class="panel-heading">

           <h3 class="panel-title">Address</h3> 

           <span class="pull-left clickable panel-collapsed">

            <i class="fa fa-plus-square"></i>

          </span>

        </div>

        <div class="panel-body" style="display: none;">

         <div class="form-horizontal">

          <div class="form-group">

            <label for="address" class="col-sm-2 sr-only control-label">Address Line 1</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="address" placeholder="Primary Address">

            </div>

          </div>

          <div class="form-group">

            <label for="address1" class="col-sm-2 sr-only control-label">Address Line 2</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="address1" placeholder="Address 2">

            </div>

          </div>

          <div class="form-group">

            <label for="city" class="col-sm-2 sr-only control-label">City</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="city" placeholder="City">

            </div>

          </div>

          <div class="form-group">

            <label for="state" class="col-sm-2 sr-only control-label">Province</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="state" placeholder="State">

            </div>

          </div>

          <div class="form-group">

            <label for="zip" class="col-sm-2 sr-only control-label">Zip/Postal Code</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="zip" placeholder="Zip">

            </div>

          </div>

          <div class="form-group">

            <label for="phone" class="col-sm-2 sr-only control-label">Phone</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="phone" placeholder="Phone">

            </div>

          </div>

          <div class="form-group">

            <label for="website" class="col-sm-2 sr-only control-label">Website</label>

            <div class="col-sm-10">

              <input type="text" class="form-control" id="website" placeholder="Your Website address i-e mapta.gs">

            </div>

          </div>

          <div class="form-group">

            <label for="email" class="col-sm-2 sr-only control-label">Description</label>

            <div class="col-sm-10">

              <textarea class="form-control" id="description"></textarea>

            </div>

          </div>



        </div>

      </div>

    </div>

  </div>



</div>

<div class="row" style="margin-top: 0;padding:0;">

  <div class="col-md-10">

    <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title">Images</h3>

        <span class="pull-left clickable panel-collapsed"><i class="fa fa-plus-square"></i></span>

      </div>

      <div class="panel-body" style="display:none">

        <input id="input-702" data-upload-async="false" name="files[]" type="file" multiple=true class="file-loading"  data-upload-url="<?php echo base_url() ?>test/add_track_image" data-max-file-count="5" >

      </div>

    </div>

  </div>

</div>

</div>
      </div>

      <div class="modal-footer">
      <button type="button" id="share" class="btn btn-success">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->


<div class="modal fade" id="show_maptag" tabindex="-1" role="dialog" aria-labelledby="show_maptagLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">MapTag Created. </h4>

      </div>

      <div class="modal-body">
        <p style="font-size:15px">Congratulations your maptag is ready </p>             
        <span style="font-size:15px">Here's the share/referral link : </span> &nbsp;&nbsp;             
        <span style="font-size:15px" id="modalname"></span>  
        <p style="font-size:20px">
          Be a HERO, help your friend to Never write an address or Never lose way ..share it  

        </p> 
        <hr>
        <div style="font-size:15px" id="icons-share"></div>             
      </div>

      <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->