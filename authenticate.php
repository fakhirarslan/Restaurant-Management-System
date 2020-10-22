<?php
	session_start();
	if (isset($_POST['login'])) {
		$email = $_POST['username'];
		$password = $_POST['password'];
		$connection = mysqli_connect('localhost', 'root', '', 'hoteldb');
		if(!$connection) {
			die("Database connection failed");
		}
		$email=mysqli_real_escape_string($connection, $email);
		$query = "SELECT * FROM guest WHERE email='{$email}' and password = '{$password}'";
		$select_user_query = mysqli_query($connection, $query);


		if (!$select_user_query) {
			DIE("QUERY FAILED".mysqli_error($connection));
		}
		$row = mysqli_fetch_array($select_user_query);

		$user_id = $row['guest_id'];
		$user_contact = $row['contact_no'];
		$user_firstname= $row['first_name'];
		$user_lastname= $row['last_name'];
		$user_gender = $row['gender'];
		$user_email = $row['email'];
		$user_password = $row['password'];

		if ($email !== $user_email && $password !== $user_password) {
		echo "<div class='center-align meh'>
		  <h5 class='red-text'>Wrong Info</h5>
		</div>";
		$back = 'login.php';
		echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
		}

		else{
			$_SESSION['guest_id'] = $user_id;
			$_SESSION['contact'] = $user_contact;
			$_SESSION['first_name'] = $user_firstname;
			$_SESSION['last_name'] = $user_lastname;
			$_SESSION['gender'] = $user_gender;
			$_SESSION['email'] = $user_email;
			$_SESSION['password'] = $user_password;
			$_SESSION['logged_in']= 'True';
			$back = 'index.php';
			echo "Login Successful";
			echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
		}
	}
?>
