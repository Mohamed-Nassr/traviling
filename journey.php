<?php 
session_start();
require_once'Customer.php';
if(isset($_POST['cancel']))
{
  $obj=new Customer();
  $obj->cancleJou( $_POST['j_id'],$_SESSION['email'],$_POST['total']);
}

?>


<!DOCTYPE html>
<html lang="en">
  
  <head>
      <style>

      form
      {
        display: inline;
      }

  
      h1
      {
        display: inline-block;
      }

      .add-jou{
        width: 260px;
        border-radius: 5px;
        float: right;
        margin-top:20px;
        margin-right: 100px;

      }

      .di
      {
        border-radius: 15px;
        border:3px solid #000;
       width: 1200px;
       float: left;
       padding: 10px;
       margin-bottom: 10px;
       margin-right: 10px;
       margin-top: 10px;
    
        }
      
         .delete 
      {
      
        width: 250px;
        height: 30px;
        border-radius: 15px;
        margin: 15px;
        float: right;
      }
      .text_comment
      {
        border-radius: 3px;
        width: 800px;
        height: 60px;
        float :left;
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
                                
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smoth-scroll" href="Home.php">Home <div class="ripple-wrapper"></div></a>
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
                                    <h2>Welcome In Page||</h2>
                                    
                                    
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
    <section id="portfolio" class="portfolio section-space-padding">
      <div class="container">  
            <div class="row">
            
            
               <?php 
                require_once 'db.php';
                $db = new database();

                $ses=$_SESSION['email'];
                $qu1="SELECT * FROM customer WHERE email='$ses'";
                    $r1= array();
                    $re1=  mysqli_query($db->link, $qu1);


                     while ($data = mysqli_fetch_assoc($re1))
                     {
                        $r1=$data;
                     }
                    $cust_id=$r1['id'];

                    $query="SELECT COUNT(cu) FROM journey_customer WHERE cu='$cust_id'";
                    $result=  mysqli_query($db->link, $query);

                    $query3="SELECT * FROM journey_customer WHERE cu='$cust_id'";
                    $row3= array();
                    $result3=  mysqli_query($db->link, $query3);


                     while ($data = mysqli_fetch_assoc($result))
                     {
                        $row3=$data;
                     }

                     if($row3['COUNT(cu)']==0)
                     {
                      echo '<div class="di">you are not on any journey</div>';
                     }

                  else 
                    {
                        for ($i=0; $i < $row3['COUNT(cu)']; $i++) {  
                        $row = mysqli_fetch_assoc($result3);
    
                        $j_id=$row['jo'];
    
                       $q="SELECT * FROM journey WHERE id='$j_id'";
                        $r= array();
                        $re=  mysqli_query($db->link, $q);
                         while ($data = mysqli_fetch_assoc($re))
                         {
                            $r=$data;
                         }
                      if($r['last_date_sumbmit']<date('Y-m-d'))
                       {echo '
                                              <div class="di">
                                               <form action="#" method="post">
                                               <h3>'.$r['name'].'</h3>
                                               <h3>'.$row['total_p'].'</h3>
                                               <p  class="delete"> you are on the journey</p>
                                               </form>
                                              </div>
                                              ';
                                            }
                                            else
                                            {
                                              echo '
                                              <div class="di">
                                               <form action="#" method="post">
                                               <h3>'.$r['name'].'</h3>
                                               <h3>'.$row['total_p'].'</h3>
                                               <h3>last date to cancel the journey'.$r['last_date_sumbmit'].'</h3>
                                               <input  class="delete" name="cancel" type="submit"  value="cancel">
                                               <input   name="j_id" type="hidden"  value="'.$j_id.'">
                                               <input class="delete" name="total" type="number" placeholder="number of passanger" min="1" max="'.$row['total_p'].'" required="required">
                                               </form>
                                              </div>
                                              ';
                                            }
                       }
                    }
              ?>
              
              
            </div>
      </div>
      </section>
 <footer class="footer-section">
        <div class="container">
            <div class="row">
               
      <div class="col-md-4 text-left">
       
          </div>
          
               
            <div class="col-md-4 text-center">
               <p>© Copyright 2017 @HTTT.</p>
               </div>
              
             <div class="col-md-4 uipasta-credit text-right">
                <p>Design By <a href="#" target="_blank" title="UiPasta">HTTT Team</a></p>
                </div>
                
             </div>
        </div>
    </footer>
     </body>
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/plugin.js"></script>
   
    <!-- Main Javascript File  -->
    <script type="text/javascript" src="js/scripts.js"></script>
     </html>













