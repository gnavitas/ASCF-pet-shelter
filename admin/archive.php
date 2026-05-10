


<?php
// error_reporting(0);
session_start();

// // SESSIONS
$admin_id = $_SESSION['admin-id'];


// // INCLUDES
include "./includes/db_con.php";
include "./includes/count.php";
include "./includes/select_all.php";

include "./function/decrypt_encrypt.php";
include "./notification/notif.php";
include "./php/results.php";
include "./includes/date_today.php";
// include "./function/update_status.php";

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
   <title> <?= strtoupper($user_type) ?> | Archive</title>

  


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
                  <li ><a href="announcement.php">Update Announcement</a></li>
                  <li><a href="video.php">Update Video</a></li>
   
               </ul>
            </li>


            <li><a href="report.php"><span class="fa-solid fa-flag"></span>&nbsp;&nbsp;Report</a></li>
            <li class="active"><a href="archive.php"><span class="fa-solid fa-file-zipper"></span>&nbsp;&nbsp;Archive</a></li>
            <li><a href="log.php"><span class="fa-solid fa-clock-rotate-left"></span>&nbsp;&nbsp;Log</a></li>
            <li><a href="process/logout.php"><span class="fa-solid fa-right-from-bracket"></span>&nbsp;&nbsp;Sign out</a></li>
          </ul>

  
 

        </div>
      </div>
      
    </aside>
    <main>
    <script src="js/nav.js"></script>



<Style>
    /* CSS Styles */
.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table th, .admin-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.admin-table th {
    background-color: maroon;
    color:White;
}

.archive-action .form-button {
    text-align: center;
}

.maroon-button {
    background-color: maroon;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 4px;
    font-family: 'Roboto', sans-serif;
}

.pagination {
    margin-top: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.pagination-link {
    cursor: pointer;
    padding: 6px;
    border: 1px solid #ccc;
    margin: 3px;
}

.view-archive-modal{
      display: none;
      position: fixed;
      z-index: 1;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: #fefefe;
      border: 1px solid #888;
      width: 80%;
      overflow-y: auto; /* Add scrollbar */
      max-height: 80vh; /* Limit maximum height */
      max-width: 600px;
      padding: 20px;
      border-radius: 5px;
   }

</style>
<center>
<H1><br><br><br>Archive</h1>
</center>
<?php
session_start();

include "./includes/db_con.php";
include "./function/function.php";
include "./includes/date_today.php";

$admin_id = $_SESSION['admin-id'];

if (isset($_POST['activate_admin_y'])) {
    include "../function/admin_function.php";

    $adminid = $_POST['adminid'];

    $success = activate_admin($conn, $adminid);

    if (!$success) {
        echo mysqli_error($conn);
    } else {
        $userType = $_SESSION['user_type'];
        $activity = "Re-activate Admin";
        activityLog($conn, $admin_id, $userType, $activity, $date_today);
    }
}

$record_per_page = 30;
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$output = "";

$start_from = ($page - 1) * $record_per_page;

$output .= '<link rel="stylesheet" type="text/css" href="./css/styles.css">';
$output .= '<table class="admin-table" width="100%">
              <thead>
                 <tr>
                    <th>Archive ID</th>
                    <th>Admin ID</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                 </tr>
              </thead>
              <tbody>';

$sel_inactive_admin_query = "SELECT * FROM `admin_info` a 
JOIN `user_account` b
ON a.admin_id = b.account_id
JOIN `admin_temporary_account` c 
ON a.admin_id = c.admin_id
JOIN `admin_status` d
ON a.admin_id = d.admin_id
WHERE b.account_id != '$admin_id' AND d.status = 'inactive' ORDER BY a.id DESC LIMIT $start_from,  $record_per_page";

$res_inactive_admin = mysqli_query($conn, $sel_inactive_admin_query);

if (mysqli_num_rows($res_inactive_admin) > 0) {
    while ($inactive_admin = mysqli_fetch_assoc($res_inactive_admin)) {
        $output .= '<tr>
                      <td>' . $inactive_admin['id'] . '</td>
                      <td>' . $inactive_admin['admin_id'] . '</td>
                      <td>' . $inactive_admin['email'] . '</td>
                      <td class="archive-status">' . $inactive_admin['user_type'] . '</td>
                      <td>' . $inactive_admin['datetime'] . ' </td>
                      <td class="archive-action">
                         <div class="form-button">
                            <button class="maroon-button" data-role="view_inactive-btn" data-admin_id="' . $inactive_admin['admin_id'] . '">View</button>
                         </div>
                      </td>
                   </tr>';
    }
} else {
    $output .= '<tr>
                   <td colspan="8" style="text-align:center;">No data fetched</td>
                </tr>';
}

$output .= '</tbody></table><div class="pagination">';

$page_query = "SELECT * FROM `admin_info` a 
JOIN `user_account` b
ON a.admin_id = b.account_id
JOIN `admin_temporary_account` c 
ON a.admin_id = c.admin_id
JOIN `admin_status` d
ON a.admin_id = d.admin_id
WHERE b.account_id != '$admin_id' AND d.status = 'inactive'";

$page_res = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_res);
$total_pages = ceil($total_records / $record_per_page);

for ($i = 1; $i <= $total_pages; $i++) {
    $output .= "<span class='pagination-link' id='" . $i . "'>" . $i . "</span>";
}

$output .= "</div>";
echo $output;
?>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="view-archive-modal" id="view-archive-modal"></div>

<script>
    $(document).ready(function () {
        $('button[data-role=view_inactive-btn]').click(function () {
            $("#view-archive-modal").show();
            var admin_id = $(this).data("admin_id");
            $('#view-archive-modal').load('./php/view_archive.php', {
                admin_id: admin_id
            });
        });
    });
</script>



   
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 