
<Style>

/* CSS */
.admin-profile-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  background-color: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.admin-avatar {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 20px;
}

.admin-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.admin-profile h3,
.admin-profile h4,
.admin-profile h5 {
  margin: 5px 0;
}

.admin-info {
  flex-grow: 1;
}

.text-info {
  margin-bottom: 10px;
}

.text-info h3 {
  margin-bottom: 5px;
}

.text-info p {
  margin: 0;
}

.form-button {
  margin-top: 20px;
}

.form-button button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.form-button button.activate-admin {
  background-color: maroon;
  color: white;
}

.form-button button.activate-admin:hover,
.form-button button.close-archive-modal:hover {
  background-color: #800000;
  color:white;
}

.form-button button.close-archive-modal {
  background-color: #ccc;
  color: #333;
  margin-left: 10px;
}




.archive-messagel{
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
<?php
   include "../includes/db_con.php";
   
   $admin_id = $_POST['admin_id'];
   
   $sel_inactive_admin_query = "SELECT *, LEFT(a.email, 1) as `initial_email` FROM `admin_info` a 
   JOIN `user_account` b
   ON a.admin_id = b.account_id
   JOIN `admin_temporary_account` c 
   ON a.admin_id = c.admin_id
   JOIN `admin_status` d
   ON a.admin_id = d.admin_id
   WHERE d.status = 'inactive' AND a.admin_id = '$admin_id'";

   $res_archive_admin = mysqli_query($conn, $sel_inactive_admin_query);

   $archive_admin = mysqli_fetch_assoc($res_archive_admin);
  

?>

<div class="admin-profile-container">
   <div class="admin-profile">
      <div class="admin-avatar">
         <?php 
               if(empty($archive_admin['avatar'])) { ?>

                  <p> <?=$archive_admin['initial_email']?> </p>

               <?php } else { ?>

                  <img src="./admin_profile/<?=$archive_admin['avatar']?>" alt="">

               <?php } ?>
      </div>
      <h3> <?=$archive_admin['user_type']?> </h3>
      <h4>  <?=$archive_admin['email']?> </h4>
      <h5> Date Created: <?=$archive_admin['date_created']?> </h5>
   </div>

   <div class="admin-info">
      <div class="text-info">
         <h3> ADMIN ID </h3>
         <p class="admin-id"> <?=$archive_admin['admin_id']?> </p>
      </div>

      <div class="text-info text-name">
         <div class="first-name">
            <h3>  FIRSTNAME </h3>
            <p>  
               <?php if(empty($archive_admin['firstname'])){
                  echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
               }else{ 
                  echo $archive_admin['firstname'];
               } ?>
             </p>
         </div>

         <div class="last-name">
            <h3> LASTNAME </h3>
            <p>
               <?php if(empty($archive_admin['lastname'])){
                  echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
               }else{ 
                  echo $archive_admin['lastname'];
               } ?>
            </p>
         </div>
      </div>

      <div class="text-info">
         <h3> CONTACT NUMBER </h3>
         <p>
            <?php if(empty($archive_admin['contact'])){
               echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
            }else{ 
               echo $archive_admin['contact'];
            } ?>
         </p>
      </div>

      <div class="text-info">
         <h3> ADDRESS </h3>
         <p>
            <?php if(empty($archive_admin['address'])){
               echo "<span style='color:#b44444; font-weight: 500'> not verified yet </span>";
            }else{ 
               echo $archive_admin['address'];
            } ?>
         </p>
      </div>


   </div>

   <div class="form-button">
      <button type="button" class="activate-admin" data-role="activate-admin" data-admin_id="<?=$archive_admin['admin_id']?>"> Activate </button>

      <button type="button" class="close-archive-modal"> Close </button>
   </div>
</div>



<div class="archive-message">

</div>

<script>

   $(document).ready(function(){

      $('.archive-message').hide();

      $('.close-archive-modal').click(function(){

         $("#view-archive-modal").hide();

      });


      $('button[data-role=activate-admin]').click(function(){

         var admin_id = $(this).data("admin_id");
         var admin_name = "<?=$archive_admin['firstname']?> <?=$archive_admin['lastname']?>";

         // alert(admin_name);

         $('.archive-message').show();

         $('.archive-message').load('./modal/archive_message.php',{

            admin_id: admin_id, 
            admin_name, admin_name

         });
         

      });

   });

</script>