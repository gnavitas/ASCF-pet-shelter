
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php

include "../includes/db_con.php";
include "../includes/date_today.php";


$ref_no =  $_POST['ref_no'];

// not_attended($conn, $ref_no);

$sel_approved_appl_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.`adoption_id` = d.`adoption_id`
   WHERE b.`status` = 'approved' AND a.`reference_no` = '$ref_no'; ";

$res_approved_appl = mysqli_query($conn, $sel_approved_appl_query);

$applicant = mysqli_fetch_assoc($res_approved_appl);



$date_of_application = $applicant['date_of_schedule'];
$time_of_application = $applicant['time'];

$date_of_interview = "$date_of_application $time_of_application";


$date_of_interview = new DateTime("$date_of_interview");
$date_of_interview = $date_of_interview->format('M d, Y');

$date_schedule = $applicant['datetime'];

$date_schedule = new DateTime("$date_schedule");
$date_schedule = $date_schedule->format('M d, Y h:i A');



// HOUSES
$sel_appl_house_query = "SELECT a.`reference_no`, c.images FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `adoption_house` c
   ON a.adoption_id = c.adoption_id
   WHERE b.`status` = 'approved' AND a.`reference_no` = '$ref_no';";

$res_appl_house = mysqli_query($conn, $sel_appl_house_query);

?>

<!-- View approved application -->
<div class="view-appl-container">

   <div class="ref-no-date">

      <p> reference number: <b> <?= $applicant['reference_no'] ?> </b> </p>

      <p> date of application: <b> <?= $date_schedule ?> </b> </p>

   </div>

   <div class="adopter-details">
      <h3> adopter's details </h3>

      <div class="adopter-detail-section">

         <div class="details">

            <div class="form-input-disable">
               <p> name: </p>
               <input type="text" value="<?= $applicant['fullname'] ?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> email: </p>
               <input type="text" style="text-transform:lowercase" value="<?= $applicant['email'] ?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> contact: </p>
               <input type="text" value="<?= $applicant['contact'] ?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> address: </p>
               <input type="text" value="<?= $applicant['address'] ?>" readonly>
            </div>

         </div>

         <div class="id-1x1">
            <div class="image">

               <img src="../<?= $applicant['1by1_id'] ?>" alt="">
            </div>
         </div>

      </div>

   </div>

   <div class="pet-details">

      <h3> pet's details </h3>

      <div class="pet-detail-section">

         <div class="details">

            <div class="form-input-disable">
               <p> name: </p>
               <input type="text" value="<?= $applicant['pet_name'] ?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> species/type: </p>
               <input type="text" value="<?= $applicant['pet_species'] ?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> breed: </p>
               <input type="text" value="<?= $applicant['pet_breed'] ?>" readonly>
            </div>

            <div class="form-input-disable">
               <p> sex: </p>
               <input type="text" value="<?= $applicant['pet_gender'] ?>" readonly>
            </div>

         </div>

         <div class="pet-image">
            <div class="image">
               <img src="../pets_image/<?= $applicant['pet_image'] ?>" alt="">
            </div>
         </div>

      </div>

   </div>

   <div class="q-a-details">
      <h3> question & answer </h3>

      <div class="q-a">

         <?php

         $sel_user_answer_qry = "SELECT * FROM `adoption_transaction` a
         JOIN `pre_eval_user_answer` b
         ON a.reference_no = b.reference_no
         WHERE a.reference_no = '$ref_no';";

         $res_user_answer = mysqli_query($conn, $sel_user_answer_qry);

         $user_answer = mysqli_fetch_assoc($res_user_answer);

         ?>

         <table border="1">
            <tr>
               <th> questions </th>
               <th> answer </th>

            </tr>

            <tr>
               <td width="50%"> Have an existing pet? 
</td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['existing_pet'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Able to go to the vet?  </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['vet_assistance'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Is There Enough Space/Space Requirement? </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['space_req'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Residential accommodation </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['living_arrangement'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%">Have a cage? </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['cage'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Have a pet leash? </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['leash'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Have a yard?</td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['pens'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Have a feeder? </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['feederer'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Have a pet bed? </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['sleepingarea'] ?>" readonly>
                  </div>
               </td>

            </tr>

            <tr>
               <td width="50%"> Have a Proper Waste Disposal for pet waste? </td>
               <td>
                  <div class="form-input-disabled">
                     <input type="text" value="<?= $user_answer['properwaste'] ?>" readonly>
                  </div>
               </td>

            </tr>



         </table>
      </div>
   </div>


   <ddiv class="button-sched">
      <div class="date-of-interview">
         <p> status: <span><?php if ($applicant['status'] == 'approved') { echo "Pre-approved"; } ?> </span></p>
         <p> date of interview: <b> <?= $date_of_interview ?><br></b>time: <b> from 9am to 4pm</b></p>
      </div>

      <div class="form-button-back">
         <button id="view-appl_back">Close</button>
         <button id="next-appl_btn" data-ref_no="<?= $applicant['reference_no'] ?>" <?php if ($date_of_application !== $curr_date) { ?>  <?php } ?>>
            <i class="fa fa-arrow-right" aria-hidden="true"></i> Next 
         </button>
      </div>
   </div>
</div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $("#next-appl_btn").click(function() {
      var ref_no = $(this).data("ref_no");
      $("#modal-appl-view").show().load('./php/view_sched_today.php', { ref_no: ref_no });
   });

   $("#view-appl_back").click(function() {
      $("#modal-appl-view").hide();
   });
</script>

