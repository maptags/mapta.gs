<?php print_header(); ?>

  <title>Maptags- My Credits</title>

<script type="text/javascript">
  $(function () {
     $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<style type="text/css">
  th,td{
    text-align: center;
  }
</style>
      <div style="margin-bottom: 45px;" >      
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3>My Credits<hr></h3>
          </div>
        </div>
        <?php if ($this->session->flashdata('result') != ''){?>
              <div class="alert alert-success" style="position:static; ">
                  <?php echo $this->session->flashdata('result');?> 
              </div>
          <?php } ?>
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
       <div class="table-responsive">
         <table class="table table-striped" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Credits Earned</th>
          <th>Credits Used</th>
          <th>Credits Left</th>
        </tr>
      </thead>
      <tbody>
      <?php if (isset($my_credits)) {

          $i=1;
            foreach ($my_credits as $my_credit) {
             
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $this->session->userdata('fname'); ?></td>
          <td> <?php if($my_credit->credit_earn > 0): ?>
            <a href="<?php echo base_url() ?>actions/credit_helper/<?php echo $my_credit->user_id ?>">
                <?php if (isset($count_total)) {
                  echo  $count_total;
                } 
                ?>
                
            </a>
            <?php else: ?> 
                <?php if (isset($count_total)) {
                  echo  $count_total;
                } 
                ?>
            <?php  endif;?>
          </td>
          <td><?php echo $my_credit->credit_used; ?></td>
          <td><?php echo $count_total - $my_credit->credit_used; ?></td>
        </tr>
        <?php 
        $i++; 
            }
        } 
        ?>
        
      </tbody>
    </table>
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-lg-offset-4">
      More Detail
    </div>
    </div>
       </div>
      </div><!-- End book -->
            
<?php print_footer(); ?>