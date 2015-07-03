<?php  print_header('home'); ?>
    <script type="text/javascript">
      function popitup(url) {
      newwindow=window.open(url,'Share Track code','height=550,width=600');
      if (window.focus) {newwindow.focus()}
      return false;
    }
    </script>
	  <input id="pac-input" class="form-control" class="controls" type="text" placeholder="Search for a Place or a Maptag" style="z-index: 5;position: absolute;top: 14px;left: 68px;">
      <button id="search"  class="btn  btn-success" style="z-index: 5;position: absolute;top: 14px;left: 368px;">
          <i style="vertical-align: super;" class="fa fa-search"></i>
        </button>
      
       <div id="control_buttons" style="z-index: 10;position:fixed; bottom:9%;right: 0;">
        <button id="loc_btt" onclick="geoFindMe()" data-toggle="tooltip" data-placement="left" title="Show my Location" class="tooltips widget-mylocation-button"> 
          <i class="fa fa-crosshairs fa-lg"></i>
        </button>
        <button id="sharecode" data-toggle="tooltip" data-placement="left" title="Maptag" class="tooltips widget-mylocation-button">
          <i class="fa fa-map-marker fa-lg"></i> 
        </button>
      </div> 
<div id="slides">
  <div id="map-canvas"></div> 
</div><!-- End background slider -->

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"jSv+k1aQeSI1/9", domain:"mapta.gs",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=jSv+k1aQeSI1/9" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  


<?php print_footer('home'); ?>