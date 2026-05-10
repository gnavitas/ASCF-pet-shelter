<!DOCTYPE html>
<html lang="en">
<?php

include "./db/db_con.php";
include "./function/fetch_data.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption</title>
    <link rel="icon" href="assets/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editMyAccount.css">
    <link rel="stylesheet" href="css/verifyAccount.css">
    <link rel="stylesheet" href="css/googleUpdateProfile.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <main>
        <div>
            <div class="img">
                <img src="assets/logo.png" alt="Logo">
            </div>
            <div class="heading">
                <h2>Complete Basic Information</h2>

                <div class="invalid-feedback" id="missing-feedback"></div>






            </div>
            <form id="checking" action="./function/googleInsert.php" method="post">
                <div class="input">
                    <div class="card-two-inputs">
                        <div class="card-input">
                            <span for="firstname">First Name <span class="alert-red">*</span></span>
                            <input type="text" class="firstname" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required />
                            <div class="invalid-feedback" id="firstname-feedback"></div>
                        </div>

                        <div class="card-input">
                            <span for="lastname">Last Name <span class="alert-red">*</span></span>
                            <input type="text" class="lastname" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required />
                            <div class="invalid-feedback" id="lastname-feedback"></div>
                        </div>
                    </div>

                    <div class="card-two-inputs">
                        <div class="register-input">
                            <span for="email">Email <span class="alert-red">*</span></span>
                            <input type="text" class="email" id="email" name="email" value="<?php echo $email;  ?>" required />
                            <div class="invalid-feedback" id="email-feedback"></div>
                        </div>

                        <div class="register-input">
                            <span for="phonenumber">Phone Number <span class="alert-red">*</span></span>
                            <input type="text" class="contact" id="contact" name="contact" placeholder="ex. 09123456789" required maxlength="11" />
                            <div class="invalid-feedback" id="contact-feedback"></div>
                        </div>
                    </div>


                    <div class="card-three-inputs">
                        <div class="register-input">
                            <span for="province">Province </span>
                            <select name="province" id="province">
                                <option value="Bulacan">Bulacan</option>

                            </select>
                        </div>


                        <div class="register-input">
                            <span for="city">City</span>

                            <select name="city" id="city">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="register-input">
                               <span for="barangay" class="small">Barangay <span class="alert-red"></span></span>
              <select name="barangay" id="barangay">
                <option value="ANorte">Abangan Norte</option>
                <option value="ASur">Abangan Suur</option>
                <option value="Ibayo">Ibayo</option>
                <option value="Lambakin">Lambakin</option>
                <option value="Lias">Lias</option>
                <option value="Loma">Loma de Gato</option>
                <option value="Nagbalon">Nagbalon</option>
                <option value="Patubig">Patubig</option>
                <option value="Poblacion1st">Poblacion 1st</option>
                <option value="Poblacion2nd">Poblacion 2nd</option>
                <option value="SantaRosa1st">Santa Rosa 1st</option>
                <option value="SantaRosa2nd">Santa Rosa 2nd</option>
                <option value="Saog">Saog</option>
                <option value="Tabingilog">Tabing-ilog</option>
                            </select>
                        </div>
                    </div>



                    <div class="register-input">
                        <span for="street">Street <span class="alert-red">*</span></span>
                        <input type="text" name="street" id="street" class="address" required />
                        <div class="invalid-feedback" id="street-feedback"></div>
                    </div>
                    <div class="form-btn">
                        <a href="./function/logout.php" class="primary">Cancel</a>
                        <button type="submit" id="login-button" class="submit-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>


    <!-- SCRIPTS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/googleUpdateProfile.js"></script>

</body>

</html>