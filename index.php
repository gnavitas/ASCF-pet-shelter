<?php 
   // Include the database connection code
   include "./db/db_con.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/index.css">

  <!-- Slick for Slider  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-image">
      <div>
        <img class="image" src="assets/contact.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_ 2.jpg" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_ 3.jpg" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_ 4.jpg" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_ 5.jpg" alt="" />
      </div>
   
    </div>
    <div class="content">
      <h1 class="hero-title">Animal Shelter and Care Facility </h1>
  </section>

  <!-- Description Section  -->
  <section class="qcanimal-desc">
    <div class="qcanimal-desc-header">
    </div>
    <div>
      <p>Welcome to the Animal Shelter page, your go-to destination for all things related to animal welfare and rescue efforts in , Philippines. As a beacon of compassion and advocacy, we are dedicated to providing a safe haven for stray and abandoned animals, advocating for their rights, and promoting responsible pet ownership within our community. Join us on our mission to make a difference in the lives of animals in need, and together, let's create a world where every animal is treated with love, respect, and dignity.</p>
    </div>
  </section>

  <!-- ordinance section  -->
  <section class="ordinance">
    <div class="ordinance-content">
    <div class="video">
      <video controls playsinline autoplay muted loop>
          <?php
           

            // Construct the SQL query to fetch the latest video from the database
            $query = "SELECT * FROM cms_content ORDER BY id DESC LIMIT 1";

            // Execute the SQL query
            $result = mysqli_query($conn, $query);

            // Fetch the video path from the result set
            if ($row = mysqli_fetch_assoc($result)) {
                $video_path = $row['video_content'];
                // echo $video_path;

                // Display the video player with the fetched video path as the source
                echo '<source src="' . $video_path . '" type="video/mp4" />';
            }

            // Close the database connection
            // mysqli_close($conn);
          ?>
      </video>
    </div>
      <div class="ordinance-events">
        <div>
          <h2>Ordinances</h2>
          <div class="ordinance-link">
            <a href="https://www.facebook.com/photo.php?fbid=191937020036602&set=pb.100076609161356.-2207520000&type=3" target="_blank">REPUBLIC ACT 10631</a>
 

          </div>
        </div>
        <div class="events">
          <h2>Announcement & Event</h2>
          <div class="events-image">

            <?php
              $selImg = "SELECT * FROM `cms_announcement` 
              ORDER BY `id` DESC LIMIT 5;";

              $selImages = mysqli_query($conn, $selImg);

              if(mysqli_num_rows($selImages) > 0) {

                while($image = mysqli_fetch_assoc($selImages)){

                  ?>

                    <div>
                      <img src="./contents/<?=$image['img_name']?>" alt="<?=$image['img_name']?>">
                    </div>
                  <?php 

                }

                

              } else {
                ?>

                  <div>
                    <p> No Announcement </p>
                  </div>
                <?php 
              }
            ?>

          </div>




        </div>
      </div>
    </div>

  </section>



  <!-- Mobile App Section  -->
 

  <?php
  include "index_status_section.php";
  ?>
  <!-- Status Section  -->
  <section class="status">
    <h2 class="status-header-title">Pets</h2>
    <div class="status-content">
      <div class="status-cards">
        <span class="status-cards-number"><?php echo $count_dogs ?></span>
        <h2 class="status-cards-name">Dogs</h2>
      </div>
      <div class="status-cards">
        <span class="status-cards-number"><?php echo $count_cats ?></span>
        <h2 class="status-cards-name">Cats</h2>
      </div>
      <div class="status-cards">
        <span class="status-cards-number"><?php echo $count_adopted ?></span>
        <h2 class="status-cards-name">Adopted</h2>
      </div>
    </div>
  </section>

  <!-- FAQs Section -->
  <section class="faqs">
    <div class="faqs-header">
      <h2>FAQs</h2>
    </div>
    <div class="faqs-content">
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to adopt a pet?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Requirements:</h3>
          <div class="indent">
            <strong>For individual adopter</strong>
            <ol type="A">
              <li> Adoption form</li>
              <li> Government-issued ID</li>
            </ol>
            <strong>For a Group Adopter</strong>
            <ol type="A">
              <li> Shelter registration from BAI</li>
              <li> Location of the shelter</li>
              <li> Complete adoption form</li>
              <li> Mayors permit</li>
             
            </ol>
          </div>
          <h3>Procedures:</h3>
          <div class="indent">
            <ol type="1">
              <li>Customers will select an animal from either our website or the city pound.
              </li>
              <li>The client will undergo an interview.</li>
              <li>The City Veterinary department may conduct a possible home visit.</li>
              <li>Submit the adoption.</li>
              <li>The release of the pet from the city pound.</li>
            </ol>

          </div>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to avail anti-rabies vaccine?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Requirements:</h3>
          <div class="indent">
            <ol type="A">
              <li> Pet must be 3 months older 
              </li>
              <li>The animals should be healthy, without any current illnesses, and not receiving any medication.</li>
              <li>Not pregnant; not lactating</li>
              <li>Must bring cage or leash</li>
              <li>For two or more pets, there must be two people present.</li>
            </ol>
          </div>
          <h3>Procedures:</h3>
          <div class="indent">
            <ol type="1">
              <li> Bring your pet for anti-rabbies vaccination at Animal Shelter and Care Facility for proper recording and documentation
              </li>
              <li>Present your healthy pet for physical consultation and vaccination
              </li>
              <li>Wait until your pet is vaccinated</li>
              <li>Obtain your vaccination card</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to avail spay and neuter services?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Requirements:</h3>
          <div class="indent">
            <ol type="A">
              <li> 
              Male dogs, as well as male and female cats, must be at least 6 months old, in good health, free from any diseases, not lactating, and not under any medication.
              </li>
              <li>No consumption of food or water for a period of 8 hours.</li>
            </ol>
          </div>
          <h3>Procedures:</h3>
          <div class="indent">
            <ol type="1">
              <li> Inquire at Animal Shelter and Care Facility about the request for spay and neuter </li>
              <li>Bring your pet at Animal Shelter and Care Facility </li>
              <li>Provide the details required to fill out the consent form for the operation.</li>
              <li>Please hold off until the surgery is underway.</li>
              <li>After the procedure, let the pet rest and recover from anesthesia.</li>
              <li>Obtain the prescription for your pet.</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to effectively care for a dog?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Comprehensive Tips for Proper Dog Care</h3>
          <p>Ensuring proper care for your dog involves several aspects including nutrition, exercise, medical attention, grooming, and socialization. Below are guidelines for each of these areas:</p>
          <div>
            <h4>Nutrition:</h4>
            <p>Provide your dog with a balanced diet tailored to meet their nutritional requirements, considering factors such as age, breed, and health condition. Consult your vet to determine the appropriate type and quantity of food for your dog.</p>
          </div>
          <div>
            <h4>Exercise:</h4>
            <p>Regular exercise is crucial to maintain your dog's health and prevent behavioral issues. This can involve daily walks, supervised play in a secure area, or visits to a dog-friendly park.</p>
          </div>
          <div>
            <h4>Medical Care:</h4>
            <p>Schedule routine veterinary appointments for vaccinations, check-ups, and preventive treatments. Stay updated on flea, tick, and heartworm prevention measures.</p>
          </div>
          <div>
            <h4>Grooming:</h4>
            <p>Regular grooming contributes to your dog's overall well-being. This includes brushing their coat, trimming their nails, cleaning their ears, and bathing them as necessary.</p>
          </div>
          <div>
            <h4>Socialization:</h4>
            <p>Early socialization is essential for your dog to feel comfortable around people and other animals. This can involve obedience training, visits to dog parks, or arranging playdates with other dogs.</p>
          </div>
          <br>
          <p>Alongside these guidelines, ensure your dog receives plenty of affection and mental stimulation through playtime, cuddles, and interactive activities. By adhering to these recommendations, you can promote your dog's long-term health and happiness.</p>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to properly care for a cat?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Comprehensive Guidelines for Cat Care</h3>
          <p>Caring for a cat involves various essential aspects such as nutrition, socialization, spaying/neutering, identification, and creating a safe environment. Here are some recommendations for each of these aspects:</p>
          <div>
            <h4>Nutrition:</h4>
            <p>Provide your cat with a well-balanced diet tailored to meet their nutritional requirements, taking into account factors such as age, breed, and health condition. Consult your vet to determine the appropriate type and quantity of food for your cat.</p>
          </div>
          <div>
            <h4>Socialization:</h4>
            <p>Early socialization is crucial to help your cat feel at ease around people and other animals. This can involve introducing them to new experiences in a calm and positive manner.</p>
          </div>
          <div>
            <h4>Spay/Neuter:</h4>
            <p>Consider spaying or neutering your cat to prevent health issues and unwanted litters of kittens.</p>
          </div>
          <div>
            <h4>Identification:</h4>
            <p>Ensure your cat has proper identification in case they get lost. This can include a collar with ID tags or a microchip.</p>
          </div>
          <div>
            <h4>Safe Environment:</h4>
            <p>Keep your cat safe by providing a secure living space and eliminating hazards such as toxic substances and dangerous objects.</p>
          </div>
          <br>
          <p>Additionally, shower your cat with love and attention, engage in playtime, cuddle, and provide mental stimulation through games and puzzles. By adhering to these guidelines, you can contribute to your cat's long-term health and happiness.</p>
        </div>
      </div>
    </div>
  </section>
  <?php
  include_once('footer.php')
  ?>

  <script src="js/slick.js"></script>
</body>

</html>