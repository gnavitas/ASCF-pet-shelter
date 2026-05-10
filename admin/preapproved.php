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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <title> <?= strtoupper($user_type) ?> | Pre-approved Application</title>

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
    <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="" class="hover-class">
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
                 <li class="active"><a href="preapproved.php">&nbsp;&nbsp;&nbsp;Pre-Approved Application</a></li>
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
        


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../assets/logo.png">
   <title> <?= strtoupper($user_type) ?> | Animal Shelter and Care Facility</title>

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


   <!-- ADOPTION -->
   <link rel="stylesheet" href="./css/resched_request.css">
   <link rel="stylesheet" href="./css/application.css">
   <link rel="stylesheet" href="./css/applicants.css">
   <link rel="stylesheet" href="./css/sched.css">
   <link rel="stylesheet" href="./css/interview.css">
   <link rel="stylesheet" href="./css/adoption_log.css">

   <!-- SERVICES -->
   <link rel="stylesheet" href="./css/services.css">
   <link rel="stylesheet" href="./css/service_applicants.css">
   <link rel="stylesheet" href="./css/service_services.css">
   <link rel="stylesheet" href="./css/service_add.css">
   <link rel="stylesheet" href="./css/service_archive.css">

   <!-- PETS -->
   <link rel="stylesheet" href="./css/pets.css">
   <link rel="stylesheet" href="./css/pets_all.css">
   <link rel="stylesheet" href="./css/pets_adopted.css">
   <link rel="stylesheet" href="./css/pets_archive.css">
   <link rel="stylesheet" href="./css/pets_add.css">
   <link rel="stylesheet" href="./css/view_pet_details.css">
   <link rel="stylesheet" href="./css/view_adopted_pets.css">


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



<body oncontextmenu="return true;">
   <main>

     

      <!-- MAIN PANEL -->
      <div class="main-content">


      

     
                     
<style>
/* Table styles */

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  table-layout: fixed; /* Set table layout to fixed */
  background-color: white;
}
.appl-item-container table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}

.appl-item-container th, .appl-item-container td {
    border: 1px solid #ddd;
    padding: 8px;
}

.appl-item-container th {
    background-color: #f2f2f2;
}

/* Button styles */
button {
    background-color: maroon;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: red;
}

/* Search container */
.search-container {
    margin-bottom: 20px;
}

.search-container input[type=text] {
    padding: 10px;
    margin-top: 8px;
    font-size: 17px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-container button {
    padding: 10px 20px;
    margin-top: 8px;
    margin-left: 5px;
    background-color: maroon;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.search-container button:hover {
    background-color: red;
}

    </style>
                        <!-- APPROVED APPLICATIONS -->
                        <div class="sub-application appl sub-display">

                           <div class="appls-header">
                              <div class="title-text">
                                 <h1> Pre-approved Applications </h1>
                                 <i class="fa fa-user-check"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                              

                                    <div class="sort-by">
                              

                                    </div>
                                 </div>
                      

                              </div>
                           </div>
                           
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search by name...">
    <button onclick="searchFunction()">Search</button>
</div>

<div class="appl-item-container">
    <table border="0" width="100%">
        <!-- Table header and body -->
    </table>
</div>

<script>
    function searchFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".appl-item-container table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // Index 2 is the column for name
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

   
      




                        <!-- Transaction -->
                        <div class="sub-application f-int">
                           <div class="f-ints-header">
                              <div class="title-text">
                                 <h1> Schedule for Home Visit </h1>
                                 <i class="fa fa-home"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <!-- <p> Results: <b><?= $total_adoption_transactions ?></b></p> -->
                                 </div>

                              </div>
                           </div>

                           <div class="f-int-item-container">
                              <!-- check scheduled_today.php -->
                           </div>
                        </div>


                        <!-- Home Revisit  -->
                        <div class="sub-application f-int">
                           <div class="f-ints-header">
                              <div class="title-text">
                                 <h1> Schedule for Home Revisit </h1>
                                 <i class="fa fa-home"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <!-- <p> Results: <b><?= $total_adoption_transactions ?></b></p> -->
                                 </div>

                              </div>
                           </div>

                           <div class="home-revisit-item-container">
                              <!-- check php/home_revisit.php -->
                           </div>
                        </div>


                        <!-- APPLICATION LOG -->
                        <div class="sub-application adopt-log">
                           <div class="adopt-logs-header">
                              <div class="title-text">
                                 <h1> Application Log </h1>
                                 <i class="fa fa-history" aria-hidden="true"></i>
                              </div>

                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>

                                    <div class="sort-by">
                                       <p> Sort by </p>

                                       <select name="sort-by" id="sort-by">
                                          <option value="AdminID"> Admin ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Position"> Status </option>
                                          <option value="DateCreated"> Date Created </option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="result">
                                    <p> Results: <b><?= $total_application_logs ?></b></p>
                                 </div>

                              </div>
                           </div>

                           <div class="adopt-log-item-container">

                           </div>
                        </div>


                        <!-- MODAL -->
                        <div class="modal-appl-view" id="modal-appl-view">
                           <!-- display for modals -->
                        </div>

                     </div>
               </section>

  
       


           




                     </table>
                  </div>
               </section>
            </div>
         </div>

      </div>

      <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
   </main>
</body>

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