<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>PACS</title>
        <style>
            .desc-bottom{
                position: fixed;
                bottom: -9px;
                width: 40%;
            }
            .game_button{
                padding: 18px;
                width: 90;
                height: 90;
                background-color: #e65100;
                border-radius: 15px;
                margin: 10;
            }
            .game{
                margin: 5px;
            }
        </style>
    </head>
    <body>
        <div class="navbar-fixed" style="z-index: 999;">
            <nav class="orange z-depth-0" role="navigation">
                <div class="nav-wrapper container" style="width: 100%;">
                    <div class="row" style="margin: 0;">
                        <div class="col s4" style="padding: 0">
                            <a href="<?php echo BASE; ?>IpadController/load_userprofile">
                            <img class="circle z-depth-1" src="<?php echo IMG; ?>/misc/user.png"  width="30" style="margin-top: 20px;margin-left: 10px" id="image"/>
                            </a>
                        </div>

                    </div>
                </div>
            </nav> 
        </div>

        <div class="row" style="margin: 0">
            <div class="col s4 z-depth-1" style="padding-bottom: 20px; height: 700px;;overflow: scroll;">
                <?php include 'home_template.php'; ?>
            </div>
            <div class="col s8" style="padding: 0;">
                <div class="row" style="padding: 0; margin: 0">
                    <div class="col s12 orange" style="height: 70px">
                        <div class="col s8" style="margin-left: 110px; padding: 0; margin-top: 10px; width: 460px;">
                            <div class="col s3 " style=" padding: 0;">
                                <i class="material-icons white-text">arrow_back</i>
                            </div>
                            <div class="col s6 center-align white-text" style=" padding: 0;">Game Time</div>
                            <div class="col s3 right-align" style=" padding: 0;">
                                <i class="material-icons white-text">more_vert</i>
                            </div>
                        </div>
                    </div>
                    <div class="col s8 white z-depth-1" style="margin-left: 120px; padding: 0;margin-top: -30px; height: 85%;">
                        <div class="center-align">
                            <div class="row">
                                <div class="card" style="margin: 20px; padding: 15px; font-size: 20px" > 
                                    Tick Tac It
                                </div>
                                <p style="font-size: 20px">
                                    Total Attempts: <label style="font-size: 20px" id="count"></label> 
                                </p>
                                <div class="row game ">
                                    <button id="1" class="btn game_button"></button>
                                    <button id="2" class="btn game_button"></button>
                                    <button id="3" class="btn game_button"></button>
                                </div>
                                <div class="row game">
                                    <div class="col-xs-4">
                                        <button id="4" class="btn game_button"></button>
                                        <button id="5" class="btn game_button"></button>
                                        <button id="6" class="btn game_button"></button>
                                    </div>
                                </div>
                                <div class="row game">
                                    <div class="col-xs-4">
                                        <button id="7" class="btn game_button"></button>
                                        <button id="8" class="btn game_button"></button>
                                        <button id="9" class="btn game_button"></button>
                                    </div>
                                </div>
                                <p class=""></p>
                                <div class="card grey lighten-2" style="margin: 20px; padding: 15px; font-size: 20px" > 
                                    <a style="color: #ff9800;" id="lock"><i class="material-icons">lock</i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function userloose() {
                $('#count').fadeOut();
                $('#count').addClass("red-text");
                $('#count').fadeIn();
            }

            $('#lock').click(function () {
                Materialize.toast('Complete the Game First', 3000);
            });
            var count = 0;
            $("#count").text(count);

            //succuess function promod
            function userwongame() {
                 var sc;
            if (count == 0) {
                sc = 500;
            }
            else if (count > 10) {
                sc = 0;
            }
            else {
                sc=500 - (50*count);
            }
            var userarr = {
                    'level': <?php echo $gamelevel; ?>,
                    'score': sc,
                    'attempts': count+1,
                    'game': 1,
                };
                $.ajax({
                    type: 'post',
                    url: '<?php ECHO BASE; ?>' + 'HomeController/adduserwonngame',
                    data: userarr,
                    //   dataType: 'json',
                    success: function (data) {

                    }
                });
//                
            window.location.href = '<?php echo BASE; ?>IpadController/load_bill';
            }
// create new player and computer player
            var playerOneScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
            var computerScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
            var playerWins = 0;
            var computerWins = 0;
            var difficultySelection;
            console.log(playerOneScores.row1);

// keeps track of user scores
            function Scores(row1, row2, row3, col1, col2, col3, diag1, diag2) {
                this.row1 = row1;
                this.row2 = row2;
                this.row3 = row3;
                this.col1 = col1;
                this.col2 = col2;
                this.col3 = col3;
                this.diag1 = diag1;
                this.diag2 = diag2;
            }

