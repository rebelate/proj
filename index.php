
<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
    <title>Lamx &mdash; Music Streaming</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>

    <script src="js/jquery.flexslider-min.js"></script>

    <link rel="stylesheet" href="css/style.css"> 	
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body>
	<div id="page">
      <a href="#" class="js-nav-toggle nav-toggle"><i></i></a>

        <aside id="aside" class="js-fullheight">
            <h1 id="logo"><br><a href="index.php">Lamx</a></h1>
            <nav id=main-menu role=navigation><ul>
            <?php
            include 'login.php';
				if(isset($_SESSION["loggedin"]) === true){
					echo "<script type=text/javascript>
					$('body').addClass('offcanvas');
	            	$('aside').css('box-shadow','2px 2px 15px 2px black');
	            	</script>";
				}
				
			?>
       	</aside>

        <div id="main">
            <aside class="js-fullheight">

                <div class="flexslider">
                    <ul class="slides">
                       <li style="background-image: url(images/img_bg_1.jpg);">
                           <div class="overlay"></div>
                           <div class="container-fluid">
                               <div class="row">
                                   <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                       <div class="slider-text-inner">
                                           <h1>Nice To See You..</h1>
                                           </h2>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </li>
                       <li style="background-image: url(images/img_bg_2.jpg);">
                           <div class="overlay"></div>
                           <div class="container-fluid">
                               <div class="row">
                                   <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                       <div class="slider-text-inner">
                                           <h1>Simple.. Is How We Give You A Piece Of Music</h1>
                                           </h2>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </li>
                       <li style="background-image: url(images/img_bg_3.jpg);">
                           <div class="overlay"></div>
                           <div class="container-fluid">
                               <div class="row">
                                   <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                       <div class="slider-text-inner">
                                           <h1>Listen To Our Free Musics Now!..</h1>
                                           </h2>
                                            <p><a class="btn btn-primary" href="register.php">Sign Up Now</a> <a class="btn btn-primary btn-learn">Learn More<i class="icon-arrow-right3"></i></a></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </li>
                      </ul>
                  </div>
            </aside>
		</div>
    
    <script type="text/javascript">
        setTimeout(function() {
            $('body').addClass('offcanvas');
        }, 1500);
        
    </script>
    <!-- MAIN JS -->
    <script src="js/main.js"></script>
    </body>
</html>
