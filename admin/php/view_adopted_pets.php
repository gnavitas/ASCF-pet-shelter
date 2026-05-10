<STYLE>


/* CSS for the adoption view */

.view-appl-container {
    margin: 20px;
}

.ref-no-date {
    margin-bottom: 20px;
}

.pet-details, .adopter-details {
    margin-bottom: 20px;
}

.pet-detail-section, .adopter-detail-section {
    display: flex;
    justify-content: space-between;
}

.details {
    width: 45%;
}

.form-input-disable {
    margin-bottom: 10px;
}

.form-input-disable input[type="text"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f8f8f8;
}

.pet-image, .id-1x1 {
    width: 45%;
}

.image img {
    max-width: 100%;
    height: auto;
    display: block;
    border-radius: 5px;
}

.button-sched {
    text-align: center;
}

.form-button-back button {
    background-color: maroon;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-button-back button:hover {
    background-color: #800000;
}


</style>


<?php

   include "../includes/db_con.php";
   include "../includes/date_today.php";


   $pet_id =  $_POST['pet_id'];

   // not_attended($conn, $ref_no);

   $sel_adopted_pet_query = "SELECT * FROM `pet_details` a
   JOIN `pet_status` b
   ON a.pet_id = b.pet_id
   JOIN `adoption_transaction` c
   ON a.pet_id = c.pet_id
   JOIN `user_details` d
   ON c.user_id = d.user_id
   JOIN `adoption_status` e
   ON c.adoption_id = e.adoption_id
   WHERE e.status = 'success' AND a.pet_id = '$pet_id';";

   $res_adopted_pet = mysqli_query($conn, $sel_adopted_pet_query);

   $adopted_pet = mysqli_fetch_assoc($res_adopted_pet);



   $date_adopted = $adopted_pet['date_update'];


   $date_adopted = new DateTime("$date_adopted");
   $date_adopted = $date_adopted->format('M d, Y h:i A');

?>

<!-- View approved application -->
<div class="view-appl-container">

<div class="ref-no-date">

   <p> PET ID: <b> <?=$adopted_pet['pet_id']?> </b> </p>

   <p> date adopted: <b> <?=$date_adopted?> </b> </p>

</div>

<div class="pet-details">

   <h3> pet's details </h3>

   <div class="pet-detail-section">

      <div class="details">

         <div class="form-input-disable">
            <p> name: </p>
            <input type="text" value="<?=$adopted_pet['pet_name']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> species/type: </p>
            <input type="text" value="<?=$adopted_pet['pet_species']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> breed: </p>
            <input type="text" value="<?=$adopted_pet['pet_breed']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> sex: </p>
            <input type="text" value="<?=$adopted_pet['pet_gender']?>" readonly>
         </div>

      </div>
      
      <div class="pet-image">
         <div class="image">
            <img src="../pets_image/<?=$adopted_pet['pet_image']?>" alt="">
         </div>
      </div>

   </div>   
   
</div>


<div class="adopter-details">
   <h3> adopter's details </h3>

   <div class="adopter-detail-section">

      <div class="details">

         <div class="form-input-disable">
            <p> name: </p>
            <input type="text" value="<?=$adopted_pet['fullname']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> email: </p>
            <input type="text" style="text-transform:lowercase" value="<?=$adopted_pet['email']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> contact: </p>
            <input type="text" value="<?=$adopted_pet['contact']?>" readonly>
         </div>

         <div class="form-input-disable">
            <p> address: </p>
            <input type="text" value="<?=$adopted_pet['address']?>" readonly>
         </div>

      </div>
      
      <div class="id-1x1">
         <div class="image">
            
            <img src="../<?=$adopted_pet['1by1_id']?>" alt="">
         </div>
      </div>

   </div>   
   
</div>



<div class="button-sched">
   <div class="form-button-back">
      <button id="view-adopted_back"> 
         <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
         close 
      </button>
   </div>
</div>

</div>

<script>
   
   $("#view-adopted_back").click(function(){

      $(".adopted-view-modal").hide();

   });
</script>