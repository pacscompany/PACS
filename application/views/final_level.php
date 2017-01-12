<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Favourite Locations</title>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300);
            @import url(https://fonts.googleapis.com/css?family=Montserrat);

            html, body{
                height: 100%;
                font-weight: 800;
            }

            body{
                background: #030321;
                font-family: Arial;
            }

            .text-copy {
                fill: none;
                stroke: white;
                stroke-dasharray: 6% 29%;
                stroke-width: 5px;
                stroke-dashoffset: 0%;
                animation: stroke-offset 5.5s infinite linear;
            }

            .text-copy:nth-child(1){
                stroke: #00fff0;
                animation-delay: -1;
            }

            .text-copy:nth-child(2){
                stroke: #ed01ff;
                animation-delay: -2s;
            }

            .text-copy:nth-child(3){
                stroke: #04fff1;
                animation-delay: -3s;
            }

            .text-copy:nth-child(4){
                stroke: #f2ff00;
                animation-delay: -4s;
            }

            .text-copy:nth-child(5){
                stroke: #f800ff;
                animation-delay: -5s;
            }


            @keyframes stroke-offset{
                100% {stroke-dashoffset: -35%;}
            }
            body {
                background: #BDBDBD;
            }

            h1 {
                text-align: center;
                color: #DDD;
                font-size: 3em;
                font-family: 'Open Sans Condensed', sans-serif;
            }

            #plate {
                position: fixed;
                margin: 0 auto;
                height: 250px;
                width: 250px;
                border-bottom: solid 5px #B4B4B4;
                border-radius: 0 0 10px 10px / 5px;
            }
            #plate:after {
                position: absolute;
                bottom: -10px;
                content: " ";
                margin: 0 25px;
                width: 200px;
                height: 5px;
                background-color: #DDD;
                border-radius: 0 0 5px 5px;
            }

            #bottle {
                position: absolute;
                width: 50px;
                bottom: 0;
                left: 100px;
                z-index: 10;
            }
            #bottle .cork {
                position: relative;
                margin: 0 auto;
                background-color: #8E1B1C;
                width: 20px;
                height: 40px;
                border-radius: 2px 2px 0 0;
                border-bottom: solid 3px #FBC85F;
            }
            #bottle .cork:before {
                position: absolute;
                top: 5px;
                left: -2px;
                display: block;
                content: " ";
                background-color: #8E1B10;
                border-top: solid 1px #9A2A1F;
                border-bottom: solid 1px #9A2A1F;

                width: 24px;
                height: 10px;
                border-radius: 2px;
            }
            #bottle .neck {
                margin: 0 auto;
                background-color: rgba(41, 105, 70, 0.9);
                width: 20px;
                height: 10px;
            }
            #bottle .body {
                position: relative;
                margin: 0 auto;
                padding-top: 30px;
                background-color: rgba(255, 152, 0, 0.75);
                width: 50px;
                height: 150px;
                border-radius: 20px 20px 5px 5px;  
            }
            /*
                #bottle .body:before {
                    position: absolute;
                    display: block;
                    content: " ";
                    bottom: 0;
                    width: 100%;
                    height: 50px;
                    background-color: rgba(0, 0, 0, 0.3);
                    border-radius: 0px 0px 5px 5px; 
                }
            */
            #bottle .label {
                position: relative;
                background-color: #F2EAB9;
                height: 30px;
                border: solid 2px #CFC89B;
                z-index: 25;
                animation: spinning-label 3s linear infinite;
            }
            #bottle .label-shadow {
                position: absolute;
                height: 34px;
                background-color: rgba(0, 0, 0, 0.3);
                top: 30px;
                z-index: 20;
                animation: spinning-shadow 3s linear infinite;
            }

            @keyframes spinning-label {
                0% {
                    margin-left: 0%;
                    border-left-width: 0px;
                    margin-right: 100%;
                    border-right-width: 2px;
                }
                49% {
                    border-left-width: 0px;
                    border-right-width: 2px;
                }
                50% {            
                    margin-left: 0%;
                    border-left-width: 2px;
                    margin-right: 0%;
                    border-right-width: 0px;
                }
                98% {
                    border-left-width: 2px;            
                }
                99% { 
                    margin-left: 100%;
                    border-left-width: 0px;
                    margin-right: 0%;
                    border-right-width: 0px;
                }
                100% {
                    margin-left: 0%;
                    border-left-width: 0px;
                    margin-right: 100%;
                    border-right-width: 0px;
                }
            }

            @keyframes spinning-shadow {
                0% {
                    left: 0;
                    width: 50px;
                    margin-left: 0px;
                }
                50% {     
                    left: 0;     
                    width: 0px;
                    margin-left: 0px;
                }
                51% {

                    margin-left: 50px;
                }
                100% {
                    width: 50px;
                    margin-left: 0;
                }
            }

            #glass {
                position: absolute;
                width: 40px;
                bottom: 0;
                left: 100px;

                animation: spinning-glass 3s ease-in-out infinite;
            }
            @keyframes spinning-glass {
                0% { 
                    left: 25px;
                    z-index: 20;
                }
                50% {
                    left: 185px;
                    z-index: 20;
                } 
                51% {
                    z-index: 0;                
                }
                100% {            
                    left: 25px;
                    z-index: 0;
                }
            }
            #glass .bowl {
                background-color: rgba(190, 190, 190, 0.5);
                padding-top: 10px;
                width: 40px;
                height: 30px;
                border-radius: 5px 5px 20px 20px / 20px;
            }  

            #glass .bowl .wine {
                background-color: #8E1B1C;
                margin: 0 auto;
                width: 30px;
                height: 25px;
                border-radius: 4px 4px 20px 20px / 20px;
            }  
            #glass .stem {
                margin: 0 auto;
                background-color: rgba(190, 190, 190, 0.5);
                width: 5px;
                height: 30px;        
            }
            #glass .foot {
                background-color: rgba(190, 190, 190, 0.5);
                width: 40px;
                height: 5px;
                border-radius: 20px 20px  0 0 / 5px;
            }

            #cork {
                position: absolute;
                height: 25px;
                width: 15px;
                bottom: 0;
                background-color: #F2EAB9;
                border-top: solid 2px #8E1B1C;

                animation: spinning-cork 3s ease-in-out infinite;
            }
            @keyframes spinning-cork {
                0% { 
                    left: 150px;
                    z-index: 0;
                }
                50% {
                    left: 85px;
                    z-index: 0;
                } 
                51% {
                    z-index: 20;                
                }
                100% {            
                    left: 150px;
                    z-index: 20;
                }
            }
        </style>
    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container">
                    <div class="row" style="margin: 0">
                        <div class="col s2">
                            <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                        </div>
                        <div class="col s8">
                            <a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Faviourite</a>
                        </div>
                        <div class="col s2 right-align">
                            <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                </div>
            </nav> 
        </div>

        <div id="plate" style="margin-left: 60px; margin-top: 250px">

            <div id="bottle">
                <div class="cork"></div>
                <div class="neck"></div>
                <div class="body">
                    <div class="label"></div>
                    <div class="label-shadow"></div>
                </div>
            </div>

            <div id="cork">
            </div>

            <div id="glass">
                <div class="bowl">
                    <div class="wine"></div>
                </div>
                <div class="stem"></div>
                <div class="foot"></div>
            </div>
        </div>
        <!--autoplay--> 
        <video controls autoplay style="width: 100%;"> 
            <source src="<?php echo IMG; ?>game/game.mp4" type="video/mp4">
        </video>
        <svg viewBox="0 0 4000 300" style=" position: fixed; margin-top: 30 ">
    <symbol id="s-text">
        <text text-anchor="middle" x="50%" y="80%" style="margin: 15px;font-size: 255px;">CONGRATULATIONS!</text>
    </symbol>

    <g class = "g-ants">
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    </g>
    </svg>
    <p class="white-text center-align" style="margin-top: 305px; font-weight: 600;position: fixed; font-family: sans-serif;">
        You have finally caught the thief and retrieved  our family treasure 
        Thank you very much detective for you'r hard work and exceptional puzzle solving skills 
        enkoy you'r grand prize
    </p>
    <canvas id="canvas" ></canvas>
    <script>
        fireworks();
        function fireworks() {
            var canvas = $('#canvas')[0];
            canvas.width = $(window).width();
            canvas.height = $(window).height();
            var ctx = canvas.getContext('2d');

            // resize
            $(window).on('resize', function () {
                canvas.width = $(window).width();
                canvas.height = $(window).height();
                ctx.fillStyle = '#000';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
            });

            // init
            ctx.fillStyle = '#000';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            // objects
            var listFire = [];
            var listFirework = [];
            var fireNumber = 5;
            var center = {x: canvas.width / 2, y: canvas.height / 2};
            var range = 150;
            for (var i = 0; i < fireNumber; i++) {
                var fire = {
                    x: Math.random() * range / 2 - range / 4 + center.x,
                    y: Math.random() * range * 2 + canvas.height,
                    size: Math.random() + 0.5,
                    fill: '#fd1',
                    vx: Math.random() - 0.5,
                    vy: -(Math.random() + 8),
                    ax: Math.random() * 0.02 - 0.01,
                    far: Math.random() * range + (center.y - range)
                };
                fire.base = {
                    x: fire.x,
                    y: fire.y,
                    vx: fire.vx
                };
                //
                listFire.push(fire);
            }

            function randColor() {
                var r = Math.floor(Math.random() * 256);
                var g = Math.floor(Math.random() * 256);
                var b = Math.floor(Math.random() * 256);
                var color = 'rgb($r, $g, $b)';
                color = color.replace('$r', r);
                color = color.replace('$g', g);
                color = color.replace('$b', b);
                return color;
            }

            (function loop() {
                requestAnimationFrame(loop);
                update();
                draw();
            })();

            function update() {
                for (var i = 0; i < listFire.length; i++) {
                    var fire = listFire[i];
                    //
                    if (fire.y <= fire.far) {
                        // case add firework
                        var color = randColor();
                        for (var i = 0; i < fireNumber * 5; i++) {
                            var firework = {
                                x: fire.x,
                                y: fire.y,
                                size: Math.random() + 1.5,
                                fill: color,
                                vx: Math.random() * 5 - 2.5,
                                vy: Math.random() * -5 + 1.5,
                                ay: 0.05,
                                alpha: 1,
                                life: Math.round(Math.random() * range / 2) + range / 2
                            };
                            firework.base = {
                                life: firework.life,
                                size: firework.size
                            };
                            listFirework.push(firework);
                        }
                        // reset
                        fire.y = fire.base.y;
                        fire.x = fire.base.x;
                        fire.vx = fire.base.vx;
                        fire.ax = Math.random() * 0.02 - 0.01;
                    }
                    //
                    fire.x += fire.vx;
                    fire.y += fire.vy;
                    fire.vx += fire.ax;
                }

                for (var i = listFirework.length - 1; i >= 0; i--) {
                    var firework = listFirework[i];
                    if (firework) {
                        firework.x += firework.vx;
                        firework.y += firework.vy;
                        firework.vy += firework.ay;
                        firework.alpha = firework.life / firework.base.life;
                        firework.size = firework.alpha * firework.base.size;
                        firework.alpha = firework.alpha > 0.6 ? 1 : firework.alpha;
                        //
                        firework.life--;
                        if (firework.life <= 0) {
                            listFirework.splice(i, 1);
                        }
                    }
                }
            }

            function draw() {
                // clear
                ctx.globalCompositeOperation = 'source-over';
                ctx.globalAlpha = 0.18;
                ctx.fillStyle = '#030321';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                // re-draw
                ctx.globalCompositeOperation = 'screen';
                ctx.globalAlpha = 1;
                for (var i = 0; i < listFire.length; i++) {
                    var fire = listFire[i];
                    ctx.beginPath();
                    ctx.arc(fire.x, fire.y, fire.size, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.fillStyle = fire.fill;
                    ctx.fill();
                }

                for (var i = 0; i < listFirework.length; i++) {
                    var firework = listFirework[i];
                    ctx.globalAlpha = firework.alpha;
                    ctx.beginPath();
                    ctx.arc(firework.x, firework.y, firework.size, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.fillStyle = firework.fill;
                    ctx.fill();
                }
            }
        }
    </script>

</body>
</html>
