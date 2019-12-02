<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Dashboard &mdash; Your Musics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">

    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jplayer.blue.monday.css">

</head>

<body>
    <div id="page">
        
        <aside id="aside" class="border">

            <h1 id="logo"><br><a href="index.php">Lamx</a></h1>
            <nav id="main-menu" role="navigation">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="">Dashboard</a></li>
                    <?php
                    session_start();
                    require 'config.php';
                    require 'usrcheck.php';
                    if($logged==false){echo $_usr_err;}
                    else{if ($result->num_rows==1){echo "<li><a href='admin.php'>Control</a></li>";}}
                    ?>
                    <li><a href=logout.php title='Klik disini untuk logout'>Logout</a></li>
                </ul>
            </nav>
        </aside>
        <a href="#" class="js-nav-toggle nav-toggle"><i></i></a>
        <div id="main" class="fadeInUp">
            <div class="narrow-content">
            <h2 class="heading  nbar">Musics</h2>
                <div class="row">
                    
                    <div class="rect text-center animate-box">
                        <a href="#" class="data image-popup" style="background-image: url(images/img-1.jpg);">
                            <div class="desc">
                                <h3>Project Name</h3>
                                <span>Illustration</span>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>

    <!-- MAIN JS -->
    <script src="/../jquery.jplayer.min.js" type="text/javascript"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var media = {
                title: "Bubble",
                oga: "media/Ummi.mp3",
                mp3: "media/Ummi.mp3"
            };
            var options = {
                supplied: "mp3,oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            };
            new CrossPlayer("#jquery_jplayer_1", media, options);
        });
    </script>
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
        <div class="jp-type-single">
            <div class="jp-gui jp-interface">
                <ul class="jp-controls">
                    <li><a href="#" class="jp-play " tabindex="1">play</a></li>
                    <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                    <li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
                    <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                    <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                </ul>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
                <div class="jp-current-time"></div>
                <div class="jp-duration"></div>

            </div>
            <div id="jp_playlist_1" class="jp-playlist">
                <ul>
                    <li>
                        <div class="jp-title" aria-label="title">&nbsp;</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>