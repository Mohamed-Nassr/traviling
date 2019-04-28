 <?php      
    require_once 'manager.php';
    $obj=new manager();
    
            if(isset($_POST['addadmin'])){
                if($obj->addAdmin($_POST['EmailAdmin'], $_POST['pass'], $_POST['NameAdmin']));
                else{
                 echo '  <script>
                
                      alert("Member Not Added");
                  
                  </script>';
                    
                }
            }
            else if(isset($_POST['addg'])){
                if($obj->addguide($_POST['Emailg'], $_POST['pass'], $_POST['Nameg']));
                else{
                 echo '  <script>
                
                      alert("Member Not Added");
                  
                  </script>';
                    
                }
            }
            else if(isset($_POST['addrep'])){
                if($obj->addrep($_POST['Emailrep'], $_POST['pass'], $_POST['Namerep']));
                
                else{
                 echo '  <script>
                
                      alert("Member Not Added");
                  
                  </script>';
                } 
                }
           else if (isset($_POST['deladmin'])){
              
                if($obj->deleteAdmin($_POST['list']));
                else{
                 echo '  <script>
                
                      alert("Member Not Added");
                  
                  </script>';
                    
                }
            }
            else if(isset($_POST['delguide'])){
                if($obj->deleteguide($_POST['list']));
                else{
                 echo '  <script>
                
                      alert("Member Not Added");
                  
                  </script>';
                    
                }
            }
            else if(isset($_POST['delrepres'])){
                if($obj->deleterep($_POST['list']));
                else{
                 echo '  <script>
                
                      alert("Member Not Added");
                  
                  </script>';
                    
                }
            }
            else if(isset($_POST['repjourney'])){
                if($obj->generatejoreport($obj->showjourneybymonth($_POST['Date']),($_POST['Date'])));
                else{
                 echo '  <script>
                
                      alert("NO Journey is Founded");
                  
                  </script>';
                    
            }}
            else if(isset($_POST['repfromcust'])){
                if($obj->generate($_POST['list']));
                else{
                 echo '  <script>
                
                      alert("NO report Founded");
                  
                  </script>';
                    
                }
            }
                
    ?>



