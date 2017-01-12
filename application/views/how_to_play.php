<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>How To Play</title>
    </head>

    <body>
        <div class="carousel carousel-slider center" data-indicators="true" style="height: 100%">
            <div class="carousel-fixed-item center">
                <a href="<?php echo BASE; ?>HomeController"  class="btn waves-effect orange white-text darken-text-2">Get Started</a>
            </div>
            <div class="carousel-item red white-text" href="#one!">
                <img src="<?php echo IMG; ?>how_to_play/1.jpg" width="300px" style="">
                <p class="white-text">This is your first panel</p>
            </div>
            <div class="carousel-item amber white-text" href="#two!">
                <img src="<?php echo IMG; ?>how_to_play/2.jpg" width="300px" style="">
                <p class="white-text">This is your second panel</p>
            </div>
            <div class="carousel-item green white-text" href="#three!">
                <img src="<?php echo IMG; ?>how_to_play/3.jpg" width="300px" style="">
                <p class="white-text">This is your third panel</p>
            </div>
            <div class="carousel-item blue white-text" href="#four!">
                <img src="<?php echo IMG; ?>how_to_play/4.jpg" width="300px" style="">
                <p class="white-text">This is your fourth panel</p>
            </div>
            <div class="carousel-item blue white-text" href="#four!">
                <img src="<?php echo IMG; ?>how_to_play/5.jpg" width="300px" style="">
                <p class="white-text">This is your fourth panel</p>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        $('.carousel.carousel-slider').carousel({full_width: true});
    </script>
</html>
