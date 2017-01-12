<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
        <style>
            .carousel-item{
                
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
                    <div class="carousel carousel-slider" style="margin-top: 30px;">
                        <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"style="padding: 15px; height: 650px"></a>
                        <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2" style="padding: 15px; height: 650px"></a>
                        <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3" style="padding: 15px; height: 650px"></a>
                        <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4" style="padding: 15px; height: 650px"></a>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.carousel.carousel-slider').carousel({full_width: true});
            });
        </script>
    </body>
</html>