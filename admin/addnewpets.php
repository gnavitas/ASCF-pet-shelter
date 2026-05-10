

<?php
// error_reporting(0);
session_start();

// // SESSIONS
$admin_id = $_SESSION['admin-id'];


// // INCLUDES
include "./includes/db_con.php";
include "./includes/count.php";
include "./includes/select_all.php";
// include "./function/update_status.php";
include "./function/function.php";
include "./function/decrypt_encrypt.php";
include "./notification/notif.php";
include "./php/results.php";
include "./includes/date_today.php";
// include "./notification/getNewReport.php";

$verify_status = $admin_logged['admin_verifiy'];
$user_type = $admin_logged['user_type'];

if (empty($admin_id)) {
   header("location: ./login_admin.php");
}

if ($verify_status === 'not verified') {
   header("location: ./admin_verification.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/logo.png">
   <title> <?= strtoupper($user_type) ?> | Add New Pet</title>




   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Sidebar #1</title>
  </head>
  <body>
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
        <?php if (empty($admin_logged['avatar'])) { ?>

   <?php
                                    if (mysqli_num_rows($res_rec_user) > 0) {

                                       while ($rec_user = mysqli_fetch_assoc($res_rec_user)) { ?>

                                          <tr>
                                             <td style="text-transform:lowercase"> <?= $rec_user['user_id'] ?> </td>

                                             <td class="avatar">

                                                <?php if (!empty($rec_user['avatar'])) { ?>
                                                   <div class="user-avatar">
                                                      <img src="../assets/<?= $rec_user['avatar'] ?>" alt="">
                                                   </div>

                                                <?php } else { ?>
                                                   <div class="user-avatar">
                                                      <p> <?= $rec_user['initial_firstname'] ?><?= $rec_user['initial_lastname'] ?></p>
                                                   </div>

                                                <?php } ?>
                                             </td>

                                             <td>
                                                <?= $rec_user['firstname'] ?> <?= $rec_user['lastname'] ?>
                                             </td>

                                             <td style="text-transform:lowercase"> <?= $rec_user['email'] ?> </td>

                                             <td> <?php if ($rec_user['emailStatus'] == 'Verified' || $rec_use['contactStatus'] == 'Verified') {
                                                      echo "Verified";
                                                   } else {
                                                      echo "not verified";
                                                   } ?> </td>
                                          </tr>

                                       <?php   } ?>



                                    <?php   } else {

                                       // echo "yos";
                                    }
                                    ?>
<?php } else { ?>
<div class="admin-profile">
<Style>.hover-class {
    /* Your default styles for the image */
}

.hover-class:hover {
    /* Your styles for the image when hovered */
    opacity: 0.5; /* Set the opacity to 50% when hovered */
}
</style>
<a href="./account/profile.php">
      <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="" class="hover-class" style="width: 100px; height: 100px;">
</a>
</div>
<?php } ?>

<h3 class="name"> <?= $admin_logged['firstname'] ?> <?= $admin_logged['lastname'] ?></h3>
                           <p> <?= $admin_logged['user_type'] ?> </p>



          
          <span class="country">, Bulacan</span>
        </div>

        <div class="counter d-flex justify-content-center">
          <!-- <div class="row justify-content-center"> -->
     
          
          <div class="col">
              
         
              <h1 > <?= mysqli_num_rows($sel_user_res) ?> </h1>
                <span class="number-label">Total Users</span>
              </div>
              <div class="col">
              <h1 > <?= $total_pet_status ?> </h1>
                <span class="number-label">Total Pets Registered</span>
              </div>
              <div class="col">
              <h1 > <?= $adopted_total['total-adopted'] ?> </h1>
                <span class="number-label">Total Adopted</span>
              </div>
            <!-- </div> -->
          </div>
          
          <div class="nav-menu">
            <ul>
              <li>
            <li ><a href="users.php"><span class="fa-regular fa-user"></span>&nbsp;&nbsp;Users</a></li>
            <li ><a href="dashboard.php"><span class="fa-solid fa-chart-line"></span>&nbsp;&nbsp;Dashboard</a></li>
           <li><a href="staff.php"><span class="fa-solid fa-user-tie"></span>&nbsp;&nbsp;Staffs</a></li>
           <li>
  
           <!--- sub nav -->
                 <a href="#" class="main-nav">
                    <span class="fa-regular fa-id-card"></span>&nbsp;&nbsp;Application
                    <span class="arrow-down"></span>
                 </a>
                 <ul class="subnav">
                 <li><a href="preapproved.php">&nbsp;&nbsp;&nbsp;Pre-Approved Application</a></li>
                    <li ><a href="resched.php">&nbsp;&nbsp;&nbsp;Re-Scheduled Request</a></li>
                    <li><a href="homevisit.php">&nbsp;&nbsp;&nbsp;Home Visit</a></li>
                    <li><a href="homerevisit.php">&nbsp;&nbsp;&nbsp;Home Re-visit</a></li>
                    <li><a href="transaction.php">&nbsp;&nbsp;&nbsp;Transaction</a></li>
              
                 </ul>
              </li>
         <!--- sub nav -->
                <li>
                <a href="#" class="main-nav">
                    <span class="fa-regular fa-id-card"></span>&nbsp;&nbsp;Pet
                    <span class="arrow-down"></span>
                 </a>
                 <ul class="subnav">
                    <li ><a href="allpets.php">All Pets</a></li>
                    <li><a href="adoptedpets.php">Adopted Pets</a></li>
                    <li class="active"><a href="addnewpets.php">Add New Pets</a></li>
                 </ul>
              </li>
   <!--- sub nav -->
   <li>
                <a href="#" class="main-nav">
                    <span class="fa-regular fa-id-card"></span>&nbsp;&nbsp;Services
                    <span class="arrow-down"></span>
                 </a>
                 <ul class="subnav">
                    <li><a href="applicants.php">Applicants</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="addservices.php">Add Services</a></li>
                    <li><a href="servicelog.php">Service Log</a></li>
                 </ul>
              </li>
  
              <!--- sub nav -->
   <li>
                <a href="#" class="main-nav">
                    <span class="fa-regular fa-id-card"></span>&nbsp;&nbsp;Content
                    <span class="arrow-down"></span>
                 </a>
                 <ul class="subnav">
                    <li><a href="announcement.php">Update Announcement</a></li>
                    <li><a href="video.php">Update Video</a></li>
     
                 </ul>
              </li>
  
  
              <li><a href="report.php"><span class="fa-solid fa-flag"></span>&nbsp;&nbsp;Report</a></li>
              <li><a href="archive.php"><span class="fa-solid fa-file-zipper"></span>&nbsp;&nbsp;Archive</a></li>
              <li><a href="log.php"><span class="fa-solid fa-clock-rotate-left"></span>&nbsp;&nbsp;Log</a></li>
              <li><a href="process/logout.php"><span class="fa-solid fa-right-from-bracket"></span>&nbsp;&nbsp;Sign out</a></li>
            </ul>
  

 

        </div>
      </div>
      
    </aside>
    <main>
    <script src="js/nav.js"></script>

<style>
/* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

body {
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
}

.container {
  width: 80%;
  margin: 0 auto;
}

.form-container {
  background-color: white;
  padding: 20px;

}

.add-pets-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.title-text {
  display: flex;
  align-items: center;
}

.title-text h1 {
  font-size: 24px;
  margin-right: 10px;
}

.add-pet-item-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

.form-input {
  margin-bottom: 15px;
}

.form-input label {
  font-size: 14px;
}

input[type="text"],
select,
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
}

.pet-story-img {
  display: flex;
  align-items: center;
}

.pet-story-img .form-input {
  flex: 1;
}

.pet-fe-img {
  cursor: pointer;
  background-color: maroon;
  color: #fff;
  padding: 8px 15px;
  border-radius: 5px;
  font-size: 14px;
  display: inline-block; /* Ensure it takes only the space it needs */
  margin-bottom: 10px; /* Add some space between the text and the input */
}

/* Hide the "Choose File" text */
.pet-fe-img input[type="file"] {
  color: transparent;
  display: none;
}

.pet-fe-img input[type="file"]::before {
  content: 'Choose File'; /* You can customize this if needed */
  display: inline-block;
  background-color: maroon;
  color: #fff;
  padding: 8px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
}

.pet-fe-img input[type="file"] {
  display: none; /* Hide the file input */
}


.pet-fe-img i {
  margin-left: 5px;
}

.pet-char .characteristics {
  display: flex;
  flex-wrap: wrap;
}

.pet-char .form-input {
  flex: 0 0 50%;
}

.pet-char .form-input label {
  font-size: 14px;
}

.pet-med-history table {
  width: 100%;
  border-collapse: collapse;
}

.pet-med-history th,
.pet-med-history td {
  border: 1px solid #ddd;
  padding: 10px;
}

.form-button input[type="submit"] {
  background-color: maroon;
  color: #fff;
  border: none;
  padding: 12px 24px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
}

#pet-message {
  margin-top: 10px;
  padding: 10px;
  border-radius: 5px;
  font-size: 14px;
}

   </style>

   <link rel="stylesheet" href="./css/cms.css">
   <!-- GENERATE REPORTS -->
   <link rel="stylesheet" href="./css/generate-report.css">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>

