  <?php print_header(); ?>
        <script src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places,drawing"></script> 
        <style type="text/css">
          .file-preview-image {
            height: 60px;
          }
        </style>
  <?php  
          if (isset($track_codes_edit)) {
            foreach ($track_codes_edit as $track_code_edit) {
              $track_code = $track_code_edit->name;
              $track_owner = $track_code_edit->user_id;
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
              $lat = $track_code_edit->lat;
              $long = $track_code_edit->lng;
            }
          }
        ?>

  
        <script>
        $(function() {
          $("#update-file").fileinput({
              uploadUrl: "<?php echo base_url() ?>actions/track_code_action/update_images/<?php echo $this->uri->segment(4);?>",
              maxFileCount: 20,  
              overwriteInitial: false,
              allowedFileTypes: ["image"],
              initialPreview: [
                                <?php if(!empty($image1)):?>    '<img src="<?php echo base_url() ?>map_image/<?php echo $image1 ?>" class="file-preview-image">',<?php endif; ?>
                                <?php if(!empty($image2)):?>    '<img src="<?php echo base_url() ?>map_image/<?php echo $image2 ?>" class="file-preview-image">' ,<?php endif; ?>
                                <?php if(!empty($image3)):?>    '<img src="<?php echo base_url() ?>map_image/<?php echo $image3 ?>" class="file-preview-image">' ,<?php endif; ?>
                                <?php if(!empty($image4)):?>    '<img src="<?php echo base_url() ?>map_image/<?php echo $image4 ?>" class="file-preview-image">' ,<?php endif; ?>
                                <?php if(!empty($image5)):?>    '<img src="<?php echo base_url() ?>map_image/<?php echo $image5 ?>" class="file-preview-image">' ,<?php endif; ?>
                              ],
              initialPreviewConfig: [
                                     <?php if(!empty($image1)):?>   {caption: "<?php echo $image1 ?>", width: "50px", url:"/site/file-delete", key:1} ,<?php endif; ?>
                                      <?php if(!empty($image2)):?>  {caption: "<?php echo $image2 ?>", width: "50px", url:"/site/file-delete", key:1} ,<?php endif; ?>
                                      <?php if(!empty($image3)):?>  {caption: "<?php echo $image3 ?>", width: "50px", url:"/site/file-delete", key:1} ,<?php endif; ?>
                                      <?php if(!empty($image4)):?>  {caption: "<?php echo $image4 ?>", width: "50px", url:"/site/file-delete", key:1} ,<?php endif; ?>
                                      <?php if(!empty($image5)):?>  {caption: "<?php echo $image5 ?>", width: "50px", url:"/site/file-delete", key:1} ,<?php endif; ?>
                                    ],             
          });
          });
</script>
      <div style="margin-bottom: 45px;margin-top: 15px;" >      
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <?php $member_id = $this->session->userdata('member_id');
                if($member_id !=$track_owner) { ?>
                <div class="alert alert-danger" style="position:static; ">
                  You are not owner of this Maptag
              </div>
                <?php
                }else{
          ?>
            <h3 style="margin:0;font-size:22px">Edit Maptag ( <?php echo $track_code ?> )<hr></h3>
            
           <?php if ($this->session->flashdata('result') != ''){?>
              <div class="alert alert-success" style="position:static; ">
                  <?php echo $this->session->flashdata('result');?> 
              </div>
          <?php } ?>
          </div>
        </div>
     <div class="col-md-8">   
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
            <input type="hidden" name="lat" class="form-control" id="lat" placeholder="Lat" value="<?php echo $lat ?>">
            <input type="hidden" name="lng" class="form-control" id="lng" placeholder="Lang" value="<?php echo $long ?>">
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
          <div class="col-sm-offset-2 col-sm-8">
            <input id="update-file" data-upload-async="false" name="files[]" type="file" multiple=true class="file-loading" >
          </div> 
        </div>  
               
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8" style="margin-bottom:45px">
            <input type="submit" name="update" class="btn btn-success" value="Update">
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-4 pull-right">  
          <div id="display_map" style="width:450px;height:350px; "></div> 
        </div>
        <script type="text/javascript">
      $(document).ready(function () {
      function initialize() {

      // Define the latitude and longitude positions
      var latitude = parseFloat("<?php echo $lat; ?>"); // Latitude get from above variable
      var longitude = parseFloat("<?php echo $long; ?>"); // Longitude from same
      var latlngPos = new google.maps.LatLng(latitude, longitude);

      // Set up options for the Google map
      var myOptions = {
      zoom: 13,
      center: latlngPos,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoomControlOptions: true,
      zoomControlOptions: {
      style: google.maps.ZoomControlStyle.LARGE
      }
      };
      // Define the map
      map = new google.maps.Map(document.getElementById("display_map"), myOptions);
        addMarker(latlngPos, 'Default Marker', map);
        
        google.maps.event.addListener(map, 'dragstart', function(event) {
        //infowindow.open(map,marker);
            addMarker(event.latlngPos, 'Click Generated Marker', map);
          
           var lat, lng, address;
                          
        });

         
      }
  function addMarker(latlng,title,map) {
    var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title,
            icon:"<?php echo base_url() ?>assets/img/map-red.png",
            draggable:true,
       animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(marker,'drag',function(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value= event.latLng.lng();
    });

    google.maps.event.addListener(marker,'dragend',function(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    //alert(marker.getPosition());
    });
     
  
}
google.maps.event.addDomListener(window, 'load', initialize);
});
</script>
        <?php } ?>
      </div><!-- End book -->   
<?php print_footer();?>