<?php
  if(isset($_POST['login']))
  {
    header('Location:loginpage.php');
  }
  elseif (isset($_POST['sign'])) {
    header('Location:index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <style>
      .sp
      {
        font-size: 20px;
        color:  blue;
        margin-left: 80px;

      }
      .sp1
      {
         font-size: 20px;
        color:  blue;
        margin-left: 80px;
        

      }
      h3
      {
        margin: 20px;
        padding: 30px;
      }
      .loka{
        border-radius: 10px;
        width: 700px;
        
        padding: 20px;
        text-align: center;
        background: #ddd;
        margin:auto;
        text-decoration-color: blue; 
      }

      .di
      {border-radius: 10px;
        border:2px solid blue;
       width: 200px;
       height: 200px;
       float: left;
       margin-right: 10px;
       margin-left: 20px;
       margin-top: 20px; }

      .botton-to-add-jou{
        margin: auto;
        border-radius: 10px;
        width: 200px;
        height: 50px;
        
      }
      .delete
      {
        width: 310px;
        height: 50px;
        border-radius: 15px;
      }
      .add-jou{
        width: 310px;
        border-radius: 15px;
      }
      .h
      {
        color: blue;

      }
.container .row .col-md-12 a:hover
{
  color: #24b662;
}      
     
    
      .a
      {
        width: 350px;
        margin-left: 20px;
      }
      .b{
        margin-left: 26px;
        width: 350px;
      }
    .c{
        margin-left: 26px;
        width: 350px;
      
    }
  </style>
    
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    
    <title>TRavilling</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="images/favicon/apple-touch-icon.png">
    
    <!-- All CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    
    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    <script>
    
    </script>
    

 </head>

  <body>
    <!-- Home & Menu Section Start -->
    <header id="home" class="home-section">
        
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                
                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="Home.php"><span class="object">TR</span>avelling</a>
                        </div>
                    </div>

                    
                    <div class="col-sm-9">





                        <div class="navigation-menu">
                            <div class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                       
                                       <li><a class="smoth-scroll" href="loginpage.php">Login</a>
                                        </li>
                                        >
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="home-section-background" data-stellar-background-ratio="0.6">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="header-text">
                                    <h2>T R A V E L I N G</h2>
                                    
                                    
                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>
    <!-- Home & Menu Section End-->
    
    
    
    
    <!-- About Start -->
    <section id="about" class="about-section">
         <div class="row">
               
              <div class="col-md-6 col-sm-12 col-xs-12">
                <img class="img-responsive" src="images/bg/me.jpg" draggable="false" alt="">
              </div>
                
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-me section-space-padding">
                  
                  <h2>About site.</h2>
                  
                  <h3>our Travelling site save for you to book journey online and add special one and allow  you to cancel journeys and allow you to add comment and reply on any journey but you must login first
                  </h3>
                  <form method="POST">
                   <span class="sp">If you have account ---> <span><input type="submit" name="login" value="login"><br><br>
                    <span class="sp1">If you not have account ---> <span><input type="submit" name="sign" value="sign up">
              </form>
              </div>
                
          </div>
       </section>
       <!-- About End -->

    
    <!-- Portfolio Start -->
    <section id="portfolio" class="portfolio section-space-padding">
        
     </section>
    <!-- form Start -->
    
       
    <!-- Contact Start -->
    <section id="contact" class="contact-us section-space-padding">
           <div class="text-center margin-top-10 margin-bottom-50">
            <div class="row">
            
               <div class="col-md-4 col-sm-4">
                <div class="contact-us-detail">  
                 <i class="fa fa-mobile color-6"></i>
                  <p><a href="tel:+1234567890">01129033198</a></p>
                 </div>
                </div>
               
               <div class="col-md-4 col-sm-4">
                <div class="contact-us-detail">
                 <i class="fa fa-mail-reply color-5"></i>
                  <p><a href="mailto:name@domain.com">name@HTTT.com</a></p>
                 </div>
                </div>
                 
              
               </div>
              </div>
            
   </section>
     <!-- Contact End -->
    <!-- Footer Start -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
               
      <div class="col-md-4 text-left">
       
          </div>
               
            <div class="col-md-4 text-center">
               <p>© Copyright 2017 HTTT.</p>
               </div>
              
             <div class="col-md-4 uipasta-credit text-right">
                <p>Design By <a href="#" target="_blank" title="UiPasta">MyTeam</a></p>
                </div>
                
             </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- Back to Top End -->
    <!-- All Javascript Plugins  -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC0HAKwKinpoFKNGUwRBgkrKhF-sIqFUNA"></script>
    <!-- Main Javascript File  -->
    <script type="text/javascript" src="js/scripts.js"></script>
  </body>
 </html>