<?php print_header(); ?>

      <div style="margin-bottom: 45px;" >
      
       <form id="loginform" action="<?php echo site_url('user/forgot_password') ?>" method="post" class="form-horizontal roosh">
        <fieldset>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3 style="margin-top: auto">Forgot Password<hr></h3>
            <div class="row">
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
      
          </div>
        </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="email">E-mail</label>
            <div class="col-md-4 ">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="email" name="email" class="form-control" placeholder="user@example.com" type="text">
              </div>
              
            </div>
          </div>
          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4  control-label" for="submit"></label>
            <div class="col-md-4">
               <!-- <input name="savelogin" id="savelogin-0" value="" type="checkbox"> Remember Me  -->
               <div class="pull-right">
                 <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Clear</button>
                 <input type="submit" class="btn  btn-success" name="forgot" value="Reset Password">
               </div>
               
            </div>
          </div>

          </fieldset>
        </form>
      </div><!-- End book -->     
<?php print_footer(); ?>