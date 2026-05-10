

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .avatar {
        display: flex;
        align-items: center;
    }

    .avatar p {
        margin: 0;
    }

    .avatar img {
        height: 200px;
        width: 200px;
        border-radius: 50%; /* Makes the image circular */
        object-fit: cover; /* Ensures the image covers the entire space */
        border: 2px solid #ccc; /* Add a border to the image */
    }

    .avatar img:hover{
      opacity: 0.5;
    }

    .form-upload {
        margin-left: 20px;
        margin-top: 10px; /* Add some spacing between the image and the upload button */
    }

    .form-upload label {
        cursor: pointer;
    }

    .form-upload input[type="file"] {
        display: none;
    }

        .form-inputs {
            margin-bottom: 20px;
        }

        .form-input {
            margin-bottom: 10px;
        }

        .form-input label {
            display: block;
            margin-bottom: 5px;
        }

        .form-input input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-button button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-button button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        /* Add styles for the upload button */
    .upload-button {
        display: inline-block;
        padding: 8px 15px;
        background-color: maroon;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s;
    }

    .upload-button:hover {
        opacity: 0.5;
    }

    /* Style the icon inside the button */
    .upload-button i {
        margin-right: 5px;
    }
    </style>
<?php

   session_start();
      
   // // SESSIONS
   $admin_id = $_SESSION['admin-id'];

   include "../includes/db_con.php";
   include "../includes/select_all.php";   

?>





      <section>

         <div class="profile-container">

            <div class="header">
               <h2> Account </h2>
               <span id="message"></span>
            </div>

            <div class="admin-profile-container">

               <div class="admin-avatar">
                  <p> Avatar <span id="profile-mess"></span></p>
                  <br>
                  <div class="avatar">
                     <?php if($admin_logged['avatar'] == '') { 
                           ?>

                           <div class="img-handler">
                              <p> <?=$admin_logged['initial_fname']?> </p> 
                           </div>
                           <?php     

                     } else { 

                        ?>
                           <div class="img-handler">
                           <a href="./profile.php">
  
           
                           <img id="profile-image" src="../admin_profile/<?=$admin_logged['avatar']?>" alt="Profile Image">
                                    </a>

                           </div>
                        <?php

                     }?>
                    

                    <div class="form-upload">
    <form id="update-profile">
        <label for="admin-profile" class="upload-button"> <!-- Wrap label around the button icon -->
            <i class="fas fa-camera-retro"></i>
            Upload Image
        </label>
        <input type="file" name="admin_profile" id="admin-profile" accept="image/jpeg, image/png, image/jpg" hidden>
    </form>
</div>
                  </div>
               </div>


               <div class="admin-info">
                  <p> Profile information <span id="info-mess"></span></p>

                  <form id="update-admin-info">

                     <div class="form-inputs">

                        <div class="form-input">
                           <label for="admin-id"> Admin ID </label>
                           <input type="text" name="admin_id" id="admin-id" value="<?=$admin_logged['admin_id']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-role"> Role </label>
                           <input type="text" name="admin_role" id="admin-role" value="<?=$admin_logged['user_type']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-fname"> Firstname </label>
                           <input type="text" name="admin_fname" id="admin-fname" value="<?=$admin_logged['firstname']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-lname"> Lastname </label>
                           <input type="text" name="admin_lname" id="admin-lname" value="<?=$admin_logged['lastname']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-email"> Email </label>
                           <input type="text" name="admin_email" id="admin-email" value="<?=$admin_logged['email']?>" readonly>
                        </div>

                        <div class="form-input">
                           <label for="admin-cnum"> Contact Number </label>
                           <input type="text" name="admin_cnum" id="admin-cnum" value="<?=$admin_logged['contact']?>" max="11" min="11" maxlength="11" minlength="11">
                        </div>
                     </div>

                     <div class="form-inputs address">
                        <div class="form-input ">
                           <label for="admin-add"> Address </label>
                           <input type="text" name="admin_add" id="admin-add" value="<?=$admin_logged['address']?>">
                        </div>
                     </div>

                     <div class="form-button">

                        <button type="submit"> Save </button>

                     </div>
                          
                  </form>
               </div>

            </div>

           
         </div>

      </section>

   </main>

</body>
<script>
   $(document).ready(function(){

      $('#admin-profile').change(function(){

         const form = $('#update-profile')[0];
         const formData = new FormData(form);

          $.ajax({

            url: "../process/change_profile.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#message').html(data);
               
               // window.location.href = "./profile.php";

            }
                  

         });



      });


      $('#update-admin-info').submit(function(e){

         e.preventDefault(); // prevent reload when submit

         const form = $('#update-admin-info')[0];
         const formData = new FormData(form);

         $.ajax({

            url: "../process/change_info.php",
            type: "POST",
            contentType: false, 
            processData: false,
            cache: false,
            data: formData,

            success: function(data){

               $('#message').html(data);

               

            }
                  

         });



      });


   });
</script>

</html>
      
     