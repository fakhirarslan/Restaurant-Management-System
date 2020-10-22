<head>
    <link rel="stylesheet" href="style.css">
	<style>
	body {
		font-family: monotype corsiva !important;
		font-size: 20px !important;
	}
	</style>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="logo.jpg"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                    <li><a href="services.php">Services</a></li>
					<li><a href="food_menu.php">Menu</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://localhost/renaissance%20hotel/logout.php" name="logout">Log Out</a></li>
                    <li><a class="nohover dropdown-button"  href="user_profile.php" class="dropdown-button" data-activates="dropdown2">
					<img class="responsive-img" src="default.png" style="height:40px;margin-bottom:30px;"></a></li>
					<li><a href="user_profile.php"><?php echo $_SESSION['first_name']; ?></a></li>
                </ul>
                <form class="navbar-form navbar-left">
                </form>
            </div>
        </div>
    </nav>
</body>