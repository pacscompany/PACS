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
            <div class="col s4 z-depth-1" style="padding-bottom: 20px; height: 700px;;overflow: scroll;">
                <?php include 'home_template.php'; ?>
            </div>
            <div class="col s8" style="padding: 0;">
                <div class="row" style="padding: 0; margin: 0">
                    <div class="col s12 orange" style="height: 70px">
                        <div class="col s8" style="margin-left: 110px; padding: 0; margin-top: 10px; width: 460px;">
                            <div class="col s3 " style=" padding: 0;">
                                <i class="material-icons white-text">arrow_back</i>
                            </div>
                            <div class="col s6 center-align white-text" style=" padding: 0;">Machan Nawala</div>
                            <div class="col s3 right-align" style=" padding: 0;">
                                <i class="material-icons white-text">more_vert</i>
                            </div>
                        </div>
                    </div>
                    <div class="col s8 white z-depth-1" style="margin-left: 120px; padding: 0;margin-top: -30px; height: 85%;">
                        <div class="container" style="transform: scale(1.1,1.1);">
                            <div class="card " style="margin-top: 60px">
                                <div class="" style="padding: 20px 15px;">
                                    <div class="center-align blue-grey lighten-5" >
                                        <img class="" src="<?php echo IMG; ?>misc/logo.png" width="150" style="margin-top: 15px" id="image"/>
                                        <div class="container left-align" style="padding-top: 30px">
 <?php
                            $billid;
                            $loc;
                            $locid;
                            $res = json_decode($result);
                            foreach ($res as $row) {
                                $loc=$row->loc;
                                $locid=$row->location_id;
                                ?>
                                            <div style="font-size: 12px">
                                                <div class="row" style="margin: 0">
                                                    <div class="col s4" style="padding: 0">
                                                        <span>Customer</span>
                                                    </div>
                                                    <div class="col s8 left-align" style="padding: 0">
                                                        <span>: Charitha</span>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin: 0">
                                                    <div class="col s4" style="padding: 0">
                                                        <span>Token</span>
                                                    </div>
                                                    <div class="col s8 left-align" style="padding: 0">
                                                        <span>:  <?php $billid= $row->bill_id;  echo $row->token_id; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin: 0">
                                                    <div class="col s4" style="padding: 0">
                                                        <span>Date</span>
                                                    </div>
                                                    <div class="col s8 left-align" style="padding: 0">
                                                        <span>: 26 Dec 2016 15:20</span>
                                                    </div>
                                                </div>
                                            </div>
<?php
                            }
                            ?>
                            <?php
                            $res = json_decode($result);
                            foreach ($res as $row) {
                                $original_array = unserialize($row->items);
                                //   print_r($original_array);
                                //    print_r(sizeof($original_array[0]));

                                for ($i = 0; $i < sizeof($original_array[0]); $i++) {
                                    // for($j=0; $j < sizeof($original_array[0][$i]); $j++){
                                    ?>

                                            <div class="row" style="margin: 0; margin-top: 10px">
                                                <div class="col s6" style="padding: 0">
                                                    <span><?php print_r($original_array[0][$i][0]); ?></span>
                                                </div>
                                                <div class="col s3 right-align" style="padding: 0">
                                                    <span><?php print_r($original_array[0][$i][1]); ?></span>
                                                </div>
                                                <div class="col s3 right-align" style="padding: 0">
                                                    <span><?php print_r($original_array[0][$i][2]); ?></span>
                                                </div>
                                            </div>
                                            <?php
                                    //  }
                                }
                            }
                            ?>
                            <?php
                            $res = json_decode($result);
                            foreach ($res as $row) {
                                ?>
                                            <div class="row" style="margin: 0; margin-top: 10px">
                                                <div class="col s7" style="padding: 0">
                                                    <span>SUBTOTAL</span>
                                                </div>
                                                <div class="col s5 right-align" style="padding: 0">
                                                    <span>$<?php echo $row->bill_amount; ?></span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin: 0; border-bottom: thin dashed #000;">
                                                <div class="col s7" style="padding: 0">
                                                    <span>SERVICE CHARGES</span>
                                                </div>
                                                <div class="col s5 right-align" style="padding: 0">
                                                    <span>$<?php echo $row->servicecharge; ?></span>
                                                </div>
                                            </div>

                                            <div class="row" style="margin: 0; margin-top: 10px; padding-bottom: 5px">
                                                <div class="col s7" style="padding: 0">
                                                    <span>TOTAL</span>
                                                </div>
                                                <div class="col s5 right-align" style="padding: 0">
                                                    <span>$<?php echo intval($row->bill_amount) + intval($row->servicecharge); ?></span>
                                                </div>
                                            </div>
                                             <?php
                                //  }
                            }
                            ?>
                                        </div>
                                    </div>

                                    <div class="row" style="margin: 0; margin-top: 5px;">
                                        <div class="col s6" style="padding: 0">
                                            <a class="waves-effect  orange waves-light btn" style="margin-top: 15px;width: 100%" onclick="redeempopup()">Redeem</a>
                                        </div>
                                        <div class="col s6 right-align" style="padding: 0; padding-left: 5px">
                                            <a class="waves-effect  orange waves-light btn" style="margin-top: 15px;width: 100%" onclick="checkout()">Checkout</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                      <!-- Modal Structure -->
        <?php
        $points = 0;
        $amount = 0;
        $billscore = 0;
        $res = json_decode($result);
        foreach ($res as $row) {
            ?>
            <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content" style="padding: 10px;height: 150px;">
                    <div class="row">
                        <div class="col s6 left-align">
                            <img src="<?php echo IMG; ?>bill/coin.png" width="40" />
                            <?php
                            //$res = json_decode($result);
                            foreach ($userdet as $row1) {
                                ?>
                                <br>Coins<br> <?php
                                $points = $row1->points;
                                echo $row1->points;
                                ?>
                                <?php
                            }
                            ?>
                        </div> 
                        <div class="col s6 right-align">
                            <img src="<?php echo IMG; ?>bill/bill.png" width="40" />
                            <br>Bill<br> <?php
                            $amount = intval($row->bill_amount) + intval($row->servicecharge);
                            echo intval($row->bill_amount) + intval($row->servicecharge);
                            ?>
                        </div>
                    </div>
                    <div class="row center-align">
                        <?php
                        if ($points < $amount) {
                            ?>
                            <p class="uppercase"> 
                                you need 
                                <span class="orange-text"><?php echo $amount - $points; ?></span>
                                <span class="orange-text">coins</span>  
                                to redeem this bill
                            </p>
                            <?php
                        } else {
                            ?>
                            <p class="uppercase"> 
                                you  
                                can  
                                to redeem this bill
                            </p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer" style="    margin-bottom: 5px;">
                    <div class="row" style="margin: 0">
                        <div class="col s6">
                            <button class="btn waves-effect waves-light grey modal-close" style="width: 100%">
                                Cancel
                            </button>
                        </div>
                        <div class="col s6">
                            <?php
                            if ($points < $amount) {
                                ?>
                                <button class="btn disabled waves-effect waves-light orange modal-close" id="redeem_comtinue1"  name="action" style="width: 100%">
                                    Continue
                                </button>
                                <?php
                            } else {
                                ?>
                                <button class="btn waves-effect waves-light orange modal-close" id="redeem_comtinue"  name="action" style="width: 100%">
                                    Continue
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
      //echo intval($game);
        if ($amount > 100) {
            $billscore = intval($game) + 500;
        } else if ($amount > 90) {
            $billscore = intval($game) + 400;
        } else if ($amount > 75) {
            $billscore = intval($game) + 300;
        } else if ($amount > 50) {
            $billscore = intval($game) + 200;
        } else if ($amount > 0) {
            $billscore = intval($game) + 100;
        } else {
            $billscore = intval($game) + 10;
        }
        ?>
        <div id="modal2" class="modal z-depth-0 center-align" style="margin-top: 120px; height: 335px; background-color: rgba(250, 250, 250, 0) !important;">
            <img src="<?php echo IMG; ?>/game/level_selection.png"  width="250"/>   
            <div class="center-align" style="margin-top: -340px;">
                <p class="white-text" style="font-size: 20px;">Level <?php echo $gamelevel; ?> Completed</p>
                <img src="<?php echo IMG; ?>/bill/achievements_complete.png"  width="150" style="margin-top: 10px"/>
                <?php
                $star=3;
                if ((($billscore / 1000) * 100) >= 75) {
                    
                    ?>
                    <div style="margin-top: 15px">
                        <i class="material-icons white-text">star</i>
                        <i class="material-icons white-text">star</i>
                        <i class="material-icons white-text">star</i>
                    </div>
                    <?php
                } else if ((($billscore / 1000) * 100) >= 50) {
                    $star=2;
                    ?>
                    <div style="margin-top: 15px">
                        <i class="material-icons white-text">star</i>
                        <i class="material-icons white-text">star</i>
                        <i class="material-icons white-text">star_border</i>
                    </div>
                    <?php
                } else if((($billscore / 1000) * 100) >= 20) {
                    $star=1;
                    ?>
                    <div style="margin-top: 15px">
                        <i class="material-icons white-text">star</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                    </div>
                    <?php
                }else{
                    $star=0;
                ?>
                 <div style="margin-top: 15px">
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                        <i class="material-icons white-text">star_border</i>
                    </div>
                <?php
                }
                ?>
                <div class="progress grey lighten-3" style="width: 180px; height: 15px; margin-left: 58px; margin-top: 25px">
                    <div class="orange darken-4 determinate" style="width: <?php echo ($billscore / 1000) * 100; ?>%; "></div>
                </div>
                <h4 class="white-text counter" id="score" style="font-weight: 200; width: 0; margin-left: 85;">00</h4>
                <h4 class="white-text" style="font-weight: 200;width: 0; margin-left: 145px; margin-top: -47px;">/1000</h4> 
                <button class="btn waves-effect waves-light  grey lighten-2 black-text modal-close" href="#modal2" onclick="goback()"  name="action" style="width: 190px">
                    Continue
                </button>
            </div>
        </div>
 <canvas id="canvas" hidden=""></canvas>

        <audio id="clickSound">
            <source src="<?php echo IMG; ?>bill/complete.mp3"></source>
        </audio>


        <script>
            function checkout(){
                 $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'HomeController/levelCompletedpaypal',
                   // data: userarr,
                    //   dataType: 'json',
                    success: function (data) {
                            window.location.href = '<?php echo BASE; ?>StoreController/purchase';
                    }
                });
            }
            function goback(){
                window.location.href = '<?php echo BASE; ?>IpadController/load_gamelevel';
            }
//            $(document).ready(function () {
//                $('.modal-trigger').leanModal();
//            });
//            $('#modal1').openModal();
            function redeempopup() {
//                $(document).ready(function () {
//                    $('.modal-trigger').leanModal();
//                });
                $('#modal1').openModal();
            }

            function ClosePopup() {
                $('#modal1').modal('close');
            }
//            

            $('#redeem_comtinue').click(function () {
                var userarr = {
                    'score': <?php echo $billscore; ?>,
                    'locid': <?php echo $locid; ?>,
                    'loc': <?php echo $loc; ?>,
                    'biilid': <?php echo $billid; ?>,
                    'levelid': <?php echo $gamelevel; ?>,
                    'star': <?php echo $star; ?>,
                    'amount': <?php echo $amount; ?>,
                };
                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'HomeController/levelCompleted',
                    data: userarr,
                    //   dataType: 'json',
                    success: function (data) {

                    }
                });
                
                        $('#modal2').openModal({dismissible: false});
                var audio = $("#clickSound")[0];
                audio.play();
                $('#canvas').show();

                $('html, body').animate({
                    scrollTop: $("#canvas").offset().top
                }, 200);
                fireworks();
                $('#score').attr('data-count', <?php echo $billscore; ?>);
                $('.counter').each(function () {
                    var $this = $(this),
                            countTo = $this.attr('data-count');
                    $({countNum: $this.text()}).animate({
                        countNum: countTo
                    },
                    {
                        duration: 1000,
                        easing: 'linear',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                        }
                    });
                });
            });
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
                var fireNumber = 20;
                var center = {x: canvas.width / 2, y: canvas.height / 2};
                var range = 300;
                for (var i = 0; i < fireNumber; i++) {
                    var fire = {
                        x: Math.random() * range / 2 - range / 4 + center.x,
                        y: Math.random() * range * 2 + canvas.height,
                        size: Math.random() + 2.5,
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
                    ctx.fillStyle = 'indigo';
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