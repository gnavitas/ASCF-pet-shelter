<?php
include "../includes/db_con.php";

$report_id = $_POST['report_id'];

$sel_report = "SELECT * FROM `abuse_report` WHERE `report_id` = '$report_id'";
$res_report = mysqli_query($conn, $sel_report);

$report = mysqli_fetch_assoc($res_report);

$date_reported = $report['datetime'];

$date_reported = new DateTime("$date_reported");
$date_reported = $date_reported->format('M d, Y h:i A');


?>

<div class="report-modal">

   <div class="report-details">


      <div class="report-info">
         <div class="report-image">

            <div class="image">

               <img src="../mobile/<?= $report['path'] ?>" alt="">
            </div>
         </div>

         <div class="details">

            <div class="form-input">
               <label for=""> report id </label>
               <input type="text" value="<?= $report['report_id'] ?>" disabled>
            </div>
            <div class="form-input">
               <label for=""> email </label>
               <input type="text" value="<?= $report['email'] ?>" disabled>
            </div>

            <div class="form-input">
               <label for=""> description </label>
               <textarea name="" id="" disabled><?= $report['description'] ?></textarea>
            </div>

            <div class="form-input">
               <label for=""> address </label>
               <textarea name="" id="" disabled><?= $report['address'] ?></textarea>
            </div>
         </div>
      </div>
   </div>

   <div class="report-map">

      <div class="map">

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15430.729594544086!2d120.9859461!3d14.786910849999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ade2c6edc7f5%3A0x99741c84271aadad!2sPrenza%20I%2C%20%2C%20Bulacan!5e0!3m2!1sen!2sph!4v1713390310644!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

         <!-- <iframe width="600" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" referrerpolicy="no-referrer-when-downgrade" loading="lazy" src="https://maps.google.com/maps?saddr=14.7036,121.0895&daddr=14.6445172,121.0277004&travelmode=driving&dir_action=navigatehl=en&amp&output=embed%22%3E">
         </iframe> -->

      </div>


   </div>
   <div class="report-action">
      <h4>Action Taken:</h4>
      <textarea name="report-input" id="report-input" rows="7"><?= $report['action_taken'] ?></textarea>
      <input type="hidden" id="report-id" name="report_id" value="<?= $report_id ?>">
   </div>

   <div class="report-footer-modal">

      <div class="date-type">

         <p> Type of report: <b> <?= $report['type_of_report'] ?></b></p>

         <p> Date Report: <b> <?= $date_reported ?> </b></p>
      </div>


      <div class="form-button">

         <button class="report-close-btn"> Close </button>
         <button class="report-sub-btn">Submit</button>

      </div>

      <!-- <div class="form-button">
         <input type="text" id="report-input">
         <input type="hidden" id="report-id" name="report_id" value="<?= $report_id ?>">
         <button class="report-sub-btn">Submit</button>
      </div> -->

   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $('.report-close-btn').click(function() {

      $('.view-report-details').hide();

   });


   $(document).ready(function() {
      $('.report-sub-btn').click(function(event) {
         event.preventDefault();
         var reportData = $('#report-input').val();
         var reportId = $('#report-id').val();

         $.ajax({
            url: './php/insert_report_action.php',
            type: 'POST',
            data: {
               reportData: reportData,
               reportId: reportId
            },
            success: function(response) {
               console.log(response);
            },
            error: function(xhr, status, error) {
               console.log(xhr.responseText);
            }
         });

         $('.view-report-details').hide();
      });
   });
</script>