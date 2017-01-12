<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Register</title>
        <style>
            /*tabs lin  e color*/
            .tabs .indicator{
                background-color: #fff;
            }  


        </style>
        <script type="text/javascript">
            function register() {
                var userarr = {
                    'first_name': $('#fname').val(),
                    'last_name': $('#lname').val(),
                    'telephone_number': $('#telno').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'image_url': $('#fname').val(),
                };
                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'UserController/register',
                    data: userarr,
                    dataType: 'json',
                    success: function (data) {
                        var yourval = jQuery.parseJSON(JSON.stringify(data));
                     //   alert(yourval[0].user_id);
                        window.location.href = '<?php echo BASE; ?>IpadController/load_login?image=' + yourval[0].image_url + '&email='+yourval[0].email;

                    }
                });
            }

            function uploadImage() {
document.getElementById("lg_pic").addEventListener("change", function readFile() {
        if (this.files && this.files[0]) {
            var FR = new FileReader();
            FR.onload = function (e) {
			document.getElementById("lg_pic").src = e.target.result;
            };
            FR.readAsDataURL(this.files[0]);
        }
    }, false);
            }

        </script>
    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container  center-align" style="width: 100%">
                    <a id="logo-container" href="#" class="brand-logo "  style="font-weight: 300; font-size: 20px; margin-left: -40px">REGISTER</a>
                </div>
            </nav> 
        </div>

        <div class="row" style="margin: 0">
            <div class="col s4 center-align" style="padding-bottom: 20px; height: 700px;overflow: scroll;">
                <img class="" src="<?php echo IMG; ?>misc/logo.png" width="300" style="margin-top: 180px" id="image"/>
                <a class="btn waves-effect orange waves-light" style="margin-top: 150px; height: 45px; width: 250px">Upload Image</a>
            </div>
            <div class="col s8 grey lighten-3  " style="padding: 0;">
                <div class="row">
                    <div class="col s12 m11 center-align" style="margin-left: 30px; margin-top: 30px">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo IMG; ?>/home/ipad/register.png" alt="" width="550"/>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s6">
                                        <div class="input-field col s12" >
                                            <input name="fname" id="fname"type="text" >
                                            <label>First Name</label>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="input-field col s12" >
                                            <input name="lname" id="lname"type="text" >
                                            <label>Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field col s12" >
                                            <input name="email" id="email"type="email" >
                                            <label>Email</label>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12" >
                                            <input name="password" id="password"type="password" >
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="input-field col s12" >
                                            <input name="lname" id="email"type="password" >
                                            <label>Password Confirm</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                <a class="waves-effect  orange waves-light btn" style=" width: 100%; height: 45px;" onclick="register()">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </body>
</html>