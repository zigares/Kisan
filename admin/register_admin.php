<?php

include '../components/connect.php';

session_start();

if(isset($_POST['register'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   // Check if the username already exists
   $check_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?");
   $check_admin->execute([$name]);

   if($check_admin->rowCount() > 0){
      $message[] = 'username already exists!';
   }else{
      // Insert new admin into the database
      $insert_admin = $conn->prepare("INSERT INTO `admin`(name, password) VALUES(?, ?)");
      $insert_admin->execute([$name, $pass]);
      $message[] = 'registration successful! You can now login.';
      header('location:admin_login.php'); // Redirect to login page after registration
      exit();
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

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

<!-- admin registration form section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>register now</h3>
      <input type="text" name="name" maxlength="20" required placeholder="enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" name="register" class="btn">
  
      <p style="text-align: center; margin-top: 1rem;">Already have an account? <a href="admin_login.php" style="color: var(--main-color);">Login now</a></p>

   </form>

 
</section>

<!-- admin registration form section ends -->

</body>
</html>