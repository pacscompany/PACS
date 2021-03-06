<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
        <script>
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
                        ///   alert(msg);
                        document.getElementById("star" + locid + loc).innerHTML = msg;
                        // $("#" + name + "li").remove();
                    }
                });
            }
        </script>
    </head>
    <body>

       <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange z-depth-0" role="navigation">
                <div class="nav-wrapper container" style="width: 100%;">
                    <div class="row" style="margin: 0;">
                        <div class="col s4" style="padding: 0">
                            <a href="<?php echo BASE; ?>IpadController/load_userprofile">
                            <img class="circle z-depth-1" src="<?php echo IMG; ?>/misc/user.png"  width="30" style="margin-top: 20px;margin-left: 10px" id="image"/>
                            </a>
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
                <div class="row" style="padding: 0; margin: 0">
                    <div class="col s12 orange" style="height: 70px; margin-top: -1px;">
                        <div class="col s8" style="margin-left: 110px; padding: 0; margin-top: 10px; width: 460px;">
                            <div class="col s3 " style=" padding: 0;">
                                <i class="material-icons white-text">home</i>
                            </div>
                            <div class="col s6 center-align white-text" style=" padding: 0;">Visited Locations</div>
                            <div class="col s3 right-align" style=" padding: 0;">
                                <i class="dropdown-button material-icons white-text" href='#' data-activates='dropdown1'>more_vert</i>
                            </div>
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="#!"> <i class="material-icons orange-text">star</i> Added to favorites</a></li>
                                <li class="divider"></li>
                                <li><a href="#!"> <i class="material-icons orange-text">local_bar</i><br>Store Name</a></li>
                                <li class="divider"></li>
                                <li><a href="#!"> <i class="material-icons orange-text">location_on</i>Location</a></li>
                                <li class="divider"></li>
                                <li><a href="#!"> <i class="material-icons orange-text">access_time</i><br>Date</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s8 white z-depth-1" style="margin-left: 120px; padding: 0;margin-top: -30px; height: 650px;overflow-x:hidden ;overflow-y: scroll">
                        <ul class="collapsible popout" data-collapsible="accordion">
                            <?php
                            // print_r($history);
                            if ($history != null) {
                                $history1 = json_decode($history);
                                foreach ($history1 as $row) {
                                    //     echo $row->id ;
                                    ?>
                                    <li>
                                        <div class="collapsible-header" style="padding: 0; margin-bottom: 20px;" onclick="aaa(<?php echo $row->lat; ?>,<?php echo $row->lon; ?>,<?php echo $row->id; ?>,<?php echo $row->loc; ?>,<?php echo $row->timestamp; ?>)">
                                            <div class="row" style="margin: 0;">
                                                <div class="col s4" style="padding: 0">
                                                    <img class="materialboxed" style="" src="<?php echo IMG; ?>locations/<?php echo $row->imageurl; ?>"  height="120" />
                                                </div>
                                                <div class="col s8" style="padding: 0">
                                                    <div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;">
                                                        <div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i><?php echo $row->name; ?></div>
                                                        <?php if ($row->isfav == '1') { ?>
                                                            <div class="col s1" style="padding: 0; margin: 0"><i id="star<?php echo $row->id; ?><?php echo $row->loc; ?><?php echo $row->timestamp; ?>" onclick="add_favouirt('<?php echo $row->id; ?>', '<?php echo $row->loc; ?>', '1',<?php echo $row->timestamp; ?>)" class="material-icons secondary-content">star</i></div>
                                                        <?php } else { ?>
                                                            <div class="col s1" style="padding: 0; margin: 0"><i id="star<?php echo $row->id; ?><?php echo $row->loc; ?><?php echo $row->timestamp; ?>" onclick="add_favouirt('<?php echo $row->id; ?>', '<?php echo $row->loc; ?>', '1',<?php echo $row->timestamp; ?>)" class="material-icons secondary-content">star_border</i></div>
                                                        <?php } ?>       
                                                    </div>
                                                    <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;">
                                                        <div class="col s10" style="padding: 0">
                                                            <span> <i class="material-icons">location_on</i><?php echo $row->address; ?></span>  
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;">
                                                        <div class="col s10" style="padding: 0"><i class="material-icons">access_time</i>2016-12-20</div>
                                                    </div>
                                                </div> 
                                            </div>

                                        </div>
                                        <div class="collapsible-body"> 
                                            <div class="container" style="margin: 0px 10px; width: auto; text-align:justify">
                                                <div>
                                                    <?php echo $row->description; ?>
                                                </div>
                                                <div class="row" style="margin: 0; margin-top: 5px">
                                                    <div class="col s12" style="padding: 0">
                                                        <div id="mapdiv<?php echo $row->id; ?><?php echo $row->loc; ?><?php echo $row->timestamp; ?>"  style="margin: 0;">
                                                            <div id="map<?php echo $row->id; ?><?php echo $row->loc; ?><?php echo $row->timestamp; ?>" style="height:200px; width:100%;"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function aaa(lat, lon, id, loc, time) {
                // alert(id);
                $('.collapsible').collapsible({
                    accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
                    onOpen: function (el) {
                        
                        console.log(lat);
                        console.log(lon);
                        console.log(id);
                        console.log('console' + loc);
                        console.log(time);
                        
                        myMapzz(lat, lon, id, loc, time);
                    }, // Callback for Collapsible open
                    onClose: function (el) {
                    } // Callback for Collapsible close
                }
                );

            }

            function myMap() {

            }
            function myMapzz(lat, lon, id, loc, time) {

                // var stavanger = new google.maps.LatLng(6.9274, 79.8622);
                var my = new google.maps.LatLng(lat, lon);
                //var london = new google.maps.LatLng(6.9271, 79.862);
                //Console.Log("click");
                $("#map" + id + loc).empty();
                var mapCanvas = document.getElementById("map" + id + loc + time);
                var mapOptions = {center: my, zoom: 15};
                var map = new google.maps.Map(mapCanvas, mapOptions);

                var marker = new google.maps.Marker({position: my});
                marker.setMap(map);

            }
        </script>
        <!--  Scripts--> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEfyY2U_yCNyfd9tK72PBmh-G5n0PK5V0&callback=myMap"></script>

    </body>

</html>