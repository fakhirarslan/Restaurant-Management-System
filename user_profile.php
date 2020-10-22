<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    $back = 'login.php';
    echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
} else {
    $idsess = $_SESSION['guest_id'];
    $nav = 'navconnected.php';
}
require $nav;
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Profile</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
            }

        </style>
    </head>
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

$sql = "SELECT `first_name`, `last_name`, `contact_no`, `gender`, `email`, `password` FROM `guest` WHERE guest_id = '$idsess'";

echo "<body>";
echo "<table style='background-color:white;'>";
echo "<tr><td colspan='4' style='text-align:center !important; color:#654321;font-weight:bold;'>User Profile</td></tr>";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width:150px;'><label>First Name: </label></td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td style='width:150px;'><label>Last Name: </label></td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='width:150px;'><label>Contact Number: </label></td>";
        echo "<td>" . $row['contact_no'] . "</td>";
        echo "<td style='width:150px;'><label>Gender: </label></td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='width:150px;'><label>Email: </label></td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td style='width:150px;'><label>Password: </label></td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql = "SELECT `book_id`, rt.description as `des`, `check_in`, `check_out`, rt.price as `price` 
			FROM booking as b 
			JOIN rooms as r ON b.room_id=r.room_id 
			JOIN room_type as rt ON r.roomtype_id=rt.roomtype_id 
			WHERE guest_id='$idsess'";

echo "<table style='background-color:white;'>";
echo "<tr><td colspan='5' style='text-align:center !important; color:#654321;font-weight:bold;'>Booking History</td></tr>";
echo "<td style='width:150px;font-weight:bold;'>Booking ID</td><td style='font-weight:bold;'>Description</td><td style='width:200px;font-weight:bold;'>Check In Date</td><td style='font-weight:bold;'>Check Out Date</td><td style='width:80px;'>Price</td>";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width:150px;'>" . $row['book_id'] . "</td>";
        echo "<td>" . $row['des'] . "</td>";
        echo "<td style='width:200px;'>Rs. " . $row['check_in'] . " </td>";
        echo "<td>" . $row['check_out'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</body>";

$conn->close();
?>