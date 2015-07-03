<?php print_header(); ?>
      <div style="margin-bottom: 10px;" >      
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3>My Credits<hr></h3>

          </div>

        </div>
        
          <div class="col-md-3">
            <?php if (isset($your_ref)) {
              echo "Credit from your friend: ".$your_ref;
            } 
            ?>
          </div>
          <div class="col-md-3">
            <?php if (isset($f_ref)) {
              foreach ($f_ref as $ref) {
                  
                  echo "Credits from your friend's referrals: ".$ref->total;

              }
            } 
            ?>
          </div>
        <?php if ($this->session->flashdata('result') != ''){?>
              <div class="alert alert-success" style="position:static; ">
                  <?php echo $this->session->flashdata('result');?> 
              </div>
          <?php } ?>
       <div class="table-responsive" style="margin-top: 50px;">
         <table class="table table-striped" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Get Credit From</th>
        </tr>
      </thead>
      <tbody>
      <?php if (isset($credits_helper)) {

          $i=1;
            foreach ($credits_helper as $credit_helper) {
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $credit_helper->fname; ?></td>
          <td><?php echo $credit_helper->email; ?></td>
        </tr>
        <?php 
        $i++; 
            }
        } 
        ?>
        
      </tbody>
    </table>
       </div>
      </div><!-- End book -->
            
<?php print_footer(); ?>