// adds scores to score object based on their location in the grid
            Scores.prototype.addScores = function (gridId) {
                switch (gridId) {
                    case 1:
                        this.row1 += 1;
                        this.col1 += 1;
                        this.diag1 += 1;
                        break;
                    case 2:
                        this.row1 += 1;
                        this.col2 += 1;
                        break;
                    case 3:
                        this.row1 += 1;
                        this.col3 += 1;
                        this.diag2 += 1;
                        break;
                    case 4:
                        this.row2 += 1;
                        this.col1 += 1;
                        break;
                    case 5:
                        this.row2 += 1;
                        this.col2 += 1;
                        this.diag1 += 1;
                        this.diag2 += 1;
                        break;
                    case 6:
                        this.row2 += 1;
                        this.col3 += 1;
                        break;
                    case 7:
                        this.row3 += 1;
                        this.col1 += 1;
                        this.diag2 += 1;
                        break;
                    case 8:
                        this.row3 += 1;
                        this.col2 += 1;
                        break;
                    case 9:
                        this.row3 += 1;
                        this.col3 += 1;
                        this.diag1 += 1;
                        break;
                }
            }
            Scores.prototype.computerEasy = function () {
                do {
                    computerChoice = Math.floor((Math.random() * 9) + 1);
                } while (grids.indexOf(computerChoice) === -1);
                return computerChoice;
            }

            Scores.prototype.computerHard = function () {
                var computerChoice;
                if (playerOneScores.row1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(2) !== -1) {
                        computerChoice = 2;
                    } else if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    }
                }
                if (playerOneScores.row2 == 2) {
                    if (grids.indexOf(4) !== -1) {
                        computerChoice = 4;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(6) !== -1) {
                        computerChoice = 6;
                    }
                }
                if (playerOneScores.row3 == 2) {
                    if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    } else if (grids.indexOf(8) !== -1) {
                        computerChoice = 8;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (playerOneScores.col1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(4) !== -1) {
                        computerChoice = 4;
                    } else if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    }
                }
                if (playerOneScores.col2 == 2) {
                    if (grids.indexOf(2) !== -1) {
                        computerChoice = 2;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(8) !== -1) {
                        computerChoice = 8;
                    }
                }
                if (playerOneScores.col3 == 2) {
                    if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    } else if (grids.indexOf(6) !== -1) {
                        computerChoice = 6;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (playerOneScores.diag1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (playerOneScores.diag2 == 2) {
                    if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    }
                }
                if (computerChoice == undefined) {
                    do {
                        computerChoice = Math.floor((Math.random() * 9) + 1);
                    } while (grids.indexOf(computerChoice) === -1);
                }
                return computerChoice;
            }

            Scores.prototype.computerMaster = function () {
                var computerChoice;
                if (playerOneScores.row1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(2) !== -1) {
                        computerChoice = 2;
                    } else if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    }
                }
                if (playerOneScores.row2 == 2) {
                    if (grids.indexOf(4) !== -1) {
                        computerChoice = 4;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(6) !== -1) {
                        computerChoice = 6;
                    }
                }
                if (playerOneScores.row3 == 2) {
                    if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    } else if (grids.indexOf(8) !== -1) {
                        computerChoice = 8;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (playerOneScores.col1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(4) !== -1) {
                        computerChoice = 4;
                    } else if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    }
                }
                if (playerOneScores.col2 == 2) {
                    if (grids.indexOf(2) !== -1) {
                        computerChoice = 2;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(8) !== -1) {
                        computerChoice = 8;
                    }
                }
                if (playerOneScores.col3 == 2) {
                    if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    } else if (grids.indexOf(6) !== -1) {
                        computerChoice = 6;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (playerOneScores.diag1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (playerOneScores.diag2 == 2) {
                    if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    }
                }
                if (computerScores.row1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(2) !== -1) {
                        computerChoice = 2;
                    } else if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    }
                }
                if (computerScores.row2 == 2) {
                    if (grids.indexOf(4) !== -1) {
                        computerChoice = 4;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(6) !== -1) {
                        computerChoice = 6;
                    }
                }
                if (computerScores.row3 == 2) {
                    if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    } else if (grids.indexOf(8) !== -1) {
                        computerChoice = 8;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (computerScores.col1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(4) !== -1) {
                        computerChoice = 4;
                    } else if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    }
                }
                if (computerScores.col2 == 2) {
                    if (grids.indexOf(2) !== -1) {
                        computerChoice = 2;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(8) !== -1) {
                        computerChoice = 8;
                    }
                }
                if (computerScores.col3 == 2) {
                    if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    } else if (grids.indexOf(6) !== -1) {
                        computerChoice = 6;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (computerScores.diag1 == 2) {
                    if (grids.indexOf(1) !== -1) {
                        computerChoice = 1;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(9) !== -1) {
                        computerChoice = 9;
                    }
                }
                if (computerScores.diag2 == 2) {
                    if (grids.indexOf(3) !== -1) {
                        computerChoice = 3;
                    } else if (grids.indexOf(5) !== -1) {
                        computerChoice = 5;
                    } else if (grids.indexOf(7) !== -1) {
                        computerChoice = 7;
                    }
                }
                if (computerChoice == undefined) {
                    do {
                        computerChoice = Math.floor((Math.random() * 9) + 1);
                    } while (grids.indexOf(computerChoice) === -1);
                }
                return computerChoice;
            }

            Scores.prototype.computerTroll = function () {
                do {
                    computerChoice = Math.floor((Math.random() * 9) + 1);
                } while (grids.indexOf(computerChoice) === -1);
                return computerChoice;
            }

