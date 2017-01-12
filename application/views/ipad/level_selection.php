<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Level Selection</title>
        <style type="text/css">
            .bgimg {
                background-image: url('<?php echo IMG; ?>game/level_back.jpg');
                background-size: 100% 100%;
            }
            .invalid_level{
                filter: grayscale(100%); 
                opacity: 0.5;
            }

        </style>
    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container" style="width: 100%">
                    <img class="circle z-depth-1" src="<?php echo IMG; ?>/misc/user.png"  width="30" style="margin-top: 20px;margin-left: 10px" id="image"/>

                    <!--<a id="logo-container" href="#" class="brand-logo "  style="font-weight: 300; font-size: 20px; margin-left: -40px">LOGIN</a>-->
                </div>
            </nav> 
        </div>

        <div class="row" style="margin: 0">

            <div class="col s4 z-depth-1" style="padding-bottom: 20px; height: 700px;;overflow: scroll;">
                <?php include 'home_template.php'; ?>
            </div>
            <div class="col s8 grey lighten-3" style="padding: 0;height: 660px; width: 650px; margin-top: 22px; margin-left: 15px;  overflow: scroll;">
                <div class="row">


                    <div class="black" style="position: fixed; width: 300px; height: 660px; margin-left: 350px;opacity: 0.6;">
                    </div>
                    <div style="position: fixed; margin-top: 170px;margin-left: 365px">

                        <img src="<?php echo IMG; ?>/game/level_selection.png"  width="250" style="margin-top: 20px;margin-left: 10px" id="image"/>
                        <div class="center-align" style="height: 50px; width: 250px; margin-left: 10px; margin-top: -345px;">
                            <p class="white-text" style="font-size: 20px;">Level 05</p>
                            <img src="<?php echo IMG; ?>/game/beer_cup.png"  width="80" id="image"/>
                            <div style="margin-top: 10px">
                                <i class="material-icons white-text">star_border</i>
                                <i class="material-icons white-text">star_border</i>
                                <i class="material-icons white-text">star_border</i>
                            </div>
                            <div class="red" style="margin-top: 5px;">
                                <img src="<?php echo IMG; ?>/game/to_complete.png"  width="220" style="margin-top: 10px;" id="image"/>
                            </div>
                            <div class="red" style="margin-top: 5px;">
                                <img src="<?php echo IMG; ?>/game/achievements.png"  width="180" style="margin-top: 10px;" id="image"/>
                            </div>
                            <a class="btn white black-text waves-effect waves-orange" style="margin-top: 10px; width: 90%; font-weight: 600">START</a>
                        </div>
                    </div>
                    <div class="bgimg" style="height: 2090px;">
                        <!--single level image(cup)-->
                        <div class="row" id="level_0_container">
                            <div class="col s4 center-align"> 
                         
                        <?php
                    if (sizeof($completed) == 14) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/15">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 15) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 15) {
                            if ($completed[14]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[14]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>15</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 150px; margin-left: 203px;" >
                            <div class="col center-align"> 
                                <?php
                    if (sizeof($completed) == 13) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/14">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 14) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 14) {
                            if ($completed[13]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[13]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>14</strong></div>
                            </div> 
                        </div>


                        <div class="row" id="level_0_container" style="margin-top: 150px; margin-left: 105px;" >
                            <div class="col center-align"> 
                                  <?php
                    if (sizeof($completed) == 12) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/13">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 13) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 13) {
                            if ($completed[12]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[12]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>13</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 100px; margin-left: 205px;" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 11) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/12">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 12) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                  <?php
                        if (sizeof($completed) >= 12) {
                            if ($completed[11]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[11]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>12</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 130px; margin-left: 10px;" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 10) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/11">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 11) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                   <?php
                        if (sizeof($completed) >= 11) {
                            if ($completed[10]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[10]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>11</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 90px; margin-left: 220px;" >
                            <div class="col center-align"> 
                                <?php
                    if (sizeof($completed) == 9) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/10">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 10) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 10) {
                            if ($completed[9]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[9]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>10</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 150px; margin-left: 220px;" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 8) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/9">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 9) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                  <?php
                        if (sizeof($completed) >= 9) {
                            if ($completed[8]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[8]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>09</strong></div>
                            </div> 
                        </div>


                        <div class="row" id="level_0_container" style="margin-top: 80px;" >
                            <div class="col center-align"> 
                                  <?php
                    if (sizeof($completed) == 7) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/8">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 8) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 8) {
                            if ($completed[7]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[7]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>08</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="current_level" style="margin-top: 190px; margin-left: 130px;" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 6) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/7">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 7) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                  <?php
                        if (sizeof($completed) >= 7) {
                            if ($completed[6]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[6]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>07</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 150px; margin-left: 220px;" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 5) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/6">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 6) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 6) {
                            if ($completed[5]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[5]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>06</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 120px;" >
                            <div class="col center-align"> 
                                  <?php
                    if (sizeof($completed) == 4) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/5">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 5) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 5) {
                            if ($completed[4]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[4]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                    <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>05</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 80px; margin-left: 180px" >
                            <a href="<?php echo BASE; ?>IpadController/load_map/4">
                                <div class="col center-align"> 
                                      <?php
                    if (sizeof($completed) == 3) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/4">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 4) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                    <div>
                                        <?php
                        if (sizeof($completed) >= 4) {
                            if ($completed[3]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[3]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                        <!--<i class="material-icons white-text" id="is_level_done">done</i>-->
                                    </div>
                                    <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>04</strong></div>
                                </div> 
                            </a>
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 230px;" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 2) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/3">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 3) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 3) {
                            if ($completed[2]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[2]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>03</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 150px; margin-left: 150px" >
                            <div class="col center-align"> 
                                 <?php
                    if (sizeof($completed) == 1) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/2">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 2) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                   <?php
                        if (sizeof($completed) >= 2) {
                            if ($completed[1]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[1]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>02</strong></div>
                            </div> 
                        </div>

                        <div class="row" id="level_0_container" style="margin-top: 170px; margin-left: 20px">
                            <div class="col center-align"> 
                             
                                    
                                    
                                     <?php
                    if (sizeof($completed) == 0) {
                        ?>                   
                        <a href="<?php echo BASE; ?>IpadController/load_map/1">
                             <img src="<?php echo IMG; ?>game/current_level_2.png" height="80" class="level" id="level_">
                        </a>
                    <?php } else if (sizeof($completed) >= 1) {
                        ?>
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="level" id="level_">
                            <?php
                        }
                        else{
                        ?>
                        
                        <img src="<?php echo IMG; ?>game/level_cup.png" height="80" class="invalid_level" id="level_">
                       
                    <?php
                        }
                        ?>
                                <div>
                                    <?php
                        if (sizeof($completed) >= 15) {
                            if ($completed[14]->star == '1') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text">star_border</i> 
                                <?php
                            } else if ($completed[14]->star == '2') {
                                ?>  
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star_border</i> 
                                <i class="material-icons white-text" id="is_level_done">done</i>
                                <?php
                            } else {
                                ?>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text">star</i>
                                <i class="material-icons white-text" id="is_level_done">done_all</i>
        <?php
    }
}
else{
   

?>
                           <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>      
                                <?php
}
                                ?>
                                </div>
                                <div class="white-text" style="margin: -90px;font-size: 20px;text-shadow: 1px 1px #000000"><strong>01</strong></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </body>
</html>