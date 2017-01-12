<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Game Play</title>
        <style>
            /*tabs line color*/
            .tabs .indicator{
                background-color: #fff;
                height: 5px;
            }  
            .tab-bottom{
                position: fixed;
                bottom: 0;
                width: 100%;
            }

        </style>

    </head>
</head>
<body>

    <div class="navbar-fixed" style="z-index: 999;">
        <nav class="orange" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Your Next Locations</a>
                <a href="<?php echo BASE; ?>HomeController/load_gamelevel" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
            </div>
        </nav> 
    </div>
    <div class="section no-pad-bot" id="index-banner" style="padding-top: 0">
        <div id="map" style="width:100%;height:85%"></div>
<!--        <input type="button" value="all" onclick="displayLocations(0)"/>               
        <input type="button" value="pub" onclick="displayLocations(1)"/>
        <input type="button" value="hotel" onclick="displayLocations(2)"/>
        <input type="button" value="resturant" onclick="displayLocations(3)"/>-->
    </div>

    <div class="row tab-bottom" style=" position:fixed;margin-bottom:0px;">
        <div class="col s12" style="padding: 0">
            <ul class="tabs orange">
                <li class="tab col s3" ><a class="active" style="color: #fff;" onclick="displayLocations(1)">pubs</a></li>
                <li class="tab col s3"><a style="color: #fff;"onclick="displayLocations(3)">restaurants</a></li>
                <li class="tab col s3"><a style="color: #fff;" onclick="displayLocations(2)">hotels</a></li>
                <li class="tab col s3"><a style="color: #fff;" onclick="displayLocations(0)">all</a></li>

            </ul>
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
            var pubicon = "<?php echo IMG; ?>map/ipub.png";
            var resicon = "<?php echo IMG; ?>map/irest.png";
            var hoticon = "<?php echo IMG; ?>map/ihotel.png";
            var cpubicon = "<?php echo IMG; ?>map/cpu.png";
            var cresicon = "<?php echo IMG; ?>map/cres.png";
            var choticon = "<?php echo IMG; ?>map/cho.png";
            var usericon = "<?php echo IMG; ?>map/iperson.png";
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
                center: new google.maps.LatLng(<?php echo $nowlat; ?>,<?php echo $nowlon; ?>),
                zoom: 15
            }
            map = new google.maps.Map(mapCanvas, mapOptions);
//            var mapping;
//            if (ids == 1) {
//                mapping = pubicon;//"<?php echo IMG; ?>pub.png";
//            } else if (ids == 2) {
//                mapping = hoticon;//"<?php echo IMG; ?>hot.png";
//            } else {
//                mapping = resicon;// "<?php echo IMG; ?>res.png";
//            }
//            else {
//                mapping = nexticon;// "<?php echo IMG; ?>all.png";
//            }
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
                            var iconnext1=null;;
                        if (yourval.mappoints[i].loc == '1'){
                        iconnext1=pubicon;
                        console.log(pubicon)
                        }
                        else if (yourval.mappoints[i].loc == '3'){
                        iconnext1=resicon;
                         console.log(resicon)
                        }
                        else{
                        iconnext1=hoticon;
                         console.log('wefwf' + hoticon)
                        }
                       
                            var myCenter = new google.maps.LatLng(yourval.mappoints[i].lat, yourval.mappoints[i].lon);
                            var marker = new google.maps.Marker({
                                position: myCenter,
                                icon: iconnext1
                            });
                            marker.locid = yourval.mappoints[i].id;
                            marker.loc = yourval.mappoints[i].loc;
                            marker.addListener('click', function (data) {

                                window.location.href = '<?php echo BASE; ?>HomeController/load_locationView/?locid=' + this.locid + '&loc=' + this.loc;
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
                            icon: usericon,
                            //animation: google.maps.Animation.BOUNCE
                        });
                        markk.setMap(map);
                        
                        var iconnext;
                        if (yourval.nextlevel.loc == '1'){
                        iconnext=cpubicon;
                        }
                        else if (yourval.nextlevel.loc == '3'){
                        iconnext=cresicon;
                        }
                        else{
                        iconnext=choticon;
                        }
                                var marker = new google.maps.Marker({
                                    position: nextloc,
                                    icon: iconnext,
                                    animation: google.maps.Animation.BOUNCE
                                });
                        marker.locid = yourval.nextlevel.id;
                        marker.loc = yourval.nextlevel.loc;
                        marker.addListener('click', function (data) {

                            window.location.href = '<?php echo BASE; ?>HomeController/load_locationView/?locid=' + this.locid + '&loc=' + this.loc;
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
                   // window.alert('Directions request failed due to ' + status);
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