<!DOCTYPE html>
<html lang="en">

  <head>
    
      <style>

      .select{
        width: 200px;
        margin-left: 430px;
        color: blue;
        margin-top: 10px;
      }
      .loka{
        border-radius: 10px;
        width: 700px;
        height: 200px;
        padding: 20px;text-align: center;
        background: #ddd;
        margin:auto;
        line-height: 30px;
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
        margin-left: 85px;
      }
      .b{
        margin-left: 50px;
        width: 350px;
      }
      .labelrep{
        margin-left: 420px;
      }
    .c{
        margin-left: 85px;
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
                          <a class="button button-style button-style-icon fa fa-long-arrow-right smoth-scroll" href="#portfolio">SHoW Report</a>
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
    
    <!-- Portfolio Start -->
   
    <section id="portfolio" class="portfolio section-space-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
               <div class="section-title">
                        <h2>All Reports.</h2>

                        <form method="POST" action="#">
                        <h3>Report About Journey :</h3><br>
                          <input type="date" required="required" name="Date">
                          <input  type="submit" name="repjourney" value="Report">
                          </form>
                  </div >
 

                    <?php

                    require_once 'db.php';
                    $arr=array();
                    $arr1=array();
                    $db=new database();
                    $query="SELECT * from customer";
                    $query1="SELECT COUNT(id) from customer";

                    $result=mysqli_query($db->link,$query);
                    $result1=mysqli_query($db->link,$query1);
                   
                    while ($data=mysqli_fetch_assoc($result1)) {
                      $arr=$data;
                    }

                   echo '
                   <h3 class="labelrep">Report from Customer :</h3>

                    <form action="#" method="POST">
                     <select name="list" class="select">
           
                    
                     ';?>

                     <?php  for ($i=0; $i <$arr['COUNT(id)']; $i++) { 

                      $arr1=mysqli_fetch_assoc($result);

                       echo ' <option required="required" value=" '.$arr1['id'].'">'. $arr1['name'].'</option>';
                        
                  ?> <?php   
                }
                     echo ' </select>
                     <input  type="submit" name="repfromcust" value="Show report">
                       </form>';
                    ?>
                       <!-- delete member -->
                 <div>
                       <?php

                    require_once 'db.php';
                    $arr=array();
                    $arr1=array();
                    $db=new database();
                    $query="SELECT * from admin";
                    $query1="SELECT COUNT(id) from admin";

                    $result=mysqli_query($db->link,$query);
                    $result1=mysqli_query($db->link,$query1);
                   
                    while ($data=mysqli_fetch_assoc($result1)) {
                      $arr=$data;
                    }

                   echo '
                   <h3 class="labelrep">Delete Admin :</h3>

                    <form method="POST" action="#">
                     <select name="list" class="select">
           
                    
                     ';?>

                     <?php  for ($i=0; $i <$arr['COUNT(id)']; $i++) { 

                      $arr1=mysqli_fetch_assoc($result);

                       echo ' <option required="required" value=" '.$arr1['id'].'">'. $arr1['name'].'</option>';
                        $var=$arr1['id'];
                  ?> <?php   
                }
                     echo ' </select>
                     <input  type="submit" name="deladmin" value="Delete">
                       </form>';
                    ?>


                  <?php

                    require_once 'db.php';
                    $arr=array();
                    $arr1=array();
                    $db=new database();
                    $query="SELECT * from representative";
                    $query1="SELECT COUNT(id) from representative";

                     $result=mysqli_query($db->link,$query);
                    $result1=mysqli_query($db->link,$query1);
                   
                    while ($data=mysqli_fetch_assoc($result1)) {
                      $arr=$data;
                    }

                   echo '
                   <h3 class="labelrep">Delete Representative :</h3>

                    <form method="POST" action="#">
                     <select name="list" class="select">
           
                    
                     ';?>

                     <?php  for ($i=0; $i <$arr['COUNT(id)']; $i++) { 

                      $arr1=mysqli_fetch_assoc($result);

                       echo ' <option required="required" value=" '.$arr1['id'].'">'. $arr1['name'].'</option>';
                        
                  ?> <?php   
                }
                     echo ' </select>
                     <input  type="submit" name="delrepres" value="Delete">
                       </form>';
                    ?>




                    </div>


                       
                </div>
            </div>
            
            <div class="portfolio-inner">
                
            </div>
        </div>  
        
        
     </section>
    <!-- form Start -->
    <section class="call-to-action section-space-padding text-center">
       <div class="container">
         <div class="row">
           <div class="col-md-12">   
           <h1 class="h">Add Admin</h1><br>
            <form class="loka" action="#" method="POST">
                  <label>Name :</label>
                  <input class="a" required="required" type="text" name="NameAdmin" minlength="5" 
                         placeholder="enter name Here" maxlength="30">
                  <br>
                  <label>Email  :</label>
                  <input class="c" required="required" type="text" name="EmailAdmin" minlength="3"
                         placeholder="enter Email Here" min="1" >
                  <br>
                  <label >Password :</label>
                  <input class="b" type="password"  placeholder="Enter password Here" minlength="8"
                         maxlength="25" required="required" name="pass" >
                  <br>
                  <input type="submit" name="addadmin" required="required" value="ADD NEW">
                  
         </form>
                
              
            
          <h1 class="h">Add Representative</h1><br>
            <form class="loka" action="#" method="POST">
                  <label>Name :</label>
                  <input class="a" required="required" type="text" name="Namerep" minlength="5" placeholder="enter name Here" maxlength="30">
                  <br>
                  <label>Email  :</label>
                  <input class="c" required="required" type="text" name="Emailrep" minlength="3" placeholder="enter Email Here" min="1" >
                  <br>
                  <label >Password :</label>
                  <input class="b" type="password" placeholder="Enter password Here" minlength="8" 
                         maxlength="25" required="required" name="pass" >
                  <br>
                  <input type="submit" name="addrep" required="required" value="ADD NEW">
                  
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
            <d*iv class="row">
               
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