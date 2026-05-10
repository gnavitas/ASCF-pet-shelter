<?php

if (isset($_POST['pet_type'])) { 
      
    if($_POST['pet_type'] === 'dog') { ?>

        <option value=""> Select Breed </option>
        <option value="Aspin"> Aspin </option>
        <option value="Beagle"> Beagle </option>
        <option value="Chihuahua"> Chihuahua </option>
        <option value="Chow Chow"> Chow Chow </option>
        <option value="Dalmatian"> Dalmatian </option>
        <option value="Doberman Pinscher"> Doberman Pinscher </option>
        <option value="English Bulldog"> English Bulldog </option>
        <option value="French Bulldog"> French Bulldog </option>
        <option value="German Shepherd"> German Shepherd </option> 
        <option value="Golden Retriever"> Golden Retriever </option>
        <option value="Great Dane"> Great Dane </option>
        <option value="Jack Russell Terrier"> Jack Russell Terrier </option>
        <option value="Japanese Spitz"> Japanese Spitz </option>
        <option value="Labrador Retriever"> Labrador Retriever </option>
        <option value="Miniature Pinscher"> Miniature Pinscher </option>
        <option value="Pomeranian"> Pomeranian </option>
        <option value="Poodle"> Poodle </option>
        <option value="Pug"> Pug </option>
        <option value="Rottweiler"> Rottweiler </option>
        <option value="Saint Bernard"> Saint Bernard </option>
        <option value="Shar Pei"> Shar Pei </option>
        <option value="Shih Tzu"> Shih Tzu </option>
        <option value="Siberian Husky"> Siberian Husky </option>
        <option value="Welsh Corgi"> Welsh Corgi </option>

    <?php
      
    } else if($_POST['pet_type'] === 'cat') { ?>
      
        <option value=""> Select Breed </option>
        <option value="America Curl"> America Curl </option>
        <option value="American Shorthair"> American Shorthair </option>
        <option value="Bengal Cat"> Bengal Cat </option>
        <option value="British Shorthair"> British Shorthair </option>
        <option value="Exotic Shorthair"> Exotic Shorthair </option>
        <option value="Himalayan Cat"> Himalayan Cat </option>
        <option value="Maine Coon"> Maine Coon </option>
        <option value="Persian Cat"> Persian Cat </option>
        <option value="Puspins"> Philippine Shorthair (Puspins) </option>
        <option value="Russian Blue"> Russian Blue </option>
        <option value="Siamese Cat"> Siamese Cat </option>

    <?php  
    }else { ?>

   <option value=""> Select type first </option>

   <?php 
   
      }
   
   }  
?>