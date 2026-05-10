<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption</title>
    <link rel="icon" href="assets/adopt-logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editMyAccount.css">
    <link rel="stylesheet" href="css/verifyAccount.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="./js/editMyAccount.js"></script>
    <?php
    include "./db/db_con.php";
    include "./function/checksession.php";
    include "./function/CheckAddress.php";
    include "./function/fetch_data.php";
    ?>
</head>

<body>

    <?php
    include_once('navigation.php');
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

        if (mysqli_num_rows($result_user) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result_user)) {

                $address = $row['address'];
                $components = extractAddressComponents($address);
                $street = $components['street'];

                $subdivision = $components['subdivision'];
                $barangay = $components['barangay'];
                $barangay = str_replace('Brgy. ', '', $barangay);

                if (!empty($subdivision)) {
                    $address_field =  $subdivision;
                } else {
                    $address_field = $street;
                }

    ?>

                <main>
                    <div>
                        <!-- <div class="img">
                            <img src="assets/mobile-logo.png" alt="Logo">
                        </div> -->
                        <div class="heading">
                            <div class="back"><a href="myAccount.php?page=account"><i class="fas fa-chevron-left"></i></a>
                                <h2>Edit Basic Information</h2>
                            </div>

                            <div class="invalid-feedback" id="missing-feedback"></div>
                            <div class="invalid-feedback" id="firstname-feedback"></div>
                            <div class="invalid-feedback" id="lastname-feedback"></div>
                            <div class="invalid-feedback" id="email-feedback"></div>
                            <div class="invalid-feedback" id="contact-feedback"></div>
                            <div class="invalid-feedback" id="street-feedback"></div>
                        </div>
                        <form id="checking" action="function/updateProfile.php" method="post">
                            <div class="input">
                                <div class="card-two-inputs">
                                    <div class="card-input">
                                        <span for="firstname">First Name <span class="alert-red">*</span></span>
                                        <?php echo '<input type="text" class="firstname" id="firstname" value="' . $row["firstname"] . '" name="firstname" required />'; ?>
                                    </div>

                                    <div class="card-input">
                                        <span for="lastname">Last Name <span class="alert-red">*</span></span>
                                        <?php echo '<input type="text" class="lastname" id="lastname" value="' . $row["lastname"] . '" name="lastname" required />';
                                        ?>
                                    </div>
                                </div>

                                <div class="card-two-inputs">
                                    <div class="register-input">
                                        <span for="email">Email <span class="alert-red">*</span></span>
                                        <?php if (isset($_SESSION['google_user']) && $_SESSION['google_user'] == true) {
                                            echo '<select name="email" class="email" id="email">
                                            <option value="' . $row["email"] . '">' . $row["email"] . '</option>
                                            </select>';
                                        } else {
                                            echo '<input type="text" class="email" id="email" value="' . $row["email"] . '"  name="email" required />';
                                        } ?>

                                    </div>

                                    <div class="register-input">
                                        <span for="phonenumber">Phone Number <span class="alert-red">*</span></span>
                                        <?php echo '<input type="text" class="contact" id="contact" value="' . $row["contact"] . '"   name="contact" placeholder="ex. 09123456789" required maxlength="11" />'; ?>
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
                                        <span for="barangay">Barangay <span class="alert-red"></span></span>
                                        <select name="barangay" id="barangay">
                                            <?php echo '<option value="' . $barangay . '">' . $barangay . '</option>'; ?>
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
                                    <?php
                                    echo '<input type="text" name="street" id="street" class="address" value="' . $address_field . '" required />';

                                    ?>
                                </div>
                    <?php
                }
            }
        }
                    ?>
                    <div class="form-btn">
                        <!-- <a href="myAccount.php?page=account" class="primary">Cancel</a> -->
                        <button type="submit" id="login-button" class="submit-btn">Submit</button>
                    </div>
                            </div>
                        </form>
                    </div>
                </main>
                <?php

                include_once('footer.php');
                ?>

                <!-- SCRIPTS -->



</body>

</html>