<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>



   <section class="hero">

      <div class="swiper hero-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="content">
                  <span>order online</span>
                  <h3>Fresh Products</h3>
                  <a href="#" class="btn">see menu</a>
               </div>
               <div class="image">
                  <img src="images/download-compresskaru.com.png" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>order online</span>
                  <h3>Organic Products</h3>
                  <a href="#" class="btn">see menu</a>
               </div>
               <div class="image">
                  <img src="images/img_2.png" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>order online</span>
                  <h3>Healthy Products</h3>
                  <a href="#" class="btn">see menu</a>
               </div>
               <div class="image">
                  <img src="images/3.png" alt="">
               </div>
            </div>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <section class="category">

      <h1 class="title">food category</h1>

      <div class="box-container">

         <a href="#" class="box">
            <img src="images/agricultural-produce.png" alt="">
            <h3>Crops</h3>
         </a>
      
         <a href="#" class="box">
            <img src="images/fruits.png" alt="">
            <h3>Fruits</h3>
         </a>

         <a href="#" class="box">
            <img src="images/Vegetable.png" alt="">
            <h3>Vegetables</h3>
         </a>


      </div>

   </section>




   <section class="products">

      <h1 class="title">list of our products</h1>

      <div class="box-container">


      </div>

      <div class="more-btn">
         <a href="#" class="btn">view all</a>
      </div>

   </section>


















   <?php include 'components/footer.php'; ?>


   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
      var swiper = new Swiper(".hero-slider", {
         loop: true,
         grabCursor: true,
         effect: "flip",
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });
   </script>

</body>

</html>