<?php
   include "./includes/db_con.php";
   include "./includes/date_today.php";

?>
<div class="container">
  <div class="form-container">
<div class="add-pets-header">
   <div class="title-text">
         <br><br><br><br><br>  <br><br><br><br><br>  <br><br><br><br><br>  <br><br><br><br><br>  <br><br><br><br><br>
         <h1> Add New Pets </h1>
         <i class="fa fa-plus-circle"></i>
   </div>
   
   <div id="pet-message">
      
   </div>
</div>

<div class="add-pet-item-container" >

   <form id="add_pet-form" enctype="multipart/form-data">  
      <div class="title">
         <h3> Pet Details </h3>
      </div>
      
      <div class="pet-details">

         <div class="pet-info">

            <div class="form-input">

               <label for="pet-name"> Name </label>
               
               <input type="text" name="petName" id="pet-name" placeholder="e.g: sven, lola, eidrian" required>

            </div>

            <div class="form-input drop-down">
               <label for="pet-type"> Type/Species </label>
               <select name="petType" id="pet-type" required>
                  <option value=""> Select species/type </option>
                  <option value="dog"> Dog </option>
                  <option value="cat"> Cat </option>
               </select>
            </div>
            

            <div class="form-input">
               <label for="pet-breed"> Breed </label>

               <select name="petBreed" id="pet-breed" required>
                  <option value=""> Select type first </option>
                 
               </select>
               
            </div>

            <div class="form-input">
    <label for="pet-bdate">Birthdate</label>
    <input type="date" name="petBdate" id="pet-bdate" required min="2015-12-01">
