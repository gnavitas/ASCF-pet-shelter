<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('head.php');
    ?>
    <link rel="stylesheet" href="css/missingPetDetail.css">
</head>

<body>
    <?php
    include_once('navigation.php');
    ?>

    <main>
        <div class="missingHeader">
            <h2>Missing Pet</h2>
            <span>A cry for help for our Furry Friend</span>
        </div>
        <div class="missingPetContainer">
            <div class="image"><img src="assets/Missing-1.png" alt=""></div>
            <div class="pet">
                <div class="dateLoc">
                    <h3>Date and Location of Missing</h3>
                    <div class="primary">
                        <span>December 12, 2023</span>
                        <span>Location</span>
                    </div>
                </div>
                <div class="petInfo">
                    <h3>Information</h3>
                    <ul>
                        <li><span>Name: </span><span class="primary">Brutus</span></li>
                        <li><span>Color: </span><span>Brown Black</span></li>
                        <li><span>Species: </span><span>Dog</span></li>
                        <li><span>Breed: </span><span>Shih Tzu</span></li>
                        <li><span>Gender: </span><span>Male</span></li>
                    </ul>
                </div>

                <div class="petDesc">
                    <h3>Description</h3>
                    <p>Family Pet</p>
                </div>
            </div>
            <div class="contact">
                <h3>Contact Information</h3>
                <div class="cNumber">
                    <h4>Contact or text with any information</h4>
                    <span>09398707328</span>
                </div>
                <div class="cEmail">
                    <h4>Email</h4>
                    <span>YOUR_EMAIL@gmail.com</span>
                </div>
                <div class="cSocial">
                    <h4>Facebook Account</h4>
                    <span>Animal Shelter (click <a href="https://www.facebook.com/" class="primary" target="_blank" rel="noopener noreferrer">Here</a> )</span>

                </div>
            </div>
        </div>
    </main>

    <?php
    include_once('footer.php')
    ?>
</body>

</html>