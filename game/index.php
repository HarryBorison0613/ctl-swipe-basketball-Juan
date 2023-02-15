<!DOCTYPE html>
<html>
    <head>
        <title>SWIPE BASKETBALL</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link rel="stylesheet" href="css/orientation_utils.css" type="text/css">
        <link rel='shortcut icon' type='image/x-icon' href='./favicon.ico' />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
        <meta name="msapplication-tap-highlight" content="no"/>

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/easeljs-NEXT.min.js"></script>
        <script type="text/javascript" src="js/howler.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        
    </head>
    
    <body ondragstart="return false;" ondrop="return false;" >
        <div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
        <script>
            $(document).ready(function () {
                var oMain = new CMain({
                    player_lives: 3,                    // HOW MANY LIVES THE PLAYER WILL START WITH
                    ball_points: 1,                     // HOW MANY POINTS A SINGLE SCORE IS VALUED
                    star_bonus_points: 5,               // HOW MANY POINTS A STAR BONUS IS VALUED
                    bonus_no_collision: 2,              // THIS BONUS WILL BE MULTIPLIED TO THE SCORE IF A POINT IS DONE WITHOUT COLLISIONS
                    bonus_multiplier: 2,                // THE PERFECT SCORE BONUS WILL MULTIPLY THE POINTS FOR THIS VAR
                    random_ball_start_limit: 5,         // FROM THIS SCORE ON, THE BALL WILL START IN RANDOM POSITIONS
                    random_bonus_occurrency: 30,        // THIS IS THE PERCENTAGE OF BONUS OCCURRENCY
                    board_horizontal_movement_limit: 10,// FROM THIS SCORE ON, THE BOARD WILL MOVE HORIZONTALLY
                    board_vertical_movement_limit: 24,  // FROM THIS SCORE ON, THE BOARD WILL MOVE VERTICALLY TOO
                    fullscreen: true,                   // SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
                    check_orientation: true,             // SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
                    audio_enable_on_startup: false      //ENABLE/DISABLE AUDIO WHEN GAME STARTS 
                });

                $(oMain).on("start_session", function (evt) {
                    if (getParamValue('ctl-arcade') === "true") {
                        parent.__ctlArcadeStartSession();
                    }
                });

                $(oMain).on("end_session", function (evt) {
                    if (getParamValue('ctl-arcade') === "true") {
                        parent.__ctlArcadeEndSession();
                    }
                });

                $(oMain).on("restart_level", function (evt, iLevel) {
                    if (getParamValue('ctl-arcade') === "true") {
                        parent.__ctlArcadeRestartLevel({level: iLevel});
                    }
                });

                $(oMain).on("save_score", function (evt, iScore) {
                    if (getParamValue('ctl-arcade') === "true") {
                        parent.__ctlArcadeSaveScore({score: iScore});
                    }
                });

                $(oMain).on("show_interlevel_ad", function (evt) {
                    if (getParamValue('ctl-arcade') === "true") {
                        parent.__ctlArcadeShowInterlevelAD();
                    }
                });

                $(oMain).on("share_event", function (evt, iScore) {
                    if (getParamValue('ctl-arcade') === "true") {
                        parent.__ctlArcadeShareEvent({img: TEXT_SHARE_IMAGE,
                            title: TEXT_SHARE_TITLE,
                            msg: TEXT_SHARE_MSG1 + iScore
                                    + TEXT_SHARE_MSG2,
                            msg_share: TEXT_SHARE_SHARE1
                                    + iScore + TEXT_SHARE_SHARE1});
                    }
                });

                if (isIOS()) {
                    setTimeout(function () {
                        sizeHandler();
                    }, 200);
                } else {
                    sizeHandler();
                }
            });

        </script>
        <div class="check-fonts">
            <p class="check-font-1">test 1</p>
        </div>
        
        <canvas id="canvas" class='ani_hack' width="768" height="1400"> </canvas>
        <div data-orientation="portrait" class="orientation-msg-container"><p class="orientation-msg-text">Please rotate your device</p></div>
        <div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>

    </body>
</html>
