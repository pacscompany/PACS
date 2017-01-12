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
                            <div class="col s6 center-align white-text" style=" padding: 0;">Booked Locations</div>
                            <div class="col s3 right-align" style=" padding: 0;">
                                <i class="dropdown-button material-icons white-text" href='#' >more_vert</i>
                            </div>

                        </div>
                    </div>
                     <div class="col s8 white z-depth-1" style="margin-left: 120px; padding: 0;margin-top: -30px; height: 650px;overflow-x:hidden ;overflow-y: scroll">
                        <ul class="collapsible popout" data-collapsible="accordion">
                            <?php
                            // print_r($history);
                            $history1 = json_decode($history);
                            foreach ($history1 as $row) {
                                ?>
                                <li>
                                    <div class="collapsible-header" style="padding: 0">
                                        <div class="row" style="margin: 0">
                                            <div class="col s4" style="padding: 0">
                                                <img class="materialboxed" src="<?php echo IMG; ?>locations/<?php echo $row->imageurl; ?>"  height="120" />
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
                            <a class="btn-floating btn-large orange" href="<?php echo BASE; ?>IpadController/load_booking">
                                <i class="large material-icons">mode_edit</i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>