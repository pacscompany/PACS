<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS | Login</title>
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
                            window.location.href = '<?php echo BASE; ?>';
                        }
                        else
                        {
                            $('.modal').modal({
                                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                                opacity: .5, // Opacity of modal background
                                in_duration: 300, // Transition in duration
                                out_duration: 200, // Transition out duration
                                starting_top: '4%', // Starting top style attribute
                                ending_top: '10%', // Ending top style attribute
                                ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                                 //   alert(data);
                                 
                                    console.log(modal, trigger);
                                },
                                complete: function () {
                                   // alert('Closed');
                                } // Callback for Modal close
                            }
                            );
                    alert(data);
//                    $("#msg").text(data);
//                            $('#modal1').modal('open');

                        }
                    }
                });
            }
        </script>
    </head>
    <body class="blue-grey lighten-5">
        <div class="container">
            <div class="card" style="margin-top: 60px;">
                <div class="center-align">
                    <img class="" src="<?php echo IMG; ?>misc/logo.png" width="150" style="margin-top: 30px" id="image"/>
                </div>

                <div class="container" style="padding: 10px">

                    <div class="input-field col s12" style="margin-top: 50px">
                        <input name="email" id="email"type="email" class="validate" value="<?php echo $email; ?>">
                        <label>Email</label>
                    </div>
                    <div class="input-field col s12" >
                        <input name="password" id="password" type="password" class="validate">
                        <label>Password</label>
                    </div>
                    <a class="waves-effect  orange waves-light btn" style="margin-top: 130px; margin-bottom: 15px; width: 100%" onclick="login()">Login</a>
                </div>
                
                <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4 id="msg"></h4>
              
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>

            </div>
            </div>
            
        </div>

        <!--
                <div class="section no-pad-bot" id="index-banner">
                    <div class="container">
                        <input type="text" name="email" id="email"/>
                        <input type="text" name="password" id="password"/>
                        <input type="button" value="Login" onclick="login()"/>  
                    </div>
                </div>-->

    </body>
</html>