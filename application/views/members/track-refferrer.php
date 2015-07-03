<?php print_header(); ?>
<script type="text/javascript">
  function popitup(url) {
  newwindow=window.open(url,'Share Maptag','height=550,width=600');
  if (window.focus) {newwindow.focus()}
  return false;
}
</script>
<div style="margin-bottom: 10px;" >      
 <div class="container">
  <div class="resume">
    <header class="page-header">
      <h1 class="page-title">Refer and win credits</h1>
    </header>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading resume-heading">
            <div class="row">
            <?php 
              if(isset($track_reffererrs)){
                foreach ($track_reffererrs as $track_reffererr) {
                  $name = $track_reffererr->name; 
                } 
            ?>
              <div class="col-lg-12">
                <div class="col-xs-12 col-sm-4">
                  <div class="row">
                    <div class="col-xs-12 social-btns">
                      <p>Share this on social Media</p>
                      <div class="col-xs-3 col-md-1 col-lg-4 social-btn-holder">
                        <a href="https://plus.google.com/share?url=<?php echo base_url() ?><?php echo $name;?>" onclick="return popitup('https://plus.google.com/share?url=<?php echo base_url() ?><?php echo $name;?>')" class="btn btn-social btn-block btn-google">
                          <i class="fa fa-google"></i> </a>
                        </div>

                        <div class="col-xs-3 col-md-1 col-lg-4 social-btn-holder">
                          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()?><?php echo $name;?>" onclick="return popitup('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()?><?php echo $name;?>')" class="btn btn-social btn-block btn-facebook">
                            <i class="fa fa-facebook"></i> </a>
                          </div>

                          <div class="col-xs-3 col-md-1 col-lg-4 social-btn-holder">
                            <a href="https://twitter.com/intent/tweet?text=<?php echo base_url()?><?php echo $name;?>" onclick="return popitup('https://twitter.com/intent/tweet?text=<?php echo base_url()?><?php echo $name;?>')" class="btn btn-social btn-block btn-twitter">
                              <i class="fa fa-twitter"></i> </a>
                            </div>
                                </div>
                              </div>
                            </div>
                           <div class="col-sm-8 contact-form">
                            <form id="contact" method="post" action="<?php echo base_url()?>referrals/send_refferrer_link/" class="form" role="form">
                            <div class="row">
                            <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required autofocus />
                            </div>
                            </div>
                            <textarea class="form-control" id="email" name="email" placeholder="Email or List of emails seprated with commos" rows="5"></textarea>
                            <br />
                            <div class="row">
                            <div class="col-xs-12 col-md-12 form-group">
                            <input class="btn btn-primary pull-right" type="submit" name="send" value="Send invitation">
                            <input class="form-control" name="ref_name" type="hidden" value="<?php echo $name;?>" />
                            </form>
                            </div>
                        </div>
                        <?php } else{ ?>
                        <h3>Sorry You are not the one who owns this track code</h3>
                        <?php } ?>
                      </div>
                    </div>
            
            </div>

          </div>
        </div>

      </div>

    </div>
  </div><!-- End book -->
  <?php print_footer(); ?>