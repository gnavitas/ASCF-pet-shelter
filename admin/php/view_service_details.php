<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
   // include "../includes/date_today.php";
   // include "../function/services_function.php";


   $service_id =  $_POST['service_id'];

   $selService = "SELECT * FROM `services_transaction` a
   JOIN `user_details` b
   ON a.user_id = b.user_id
   WHERE a.services_application_id = '$service_id'";

   $resService = mysqli_query($conn, $selService);
   $service = mysqli_fetch_assoc($resService);


   $schedule = $service['schedule'];

   $schedule = new DateTime("$schedule");
   $schedule = $schedule->format('F d, Y');

   $dateApply = $service['date_apply'];
   $dateApply = new DateTime("$dateApply");
   $dateApply = $dateApply->format('F d, Y');

?>

<!-- View approved application -->
<div class="view-ser-container">

   <div class="ref-no-date">

      <p> reference number: <b> <?=$service['services_application_id']?></b> </p>

      <p> date of application: <b> <?=$dateApply?> </b> </p>

   </div>

   <div class="adopter-details">
      <h3> user's details </h3>

      <div class="adopter-detail-section">

         <div class="details">

            <div class="form-input-disable">
               <p> name: </p>
               <input type="text" value="<?=$service['firstname']?> <?=$service['lastname']?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> email: </p>
               <input type="text" style="text-transform:lowercase" value="<?=$service['email']?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> contact: </p>
               <input type="text" value="<?=$service['contact']?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> address: </p>
               <input type="text" value="<?=$service['address']?>" readonly>
            </div>

         </div>
         
         <div class="id-1x1">
            <div class="image">
               
               <img src="<?=$service['image_path']?><?=$service['onebyone']?>" alt="">
            </div>
         </div>

      </div>   
      
   </div>

   <div class="valid-id">
      <h3> Valid ID </h3>

      <div class="img-container">
         <div class="img-holder">
            <img src="<?=$service['image_path']?><?=$service['valid_id']?>" alt="">
         </div>   
      </div>
   </div>


   <div class="button-sched">
      <div class="date-of-interview">

         <p> schedule: <b> <?=$schedule?> </b> </p>
      </div>

      <div class="form-button-back">
         <button id="view-ser_back"> 
            <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
            close 
         </button>
         <!-- <button data-ref_no="">  Not attended </button> -->
         <button id="next-appl_btn" data-role="attended" data-ref_no="<?=$service['services_application_id']?>">  Attended </button>
      </div>
   </div>

</div>
<script>
$(document).ready(function(){
    $('#view-ser_back').click(function(){
        $('#view-service-details').hide();
    });

    $('button[data-role=attended]').click(function(){
        let ref_id = $(this).data('ref_no');

        $.ajax({
            url: './process/updateService.php',
            type: 'POST',
            data: { ref_id: ref_id },
            success: function(response) {
                // Reload the current page after successful update
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr, status, error);
                // Handle error response if needed
            }
        });
    });
});
</script>
