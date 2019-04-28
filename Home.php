<?php
session_start();
require_once 'Customer.php';
$obj=new Customer();
  if(isset($_POST['addjourney']))
  {
    $destination=$_POST['deist'];
    $passenger=$_POST['number'];
    $days=$_POST['days'];
    $obj->addspecial($_SESSION['email'],$destination,$passenger,$days);

  }
  if(isset($_POST['go']))
{
    header('Location:special.php');
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <style>
      span
      {
        color: red;
      }
      .serch
      {
        float: left;
        margin-top: 18px;
        margin-right: 20px;
      }

      form
      {
        display: inline-block;
      }

      .di
      {
        border-radius: 10px;
        border:3px solid #DDD;
       width: 250px;
       float: left;

       margin-right:10px;
       margin-top: 20px;
      }

      .botton-to-add-jou{
        margin: auto;
        border-radius: 10px;
        width: 200px;
        height: 50px;
        
      }
       .comment
      {
       float: right;
       margin-right: 10px;
       margin-bottom: 10px; 
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
      .jo
      {
        margin: 10px
      }
      .h
      {
        color: blue;
      }
    
  </style>
    
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
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
    
    
	
	<!-- Preloader Start -->
    <div id="preloader">
	  <div class="loader"></div>
    </div>
    <!-- Preloader End -->

    
    
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
                                        <span class="sr-only">Toggle navigation</span>
                                  
                                    <form class="serch" action="search.php" method="post">
                                      <input type="text" name="serch_text" placeholder="journey name" required="required">
                                      <input type="submit" name="serch" value="GO">
                                    </form>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                      
                                        <li><a class="smoth-scroll" href="#about">About</a>
                                        </li>
                                       <li><a  href="internal.php">Internal</a>
                                        </li>
                                        <li><a href="extrnal.php">External</a>
                                        </li>

                                        <li><a href="7g.php">حج وعمرة</a>
                                        </li>
                                       
                                       <li><a href="journey.php">My Journeys</a>
                                        </li>

                                       <li><a href="main.php">Log out</a>
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
                                    <h2>T R A V E L L I N G</h2>
                                    
                                    
                                    <div class="margin-top-60">
                          <a class="button button-style button-style-icon fa fa-long-arrow-right smoth-scroll" href="#portfolio">View Journy</a>
                                  </div>
                                
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
                  
                  <p></p>
                 </div>
             
              </div>
                
          </div>
       </section>
       <!-- About End -->

    
    <!-- Portfolio Start -->
    <section id="portfolio" class="portfolio section-space-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Journy.</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            
            <div class="portfolio-inner">
                <div class="row">
                
                <?php 

                require_once 'db.php';
                $db= new database();
                $q_count_jo="SELECT COUNT(id) FROM journey";
                $result_q_co_jo=  mysqli_query($db->link, $q_count_jo);


                while ($data = mysqli_fetch_assoc($result_q_co_jo))
                {
                   $row_c_jo=$data;
                }

                $q_select_jo="SELECT * FROM journey";
                $result_q_s= mysqli_query($db->link,$q_select_jo);
                $row_jo=array();

                for ($i=0; $i <$row_c_jo['COUNT(id)'] ; $i++) { 

                
                $row_jo= mysqli_fetch_assoc($result_q_s);
                  echo '
                   <div class="di">
                   <div class="jo">
                    <h3>'.$row_jo['name'].' </h3>
                    <h3><span>'.$row_jo['price'].'$</span></h3>
                    <h3>'.$row_jo['date_of_journey'].' </h3>
                        <form class="comment" action="view.php" method="post">
                        <input name="journey_id" type="hidden" value="'.$row_jo['id'].'">
                        <input type="submit" name="view" value="view"> 
                        </form>
                    </div>
                    </div>'
                    ;
                    }
                      ?>
                </div>
            </div>
        </div>
        
        
     </section>
    <!-- Portfolio End -->

    
   
    <!-- Call to Action Start -->
    <section class="call-to-action section-space-padding text-center">
       <div class="container">
         <div class="row">
           <div class="col-md-12">   
           <h1 class="h">My Special Journeys</h1><br>
           <!-- <form action="">     
            <input class="delete" type="submit" name="DropJourney" value="Edit">
            </form>
            -->
           <form method="POST"> 
            <input class="delete" name="go" type="submit"  value="Go">
            </form>
            </div>    
          </div>
           </div>
       </section>
       <!-- Call toclass="botton-to-add-jou" Action End -->
       
       
       
       
    <!-- Contact Start -->
    <section id="contact" class="contact-us section-space-padding">
       <div class="container">
          <div class="row">
            <h1 class="h">Add Special Journey<h1>
            <div >
         <form action="#" method="POST">
          <input class="add-jou" type="text" name="deist" placeholder="Destination" required="required">
  
          <input class="add-jou" type="text" name="number" placeholder="Number Of Passenger" required="required">
          
          <input class="add-jou" type="text" name="days" placeholder="Number Of Days" required="required">
          
           <input class="botton-to-add-jou" type="submit" name="addjourney" required="required" value="Add">
           </form>
          </div>
        
        </div>
            </div>
            
            
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
    
    <!-- Main Javascript File  -->
    <script type="text/javascript" src="js/scripts.js"></script>
  
  
  </body>
 </html>