<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
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
			
            }

            a {
                text-size: 20px;
                text-decoration: none;
                font-weight: bold;
                color: #654321;
            }

            a:hover {
                color: chocolate;
            }

            .login {
                width: 400px;
                background-color: #ffffff;
                box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
                margin-top: 150px;
                margin-left:450px;
                display: block; 
            }
            .login h1 {
                text-align: center;
                color: #654321;
                font-size: 24px;
                padding: 20px 0 20px 0;
                border-bottom: 1px solid #dee0e4;
            }
            .login form {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding-top: 20px;
            }
            .login form label {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 50px;
                height: 50px;
                background-color: #654321;
                color: #ffffff;
            }
            .login form input[type="password"], .login form input[type="text"] {
                width: 310px;
                height: 50px;
                border: 1px solid #654321;
                margin-bottom: 20px;
                padding: 0 15px;
            }
            .login form input[type="submit"] {
                width: 100%;
                padding: 15px;
                margin-top: 20px;
                background-color: #654321;
                border: 0;
                cursor: pointer;
                font-weight: bold;
                color: #ffffff;
                transition: background-color 0.2s;
            }
            .login form input[type="submit"]:hover {
                background-color: #654321;
                transition: background-color 0.2s;
            }
        </style>
    </head>
    <body>
        <div class="login">
            <h1>Login</h1>
            <form action="authenticate.php" method="post">
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <label for="password">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <a href="register.php">Not a Member? Register</a>
                <input type="submit" value="Login" name="login">
            </form>
        </div>
    </body>
</html>