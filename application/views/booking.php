<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
        <style>
            .badge {
                height: 50px;
                width: 50px;
                display: table-cell;
                text-align: center;
                vertical-align: middle;
                border-radius: 50%;
                background: yellow;
                transform: scale(0.7,0.7);
            }
        </style>

    </head>
    <body>
        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">

                <div class="row">
                    <div class="col s6"> <input id="starttime" type="date" class="datepicker"></div>
                    <div class="col s6"> <input id="endtime" type="date" class="datepicker"></div>
                </div>
                <div class="row">
                    <div class="input-field col s12" >
                        <input placeholder="Placeholder" id="location" type="text" class="validate">
                        <label>Location</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4"> 
                        <div class="input-field col s12" >
                            <input name="room" id="room" type="number" class="validate">
                            <label>Room</label>
                        </div>
                    </div>
                    <div class="col s4"> 
                        <div class="input-field col s12" >
                            <input name="adults" id="adults" type="number" class="validate">
                            <label>Adults</label>
                        </div>
                    </div>
                    <div class="col s4"> 
                        <div class="input-field col s12" >
                            <input name="children" id="children" type="number" class="validate">
                            <label>Children</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <a class="waves-effect waves-light btn" onclick="SaveBooking()">Book</a>

            </div>
        </div>

        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Booking</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div>



        <div class="container" style="margin: 0px 10px; width: auto">
            <div id="map" style="width:100%;height:500px"></div>

            <div class="row">
                <div class="col s6">
                    <p>
                        <input class="with-gap" name="group3" type="radio" id="hot" checked onclick="displayLocations(2)"/>
                        <label for="hot">Hotel</label>
                    </p>
                </div>
                <div class="col s6">
                    <p>
                        <input class="with-gap" name="group3" type="radio" id="res" onclick="displayLocations(3)"/>
                        <label for="res">Resturant</label>
                    </p>
                </div>
            </div>
            <div id="divv">
                <!--           <div id="divv"><ul class="collapsible popout" data-collapsible="accordion"> 
                                                                <li> 
                                                                <div class="collapsible-header" style="padding: 0"> 
                                                                <div class="row" style="margin: 0"> 
                                                                <div class="col s4" style="padding: 0"> 
                                                                <div class="card-image waves-effect waves-block waves-light" style="height: 120px; width:130px ">
                                        <img class="materialboxed" style="height: 100%" src="<?php echo IMG; ?>locations/<?php echo $row->imageurl; ?>"/>
                                    </div>
                                                                </div> 
                                                                <div class="col s8" style="padding: 0"> 
                                                                <div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;"> 
                                                                <div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i>  msg1[0].name  </div> 
                                                                <div class="col s1" style="padding: 0; margin: 0"><i class="material-icons secondary-content">star_border</i></div> 
                                                                </div> 
                                                                <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;"> 
                                                                <div class="col s10" style="padding: 0"> 
                                                                <span> <i class="material-icons">location_on</i>  msg1[0].address  </span> 
                                                                </div> 
                                                                </div> 
                                                                <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;"> 
                                                                <div class="col s10" style="padding: 0"></div> 
                                                                </div> 
                                                                </div> 
                                                                </div> 
                                                                </div> 
                                                                <div class="collapsible-body"> 
                                                                <div class="container" style="margin: 0px 10px; width: auto; text-align:justify"> 
                                                                <div> 
                                                                 msg1[0].description 
                                                                </div> 
                                                                </div> 
                                                                </div> 
                                                                </li> 
                                                                </ul></div>-->
            </div>

        </div>

        <script type="text/javascript">

            function ClosePopup() {
                $('#modal1').modal('close');
            }
            var LOCID = 0;
            var LOC = 0;
            function SaveBooking() {
                // alert(LOCID);
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });
                var postData = {
                    'start': $('#starttime').val(),
                    'end': $('#endtime').val(),
                    'room': $('#room').val(),
                    'children': $('#children').val(),
                    'adults': $('#adults').val(),
                    'locid': LOCID,
                    'loc': LOC

                };
                $.ajax({
                    type: "POST",
                    data: postData,
                    url: "<?php echo BASE; ?>HotelController/booking_loc",
                    // dataType: "json",
                    success: function (msg) {
                        $('#modal1').closeModal();
                        // alert(msg);
                    }
                });
            }

            function bookNow() {

                // alert(id);

                $("#location").val($('#desval').text());
                $('#modal1').openModal();
            }
            function myMap() {
                var myCenter = new google.maps.LatLng(6.9271, 79.8612);
                var mapCanvas = document.getElementById("map");
                var centerControlDiv = document.getElementById("mapdiv");
                var mapOptions = {
                    center: new google.maps.LatLng(6.9271, 79.8612),
                    zoom: 15
                }
                var map = new google.maps.Map(mapCanvas, mapOptions);
                //var marker = new google.maps.Marker({position: myCenter});
                // marker.hotspotid = 2;
//                marker.addListener('click', function (data) {
//                    alert(this.hotspotid);
//                });
//                marker.setMap(map);
            }

            function displayLocations(ids)
            {
                var nexticon = "<?php echo IMG; ?>next.png";
                var mapCanvas = document.getElementById("map");
                var mapOptions = {
                    center: new google.maps.LatLng(6.9271, 79.8612),
                    zoom: 15
                }
                var map = new google.maps.Map(mapCanvas, mapOptions);
                var mapping;
                if (ids == 1) {
                    mapping = "<?php echo IMG; ?>pub.png";
                } else if (ids == 2) {
                    mapping = "<?php echo IMG; ?>hot.png";
                } else if (ids == 3) {
                    mapping = "<?php echo IMG; ?>res.png";
                } else {
                    mapping = "<?php echo IMG; ?>all.png";
                }
                var postData = {
                    'id': ids
                };

                $.ajax({
                    type: "POST",
                    data: postData,
                    url: "<?php echo BASE; ?>HotelController/get",
                    dataType: "json",
                    success: function (msg) {
                        // alert(msg);
                        var yourval = jQuery.parseJSON(JSON.stringify(msg));
                        //  alert(yourval.mappoints[0].lat);
                        for (i = 0; i < yourval.mappoints.length; i++) {
                            //  alert(yourval.mappoints[i].lat);
                            var myCenter = new google.maps.LatLng(yourval.mappoints[i].lat, yourval.mappoints[i].lon);
                            var marker = null;
                            marker = new google.maps.Marker({
                                position: myCenter
                                        //icon: mapping
                            });
                            // alert(yourval.mappoints[i].name);
                            marker.locid = yourval.mappoints[i].id;
                            marker.loc = yourval.mappoints[i].loc;
                            ;
                            marker.addListener('click', function (data) {
                                //alert(marker.locid);
                                var postData = {
                                    'locid': this.locid,
                                    'loc': this.loc
                                };
                                //alert(postData);
                                $.ajax({
                                    type: "POST",
                                    data: postData,
                                    url: "<?php echo BASE; ?>HotelController/getloc",
                                    dataType: "json",
                                    success: function (msg1) {
                                        var yourval1 = jQuery.parseJSON(JSON.stringify(msg1));
                                        // alert(yourval1[0].id + "" + yourval1[0].loc) ;
                                        LOCID = yourval1[0].id;
                                        LOC = yourval1[0].loc;
//var temp='<ul class="collapsible popout" data-collapsible="accordion"> <li> <div class="collapsible-header" style="padding: 0"> <div class="row" style="margin: 0"> <div class="col s4" style="padding: 0"> <img class="materialboxed" src="<?php echo IMG; ?>locations/machan.jpg" height="120" /> </div> <div class="col s8" style="padding: 0"> <div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;"> <div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i> msg1[0].name </div> <div class="col s1" style="padding: 0; margin: 0"><i class="material-icons secondary-content">star_border</i></div> </div> <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;"> <div class="col s10" style="padding: 0"> <span> <i class="material-icons">location_on</i> msg1[0].address </span> </div> </div> <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;"> <div class="col s10" style="padding: 0"></div> </div> </div> </div> </div> <div class="collapsible-body"> <div class="container" style="margin: 0px 10px; width: auto; text-align:justify"> <div> msg1[0].description </div> </div> </div> </li> </ul>';
                                        var temp = '<div id="divv"><ul class="collapsible popout" data-collapsible="accordion">' +
                                                '<li>' +
                                                '<div class="collapsible-header" style="padding: 0">' +
                                                '<div class="row" style="margin: 0">' +
                                                '<div class="col s4" style="padding: 0">' +
                                                '<div class="card-image waves-effect waves-block waves-light" style="height: 120px; width:130px ">'+
                                                '<img class="materialboxed" style="height: 100%" src="<?php echo IMG; ?>locations/' + msg1[0].imageurl + '"/>' +
                                                '</div></div>' +
                                                '<div class="col s8" style="padding: 0">' +
                                                '<div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;">' +
                                                '<div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i>' + msg1[0].name + '</div>' +
                                                '</div>' +
                                                '<div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;">' +
                                                '<div class="col s10" style="padding: 0">' +
                                                '<span> <i class="material-icons">location_on</i>' + msg1[0].address + '</span>' +
                                                '</div>' +
                                                '</div>' +
                                                '<div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;">' +
                                                '<div class="col s10" style="padding: 0"></div>' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>' +
                                                '<div >' +
                                                '<div class="container" style="margin: 0px 10px; width: auto; text-align:justify">' +
                                                '<div class="row" style="margin: 0; margin-top: 5px">' +
                                                '<div class="col s12 center-align" style="padding: 0">' + '<a onclick="bookNow()" style="margin-bottom: 10px;" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Book Now</a></div>' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>' +
                                                '</li>' +
                                                '</ul>';
                                        $('#divv').replaceWith(temp);

                                    }
                                });
                            });
                            marker.setMap(map);
                            //   map.(marker);
                        }
                    }
                });
            }

            function add_favouirt(locid, loc, userid) {
                var postData = {
                    'locid': locid,
                    'loc': loc,
                    'userid': userid
                };
                $.ajax({
                    type: "POST",
                    data: postData,
                    url: "<?php echo BASE; ?>HotelController/addfav",
                    //  dataType: "json",
                    success: function (msg) {
                        document.getElementById("star").innerHTML = msg;
                        // $("#" + name + "li").remove();
                    }
                });
            }

            function open_popup() {
                $('#modal1').modal('open');
            }

            window.onload = function () {
                displayLocations(2);
            };


        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEfyY2U_yCNyfd9tK72PBmh-G5n0PK5V0&callback=myMap"></script>

    </body>
</html>