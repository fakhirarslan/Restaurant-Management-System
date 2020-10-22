<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    $back = 'login.php';
    echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
} else {
    $idsess = $_SESSION['guest_id'];
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://cdn.sstatic.net/clc/clc.min.js?v=d5e853c48d84"></script>
        <script src="https://www.googletagservices.com/tag/js/gpt.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script type="text/javascript">
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; 
		var yyyy = today.getFullYear(); 

		today = yyyy+'-'+mm+'-'+dd;
		document.getElementById("#date").setAttribute("min", today);
		
		</script>
        <style>
            * {
                box-sizing: border-box;
                font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
                font-size: 16px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            body{
                background-image: url("login bg.jpg");
            }

            .wrap {
                display: table;
            }

            .row{

                display: table-row;
            }

            .cell {
                display: table-cell;
                width: 200px;
            }


            p {
                color: #654321;
                font-weight: bold;
                margin-left: 20px;
            }

            a {
                text-size: 20px;
                text-decoration: none;
                font-weight: bold;
                color: #654321;
                display: block;
                text-align: center;

            }

            a:hover {
                color: chocolate;
            }
            label {
                font-weight: bold;
                color: #654321;
                padding-right: 5%;
                text-align: right;
                padding-left: 10%;
                margin-bottom: 10px;
                width: 100px;

            }

            .booking {
                width: 850px;
                height: 300px;
                background-color: #ffffff;
                box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
                margin-top: 50px;
                margin-left: 140px;
            }
            .booking h1 {
                text-align: center;
                color: #654321;
                font-size: 24px;
                padding: 20px 0 20px 0;
                border-bottom: 1px solid #dee0e4;
            }
            .booking form {
                width: 100%;
                justify-content: center;
                padding-top: 20px;
				

            }
			form select {
				width: 350px;
			}

            form input, select {
                width: 200px;
				margin-top: 20px;
                padding-left: 0px;

            }
            .booking form input[type="submit"] {
                width: 425%;
                padding: 20px;
                background-color: #654321;
                border: 0;
                cursor: pointer;
                font-weight: bold;
                color: #ffffff;
                transition: background-color 0.2s;
                align: bottom;
                display: block;

            }
            .booking form input[type="submit"]:hover {

                background-color: chocolate;
            }
        </style>
    </head>
    <body>
        <div class="booking">
            <h1>Booking</h1>
            <form action="book.php" method="POST" class="booking_form">
                <div class="wrap">
                    <div class="row">
						<div class="cell">
                            <label>Room Type</label>
                        </div>
                        <div class="cell">
							<select name="room_type">
								<option name="room_type" value="1">Single: For one person</option>
								<option name="room_type" value="2">Double: For two people</option>
								<option name="room_type" value="3">Triple: Suited to a party of three</option>
								<option name="room_type" value="4">Quad: Suited to a party of four</option>
								<option name="room_type" value="5">King: King-sized bed for a party of one or two</option>
								<option name="room_type" value="6">Queen: Queen-sized bed for a party of one or two</option>
								<option name="room_type" value="7">Studio: A room with a couch-bed</option>
							</select>
                        </div>
					</div>
					<div class="row">
                        <div class="cell">
                            <label>Check In</label>
                        </div>
                        <div class="cell">
                            <input type="date" id="date"  name="check_in" placeholder="check in date" id="date" required>
                        </div>
					</div>
					<div class="row">
                        <div class="cell">
                            <label>Check Out</label>
                        </div>
                        <div class="cell">
                            <input type="date"  name="check_out" placeholder="check out date" id="date" required>
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Book Now" id="btnsubmit" onclick="compareDates()">
                </div>
            </form>
        </div>
    </body>

</html>
<?php
$servername = "localhost";
$username = "root";
$pswd = "";
$dbname = "hoteldb";

$conn = new mysqli($servername, $username, $pswd, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
else {

if (isset($_POST['submit'])) {
    $check_in = ($_POST['check_in']);
    $check_out = ($_POST['check_out']);
	$room_type = $_POST['room_type'];
    $guest_id = ($_SESSION['guest_id']);
	$sql1 = "select rooms.room_id from rooms join room_type on rooms.roomtype_id = room_type.roomtype_id 
			where rooms.roomtype_id = '$room_type' and rooms.roomstatus = 'available'";			
	$result = $conn->query($sql1);
	if ($conn->query($sql1)){
	$row=mysqli_fetch_row($result);

	$room_id = $row[0];}
	
    if ($result->num_rows != 0){
	
		$sql2 = "INSERT INTO `booking`(`book_id`, `room_id`, `check_in`, `check_out`, `guest_id`) 
			VALUES (DEFAULT,'$room_id','$check_in','$check_out','$guest_id')";
		$conn->query($sql2);
		$sql3 = "UPDATE `rooms` SET `roomstatus`='booked' WHERE room_id='$room_id'";
		if ($conn->query($sql3) == TRUE) {
			print("<script>alert('Booking Successful!');</script>");
		} else {
			print("<script>alert('Error Occured!');</script>");
		}
	}
	else {
		$sql4 = "select * from booking join rooms on booking.room_id = rooms.room_id 
				where ((check_out > '$check_in') AND (check_in < '$check_out')) and rooms.roomtype_id='$room_type'";
				
		if ($conn->query($sql4) == TRUE) {			
			$result = $conn->query($sql1);
			 if ($result->num_rows != 0){
			 print("<script>alert('Already Booked!');</script>");}
	
		else {
		$sql5 = "INSERT INTO `booking`(`book_id`, `room_id`, `check_in`, `check_out`, `guest_id`) 
		VALUES (DEFAULT,'$room_id','$check_in','$check_out','$guest_id')";
    $conn->query($sql5);
	if($conn->query($sql5)){
	print("<script>alert('Booking Successful!');</script>");}
    }			
	}
   
} 
}$conn->close();}
?>