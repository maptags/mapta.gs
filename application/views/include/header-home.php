<!DOCTYPE html>

<html>

    <head>



        <meta charset="utf-8">
        <meta name="alexaVerifyID" content="5H1TzN9QZFKXWbDKifmVj_63G6c"/>

        <meta name="description" content=" Maptags is the worlds easiest Address sharing platform, Maptags shortens your address to your favourite word so sharing your address is easy as sharing a word which takes away the pain of writing address forever. Maptags is integrated to Google Maps hence providing seamless driving directions which ensures you never lose your way ">
        <meta name="keywords" content="address , address label , address search , Maptags, Maptag, #addressrevolution , directions ,ecommerce , ecommerce sites , world map , zip codes">

        <title>Maptags- Imagine Never writing your address again</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/x-icon"/>
        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url() ?>assets/images/favicon.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url() ?>assets/images/favicon.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url() ?>assets/images/favicon.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url() ?>assets/images/favicon.png">

        <!-- CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/fileinput.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/fontello/css/fontello.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/fontello/css/animation.css" rel="stylesheet"> 
        <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>assets/css/font-awesome.min.css"/>
        <!-- Owl Carousel Assets -->
        <link href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/jquery.dataTables_themeroller.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet"/>
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url() ?>assets/js/fileinput.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js"></script>



        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script src="<?php echo base_url() ?>assets/js/bootbox.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/placesv2.js"></script>



        <style type="text/css">
            #map-canvas { 
                height: 780px; 
                width:100%;
            } 
            .label,.fa { 
                margin-right:5px; 
            }
            #login-nav input { 
                margin-bottom: 15px;
                margin-left: 0; 
            }
            .file-drop-zone-title {              
                font-size: 27px;
            }
        </style>
        <script src="<?php echo base_url() ?>assets/js/toastr.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script src="<?php echo base_url() ?>assets/js/bootbox.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/placesv2.js"></script>


        <script type="text/javascript">

            var uId = <?php
				if (($this->session->userdata('member_id'))) {
    			echo $this->session->userdata('member_id');
				} else {
    			echo 0;
				}
?>

            var map;
            var geocoder;
//            var google_marker;
//            var google_infowindow;
//           


            function showlocation() {
                // One-shot position request.
                navigator.geolocation.getCurrentPosition(callback);
            }

            function callback(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                document.getElementById('latitude').innerHTML = lat;
                document.getElementById('longitude').innerHTML = lon;
                //codeLatLng(lat, lon);
                var latLong = new google.maps.LatLng(lat, lon);
                var intialmarker = new google.maps.Marker({
                    position: latLong,
                });
                intialmarker.setMap(map);
                map.setZoom(15);
                map.setCenter(intialmarker.getPosition());

            }

            google.maps.event.addDomListener(window, 'load', initMap);
            //google.maps.event.addDomListener(window, 'resize', initMap);
            function initMap() {
                geocoder = new google.maps.Geocoder();
                var mapOptions = {
                    center: new google.maps.LatLng(21.125498, 81.914063),
                    zoom: 4,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                map = new google.maps.Map(document.getElementById("map-canvas"),
                        mapOptions);
                var input = (document.getElementById('pac-input'));
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);
                infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29),
                    animation: google.maps.Animation.DROP,
                    icon: "http://i.imgur.com/qmvvCrR.png",
                    draggable: true,
                });
                setTimeout(function () {
                    infowindow.setContent('<center>Click here to Create Maptag</center>');
                	infowindow.open(map, marker);
                    marker.setPosition(new google.maps.LatLng(map.getCenter().lat(), map.getCenter().lng()));
                    cleanMap();
                    marker.setVisible(true);

                }, 1000);
                
                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    infowindow.close();
                    marker.setVisible(false);
