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
        <title>List of Available Rooms</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
		 <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <style>
			* {
				box-sizing: border-box;
				font-family:monotype corsiva;
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
				font-size: 20px;
			}

			body{
				background-image: url("login bg.jpg");
				overflow: scroll;
				padding-right: 0px !important;
			}
			
			.row{

				display: table-row;
			}

			.cell {
				display: table-cell;
				width: 200px;
				font-family: monotype corsiva;
			}
			

			a {
				text-size: 20px;
				text-decoration: none;
				font-weight: bold;
				color: white !important; 
				display: block;
				text-align: center;

			}

			a:hover {
				color: chocolate;
				text-decoration: none !important;
			}
			label {
				font-weight: bold;
				color: #654321;
				padding-right: 5%;
				text-align: center;
				padding-left: 10%;
				margin-bottom: 10px;
				width: 150px;
				margin-top: 60px;
				padding: 5px;

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

			form input {
				width: 150px;
				margin-bottom: 20px;
				padding-left: 0px;

			}
			input[type="submit"] {
				width: 699px;
				padding: 20px;
				margin-top: 90px;
				background-color: #654321;
				border: 0;
				cursor: pointer;
				font-weight: bold;
				color: #ffffff;
				transition: background-color 0.2s;
				align: bottom;
				display: block;
				height: 70px;
				border-radius: 5px;

			}
			.booking form input[type="submit"]:hover {
			
				background-color: chocolate;
			}
  
    .btn-default{
        margin-top: 25px;
    }

    .book{
        background-color: #654321;
        color: white;
        position: center;
        border-color: #654321;
        border-radius: 5px;
        margin-bottom: 20px;
        width: 100px;
        height: 50px;
    }


    .book:hover{
        background-color: chocolate;
        border-color: chocolate;

    }
    .book:active {
        background-color: chocolate;
        box-shadow: 0 0 black;
        transform: translateY(4px);
        border-color: chocolate;
    }

    .book:focus {
        outline:none;
    }


	td{
			
		border: 1px solid #654321;	
			}
	tr{
				margin: 0px;
				padding: 0px;
				text-align: center;
			}			
	table{
			border: 2px solid #654321;
			width : 100%;
			}
			
	.modal-content{
		width: 700px;
		height: 266px;
	}
			
	.form-elegant .font-small {
    font-size: 0.8rem; }

	.form-elegant .z-depth-1a {
    -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
    box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

	.form-elegant .z-depth-1-half,
	.form-elegant .btn:hover {
    -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
    box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

	.form-elegant .modal-header {
    border-bottom: none; }

	.modal-dialog .form-elegant .btn .fab {
    color: #2196f3!important; }

		</style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />	
		
	<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
	  <form method="POST">
       <div class="wrap">
                    <div class="row">
                        <div class="cell">
                            <label>Check In Date</label>
                        </div>
                        <div class="cell">
                            <input type="date" name="check_in" placeholder="check in date" id="check_in" required>
                        </div>
                        <div class="cell">
                            <label>Check Out</label>
                        </div>
                        <div class="cell">
                            <input type="date" name="check_out" placeholder="check out date" id="check_out" required>
                        </div>
                    </div>
				
                <input type="submit" name="submit" value="Book Now" id="btnsubmit">
				</div>
			</form>
        </div>
      </div>

    </div>
  </div>	
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

    $sql = "SELECT rooms.room_id, room_type.description, room_type.price FROM rooms, room_type
                    WHERE rooms.roomstatus='available' and rooms.roomtype_id=room_type.roomtype_id";

    echo "<table style='background-color:white;'>";
    echo "<tr><td colspan='4' style='text-align:center !important; color:#654321;font-weight:bold;'>Available Now</td></tr>";
    echo "<td style='width:150px;font-weight:bold;'>Room #</td><td style='font-weight:bold;'>Type</td><td style='width:200px;font-weight:bold;'>Price Per Night</td><td style='width:80px;'></td>";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='width:150px;'>" . $row['room_id'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td style='width:200px;'> Rs." . $row['price'] . " </td>";
            echo "<td><button type='button' id='" . $row['room_id'] . "'  class='book'><a href='book.php?id=" . $row['room_id'] . "'>Book</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $sql = "SELECT rooms.room_id, room_type.description, room_type.price, booking.check_out FROM rooms, room_type, booking 
                    WHERE rooms.roomstatus='booked' and booking.room_id=rooms.room_id and rooms.roomtype_id=room_type.roomtype_id";

    echo "<table style='background-color:white;'>";
    echo "<tr><td colspan='5' style='text-align:center !important; color:#654321;font-weight:bold;'>Available Later</td></tr>";
    echo "<td style='width:150px;font-weight:bold;'>Room #</td><td style='font-weight:bold;'>Type</td><td style='width:200px;font-weight:bold;'>Price Per Night</td><td style='font-weight:bold;'>Availability</td><td style='width:80px;'></td>";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='width:150px;'>" . $row['room_id'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td style='width:200px;'>Rs. " . $row['price'] . " </td>";
            echo "<td> After " . $row['check_out'] . "</td>";
            echo "<td><button type='button' id='" . $row['room_id'] . "'  class='book'><a href='book.php?id=" . $row['room_id'] . "'>Book</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}+
$conn->close();
?>