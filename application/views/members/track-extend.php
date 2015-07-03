  <?php print_header(); ?>
        <?php  
          if (isset($track_extends)) {
            foreach ($track_extends as $track_extend) {
              $track_code = $track_extend->name;
              $expire_in = $track_extend->expire_in;
              $id = $track_extend->id;
            }
          }
        ?>
      <div style="margin-bottom: 45px;" >      
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3>Extend Maptag<hr></h3>
            <p>1 credit = 2 years for premium Maptag </p>
           <?php if ($this->session->flashdata('result') != ''){?>
              <div class="alert alert-success" style="position:static; ">
                  <?php echo $this->session->flashdata('result');?> 
              </div>
          <?php } ?>
          </div>
        </div>
       
      <form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>actions/track_code_action/extend_done">
        <div class="form-group">
          <label for="t_code" class="col-sm-2 control-label">Extended Years </label>
          <div class="col-sm-8">
           <!-- <div class="input-group spinner"> -->
              <input type="number" name="year" class="form-control" value="1">
              <!-- <div class="input-group-btn-vertical">
                <button type="button" class="btn btn-default"><i class="fa fa-caret-up"></i></button>
                <button type="button" class="btn btn-default"><i class="fa fa-caret-down"></i></button>
              </div> -->

            <!-- </div> -->
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
           <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
           <input type="hidden" name="name" class="form-control" value="<?php echo $track_code; ?>">
           <input type="hidden" name="expiry" class="form-control" value="<?php echo $expire_in; ?>">
            <input type="submit" name="update" class="btn btn-success" value="Update">
          </div>
        </div>
      </form>
      </div><!-- End book -->   
<?php print_footer();?>