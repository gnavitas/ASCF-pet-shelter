
<Style>
.footer-container {

  height: 100%; /* Fill the footer height */
}
  </style>
<!-- Footer Section -->
<footer>
  <div class="footer-container">
    <div class="contact">
      <h3>CONTACT US</h3>
      <div>
        <i class="fas fa-map-marker-alt"></i>
        <p>Prenza 1, , Bulacan, Philippines</p>
      </div>
      <div>
        <i class="fas fa-phone"></i>
        <p>(+63) 926 431 3048</p>
      </div>
      <div>
        <i class="fas fa-at"></i>
        <p>agrimarilao@yahoo.com</p>
      </div>
      <div>
        <i class="fas fa-globe"></i>
        <p>Animal Shelter and Care Facility </p>
      </div>
      <div>
        <i class="fas fa-clock"></i>
        <p><span class="red">Weekdays 8 AM – 6 PM | Weekends 6 AM – 3 PM
      </div>
    </div>

    <div class="services">
      <?php
      include "./function/fetch_data.php";

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      ?>
      <h3>SERVICES</h3>
      <ul>
        <?php
        while ($row = mysqli_fetch_assoc($result_services_nav)) {
          echo '<li><a href="services.php?page=' . $row["type_of_service"] . '">' . $row["type_of_service"] . '</a></li>';
        }
        ?>
      </ul>
    </div>

  </div>
</footer>

<!-- ------SCRIPTS-------- -->
<!-- JQUERY for some animation  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Slick Slider  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="js/index.js"></script>