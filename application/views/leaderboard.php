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
                background: #ff9800;
                transform: scale(0.7,0.7);
            }
        </style>

    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Visited Locations</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div>

        <div class="card" style="margin: 0; ">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="circle" src="<?php echo IMG; ?>/misc/user.png"  width="50" style="width: 25%; position: fixed;z-index: 2;margin: auto; margin-top: 25px"/>
                <img src="<?php echo IMG; ?>leader_board/leaderboard_iphone.jpg" alt=""/>
                <span class="card-title " style="padding-left:10px;padding-bottom:5px; font-size: 18px">Charitha Goonewardena (250)<br>
                    <span style="font-size: 13px">Sri Lanka Colombo</span>
                </span>
            </div>
        </div>
        <div style="height: 415px; overflow-y: scroll; overflow-x: hidden">
            <ul class="collection">
                <?php
                if ($leader != null) {
                    foreach ($leader as $row) {
                        ?>
                        <li class="collection-item avatar">
                            <img src="<?php echo IMG; ?>user/<?php echo $row->image_url; ?>" alt="" class="circle">
                            <span class="title"><?php echo $row->first_name . ' ' . $row->last_name; ?></span>
                            <p><?php echo $row->email; ?></p>
                            <a href="#!" class="secondary-content"><div class="badge white-text"><?php echo $row->score; ?></div></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>


    </body>
</html>

