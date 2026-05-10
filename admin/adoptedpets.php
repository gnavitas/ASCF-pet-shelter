
<style>


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
   <title> <?= strtoupper($user_type) ?> | Adopted Pets</title>

  


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
                                                      <img src="../assets/<?= $rec_user['avatar'] ?>" alt="" >
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
                    <li ><a href="homevisit.php">&nbsp;&nbsp;&nbsp;Home Visit</a></li>
                    <li><a href="homerevisit.php">&nbsp;&nbsp;&nbsp;Home Re-visit</a></li>
                    <li><a href="transaction.php">&nbsp;&nbsp;&nbsp;Transaction</a></li>
          >
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
                    <li class="active"><a href="adoptedpets.php">Adopted Pets</a></li>
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


 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- AJAX -->
<script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Chart Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>




   <!-- ADMIN  -->
   <link rel="stylesheet" href="./css/admin.css">






<style>

    
  
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
      top: 50px; /* Adjust as needed */
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
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin-top: 150px; /* Adjust as needed */
}

thead {
    background-color: maroon;
    color: #fff;
    position: sticky;
    top: 0;
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
   .adopted-view-modal{
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="search-container">
    <form method="post">
      <H1>Adopted Pets</h1>
        <input type="text" name="search" placeholder="Search by Pet ID or Name">
        <button type="submit">Search</button>
    </form>
</div>


<?php
   include "./includes/db_con.php";

   $record_per_page = 20;
   $page = "";
   $output = "";
   
   if(isset($_POST['page'])){

      $page = $_POST['page'];
   
   } else {

      $page = 1;

   }

   $start_from = ($page - 1 ) * $record_per_page;
   // PETS
   $sel_adopted_query = "SELECT c.*, d.status as `pet_status`, adopter.firstname, adopter.lastname, a.datetime as `date_of_transact` FROM `adoption_transaction` a
   JOIN `user_details` adopter
   ON a.user_id = adopter.user_id
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `pet_status` d
   ON a.pet_id = d.pet_id
   WHERE d.status = 'adopted'";
   
   if(isset($_POST["search"])){
    $search = $_POST["search"];
    $sel_adopted_query .= " AND (c.`pet_id` LIKE '%$search%' OR c.`pet_name` LIKE '%$search%' OR c.`pet_species` LIKE '%$search%' OR CONCAT(adopter.firstname, ' ', adopter.lastname) LIKE '%$search%' OR d.status LIKE '%$search%')";
}

   
   $sel_adopted_query .= " ORDER BY b.id DESC LIMIT $start_from,  $record_per_page";
   $res_adopted_pets = mysqli_query($conn, $sel_adopted_query);

   $output .= '<table border="0" width="100%">
                  <thead>
                     <tr>
                        <th> id </th>
                        <th style="text-align:center;"> pet id </th>
                        <th style="text-align:center;"> avatar </th>
                        <th> name </th>
                        <th> species </th>
                        <th> Adoptee/Adopter </th>
                        <th style="text-align:center;"> status </th>
                        <th> date adopted </th>
                        <th> action </th>
                        
                     </tr>
                  </thead>

                  <tbody>';

                  if(mysqli_num_rows($res_adopted_pets) > 0) { 
                                       
                     while($adopted_pets_row = mysqli_fetch_assoc($res_adopted_pets)) { 
                        
                        $date_adopted = $adopted_pets_row['date_of_transact'];
                        
                        $date_adopted = new DateTime("$date_adopted");

                        $date_adopted = $date_adopted->format("M d, Y h:i A");

                        $output .= '<tr>
                        <td>'. $adopted_pets_row['id'] .'</td>
                        <td style="text-align:center;">'. $adopted_pets_row['pet_id'].'</td>

                        <td class="adopted-pet-avatar">
                           <div class="avatar-container">
                              <img src="../pets_image/'.$adopted_pets_row['pet_image'].'" alt=""  style="height: 250px; width: 250px;">
                           </div>
                        </td>

                        <td>'.$adopted_pets_row['pet_name'].'</td>
                        <td>'.$adopted_pets_row['pet_species'].'</td>
                     
                        <td>'.$adopted_pets_row['firstname'].' '.$adopted_pets_row['lastname'].'</td>
                        <td style="text-align:center;">'.$adopted_pets_row['pet_status'].'</td>
                        <td>'. $date_adopted.'</td>

                        <td class="adopted-pet-action"> 
                           <button class="view_adopted_pets" data-role="view_adopted-btn" data-id="'.$adopted_pets_row['pet_id'].'"> <i class="fa fa-eye" aria-hidden="true"></i> View </button>
                        </td>
                     </tr>';
            
         }

         $output .= "  </tbody>
         </table> <div style='display: flex; align-items: center; margin-top: 10px; justify-content:center;'> ";
   
         $page_query = "SELECT * FROM `adoption_transaction` a
         JOIN `user_details` adopter
         ON a.user_id = adopter.user_id
         JOIN `adoption_status` b
         ON a.adoption_id = b.adoption_id
         JOIN `pet_details` c
         ON a.pet_id = c.pet_id
         JOIN `pet_status` d
         ON a.pet_id = d.pet_id
         WHERE d.status = 'adopted' ORDER BY b.id DESC;";
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
<div class="adopted-view-modal">
    <!-- Modal content will be loaded here -->
</div>
<script>
   $(document).ready(function(){

      $(".adopted-view-modal").hide();

      $('.view_adopted_pets[data-role=view_adopted-btn]').click(function(){

         let pet_id = $(this).data('id');

         $(".adopted-view-modal").show();

         $('.adopted-view-modal').load('./php/view_adopted_pets.php', {
            
            pet_id:pet_id

         });


      });

   });

</script>




<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 
