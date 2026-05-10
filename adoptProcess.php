
<style>
    .alert-red {
      color: red;
    }

    .warning {
    color: red;
    margin-top: 5px;
    display: none;
  }
  </style>


<?php


include "./db/db_con.php";
include "./function/checksession.php";
include "./function/CheckEmailStatus.php";


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Check if pet_id is set
if (isset($_GET['id'])) {

  $pet_id = $_GET['id'];
  // echo $pet_id;

  $sel_pet_query = "SELECT * FROM `pet_details` a
  JOIN `pet_status` b
  ON b.pet_id = a.pet_id
  JOIN `pet_story` c
  ON c.pet_id = a.pet_id
  WHERE b.status = 'available' AND a.pet_id = '$pet_id';";

  $res_pet_query = mysqli_query($conn, $sel_pet_query);

  $sel_pet_behavior_query = "SELECT * FROM `pet_characteristics` WHERE pet_id = '$pet_id'";
  $res_pet_behavior = mysqli_query($conn, $sel_pet_behavior_query);

  if (mysqli_num_rows($res_pet_query) === 1) {

    $pet_info = mysqli_fetch_assoc($res_pet_query);
  } else {
    // Pet not found, redirect to error page
    header("Location: 404.php");
    exit();
  }
} else {
  // Pet ID not set, redirect to error page
  header("Location: 404.php");
  exit();
}


$user_id = $_SESSION['user_id'];

$sel_user_query = "SELECT * FROM `user_details` WHERE user_id = '$user_id'";
$res_user_query = mysqli_query($conn, $sel_user_query);