// determines winner by totalling scores of columns, rows, or diagonals
            Scores.prototype.findWinner = function () {
                if (this.row1 === 3 || this.row2 === 3 || this.row3 === 3 ||
                        this.col1 === 3 || this.col2 === 3 || this.col3 === 3 ||
                        this.diag1 === 3 || this.diag2 === 3) {
                    return true;
                } else {
                    return false;
                }
            }

// keeps track of available spots to move
            var grids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            var icon = "<img  width='50' src='<?php echo IMG; ?>game/checked.png'/>";
            $(document).ready(function () {
                $("img.icon").click(function () {
                    icon = "<img  width='*' src='" + $(this).attr('src') + "'/>";
                    $(this).removeClass('icon');
                    $("img.icon").effect("explode");
                    var iconName = $(this).attr("alt");
                    $("img").unbind('click');
                });

                difficultySelection = "hard";

                $(".game button").click(function () {
                    event.preventDefault();
                    $(this).prop("disabled", true);
                    $(this).text("");
                    $(this).prepend(icon);
                    // refers to id of button clicked
                    var playerChoice = parseInt($(this).attr('id'));
                    playerOneScores.addScores(playerChoice);
                    grids.splice(grids.indexOf(playerChoice), 1);
                    if (playerOneScores.findWinner() == true && difficultySelection == "troll") {
                        $(".game button").prop("disabled", true);
                        $(".game button").text("");
                        $(".game button").prepend("<img  width='50' src='<?php echo IMG; ?>game/cross.png'/>");
                        $(".game button").addClass('animated infinite flip');
                        userloose();
                        count++;
                        $("#count").text(count);
                        //location.reload();
                        $(".game button").removeClass('animated infinite flip')
                        $(".game button").prop("disabled", false);
                        $(".game button").text("");
                        playerOneScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                        computerScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                        grids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                        computerWins += 1;
                        $("span#computer").text(computerWins);
                    } else if (playerOneScores.findWinner() == true) {
                        userwongame();
                        $(".game button").prop("disabled", false);
                        $(".game button").text("");
                        playerOneScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                        computerScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                        grids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                        //location.reload();
                    } else if (grids.length == 0) {
                        userloose();
                        count++;
                        $("#count").text(count);
                        $(".game button").prop("disabled", false);
                        $(".game button").text("");
                        playerOneScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                        computerScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                        grids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                    } else {
                        setTimeout(function () {
                            // computer choice
                            if (difficultySelection == "hard") {
                                computerChoice = computerScores.computerHard();
                            } else if (difficultySelection == "master" || difficultySelection == "troll") {
                                computerChoice = computerScores.computerMaster();
                            } else {
                                computerChoice = computerScores.computerEasy();
                            }
                            console.log(grids);
                            console.log(computerChoice);
                            grids.splice(grids.indexOf(computerChoice), 1);
                            console.log(grids);

                            computerScores.addScores(computerChoice);

                            $(".game button#" + computerChoice).prop("disabled", true);
                            $(".game button#" + computerChoice).text("");
                            $(".game button#" + computerChoice).prepend("<img  width='50' src='<?php echo IMG; ?>game/cross.png'/>");
                            if (computerScores.findWinner() == true) {
                                userloose();
                                count++;
                                $("#count").text(count);
                                //location.reload();
                                $(".game button").prop("disabled", false);
                                $(".game button").text("");
                                playerOneScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                                computerScores = new Scores(0, 0, 0, 0, 0, 0, 0, 0);
                                grids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                                computerWins += 1;
                                $("span#computer").text(computerWins);
                            }
                        }, 400);
                    }
                });
            });
        </script>

    </body>
</html>