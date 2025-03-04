<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   // Check if the user exists with the provided email
   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
   $select_user->execute([$email, $email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      // User exists, now check password
      if($row['password'] === $pass){
         // Correct email and password
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      } else {
         // Correct email but incorrect password
         $message[] = 'Please enter correct password';
      }
   } else {
      // User not found, check if the email is correct
      $message[] = 'Please enter correct email or mobile number';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style>
   .password-box {
    position: relative;
}

.eye-button {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    background-color: transparent;
    border: none;
    cursor: pointer;
}

.eye-button img {
    width: 24px;
    height: 24px;
}
</style>
</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="text" name="email" required placeholder="enter your email or mobile number" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <div class="password-box">
      <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <button type="button" id="togglePassword" class="eye-button" style="display: none;">
        <img aria-hidden="true" alt="eye" src="https://openui.fly.dev/openui/24x24.svg?text=👁️" />
    </button></div>
      <p><a href="forget_password.php" style="color: blue; text-decoration: underline;">Forget Password?</a></p> <!-- Added this line -->
      <br><input type="submit" value="login now" name="submit" class="btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
     
</form>

</section>











<?php include 'components/footer.php'; ?>






<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>

const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.querySelector('input[type="password"]');

  togglePassword.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.querySelector('img').src = `https://openui.fly.dev/openui/24x24.svg?text=${type === 'password' ? '👁️' : '🙈'}`;
  });
  // Function to show/hide the eye button based on input
passwordInput.addEventListener('input', function() {
    if (passwordInput.value.length > 0) {
        togglePassword.style.display = 'block'; // Show the eye button
    } else {
        togglePassword.style.display = 'none'; // Hide the eye button
    }
});
  </script>

</body>
</html>