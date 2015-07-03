<?php print_header(); ?>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-select.css"  type="text/css"/>
   <script src="<?php echo base_url()?>assets/js/jquery.json-2.4.min.js"></script>
   <script src="<?php echo base_url()?>assets/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">

    	$(document).ready(function(){
    		$.validator.setDefaults({
    			submitHandler: function(form) {
    				$.ajax({
    					type: $(form).attr('method'),
    					url: $(form).attr('action'),
    					data: { 'val':$(".myfirstform").serializeJSON() }
    				}).done(function(data) {
    					$('.sent').html(data);
    					
    				});
    			}

    		});
    		$(".myfirstform").validate(
    			{rules:
    				{name:"required",
    				email:{required:true,email:true},
    				website:{required:false,url:true},
    				cate:"required",
    				msg:{required:true, maxlength:300,minlength:100
    				}},
    				errorClass:"error",
    				highlight: function(label) {
    					$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
    				},

    				success: function(label) {
    					label.addClass('valid').closest('.form-group').addClass('has-success');
    					
    				}
    			}
    			
    			);

    	});

    </script>

 <script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });

</script>
<style type="text/css">
	label.error{
		
		display: none !important; 
	}

label.valid{
		margin-left: 5px !important;
		color: green !important;
		margin-bottom: 0;
		display: block; 
	}
</style>
      <div style="margin-top: 45px;text-align: center;" >      
        <div class="container col-md-8">
        <div class="sent"></div>
      <form class="myfirstform" role="form" method="post" action="<?php echo base_url() ?>site/contact_us">
	<!--  
		<legend>Contact Form</legend>		-->
		<div class="form-group">
	        <label class="control-label sr-only">Name</label>
			<div class="controls">
			    <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" name="name" placeholder="Name">
				</div>
			</div>
		</div>
		
		
		<div class="form-group">
	        <label class="control-label sr-only">Email</label>
			<div class="controls">
			    <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="text" class="form-control" id="email" name="email" placeholder="Email">
				</div>
			</div>	
		</div>
		
		<div class="form-group ">
	        <label class="control-label sr-only">Website</label>
			<div class="controls">
			    <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
					<input type="text" class="form-control" id="lname" name="website" placeholder="website url">
				</div>
			</div>
		</div>
		
		<div class="form-group ">
	        <label class="control-label sr-only">Category</label>
			<div class="controls">
		 <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
					<select name="cate" class="form-control selectpicker  show-tick" > 
						<option value="Morning">Morning</option>
						<option value="Afternoon">Afternoon</option>
						<option value="Evening">Evening</option>
					</select>
					
				</div>
				</div>
		</div>
		
		<div class="form-group ">
	        <label class="control-label sr-only">Message</label>
			<div class="controls">
			    <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					<textarea name="msg" class="form-control " rows="4" cols="78" placeholder="Enter your message here"></textarea>

				</div>
			</div>
		</div>
		<div class="form-group ">
			<div class="controls">
			    <?php echo $recaptcha_html; ?>
			</div>
		</div>
		
		
	      <div class="controls" style="margin-left: 40%;">
		  
	       <input type="submit" id="mybtn"  class="btn btn-primary" value="Send Message">
	        
	      </div>
		</form>
		</div>
      </div><!-- End book -->

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"jSv+k1aQeSI1/9", domain:"mapta.gs",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=jSv+k1aQeSI1/9" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga(‘set’, ‘&uid’, {{USER_ID}}); 
  ga('create', 'UA-58667648-1', 'auto');
  ga('send', 'pageview');

</script>



            
<?php print_footer(); ?>