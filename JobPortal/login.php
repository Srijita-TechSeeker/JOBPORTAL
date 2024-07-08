<?php

session_start();

include("connect.php");



if($_SERVER['REQUEST_METHOD'] == "POST")
{
   
   $e_mail=  $_POST['email'];
   $pass_word =  $_POST['password'];

   if(!empty($e_mail) && !empty($pass_word))
   {

       $query = "select * from  register where email = '$e_mail' ";
       $result = mysqli_query($conn, $query);
       

        if($result){

        

        if($result && mysqli_num_rows($result) > 0)
        {
           $user_data = mysqli_fetch_assoc($result);

           if($user_data['pass'] == $pass_word)
           {
               header("location: index.php");
               die;
           }
        }

    }
    echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
}
else{
    echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
}

      
}


?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <link rel="stylesheet" href="style.css">

    </head>
    <body>


     <header class="header">

        <section class="flex">

           <div id="menu-btn" class="fas fa-bars-staggered"></div>
          <a href="home.html" class="logo"><i class="fas fa-briefcase"></i>Career Ride</a>

          <nav class="navbar">
            <a href="home.html">home</a>
            <a href="about.html">about</a>
            <a href="jobs.html">all jobs</a>
            <a href="contact.html">contact Us</a>
            <a href="login.php">account</a>
            <a href="post_jobs.html">posted jobs</a>
          </nav>

          <a href="#" class="btn" style="margin-top: 0;">post jobs</a>
        </section>

     </header>



     <!--account section starts-->

     <div class="account-form-container">

     <section class="account-form">

      <form action="login.php" method="post">
        <h3>welcome back!</h3> 
        <input type="email" required name="email" maxlength="50" placeholder="enter your email" class="input">
        <input type="password" required name="password" maxlength="20" placeholder="enter your password" class="input">
        <p>don't have an account? <a href="register.php">register now</a></p>
        <input type="submit" value="login now" name="submit" class="btn1">

      </form>

     </section>
     

     </div>



<!--account section ends-->







    <!--footer section starts-->
    <footer class="footer">

      <section class="grid">

        <div class="box">

          <h3>quick links</h3>
          <a href="home.html"><i class="fas fa-angle-right"></i>home</a>
          <a href="about.html"><i class="fas fa-angle-right"></i>about</a>
          <a href="jobs.html"><i class="fas fa-angle-right"></i>all jobs</a>
          <a href="contact.html"><i class="fas fa-angle-right"></i>contact us</a>
          <a href="#"><i class="fas fa-angle-right"></i>filter search</a>

        </div>
        <div class="box">

          <h3>extra links</h3>
          <a href="#"><i class="fas fa-angle-right"></i>account</a>
          <a href="login.php"><i class="fas fa-angle-right"></i>login</a>
          <a href="register.php"><i class="fas fa-angle-right"></i>register</a>
          <a href="#"><i class="fas fa-angle-right"></i>post jobs</a>
          <a href="#"><i class="fas fa-angle-right"></i>dashboard</a>

        </div>
      <div class="box">
        <h3>follow us</h3>
        <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
        <a href="#"><i class="fab fa-twitter"></i>twitter</a>
        <a href="#"><i class="fab fa-instagram"></i>instagram</a>
        <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
        <a href="#"><i class="fab fa-youtube"></i>youtube</a>
        
      


      </div>

      </section>
      <div class="credit">&copy;copyright @2024 by <span> mrs. web developer</span> | all rights reserved!</div>
    </footer>




    <!--footer section ends-->








        <script src="script.js"></script>
        
    </body>
</html>