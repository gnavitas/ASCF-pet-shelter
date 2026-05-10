<Style>

.avatar-container img{
   height: 100px;
   width: 100px;
   align-items: center;
}
</style>

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
   <title> <?= strtoupper($user_type) ?> | All Pets</title>

  


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
                    <li class="active"><a href="allpets.php">All Pets</a></li>
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

<?php
   include "./includes/db_con.php";
   include "./includes/select_all.php";
   include "./function/application_function.php";

   set_not_attended($conn, $curr_date);
?>



   <!-- ADMIN  -->
   <link rel="stylesheet" href="./css/admin.css">
   <link rel="stylesheet" href="./css/add_admin_modal.css">
   <link rel="stylesheet" href="./css/view_admin_modal.css">


   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>

<!-- HTML for search input and button -->
<br><br>
<div class="table-search-container">
    <!-- Search form -->
    <form method="post" id="search_form">
    <h1>All Pets</h1>
        <input type="text" name="search" id="search" placeholder="Search...">
        <button type="submit" name="submit_search" id="submit_search">Search</button>
    </form>

    <div class="table-container">
<?php
   include "./includes/db_con.php";

   $record_per_page = 5;
   $page = "";
   $output = "";
   
   if(isset($_POST['page'])){
      $page = $_POST['page'];
   } else {
      $page = 1;
   }

   $start_from = ($page - 1 ) * $record_per_page;
   // PETS
   $sel_pet_query = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day` FROM `pet_details` a
   JOIN `pet_status` b
   ON b.pet_id = a.pet_id
   JOIN `pet_story` c
   ON c.pet_id = a.pet_id 
   JOIN `pet_status` d
   ON a.pet_id = d.pet_id 
   WHERE d.status != 'adopted'";
   
   if(isset($_POST["submit_search"])){ // Changed from "search" to "submit_search"
       $search = $_POST["search"];
       $sel_pet_query .= " AND (a.`pet_id` LIKE '%$search%' OR a.`pet_name` LIKE '%$search%')"; // Wrapped the condition with parentheses
   }
   
   $sel_pet_query .= " ORDER BY b.id DESC LIMIT $start_from,  $record_per_page";

   $res_pet = mysqli_query($conn, $sel_pet_query);

   $output .= "<table border='0' width='100%' >
   <thead>
      <tr>
         <th style='text-align:center;'> id </th>
         <th style='text-align:center;'> pet id  </th>
         <th style='text-align:center;'> avatar </th>
         <th> name </th>
         <th> species </th>
         <th> breed </th>
         <th> gender </th>
         <th> availability </th>
         <th style='text-align:center;'> date added </th>
         <th width='5%'> action </th>
      </tr>
   </thead> ";

   if (mysqli_num_rows($res_pet) > 0) {
      while($pet_row = mysqli_fetch_assoc($res_pet)) { 
         $date_added = $pet_row['date_added'];
         $pet_bdate = $pet_row['pet_bdate'];

         $date_added = new DateTime("$date_added");
         $pet_bdate = new DateTime("$pet_bdate");

         $pet_bdate = $pet_bdate->format("M d, Y");
         $date_added = $date_added->format("M d, Y h:i A");

         $output .= " <tr>
            <td style='text-align:center;'>". $pet_row['id']. "</td>
            <td style='text-align:center;'>". $pet_row['pet_id'] ."</td>
            <td class='all-pet-avatar'> 
               <div class='avatar-container'>
                  <img src='../pets_image/".$pet_row['pet_image']."'>
               </div>
            </td>
            <td style='text-align:left;'>". $pet_row['pet_name'] ."</td>
            <td style='text-align:left;'>". $pet_row['pet_species'] ."</td>
            <td style='text-align:left;'>". $pet_row['pet_breed'] ."</td>
            <td style='text-align:left;'>". $pet_row['pet_gender'] ."</td>
            <td style='text-align:left;font-size: .9em;'>". $pet_row['status'] ."</td>
            <td style='text-align:center; font-size: .9em;'>".$date_added. "</td>
            <td class='all-pet-action'> 
               <button type='button' class='view-pets-btn' data-role='view_pets' data-pet_id=".$pet_row['pet_id']."> View </button>
            </td>
         </tr>";
      }

       $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `pet_details` a
         JOIN `pet_status` b
         ON b.pet_id = a.pet_id
         JOIN `pet_story` c
         ON c.pet_id = a.pet_id 
         JOIN `pet_status` d
         ON a.pet_id = d.pet_id 
         WHERE d.status != 'adopted'";
         $page_res = mysqli_query($conn, $page_query);
      
         $total_records = mysqli_num_rows($page_res);
      
         $total_pages = ceil($total_records /  $record_per_page);
      
      
         for($i = 1; $i <= $total_pages; $i++) {
      

         }
      
         $output .= "</div>";
         echo $output;
         // echo $$total_pages;

         } else {

            $output .= "<tr>
            <td colspan='10' style='text-align:center;'> No data fetch </td>
            </tr>";

            echo $output;
         }
?>

   

<Style>
  .table-search-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
    overflow-x: hidden;
}

table {
 
    border-collapse: collapse;
    margin: 20px auto; /* Center the table horizontally */
    table-layout: fixed;
}

table {

    width: auto; /* Allow table to expand to fit content */
    border-collapse: collapse;
    margin-top: 20px;
    table-layout: fixed; /* Ensure table width is determined by column widths */
    overflow-x: hidden;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    word-wrap: break-word; /* Ensure long words are wrapped */
}



/* Other styles... */

body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    background-color: #edeef3;
    width: 90%; /* Set body width to 80% */
}

.container {
    width: 100%; /* Adjust container width to 100% */
    margin: 0 auto;
}

.main-content {
    margin-left: 20%;
    padding: 20px;
}

.table-container {
    width: 100%;
    margin-top: 20px;
    overflow-x: auto;
}

table {
 
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    word-wrap: break-word; /* Ensures long words are broken to fit within cells */
}


table th {
    background-color: maroon;
    color: #fff;
    text-align: left;
}

    </style>


<!-- HTML -->
<div class="view-pet-details-container">
    <div class="modal-content">
   
        <div class="modal-body">

        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- JavaScript -->
<script>
$(document).ready(function(){
   // Click event handler for View button
   $('.view-pets-btn').click(function(){
      var pet_id = $(this).data('pet_id');
      
      // Load modal content via AJAX
      $('.view-pet-details-container').show();
      $('.modal-body').load('./php/view_pet_details.php', { pet_id: pet_id });
   });

   // Click event handler for close button
   $('.close').click(function(){
      $('.view-pet-details-container').hide();
   });
});
</script>




<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 
