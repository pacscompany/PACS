<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
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
            <div class="col s4 z-depth-1" style="padding-bottom: 20px; height: 700px;overflow: scroll;">
                <?php include 'home_template.php'; ?>
            </div>
            <div class="col s8" style="padding: 0;">
                <div class="row" style="padding: 0; margin: 0">
                    <div class="col s12 orange" style="height: 70px"></div>
                    <div class="col s8 white z-depth-1" style="margin-left: 120px; padding: 0;margin-top: -30px; height: 85%;">
                        <div class="container" style="margin: 0; width: auto; padding: 0">
                            <?php
                            foreach ($userprivate as $row1) {
                               
                                ?>
                                <div class="card" style="margin: 0;">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href="<?php echo BASE; ?>IpadController/load_userprofile">
                                        <img class="circle" src="<?php echo IMG; ?>/misc/user.png"  width="50" style="width: 30%; position: fixed;z-index: 2;margin: auto; margin-top: 30px"/>
                                        </a>
                                        <img src="<?php echo IMG; ?>user_profile/userprofile_ipad.png" alt=""/>
                                        <span class="card-title" style="padding-left:10px;padding-bottom:5px; font-size: 18px">Charitha Goonewardena<br>
                                            <span style="font-size: 13px">Points: <?php echo $row1->points ?> | Rank: 1234 | Medals: 2</span>
                                        </span>
                                    </div>
                                </div>
                             <?php
                            }
                                ?>
                                <div style="margin-top: 10px">
                                    <div class="row" style="margin: 0">
                                        <div class="col s7 z-depth-1" style=" margin: 5px; margin-left: 13px">
                                            <div class="center-align" style="margin: 10px">
                                                <span>
                                                    Level Progress
                                                    <i class="material-icons secondary-content" style="font-size: 20px">star_border</i>
                                                    <i class="material-icons secondary-content" style="font-size: 20px">star</i>
                                                    <i class="material-icons secondary-content" style="font-size: 20px">star</i>
                                                    <i class="material-icons secondary-content" style="font-size: 20px">star</i>
                                                    <i class="material-icons secondary-content" style="font-size: 20px">star</i>
                                                </span>
                                            </div>

                                            <div style="overflow: scroll;height: 355px; ">
                                                <?php
                                                $i = 0;
                                                foreach ($userdetails as $row) {
                                                    $i++;
                                                    $pres = (intval($row->score) / 1000) * 100;
                                                    ?>
                                                    <div class="row grey-text" style="margin: 0">
                                                        <div class="col s2" style="padding: 0">
                                                            <?php echo $i; ?>
                                                        </div>
                                                        <div class="col s7" style="padding: 0; margin-right: 20px">
                                                            <div class="progress grey lighten-3" style="height: 10px">
                                                                <div class="orange determinate" style="width: <?php echo $pres; ?>%; "></div>
                                                            </div>
                                                        </div>
                                                        <div class="col s2 " style="padding: 0"><?php echo $row->score ?></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($i < 15) {
                                                    while ($i < 15) {
                                                        $i++;
                                                        ?>

                                                        <div class="row grey-text" style="margin: 0">
                                                            <div class="col s2" style="padding: 0">
                                                                <?php echo $i; ?>
                                                            </div>
                                                            <div class="col s7" style="padding: 0; margin-right: 20px">
                                                                <div class="progress grey lighten-3" style="height: 10px">
                                                                    <div class="orange determinate" style="width: 0%; "></div>
                                                                </div>
                                                            </div>
                                                            <div class="col s2 " style="padding: 0">0</div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <div class="col s4 z-depth-1" style=" margin: 5px">
                                            <div style="overflow-y: scroll;height: 397px; overflow-x: hidden ">
                                                <div class="row" style="margin-bottom: 0">
                                                    <div class="col s6" style="margin: 0; padding: 0">
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/drink-1.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/drink.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-1.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-2.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-3.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-4.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-5.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/drink-1.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/drink.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-1.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                    </div>
                                                    <div class="col s6" style="margin: 0; padding: 0">
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-4.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-5.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/drink-1.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/drink.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-1.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-4.png" width="50" style="margin: 5px"/>
                                                        </div>
                                                        <div class="z-depth-1  center-align" style="margin: 5px; padding: 0">
                                                            <img src="<?php echo IMG; ?>user_profile/food-5.png" width="50" style="margin: 5px"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>