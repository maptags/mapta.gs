var map;
var share_mkr;
var info;
var dialog;
var dialog2;
var placeName;
var placeLat;
var placeLng;
var track_marker;
var loc_marker

function geoFindMe() {

  function success(position) {

    var latitude  = position.coords.latitude;

    var longitude = position.coords.longitude;

    loc_marker = new google.maps.Marker({

      position: new google.maps.LatLng(latitude, longitude),

      map: map,

      title: "create Maptag",

      animation: google.maps.Animation.DROP,

      icon: "http://i.imgur.com/qmvvCrR.png",
      draggable: true,
    });

    var infowindow = new google.maps.InfoWindow({

      content: "click here to Create Maptag",

      maxWidth: 100,

    });



    setTimeout(function (){

      infowindow.open(map, loc_marker);

    }, 1000);

    google.maps.event.addListener(loc_marker, 'dragstart', function() {

      infowindow.close(); 

    });



    google.maps.event.addListener(loc_marker, 'dragend', function() {

      infowindow.open(map, loc_marker);

    });



    google.maps.event.addListener(loc_marker, 'click', function() {



      if(uId == 0){

        var err = bootbox.dialog({

          message: "Please login or register to continue",

          title: "Maptag ?",

          buttons : {

            success: {

              label: "Close",

              className: "btn-default",

              callback: function() {

                err.modal("hide");

              }

            },

            "Login" : {

              className: "btn-primary",

              callback: function() {

                window.location.href="http://mapta.gs/user/login";

              }

            }

          }

        });

        return false;

      }
      placeLat = loc_marker.getPosition().lat();

      placeLng = loc_marker.getPosition().lng();
      codeLatLng(placeLat, placeLng);
      $('#share_maptag').modal('toggle');
      console.log('hp');

    }); 

    map.setCenter(new google.maps.LatLng(loc_marker.getPosition().lat(), loc_marker.getPosition().lng()));

    map.setZoom(13);

  };

  function error() {

   toastr.error("Unable to retrieve your location");

 };

 toastr.info("Locating…");
 navigator.geolocation.getCurrentPosition(success, error);

}
function sharecodeMarker(){
 cleanMap();
 if(uId == 0){

  var err = bootbox.dialog({

    message: "Please login or register to continue",

    title: "Create Maptag ?",

    buttons : {

      success: {

        label: "Close",

        className: "btn-default",

        callback: function() {

          err.modal("hide");

        }

      },

      "Login" : {

        className: "btn-primary",

        callback: function() {

          window.location.href="http://mapta.gs/user/login";

        }

      }

    }

  });

  return false;

}


share_mkr = new google.maps.Marker({

  position: new google.maps.LatLng(map.getCenter().lat(), map.getCenter().lng()),

  map: map,

  draggable: true,

  animation: google.maps.Animation.DROP,

  icon: "http://i.imgur.com/qmvvCrR.png"

}); 



var infowindow = new google.maps.InfoWindow({

  content: "click here to get Maptag",

  maxWidth: 100,

});

setTimeout(function (){

  infowindow.open(map, share_mkr);

}, 1000)
google.maps.event.addListener(share_mkr, 'dragstart', function() {

  infowindow.close(); 

});
google.maps.event.addListener(share_mkr, 'dragend', function() {

  infowindow.open(map, share_mkr);

});
google.maps.event.addListener(share_mkr, 'click', function() { 
  placeLat = share_mkr.getPosition().lat();
  placeLng = share_mkr.getPosition().lng();
  codeLatLng(placeLat, placeLng);
  $('#share_maptag').modal('show');

  console.log('ho');

});  
}
var urlTrack = function(url){

  if(url != "")

    trackCodeSearch(url);

}
var trackCodeSearch = function ($code){

  cleanMap();
   //var map;
   var request = $.ajax({

    url: "http://mapchanges.mapta.gs/test/getSharedLocation",

    type: "POST",

    data: {data : $code },

    dataType: "JSON"

  });

   request.done(function( msg ) {

    if(typeof msg.code == 'undefined'){

     cleanMap();

     track_marker = new google.maps.Marker({

      position: new google.maps.LatLng(msg.lat, msg.lng),

      map: map,

      draggable: false,

      animation: google.maps.Animation.DROP,

      icon: "http://i.imgur.com/CNJT5Iy.png"

    }); 

     $lot = msg.lat;
     $lon = msg.lng;

     map.setCenter(new google.maps.LatLng($lot,$lon));
     map.setZoom(16);

     var image ='';


     if (msg.img1===null) {



      image= '';

    }

    else{

      image= '<a href=http://mapta.gs/map_image/'+msg.img1+' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/'+msg.img1+' style="margin-right: 5px; width:95px"></a>';
      image += '<a href=http://mapta.gs/map_image/'+msg.img2+' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/'+msg.img1+' style="margin-right: 5px; width:95px;display: none;"></a>';
      image += '<a href=http://mapta.gs/map_image/'+msg.img3+' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/'+msg.img1+' style="margin-right: 5px; width:95pxl;display: none;"></a>';
      image += '<a href=http://mapta.gs/map_image/'+msg.img4+' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/'+msg.img1+' style="margin-right: 5px; width:95pxl;display: none;"></a>';
      image += '<a href=http://mapta.gs/map_image/'+msg.img5+' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/'+msg.img1+' style="margin-right: 5px; width:95pxl;display: none;"></a>';

    }

    if (msg.name===null) {

      name = '';

    }

    else{

      name = msg.name;

    }

    if (msg.website===null) {

      website = '';

    }

    else{

      website = msg.website;

    }

    if (msg.zip===null) {

      zip = '';

    }

    else{

      zip = msg.zip;

    }

    if (msg.city===null) {

      city = '';

    }

    else{

      city = msg.city;

    }

    if (msg.state===null) {

      state = '';

    }

    else{

      state = msg.state;

    }

    if (msg.phone===null) {

      phone = '';

    }

    else{

      phone = msg.phone;

    }

    if (msg.adderss===null) {

      adderss = '';

    }

    else{

      adderss = msg.adderss;

    }

    if (msg.address1===null) {

      address1 = '';

    }

    else{

      address1 = msg.address1;

    }

    if (msg.description===null) {

      description = '';

    }

    else{

      description = msg.description;

    }

    var info = new google.maps.InfoWindow({

      content: '<div class="cont"><div class="col-md-6 col-sm-6 col-lg-6" style="margin:0;padding:8px;"><div class="well" style="margin-bottom:0"> <b>'+name+'</b><br/>'+adderss+', '+address1+' <br>'+city+' '+zip+' '+state+'</div><br/><a href="tel:'+phone+'">'+phone+'</a><br><a href="http://www.'+website+'" target="_blank">'+website+'</a><br><div id="share-buttons"><div class="item"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/'+msg.name+'" onclick="return popitup(https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/'+msg.name+')" target="_blank"><img src="http://mapta.gs/assets/images/share/facebook.png" alt="Facebook"/></a><span class="cap"></span></div> <div class="item"><a href="http://twitter.com/share?url=http://mapta.gs/'+msg.name+'&text=Join the addressrevolution and never write an address&hashtags=addressrevolution" onclick="return popitup(http://twitter.com/share?url=http://mapta.gs/'+msg.name+'&text=Join the addressrevolution and never write an address&hashtags=addressrevolution)" target="_blank"><img src="http://mapta.gs/assets/images/share/twitter.png" alt="Twitter"/></a><span class="cap"></span></div>  <div class="item"><a href="https://plus.google.com/share?url=http://mapta.gs/'+msg.name+'" onclick="return popitup(https://plus.google.com/share?url=http://mapta.gs/'+msg.name+')" target="_blank"><img src="http://mapta.gs/assets/images/share/google.png" alt="Google"/></a><span class="cap"></span></div> <div class="item"><a href="https://www.google.com/maps/dir//'+msg.lat+','+msg.lng+'/@'+msg.lat+','+msg.lng+',14z?hl=en" target="_blank"><img src="http://mapta.gs/assets/images/direction.png" style="width: 28px;"> </a><span class="cap">Direction</span></div></div></div><div class="col-md-6 col-sm-6 col-lg-6" style="margin-top:15px;"> '+image+'<br> <a class="btn  btn-success wss_save" href="javascript:closeTo(\''+msg.name+'\');">Save Maptag</a><br><span class="log"></span></div><div class="col-md-12" style="margin:0;padding:8px">'+description+'</div></div>',

    });

setTimeout(function(){

  info.open(map, track_marker);

}, 1000);

google.maps.event.addListener(track_marker, 'click', function() {

  info.open(map, this);

});
google.maps.event.addDomListener(window, 'resize', function() {
  info.open(map, track_marker);
            //console.log('info');
          });

}

else{

  if(msg.code == 2){

    toastr.error("Share Code is Expired");

  }

  else{

    toastr.error("Maptag not found");

  }

}

});

}