//                    data = setGooglePlace(autocomplete,map);
//                    google_marker = data[0];
//                    google_infowindow = data[1];
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        return;
                    }
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    cleanMap();
                    marker.setVisible(true);

                    infowindow.setContent('Click here to get Maptag');
                    infowindow.open(map, marker);
                });

                google.maps.event.addListener(marker, 'click', function () {

                    if (uId == 0) {
                        var err = bootbox.dialog({
                            message: "Please login or register to continue",
                            title: "Create Maptag ?",
                            buttons: {
                                success: {
                                    label: "Close",
                                    className: "btn-default",
                                    callback: function () {

                                        err.modal("hide");

                                    }

                                },
                                "Login": {
                                    className: "btn-primary",
                                    callback: function () {

                                        window.location.href = "http://mapta.gs/user/login";

                                    }

                                }

                            }

                        });
                        return false;
                    }

                    placeLat = marker.getPosition().lat();
                    placeLng = marker.getPosition().lng();
                    codeLatLng(placeLat, placeLng);

                    $('#share_maptag').modal('show');
                });

                google.maps.event.addListener(marker, 'dragstart', function () { //THEJAN 18-04-2015
                    var input = (document.getElementById('pac-input'));
                    input.value = "";


                });

                google.maps.event.addListener(marker, 'dragend', function () {

                    var input = (document.getElementById('pac-input'));
                    input.value = geocodePosition(marker.getPosition());

                });

                function geocodePosition(pos) {
                    geocoder.geocode({
                        latLng: pos
                    }, function (responses) {
                        if (responses && responses.length > 0) {
                            var address = responses[0].formatted_address;
                            //console.log(address);
                            return address;
                        } else {
                            return "null";
                        }
                    });
                }


                google.maps.event.addListener(map, 'click', function (event) {
                    infowindow.close();
                    marker.setVisible(false);
                    sharecodeMarker();
                });
            }

            var tracksearch = function () {

                $('#search').on('click', function () {

                    var $track = $("#pac-input").val();

                    trackCodeSearch($track);

                });

            };
            var reqURL = "<?php echo $this->uri->segment(1); ?>";
            if (navigator.geolocation) {
                //navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
            }
            function successFunction(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                codeLatLng(lat, lng);
            }

            function errorFunction() {
                alert("Geocoder failed");
            }
            function codeLatLng(lat, lng) {

                var latlng = new google.maps.LatLng(lat, lng);
                geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        //console.log(results);
                        if (results[1]) {

                            /* var indice=0;
                             for (var j=0; j<results.length; j++)
                             {
                             if (results[j].types[0]=='locality')
                             {
                             indice=j;
                             break;
                             }
                             }
                             //alert('The good number is: '+j);
                             //console.log(results[j]);
                             for (var i=0; i<results[j].address_components.length; i++)
                             {
                             if (results[j].address_components[i].types[0] == "locality") {
                             //this is the object you are looking for
                             city = results[j].address_components[i];
                             }
                             if (results[j].address_components[i].types[0] == "administrative_area_level_1") {
                             //this is the object you are looking for
                             region = results[j].address_components[i];
                             }
                             if (results[j].address_components[i].types[0] == "country") {
                             //this is the object you are looking for
                             country = results[j].address_components[i];
                             }
                             
                             }*/

                         /*   var address = results[0].address_components;
                            var zip;
                            console.log(address);
                            $('#city').val(address[1].long_name);
                            $('#state').val(address[3].long_name);
                            $('#address1').val(address[2].long_name);
                            zip = address[5].long_name;

                            $('#zip').val(zip);

                            //$('#zip').val(address[6].long_name); */

                              // code by prince
                             $('#address1').val("");
                             $('#zip').val("");
                             $('#state').val("");
                             $('#city').val("");
                             var addressComponents = {
                            	       "street_number": "",
                            	       "street_address": "",
                            	       "route": "",
                            	       "sublocality": "",
                            	       "sublocality_level_5": "",
                            	       "sublocality_level_4": "",
                            	       "sublocality_level_3": "",
                            	       "sublocality_level_2": "",
                            	       "sublocality_level_1": "",
                            	       "locality": "",
                            	       "administrative_area_level_2": "",
                            	       "administrative_area_level_1": "",
                            	       "country": "",
                            	       "postal_code": "",
                            	       "countrycode": ""
                            	   }
                             var address = results[0]["address_components"];
                             for(var i = 0, j = address.length; i<j; i++){
                                 var component = address[i]["types"][0];
                                 if(addressComponents.hasOwnProperty(component)){
                                         addressComponents[component] += addressComponents[component] ? (", " + address[i]["long_name"]) : address[i]["long_name"];
                                 }
                             }
                             console.log(addressComponents);
                             var customAddress = {
                                 "user_buildingname": "",
                                 "user_aptnum": "",
                                 "landmark": "",
                                 "sublocality": "",
                                 "locality": "",
                                 "state_country": "",
                                 "postal_code": "",
                                 "countrycode": "",
                                 "zp_v": 2
                             };
                             if(addressComponents["street_number"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["street_number"]): addressComponents["street_number"];
                             if(addressComponents["street_address"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["street_address"]): addressComponents["street_address"];
                             if(addressComponents["route"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["route"]): addressComponents["route"];

                             if(addressComponents["sublocality_level_5"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["sublocality_level_5"]): addressComponents["sublocality_level_5"];
                             if(addressComponents["sublocality_level_4"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["sublocality_level_4"]): addressComponents["sublocality_level_4"];
                             if(addressComponents["sublocality_level_3"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["sublocality_level_3"]): addressComponents["sublocality_level_3"];

                             if(addressComponents["sublocality_level_2"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["sublocality_level_2"]): addressComponents["sublocality_level_2"];

                             if(addressComponents["sublocality_level_1"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["sublocality_level_1"]): addressComponents["sublocality_level_1"];
                             if(addressComponents["sublocality"])
                                 customAddress["sublocality"] += customAddress["sublocality"] ? (", " + addressComponents["sublocality"]): addressComponents["sublocality"];

                             if(addressComponents["locality"])
                                 customAddress["locality"] += customAddress["locality"] ? (", " + addressComponents["locality"]): addressComponents["locality"];

                                 if(addressComponents["administrative_area_level_2"])
                                     customAddress["state_country"] += customAddress["state_country"] ? (", " + addressComponents["administrative_area_level_2"]): addressComponents["administrative_area_level_2"];

                             if(addressComponents["administrative_area_level_1"])
                                 customAddress["state_country"] += customAddress["state_country"] ? (", " + addressComponents["administrative_area_level_1"]): addressComponents["administrative_area_level_1"];

                             if(addressComponents["postal_code"])
                                 customAddress["postal_code"] += customAddress["postal_code"] ? (", " + addressComponents["postal_code"]): addressComponents["postal_code"];
                             if(addressComponents["countrycode"])
                                 customAddress["countrycode"] += customAddress["countrycode"] ? (", " + addressComponents["countrycode"]): addressComponents["countrycode"];
                                               
            $('#address1').val(customAddress["sublocality"]);
            $('#zip').val(customAddress["postal_code"]);
            $('#state').val(customAddress["state_country"]);
            $('#city').val(customAddress["locality"]);



                        } else {
                            //alert("No results found");
                        }
                        //}
                    } else {
                        //alert("Geocoder failed due to: " + status);
                    }
                });
            }
            function isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }
            function saveLocation(ymarker) {
                console.log(ymarker);
                placeLat = ymarker.getPosition().lat();

                placeLng = ymarker.getPosition().lng();
                codeLatLng(placeLat, placeLng);
                $('#share_maptag').modal('toggle');

            }
            function closeTo(maptag) {
                var name;
                if (maptag === null) {
                    name = "<?php echo $this->uri->segment(1) ?>";
                }
                else {
                    name = maptag;
                }
                console.log(name);
                var request = $.ajax({
                    url: "http://mapta.gs/actions/save_maptag",
                    type: "POST",
                    data: {name: name},
                    dataType: "html"

                });



                request.done(function (msg) {

                    $(".log").html(msg);

                });



                request.fail(function (jqXHR, textStatus) {

                    alert("Request failed: " + textStatus);

                });
            }
            $(function () {

                $('#share').click(function () {
                    var $place = $('.roosh').val();

                    var $address = $('#address').val();

                    var $address1 = $('#address1').val();

                    var $Phone = $('#phone').val();

                    var $website = $('#website').val();

                    var $description = $('#description').val();

                    var $city = $('#city').val();

                    var $state = $('#state').val();

                    var $zip = $('#zip').val();

                    //console.log($('#roosh').val());

                    //console.log($('#address').val());



                    var request = $.ajax({
                        url: "<?php echo base_url() ?>test/add_track_code",
                        type: "POST",
                        data: {u_id: uId, lat: placeLat, lng: placeLng, place: $place, address: $address, address1: $address1, city: $city, state: $state, zip: $zip, Phone: $Phone, website: $website, description: $description},
                        dataType: "json",
                    });



                    request.done(function (msg) {



                        if (msg.code === 1) {
                            //console.log(msg.lid);
                            $('#share_maptag').modal('hide');

                            toastr.success('Successfully Added');

                            var rr = $.ajax({
                                url: "<?php echo base_url() ?>test/show_last_maptag",
                                type: "POST",
                                data: {insert_id: msg.insert_id},
                                dataType: "json",
                            });
                            /* */
                            rr.done(function (m) {

                                $(".modal-body #modalname").html('<a href="<?php echo base_url() ?>' + m.name + '">http://mapta.gs/' + m.name + '</a>');
                                $(".modal-body #icons-share").html('<div id="share-buttons"><div class="item"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/' + m.name + '" onclick="return popitup(https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/' + m.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/facebook.png" alt="Facebook"/></a><span class="cap"></span></div> <div class="item"><a href="https://twitter.com/intent/tweet?text=http://mapta.gs/' + m.name + '" onclick="return popitup(https://twitter.com/intent/tweet?text=http://mapta.gs/' + m.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/twitter.png" alt="Twitter"/></a><span class="cap"></span></div>  <div class="item"><a href="https://plus.google.com/share?url=http://mapta.gs/' + m.name + '" onclick="return popitup(https://plus.google.com/share?url=http://mapta.gs/' + m.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/google.png" alt="Google"/></a>');
                                $('#show_maptag').modal('show');
                            });

                        }

                        else if (msg.code === 2) {

                            //dlg2.modal("hide");

                            toastr.warning("Oops, You can only have 200 Maptags");

                        }

                        else if (msg.code === 3) {

                            toastr.error("Maptag taken already, Try Something else");

                        }

                        else if (msg.code === 4) {

                            toastr.warning("Please Enter only alphabets for Maptag");

                        }

                        else {



                            toastr.error("Oops! something went wrong, try again");

                        }

                    });

                    request.fail(function (jqXHR, textStatus) {

                        alert("Request failed: " + textStatus);

                    });

                    return false;

                });

                $('.panel-heading span.clickable').on("click", function (e) {



                    if ($(this).hasClass('panel-collapsed')) {
                        console.log('hi');
                        // expand the panel
                        //console.log('expand');
                        $(this).parents('.panel').find('.panel-body').slideDown();

                        $(this).removeClass('panel-collapsed');

                        $(this).find('i').removeClass('fa fa-plus-square').addClass('fa fa-minus-square');

                    }

                    else {

                        // collapse the panel
                        //console.log('collapse')
                        $(this).parents('.panel').find('.panel-body').slideUp();

                        $(this).addClass('panel-collapsed');

                        $(this).find('i').removeClass('fa fa-minus-square').addClass('fa fa-plus-square');

                    }

                });
<?php if (!($this->uri->segment(1))) { ?>
                    geoFindMe();
<?php } ?>

                $("#input-702").fileinput({
                    uploadUrl: "<?php echo base_url() ?>test/add_track_image",
                    maxFileCount: 5,
                    overwriteInitial: false,
                    allowedFileTypes: ["image"]

                });
                $('#input-702').on('fileloaded', function (event, file, previewId, index, reader) {

                    console.log('hi');
                });
            });

        </script>

        <!--[if lt IE 9]>
    
          <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    
          <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    
          <![endif]-->
        <style type="text/css">

            body{

                overflow: hidden;

            }

            .left-space{

                margin-left: 25px;

            }

            #share-buttons img {

                width: 30px;
                border: 0;

                box-shadow: 0;

                display: inline;

            }

        </style>

        <!-- Start Alexa Certify Javascript -->
        <script type="text/javascript">
            _atrk_opts = {atrk_acct: "jSv+k1aQeSI1/9", domain: "mapta.gs", dynamic: true};
            (function () {
                var as = document.createElement('script');
                as.type = 'text/javascript';
                as.async = true;
                as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js";
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(as, s);
            })();
        </script>
    <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=jSv+k1aQeSI1/9" style="display:none" height="1" width="1" alt="" /></noscript>
    <!-- End Alexa Certify Javascript -->  

    <script type="text/javascript" async defer
            src="https://apis.google.com/js/platform.js?publisherid=108089825673566572321">
    </script>


    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-58667648-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');

    </script>
</head>

<body onLoad="initialize()">
    <div class="container nospace ">
		<nav class="noshow showmaptag hidden-lg hidden-md" style="display:none;">
						<div class="showmaptag1 noshow mapstag_btn hidden-lg hidden-md col-xs-4" style="margin-top:6px; margin-left:-13px" >
							<a class="noshow btn pull-left btn-danger hidden-lg hidden-md" href="/maptags.html">Know More</a>
						</div>
						<div class="showmaptag1 noshow mapstag_btn hidden-lg hidden-md col-xs-4" style="margin-top:6px;">
							<a class="btn btn-success pull-left hidden-lg hidden-md create-maptag" style="background-color: #ef7126; border-color: #ef7126; margin-left:-5.5px;" href="#">Get Maptag</a>
						</div>
						<div class="showmaptag1 noshow mapstag_btn hidden-lg hidden-md col-xs-4" style="margin-top:6px; margin-left:-6px;">
							<a class="btn btn-success pull-left hidden-lg hidden-md" href="/maptags2.html">Make Money</a>
						</div>
		</nav>
        <nav class="navbar navbar-default " role="navigation">

            <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo.jpg" alt="" style="width: 116px;"></a>

                </div>
                <div class="fb-like" data-href="https://www.facebook.com/maptags" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                <div class="collapse navbar-collapse nav-cols" id="bs-example-navbar-collapse-1">
				<div id="showmapta" style="display: none; background-color: #transparent;">
					<div class="banner-text">
						<div style="margin-top:20px; padding-left:4em;" class="mapstag_btn hidden-xs col-lg-3 col-md-3">
							<a class="pull-right btn btn-danger visible-lg" href="/maptags.html">Know more about maptags</a>
							<a class="pull-right btn btn-danger visible-xs" href="/maptags.html">Know More</a>
						</div>
						<div style="margin-top:20px; padding-left:8em;" class="mapstag_btn hidden-xs col-lg-3 col-md-3">
							<a class="btn btn-success pull-left visible-lg create-maptag" style="background-color: #ef7126; border-color: #ef7126;" href="#">Sign up & Create a Maptag</a>
							<a class="btn btn-success pull-left visible-xs create-maptag" style="background-color: #ef7126; border-color: #ef7126;" href="#">Create Maptag</a>
						</div>
						<div style="margin-top:20px; padding-left:8em;" class="mapstag_btn hidden-xs col-lg-2 col-md-2">
							<a class="btn btn-success pull-left visible-lg create-maptag" border-color: #ef7126;" href="/maptags2.html">Make Money</a>
							<a class="btn btn-success pull-left visible-xs create-maptag"  href="/maptags2.html">Make Money</a>
						</div>
					</div>
				</div> 

                    <?php if ($this->session->userdata('logged_in') != TRUE): ?> 

                        <ul class="nav navbar-nav navbar-right nav-custom">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle left-space" data-toggle="dropdown">Sign in<b class="caret"></b></a>

                                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;margin-left: 22px">
                                    <li>
                                        <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Google"><img src="<?php echo base_url() ?>assets/img/g+.png"></a>
                                        <a id="gpluslogin" href="<?php echo base_url() ?>user/social_login/Facebook"><img src="<?php echo base_url() ?>assets/img/facebook.png"></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>

                                        <div class="row">

                                            <div class="col-md-12 form-custom">

                                                <form class="form" role="form" method="post" action="<?php echo site_url('user/login') ?>" accept-charset="UTF-8" id="login-nav">

                                                    <div class="form-group">

                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>

                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                                        <input id="email" name="email" class="form-control" placeholder="user@example.com" type="text">

                                                    </div>

                                                    <div class="form-group">

                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>

                                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                                        <input id="pwd" name="pwd" class="form-control" placeholder="****************" type="password">

                                                    </div>



                                                    <div class="form-group">

                                                        <input type="submit" class="btn  btn-success btn-block" name="signin" value="Login">

                                                        <a href="<?php echo base_url() ?>user/register" class="btn  btn-info btn-block">Register new account</a>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </li>
                                </ul>

                            </li>

                        </ul>

                    <?php else: ?>

                        <ul class="nav navbar-nav navbar-right">            

                            <li class="dropdown" style="margin-top: 13px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <span>

                                        <?php if ($this->session->userdata('profile_pic')) { ?>



                                            <img src="<?php echo $this->session->userdata('profile_pic'); ?>" alt="" style="margin: -4px 8px 0 0;border-radius: 100%;border: 2px solid #FFF;max-width: 40px;">

                                        <?php } else { ?>

                                            <img src="<?php echo base_url() ?>profiles/nopic.png" alt="" style="margin: -4px 8px 0 0;border-radius: 100%;border: 2px solid #FFF;max-width: 40px;">

                                        <?php } ?>

                                    </span>

                                    <?php echo $this->session->userdata('fname'); ?> <b class="caret"></b></a>

                                <ul class="dropdown-menu">

                                    <li><a href="<?php echo base_url() ?>user/my_profile"><span class="fa fa-user"></span>Profile</a></li>

                                    <li><a href="<?php echo base_url() ?>actions/my_credits"><span class="fa fa-money"></span>My Credit</a></li>

                                    <li><a href="<?php echo base_url() ?>actions/my_track_codes"><span class="fa fa-map-marker"></span>My Maptags</a></li>
                                    <li><a href="<?php echo base_url() ?>actions/saved_maptags"><span class="fa fa-map-marker"></span>My Favourites</a></li>
                                    <li><a href="<?php echo base_url() ?>invite/friends"><span class="fa fa-user"></span>My Contacts</a></li>

                                    <li class="divider"></li>

                                    <?php if ($this->session->userdata('logged') == 'social'): ?>



                                        <li><a href="<?php echo base_url() ?>user/social_login/<?php echo $this->session->userdata('provider') ?>?logout"><span class="fa fa-power-off"></span>Logout</a></li>

                                    <?php else: ?>

                                        <li><a href="<?php echo base_url() ?>user/logout"><span class="fa fa-power-off"></span>Logout</a></li>

                                    <?php endif ?>

                                </ul>

                            </li>

                        </ul>

                    <?php endif; ?>

                </div>

        </nav>

    </div>
    <div id="wrapper">

        <div id="main">

            <div class="container nospace">


                <div class="modal fade" id="share_maptag" tabindex="-1" role="dialog" aria-labelledby="share_maptagLabel" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close padding-top-8em" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<button type="button" id="share" class="btn btn-success pull-right margin-right-10px" aria-label="Close">Save</button>

                                <h4 class="modal-title">Create MapTag</h4>

                            </div>

                            <div class="modal-body search-model padding-top-5px">
                                <div class="container" id="frm">

                                    <div class="row" style="margin-top: 0; padding:0 0 0 0;">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" name="fmadd">
                                                <div class="form-group row inline-block">
                                                	<div class="pull-left">
		                                           		<label for="roosh" class="padding-top-12px pull-left control-label">Maptag</label>                                                	
				                                          <input type="text" class="roosh pull-right maptag form-control" name="roosh" placeholder="Enter a word">
                                                    </div>
                                                    <div class="pull-right" style="width: 80px;">
                                                        <span class="log pull-right"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                	<div class="col-sm-12">
			                                        		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
														        <li class="active"><a href="#address" data-toggle="tab">Address</a></li>
														        <li><a href="#images" data-toggle="tab">Images</a></li>
														    </ul>
                                                	</div>
                                                </div>
                                                <div class="row">
                                                	 <div id="my-tab-content" class="tab-content">
												        <div class="tab-pane active" id="address">
                                                        <div class="form-group">
                                                            <label for="address" class="hide sr-only control-label">Address Line 1</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control modal-input" id="address" placeholder="Primary Address">
                                                            </div>
                                                        </div>
														<hr class="modal-hr">
														<div class="form-group">
                                                            <label for="address1" class="hide sr-only control-label">Address Line 2</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control modal-input" id="address1" placeholder="Address 2">
                                                            </div>
                                                        </div>
														<hr class="modal-hr">
                                                        <div class="form-group">
                                                            <label for="city" class="hide sr-only control-label">City</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control modal-input" id="city" placeholder="City">
                                                            </div>
                                                        </div>
														<hr class="modal-hr">
                                                        <div class="form-group">
                                                            <label for="state" class="hide sr-only control-label">Province</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control modal-input" id="state" placeholder="State">
                                                            </div>
                                                        </div>
														<hr class="modal-hr">
	                                                        <div class=" form-group">
	                                                            <label for="zip" class="hide sr-only control-label">Zip/Postal Code</label>
	                                                            <div class="col-sm-12">
	                                                                <input type="text" class="form-control modal-input" id="zip" placeholder="Zip">
	                                                            </div>
	                                                        </div>
															<hr class="modal-hr">
	                                                        <div class="form-group">
	                                                            <label for="phone" class="hide sr-only control-label">Phone</label>
	                                                            <div class="col-sm-12">
	                                                                <input type="text" class="form-control modal-input" id="phone" placeholder="Phone">
	                                                            </div>
	                                                        </div>
														<hr class="modal-hr">
                                                        <div class="form-group">
                                                            <label for="website" class="hide sr-only control-label">Website</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control modal-input" id="website" placeholder="Your Website address i-e mapta.gs">
                                                            </div>
                                                        </div>
                                                        <hr class="modal-hr">
                                                        <div class="form-group">
                                                            <label for="email" class="hide sr-only control-label">Description</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control margin-top-2px" id="description"></textarea>
                                                            </div>
                                                        </div>
												        </div>
												        <div class="tab-pane" id="images">
		                                                    <input id="input-702" data-upload-async="false" name="files[]" type="file" multiple=true class="file-loading"  data-upload-url="<?php echo base_url() ?>test/add_track_image" data-max-file-count="5" >
												        </div> 
												    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->

                    </div><!-- /.modal-dialog -->

                </div><!-- /.modal -->


                <div class="modal fade" id="show_maptag" tabindex="-1" role="dialog" aria-labelledby="show_maptagLabel" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <h4 class="modal-title">MapTag Created. </h4>

                            </div>

                            <div class="modal-body">
                                <p style="font-size:15px">Congratulations your maptag is ready </p>             
                                <span style="font-size:15px">Here's the share/referral link : </span> &nbsp;&nbsp;             
                                <span style="font-size:15px" id="modalname"></span>  
                                <p style="font-size:15px">
                                    <br> <b>
                                        Be a HERO, help your friend to Never write an address or Never lose way ..Earn Credits while doing it 
                                    </b>
                                </p> 
                                <hr>
                                <div style="font-size:15px" id="icons-share"></div>             
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div><!-- /.modal-content -->

                    </div><!-- /.modal-dialog -->

                </div><!-- /.modal -->
                <script>
                    function initialize() {

                        var place = '<?php echo $this->uri->segment(1); ?>';
                        cleanMap();
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

                                    map.setCenter(new google.maps.LatLng($lot, $lon));
                                    map.setZoom(16);

                                    var image = '';


                                    if (msg.img1 === null) {



                                        image = '';

                                    }

                                    else {

                                        image = '<a href=http://mapta.gs/map_image/' + msg.img1 + ' class=fancybox rel=gallery1><img src=http://mapta.gs/map_image/' + msg.img1 + ' style="margin-right: 5px; width:95px"></a>';
                                        image += '<a href=http://mapta.gs/map_image/' + msg.img2 + ' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/' + msg.img1 + ' style="margin-right: 5px; width:95px;display: none;"></a>';
                                        image += '<a href=http://mapta.gs/map_image/' + msg.img3 + ' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/' + msg.img1 + ' style="margin-right: 5px; width:95pxl;display: none;"></a>';
                                        image += '<a href=http://mapta.gs/map_image/' + msg.img4 + ' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/' + msg.img1 + ' style="margin-right: 5px; width:95pxl;display: none;"></a>';
                                        image += '<a href=http://mapta.gs/map_image/' + msg.img5 + ' class=fancybox rel=gallery1 style="display: none;"><img src=http://mapta.gs/map_image/' + msg.img1 + ' style="margin-right: 5px; width:95pxl;display: none;"></a>';

                                    }

                                    if (msg.name === null) {

                                        name = '';

                                    }

                                    else {

                                        name = msg.name;

                                    }

                                    if (msg.website === null) {

                                        website = '';

                                    }

                                    else {

                                        website = msg.website;

                                    }

                                    if (msg.zip === null) {

                                        zip = '';

                                    }

                                    else {

                                        zip = msg.zip;

                                    }

                                    if (msg.city === null) {

                                        city = '';

                                    }

                                    else {

                                        city = msg.city;

                                    }

                                    if (msg.state === null) {

                                        state = '';

                                    }

                                    else {

                                        state = msg.state;

                                    }

                                    if (msg.phone === null) {

                                        phone = '';

                                    }

                                    else {

                                        phone = msg.phone;

                                    }

                                    if (msg.adderss === null) {

                                        adderss = '';

                                    }

                                    else {

                                        adderss = msg.adderss;

                                    }

                                    if (msg.address1 === null) {

                                        address1 = '';

                                    }

                                    else {

                                        address1 = msg.address1;

                                    }

                                    if (msg.description === null) {

                                        description = '';

                                    }

                                    else {

                                        description = msg.description;

                                    }

                                    var info = new google.maps.InfoWindow({
                                        content: '<div class="cont"><div class="col-md-6 col-sm-6 col-lg-6" style="margin:0;padding:8px;"><div class="well" style="margin-bottom:0"> <b>' + name + '</b><br/>' + adderss + ', ' + address1 + ' <br>' + city + ' ' + zip + ' ' + state + '</div><br/><a href="tel:' + phone + '">' + phone + '</a><br><a href="http://www.' + website + '" target="_blank">' + website + '</a><br><div id="share-buttons"><div class="item"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/' + msg.name + '" onclick="return popitup(https://www.facebook.com/sharer/sharer.php?u=http://mapta.gs/' + msg.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/facebook.png" alt="Facebook"/></a><span class="cap"></span></div> <div class="item"><a href="http://twitter.com/share?url=http://mapta.gs/' + msg.name + '&text=Join the addressrevolution and never write an address&hashtags=addressrevolution" onclick="return popitup(http://twitter.com/share?url=http://mapta.gs/' + msg.name + '&text=Join the addressrevolution and never write an address&hashtags=addressrevolution)" target="_blank"><img src="http://mapta.gs/assets/images/share/twitter.png" alt="Twitter"/></a><span class="cap"></span></div>  <div class="item"><a href="https://plus.google.com/share?url=http://mapta.gs/' + msg.name + '" onclick="return popitup(https://plus.google.com/share?url=http://mapta.gs/' + msg.name + ')" target="_blank"><img src="http://mapta.gs/assets/images/share/google.png" alt="Google"/></a><span class="cap"></span></div> <div class="item"><a href="https://www.google.com/maps/dir//' + msg.lat + ',' + msg.lng + '/@' + msg.lat + ',' + msg.lng + ',14z?hl=en" target="_blank"><img src="http://mapta.gs/assets/images/direction.png" style="width: 28px;"> </a><span class="cap">Direction</span></div></div></div><div class="col-md-6 col-sm-6 col-lg-6" style="margin-top:15px;"> ' + image + '<br> <a class="btn  btn-success wss_save" href="javascript:closeTo(\'' + msg.name + '\');">Save Maptag</a><br><span class="log"></span></div><div class="col-md-12" style="margin:0;padding:8px">' + description + '</div></div>',
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

                                else {

                                    if (msg.code == 2) {

                                        toastr.error("Share Code is Expired");

                                    }

                                    else {

                                        toastr.error("Maptag not found");

                                    }

                                }

                            });

                        }
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>