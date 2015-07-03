<?php print_header(); ?>

      <div style="margin-bottom: 45px;" >
      
       <form id="loginform" action="<?php echo site_url('user/login') ?>" method="post" class="form-horizontal roosh">
        <fieldset>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h4 style="margin-top: 20%" align="center">Sign Up / Sign In to Create Maptags <hr></h4>
            <div class="row">
              <div class="col-md-12 ">
               <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Google" onclick="ga('send', 'event', 'GFlogin', 'Click', 'Glog');"><img src="<?php echo base_url() ?>assets/img/g+.png"></a>
                <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Facebook" onclick="ga('send', 'event', 'GFlogin', 'Click', 'Flog');"><img src="<?php echo base_url() ?>assets/img/facebook.png"></a>
                <!-- <a href="" ><img src="http://i.imgur.com/dEgj0Qj.png" width="170px"/></a> -->
              </div>
              <!-- <div class="col-md-6">
                <img src="http://i.imgur.com/dEgj0Qj.png" width="50%" />
              </div> -->
            </div>
            <hr>
            <?php
          if( validation_errors() ){
            echo '<div class="alert alert-danger">'.validation_errors( ).'</div>';
          }
      ?>
       <?php if ($this->session->flashdata('result') != ''){?>
          <div class="alert alert-info" style="position:static; ">
              <?php echo $this->session->flashdata('result');?> 
          </div>
      <?php } ?>
      <?php if ($this->session->flashdata('access-denied') != ''){?>
          <div class="alert alert-danger" style="position:static; ">
              <?php echo $this->session->flashdata('access-denied');?> 
          </div>
      <?php } ?>
          </div>
        </div>
        <!-- Prepended text-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="email">E-mail</label>
            <div class="col-md-4 ">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="email" name="email" class="form-control" placeholder="user@example.com" type="text">
              </div>
              
            </div>
          </div>

          <!-- Prepended text-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="pwd">Password</label>
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input id="pwd" name="pwd" class="form-control" placeholder="****************" type="password">
              </div>
               <!-- <span class="help-block pull-right">forgot password ?</span>   -->
            </div>
          </div>






          <!-- Multiple Checkboxes (inline) -->

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4  control-label" for="submit"></label>
            <div class="col-md-4">
              <div class="pull-left">
                <a href="<?php echo base_url()?>user/register" onclick="ga('send', 'event', 'GFlogin', 'Click', 'Rlog');" class="btn  btn-info"><i class="fa fa-location-arrow"></i> Register</a>
              </div>
               <!-- <input name="savelogin" id="savelogin-0" value="" type="checkbox"> Remember Me  -->
               <div class="pull-right">
                 <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Clear</button>
                 <input type="submit" class="btn  btn-success" name="signin" value="Login">
               </div>
               
            </div>
          </div>

          </fieldset>
        </form>
      </div><!-- End book -->   




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
  
  
  ga('require', 'displayfeatures');
   ga('create', 'UA-58667648-1', 'auto');
  ga('create', 'UA-58667648-2', 'auto', {'name': 'maptagsmoney'});
 ga('maptagsmoney.send', 'pageview');
  
ga('send', 'pageview');

</script>






<SCRIPT LANGUAGE="JavaScript">
<!-- BidVertiser Performance Tracker Code
var bdv_Performance_Ver = "1.0";
var bdv_AID = 285394455;
var bdv_protocol="http://";
if(location.protocol == "https:")
{
	bdv_protocol="https://";
}
var bdv_queryStr = "?" + "ver=" + bdv_Performance_Ver + "&AID=" + bdv_AID +"&ref=" + escape(document.referrer); 
var bdv_imageUrl = bdv_protocol + "secure.bidvertiser.com/performance/pc.dbm" + bdv_queryStr; 
var bdv_imageObject = new Image(); 
bdv_imageObject.src = bdv_imageUrl; 
// --> 
</SCRIPT>
<noscript>
	<img height=1 width=1 border=0 src="https://secure.bidvertiser.com/performance/pc.dbm?ver=1.0&AID=285394455">
</noscript>




<!-- Google Code for mappyconversion Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1013984767;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "EWxRCLKH7FoQ_9vA4wM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1013984767/?label=EWxRCLKH7FoQ_9vA4wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>



<!-- Facebook Conversion Code for loginsbaby -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6023007980085', {'value':'0.00','currency':'INR'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6023007980085&amp;cd[value]=0.00&amp;cd[currency]=INR&amp;noscript=1" /></noscript>




     
<?php print_footer(); ?>