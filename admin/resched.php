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




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/logo.png">
   <title> <?= strtoupper($user_type) ?> | Re-schedule Visit</title>

  


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
   <style>
   body {
      font-family: Arial, sans-serif;
      background-color: #edeef3;
      position: relative;
   }
   .header {
      text-align: center;
      margin-bottom: 20px;
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
   }
   .search-container {
      text-align: center;
      position: absolute;
      top: 100px; /* Adjust as needed */
      left: 50%;
      transform: translateX(-50%);
   }
   .search-container input[type=text], .search-container button {
      padding: 10px;
      margin: 5px;
      border: none;
      border-radius: 5px;
   }
   .search-container input[type=text] {
      width: 300px;
   }
   table {
   
      width: 1000%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-top: 150px; /* Adjust as needed */
   }
   thead {
      background-color: maroon;
      color: #fff;
   }
   th, td {
      padding: 15px;
      text-align: left;
   }
   tbody tr:nth-child(even) {
      background-color: #f2f2f2;
   }
   tbody tr:hover {
      background-color: #ddd;
   }
   .action-button {
      background-color: maroon;
      border: none;
      color: white;
      padding: 8px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
   }
   .action-button:hover {
      background-color: red;    
   }
   /* Modal CSS */
   #modal-appl-view {
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

   /* Modal CSS */
.modal {
    display: none; /* Hide the modal by default */
    position: fixed; /* Fixed position */
    z-index: 1; /* Ensure it appears on top of other elements */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scrolling if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Black background with transparency */
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto; /* Center the modal vertically and horizontally */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px; /* Maximum width of the modal */
    border-radius: 5px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.action-button {
    background-color: maroon;
    border: none;
    color: white;
    padding: 8px 12px; /* Adjust padding for smaller size */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px; /* Adjust font size for smaller size */
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

.action-button:hover {
    background-color: red;    
}


   
</style>

<div class="search-container">
<H1>Re-schedule Visit</h1>
   <input type="text" id="searchInput" placeholder="Search by Name or Pet Name">
   <button onclick="searchFunction()">Search</button>
</div>

<table border="0" width="100%">
    <thead>
        <tr>
            <th style="text-align:center"> id </th>
            <th style="text-align:center"> application no. </th>
            <th> name </th>
            <th> pet name </th>
            <th> pet type </th>
            <th> date of Interview </th>
            <!--<th style="text-align:center"> status </th>-->
            <th style="text-align:center"> Reschedule Request </th>
            <th> action </th>
        </tr>
    </thead>

    <tbody id="tableBody"> <!-- Added id to table body -->
        <?php
        if (mysqli_num_rows($res_resched) > 0) {
            while ($transaction_appl = mysqli_fetch_assoc($res_resched)) {

                $date_appl = $transaction_appl['date_update'];
                $date_appl = new DateTime($date_appl);
                $date_appl = $date_appl->format("Y-m-d");
                $date_string = $transaction_appl['datetime'];
                list($date, $time) = explode(' ', $date_string);
                $new_schedule = date("F j, Y", strtotime($transaction_appl['new_schedule']));
                $date_formatted = date("F j, Y", strtotime($date));

        ?>
                <tr>
                    <td style="text-align:center"> <?= $transaction_appl['id'] ?> </td>

                    <td style="text-align:center"> <?= $transaction_appl['reference_no'] ?> </td>

                    <td> <?= $transaction_appl['fullname'] ?> </td>

                    <td> <?= $transaction_appl['pet_name'] ?> </td>

                    <td> <?= $transaction_appl['pet_species'] ?> </td>

                    <td style="font-size: .9em;"> <?= $date_formatted ?> </td>

                    <!-- <td style="text-align:center"> <?= $transaction_appl['status'] ?> </td> -->

                    <td style="text-align:center"> <?= $new_schedule ?> </td>
                    <td class="resched-action">

                        <button type="button" id="adoption-send_sched" data-role="declined" data-ref_no="<?= $transaction_appl['reference_no'] ?>">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
            <?php }
        } else { ?>

            <tr>
                <td colspan="9"> No data fetch </td>
            </tr>

        <?php   } ?>
    </tbody>
</table>

<script>
function searchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableBody");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows
    for (i = 0; i < tr.length; i++) {
        // Hide the row by default
        tr[i].style.display = "none";

        // Get the name and pet name cells
        var nameCell = tr[i].getElementsByTagName("td")[2]; // index 2 for name
        var petNameCell = tr[i].getElementsByTagName("td")[3]; // index 3 for pet name

        // If either name or pet name contains the search filter, display the row and break the loop
        if (nameCell || petNameCell) {
            var nameValue = nameCell.textContent || nameCell.innerText;
            var petNameValue = petNameCell.textContent || petNameCell.innerText;

            if (nameValue.toUpperCase().indexOf(filter) > -1 || petNameValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                break;
            }
        }
    }
}
</script>


<div id="modal-appl-view" ></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
      $('#adoption-send_sched[data-role=declined]').click(function(){
         let ref_no = $(this).data('ref_no');
         $("#modal-appl-view").show();
         $("#modal-appl-view").load('./php/view_reschedule.php',{
            ref_no:ref_no
         });
      });
   });
</script>



<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 
