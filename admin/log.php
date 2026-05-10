


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
   <title> <?= strtoupper($user_type) ?> | Activity Log</title>



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
  <body style="background-color: white;">
  
    
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
                  <li ><a href="announcement.php">Update Announcement</a></li>
                  <li><a href="video.php">Update Video</a></li>
   
               </ul>
            </li>


            <li><a href="report.php"><span class="fa-solid fa-flag"></span>&nbsp;&nbsp;Report</a></li>
            <li ><a href="archive.php"><span class="fa-solid fa-file-zipper"></span>&nbsp;&nbsp;Archive</a></li>
            <li class="active"><a href="log.php"><span class="fa-solid fa-clock-rotate-left"></span>&nbsp;&nbsp;Log</a></li>
            <li><a href="process/logout.php"><span class="fa-solid fa-right-from-bracket"></span>&nbsp;&nbsp;Sign out</a></li>
          </ul>

  
 

        </div>
      </div>
      
    </aside>

    <script src="js/nav.js"></script>

    </html>
<Style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
}
.cnt-report .generate-report-container{
   width: 100%;
   height: 85%;
   background-color: rgb(255, 255, 255);
   padding: 1%;
   margin-top: 5px;
   border-radius: 5px;
}

.cnt-report .generate-report-container .content::-webkit-scrollbar{
   display: none;
}


.cnt-report .generate-report-container .content{
   position: relative;
   width: 100%;
   height: 100%;
   overflow-y: scroll;
}

.cnt-report .generate-report-container .content .report-message{
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   font-size: 2.5em;
   width: max-content;
   color: #e6e6e6;
   font-weight: 500;
}


.cnt-report .generate-report-container .content .graphs-container{
   width: 100%;
   height: 100%;
   display: grid;
   grid-template-columns: 70% 30%;
   grid-gap: 5px;
}

.cnt-report .generate-report-container .content .graphs-container > div{
   width: 100%;
   /* background-color: red; */
}


.cnt-report .generate-report-container .content p{
   text-align: center;
   font-size: 1.2em;
   font-weight: 600;
   text-decoration: underline;
   margin-bottom: 10px;
}

.cnt-report .generate-report-container .content .graphs-container > div.report-pie-chart{
   width: 100%;
   height: 100%;
   
}

.cnt-report .generate-report-container .content .item-list{
   padding: 1%;
   background-color:white;
}

.cnt-report .generate-report-container .content .item-list table{
   border-collapse: collapse;
   width: 100%;
   height: max-content;
   background-color:white;
}

.cnt-report .generate-report-container .content .item-list table thead{
   background-color: rgb(221, 221, 221);
   background-color:white;
}

.cnt-report .generate-report-container .content .item-list table thead th{
   font-weight: 500;
   text-transform: capitalize;
   padding: 5px;
   background-color:white;
}


.cnt-report .generate-report-container .content .item-list table tbody td{
   font-weight: 400;
   /* text-transform: capitalize; */
   padding: 5px;
   text-align: center;
   background-color:white;
}

/* 
.report-line-graph{
   width: 100px;
   height: 100px;
} */



/* Styles for the title section */
.title-text {
    display: flex;
    align-items: center;
}

.title-text h1 {
    margin-right: 10px;
    color: #333; /* Adjust color as needed */
}

/* Styles for the icon */
.fa-file-export {
    font-size: 24px; /* Adjust size as needed */
    color: #333; /* Adjust color as needed */
}

/* Styles for the filter section */
.filter-generate {
    margin-top: 20px; /* Adjust margin as needed */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Styles for the form inputs */
.form-input {
    flex: 1;
    margin-right: 10px; /* Adjust margin as needed */
}

.form-input label {
    display: block;
    margin-bottom: 5px; /* Adjust margin as needed */
    color: #333; /* Adjust color as needed */
}

.form-input select {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc; /* Adjust border color as needed */
}

/* Styles for the form button */
.form-button button {
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    background-color: maroon; /* Adjust background color as needed */
    color: #fff; /* Adjust text color as needed */
    cursor: pointer;
}


.form-button button i {
    margin-right: 5px;
}

/* Style for the table */
table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ddd; /* Add a border to the table */
}

/* Style for table header */
th {
  background-color: #f2f2f2; /* Grey background color */
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd; /* Add a bottom border */
}

/* Style for table rows */
tr {
  border-bottom: 1px solid #ddd; /* Add a bottom border to all rows */
}

/* Style for alternate row colors */
tr:nth-child(even) {
  background-color: #f2f2f2; /* Grey background color for even rows */
}

/* Style for table cells */
td {
  padding: 8px;
  text-align: left;
}





</style>
<center>
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

<centeR>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/logo.png">
   <title> <?= strtoupper($user_type) ?> | Activity Log</title>

   <!-- Custome Css -->


   <link rel="stylesheet" href="./css/cms.css">
   <!-- GENERATE REPORTS -->
   <link rel="stylesheet" href="./css/generate-report.css">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>




</head>

<?php include "./includes/style_if-admin.php" ?>

<div class="cnt-report-header">
                     <div class="title-text">

                     </div>
                  </div>
                  <h1><br><br> Report </h1>     </i>
                   
                  <div class="filter-generate">

                     <div class="form-input">
                        <label for=""> Type of report </label>
                        <select id="rep-type">
                           <option value=""> --Select type of report-- </option>
                           <option value="adoption"> Adoption </option>
                           <option value="services"> Services </option>
                           <option value="reportedAnimal"> Reported Animal </option>
                           <option value="animal"> Animal </option>
                        </select>
                     </div>

                     <div class="form-input">
                        <label for=""> Date range: </label>
                        <select name="" id="rep-date_range" disabled>
                           <option value=""> --Select Date Range-- </option>
                           <option value="week"> Last Week </option>
                           <option value="month"> Last Month </option>
                           <option value="year"> Last Year </option>

                        </select>
                     </div>


                     <div class="form-button">

                        <!-- <a href="./process/print_report.php" target="_blank">  
                           <i class="fas fa-print"></i> Print 
                        </a> -->
                        <button id="print-btn" disabled> <i class="fas fa-print"></i> Print </button>

                        <!-- <a id="print-btn" target="_blank">  
                           <i class="fas fa-print"></i> Print 
                        </a> -->
                     </div>

                  </div>

                  <div class="generate-report-container" id="generate-report-container">

                     <div class="content">



                     </div>
                  </div>

               </section>

</body>
</centeR>
<!-- Custom Script -->
<script src="./js/script.js"></script>
<script src="./js/appl.js"></script>
<script src="./js/service.js"></script>
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

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 