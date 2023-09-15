<?php
   include 'config.php';
   session_start();
   $id=$_SESSION['id'];
   if(!isset($id))
   {
     header('location:login.php');
   }
   if(isset($_GET['logout']))
   {
    unset($id);
    session_destroy();
    header('location:login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PROJECT</title>
</head>
<link rel="stylesheet" href="styleindex.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <section class="header">
    <?php
        $select_user=mysqli_query($conn, "SELECT * FROM `user_form` WHERE id='$id' ") or die('query failed');
        if(mysqli_num_rows($select_user)>0)
        {
            $fetch_user=mysqli_fetch_assoc($select_user);
        }
        ?>
       
        <nav>
        <div class="logo"><a href="#">YAKSHITH</a> </div>
                <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>

                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#about">ABOUT</a></li>
                        <li><a href="#contact">CONTACT</a></li>

                        
                <li><button class="log-btn"><a href="index.php?logout=<? echo $id; ?>" onclick="return confirm('are you sure you want to logout');">LogOut</a></button></li>


                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box" id="home">
            <h1 id="1">WE ARE HERE TO CODE</h1>
            <p>The computer was born <br>to solve problems that did not exist before.</p>
        </div>
      </section>
          <!-----<ABOUT>------->

            <div id="about">
            <section class="about" >
                <h1>Services We Offer</h1>
                <p>Quality is remembered long after price is forgotten.</p>
                <div class="row">
                   <div class="ser-col">
                       <h3>Software Development</h3>
                       <p>We offer comprehensive software development services tailored to meet your specific needs and goals. Our team of experienced developers specializes in designing, building, and maintaining custom software solutions for a wide range of industries. From web and mobile applications to enterprise software and IoT solutions, we are committed to delivering high-quality, scalable, and cost-effective software that helps your business thrive in the digital age. With a focus on innovation and cutting-edge technologies, we aim to be your trusted partner in turning your ideas into reality and optimizing your digital presence.</p>
                   </div>
                   <div class="ser-col">
                       <h3>Web Hosting</h3>
                       <p>Our web hosting service is designed to provide reliable and secure hosting solutions for your website. We offer a range of hosting options, from shared hosting for small websites to dedicated servers for high-performance needs. With state-of-the-art data centers, 24/7 technical support, and robust security measures, we ensure that your website stays online and performs at its best. Trust us to handle the technical aspects of hosting, so you can focus on growing your online presence and business.</p>
                   </div>
                   <div class="ser-col">
                       <h3>Mobile Application</h3>
                       <p>We offer mobile application hosting services to ensure that your apps are accessible and perform optimally for your users. Our hosting solutions are tailored to the unique requirements of mobile applications, providing fast and reliable access to your app's data and resources. With scalable infrastructure, robust security measures, and expert support, we guarantee a seamless hosting experience, allowing you to concentrate on enhancing your mobile app's functionality and user experience. Count on us to keep your mobile applications running smoothly, regardless of the scale or complexity.</p>
                   </div>
                </div>
                </section>
                </div>

                <!-------CONTACT---->
                <section class="contact" id="contact">
                    <h1>Contact Us</h1>
                </section>
                <section class="contact-us">
                    <div class="contact-col">
                        <div>
                            <i class="fa fa-home"></i>
                            <span>
                                <h5>Gurupura Kaikamba, Main Road</h5>
                                 <p>Mangalore, Karnataka, IN</p>
                            </span>
                        </div>
                        <div>
                            <i class="fa fa-phone"></i>
                            <span>
                                <h5>+91 9481212966</h5>
                                 <p>Monday - Saturday</p>
                            </span>
                        </div>
                        <div>
                        <i class="fa fa-envelope" class="fa"></i>   
                            <span>
                                <h5>yakshithkumar948@gmail.com</h5>
                                 <p>Email us your Query</p>
                            </span>
                        </div>
                    </div>
                    <div class="contact-col">
                        <form action="">
                            <input type="text" placeholder="Enter your Name" required>
                            <input type="email" placeholder="Enter your Email" required>
                            <input type="text" placeholder="Enter your Subject" required>
                            <textarea rows="8" placeholder="Message" required></textarea>
                            <button type="submit" class="hero-btn">Send Message</button>
                        </form>
                    </div>

                </section>
                <footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.7);">
    <a class="text-white" href="https://mdbootstrap.com/">© 2023 Copyright: Yakshith@948.com</a>
  </div>
</footer>

    <script src="index.js"></script>
</body>
</html>