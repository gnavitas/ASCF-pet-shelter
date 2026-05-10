<?php
error_reporting(0);
session_start();

$admin_id = $_SESSION['admin-id'];
$user_type =  $_SESSION['user-type'];

if (!empty($admin_id)) {

   header("location: ./dashboard.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Login  </title>
   <link rel="stylesheet" href="./css/login.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="./js/login_admin.js"></script>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
@import url("./main.css");

main {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}

.logo-title {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.logo-title .logo {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.logo-title .logo img {
  margin-right: 10px;
}

.logo-title .logo h1 {
  font-size: 2.5em;
  color: var(--primary-color);
}

.logo-title .text-logo {
  text-align: center;
  color: #777777;
  letter-spacing: 1px;
  font-weight: 500;
}

.form {
  /* background-color: #fff; */
  width: 400px;
}

.form form {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.form form .form-text {
  display: flex;
  flex-direction: column;
  text-indent: 5px;
  margin-bottom: 20px;
}

.form form .form-text label {
  font-size: 1em;
  letter-spacing: 1px;
  margin-bottom: 5px;
  color: #3b3b3b;
}

.form form .form-text label .fas {
  color: #3b3b3b;
}

.form form .form-text > input {
  font-size: 1em;
  padding: 10px;
  outline: none;
  border: none;
}

.form form .form-text > input:focus {
  outline: 1px solid var(--primary-color);
}

.form .form-rem-fpass {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: -15px;
}

.form .form-rem-fpass .rem-me {
  font-size: 0.9em;
  letter-spacing: 0.6px;
}

.form .form-rem-fpass .fpass a {
  text-decoration: underline;
  /* color: var(--accent-color); */
  letter-spacing: 0.6px;
  font-size: 0.9em;
}

.form .form-button {
  display: flex;
  margin-top: 20px;
}

.form .form-button input {
  width: 100%;
  font-size: 1em;
  padding: 10px;
  border: none;
  background-color: var(--primary-color);
  color: #fff;
  transition: background ease-in-out 0.4s;
  cursor: pointer;
}

.form .form-button input:hover {
  --primary-color: rgb(212, 114, 114);
  background-color: var(--primary-color);
}

.is-invalid {
  border-color: red !important;
}

.invalid-feedback {
  color: red;
}
.password-all {
  position: relative;
}

.password-toggle {
  position: absolute;
  bottom: 0.75rem;
  right: 0.75rem;
  cursor: pointer;
}


</style>
<body>
   <main>
      <div class="logo-title">
         <div class="logo">
            <img src="../assets/logo.png" alt="" style="max-width: 50px;">
            <h1> ASCF </h1>
         </div>
         <div class="text-logo">
            <p> Animal Shelter and <br> Care Facility </p>
         </div>
      </div>

      <div class="form">
         <?php
         if (isset($_SESSION['reset']) && $_SESSION['reset'] === true) {
            echo '<div style="background-color: #cfc ; padding: 10px; border: 5px solid green;">
            <span>Reset Password Successfully.</span>
          </div>';

            session_unset();

            session_destroy();
         }
         ?>

         <div class="invalid-feedback" id="missing-feedback"></div>
         <div class="invalid-feedback" id="email-feedback"></div>
         <div class="invalid-feedback" id="password-feedback"></div>
         <div class="invalid-feedback" id="login-feedback"></div>

         <form id="checking" method="POST">

            <div class="form-text">
               <label for="eMail"> <i class="fas fa-user-cog"></i> E-MAIL </label>
               <input type="text" id="email" class="e-mail" name="email">
            </div>

            <div class="form-text password-all">
               <label for="password"> <i class="fas fa-key"> </i> PASSWORD </label>
               <input type="password" name="password" id="password" class="password">
               <span class="password-toggle">
                  <i class="fa fa-eye-slash"></i>
               </span>
            </div>

            <div class="form-rem-fpass">
               <div class="rem-me">
                  <input type="checkbox" name="rememberMe" id="rememberMe">
                  <label for="rememberMe"> Remember Me </label>
               </div>

               <div class="fpass">
                  <a href="ci.php"> Login Visitor </a>
               </div>
            </div>

            <div class="form-button">
               <input type="submit" id="login-button" value="SIGN IN" class="sign-in-btn" name="loginBtn">
            </div>
         </form>
      </div>

      <div class="text-footer">
         <p> Contact your admin to register. </p>
      </div>
   </main>
</body>

</html>