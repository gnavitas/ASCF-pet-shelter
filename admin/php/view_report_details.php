<Style>

.report-modal {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  max-width: 700px;
  margin: 0 auto;
}

.report-details {
  display: flex;
}

.report-info {
  flex: 1;
}

.report-image {
  margin-bottom: 20px;
}

.image img {
  max-width: 100%;
  height: auto;
}

.details {
  padding-left: 20px;
}

.form-input {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
}

textarea, input[type="text"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

.report-map {
  flex: 1;
}

.report-action {
  margin-top: 20px;
}

.report-action textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

.report-footer-modal {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
}

.date-type p {
  margin: 0;
}

.form-button button {
  padding: 10px 20px;
  background-color: maroon;
  color:white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.form-button button.report-close-btn {
  background-color: maroon;
  color:white;
}

.form-button button.report-close-btn:hover,
.form-button button.report-sub-btn:hover {
  opacity: 0.8;
}

.form-button button.report-sub-btn {
  background-color: maroon;
  color:white;
}

</style>

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

<div class="report-image">
    <div class="image">
        <?php
        // Check if the report has an image
        if (!empty($report['report_image'])) {
            // Display the image
            echo '<img src="../assets/' . $report['report_image'] . '" alt="">';
        } else {
            // Display a placeholder or default image if no image is available
            echo '<img src="../assets/placeholder.jpg" alt="Placeholder Image"><br><br><br><br><br>';
        }
        ?>
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

   <iframe width="500" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=120.97243309020997%2C14.754650889051608%2C121.0%2C14.819164810748393&amp;layer=mapnik&amp;marker=14.78690737973585%2C120.98602557182312" style="border: 1px solid black"></iframe>


  

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