</div>

<script>
    // Get the current date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    // Format the date as YYYY-MM-DD
    today = yyyy + '-' + mm + '-' + dd;

    // Set the maximum date for the input field
    document.getElementById("pet-bdate").setAttribute("max", today);
</script>


            <div class="form-input drop-down">
               <label for="pet-sex"> Sex </label>
               <select name="petSex" id="pet-sex" required>
                  <option value=""> Select Sex </option>
                  <option value="male"> Male </option>
                  <option value="female"> Female </option>
               </select>
            </div>

            <div class="form-input drop-down">
               <label for="pet-color"> Color </label>
               <select name="petColor" id="pet-color" required>
                  <option value=""> Select Color  </option>
                <option value="Brown">Brown</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
                <option value="Golden">Golden</option>
                <option value="Tan">Tan</option>
                <option value="Red">Red</option>
                <option value="Cream">Cream</option>
                <option value="Gray">Gray</option>
                <option value="Blue">Blue</option>
                <option value="Sable">Sable</option>
                <option value="Brindle">Brindle</option>
                <option value="Merle">Merle</option>
                <option value="Parti-color">Parti-color</option>
                <option value="Tricolor">Tricolor</option>
                <option value="Piebald">Piebald</option>
               </select>
            </div>

            <div class="form-input drop-down">
               <label for="pet-blood-type"> Blood Type </label>
               <select name="petBloodType" id="pet-blood-type" required>
                  <option value=""> Select blood type  </option>
                  
               </select>
            </div>

         </div>

         <div class="pet-story-img">
            <div class="form-input textarea">
               <label for="pet-story"> Story </label>
               <textarea name="petStory" id="pet-story" required></textarea>
            </div>

            <div class="form-input">
               <p> Feature Image </p>

         
    
               </label>

               <input type="file" name="petImage" class="pet-fe-img-class" id="pet-fe-img" accept="image/png, image/jpg, img/jpeg" required>
            </div>
         </div>
      </div>

      <div class="pet-char">
         <div class="title">
            <h3> Behavioral Characteristics </h3>
         </div>

         <div class="characteristics">

         <?php 

            $sel_char_qry = "SELECT * FROM `characteristics` ORDER BY `id` ASC"; 
            $res_char = mysqli_query($conn, $sel_char_qry);

            if(mysqli_num_rows($res_char) >= 0){
               while($char = mysqli_fetch_assoc($res_char)){ ?>

                  <div class="form-input check-box">

                     <label for="<?=$char['id']?>"> <?=$char['characteristic']?> </label>

                     <input type="checkbox" name="character[]" id="<?=$char['id']?>"  value="<?=$char['id']?>">

                  </div>

                  
               <?php }
            }


            ?>


         </div>
      </div>

      <div class="pet-med-history">

         <div class="med-history">

            <table border="0">
               <thead>
                  
                  <tr>
                     <th> Medical History </th>
                     <th> Date </th>
                  </tr>
               </thead>

               <tbody>

               <?php

                  $sel_med_qry = "SELECT * FROM `medical`";
                  $res_medical = mysqli_query($conn, $sel_med_qry);

                  if(mysqli_num_rows($res_medical) > 0){
                     while($medical = mysqli_fetch_assoc($res_medical)){ ?>

                        <tr> 
                           <td> 
                              <div class="form-input check-box">
                        
                                 <label for="<?=$medical['id']?>"> <?=$medical['medical']?> </label>
                                 <input type="checkbox" class="medical" name="medical[]" id="<?=$medical['id']?>" value="<?=$medical['id']?>">
                                 
                              </div>
                           </td>
                        
                           <td>
                              <div class="form-input med_date">
                                 <input type="date" class="med_date_input" name="medical_date[]" required disabled>
                              </div>
                           </td>
                        </tr>


                  <?php   }
                  } 
                  
                  ?>

               </tbody>
            </table>
         </div>

         <script>

            var medical = document.querySelectorAll('.medical');
            var med_date = document.querySelectorAll('.med_date_input');
            
            for(let i = 0; i < medical.length; i++){

               medical[i].addEventListener('click', (e)=>{

                  if(medical[i].checked === true){
                     
                     $(med_date[i]).attr('disabled', false);
                     
                  } else {
                     $(med_date[i]).attr('disabled', true);
                  }

               });

            }
            
            
            
         </script>

        
      </div>
