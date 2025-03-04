<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Kisan <img src="vegetables.png" width="25">
      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="#">about</a>
         <a href="#">menu</a>
         <a href="#">orders</a>
         <a href="#">contact</a>
      </nav>

      <div class="icons">
        
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn" style="text-align: center;">logout</a>
         </div>
         <?php if (!isset($_SESSION['user_id'])): ?>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php endif; ?>
         <?php
            }else{
         ?>
            <p class="name">Please Login or Register to continue</p>
            <a href="login.php" class="btn">login </a> 
            <a href="register.php" class="btn">register</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

