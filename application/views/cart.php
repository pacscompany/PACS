<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS | Login</title>
    </head>
    <body class="blue-grey lighten-5">

        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Bill</a>
                    <a href="<?php echo BASE; ?>StoreController/load_store" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div>
        <div class="container">
            <div class="card blue-grey lighten-5" style="padding: 40px; margin-top: 20px;margin-left: 30px;margin-right: 30px;" ></div>
            <div class="card" style="padding: 140px; margin-top: -75px;margin-left: 15px;margin-right: 15px;"></div>
            <div class="card " style="margin-top: -275px;">
                <div class="" style="padding: 20px 15px;">
                    <div class="center-align blue-grey lighten-5" >
                        <img class="" src="<?php echo IMG; ?>misc/logo.png" width="150" style="margin-top: 15px" id="image"/>
                        <div class="container left-align" style="padding-top: 30px; padding-bottom: 10px">
                            <?php
                            $total = 0;
                            if ($purchase != NULL) {
                                $purchase1 = json_decode($purchase);
                                foreach ($purchase1 as $rowpurchase) {
                                    $total+=intval($rowpurchase->item_price);
                                    ?>
                                    <div class="row" style="margin: 0" id="div<?php echo $rowpurchase->cartid; ?>">
                                        <div class="col s8" style="padding: 0">
                                            <input onchange="removeCart(<?php echo $rowpurchase->cartid; ?>)" type="checkbox" class="filled-in" id="check<?php echo $rowpurchase->cartid; ?>" checked="checked" />
                                            <label class="black-text" for="check<?php echo $rowpurchase->cartid; ?>" style="font-size: 15px;"><?php echo $rowpurchase->item_name; ?></label>
                                        </div>
                                        <div class="col s4 right-align" style="padding: 0">
                                            <span id="myspan<?php echo $rowpurchase->cartid; ?>">$<?php echo $rowpurchase->item_price; ?></span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="row" style="margin: 0; margin-top: 10px; margin-bottom: 10px; padding-bottom: 5px; border-top: thin dashed #000;border-bottom: thin dashed #000;">
                                <div class="col s7" style="padding: 0">
                                    <span>TOTAL</span>
                                </div>
                                <div class="col s5 right-align" style="padding: 0">
                                    <p id="total" style="margin: 0px;">$<?php echo $total; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin: 0; margin-top: 5px;">
                        <div class="col s6" style="padding: 0">
                            <a class="waves-effect  orange waves-light btn modal-trigger" href="#modal1" onclick="redeempopup()" style="margin-top: 15px;width: 100%">Redeem</a>
                        </div>
                        <div class="col s6 right-align" style="padding: 0; padding-left: 5px">
                            <a class="waves-effect  orange waves-light btn" style="margin-top: 15px;width: 100%" >Checkout</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content" style="padding: 10px;height: 150px;">
                <div class="row">
                    <div class="col s6 left-align">
                        <img src="<?php echo IMG; ?>bill/coin.png" width="40" />
                        <?php
                        $coins = 0;
                        //$res = json_decode($result);
                        foreach ($userdet as $row1) {
                            $coins = $row1->points;
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
                        <br>Bill<br> $<?php echo $total; ?>
                    </div>
                </div>
                <div class="row center-align">
                    <?php
                    if (intval($total) > intval($points)) {
                        ?>
                        <p class="uppercase"> 
                            you need 
                            <span class="orange-text"><?php echo $total; ?></span>
                            <span class="orange-text">coins</span>  
                            to redeem this bill
                        </p>
                        <?php
                    } else {
                        ?>
                        <p class="uppercase"> 
                            you can redeem this bill
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
                        <button class="btn waves-effect waves-light orange modal-close" id="redeem_comtinue"  name="action" style="width: 100%">
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            function removeCart(id) {
                var va = $('#check' + id).is(':checked');
                if (va == true) {

                } else {

                    var userarr = {
                        'id': id,
                    };
                    $.ajax({
                        type: 'post',
                        url: '<?php ECHO BASE; ?>' + 'StoreController/deletFromCart',
                        data: userarr,
                        //   dataType: 'json',
                        success: function (data) {
                            $('#div' + id).fadeOut();
                            var x = '#total' + id;
                            var y = <?php echo $total; ?>;
                            console.log('total ' + y);
                            console.log('ywcw ' + data);
                            var xx = y - data;
                            console.log(xx);
                            console.log($(x).text());
                            console.log(id);
                            $("#total").text('$'+xx);
                            $(x).text(xx);
                        }
                    });
                }
            }
            function checkout() {
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
            function goback() {
                window.location.href = '<?php echo BASE; ?>HomeController/load_gamelevel';

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
                    'score': <?php echo $total; ?>,
                };
                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'StoreController/payRedeeme',
                    data: userarr,
                    //   dataType: 'json',
                    success: function (data) {
                        window.location.href = '<?php echo BASE; ?>StoreController/load_store';
                    }
                });

            });

        </script>
    </body>
</html>