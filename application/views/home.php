<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
    </head>
    <body>
        <script>
    window.fbAsyncInit = function() {
            FB.init({
                    appId: '{372324059814851}'
            });
            FB.Event.subscribe('edge.create', function(response) {
                    $("#newslettr").empty();
                     var postData = {
                    'sub': '1'
                };
                $.ajax({
                    type: "POST",
                    data: postData,
                    url: "<?php echo BASE; ?>HomeController/uptadeusersub",
                  //  dataType: "json",
                    success: function (msg) {
                       // alert(msg);
                       // alert("#" + locid + loc + "li");
                        $('#newslettr').append('<a href="<?php echo BASE; ?>HomeController/load_newsletter" class="waves-effect" style="font-size: 18px;"><i class="material-icons">event</i>Upcoming Events <span class="new badge orange" style="font-size: 18px;">1</span></a>');
                    
                    }
                });
                    
                    
            });
            FB.Event.subscribe('edge.remove',function(response) {
                
                   });
    };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id; //js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=372324059814851";
            fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
</script>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Home</a>
                    <ul id="slide-out" class="side-nav" >
                        <li>
                            <div class="userView" >
                                <div class="background">
                                    <img src="http://lsa5.0.assets.s3.amazonaws.com/wp-content/uploads/2014/12/DSC_5308.jpg" width="300px" style="filter: blur(2px);">
                                </div>
                                <a href="<?php echo BASE; ?>HomeController/load_userprofile"><img class="circle" src="<?php echo IMG; ?>/misc/user.png" ></a>
                                <a href="#!name"><span class="white-text name">Charitha</span></a>
                                <a href="#!email"><span class="white-text email">charitha@gmail.com</span></a>
                            </div>
                        </li>
                        <li><a href="<?php echo BASE; ?>" class="waves-effect" style="font-size: 18px;"><i class="material-icons">home</i>Home</a></li>
                        <?php if($subscribe == 0){ ?>
                         <li id="newslettr"><div class="fb-like" data-href="https://www.facebook.com/Celltronics.lk/?fref=ts" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div></li>
                        <?php }
                        else
                        { ?>
                        <li><a href="<?php echo BASE; ?>HomeController/load_newsletter" class="waves-effect" style="font-size: 18px;"><i class="material-icons">event</i>Upcoming Events <span class="new badge orange"  style="font-size: 18px;">1</span></a></li>
                        <?php
                        }
                        ?>
                        <li><a href="<?php echo BASE; ?>HomeController/load_leaderboard" class="waves-effect" style="font-size: 18px;"><i class="material-icons">list</i>Leader Board</a></li>
                        
                        <li><a href="<?php echo BASE; ?>HomeController/load_statistics" class="waves-effect" style="font-size: 18px;"><i class="material-icons">timeline</i>Statistics</a></li>
                        <li><a href="<?php echo BASE; ?>StoreController/load_store" class="waves-effect" style="font-size: 18px;"><i class="material-icons">store</i>Store</a></li>
                        <li><a href="<?php echo BASE; ?>HomeController/load_howtoplay" class="waves-effect" style="font-size: 18px;"><i class="material-icons">help</i>How To Play</a></li>


                    </ul>
                    <a href="#" data-activates="slide-out" class="button-collapse" style="margin-left: 0 ">
                        <i class="material-icons" style="font-size: 2rem;">menu</i>
                    </a>
                </div>
            </nav> 
        </div>


        <div class="container" style="margin: 0px 10px; width: auto">

            <div class="card" style="margin: 0; margin-top: 10px">
                <div class="card-image waves-effect waves-block waves-light">
                    <a href="<?php echo BASE; ?>HomeController/load_gamelevel">
                        <img src="<?php echo IMG; ?>home/play.png" />
                    </a>
                </div>
            </div>

            <div class="card" style="margin-top:8px; margin-bottom: 0px">
                <div class="card-image waves-effect waves-block waves-light">
                    <a href="<?php echo BASE; ?>HomeController/load_slovedclues">
                        <img src="<?php echo IMG; ?>home/s_clues.png" />
                    </a>
                </div>
            </div>

            <div class="card" style="margin-top:8px; margin-bottom: 0px">
                <div class="card-image waves-effect waves-block waves-light">
                     <a href="<?php echo BASE; ?>HomeController/visited_locations">
                    <img src="<?php echo IMG; ?>home/visited.png" />
                     </a>
                </div>
            </div>

            <div class="card" style="margin-top:8px; margin-bottom: 0px">
                <div class="card-image waves-effect waves-block waves-light">
                     <a href="<?php echo BASE; ?>HomeController/load_faviorite">
                    <img src="<?php echo IMG; ?>home/favorites.png" />
                     </a>
                </div>
            </div>

            <div class="card" style="margin-top:8px; margin-bottom: 0px">
                <div class="card-image waves-effect waves-block waves-light">
                    <a href="<?php echo BASE; ?>HomeController/booked_locations">
                        <img src="<?php echo IMG; ?>home/bookings.png" />
                </div>
            </div>

            <div class="card" style="margin-top:8px; margin-bottom: 0px">
                <div class="card-image waves-effect waves-block waves-light">
                   <a href="<?php echo BASE; ?>StoreController/load_store">
                        <img src="<?php echo IMG; ?>home/store.png" />
                   </a>
                </div>
            </div>
        </div>
    </body>
</html>
