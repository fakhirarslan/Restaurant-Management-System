<?php
	session_start();

	if (!isset($_SESSION['logged_in'])) {
		$nav = 'nav.php';
	} else {
		$nav = 'navconnected.php';
		$idsess = $_SESSION['guest_id'];
	}
	require $nav;
?>
<html>
    <head>
        <title>Renaissance Hotel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>   
		<style>
		body {
			font-family: monotype corsiva;
			font-size: 20px;
		}
		</style>
    </head>

    <body>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>


            <div class="carousel-inner" >
                <div class="item active"style="background-color: #f1c27d;">
                    <img src="w1.jpg" alt="room" style="margin: 0 auto; width: 90%; height:550px;">
                    <div class="carousel-caption">
                        <a href="book.php" target="_blank"><button type="button" class="book"><p>Book Now!</p></button></a>
                    </div>
                </div>

                <div class="item"style="background-color: skyblue;">
                    <img src="pool.jpg" alt="pool" style="margin: 0 auto; width: 90%; height:550px;">
                </div>

                <div class="item"style="background-color: #421C52;">
                    <img src="food.jpg" alt="food" style="margin: 0 auto; width: 90%; height:550px;">
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </body>
</html>

<?php
require "footer.php";
?>