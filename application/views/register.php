<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS | Register</title>

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
                        window.location.href = '<?php echo BASE; ?>HomeController/load_login?image=' + yourval[0].image_url + '&email='+yourval[0].email;

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
    <body class="blue-grey lighten-5">
        <!--        <div class="section no-pad-bot" id="index-banner">
                    <div class="container">
        
                        <input type="text" name="fname" id="fname"/>
                        <input type="text" name="lname" id="lname"/>
                        <input type="text" name="telno" id="telno"/>
                        <input type="text" name="email" id="email"/>
                        <input type="text" name="password" id="password"/>
                        <input type="file" name="image" id="image"/>
                        <input type="button" value="Register" onclick="register()"/> 
                    </div>
                </div>-->

        <div class="container">
            <div class="card blue-grey lighten-5" style="padding: 40px; margin-top: 20px;margin-left: 30px;margin-right: 30px;" ></div>
            <div class="card" style="padding: 140px; margin-top: -75px;margin-left: 15px;margin-right: 15px;"></div>
            <div class="card" style="margin-top: -275px;">
                <div class="center-align">
                    <img onclick="uploadImage()" class="" src="<?php echo IMG; ?>misc/logo.png" width="150" style="margin-top: 15px" id="lg_pic"/>
                   
                </div>

                <div class="container" style="padding: 10px">
                    <div class="input-field col s12" >
                        <input name="fname" id="fname" type="text" class="validate">
                        <label>First Name</label>
                    </div>
                    <div class="input-field col s12" >
                        <input name="lname" id="lname" type="text" class="validate">
                        <label>Last Name</label>
                    </div>
                    <div class="input-field col s12" >
                        <input name="telno" id="telno" type="number" class="validate">
                        <label>Tel Number</label>
                    </div>
                    <div class="input-field col s12" >
                        <input name="email" id="email"type="email" class="validate">
                        <label>Email</label>
                    </div>
                    <div class="input-field col s12" >
                        <input name="password" id="password" type="password" class="validate">
                        <label>Password</label>
                    </div>
                    <a class="waves-effect  orange waves-light btn" style="width: 100%" onclick="register()">Continue</a>
                </div>


            </div>

        </div>



    </body>
</html>