<?php
   include 'config.php';

   if(isset($_POST['submit']))
   {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];
        $phone=$_POST['phone'];
        $select=mysqli_query($conn, "SELECT * FROM `user_form` WHERE email='$email' AND password='$pass'") or die('query failed');
        if($pass==$cpass)
        {
        if(mysqli_num_rows($select)>0)
        {
            $message[]='user already exist!.....';
        }
        else{
            mysqli_query($conn, "INSERT  INTO `user_form` (name,email,password,phone) VALUES('$name','$email','$pass','$phone')")or die('query failed');
            $message[]='Successfully Registered.....';
            header('location:login.php');
        }
    }
    else{
        $message[]='Password does not Match.....';
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=l, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

if(isset($message))
{
    foreach($message as $message)
    {
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
    }
}

    ?>
      <div class="form-container">
        <form action="" method="post">
            <h3>Sign UP</h3>
            <input type="text" name="name" required placeholder="name" class="box">
            <input type="email" name="email" required placeholder="email" class="box">
            <input type="password" name="password" required placeholder="password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm password" class="box">
            <input type="tel" name="phone" required placeholder="Enter Mobile number" class="box">
            <input type="submit" name="submit" class="btn" value="register now">
            <p>already have an account? <a href="login.php">login now</a><p>

        </form>
      </div>
</body>
</html>