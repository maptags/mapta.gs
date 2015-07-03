<?php print_header(); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-select.css"  type="text/css"/>
<link rel="stylesheet" href="/assets/css/jquery-ui.css" />
<script src="<?php echo base_url() ?>assets/js/jquery-ui.js" ></script>
<script src="<?php echo base_url() ?>assets/js/jquery.json-2.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-select.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?php echo base_url() ?>assets/js/searchtag.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=372381829609912";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<!-- script to enable FB Like page -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


<!-- script to Track FB Likes -->
<script>

   window.fbAsyncInit = function() {

     FB.Event.subscribe('edge.create', function(targetUrl) {
<!--      _gaq.push(['_trackSocial', 'facebook', 'like', targetUrl]);-->
  ga('send', 'social', 'facebook', 'like', targetUrl);
    });
    FB.Event.subscribe('edge.remove', function(targetUrl) {
<!--      _gaq.push(['_trackSocial', 'facebook', 'unlike', targetUrl]); -->

  ga('send', 'social', 'facebook', 'unlike', targetUrl);
    });

  };

</script>
<style>
       .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        } 
</style>
<marquee class="marquee" style="border-radius: 7px;background: #428bca;padding: 4px;color: white; margin-top: 10px;">
	<ul class="list-inline">
	<?php if (isset($sold_tags)) {
		$now=time();
		$i=1;
		foreach ($sold_tags as $sold_tag) {
			$sold_on=strtotime($sold_tag->timestamp);
			$diff=$now-$sold_on;
	?>
		<li ><b><?php echo $sold_tag->maptag_name?></b><?php echo " has been sold ".floor($diff/(60*60*24))." days ago		"; ?></li>
		<?php
        		$i++;
		}
       	}
        ?>
	</ul>
</marquee>
<div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h3>Request cool maptags<hr></h3>
          </div>
</div>
<div class="row">
				<div class="col-xs-8 col-lg-6" style="margin-top:20px ">
					<h5><label for="searchtag" class="col-lg-4">Search MapTag:</label></h5>
						<div class="input-group">
                        	<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input class="col-xs-12 col-lg-8 pull-left form-control " type="text" name="searchtag" id="searchtag" />
						</div>
						<a href="#trans" style="margin-top:1em; margin-bottom:10px;" class=" btn btn-warning interested" >Interested</a>
				</div>
</div>
 <div class="modal fade" id="trans" role="dialog">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
      				<h4 class="modal-title">Request Maptag?</h4>
      			</div>
      			<div class="modal-body">
      				Please login or register to continue
            	</div>
            	<div class="modal-footer">
            		<form class="form-horizontal">
	                    <div class="form-group">
							<div class="pull-right" style="padding-right: 10px;">
	                            <button class="btn btn-info modalLogin">Login</button>
	                        </div>
	                    </div>
	                </form>
            	</div>
      		</div>
      	</div>
      </div>
      
 <div class="row">
          <div class="col-md-4">
            <h4>Please post your eBay /OLX links here</h4>
          </div>
</div>
<!-- FB comments  -->
<div class="fb-comments" data-href="http://mapta.gs/maptags.html" data-width="100%" data-numposts="5" data-colorscheme="light"></div>



<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
    _atrk_opts = {atrk_acct: "jSv+k1aQeSI1/9", domain: "mapta.gs", dynamic: true};
    (function () {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=jSv+k1aQeSI1/9" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })
            (window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    //ga(‘set’, ‘ & uid’, {{USER_ID}});
    ga('create', 'UA-58667648-1', 'auto');
    ga('send', 'pageview');

</script>
<?php print_footer(); ?>