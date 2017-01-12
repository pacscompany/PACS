<html>
    <head>
        <title>Your Website Title</title>
        <!-- You can use open graph tags to customize link previews.
        Learn more: https://developers.facebook.com/docs/sharing/webmasters -->

    </head>
    <body>
        <div style="background-color: #000; width: 100px; height: 100px;" onclick="myFunction()"></div>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
     window.fbAsyncInit = function() {
            FB.init({
                    appId: '372324059814851'
            });
            FB.Event.subscribe('edge.create', function(response) {
                    alert('You liked the URL: ' + response);
            });
            FB.Event.subscribe('edge.remove',function(response) {
                   alert('You UNliked the URL: ' + response);
            });
    };        
    (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=372324059814851";
                fjs.parentNode.insertBefore(js, fjs);

            }(document, 'script', 'facebook-jssdk'));
            
        function myFunction() {
    var x = document.getElementById("facebook");//[2].getAttribute("src"); 
    console.log(x);
}
        </script>
        <fb:like-box href="https://www.facebook.com/Celltronics.lk/?fref=ts" colorscheme="light" show_faces="false" header="false" stream="false" show_border="false"></fb:like-box>

        <!-- Your like button code -->
        <div class="fb-like" data-href="https://www.facebook.com/Celltronics.lk/?fref=ts" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
    </body>
</html>



