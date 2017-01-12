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

                            <div class="card" style="margin: 0;">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="circle" src="<?php echo IMG; ?>/misc/user.png"  width="50" style="width: 30%; position: fixed;z-index: 2;margin: auto; margin-top: 30px"/>
                                    <img src="<?php echo IMG; ?>leader_board/leaderboard_ipad.png" alt=""/>
                                    <span class="card-title" style="padding-left:10px;padding-bottom:5px; font-size: 18px">Charitha Goonewardena<br>
                                        <span style="font-size: 13px">Points: 76 | Rank: 1234 | Medals: 2</span>
                                    </span>
                                </div>
                            </div>
                            <div style="overflow: scroll;height: 430px;">
                                <ul class="collection" style="">
                                    <?php
                                    foreach ($leader as $row) {
                                        ?>
                                        <li class="collection-item avatar">
                                            <img src="<?php echo IMG; ?>play.png" alt="" class="circle">
                                            <span class="title"><?php echo $row->first_name . ' ' . $row->last_name; ?></span>
                                            <p><?php echo $row->email; ?></p>
                                            <a href="#!" class="secondary-content"><div class="badge"><?php echo $row->score; ?></div></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>