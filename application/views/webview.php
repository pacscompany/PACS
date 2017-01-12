<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Favourite Locations</title>

    </head>
    <body>
        <div class="orange z-depth-1" data-role="header" style="height: 50px">
            <h1 class="uppercase white-text">Pacs Company</h1>
            <!--<a href="#myPanel" class=" white-text ui-btn ui-corner-all ui-icon-bars ui-btn-icon-notext">Bars Icon</a>-->

        </div>
        <div class="ui-grid-b center-align" style="margin: 5px">
            <div class="ui-block-a" >
                <img class="" src="<?php echo IMG; ?>misc/logo.png" width="80" style="margin-top: 25px" id="lg_pic"/>
            </div>
            <div class="ui-block-b" >
                <p class="center-align orange-text uppercase " style="font-size: 12px">
                    We Feel like life is really short, 
                    and it's important to enjoy 
                    yourself and embrace 
                    whatever comes your way
                </p>
            </div>
            <div class="ui-block-c" >
                <img class="" src="<?php echo IMG; ?>misc/logo.png" width="80" style="margin-top: 25px" id="lg_pic"/>
            </div>
        </div>
        <div class="ui-grid-solo" style="padding: 10px">
            <video controls style=" width: 100%; border: thin solid orange;" > 
                <source src="<?php echo IMG; ?>game/game.mp4" type="video/mp4">
            </video>
        </div>

        <div class="ui-grid-solo center-align grey-text" style="font-size: 20px; padding: 10px">
            If you were looking for a mobile app
            to make you feel better  develop your 
            self and add mindfulness to  your life, 
            PACS App could be your app.
        </div>
        <div data-role="main" class="ui-content">
            <!--<a href="#myPopup" style="width: 100%" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-btn orange white-text waves-effect waves-light">Get Started</a>-->

            <a href="#myPopup" style="width: 100%" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-btn orange white-text waves-effect waves-light">Get Started</a>

            <div data-role="popup" id="myPopup" class="ui-content" data-overlay-theme="b" style="background-color: rgb(220, 220, 220); width: 300px">
                <div class="center-align ui-grid-solo" >
                    <h5>Sign In</h5>
                </div>
                <div class="ui-grid-solo center-align">
                    <img class="" src="<?php echo IMG; ?>misc/logo.png" width="180" id="lg_pic"/>
                </div>

                <div class="ui-grid-solo">
                    <a style="width: 100%" href="<?php echo BASE; ?>HomeController/load_login" class="ui-btn ui-btn-inline ui-corner-all ui-btn orange white-text waves-effect waves-light">Login</a>
                </div>

                <div class="ui-grid-solo center-align">
                    or
                </div>
                
                <div class="ui-grid-solo">
                    <a style="width: 100%"  href="<?php echo BASE; ?>HomeController/load_register" class="ui-btn ui-btn-inline ui-corner-all ui-btn orange white-text waves-effect waves-light">Register</a>
                </div>
                <!--                
                                <img src="<?php echo IMG; ?>webview/webmodal.png" style="width:800px;height:400px;" alt="Skaret View">
                                <p>Sign In</p>
                                <p style="position: fixed">Sign In</p>-->
            </div>
        </div>

    </body>
</html>
