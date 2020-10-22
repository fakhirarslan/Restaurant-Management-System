<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
            * {
                box-sizing: border-box;
                font-family: monotype corsiva;
                font-size: 20px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            body{
                background-image: url("login bg.jpg");
                font-family: monotype corsiva;
                font-size: 20px;
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

            .register {
                width: 850px;
                height: 480px;
                background-color: #ffffff;
                box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
                margin-top: 50px;
                margin-left: 140px;
            }
            .register h1 {
                text-align: center;
                color: #654321;
                font-size: 24px;
                padding: 20px 0 20px 0;
                border-bottom: 1px solid #dee0e4;
            }
            .register form {
                width: 100%;
                justify-content: center;
                padding-top: 20px;

            }

            form input {
                width: 200px;
                margin-bottom: 20px;
                padding-left: 0px;

            }
            .register form input[type="submit"] {
                width: 100%;
                padding: 20px;
                margin-top: 20px;
                background-color: #654321;
                border: 0;
                cursor: pointer;
                font-weight: bold;
                color: #ffffff;
                transition: background-color 0.2s;
                align: bottom;
                display: block;

            }
            .register form input[type="submit"]:hover {
                background-color: chocolate;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#btnsubmit").click(function () {
                    var password = $("#password").val();
                    var confirmPassword = $("#confirm").val();
                    if (password != confirmPassword) {
                        alert("Passwords do not match.");
                        return false;
                    } else {
                        return true;
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="register">
            <h1>Register</h1>
            <form action="register.php" method="POST" class="register_form">
                <div class="wrap">
                    <div class="row">
                        <div class="cell">
                            <label>First Name</label>
                        </div>
                        <div class="cell">
                            <input type="text" name="firstname" placeholder="first name" id="firstname" required>
                        </div>
                        <div class="cell">
                            <label>Last Name</label>
                        </div>
                        <div class="cell">
                            <input type="text" name="lastname" placeholder="last name" id="lastname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <label>Contact No.</label></div>
                        <div class="cell">
                            <input type="tel" name="contact" placeholder="0301xxxxxxx" id="contact" required>
                        </div>
                        <div class="cell">
                            <label>Email</label></div>
                        <div class="cell">
                            <input type="text" name="email" placeholder="xyz@abc.com" id="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <label>Password</label></div>
                        <div class="cell">
                            <input type="password" name="password" placeholder="password" id="password" required>
                        </div>
                        <div class="cell">
                            <label>Confirm Password</label></div>
                        <div class="cell">
                            <input type="password" name="confirm" placeholder="re-enter password" id="confirm" required>
                        </div>
                    </div>
                </div>
                <p>Please select your gender:</p>
                <input type="radio" name="gender" value="male" required>Male<br>
                <input type="radio" name="gender" value="female">Female<br>
                <input type="radio" name="gender" value="NA">Prefer not to answer<br>  

                <a href="login.php">Already a Member? Login</a>
                <input type="submit" name="submit" value="Register" id="btnsubmit">
                </div>
                </div>
            </form>
        </div>
    </body>
    <script src="https://cdn.sstatic.net/clc/clc.min.js?v=d5e853c48d84"></script>
    <script src="https://www.googletagservices.com/tag/js/gpt.js"></script>
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
if (isset($_POST['submit'])) {
    $contact = ($_POST['contact']);
    $password = ($_POST['password']);
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $email = ($_POST['email']);
    $gender = ($_POST['gender']);

    $sql = "INSERT INTO `guest`(`guest_id`, `contact_no`, `first_name`, `last_name`, `gender`, `email`, `password`) 
		VALUES (DEFAULT,'$contact','$firstname','$lastname','$gender','$email','$password')";
    if ($conn->query($sql) == TRUE) {
        print("<script>alert('Registration Successful!');</script>");
    } else {
        print("<script>alert('Error Occured!');</script>");
    }

    $conn->close();
}
?>