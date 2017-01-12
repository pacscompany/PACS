<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
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
            .parallax{
                position: static;
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
                            <div class="col s6 center-align white-text" style=" padding: 0;">Up Coming Events</div>
                            <div class="col s3 right-align" style=" padding: 0;">
                                <i class="dropdown-button material-icons white-text" href='#'>more_vert</i>
                            </div>

                        </div>
                    </div>
                     <div class="col s8 white z-depth-1" style="margin-left: 120px; padding: 0;margin-top: -30px; height: 650px;overflow-x:hidden ;overflow-y: scroll">
                        <div id="index-banner" class="parallax-container">
                            <div class="section no-pad-bot">
                                <div class="container">
                                    <br><br>
                                    <h2 class="header center white-text text-lighten-2" >Oktober fest 2K17</h2>
                                    <div class="row center">
                                        <h5 class="header col s12 light">
                                            German Beer , German Traditions , German food Sri Lankan Style 
                                        </h5>
                                    </div>
                                    <div class="row center">
                                        <a href="#" id="download-button" class="btn-large waves-effect waves-light orange lighten-1">I'AM interested Email Me</a>
                                    </div>
                                    <br><br>

                                </div>
                            </div>
                            <div class="parallax"><img src="<?php echo IMG; ?>locations/s.jpg" alt="Unsplashed background img 1"></div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="icon-block">
                                    <h2 class="center brown-text"><i class="material-icons">cake</i></h2>
                                    <h5 class="center">Celebrate Oktoberfest With PACS</h5>

                                    <p class="light" style="text-align:justify">
                                        We Look forward to celebrate this annual event and its extraordinally atmosphere, complemented by a bar with a variety of brews,
                                        daily raffle draws and traditional games, competitions, talent shows karaoke nights, with an authentic buffet and much more
                                        This event is sponsered by PACS in collaboration with Prestige automobiles Sri Lanka which will provide a barnd new BMW i8 to a lucky winner at the end of the last day
                                    </p>
                                </div>
                            </div>

                            <div class="col s12">
                                <div class="icon-block">
                                    <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                                    <h5 class="center"> Booze Deals</h5>

                                    <p class="light" style="text-align:justify">
                                        Authentic ingredients are used for German brews by Three Coins  and Larger to brew the best traditional German beer which will take 
                                        your tase buds to a whole new world and you will never forget the taste of authentic German beer
                                        As  special offer we have made two shocking deal packs for you to enjoy 
                                    </p>
                                    <p class="light center-align">
                                        <u>Cocktail Pitchers</u> <br>
                                        Mojito 2800<br>
                                        Long Island Iced Tea 4500<br>
                                        Blue Bull frog 4900<br>
                                        Cuba Libre 2800<br><br>
                                        <u>Beer Bucket Deals</u> <br>
                                        Tsingto*5 = 1800<br>
                                        Corona*5 = 2300<br>
                                        Somerby*5 = 2300
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('.parallax').parallax();
        </script>

    </body>
</html>