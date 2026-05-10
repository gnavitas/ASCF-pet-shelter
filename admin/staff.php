<link rel="icon" href="../assets/logo.png">

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


   <!-- Custome Css -->
   <link rel="stylesheet" href="./css/main.css">

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/logo.png">
   <title> <?= strtoupper($user_type) ?> | View Staff</title>

  
   <link rel="stylesheet" href="./css/cms.css">
   <!-- GENERATE REPORTS -->
   <link rel="stylesheet" href="./css/generate-report.css">

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
                                                      <img style="" src="../assets/<?= $rec_user['avatar'] ?>" alt="">
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
    
    img{
        height: 50px;
        width: 50px;
    }
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
           <li class="active"><a href="staff.php"><span class="fa-solid fa-user-tie"></span>&nbsp;&nbsp;Staffs</a></li>
           <li>
  
           <!--- sub nav -->
                 <a href="#" class="main-nav">
                    <span class="fa-regular fa-id-card"></span>&nbsp;&nbsp;Application
                    <span class="arrow-down"></span>
                 </a>
                 <ul class="subnav">
                 <li><a href="preapproved.php">&nbsp;&nbsp;&nbsp;Pre-Approved Application</a></li>
                    <li class="active"><a href="resched.php">&nbsp;&nbsp;&nbsp;Re-Scheduled Request</a></li>
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

    <?php include "./includes/style_if-admin.php" ?>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
        


<!----- code---->


        <section class="container cnt-admins">

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/logo.png">
   <title> <?= strtoupper($user_type) ?> | View Staff</title>

   <!-- Custome Css -->
   <link rel="stylesheet" href="./css/main.css">
   <link rel="stylesheet" href="./css/users.css">
   <link rel="stylesheet" href="./css/archive.css">
   <link rel="stylesheet" href="./css/act_log.css">
   <link rel="stylesheet" href="./css/missing_pets.css">
   <link rel="stylesheet" href="./css/report_abuse.css">
   <link rel="stylesheet" href="./css/view_archive_modal.css">

   <!-- ADMIN  -->
   <link rel="stylesheet" href="./css/admin.css">
   <link rel="stylesheet" href="./css/add_admin_modal.css">
   <link rel="stylesheet" href="./css/view_admin_modal.css">





   <link rel="stylesheet" href="./css/cms.css">
   <!-- GENERATE REPORTS -->
   <link rel="stylesheet" href="./css/generate-report.css">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>

<style></style>


</head>

<?php include "./includes/style_if-admin.php" ?>



<body oncontextmenu="return true;" style="background-color: white;">
   <main>
<style>
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  table-layout: fixed; /* Set table layout to fixed */
  background-color: white;
}


img{
    height:50px;
    width: 50px;
    padding-left: 10px;
}
   </style>
   
  
               <!-- ADMINS -->
              <section class="container cnt-admins" >

                  <div class="admins-header" style="background-color:white;">

                     <div class="title-text">
                        <div class="title">
                           <h1> Staffs </h1>
                           <i class="fa fa-users-cog" aria-hidden="true"></i>
                        </div>

                        <div class="admin-button">
                           <a href="#" class="btn-add-admin"> Add New Staff </a>
                        </div>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                  
                     

                           <div class="sort-by">
                       

                         
                           </div>
                        </div>

                        <div class="result">
                           <p> Results: <b><?= $total_admin ?></b></p>
                        </div>

                     </div>

                  </div>

                  <div class="admin-item-container" id="admin-item-display">
                    <!--  go to ./php/pagination_admin.php  -->
                  </div>

                  <div class="add-admin-modal" id="add-admin-modal">
                     <div class="form">
                        <div class="title-modal-admin">
                           <h3> <i class="fas fa-user-cog"></i> Add New Staff </h3>
                           <hr>
                        </div>

                        <form action="" method="post">
                           <div class="form-input">
                              <label for="e-mail"> <i class="fas fa-mail-bulk"></i> Email </label>
                              <input type="email" name="email" id="e-mail" class="e-mail" placeholder="johndoe@gmail.com" required>
                           </div>

                           <div class="form-input">
                              <select name="adminType" id="admin-type" class="admin-type" required>
                                 <option value=""> Select Access Level </option>
                                 <option value="admin"> Staff </option>
                                 <option value="super admin"> Admin </option>
                                 <option value="visitor">Visitor </option>
                              </select>
                           </div>

                           <div class="form-button">
                              <input type="button" value="Cancel" class="admin-cancel-btn">
                              <input type="button" value="Register Email" class="admin-add-btn" name="btnAddAdmin" id="btn_add_admin">
                           </div>
                        </form>
                     </div>
                  </div>
   
                  <div class="view-admin-modal" id="view-admin-modal">

                  </div>

               </section>

          


            </div>
         </div>

      </div>
</body>
          
   </main>


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

</html>

<!-- Charts for report -->
<?php
// include "./includes/chart/report-linechart.php";
// include "./includes/chart/report-piechart.php";

?>



























    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>


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

</html>

<!-- Charts for report -->
<?php
// include "./includes/chart/report-linechart.php";
// include "./includes/chart/report-piechart.php";

?>

<!-- INCLUDE CHART -->
<?php
include "./includes/chart/doughnut.php";
include "./includes/chart/bargraph.php";
include "./includes/chart/polar-area.php";
include "./includes/chart/linechart.php";
?>