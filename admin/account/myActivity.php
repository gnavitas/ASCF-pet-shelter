
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

<?php

   session_start();
      
   // // SESSIONS
   $admin_id = $_SESSION['admin-id'];

   include "../includes/db_con.php";
   include "../includes/select_all.php";   
   include "../function/admin_function.php";


   $actLog = ownActLog($conn, $admin_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> My Account <?=$admin_logged['firstname']?> |  Animal   Shelter  and Care Facility </title>
   

   
</head>
<body>
   <style>
        /* Navigation bar styles */
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
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Change font */
        }

        .nav-links li a:hover {
          color: #ccc; /* Text color on hover */
        }

        /* Additional styles */
        .my-acc-container {
          margin: 20px;
        }

        .header {
          margin-bottom: 20px;
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }

        th, td {
          border: 1px solid #ddd;
          padding: 8px;
          text-align: left;
        }

        th {
          background-color: maroon;
          color: white;
        }
    </style>
   


   <main>

    


      <section>

         <div class="my-acc-container">

            <div class="header">
               <h2> My Activity </h2>

               <!-- <input type="date" name="" id=""> -->
            </div>
           

            <table border="0">
                  <thead>
                     <tr> 
                        <th> id </th>
                        <th> my activity </th>
                        <th width="30%"> datetime </th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($actLog) > 0 ){
                           while($rows = mysqli_fetch_assoc($actLog)) { 
                              
                              $date = $rows['date'];
                              $date = new DateTime("$date");
                              $date = $date->format("F d, Y h:i A");
                              ?>

                              <tr>
                                 <td> <?=$rows['act_id']?> </td>
                                 <td> <?=$rows['activity']?> </td>
                                 <td> <?=$date?> </td>
                              </tr>

                              <?php


                           }
                        }
                     ?>
                    
                  </tbody>
               </table>
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

               $('#profile-mess').html(data);
               
               window.location.href = "./profile.php";

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

               $('#info-mess').html(data);

               window.location.href = "./profile.php";

            }
                  

         });



      });


   });
</script>

</html>
      
     