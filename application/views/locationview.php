<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>

        <style>
            .desc-bottom{
                position: fixed;
                bottom: -9px;
                width: 100%;
            }
        </style>
    </head>
    <body>

        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Location Details</a>
                    <a href="<?php echo BASE; ?>HomeController/load_map" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div>

        <?php
        if($details != NULL){
        $des = json_decode($details);

        foreach ($des as $row) {
            ?>
            <div class="card" style="margin: 0;">
                <div class="card-image waves-effect waves-block waves-light" style="height: 200px;">
                    <img src="<?php echo IMG; ?>locations/<?php echo $row->imageurl; ?>" alt=""/>
                    <span class="card-title" style="padding-left:10px;padding-bottom:5px"><?php echo $row->name; ?><br>
                        <span style="font-size: 15px"><?php echo $row->address; ?></span>
                    </span>
                    <?php if ($fav == '1') { ?>
                        <span class="card-title right-align" style="padding-right:10px;padding-bottom:5px" >
                            <i id="star" class="yellow-text material-icons  secondary-content" onclick="add_favouirt('<?php echo $row->id; ?>', '<?php echo $row->loc; ?>', '1')">star</i>
                        </span>
                    <?php } else { ?>
                        <div class="right-align">
                            <span class="card-title" style="padding-right:10px;padding-bottom:5px; margin-left: 355px;" >
                                <i id="star" class="yellow-text material-icons  secondary-content" onclick="add_favouirt('<?php echo $row->id; ?>', '<?php echo $row->loc; ?>', '1')">star_border</i>
                            </span>
                        </div>

                    <?php } ?>
                </div>
            </div>
        <?php }
        }
        ?>
        <div id="mapdiv"  style="margin: 0;">
            <div id="map" style="width:100%;height: 410px;"></div>
        </div>
        <?php
        if($details != NULL){
        $des = json_decode($details);
        foreach ($des as $row) {
            ?>
            <div class="desc-bottom">
                <a href="<?php echo BASE; ?>HomeController/load_gameplay" class="btn-floating btn-large waves-effect waves-light orange" style="margin-left: 310;"><i class="material-icons">done</i></a>
                <div style="margin-left: 5px;margin-right: 5;">
                    <div class="card">
                        <ul class="collection">
                            <li class="collection-item" style="padding: 0">
                                <div class="row center-align grey lighten-3" style=" margin: 0;padding: 10;">
                                    <div class="col s1" >
                                        <i class="material-icons">language</i>
                                    </div>
                                    <div class="col s5" ><?php echo $row->website; ?></div>
                                    <div class="col s2" >
                                    </div>
                                    <div class="col s4" sty> <?php echo $row->phonenumber; ?></div>
                                </div>
                            </li>
                            <li class="collection-item" style="text-align:justify; max-height: 100px; overflow-y: scroll">
                                <?php echo $row->description; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function CenterControl(controlDiv, map) {

                    // Set CSS for the control border.
                    var controlUI = document.createElement('a');
                    controlUI.style.backgroundColor = '#fff';
                    controlUI.style.border = '2px solid #fff';
                    controlUI.style.borderRadius = '3px';
                    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
                    controlUI.style.cursor = 'pointer';
                    controlUI.style.marginBottom = '22px';
                    controlUI.style.textAlign = 'center';
    //                controlUI.className = "btn-floating btn-large waves-effect waves-light red";
                    controlUI.title = 'Click to recenter the map';
                    controlDiv.appendChild(controlUI);

                    // Set CSS for the control interior.
    //                var controlText = document.createElement('div');
    //                controlText.style.color = 'rgb(25,25,25)';
    //                controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    //                controlText.style.fontSize = '16px';
    //                controlText.style.lineHeight = '38px';
    //                controlText.style.paddingLeft = '5px';
    //                controlText.style.paddingRight = '5px';
    //                controlText.innerHTML = 'Center Map';
    //                controlUI.appendChild(controlText);

                    // Setup the click event listeners: simply set the map to Chicago.
                    controlUI.addEventListener('click', function () {
                        map.setCenter(chicago);
                    });

                }

                function myMap() {
                    var myCenter = new google.maps.LatLng(<?php echo $row->lat; ?>, <?php echo $row->lon; ?>);
                    var mapCanvas = document.getElementById("map");
                    var centerControlDiv = document.getElementById("mapdiv");
                    var mapOptions = {
                        center: new google.maps.LatLng(<?php echo $row->lat; ?>, <?php echo $row->lon; ?>),
                        zoom: 15
                    }
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({position: myCenter});
                    marker.setMap(map);
                    var centerControlDiv = document.createElement('div');
                   // var centerControl = new CenterControl(centerControlDiv, map);

                    map.controls[google.maps.ControlPosition.LEFT_CENTER].push(centerControlDiv);
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


            </script>


        <?php }} ?>



        <!--  Scripts--> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEfyY2U_yCNyfd9tK72PBmh-G5n0PK5V0&callback=myMap"></script>

    </body>
</html>
