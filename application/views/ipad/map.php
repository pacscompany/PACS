<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
        <style>
            /*tabs lin  e color*/
            .tabs .indicator{
                background-color: #fff;
            }  


        </style>
    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container" style="width: 100%;">
                    <div class="row" style="margin: 0;">
                        <div class="col s4" style="padding: 0">
                            <img class="circle z-depth-1" src="<?php echo IMG; ?>/misc/user.png"  width="30" style="margin-top: 20px;margin-left: 10px" id="image"/>
                        </div>
                        <div class="col s8" style="padding: 0">
                            <ul class="tabs orange" style="height: 65px;">
                                <li class="tab col s3" style="height: 65px;"><a class="active waves-effect waves-light" style="color: #fff;" onclick="displayLocations(1)">pubs</a></li>
                                <li class="tab col s3" style="height: 65px;"><a class="waves-effect waves-light" style="color: #fff;"onclick="displayLocations(3)">restaurants</a></li>
                                <li class="tab col s3" style="height: 65px;"><a class="waves-effect waves-light" style="color: #fff;" onclick="displayLocations(2)">hotels</a></li>
                                <li class="tab col s3" style="height: 65px;"><a class="waves-effect waves-light" style="color: #fff;" onclick="displayLocations(0)">all</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav> 
        </div>

        <div class="row" style="margin: 0">
            <div class="col s4 z-depth-1" style="padding-bottom: 20px; height: 700px;;overflow: scroll;">
                <?php include 'home_template.php'; ?>
            </div>
            <div class="col s8" style="padding: 0;">
                <div class="row tab-bottom" style="margin: 0">
                    <div class="col s12" style="padding: 0">

                    </div>
                </div>
                <div class="section no-pad-bot" id="index-banner" style="padding-top:0">
                    <div id="map" style="width:100%;height:91%"></div>
                </div>
                <div class="fixed-action-btn horizontal">
                    <a class="btn-floating waves-effect waves-light btn-large orange">
                        <i class="large material-icons">directions_walk</i>
                    </a>
                </div>
            </div>


        </div>

  <script>
        var map;
        var nextloc;
        var markk;
        var directionsService;
        var directionsDisplay;
        function drawRoad() {
            var myloc = new google.maps.LatLng(6.9274, 79.8622);
            var nextloc = new google.maps.LatLng(6.9271, 79.8656);
            //var london = new google.maps.LatLng(6.9271, 79.862);

//                var mapCanvas = document.getElementById("map");
//                var mapOptions = {center: myloc, zoom: 15};
//                var map = new google.maps.Map(mapCanvas, mapOptions);

            var flightPath = new google.maps.Polyline({
                path: [myloc, nextloc],
                strokeColor: "#0000FF",
                strokeOpacity: 1.5,
                strokeWeight: 2
            });
            flightPath.set(map);
        }

        function myMap() {



//                var myCenter = new google.maps.LatLng(6.9271, 79.8612);
//                var myCenter1 = new google.maps.LatLng(6.9278, 79.8622);
            var mapCanvas = document.getElementById("map");
            //var mapOptions = {center: myCenter, zoom: 14};
            var mapOptions = {
                center: new google.maps.LatLng(6.9271, 79.8612),
                zoom: 15
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);
//                var marker = new google.maps.Marker({position: myCenter});
//                var marker1 = new google.maps.Marker({position: myCenter1});
//                marker.setMap(map);
//
//                marker1.setMap(map);

//                var mapCanvas = document.getElementById("map");
//                var mapOptions = {
//                    center: new google.maps.LatLng(6.9271,79.8612),
//                    zoom: 15
//                }
//                var map = new google.maps.Map(mapCanvas, mapOptions);
        }

        function displayLocations(ids)
        {
            var nexticon = "<?php echo IMG; ?>nextpub.png";
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
                center: new google.maps.LatLng(<?php echo $nowlat; ?>,<?php echo $nowlon; ?>),
                zoom: 15
            }
            map = new google.maps.Map(mapCanvas, mapOptions);
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
            // alert(ids);
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
                    if (msg != null) {
                        var yourval = jQuery.parseJSON(JSON.stringify(msg));
                        //  alert(yourval.mappoints[0].lat);
                        for (i = 0; i < yourval.mappoints.length; i++) {
                            //  alert(yourval.mappoints[i].lat);
                            var myCenter = new google.maps.LatLng(yourval.mappoints[i].lat, yourval.mappoints[i].lon);
                            var marker = new google.maps.Marker({
                                position: myCenter
                                        //icon: mapping
                            });
                            marker.locid = yourval.mappoints[i].id;
                            marker.loc = yourval.mappoints[i].loc;
                            marker.addListener('click', function (data) {

                                window.location.href = '<?php echo BASE; ?>IpadController/load_location/?locid=' + this.locid + '&loc=' + this.loc;
                            });
                            marker.setMap(map);
                            //   map.(marker);
                        }
                        //  marker.setMap(null);
                        //alert(yourval.mylevel[0].lat);
                        //  console.log(yourval.mylevel.lat);
                        //   var myloc = new google.maps.LatLng(6.9270786, 79.861243);
                        var myloc = new google.maps.LatLng(yourval.mylevel[0].lat, yourval.mylevel[0].lon);
                        // //alert(yourval.nextlevel.lat);
                        nextloc = new google.maps.LatLng(yourval.nextlevel.lat, yourval.nextlevel.lon);

                        markk = new google.maps.Marker({
                            position: myloc,
                            //animation: google.maps.Animation.BOUNCE
                        });
                        markk.setMap(map);

                        var marker = new google.maps.Marker({
                            position: nextloc,
                            icon: nexticon,
                            //animation: google.maps.Animation.BOUNCE
                        });
                        marker.locid = yourval.nextlevel.id;
                        marker.loc = yourval.nextlevel.loc;
                        marker.addListener('click', function (data) {

                            window.location.href = '<?php echo BASE; ?>IpadController/load_location/?locid=' + this.locid + '&loc=' + this.loc;
                        });
                        marker.setMap(map);

//                    var drawpath = new google.maps.Polyline({
//                        path: [myloc, nextloc],
//                        strokeColor: "#0000FF",
//                        strokeOpacity: 1.5,
//                        strokeWeight: 2
//                    });
//                    drawpath.setMap(map)

                        // Instantiate a directions service.
                        directionsService = new google.maps.DirectionsService;
                        directionsDisplay = new google.maps.DirectionsRenderer({map: map, suppressMarkers: true});
                        calculateAndDisplayRoute(directionsService, directionsDisplay, myloc, nextloc);
                    }
                }
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {

            directionsService.route({
                origin: pointA,
                destination: pointB,
                travelMode: google.maps.TravelMode.DRIVING
            }, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK)
                {
                    directionsDisplay.setMap(null)
                    directionsDisplay.setDirections(response);
                    directionsDisplay.setMap(map)
                    //alert(status);

                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

        window.onload = function () {
            displayLocations(1);
        };
        var lat = 6.9270786;
        var lon;
        function geoFindMe() {
            // var output = document.getElementById("out");
            if (!navigator.geolocation) {
                //  output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
                return;
            }
            else {
                navigator.geolocation.getCurrentPosition(success, error);
            }
            function success(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                console.log(latitude + "**" + longitude);
                var postData = {
                    'lat': latitude,
                    'lon': longitude
                };
                $.ajax({
                    type: "POST",
                    data: postData,
                    url: "<?php echo BASE; ?>HomeController/uptade_location",
                    // dataType: "json",
                    success: function (msg) {
                        // alert(msg);
                        console.log(msg);
                        console.log(lat);
                        lat = lat - 0.0008;
                        upadte_mapMarker(lat, longitude);

                    }
                });
                //  output.innerHTML = '<h3>Latitude is ' + latitude + '<br>Longitude is ' + longitude + '</h3>';
            }

            function error() {
                // output.innerHTML = "Unable to retrieve your location";
            }


        }

        function upadte_mapMarker(lat, lon) {
            var latlng = new google.maps.LatLng(lat, lon);
            markk.setPosition(latlng);
            console.log('wfew');
            var myloc1 = new google.maps.LatLng(lat, lon);
            directionsDisplay.setMap(null);
            directionsDisplay = new google.maps.DirectionsRenderer({map: map, suppressMarkers: true});
            calculateAndDisplayRoute(directionsService, directionsDisplay, myloc1, nextloc);

        }
        var myVar = setInterval(geoFindMe, 5000);

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEfyY2U_yCNyfd9tK72PBmh-G5n0PK5V0&callback=myMap"></script>

    </body>
</html>