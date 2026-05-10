
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    
    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="file"] {
        margin-bottom: 20px;
    }

    input[type="submit"] {
        background-color: maroon; /* Change the button color to maroon */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #800000; /* Darker shade of maroon on hover */
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
   <title> <?= strtoupper($user_type) ?> | Reported Animals</title>

  


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
                                                   <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="" class="hover-class" style="width: 100px; height: 100px;">
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
                  <li><a href="announcement.php">Update Announcement</a></li>
                  <li  ><a href="video.php">Update Video</a></li>
   
               </ul>
            </li>


            <li class="active"><a href="report.php"><span class="fa-solid fa-flag"></span>&nbsp;&nbsp;Report</a></li>
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        select, input[type="submit"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        select {
            width: 220px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        button {
            background-color: maroon;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .view-report-details {
            display: none;
            position: fixed;
            z-index: 1;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            border: 1px solid #888;
            width: 80%;
            overflow-y: auto;
            max-height: 80vh;
            max-width: 600px;
            padding: 20px;
            border-radius: 5px;
            color:white;
        }
    </style>
<!-- HTML Form with Sort Dropdown -->
<!-- HTML Form with Sort Dropdown -->

<h1><br><br>Report Animals</h1>
<form id="sort_form" method="POST" action="">
    <div>
        <label for="sort_by">Sort by:</label>
        <select id="sort_by" name="sort_by">
            <option value="id" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'id') echo 'selected="selected"'; ?>>ID</option>
            <option value="report_id" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'report_id') echo 'selected="selected"'; ?>>Report ID</option>
            <option value="type_of_report" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'type_of_report') echo 'selected="selected"'; ?>>Type of Report</option>
            <option value="email" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'email') echo 'selected="selected"'; ?>>Email</option>
            <option value="address" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'address') echo 'selected="selected"'; ?>>Address</option>
            <option value="datetime" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'datetime') echo 'selected="selected"'; ?>>Date</option>
            <option value="action_taken" <?php if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'action_taken') echo 'selected="selected"'; ?>>Action Taken</option>
        </select>
        <input type="submit" name="sort_submit" value="Sort">
    </div>
</form>

<!-- PHP Code for Handling Sorting -->
<?php
include "./includes/db_con.php";
include "./includes/select_all.php";

$record_per_page = 20;
$page = "";
$output = "";

if(isset($_POST['page'])){
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1 ) * $record_per_page;

$report_query = "SELECT * FROM `abuse_report`";

// Check if sort_submit is set
if(isset($_POST["sort_submit"])) {
    $sort_by = $_POST["sort_by"];
    
    // Handle special sorting for 'action_taken' column
    if ($sort_by === 'action_taken') {
        $report_query .= " ORDER BY CASE WHEN action_taken = '' THEN 0 ELSE 1 END, action_taken DESC";
    } else {
        $report_query .= " ORDER BY `$sort_by` DESC";
    }
}

$report_query .= " LIMIT $start_from, $record_per_page";

$result = mysqli_query($conn, $report_query);

$output .= "<table border='0' width='100%'>
<thead>
    <tr>
        <th style='text-align:center;'> ID </th>
        <th style='text-align:center;'> Report ID </th>
        <th style='text-align:center;'> Type of Report </th>
        <th> Email </th>
        <th style='text-align:left;'> Address </th>
        <th style='text-align:right;'> Date </th>
        <th style='text-align:center;'> Action Taken </th>
        <th style='text-align:center;'> Action </th>
    </tr>
</thead> ";

if (mysqli_num_rows($result) > 0) {
    while($abuse_animal_row = mysqli_fetch_assoc($result)) { 

        // Define and format the date within the loop
        $dateReport = strtotime($abuse_animal_row['datetime']);
        $formattedDate = date("M d, Y h:i A", $dateReport);

        $output .= " <tr style='font-size: .9em;'>
        <td style='text-align:center; '>". $abuse_animal_row['id']. "</td>
        <td style='text-align:center; font-size: .9em'>". $abuse_animal_row['report_id'] ."</td>
        <td style='text-align:center;'>". $abuse_animal_row['type_of_report'] ."</td>
        <td>".$abuse_animal_row['email']."</td>
        <td style='text-align:left; font-size: .9em'>". $abuse_animal_row['address'] ."</td>
        <td style='text-align:right;'>". $formattedDate. "</td>
        <td style='text-align:center;'>". $abuse_animal_row['action_taken'] ."</td>
        <td> 
            <div class='form-button'> 
                <button data-role='report_view-btn' data-report_id='".$abuse_animal_row['report_id']."'>
                    View
                </button>
            </div>
        </td>
    </tr>";
    }
}

$output .= "</tbody>
</table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";

echo $output;
?>

<!-- JavaScript Code to Submit Form on Dropdown Change -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#sort_by').change(function(){
            $('#sort_form').submit();
        });
      }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="view-report-details" id="view-report-details">
   
</div>

<script>
   $(document).ready(function(){

      $('.view-report-details').hide();

      $('button[data-role=report_view-btn]').click(function(){

         var report_id = $(this).data('report_id');

         // alert(report_id);
         $('.view-report-details').show();
         $('.view-report-details').load('./php/view_report_details.php',{

            report_id: report_id,

         });

      });

   });

</script>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 