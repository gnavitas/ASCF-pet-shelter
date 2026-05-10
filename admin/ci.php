<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-text {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-button {
            text-align: center;
        }

        .sign-in-btn {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .sign-in-btn:hover {
            background-color: #45a049;
        }
            a{
                text-decoration:none;
            }

        .back h2{
            text-align: left;   
            color: red; font-size: 15px; 
            text-decoration: none;
            font-family: Helvetica;
       
    

        }

        .back   h2:hover {

                text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="login-container">
        <a href="login_admin.php" class="back" ><h2>return</h2></a>
        <h2>Login</h2>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "u688796733_masacf";
        $password = "Marilawan123!";
        $database = "u688796733_masacf";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get user input from form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Query to fetch user details
            $sql = "SELECT * FROM user_account WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // User found, check user_type
                $row = $result->fetch_assoc();
                $user_type = $row['user_type'];

                // Check if user_type is 'visitor'
                if ($user_type == 'visitor') {
                    // Redirect to ci.php
                    header("Location: ci_sched.php");
                    exit; // Make sure to exit after the redirect
                } else {
                    // Invalid user_type
                    echo "<script>alert('Error: User type must be \"visitor\".');</script>";
                }
            } else {
                // User not found or incorrect credentials
                echo "<script>alert('Invalid email or password.');</script>";
            }

            // Close database connection
            $conn->close();
        }
        ?>
        <form id="checking" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-text">
                <label for="eMail"><i class="fas fa-user-cog"></i> E-MAIL</label>
                <input type="text" id="email" class="e-mail" name="email">
            </div>

            <div class="form-text password-all">
                <label for="password"><i class="fas fa-key"></i> PASSWORD</label>
                <input type="password" name="password" id="password" class="password">
                <span class="password-toggle">
                    <i class="fa fa-eye-slash"></i>
                </span>
            </div>

            <div class="form-text">
                <label for="remember"><input type="checkbox" id="remember" name="remember"> Remember me</label>
            </div>

            <div class="form-button">
                <input type="submit" id="login-button" value="SIGN IN" class="sign-in-btn" name="loginBtn">
            
            </div>
        </form>
        <div class="text-footer">
            <p>Contact your admin to register.</p>
        </div>
    </div>
</body>
</html>
