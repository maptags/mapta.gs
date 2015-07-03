  <?php print_header(); ?>
        <?php  
          if (isset($track_codes_edit)) {
            foreach ($track_codes_edit as $track_code_edit) {
              $track_code = $track_code_edit->name;
              $address = $track_code_edit->adderss;
              $address1 = $track_code_edit->address1;
              $city = $track_code_edit->city;
              $state = $track_code_edit->state;
              $zip = $track_code_edit->zip;
              $phone = $track_code_edit->phone;
              $website = $track_code_edit->website;
              $description = $track_code_edit->description;
              $image1 = $track_code_edit->img1;
              $image2 = $track_code_edit->img2;
              $image3 = $track_code_edit->img3;
              $image4 = $track_code_edit->img4;
              $image5 = $track_code_edit->img5;
              $id = $track_code_edit->id;
            }
          }
        ?>
        <script>
        $(function() {
          $("#update-file1").fileinput({
              uploadUrl: "<?php echo base_url() ?>actions/track_code_action/update_images/1/<?php echo $id ?>",
              maxFileCount: 1,
              overwriteInitial: false,
              allowedFileTypes: ["image"],
              initialPreview: [
                                '<img src="<?php echo base_url() ?>map_image/<?php echo $image1 ?>" class="file-preview-image">',
                              ],
              initialPreviewConfig: [
                                      {caption: "<?php echo $image1 ?>", width: "120px", url:"/site/file-delete", key:1},
                                    ],              
          });
          $("#update-file2").fileinput({
              uploadUrl: "<?php echo base_url() ?>actions/track_code_action/update_images/2/<?php echo $id ?>",
              maxFileCount: 1,
              overwriteInitial: false,
              allowedFileTypes: ["image"],
              initialPreview: [
                                '<img src="<?php echo base_url() ?>map_image/<?php echo $image2 ?>" class="file-preview-image">',
                              ],
              initialPreviewConfig: [
                                      {caption: "<?php echo $image2 ?>", width: "120px", url:"/site/file-delete", key:1},
                                    ],              
          });
          $("#update-file3").fileinput({
              uploadUrl: "<?php echo base_url() ?>actions/track_code_action/update_images/3/<?php echo $id ?>",
              maxFileCount: 1,
              overwriteInitial: false,
              allowedFileTypes: ["image"],
              initialPreview: [
                                '<img src="<?php echo base_url() ?>map_image/<?php echo $image3 ?>" class="file-preview-image">',
                              ],
              initialPreviewConfig: [
                                      {caption: "<?php echo $image3 ?>", width: "120px", url:"/site/file-delete", key:1},
                                    ],              
          });
          $("#update-file4").fileinput({
              uploadUrl: "<?php echo base_url() ?>actions/track_code_action/update_images/4/<?php echo $id ?>",
              maxFileCount: 1,
              overwriteInitial: false,
              allowedFileTypes: ["image"],
              initialPreview: [
                                '<img src="<?php echo base_url() ?>map_image/<?php echo $image4 ?>" class="file-preview-image">',
                              ],
              initialPreviewConfig: [
                                      {caption: "<?php echo $image4 ?>", width: "120px", url:"/site/file-delete", key:1},
                                    ],              
          });
          $("#update-file5").fileinput({
              uploadUrl: "<?php echo base_url() ?>actions/track_code_action/update_images/5/<?php echo $id ?>",
              maxFileCount: 1,
              overwriteInitial: false,
              allowedFileTypes: ["image"],
              initialPreview: [
                                '<img src="<?php echo base_url() ?>map_image/<?php echo $image5 ?>" class="file-preview-image">',
                              ],
              initialPreviewConfig: [
                                      {caption: "<?php echo $image5 ?>", width: "120px", url:"/site/file-delete", key:1},
                                    ],              
          });
          $("[rel='tooltip']").tooltip();    
          $('.thumbnail').hover(
              function(){
                  $(this).find('.caption').slideDown(250); //.fadeIn(250)
              },
              function(){
                  $(this).find('.caption').slideUp(250); //.fadeOut(205)
              }
          );
          $('.save').click(function() {
              location.reload();
          }); 
          });