<br>
      <div class="form-button">
         <input type="submit" value="Add new pet" name="pet_btn_submit" id="pet_btn_submit">
      </div>

   </form>

</div>


                        <script>
                           // ajax for adding pets

                           $(document).ready(function(){

                              $('#add_pet-form').submit(function(e){

                                 e.preventDefault(); // prevent form to reload when submitted

                                 const form = $('#add_pet-form')[0];
                                 const formData = new FormData(form);


                                 $.ajax({

                                    url: "./php/insert_pet.php",
                                    type : "POST", 
                                    contentType: false, 
                                    processData: false,
                                    cache: false,
                                    data: formData,
                                    success: function(data){

                                       $('#pet-message').html(data);

                                       $('#pet-message').fadeOut(5000);

                                       $('#add_pet-form')[0].reset();
                                    
                                    }

                                 });

                              });

                           });

                           
                        </script>

<script src="./ajax/select_type_pet.js"></script>
<script src="./js/pet_add_img.js"> </script>




<!-- Custom Script -->
<script src="./js/script.js"> </script>
<script src="./js/appl.js"> </script>
<script src="./js/service.js"> </script>
<script src="./js/pets.js"></script>
<script src="./js/modal.js"></script>

<!-- AJAX FILE -->
<script src="./ajax/adopted_pets.js"></script>
<script src="./ajax/all_pets.js"></script>
<script src="./ajax/all_archive.js"></script>
<script src="./ajax/select_type_pet.js"></script>
<script src="./ajax/add_admin.js"></script>
<script src="./ajax/all_admin.js"></script>
<script src="./ajax/applicants.js"></script>
<script src="./ajax/report_abused.js"></script>
<script src="./ajax/missing_pets.js"></script>
<script src="./ajax/all_users.js"></script>
<script src="./ajax/all_service_appl.js"></script>
<script src="./ajax/all_service_log.js"></script>

<script src="./ajax/search_filter/search.js"></script>
<script src="./ajax/all_applicant.js"></script>
<script src="./ajax/all_appl-transaction.js"></script>
<script src="./ajax/report.js"></script>
</div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 
