<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Login</title>
        <style>
            /*tabs lin  e color*/
            .tabs .indicator{
                background-color: #fff;
            }  


        </style>
         <script>
            function login() {
                var userarr = {
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                };
                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'UserController/login',
                    data: userarr,
                    //   dataType: 'json',
                    success: function (data) {
                        // alert(data);
                        if (data == "1") {
                            window.location.href = '<?php echo BASE; ?>IpadController';
                        }
                        else
                        {
                            
                    $("#msg").text(data);
                            $('#modal1').openModal();

                        }
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container  center-align" style="width: 100%">
                    <a id="logo-container" href="#" class="brand-logo "  style="font-weight: 300; font-size: 20px; margin-left: -40px">LOGIN</a>
                </div>
            </nav> 
        </div>

        <div class="row" style="margin: 0">
            <div class="col s4 center-align" style="padding-bottom: 20px; height: 700px;overflow: scroll;">
                <img class="circle" src="<?php echo IMG; ?>/misc/user.png"  width="300" style="margin-top: 180px; margin-bottom:25px" id="image"/>
                <a class="grey-text" style="height: 45px; width: 250px; font-size: 15px">NOT YOUR ACCOUNT?</a>
            </div>
            <div class="col s8 grey lighten-3  " style="padding: 0;">
                <div class="row">
                    <div class="col s12 m11 center-align" style="margin-left: 30px; margin-top: 30px">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo IMG; ?>/home/ipad/login.png" alt="" width="550"/>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12">
                                        <div class="input-field col s12" >
                                            <input name="email" id="email"type="email" >
                                            <label>Email</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col s12">
                                        <div class="input-field col s12" >
                                            <input name="password" id="password"type="password" >
                                            <label>Password</label>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="card-action">
                                <a class="waves-effect  orange waves-light btn" style=" width: 100%; height: 45px;" onclick="login()">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4 id="msg"></h4>
            </div>
            <div class="modal-footer">
                <a class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>
        </div>


    </body>
</html>