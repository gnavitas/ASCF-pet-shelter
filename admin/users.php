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
   <title> <?= strtoupper($user_type) ?> | Users</title>

  
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
            <li class="active"><a href="users.php"><span class="fa-regular fa-user"></span>&nbsp;&nbsp;Users</a></li>
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
                    <li ><a href="addnewpets.php">Add New Pets</a></li>
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
<?php
include "../includes/db_con.php";

$record_per_page = 9;
$page = "";
$output = "";

if(isset($_POST['page'])){
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1 ) * $record_per_page;

$search_query = "";
$filter = "";
if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $search_query = "WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%' OR user_id LIKE '%$search%'";
} else if (isset($_POST["filter"])) {
    $filter = $_POST["filter"];
    if ($filter == "name") {
        $search_query = "ORDER BY firstname ASC";
    } else if ($filter == "email") {
        $search_query = "ORDER BY email ASC";
    }
}

$sel_user_query = "SELECT *, email AS `user_email`, LEFT(firstname, 1) AS initial_firstname, LEFT(lastname, 1) AS initial_lastname FROM `user_details` $search_query ORDER BY `id` DESC LIMIT $start_from, $record_per_page";

$res_users = mysqli_query($conn, $sel_user_query);

$output .= '<table border="0" width="100%">
              <thead>
                 <tr>
                    <th style="text-align:center;"> id </th>
                    <th style="text-align:center;"> user id </th>
                    <th class="avatar"> avatar </th>
                    <th> name </th>
                    <th> email </th>
                    <th> mobile number </th>
                    <th style="text-align:center;"> status </th>
                    <th> date & time joined </th>
                 </tr>
              </thead>
              <tbody>';

if (mysqli_num_rows($res_users) > 0) {
    while($user_row = mysqli_fetch_assoc($res_users)) {
        $date_created = new DateTime($user_row['date_created']);
        $date_created = $date_created->format('M d, Y h:i A');
        $user_status = ($user_row['contactStatus'] == 'Verified' || $user_row['emailStatus'] == 'Verified') ? "verified" : "not verified";

        $output .= '<tr>
           <td style="text-align:center;">'. $user_row['id'] .'</td>
           <td style="text-align:center;">'. $user_row['user_id'] .'</td>
           <td class="avatar">';
        if(!empty($user_row['avatar'])) {
            $output .= '<div class="user-avatar">
               <img src="../assets/'. $user_row['avatar'].'" alt="">
            </div>';
        } else {
            $output .= '<div class="user-avatar">
               <p>'. $user_row['initial_firstname'] . $user_row['initial_lastname'] .'</p>
            </div>';
        }
        $output .= '</td>
           <td>'. $user_row['firstname'] .' '. $user_row['lastname'] .'</td>
           <td style="text-transform: lowercase">'. $user_row['user_email'] .'</td>
           <td>'. $user_row['contact'] .'</td>
           <td class="user-status">'. $user_status .'</td>
           <td>'. $date_created .'</td>
        </tr>';
    }

    $output .= '</tbody></table><div style="display: flex; align-items: center; margin-top: 10px; justify-content:center;">';

    $page_query = "SELECT *, email AS `user_email`, LEFT(firstname, 1) AS initial_firstname, LEFT(lastname, 1) AS initial_lastname FROM `user_details` $search_query";
    $page_res = mysqli_query($conn, $page_query);
    $total_records = mysqli_num_rows($page_res);
    $total_pages = ceil($total_records / $record_per_page);

    for($i = 1; $i <= $total_pages; $i++) {
        $output .= "<button class='pagination_link' onclick='changePage($i)' style='cursor:pointer; padding: 6px; border: 1px solid #ccc; margin:3px;' id='".$i."'>". $i ."</button>";
    }

    $output .= "</div>";
} else {
    $output .= "<tr><td colspan='8' style='text-align:center;'> No data fetched </td></tr>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
     .search-form {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px; /* Adjust margin as needed */
}

.search-form input[type="text"],
.search-form select {
  height: 30px; /* Set the height of input and select to match the button */
  margin-right: 10px; /* Adjust spacing between elements */
}

.search-btn {
  height: 30px; /* Set the height of the button to match input and select */
  background-color: maroon;
  color: white;
  border: none;
  padding: 3px 20px;
  cursor: pointer;
  border-radius: 5px;
  font-size: 16px;
}

.pagination_link {
    cursor: pointer;
    padding: 6px;
    border: 1px solid #ccc;
    margin: 3px;
}
        
    </style>
</head>
<body style="background-color: #f8eded;">

<form method="post" id="search_form" class="search-form">
    <input type="text" name="search" id="search" placeholder="Search...">
    <select name="filter">
        <option value="">Sort By</option>
        <option value="name">Name</option>
        <option value="email">Email</option>
    </select>
    <button type="submit" class="search-btn">Search</button>
</form>


<?php echo $output; ?>

<script>
function changePage(page) {
    document.getElementById('search_form').innerHTML += "<input type='hidden' name='page' value='" + page + "'>";
    document.getElementById('search_form').submit();
}
</script>

</body>
</html>

    






























    

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