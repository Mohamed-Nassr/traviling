<?php
session_start();
require_once 'admin.php';
require_once 'classjourney.php';
$obj=new admin();
if(isset($_POST['add']))
{
  if($_POST['last_date']>date('Y-m-d') && $_POST['date']>date('Y-m-d'))
  {if($_POST['last_date']<$_POST['date'])
    {
      $obj_jo=new journey();
      $obj_jo->check_Attribute_of_journey($_POST['description'],$_POST['nameofjourney'],$_POST['date'],$_POST['type'],$_POST['price']);
      $obj->addjourney($_SESSION['email'],$obj_jo->name_of_journey,$_POST['passanger'],$obj_jo->Description_of_journey,$_POST['date'],$_POST['last_date'],$_POST['price'],$_POST['type']);
    }
    else
    {
      echo'<script>
        alert("the submit date greater or eqal journey date");
      </script>
      ';
    }
  }
  else
  {
    echo'<script>
        alert("the submit date or journey date is expired");
      </script>
      ';
  }
}
if(isset($_POST['Drop']))
{
  $obj->delete_journey($_POST['jo_id']);
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>
      <style>
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
                                        <li class="active"><a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div></a>
                                        </li>
                                        <li><a  href="special_admin.php">special journey</a>
                                        </li>
                                       
                                       <li><a class="smoth-scroll" href="main.php">Log out</a>
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
                  
                  <h2>About Me.</h2>
                  
                  <p></div>
             
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
            
            <div class="row">
                <ul class="portfolio">
                    <li class="filter" data-filter="all">All Journy</li>
                   </ul>
            </div>
            
            <div class="portfolio-inner">
                <div class="row">
                
                <?php 
                require_once 'db.php';
                $db=new database();
                $row1=array();
                $q_con="select COUNT(id) from journey ";
                $result=(mysqli_query($db->link,$q_con));
                while($data= mysqli_fetch_assoc($result))
                {
                  $row1=$data;
                }
                $row2=array();
                $q_sel="select * From journey ";
                $result1=mysqli_query($db->link,$q_sel);

                for ($i=0; $i < $row1['COUNT(id)']; $i++)
                 { 
                    $row2= mysqli_fetch_assoc($result1);
                    if ($row2['date_of_journey']<date('Y-m-d'))
                    {
                     
                  echo '
                   <div class="di">
                   <form action="#" method="POST">
                   <h2>'.$row2['name'].'</h2>
                   <h2>'.$row2['no_of_passenger'].'</h2>
                   <h2>'.$row2['date_of_journey'].'</h2>
                   <input type="hidden" name="jo_id" value="'.$row2['id'].'">
                   <input type="submit" name="Drop" value="drop">

                   </form>

                    </div>';
                    }
                    else
                    {
                   echo '
                   <div class="di">
                   <form action="#" method="POST">
                   <h2>'.$row2['name'].'</h2>
                   <h2>'.$row2['no_of_passenger'].'</h2>
                   <h2>'.$row2['date_of_journey'].'</h2>
                   <input type="hidden" name="jo_id" value="'.$row2['id'].'">
                   <input type="submit" name="Drop" value="cancel">

                   </form>

                    </div>';
                    }
                 }
                      ?>
                </div>
            </div>
        </div>
        
        
     </section>
    <!-- form Start -->
    <section class="call-to-action section-space-padding text-center">
       <div class="container">
         <div class="row">
           <div class="col-md-12">   
           <h1 class="h">Add Journey</h1><br>
          

          <form class="loka" action="#" method="POST">
                  <label>Name :</label>
                  <input class="a" required="required" type="text" name="nameofjourney" minlength="5" placeholder="enter name Here" maxlength="30">
                  <br>
                  <label>passanger :</label>
                  <input class="c" required="required" type="number" name="passanger" minlength="3" placeholder="enter Price Here" min="1" >
                  <br>
                  <label>Price  :</label>
                  <input class="c" required="required" type="number" name="price" minlength="3" placeholder="enter Price Here" min="1" >
                  <br>
                  <label >Date :</label>
                  <input class="b" type="date" required="required" name="date" ><br>
                  <label >submit Date:</label>
                  <input class="b" type="date" required="required" name="last_date" >
                  <br>
                  <label>Type :</label>
                  <input class="r" type="radio" required="required" name="type" value="Internal">Internal
                  <input class="r" type="radio" required="required" name="type" value="External">External
                  <input class="r" type="radio" required="required" name="type" value="7g">الحج والعمرة
                  <br>
                  <br>
                  <label>Enter Description Here :</label><br>
                  <textarea cols="80" required="required" minlength="30" rows="5" name="description">
                    
                  </textarea>
                  <br>
                  <input type="submit" name="add" value="ADD NEW">
                  
         </form>
                      
           </div>    
          </div>
           </div>
       </section>
       
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