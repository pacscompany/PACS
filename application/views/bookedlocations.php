<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Visited Locations</title>
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
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Booked Locations</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div>

        <ul class="collapsible popout" data-collapsible="accordion">
            <?php
            // print_r($history);
            $history1 = json_decode($history);
            foreach ($history1 as $row) {
                ?>
                <li>
                    <div class="collapsible-header" style="padding: 0; margin-bottom: 20px;">
                        <div class="row" style="margin: 0">
                            <div class="col s4" style="padding: 0">
                                <div class="card-image waves-effect waves-block waves-light" style="height: 120px; width:130px ">
                                    <img class="materialboxed" style="height: 100%" src="<?php echo IMG; ?>locations/<?php echo $row->imageurl; ?>"/>
                                </div>
                            </div>
                            <div class="col s8" style="padding: 0">
                                <div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;">
                                    <div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i><?php echo $row->name; ?></div>
                                    <?php if ($row->isfav == '1') { ?>
                                        <div class="col s1" style="padding: 0; margin: 0"><i id="star<?php echo $row->id; ?><?php echo $row->loc; ?>" onclick="add_favouirt('<?php echo $row->id; ?>', '<?php echo $row->loc; ?>', '1')" class="material-icons secondary-content">star</i></div>
                                    <?php } else { ?>
                                        <div class="col s1" style="padding: 0; margin: 0"><i id="star<?php echo $row->id; ?><?php echo $row->loc; ?>" onclick="add_favouirt('<?php echo $row->id; ?>', '<?php echo $row->loc; ?>', '1')" class="material-icons secondary-content">star_border</i></div>
                                    <?php } ?>  </div>
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
                            <div class="row" style="margin: 0; margin-top: 5px">
                                <div class="col s4" style="padding: 0">
                                    <i class="material-icons">exit_to_app</i>
                                    <p style="padding: 0;margin-top: -21px; margin-left: 35px;">2017-01-03</p>  
                                </div>
                                <div class="col s4" style="padding: 0">
                                    <!--tag_faces-->
                                    <i class="material-icons">tag_faces</i>
                                    <p style="padding: 0;margin-top: -21px; margin-left: 35px;">02</p>  
                                </div>
                                <div class="col s4" style="padding: 0">
                                    <!--tag_faces-->
                                    <i class="material-icons">vpn_key</i>
                                    <p style="padding: 0;margin-top: -21px; margin-left: 35px;">01</p>  
                                </div>
                                <div class="col s4" style="padding: 0">
                                    <i class="material-icons" style="transform: rotate(180deg)">exit_to_app</i>
                                    <p style="padding: 0;margin-top: -21px; margin-left: 35px;">2017-01-03</p>  
                                </div>
                                <div class="col s4" style="padding: 0">
                                    <i class="material-icons">child_care</i>
                                    <p style="padding: 0;margin-top: -21px; margin-left: 35px;">01</p>  
                                </div>
                                <div class="col s4" style="padding: 0">
                                    <i class="material-icons">payment</i>
                                    <p style="padding: 0;margin-top: -21px; margin-left: 35px;">Credit Card</p>  
                                </div>
                            </div>

                            <div style="margin-top: 5px">
                                <?php echo $row->description; ?>
                            </div>
                            <div class="row" style="margin: 0; margin-top: 5px">
                                <div class="col s8" style="padding: 0">Map</div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <div class="fixed-action-btn horizontal">
            <a class="btn-floating btn-large orange" href="<?php echo BASE; ?>HomeController/load_booking">
                <i class="large material-icons">mode_edit</i>
            </a>

        </div>

    </body>
</html>
