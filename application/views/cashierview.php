<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS | Register</title>

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
         <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Token Id" id="token" type="text" class="validate">
          <label for="first_name">Token</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" placeholder="Token Id" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email" type="email" class="validate">
            <label for="email" data-error="wrong" data-success="right">Email</label>
          </div>
        </div>
      </div>
    </form>
  </div>

        </div>



    </body>
</html>