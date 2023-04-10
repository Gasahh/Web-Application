<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:index.html');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="log style.css">

</head>
<body>

   <div class="blob"></div>
        
        <div class="wrapper">

   <form action="" method="post">
                <h2>Login</h2>
                <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
                
        <div class="input-box">
            <span class="icon">
            <ion-icon name="mail"></ion-icon>
            </span>
            <input type="email" name="email" required >
            <label>Email</label>
        </div>

        <div class ="input-box">
            <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" name="password" required >
            <label>Password</label>
        </div>

        <div class="remember-forgot">
        <label><input type="checkbox">Remember me</label>
               
        </div>

        <button type="submit" name="submit" value="login now">Login</button>

        <div class="register-link">
            <p>Don't have an account?<a href="register_form.php">Register</a></p>
                
        </div>

    </form>
    </div>

<script type="module" src="http://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>