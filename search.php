<?php
  if(isset($_POST['serch']))
  {
    $jo_name=$_POST['serch_text'];
  }
?>
<!DOCTYPE html>
<html>

  <head>
      <style>

      form
      {
        display: inline-block;
      }

      .di
      {border-radius: 10px;
        border:10px solid #f00;
       width: 200px;
       height: 200px;
       float: left;
       margin-right: 10px;
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
      
    .form
    {
      text-align: center;
      margin-left: 230px;
      border: 5px solid #ddd;
      line-height: 30px;
      padding: 20px;
    }
    .aaa{
      width: 200px;
      height: 200px;
      background: #ddd;
      margin-left: 10px;
      border:2px solid blue;
      border-radius: 10px;
      float:left;
      padding: 10px;
    }
    input{
        width: 300px ;height: 30px;
        margin-top: 10px;
      }  
      .r{
        width: 80px;
      }
      .view
      {
        width: 80px;
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
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smoth-scroll" href="Home.php">Home <div class="ripple-wrapper"></div></a>
                                       <li><a class="smoth-scroll" href="">Log out</a>
                                        </li>
                                        
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
                                 <div class="margin-top-60">
                                <a class="button button-style button-style-icon fa fa-long-arrow-right smoth-scroll" href="#portfolio">Result</a>
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>

    <section id="portfolio" class="portfolio section-space-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Result of Search.</h2>
                      <?php

                      $arr=array();
                      $arr1=array();
                      require_once 'db.php';
                      $db=new database();
                      
                      $que="SELECT * FROM journey where name='$jo_name'";

                      $que1="SELECT count(id) FROM journey where name='$jo_name'";
                       
                      $Result=mysqli_query($db->link,$que);
                      
                      $Result1=mysqli_query($db->link,$que1);

                      while ($data1=mysqli_fetch_assoc($Result1)) {
                       $arr1=$data1;
                      }
                      

                      for ($i=0; $i < $arr1['count(id)']; $i++) { 
                         $arr=$data=mysqli_fetch_assoc($Result);

                         echo '<div class="aaa">
                       
                         <label>'.$arr['name'].'</label><br>
                         <label>'.$arr['price'].'</label><br>
                         <label>'.$arr['date_of_journey'].'</label><br>
                         '; ?>
                         <?php
                          if ($arr['type']=='7g') {
                          echo ' <label>حج وعمرة</label><br>';
                         
                         }
                         echo '<form action="view.php" method="POST"> <input type="submit" name="view" value="View" class="view"> 
                         <input type="hidden" name="journey_id" value="'.$arr['id'].'" > 
                         </form>';
                         echo '</div>';
                            }

                    ?>
                    </div>
                </div>
            </div>
            
         
        </div>
        
        
     </section>
     
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
    <script type="text/javascript" src="js/scripts.js"></script>
  
  
  </body>
 </html>