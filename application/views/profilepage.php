<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Profile</title>

        <style>

            .parallax-container {
                min-height: 380px;
                line-height: 0;
                height: auto;
                color: rgba(255,255,255,.9);
            }
            .parallax-container .section {
                width: 100%;
            }

            @media only screen and (max-width : 992px) {
                .parallax-container .section {
                    position: absolute;
                    top: 40%;
                }
                #index-banner .section {
                    top: 10%;
                }
            }

            @media only screen and (max-width : 600px) {
                #index-banner .section {
                    top: 0;
                }
            }

            .icon-block {
                padding: 0 15px;
            }
            .icon-block .material-icons {
                font-size: inherit;
            }

        </style>
    </head>

    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Profile</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div> 
        <div class="card" style="margin: 10; width: 95%">
            <div class="card-image waves-effect waves-block waves-light">
               <img class="circle" src="<?php echo IMG; ?>/misc/user.png"  width="50" style="width: 25%; position: fixed;z-index: 2;margin: auto; margin-top: 25px"/>
                <img src="<?php echo IMG; ?>user_profile/userprofile_ipad.png" alt=""/>
                <span class="card-title " style="padding-left:10px;padding-bottom:5px; font-size: 18px">Charitha Goonewardena<br>
                    <span style="font-size: 13px">Sri Lanka Colombo</span>
                </span>
            </div>
        </div>

        <div class="card" style="margin: 10px; width: 95%">
            <div class="row" style="padding : 10px; margin-bottom: 0">
                <div class="progress grey lighten-3" style="height: 12px; margin:0; margin-top: px">
                    <div class="orange determinate" style="width: <?php echo $presentage; ?>%; "></div>
                </div>
                <div class="row" style="margin: 0; margin-top: 5px">
                    <div class="col s6 left-align" style="padding: 0">Level</div>                    
                    <div class="col s6 right-align" style="padding: 0">Level Completion</div>
                </div>
                <div class="row" style="margin: 0; margin-top: 5px">
                    <div class="col s6 left-align" style="padding: 0"><?php echo $completed1; ?></div>
                    <?php
                    if ($userdetails != NULL) {
                        foreach ($userdetails as $row) {
                            ?>
                            <div class="col s6 right-align" style="padding: 0"><?php echo $row->score ?>/1000</div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div style="margin: 0px; width: 100%">
            <div class="row" style="margin: 5px">
                <div class="col s3 center-align" style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align" style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-1.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-2.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/drink.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-4.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-5.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-3.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max"  style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-2.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max" style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/drink.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
                <div class="col s3 center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Choco Max" style="padding: 5px;">
                    <div class="waves-effect waves-orange z-depth-1" style="width: 80px; height: 80px; border-radius: 2px;">
                        <img src="<?php echo IMG; ?>user_profile/food-4.png" width="70" height="70" style="margin: 5px 0px 5px 0px;"/>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
