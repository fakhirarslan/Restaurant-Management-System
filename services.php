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
        <meta charset="utf-8">
        <title>Services</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
			
            td{

                border: 1px solid #654321;	
                padding: 10px !important;
            }
            tr{
                margin: 0px;
                padding: 0px;
                text-align: center;
            }			
            table{
                border: 2px solid #654321;
                width : 100%;
                margin-top: 100px;
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
} {

    $sql = "SELECT * FROM services";

    echo "<table style='background-color:white;'>";
    echo "<tr><td colspan='3' style='text-align:center !important; color:#654321;font-weight:bold;'>List of Paid Services</td></tr>";
    echo "<td style='width:150px;font-weight:bold;'>Service #</td><td style='font-weight:bold;'>Type</td><td style='width:200px;font-weight:bold;'>Price</td>";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='width:150px;'>" . $row['service_id'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td style='width:200px;'> Rs." . $row['price'] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
$conn->close();
?>