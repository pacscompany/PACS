<?php






?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<p><button onclick="geoFindMe()">Show my location</button></p>
<div id="out"></div>

<script type="text/javascript">
  
  function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }

  else{

     navigator.geolocation.getCurrentPosition(success, error);
  }

 
  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    output.innerHTML = '<h3>Latitude is ' + latitude + '<br>Longitude is ' + longitude + '</h3>';

    var img = new Image();
    img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=500x500&sensor=false";

    output.appendChild(img);
  }

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  }




}

</script>
</body>
</html>
