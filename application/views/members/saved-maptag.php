<?php print_header(); ?>
<style type="text/css">
  .action a{
   visibility:  hidden;
  }
  .action:hover a{
    visibility:  visible;
  }

</style>
<script type="text/javascript">
  $(function () {
     $('[data-toggle="tooltip"]').tooltip();
  });
</script>
      <div style="margin-bottom: 45px;" >      
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3>My Favourites<hr></h3>
            
           <?php if ($this->session->flashdata('result') != ''){?>
              <div class="alert alert-success" style="position:static; ">
                  <?php echo $this->session->flashdata('result');?> 
              </div>
          <?php } ?>
          </div>
        </div>
      
       <div class="table-responsive">
         <table class="table table-striped" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Code</th>
          <th>Type</th>
          <th>Added on</th>
          <th>Expire on</th>
          
        </tr>
      </thead>
      <tbody>
      <?php if (isset($track_codes)) {

        $i=1;
            foreach ($track_codes as $track_code) {
              
      ?>
        <tr style="cursor: pointer" onclick="window.location.href='<?php echo base_url().$track_code->name;?>'">
          <td><?php echo $i; ?></td>
          <td><?php echo $track_code->name; ?></td>
          
          <?php if(strlen($track_code->name)>1 && strlen($track_code->name)<=6){ ?>
             <td>Special</td>
             <?php }else if(strlen($track_code->name)>6 && strlen($track_code->name)<=12){ ?>
          <td>Pemium</td>
          <?php }else{ ?>
           <td>Free</td>
           <?php } ?>
          <td><?php echo date("d-m-Y", strtotime($track_code->added_date)); ?></td>
          <?php if(strlen($track_code->name)>1 && strlen($track_code->name)<=6){ ?>
             <td><?php echo date("d-m-Y", strtotime($track_code->expire_in)); ?></td>
             <?php }else if(strlen($track_code->name)>6 && strlen($track_code->name)<=12){ ?>
          <td><?php echo date("d-m-Y", strtotime($track_code->expire_in)); ?></td>
          <?php }else{ ?>
           <td>Never Expire</td>
           <?php } ?>
          
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