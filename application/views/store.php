<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Profile</title>
        <style>
            .tabs .indicator{
                background-color: #fff;
            } 

        </style>
    </head>

    <body>

        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange z-depth-0" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Store</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div> 
        <div class="row" style="margin-top: -1px;">
            <div class="col s12" style="padding: 0">
                <ul class="tabs orange z-depth-1">
                    <li class="tab col s3"><a class="active" href="#test1"  style="color: #fff;">Trending</a></li>
                    <li class="tab col s3"><a  href="#test2" style="color: #fff;">Purchased</a></li>
                </ul>
            </div>
            <div id="test1" class="col s12" style="padding: 0">

                <div class="row" style="margin: 0">
                    <!--item start from here-->
                    <?php
                    if ($producs1 != NULL) {
                        $producs = json_decode($producs1);
                        foreach ($producs as $row) {
                            ?>
                            <div class="col s6" style="padding: 5px;">
                                <div class="card" style="margin-bottom: 0">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img src="<?php echo IMG; ?>store/<?php echo $row->image; ?>" />
                                    </div>
                                    <div class="card-content" style="padding: 5px">
                                        <div style="margin-top: -10px;">
                                            <div class="row" style="margin: 0px; margin-top: 10px;padding: 0">
                                                <div class="col s10" style="padding: 0;margin: 0; font-size: 18px">
                                                    <?php echo $row->item_name; ?>
                                                </div>
                                                <div class="col s2 right-align" style="padding: 0;">
                                                    <i class="material-icons right activator">more_vert</i>
                                                </div>
                                            </div>

                                            <p style="margin-top: -10px">
                                            <div class="row" style="margin: 0;padding: 0">
                                                <div class="col s7" style="padding: 0;margin: 0">
                                                    <a href="#" style="color: #87c54a;"><?php echo $row->typedes; ?></a>
                                                </div>
                                                <div class="col s5 right-align" style="padding: 0;">
                                                    <a href="#" style="color: #87c54a;">$<?php echo $row->item_price; ?></a>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card-reveal" style="padding: 10px">
                                        <span class="card-title grey-text text-darken-4"  style="font-size: 20px">
                                            <div class="row" style="margin: 0;padding: 0">
                                                <div class="col s11" style="padding: 0;margin: 0; font-size: 18px">
                                                    <?php echo $row->item_name; ?>
                                                </div>
                                                <div class="col s1 right-align" style="padding: 0;">
                                                    <i class="material-icons right" id="close_<?php echo $row->item_id; ?>">close</i>
                                                </div>
                                            </div>

                                        </span>
                                        <p>
                                            <?php echo $row->item_description; ?>
                                        </p>

                                        <button onclick="addToCart(<?php echo $row->item_id; ?>)" class="btn waves-effect waves-light orange"  style="width: 100%"> 
                                            Add to cart 
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--item end from here-->
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="fixed-action-btn " style="padding: 0; bottom: 45px; right: 5px;z-index: 999" onclick="loadCart()">
                    <a class="btn-floating btn-large orange" style="transform: scale(0.4,0.4)">
                        <label id="count" class="white-text" style="font-size: 36px;">3</label>
                    </a>
                </div>
                <div class="fixed-action-btn " style="padding: 0">
                    <a class="btn-floating waves-effect waves-light btn-large orange" onclick="loadCart()" >
                        <i class="material-icons">shopping_cart</i>
                    </a>
                </div>


            </div>
            <div id="test2" class="col s12">
                <?php
                if ($cat != NULL) {
                    foreach ($cat as $rowcat) {
                        ?>
                        <ul class="collection with-header  z-depth-1">

                            <li class="collection-header"><h5><?php echo $rowcat->name; ?></h5></li>
                            <?php
                            if ($purchase != NULL) {
                                $purchase1 = json_decode($purchase);
                                foreach ($purchase1 as $rowpurchase) {
                                    if ($rowpurchase->type == $rowcat->id) {
                                        ?>
                                        <li class="collection-item avatar">
                                            <img src="<?php echo IMG; ?>store/<?php echo $rowpurchase->image; ?>" width="80" class="circle" style="position: absolute; width: 60px; height: 60px; overflow: hidden; left: 5px; display: inline-block; vertical-align: middle;">
                                            <span class="title"><?php echo $rowpurchase->item_name; ?></span>
                                            <p>Wiskey<br>
                                                $<?php echo $rowpurchase->item_price; ?>
                                            </p>
                                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </ul>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
        <script>
            var count = 0;
            $("#count").text(count);
            function loadCart() {

                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'StoreController/getProductCount',
                    //  data: userarr,
                    //   dataType: 'json',
                    success: function (data) {
                        if (data > 0) {
                            window.location.href = '<?php echo BASE; ?>StoreController/load_cart';
                        } else {
                            Materialize.toast('Cart is empty', 1000);
                        }
                    }
                });

            }

            function updatecount() {
                count++;
                $('#count').fadeOut();
                $("#count").text(count);
                $('#count').fadeIn();
            }

            function addToCart(id) {
                $('#close_' + id).click();
                updatecount();
                var userarr = {
                    'id': id,
                    'purchase': '0',
                };
                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'StoreController/addToCart',
                    data: userarr,
                    //   dataType: 'json',
                    success: function (data) {

                    }
                });
            }
        </script>

    </body>

</html>
