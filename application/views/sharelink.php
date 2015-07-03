<?php
print_header('sharelink');?>
<script>
// adding google map to the sharelink page
var map;
var uId = <?php echo $this->session->userdata('member_id')?$this->session->userdata('member_id'):0;?>;
var geocoder;
var data;
//initialize function Google Maps
function initialize() {
	var place = '<?php echo $this->uri->segment(1); ?>';
    geocoder = new google.maps.Geocoder();
    var mapOptions = {
        center: new google.maps.LatLng(21.125498, 81.914063),
        zoom: 4,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
    if (place != '')
    {
        //var map;
        var request = $.ajax({
            url: "http://mapta.gs/test/getSharedLocation",
            type: "POST",
            data: {data: "<?php echo $this->uri->segment(1); ?>"},
            dataType: "JSON"
        });                
        request.done(function (msg) {
            if (typeof msg.code == 'undefined') {
                track_marker = new google.maps.Marker({
                    position: new google.maps.LatLng(msg.lat, msg.lng),
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    icon: "http://i.imgur.com/CNJT5Iy.png"
                });
                $lot = msg.lat;
                $lon = msg.lng;
                					
                map.setCenter(new google.maps.LatLng($lot, $lon));
                map.setZoom(16);
                var c1 = "";
				<?php if ($this->session->userdata('logged_in') != TRUE): ?> 
                c1 = "disabled";
                <?php endif;?>
				var savelink = '';
                var request_1 = $.ajax({
                    url: "http://mapta.gs/actions/isMapTagSaved",
                    type: "POST",
                    data: {name: place},
                    dataType: "html"
                });
            	var value1='0';
            	var button_cl="btn_success";
                request_1.done(function (msg1) {
                	if(msg1==1) {
                		savelink = 'Liked';
                			value1='1';
                			button_cl= 'btn-danger';
                    	} else {
                    		savelink = 'Like';
                    		value1='0';
                    		button_cl= 'btn-success';                        	
                	}
                    document.getElementById("direction").innerHTML = '<a id="save_like" class="'+c1+' pull-right btn '+button_cl+' " style="margin-top:10px; margin-left: 10px;" value='+value1+' href="javascript:closeTo(\''+msg.name+'\')">'+savelink+'</a>&nbsp;<div id="direction"class="item pull-right "><a target="_blank" href="https://www.google.com/maps/dir//' + msg.lat + ',' + msg.lng + '/@' + msg.lat + ',' + msg.lng + ',14z?hl=en"><img style="width: 28px;" src="http://mapta.gs/assets/images/direction.png"> </a><span class="cap">Direction</span></div>';                    	
                });
                
                document.getElementById("maptag_name").innerHTML= msg.name;
                document.getElementById("maptag_address").innerHTML=msg.adderss+" "+msg.address1+" "+msg.city+" "+msg.state+" "+msg.zip+'<br><a href="tel:' + msg.phone + '">' + msg.phone + '</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.' + msg.website + '" target="_blank">' + msg.website + '</a>';
                document.getElementById("share-buttons").innerHTML = '<div class="item"> <a target="_blank" onclick="return popitup(https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/'+msg.name+')" href="https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/'+msg.name+'"><img alt="Facebook" src="http://mapta.gs/assets/images/share/facebook.png"></a><span class="cap"></span></div> <div class="item"><a target="_blank" onclick="return popitup(http://twitter.com/share?url=http://mapta.gs/'+msg.name+'&amp;text=Join the addressrevolution and never write an address&amp;hashtags=addressrevolution)" href="http://twitter.com/share?url=http://mapta.gs/'+msg.name+'&amp;text=Join the addressrevolution and never write an address&amp;hashtags=addressrevolution"><img alt="Twitter" src="http://mapta.gs/assets/images/share/twitter.png"></a><span class="cap"></span></div><div class="item"><a target="_blank" onclick="return popitup(whatsapp://send?text=whatsapp://send?text=http://mapta.gs/'+msg.name+')" href="whatsapp://send?text=Hey%20Check%20this%20cool%20site%20which%20allows%20you%20to%20never%20write%20addresses%20ever%20http://mapta.gs/'+msg.name+'"><img alt="Watsapp" src="http://mapta.gs/assets/images/share/Whatsapp.png"></a><span class="cap"></span></div>  <div class="item" onclick="ClipBoard(\''+msg.name+'\')"><a href="#"><img alt="clipboard" src="http://mapta.gs/assets/images/share/Clipboard.png"></a><span class="cap"></span></div>';
				var image_text="";
				image_text = msg.img1?'<a href=http://mapta.gs/map_image/' + msg.img1 + ' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/' + msg.img1 + ' style="margin-right: 5px; width:95px"></a>':'';
				image_text += msg.img2?'<a href=http://mapta.gs/map_image/' + msg.img2 + ' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/' + msg.img2 + ' style="margin-right: 5px; width:95px"></a>':'';
				image_text += msg.img3?'<a href=http://mapta.gs/map_image/' + msg.img3 + ' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/' + msg.img3 + ' style="margin-right: 5px; width:95px"></a>':'';
				image_text += msg.img4?'<a href=http://mapta.gs/map_image/' + msg.img4 + ' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/' + msg.img4 + ' style="margin-right: 5px; width:95px"></a>':'';
				image_text += msg.img5?'<a href=http://mapta.gs/map_image/' + msg.img5 + ' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/' + msg.img5 + ' style="margin-right: 5px; width:95px"></a>':'';
				//document.getElementById("image_carsole").innerHTML = '<center>'+image_text+'</center>';
				inner_window = window.innerWidth;
                if(inner_window>=768) {              
                    var info = new google.maps.InfoWindow({
                        content: '<div class="cont hidden-xs"><div class="col-md-6 col-sm-6 col-lg-6" style="margin:0;padding:8px;"><div class="well" style="margin-bottom:0"> <b>' + msg.name + '</b><br/>' + msg.adderss + ', ' + msg.address1 + ' <br>' + msg.city + ' ' + msg.zip + ' ' + msg.state + '</div><br/><a href="tel:' + msg.phone + '">' + msg.phone + '</a><br><a href="http://www.' + msg.website + '" target="_blank">' + msg.website + '</a><br><div id="share-buttons"><div class="item"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/' + msg.name + '" onclick="return popitup(https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/' + msg.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/facebook.png" alt="Facebook"/></a><span class="cap"></span></div> <div class="item"><a href="http://twitter.com/share?url=http://mapta.gs/' + msg.name + '&text=Join the addressrevolution and never write an address&hashtags=addressrevolution" onclick="return popitup(http://twitter.com/share?url=http://mapta.gs/' + msg.name + '&text=Join the addressrevolution and never write an address&hashtags=addressrevolution)" target="_blank"><img src="http://mapta.gs/assets/images/share/twitter.png" alt="Twitter"/></a><span class="cap"></span></div>  <div class="item"><a href="https://plus.google.com/share?url=http://mapta.gs/' + msg.name + '" onclick="return popitup(https://plus.google.com/share?url=http://mapta.gs/' + msg.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/google.png" alt="Google"/></a><span class="cap"></span></div>   <div class="item" onclick="ClipBoard(\''+msg.name+'\')"><a href="#"><img alt="clipboard" src="http://mapta.gs/assets/images/share/Clipboard.png"></a><span class="cap"></span></div>  <div class="item"><a href="https://www.google.com/maps/dir//' + msg.lat + ',' + msg.lng + '/@' + msg.lat + ',' + msg.lng + ',14z?hl=en" target="_blank"><img src="http://mapta.gs/assets/images/direction.png" style="width: 28px;"> </a><span class="cap">Direction</span></div></div></div><div class="col-md-6 col-sm-6 col-lg-6" style="margin-top:15px;"> ' + image_text + '<br> <a id="save_like1" class="'+c1+' btn  btn-success wss_save" href="javascript:closeTo(\'' + msg.name + '\');">Save Maptag</a><br><span class="log"></span></div><div class="col-md-12" style="margin:0;padding:8px">' + msg.description + '</div></div>',
                    });

                	setTimeout(function () {
                    info.open(map, track_marker);
                }, 1000);

                google.maps.event.addListener(track_marker, 'click', function () {
                    info.open(map, this);
                });
                
                google.maps.event.addDomListener(window, 'resize', function () {
                    info.open(map, track_marker);
                    //console.log('info');
                });
                }
            }
        });
    }
    

}
function closeTo(maptag) {
    var name;
    if (maptag === null) {
        name = "<?php echo $this->uri->segment(1) ?>";
    }
    else {
        name = maptag;
    }
    value = document.getElementById("save_like").innerHTML;
	ajax_call_function ='';
    if(value=='Like') {
    	ajax_call_function = "http://mapta.gs/actions/save_maptag";
    } else {
    	ajax_call_function = "http://mapta.gs/actions/remove_maptag";
        }
    var request_1 = $.ajax({
        url: ajax_call_function,
        type: "POST",
        data: {name: name},
        dataType: "html"
    });
	
    request_1.done(function (msg) {
    	toastr.success (msg);
    	if(value=='Like') {
    		document.getElementById("save_like").innerHTML='Liked';
    		document.getElementById("save_like").classList.remove("btn-success");
    		document.getElementById("save_like").className+=' btn-danger';
        	} else 
        	{
        		document.getElementById("save_like").innerHTML='Like';
        		document.getElementById("save_like").classList.remove("btn-danger");
        		document.getElementById("save_like").className+=' btn-success';
            		
        	}
    });
}
function ClipBoard(maptag)
{
	textToClipboard = "http://mapta.gs/"+maptag
	 if (window.clipboardData) { // Internet Explorer
         window.clipboardData.setData ("Text", textToClipboard);
     }
     else {
             // create a temporary element for the execCommand method
         var forExecElement = CreateElementForExecCommand (textToClipboard);

                 /* Select the contents of the element 
                     (the execCommand for 'copy' method works on the selection) */
         SelectContent (forExecElement);

         var supported = true;

             // UniversalXPConnect privilege is required for clipboard access in Firefox
         try {
             if (window.netscape && netscape.security) {
                 netscape.security.PrivilegeManager.enablePrivilege ("UniversalXPConnect");
             }

                 // Copy the selected content to the clipboard
                 // Works in Firefox and in Safari before version 5
             success = document.execCommand ("copy", false, null);
         }
         catch (e) {
             success = false;
         }
         
             // remove the temporary element
         document.body.removeChild (forExecElement);
     }

     if (success) {
    	 toastr.success ("Copied to clipboard");
     }
     else {
    	 toastr.error ("Your browser doesn't allow clipboard access!");
     }
}
function CreateElementForExecCommand (textToClipboard) {
    var forExecElement = document.createElement ("div");
        // place outside the visible area
    forExecElement.style.position = "absolute";
    forExecElement.style.left = "-10000px";
    forExecElement.style.top = "-10000px";
        // write the necessary text into the element and append to the document
    forExecElement.textContent = textToClipboard;
    document.body.appendChild (forExecElement);
        // the contentEditable mode is necessary for the  execCommand method in Firefox
    forExecElement.contentEditable = true;

    return forExecElement;
}

function SelectContent (element) {
        // first create a range
    var rangeToSelect = document.createRange ();
    rangeToSelect.selectNodeContents (element);

        // select the contents
    var selection = window.getSelection ();
    selection.removeAllRanges ();
    selection.addRange (rangeToSelect);
}

google.maps.event.addDomListener(window, 'load', initialize);
// loading google map to the map-canvas
</script>
<div id="slides">
 <div id="map-canvas" style="position: fixed;"></div> 
</div><!-- End background slider -->
<nav class="visible-xs">
<div class="row">
        <div id="tog" class="footer-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
			<div style="display: none;"><center><i id="i1" class="glyphicon glyphicon-chevron-up"></center></i></div>
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12"><h4><span id="maptag_name"></span></h4></div>
		    		<div class="col-xs-12"><i id="maptag_address"></i></div>
		    	</div>
			</div>
		</div>
    	<div class="col-xs-12">
			<div id="share-buttons" class="col-xs-6 "style="margin-top: 10px;padding-right:0px;padding-left:0px;"></div>
			<div id="direction" class="col-xs-6" style="padding-left:0px; padding-right:0px;"></div>
		</div>
					
</div>
<div id="bs-example-navbar-collapse-2" class="collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
			<div class="col-xs-12" id="image_carsole">
			</div>
</div>
</nav>
 <nav class="hidden-xs">
    <ul class="menu">
      <li><a href="<?php echo base_url()?>site/cpright" id="modal-rooms-open">TERMS</a></li>
      <li><a href="<?php echo base_url()?>site/howitswork" id="modal-rooms-open">HOW IT WORKS</a></li>
      <li><a href="<?php echo base_url()?>site/faq" id="modal-rooms-open">Questions</a></li>
      <li><a href="<?php echo base_url()?>site/contactus" id="modal-contacts-open">Contact us</a></li>
    </ul>
    <ul id="contact_follow">
      <li><a href="https://www.facebook.com/maptags" target="_BLANK"><span class="icon-facebook"></span></a></li>
      <li><a href="https://twitter.com/_Maptags" target="_BLANK"><span class="icon-twitter"></span></a></li>
      <li><a href="https://plus.google.com/u/1/b/108089825673566572321/" rel="publisher" target="_BLANK"><span class="icon-googleplus"></span></a></li>
      <li><a href="https://www.youtube.com/channel/UCehQFQGz2jhmMYHxIC986ow/videos" target="_BLANK"><span class="icon-youtube"></span></a></li>
    </ul>
</nav>
</div>
	</div>
</div>
</body>
</html>