</script>
      <div style="margin-bottom: 45px;" >      
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3 style="margin:0;font-size:22px">Edit Track Code ( <?php echo $track_code ?> )<hr></h3>
            
           <?php if ($this->session->flashdata('result') != ''){?>
              <div class="alert alert-success" style="position:static; ">
                  <?php echo $this->session->flashdata('result');?> 
              </div>
          <?php } ?>
          </div>
        </div>
       
      <form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>actions/track_code_action/edit_done">
        
        <div class="form-group">
          <label for="address" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-8">
            <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo $address ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="address1" class="col-sm-2 control-label">Secondary Address</label>
          <div class="col-sm-8">
            <input type="text" name="address1" class="form-control" id="address1" placeholder="Address1" value="<?php echo $address1 ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-sm-2 control-label">City</label>
          <div class="col-sm-8">
            <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $city ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="state" class="col-sm-2 control-label">State</label>
          <div class="col-sm-8">
            <input type="text" name="state" class="form-control" id="state" placeholder="Address1" value="<?php echo $state ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">Phone</label>
          <div class="col-sm-8">
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo $phone ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="zip" class="col-sm-2 control-label">Zip</label>
          <div class="col-sm-8">
            <input type="text" name="zip" class="form-control" id="zip" placeholder="Zip Code" value="<?php echo $zip ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="website" class="col-sm-2 control-label">Website</label>
          <div class="col-sm-8">
            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?php echo $website ?>">
          </div>
        </div>
         <div class="form-group">
          <label for="description" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-8">
            <textarea name="description"  class="form-control" id="description"><?php echo  $description;?></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          </div>
        </div>
        <div class="form-group">
        <label for="description" class="col-sm-2 control-label sr-only">Description</label>
            <?php if(!empty($image1)):?>
                    <div class="col-md-3">            
                        <div class="thumbnail">
                            <div class="caption">
                                <h4><?php echo $track_code ?></h4>
                                <p><?php echo $description ?></p>
                                <p><a href="#img1" data-toggle="modal" data-target="#img1" class="label label-default" rel="tooltip" title="Edit">Edit</a>
                                <a href="" class="label label-danger" rel="tooltip" title="Delete">Delete</a></p>
                            </div>
                            <img src="<?php echo base_url() ?>map_image/<?php echo $image1 ?>" alt="<?php echo $image1 ?>">
                        </div>
                  </div>
            <?php endif; ?> 
            <?php if(!empty($image2)):?>     
                    <div class="col-md-3">            
                        <div class="thumbnail">
                            <div class="caption">
                                <h4><?php echo $track_code ?></h4>
                                <p><?php echo $description ?></p>
                                <p><a href="#img2" data-toggle="modal" data-target="#img2" class="label label-default" rel="tooltip" title="Edit">Edit</a>
                                <a href="" class="label label-danger" rel="tooltip" title="Delete">Delete</a></p>
                            </div>
                            <img src="<?php echo base_url() ?>map_image/<?php echo $image2 ?>" alt="<?php echo $image2 ?>">
                        </div>
                  </div>
            <?php endif; ?>       
            <?php if(!empty($image3)):?>      
                    <div class="col-md-3">            
                        <div class="thumbnail">
                            <div class="caption">
                                <h4><?php echo $track_code ?></h4>
                                <p><?php echo $description ?></p>
                                <p><a href="#img3" data-toggle="modal" data-target="#img3" class="label label-default" rel="tooltip" title="Edit">Edit</a>
                                <a href="" class="label label-danger" rel="tooltip" title="Delete">Delete</a></p>
                            </div>
                            <img src="<?php echo base_url() ?>map_image/<?php echo $image3 ?>" alt="<?php echo $image3 ?>">
                        </div>
                  </div>
              <?php endif; ?> 
              <?php if(!empty($image4)):?>    
                    <div class="col-md-3">            
                        <div class="thumbnail">
                            <div class="caption">
                                <h4><?php echo $track_code ?></h4>
                                <p><?php echo $description ?></p>
                                <p><a href="#img4" data-toggle="modal" data-target="#img4" class="label label-default" rel="tooltip" title="Edit">Edit</a>
                                <a href="" class="label label-danger" rel="tooltip" title="Delete">Delete</a></p>
                            </div>
                            <img src="<?php echo base_url() ?>map_image/<?php echo $image4 ?>" alt="<?php echo $image4 ?>">
                        </div>
                  </div>
              <?php endif; ?>     
              <?php if(!empty($image5)):?>    
                   <div class="col-md-3">            
                        <div class="thumbnail">
                            <div class="caption">
                                <h4><?php echo $track_code ?></h4>
                                <p><?php echo $description ?></p>
                                <p><a href="#img5" data-toggle="modal" data-target="#img5" class="label label-default" rel="tooltip" title="Edit">Edit</a>
                                <a href="" class="label label-danger" rel="tooltip" title="Delete">Delete</a></p>
                            </div>
                            <img src="<?php echo base_url() ?>map_image/<?php echo $image5 ?>" alt="<?php echo $image5 ?>">
                        </div>
                  </div>
              <?php endif; ?>                       
        </div>         
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8">
            <input type="submit" name="update" class="btn btn-success btn-block" value="Update">
          </div>
        </div>
      </form>
      </div><!-- End book -->
      <div class="modal fade" id="img1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $track_code ?></h4>
              </div>
              <div class="modal-body">
                <input id="update-file1" name="update-file1" type="file" class="file-loading">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="img2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $track_code ?></h4>
              </div>
              <div class="modal-body">
                <input id="update-file2" name="update-file2" type="file" class="file-loading">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
              </div>
            </div>
          </div>
        </div>  
        <div class="modal fade" id="img3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $track_code ?></h4>
              </div>
              <div class="modal-body">
                <input id="update-file3" name="update-file3" type="file" class="file-loading">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
              </div>
            </div>
          </div>
        </div> 
        <div class="modal fade" id="img4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $track_code ?></h4>
              </div>
              <div class="modal-body">
                <input id="update-file4" name="update-file4" type="file" class="file-loading">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="img5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $track_code ?></h4>
              </div>
              <div class="modal-body">
                <input id="update-file5" name="update-file5" type="file" class="file-loading">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
              </div>
            </div>
          </div>
        </div>                   
<?php print_footer();?>