
<Style>/* Navigation bar styles */
.navbar {
  background-color: maroon;
  color: #fff; /* Text color */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
}

.navbar .logo img {
  height: 40px; /* Adjust height as needed */
}

.nav-links {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.nav-links li {
  margin-right: 20px; /* Adjust spacing between menu items */
}

.nav-links li a {
   color: #fff; /* Text color */
  text-decoration: none;
  transition: color 0.3s ease;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Change font */}

.nav-links li a:hover {
  color: #ccc; /* Text color on hover */
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="../../assets/logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="./profile.php">Account</a></li>
            <li><a href="./security.php">Security</a></li>
            <li><a href="./myActivity.php">Activity</a></li>
            <li><a href="../dashboard.php">Dashboard</a></li>
        </ul>
    </nav>
</body>
</html>

<style>/* styles.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.profile-container {
    width: 80%;
    margin: 50px auto;
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
    text-align: center;
}

.admin-password-container {
    margin-top: 20px;
}

.admin-info p {
    margin: 0;
}

.form-inputs {
    margin-top: 20px;
}

.form-input {
    margin-bottom: 10px;
}

.form-input label {
    display: block;
    margin-bottom: 5px;
}

.form-input input {
    width: calc(100% - 10px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.show-pass {
    margin-top: 10px;
}

.show-pass label {
    margin-left: 5px;
}

.form-button {
    text-align: center;
    margin-top: 20px;
}

.form-button button {
    padding: 10px 20px;
    background-color: maroon;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-button button:hover {
    background-color: #45a049;
}
</style>

<?php

   session_start();
      
   // // SESSIONS
   $admin_id = $_SESSION['admin-id'];

   include "../includes/db_con.php";
   include "../includes/select_all.php";   

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Security (<?=$admin_logged['firstname']?>) | Animal  Shelter  and Care Facility </title>
   
   <?php include "./header.php"; ?>
   
</head>
<body>

 

      

   </header>


   <main>

  

      <section>

         <div class="profile-container">

            <div class="header">
               <h2> Security </h2>
               <span id="message"></span>
            </div>

            <div class="admin-password-container">

               <div class="admin-info">
                  <p> Change your password <span> All fields with (*) are required. </span> <span id="pass-mess"></span></p>

                  <form id="update-admin-pass">

                     <div class="form-inputs">

                        <div class="form-input">
                           <label for="admin-old-pass"> Old password* <span id="old-pass-mess"></label>
                           <input type="password" name="admin_oldPass" id="admin-old-pass" required>
                        </div>

                        <div class="form-input">
                           <label for="admin-new-pass"> New password*  <span id="new-pass-mess"> </span></label>
                           <input type="password" name="admin_newPass" id="admin-new-pass" required>
                        </div>

                        <div class="form-input">
                           <label for="admin-con-pass"> Confirm password* <span id="con-pass-mess"> </span></label>
                           <input type="password" name="admin_conPass" id="admin-con-pass" required>
                        </div>
                     </div>

                     <div class="show-pass">
                        <label for="show-pass"> Show password </label>
                        <input type="checkbox" id="show-pass">
                     </div>

                     <div class="form-button">

                        <button type="submit"> Change password </button>

                     </div>
                          
                  </form>
               </div>

            </div>

           
         </div>

      </section>

   </main>

</body>

<script src="./ajax/pass_validation.js"></script>

<script>
   $(document).ready(function(){

      $('#show-pass').change(function(){

         if($('input[type=password]').attr('type') == 'password'){

            $('input[type=password]').attr('type', 'text');

         } else {

            $('input[type=text]').attr('type', 'password');
         }
         

      });

      $('#update-admin-pass').submit(function(e){

         e.preventDefault();

         const form = $('#update-admin-pass')[0];
         const formData = new FormData(form);

         $.ajax({

            url: "../process/change_pass.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#message').html(data);
               
               window.location.href = "./profile.php";

            } 

         });
      });


   });
</script>
</html>
      
     