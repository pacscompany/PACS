<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>

    </head>

    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Solved Clues</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div> 

    
        <div class="carousel carousel-slider">
             <?php if($count > 0){ ?>
                
            <a class="carousel-item" href="#one!">
               
                <img src="<?php echo IMG; ?>clues/1.png" width="300px" style="">
            </a>
                <?php }?>
            <?php if($count > 1){ ?>
                
            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/2.png" width="300px" style="">
            </a>
             <?php }?>
             <?php if($count > 2){ ?>
            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/3.png" width="300px" style="">
            </a>
            <?php }?>
        </div>
        
        <div class="carousel carousel-slider">
            <?php if($count > 3){ ?>
            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/4.png" width="300px" style="">
            </a>
            <?php }?>
            <?php if($count > 4){ ?>
            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/5.png" width="300px" style="">
            </a>
            <?php }?>
            <?php if($count > 5){ ?>
            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/6.png" width="300px" style="">
            </a>
            <?php }?>
        </div>
        
        <div class="carousel carousel-slider">
            <?php if($count > 6){ ?>
            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/7.png" width="300px" style="">
            </a>
            <?php }?>
<!--            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/8.png" width="300px" style="">
            </a>-->
<!--            <a class="carousel-item" href="#one!">
                <img src="<?php echo IMG; ?>clues/9.png" width="300px" style="">
            </a>-->
        </div>

        <script>
            $(document).ready(function () {
                $('.carousel.carousel-slider').carousel({full_width: true});
            });
        </script>

    </body>

</html>
