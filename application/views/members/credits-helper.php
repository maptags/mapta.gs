<?php print_header(); ?>
      <div style="margin-bottom: 10px;" >      
        <div class="row">
          <div class="col-md-8 col-md-offset-3">
            <h3>MY CREDITS - IN DETAIL<hr></h3>

          </div>

        </div>
        
          <div class="col-md-4">
            <?php if (isset($your_ref)) {
              echo "Credits from your friends : ".$your_ref;
            } 
            ?>
          </div>
          <div class="col-md-4">
            <?php if (isset($f_ref)) {
              foreach ($f_ref as $ref) {
                  
                  echo "Credits from your friends referrals: ".$ref->total_cre . "/5 = ".round( $ref->total_cre/5 );

              }
            } 
            ?>
          </div>
          <div class="col-md-4">
            <?php if (isset($count_total)) {
              echo "Total Credits :". $count_total;
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
          <th>Full Name</th>
          <th>Friends Email</th>
          <th>Friend's Referrals</th>
          <th>Date Joined</th>
        </tr>
      </thead>
      <tbody>
      <?php if (isset($credits_helper)) {

          $i=1;
            foreach ($credits_helper as $credit_helper) {
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $credit_helper->fname; ?> <?php echo $credit_helper->lname; ?></td>
          <td><?php echo $credit_helper->email; ?></td>
          <td>
            <?php  
              $current_credits = $this->db->query("SELECT * FROM user_credits where user_id =$credit_helper->current_id")->result();
              foreach($current_credits as $current_credits){
                echo $current_credits->credit_earn;
              }
            ?>
          </td>
          <td><?php echo date("d-m-Y", strtotime($credit_helper->earn_date)); ?></td>
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