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
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="font-weight: 300">Statistics</a>
                    <a href="<?php echo BASE; ?>" style="margin-left: 0"><i class="material-icons">arrow_back</i></a>
                </div>
            </nav> 
        </div> 
        <div class="row" style="margin-top: -1px;">
            <div class="col s12" style="padding: 0">
                <ul class="tabs orange z-depth-1">
                    <li class="tab col s3"><a class="active" href="#test1" onclick="showstats()" style="color: #fff;">Day</a></li>
                    <li class="tab col s3"><a href="#test2" style="color: #fff;" onclick="showstats()">Week</a></li>
                    <li class="tab col s3"><a href="#test3" style="color: #fff;" onclick="showstats()">Month</a></li>
                </ul>
            </div>
            <div id="test1" class="col s12">
                <div class="card" style="margin-top: 25px">
                    <canvas id="statsday" width="355" height="250"></canvas>
                </div>
                <div class="card" style="margin-top: 35px;">
                    <div class="row center-align">
                        <div class="col s6" style="padding: 10px">
                            <canvas id="myChart" width="150" height="150"></canvas>
                            Active
                        </div>
                        <div class="col s6" style="padding: 10px">
                            <canvas id="myChart2" width="150" height="150"></canvas>
                            Inactive 
                        </div>
                    </div>
                </div>
            </div>
            <div id="test2" class="col s12">
                <div class="card" style="margin-top: 5px">
                    <canvas id="statsweek" width="355" height="250"></canvas>
                </div>
                <div class="card" style="margin-top: 35px;">
                    <div class="row center-align">
                        <div class="col s6" style="padding: 10px">
                            <canvas id="myChart3" width="150" height="150"></canvas>
                            Active
                        </div>
                        <div class="col s6" style="padding: 10px">
                            <canvas id="myChart4" width="150" height="150"></canvas>
                            Inactive 
                        </div>
                    </div>
                </div>
            </div>
            <div id="test3" class="col s12">
                <div class="card" style="margin-top: 5px; padding: 5px">
                    <canvas id="statsmon" width="355" height="250"></canvas>
                </div>
                <div class="card" style="margin-top: 35px;">
                    <div class="row center-align">
                        <div class="col s6" style="padding: 10px">
                            <canvas id="myChart5" width="150" height="150"></canvas>
                            Active
                        </div>
                        <div class="col s6" style="padding: 10px">
                            <canvas id="myChart6" width="150" height="150"></canvas>
                            Inactive 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showstats() {
                $(".card").hide();
                $(".card").fadeIn("slow");
            }
            var statDat = {
                labels: ["D 01", "D 02", "D 03", "D 04", "D 05", "D 06"],
                datasets: [
                    {
                        fillColor: "rgba(255, 152, 0, 0.30)",
                        strokeColor: "#f26b5f",
                        pointColor: "#f26b5f",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#00fff5",
                        pointStrokeColor: "#f26b5f",
                        data: [ran(0, 500), ran(0, 500), ran(0, 500), ran(0, 500), ran(0, 500), ran(0, 500)]
                    },
                    {
                        fillColor: "rgba(255, 152, 0, 0.30)",
                        strokeColor: "#f26b5f",
                        pointColor: "#f26b5f",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#00fff5",
                        pointStrokeColor: "#f26b5f",
                        data: [ran(0, 500), ran(0, 500), ran(0, 500), ran(0, 500), ran(0, 500), ran(0, 500)]
                    }
                ]
            };

            var stats = document.getElementById('statsday').getContext('2d');

            var options = {
                scaleShowLabels: false, padding: 5
            };

            new Chart(stats).Line(statDat, options);
            //--
            var data = [
                {
                    value: 25,
                    color: "#f26b5f",
                    highlight: "#FF5A5E",
                    label: "Active"
                },
                {
                    value: 75,
                    color: "rgba(255, 152, 0, 0.30)",
                    highlight: "#5AD3D1",
                    label: "Inactive"
                }
            ];

            var options = {
                animationEasing: "easeOutQuad",
            };

            var ctx = $('#myChart').get(0).getContext('2d');
            var myNewChart = new Chart(ctx).Doughnut(data, options);

            data = [
                {
                    value: 78,
                    color: "#6b8bfe",
                    highlight: "#FF5A5E",
                    label: "Active"
                },
                {
                    value: 22,
                    color: "rgba(255, 152, 0, 0.30)",
                    highlight: "#5AD3D1",
                    label: "Inactive"
                }
            ];
            var ctx = $('#myChart2').get(0).getContext('2d');
            myNewChart = new Chart(ctx).Doughnut(data, options);
            //--
            //week
            statDat = {
                labels: ["W 01", "W 02", "W 03", "W 04"],
                datasets: [
                    {
                        fillColor: "rgba(255, 152, 0, 0.30)",
                        strokeColor: "#f26b5f",
                        pointColor: "#f26b5f",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#00fff5",
                        pointStrokeColor: "#f26b5f",
                        data: [ran(0, 20), ran(0, 20), ran(0, 20), ran(0, 20)]
                    },
                    {
                        fillColor: "rgba(255, 152, 0, 0.30)",
                        strokeColor: "#f26b5f",
                        pointColor: "#f26b5f",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#00fff5",
                        pointStrokeColor: "#f26b5f",
                        data: [ran(0, 20), ran(0, 20), ran(0, 20), ran(0, 20)]
                    }
                ]
            };

            stats = document.getElementById('statsweek').getContext('2d');

            options = {
                scaleShowLabels: false, padding: 5
            };

            new Chart(stats).Line(statDat, options);
            //--
            var data = [
                {
                    value: 43,
                    color: "#f26b5f",
                    highlight: "#FF5A5E",
                    label: "Active"
                },
                {
                    value: 57,
                    color: "rgba(255, 152, 0, 0.30)",
                    highlight: "#5AD3D1",
                    label: "Inactive"
                }
            ];

            var options = {
                animationEasing: "easeOutQuad",
            };

            var ctx = $('#myChart3').get(0).getContext('2d');
            var myNewChart = new Chart(ctx).Doughnut(data, options);

            data = [
                {
                    value: 55,
                    color: "#6b8bfe",
                    highlight: "#FF5A5E",
                    label: "Active"
                },
                {
                    value: 75,
                    color: "rgba(255, 152, 0, 0.30)",
                    highlight: "#5AD3D1",
                    label: "Inactive"
                }
            ];
            var ctx = $('#myChart4').get(0).getContext('2d');
            myNewChart = new Chart(ctx).Doughnut(data, options);
            //--
            //month
            statDat = {
                labels: ["M 01", "M 02", "M 03"],
                datasets: [
                    {
                        fillColor: "rgba(255, 152, 0, 0.30)",
                        strokeColor: "#f26b5f",
                        pointColor: "#f26b5f",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#00fff5",
                        pointStrokeColor: "#f26b5f",
                        data: [ran(0, 5), ran(0, 5), ran(0, 5)]
                    },
                    {
                        fillColor: "rgba(255, 152, 0, 0.30)",
                        strokeColor: "#f26b5f",
                        pointColor: "#f26b5f",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#00fff5",
                        pointStrokeColor: "#f26b5f",
                        data: [ran(0, 5), ran(0, 5), ran(0, 5)]
                    }
                ]
            };

            stats = document.getElementById('statsmon').getContext('2d');

            options = {
                scaleShowLabels: false, padding: 5
            };

            //--
            var data = [
                {
                    value: 82,
                    color: "#f26b5f",
                    highlight: "#FF5A5E",
                    label: "Active"
                },
                {
                    value: 18,
                    color: "rgba(255, 152, 0, 0.30)",
                    highlight: "#5AD3D1",
                    label: "Inactive"
                }
            ];

            var options = {
                animationEasing: "easeOutQuad",
            };

            var ctx = $('#myChart5').get(0).getContext('2d');
            var myNewChart = new Chart(ctx).Doughnut(data, options);

            data = [
                {
                    value: 08,
                    color: "#6b8bfe",
                    highlight: "#FF5A5E",
                    label: "Active"
                },
                {
                    value: 92,
                    color: "rgba(255, 152, 0, 0.30)",
                    highlight: "#5AD3D1",
                    label: "Inactive"
                }
            ];
            var ctx = $('#myChart6').get(0).getContext('2d');
            myNewChart = new Chart(ctx).Doughnut(data, options);
            //--
            new Chart(stats).Line(statDat, options);

            function ran(mn, mx)
            {
                return Math.floor(Math.random() * (mx - mn + 1) + mn);
            }


        </script>
    </body>

</html>