var tracksearch = function(){

  $('#search').on('click', function(){

    var $track = $("#pac-input").val();

    trackCodeSearch($track);

  });

}



var cleanMap = function (){

  if(typeof share_mkr != 'undefined'){

    share_mkr.setMap(null);
      //console.log('map clean');
    }

    if(typeof loc_marker !=  'undefined'){

      loc_marker.setMap(null);
    //console.log('map clean');
  }
  
  if(typeof track_marker != 'undefined'){

    track_marker.setMap(null);
    console.log('map clean');
  }
}





$(function(){

  $("#sharecode").click(function(){

    sharecodeMarker();

  });

  tracksearch();

  urlTrack(reqURL);

  $('#example').DataTable({paging: false,searching: false});

  $('.spinner .btn:first-of-type').on('click', function() {

    if (parseInt($('.spinner input').val(), 10)==0) {

     $('.spinner input').val(1);

   };

   $('.spinner input').val( parseInt($('.spinner input').val(), 10));

 });

  $('.spinner .btn:last-of-type').on('click', function() {

    if (parseInt($('.spinner input').val(), 10)==0 ) {

     $('.spinner input').val(1);

   };

   $('.spinner input').val( parseInt($('.spinner input').val(), 10));

 });

});

$(function() {
    //geoFindMe();


    $(".fancybox").fancybox({

      openEffect  : 'none',

      closeEffect : 'none'

    });

    $( ".roosh" ).blur(function() {
      console.log($( ".roosh" ).val());
      var name = $( ".roosh" ).val();

      var request = $.ajax({

        url: "http://mapta.gs/test/check_track_code",

        type: "POST",

        data: { name : name },

        dataType: "html"

      });



      request.done(function( msg ) {

        $( ".log" ).html( msg );

      });



      request.fail(function( jqXHR, textStatus ) {

        alert( "Request failed: " + textStatus );

      });

    });

  });

