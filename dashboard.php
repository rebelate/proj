<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<title>Dashboard &mdash; Your Musics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
	<div id="xce-page">
		<a href="#" class="js-xce-nav-toggle xce-nav-toggle"><i></i></a>
		<aside id="xce-aside" role="complementary" class="border js-fullheight">

			<h1 id="xce-logo"><br><a href="index.php">DUMMY</a></h1>
			<nav id="xce-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li class="xce-active"><a href="">Dashboard</a></li>
					<?php 
					session_start();
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
					require 'config.php';
					$username=$_SESSION['username'];
					$result = $mysqli->query('SELECT * FROM v_admin WHERE username=."$username".');
					echo "<li><a href='admin.php'>Control</a></li>";
					}
					?>
				</ul>
			</nav>

			<div class="xce-footer">
			</div>

		</aside>

		<div id="xce-main">
			<div class="xce-narrow-content">
				<h2 class="xce-heading animate-box" data-animate-effect="fadeInLeft">Musics</h2>
				
				<div class="row row-bottom-padded-md">
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-1.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-2.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Brading</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-3.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-4.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-5.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Brading</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-6.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-1.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-2.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Brading</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-1.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-2.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Brading</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-3.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-padding text-center animate-box">
						<a href="#" class="data image-popup" style="background-image: url(images/img-4.jpg);">
							<div class="desc">
								<h3>Project Name</h3>
								<span>Illustration</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		
			<div class="xce-narrow-content">
				<div class="row">
					<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
						<h1 class="xce-heading-colored">Get in touch</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
						<p class="xce-lead">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
		
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
    $("#jquery_jplayer_1").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                mp3: "media/track.mp3",
            }).jPlayer("play"); // auto play
        },
        ended: function (event) {
            $(this).jPlayer("play");
        },
        swfPath: "swf",
        supplied: "mp3"
    })
    .bind($.jPlayer.event.play, function() { // pause other instances of player when current one play
            $(this).jPlayer("pauseOthers");
    });
    $("#jquery_jplayer_2").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                m4v: "media/tokyo.m4v",
                ogv: "media/tokyo.ogv",
                poster: "media/poster.jpg"
            });
        },
        ended: function (event) {
            $("#jquery_jplayer_2").jPlayer("play", 0);
        },
        swfPath: "js",
        supplied: "m4v, ogv",
        cssSelectorAncestor: "#jp_interface_2"
    })
    .bind($.jPlayer.event.play, function() { // pause other instances of player when current one play
            $(this).jPlayer("pauseOthers");
    });
});
</script>
	</body>
</html>

