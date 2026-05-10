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
   <img src="./admin_profile/<?= $admin_logged['avatar'] ?>" alt="">
</div>
<?php } ?>

<h3 class="name"> <?= $admin_logged['firstname'] ?> <?= $admin_logged['lastname'] ?></h3>
                           <p> <?= $admin_logged['user_type'] ?> </p>


          
          <span class="country">, Bulacan</span>
        </div>

        <div class="counter d-flex justify-content-center">
          <!-- <div class="row justify-content-center"> -->
            <div class="col">
              
              <strong class="number">892</strong>
              <span class="number-label">Posts</span>
            </div>
            <div class="col">
              <strong class="number">22.5k</strong>
              <span class="number-label">Followers</span>
            </div>
            <div class="col">
              <strong class="number">150</strong>
              <span class="number-label">Following</span>
            </div>
          <!-- </div> -->
        </div>
        
        <div class="nav-menu">
          <ul>
            <li class="active"><a href="./php/pagination_users.php"><span class="icon-home mr-3"></span>Users</a></li>
            <li><a href="#"><span class="icon-search2 mr-3"></span>Explore</a></li>
            <li><a href="#"><span class="icon-notifications mr-3"></span>Notifications</a></li>
            <li><a href="#"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
            <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li>
            <li><a href="#"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
        </div>
      </div>
      
    </aside>
    <main>

    <?php include "./includes/style_if-admin.php" ?>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
        





            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      
                      <h3>How the gut microbes you're born withadsa affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>  
    </main>
    
    

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