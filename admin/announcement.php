


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
   <title> <?= strtoupper($user_type) ?> | Update Contents</title>

  


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
  <body style="background-color: #edeef3;">
  
    
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
                  <li><a href="allpets.php">All Pets</a></li>
                  <li><a href="adoptedpets.php">Adopted Pets</a></li>
                  <li><a href="addnewpets.php">Add New Pets</a></li>
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
                  <li class="active"><a href="announcement.php">Update Announcement</a></li>
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
<center>

<style>
        /* Modern CSS */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .add-pets-header {
            background-color: #ffffff;
            padding: 20px;
            border-bottom: 2px solid #ccc;
            width: 60%;
        }

        .title-text {
            display: flex;
            text-align: center;
        }

        .title-text h1 {

            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .title-text i {
            margin-left: 10px;
            font-size: 24px;
            color: maroon;
        }

        .cms-announcement-container {
            width: 50%;
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-text {
            margin-bottom: 20px;
        }

        .form-text label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-text input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .form-input {
            margin-bottom: 20px;
        }

        .form-input p {
            margin: 0 0 5px;
            font-weight: bold;
            color: #333;
        }

        .cms-fe-img {
      
        }

        .form-button {
            text-align: center;
        }

        .form-button input[type="submit"] {
            padding: 10px 20px;
            background-color: maroon;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-button input[type="submit"]:hover {
            background-color: #800000;
        }
    </style>
<br><br>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="add-pets-header">
    <div class="title-text" >
        <h1> Annoucement and Events <span id="mess-announce"> </span></h1>
        <i class="fa fa-calendar"></i>
    </div>


</div>
<div class="cms-announcement-container">
    <form id="form-announce" enctype="multipart/form-data">
        <div class="form-text">
            <label for="se-title"> Title </label>
            <div class="invalid-feedback" id="missing-feedback"></div>
                <div class="invalid-feedback" id="uploadsize-feedback"></div>
            <input type="text" class="title"name="announcement-title" id="announcement-title" placeholder="Announcement/Event Title" required>
        </div>
        <div class="form-input">
            <p> Feature Image </p>

            <label for="cms-fe-img" class="cms-fe-img" id="display_image">
               <i class="fa fa-upload" aria-hidden="true"></i>
            </label>
            <input type="file" name="ann_img[]" class="pet-fe-img-class" id="cms-fe-img" accept="image/png, image/jpg, img/jpeg" required multiple>
            
           <button type="button" class="remove-button hidden" id="picRemoveButton">Remove</button>
          <label id="picChosen"></label>
          <label id="sizepicChosen"></label>
          
        </div>
        <div class="form-button">
            <input type="submit" style="text-align: center;" value="Add Announcement and Events"  name="cms_announcement_btn_submit" id="cms_announcement_btn_submit">
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        
        $('#announcement-title').on('input',function() {
         var title = $(this).val();
         if (title == "") {
         $('#announcement-title').addClass('is-invalid');
         $('#missing-feedback').html('Please fill out the title.');
         $("#cms_announcement_btn_submit").prop("disabled", true);
         } else {
         $('#announcement-title').removeClass('is-invalid');
         $('#missing-feedback').html('')
         $("#cms_announcement_btn_submit").prop("disabled", false);
         }
        });
        
        
          const picFileInput = document.getElementById('cms-fe-img');
          const picRemoveButton = document.getElementById('picRemoveButton');
          
          const missingFeedback = document.getElementById('missing-feedback');
          const uploadsizeFeedback = document.getElementById('uploadsize-feedback');
          
          const nextBtn = document.getElementById('cms_announcement_btn_submit');
const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          picFileInput.addEventListener('change', handleFileInputChange);
         
          picRemoveButton.addEventListener('click', handleRemoveButtonClick);
          
    function handleFileInputChange(event) {
        
    const fileInput = event.target;
    const file = fileInput.files[0]?.size;
    const fileName = fileInput.files[0]?.name;
    const filePath = fileInput.value;
    const fileSizeInMB = file / (1024 * 1024);
    const label = document.getElementById('picChosen');

    const labelsize = document.getElementById('sizepicChosen');
    
    const removeButton = picRemoveButton;
        
  
    // display file name and show remove button
    if (fileName) {
      label.textContent = 'Name: '+fileName;
      labelsize.textContent = 'Size: ' +fileSizeInMB.toFixed(2) + ' MB';
      removeButton.classList.remove('hidden');
    } else {
      label.textContent = '';
      labelsize.textContent = '';
      removeButton.classList.add('hidden');
    }
  
    

    if (picFileInput.files[0]) {
      // check if any picture is larger than 5MB
      if (picFileInput.files[0].size <= 5242880 && allowedExtensions.exec(filePath)){
        nextBtn.disabled = false;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = '';
      } else if (!allowedExtensions.exec(filePath)) {
          nextBtn.disabled = true;
          missingFeedback.textContent = 'format should picture.';
          uploadsizeFeedback.textContent = '';
      }else {
        nextBtn.disabled = true;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = 'Pictures should be less than 5 MB.';
      }
    } else {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload picture files.';
      uploadsizeFeedback.textContent = 'Pictures should be less than 5 MB.';
    }

  }
  
  
   function handleRemoveButtonClick(event) {
       
    const button = event.target;
    const fileInput = picFileInput;
    
    
    const label = document.getElementById('picChosen');
        
      const labelsize = document.getElementById('sizepicChosen');
    
    // clear file input and label text
    fileInput.value = '';
    label.textContent = '';
    labelsize.textContent = '';
    // disable remove button
    button.classList.add('hidden');
    
    // disable next button if both files are not uploaded
    if (!picFileInput.files[0]) {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload picture file.';
      uploadsizeFeedback.textContent = 'Pictures should less than 5 MB.';
    }
  }
  

        $('#form-announce').submit(function(e){
        e.preventDefault();
        if (!$('#announcement-title').hasClass('is-invalid') && picFileInput.files[0]) {
        event.preventDefault();
        $('#missing-feedback').html('')
        $("#cms_announcement_btn_submit").prop("disabled", true);
  
      
         setTimeout(function() {
         $("#cms_announcement_btn_submit").prop("disabled", false);
         }, 7000); 
         
         
          const form = $('#form-announce')[0];
            const formData = new FormData(form);

            $.ajax({
                type: "POST",
                url: "./process/add_announce.php",
                contentType: false, 
                processData: false,
                cache: false,
                data: formData,
                success: function(data){

                    $('#mess-announce').html(data);
                  
                }
                
            })

     
        } else {
        event.preventDefault();
        $('#missing-feedback').html('Please fillup all requirement.');
        }

           
            
    

        })
    });
</script>




    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   </center>


   
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 