if (mysqli_num_rows($res_user_query) === 1) {
  $user_info = mysqli_fetch_assoc($res_user_query);
} else {
  // User not found, redirect to error page
  header("Location: 404.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/adoptProcess.css">
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <main>
    <?php $row = mysqli_fetch_assoc($res_pet_query); ?>
    <div class="header-img">
      <img src="./pets_image/<?= $pet_info['pet_image'] ?>" alt="">
    </div>
    <div class="header-info">
      <h3>Pet's Information</h3>
      <div>
        <div>
          <p class="primary">Pet ID:</p>
          <p><span class='pet-name'> <?= strtoupper($pet_info['pet_id']) ?> </span></p>
        </div>
        <div>
          <p class="primary">Name:</p>
          <p><span class='pet-name'> <?= $pet_info['pet_name'] ?> </span></p>
        </div>
        <div>
          <p class="primary">Species:</p>
          <p><span class='pet-name'> <?= $pet_info['pet_species'] ?> </span></p>
        </div>
      </div>
    </div>


    <h4>Fill up this Form</h4>
    <p>
      Text Field that has ( <span class="alert-red">*</span> ) is required
    </p>
    <div class="invalid-feedback" id="missing-feedbackFirst"></div>
    <div class="invalid-feedback" id="missing-feedbackSecond"></div>
    <div class="invalid-feedback" id="missing-feedbackThird"></div>
    <div class="invalid-feedback" id="missing-feedbackFourth"></div>
    <div class="invalid-feedback" id="uploadsize-feedbackSecond"></div>
    </div>

    <!-- Form  -->
    <form action="adoptSuccess.php" method="POST" class="adoptProcessForm" id="adoptProcessForm" enctype="multipart/form-data">
      <div class="adoptProcess adoptFirst current">
        <input type="hidden" name="pet_id" value="<?= $pet_info['pet_id'] ?>" required />
        <div>
          <span>Email <span class="alert-red">*</span> </span><input type="email" name="email" id="email" value="<?= $user_info['email'] ?>" required />
        </div>
        <div> 
          <span>Full Name <span class="alert-red">*</span> </span><input type="text" name="fullName" id="fullName" value="<?= $user_info['firstname'] . " " . $user_info['lastname'] ?>" required />
        </div>
        <div>
          <span>Address <span class="alert-red">*</span> </span><input type="text" name="address" id="address" value="<?= $user_info['address'] ?>" required />
        </div>
        <div>
          <span>Contact No. <span class="alert-red">*</span> </span><input type="text" name="contact" id="contact" value="<?= $user_info['contact'] ?>" required />
        </div>
        <div class="formButtons">
          <button type="button" class="primary-button form-button nextBtn" id="nextBtnFirst">
            Next
          </button>
          <a href="index.php" class="form-button adoptCancel">
            Cancel
          </a>
        </div>
      </div>

      <div class="adoptProcess adoptSecond">

        <div>
          <span>Valid ID <span class="alert-red">*</span>
          </span>
          <label for="idFile" class="file">Upload File</label>
          <input type="file" name="idFile" id="idFile" accept="image/*" class="hidden" required />
          <button type="button" class="remove-button hidden" id="idRemoveButton">Remove</button>
          <label id="idChosen"></label>
          <label id="sizeIdChosen"></label>
        </div>
        <div>
          <span>1x1 Picture (White Background)<span class="alert-red">*</span>
          </span>
          <label for="picFile" class="file">Upload File</label>
          <input type="file" name="picFile" id="picFile" class="hidden" accept="image/*" required />
          <button type="button" class="remove-button hidden" id="picRemoveButton">Remove</button>
          <label id="picChosen"></label>
          <label id="sizepicChosen"></label>
        </div>
        <div class="uploadHomeFile">
          <span>
          Photo of the future Pet's Home.<span class="alert-red">*</span>
          </span>
          <label for="homeFile" class="file">Upload File</label>
          <input type="file" name="homeFiles[]" accept="image/*" id="homeFile" class="hidden" multiple required />
          <label id="homeChosen"></label>
        </div>
        <div>
          <div>
            <button type="button" class="primary-button form-button nextBtn" id="nextBtnSecond">
              Next
            </button>
            <button type="button" class="form-button backBtn margin-s">Back</button>
          </div>
        </div>
      </div>

      
<div class="adoptProcess adoptThird">
  <p>
    For Future Furparents:
  </p>
  <div>
    <span>
      Have an existing pet? <span class="alert-red">*</span>
      <span class="warning-text" id="existingpet-warning" style="display: none; color:red;">Please consider how a new pet may interact with your existing pet.</span>
    </span>
    <select name="existingpet" id="existingpet" required onchange="toggleWarning(this.value, 'existingpet-warning')">
      <option hidden selected value="Select">Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div>
    <span>
      Able to go to the vet? <span class="alert-red">*</span>
      <span class="warning-text" id="vetassistance-warning" style="display: none; color:red;">Regular vet visits are essential for your pet's health and well-being.</span>
    </span>
    <select name="vetassistance" id="vetassistance" required onchange="toggleWarning(this.value, 'vetassistance-warning')">
      <option hidden selected value="Select">Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div>
    <span>
      Residential accommodation <span class="alert-red">*</span>
      <span class="warning-text" id="livingarrangement-warning" style="display: none; color:red;">Consider your living situation and whether it's suitable for a pet.</span>
    </span>
    <select name="livingarrangement" id="livingarrangement" required onchange="toggleWarning(this.value, 'livingarrangement-warning')">
      <option hidden selected value="Select">Select</option>
      <option value="Own">Own</option>
      <option value="Rent">Rent</option>
    </select>
  </div>
  <div>
    <span>
      Is There Enough Space/Space Requirement? <span class="alert-red">*</span>
      <span class="warning-text" id="spacereq-warning" style="display: none; color:red;">Ensure you have adequate space to accommodate a pet's needs.</span>
    </span>
    <select name="spacereq" id="spacereq" required onchange="toggleWarning(this.value, 'spacereq-warning')">
      <option hidden selected value="Select">Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div>
    <div>
      <button type="button" class="primary-button form-button " id="nextBtnThird">
        Next
      </button>
      <button type="button" class="form-button backBtn margin-s">Back</button>
    </div>
  </div>
</div>


<div class="adoptProcess adoptFourth">
  <p>
    For Pet:
  </p>
  <div>
    <span>
      Have a yard? <span class="alert-red">*</span>
    </span>
    <select name="pens" id="pens" required onchange="showWarning(this, 'yardWarning')">
      <option hidden disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div id="yardWarning" class="warning">
    Please ensure you have a secure outdoor area for your pet.
  </div>
  <div>
    <span>
      Have a cage?<span class="alert-red">*</span>
    </span>
    <select name="cage" id="cage" required onchange="showWarning(this, 'cageWarning')">
      <option hidden disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div id="cageWarning" class="warning">
    Please make sure your pet has proper confinement if needed.
  </div>
  <div>
    <span>
      Have a pet leash?<span class="alert-red">*</span>
    </span>
    <select name="leash" id="leash" required onchange="showWarning(this, 'leashWarning')">
      <option hidden disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div id="leashWarning" class="warning">
    Please ensure you have proper control over your pet during walks.
  </div>
  <div>
    <span>
      Have a feeder?<span class="alert-red">*</span>
    </span>
    <select name="feederer" id="feederer" required onchange="showWarning(this, 'feederWarning')">
      <option hidden disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div id="feederWarning" class="warning">
    Please ensure your pet is provided with proper nutrition.
  </div>
  <div>
    <span>
      Have a pet bed?<span class="alert-red">*</span>
    </span>
    <select name="sleepingarea" id="sleepingarea" required onchange="showWarning(this, 'bedWarning')">
      <option hidden disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div id="bedWarning" class="warning">
    Please provide a comfortable resting place for your pet.
  </div>
  <div>
    <span>
      Have a Proper Waste Disposal for pet waste? <span class="alert-red">*</span>
    </span>
    <select name="properwaste" id="properwaste" required onchange="showWarning(this, 'wasteWarning')">
      <option hidden disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div id="wasteWarning" class="warning">
    Please ensure proper disposal of your pet's waste to maintain cleanliness.
  </div>
  <input type="hidden" name="pet_color" value="<?php echo $pet_info['pet_color']; ?>">
  <input type="hidden" name="status" value="For Interview">
 <form action="your_action_page.php" method="post">
  <label for="terms_conditions">
    <input type="checkbox" id="terms_conditions" name="terms_conditions" required>
    I have read and agree to the <a href="./assets/pdf/agreement.pdf" target="_blank" style="color: red; ">Terms and Conditions</a>
  </label>
  <input type="hidden" name="pet_color" value="<?php echo $pet_info['pet_color']; ?>">
  <input type="hidden" name="status" value="For Interview">
  <button type="submit" class="primary-button form-button" id="adopt-submit">
    Submit
  </button>
</form>

  <button type="button" class="form-button backBtn">Back</button>
</div>
<script>
  function showWarning(selectElement, warningId) {
    var warning = document.getElementById(warningId);
    if (selectElement.value === "No") {
      warning.style.display = "block";
    } else {
      warning.style.display = "none";
    }
  }
</script>
    </form>
  </main>


  <?php
  include_once('footer.php')
  ?>
  <script src="js/adoptProcess.js"></script><script>
  function toggleWarning(value, warningId) {
    var warning = document.getElementById(warningId);
    if (value === 'No' || value === 'Rent') {
      warning.style.display = 'inline'; // Show warning text
    } else {
      warning.style.display = 'none'; // Hide warning text
    }
  }
</script>

</body>


</html>





