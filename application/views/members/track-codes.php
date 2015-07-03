<?php print_header(); ?>
<link href="<?php echo base_url() ?>assets/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/assets/js/bootstrap-toggle.min.js"></script>
<script src="/assets/js/transfer.js"></script>
<style type="text/css">
  .action a{
   visibility:  hidden;
  }
  .action:hover a{
    visibility:  visible;
  }
    .table-hover tbody tr:hover td

    {

        background-color: Blue;

        }     
</style>
<script type="text/javascript">
  $(function () {
     $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<script type="text/javascript">
  $(function() {
    $('statustoggle').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
    $('.statustoggle').change(function() {
    	var paramname=$(this).attr("name");
    	var state=0;
        if($(this).prop('checked'))
            state=1;
        $.ajax({
	        url: "http://mapta.gs/actions/toggle",
	        type:"POST",
		    dataType: "JSON",
		    data: {
	        	param: paramname,
	        	state:state
	        	},
		    success:function(data) {
			    var status='Private';
			    if(state==1)
				    status='Public';
		    	toastr.success(paramname+' has been changed to '+status);
    		}
        });
    		
      });
  })
</script>
      <div style="margin-bottom: 45px;" >
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3>My MapTags<hr></h3>

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
          <th style="text-align: center;">Actions</th>
          <th style="text-align: center;">Share</th>
          <th style="text-align: center;">Status</th>
          <th style="text-align: center;">Transfer Tags</th>
        </tr>
      </thead>
      <tbody>
      <?php if (isset($track_codes)) {

        $i=1;
            foreach ($track_codes as $track_code) {

      ?>
        <tr style="cursor: pointer" >
          <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  ><?php echo $i; ?></td>
          <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  ><?php echo $track_code->name; ?></td>

          <?php if(strlen($track_code->name)>1 && strlen($track_code->name)<=6){ ?>
             <td>Special</td>
             <?php }else if(strlen($track_code->name)>6 && strlen($track_code->name)<=12){ ?>
          <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  >Premium</td>
          <?php }else{ ?>
           <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  >Free</td>
           <?php } ?>
          <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  ><?php echo date("d-m-Y", strtotime($track_code->added_date)); ?></td>
          <?php if(strlen($track_code->name)>1 && strlen($track_code->name)<=6){ ?>
             <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  ><?php echo date("d-m-Y", strtotime($track_code->expire_in)); ?></td>
             <?php }else if(strlen($track_code->name)>6 && strlen($track_code->name)<=12){ ?>
          <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  ><?php echo date("d-m-Y", strtotime($track_code->expire_in)); ?></td>
          <?php }else{ ?>
           <td onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  >Never Expire</td>
           <?php } ?>
          <td style="min-width: 112px;text-align: center;" onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  >
            <a href="<?php echo base_url() ?>actions/track_code_action/edit/<?php echo $track_code->id;?>"
         data-toggle="tooltip" data-placement="top" title="Edit this Maptag"><i class="fa fa-pencil-square-o fa-lg"></i></a>

            <a href="<?php echo base_url() ?>actions/track_code_action/delete/<?php echo $track_code->id;?>" onclick="return confirm('Are you sure you want to delete this Maptag?');"  data-toggle="tooltip" data-placement="top" title="Click to delete the Maptag"><i class="fa fa-times fa-lg"></i></a>
            <a href="<?php echo base_url() ?>actions/track_code_action/extend_date/<?php echo $track_code->id;?>" data-toggle="tooltip" data-placement="top" title="Extend this Maptag"><i class="fa fa-plus fa-lg"></i></a>
         </td>
          <td style="text-align: center;" onclick="window.location.href='<?php echo base_url().$track_code->name;?>'"  >
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() ?><?php echo $track_code->name;?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
              <a href="https://plus.google.com/share??url=<?php echo base_url() ?><?php echo $track_code->name;?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
              <a href="https://twitter.com/intent/tweet?text=<?php echo base_url() ?><?php echo $track_code->name;?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
          </td>
          <td>
			    <input class="statustoggle" data-toggle="toggle" type="checkbox" data-on="Public" data-off="Private" <?php if($track_code->status==1)echo checked?> name="<?php echo $track_code->name; ?>">
          </td>
          <td style="text-align: center;" >
          	<a href="#trans" class="btn btn-info transfer" name="<?php echo $track_code->id; ?>">Transfer</a>
          </td>
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
      
      <div class="modal fade" id="trans" role="dialog">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
      				<h4 class="modal-title">Transfer MapTag</h4>
      			</div>
      			<div class="modal-body">
      				<form class="form-horizontal">
	                    <div class="form-group">
	                        <label class="col-xs-3 control-label" style="padding-right:0px;">Email Id:</label>
	                        <div class="col-xs-5">
	                            <input type="email" class="form-control" id="email" />
	                        </div>
							<div class="pull-right" style="padding-right: 10px;">
	                            <button class="btn btn-info modalTransfer">Transfer</button>
	                        </div>
	                    </div>
	                </form>
            	</div>
      		</div>
      	</div>
      </div>
<?php print_footer(); ?>