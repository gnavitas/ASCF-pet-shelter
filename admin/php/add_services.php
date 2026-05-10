<?php
   include "../includes/db_con.php";
   include "../function/image_function.php";
   include "../function/services_function.php";
   include "../function/function.php";
   include "../includes/date_today.php";
   session_start();
  
   if (isset($_POST['add_services'])) {
      $service_title = $_POST['serviceTitle'];
      $service_desc = $_POST['serviceDesc'];

      $img_name = $_FILES['serviceFeImg']['name'];
      $img_tmp_name = $_FILES['serviceFeImg']['tmp_name'];
      $img_tmp_error = $_FILES['serviceFeImg']['error'];

      $path = "../../assets";
      $ext_file_name = "service-";

      $new_img_name = add_image($path, $img_name, $img_tmp_name, $img_tmp_error, $ext_file_name);

      if ($new_img_name === false) {
         // Error uploading image
         echo "Error uploading image.";
      } else {
         if (!add_services($conn, $service_title, $service_desc, $new_img_name)) {
            // Error adding service to database
            echo "Error adding service: " . mysqli_error($conn);
         } else {
            $adminid = $_SESSION['admin-id'];
            $userType = $_SESSION['user_type'];
            $activity = "Add Service";

            activityLog($conn, $adminid, $userType, $activity, $date_today);

            echo "<script> alert('".$service_title." Inserted') </script>";
            header("location: ../addservices.php");
            exit(); // Ensure no further code execution after redirection
         }
      }
   }
?>
