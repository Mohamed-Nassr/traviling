<?php
session_start();
require_once 'Customer.php';
$obj=new Customer();
if(isset($_POST['online']))
{
  $obj->pay($_POST['text_comm2']);
  $obj->submit($_POST['nomber'],$_SESSION['email'],$_POST['total']);
}
if(isset($_FILES['file']))
{
  $files= $_FILES['file'];
   $fileName = $files['name'];
    $tmpName  = $files['tmp_name'];
    $fileSize = $files['size'];
    $ex=explode('.', $fileName);
    echo $ex[1];
    if($ex[1]=='txt' && is_readable($fileName))
    {

      $content=file_get_contents($tmpName);
      echo $content;
       $obj->addreport($_SESSION['email'],$_POST['nomber'],$fileName,$fileSize,'Word',$content);
    }
}    


if(isset($_POST['comm']))
{
$obj->addComment('N',$_POST['text_comm'],$_POST['nomber'],$_SESSION['email']);
}
if(isset($_POST['deletecomment']))
{
$obj->DELETComm($_POST['commentid']);

}
 else if (isset($_POST['editcomment']))
 {
   $obj->EditComm($_POST['commentid'],$_POST['text_comm2']);
 }

?>
<!DOCTYPE html>
<html lang="en">

  <head>
      <style>
      .container .row .portfolio a:hover
{
  color: #24b662;
} 
      .di
      {border-radius: 10px;
        border:5px solid #ddd;
       width: 1200px;
       float: left;
       margin-right: 10px;
       margin-top: 20px; }

      .botton-to-add-jou{
        margin: auto;
        border-radius: 10px;
        width: 200px;
        height: 50px;
        
      }
      .text_comment
      {
        border-radius: 3px;
        width: 800px;
        height: 60px;
        float :left;
      }
       .dicom
        {
        border-top: 3px solid #ddd;
       width: 1150px;
       float: left;
       padding-left: 0px;
       margin-left: 0px;
       margin-right: 10px;
       margin-top: 10px;
       }
       .cust_name
      {
        color: blue;
        font-size: 20px
      }

      .comm_admin
      {
        color: red;
      }
      form
      {
        display: inline;
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
      .dicom2
      {
         padding-left: 0px;
      margin: 10px;
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
      function aler(){
        alert('contact us at httt company');
      }
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
    <!-- Home & Menu Section End-->
    
    
    
    
   
    
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
                    <li class="filter" data-filter=".mockups"><a href="extrnal.php">External</a></li>
                    <li class="filter" data-filter=".mockups"><a href="extrnal.php">حج و عمره</a></li>
                </ul>
            </div>
            
            <div class="portfolio-inner">
                <div class="row">
                
                <?php 
                require_once 'db.php';
                $db = new database();

                    $query="SELECT COUNT(id) FROM journey WHERE type='Internal'";
                    $result=  mysqli_query($db->link, $query);

                    $query3="SELECT * FROM journey WHERE type='Internal'";
                      $row3= array();
                     $result3=  mysqli_query($db->link, $query3);


                     while ($data = mysqli_fetch_assoc($result))
                     {


                      $row_co=$data;
                     }


                  for ($i=0; $i < $row_co['COUNT(id)']; $i++) {  
                   $row = mysqli_fetch_assoc($result3); 
                   
                   $row5=array(); 
                   $ms= $row['id'];  
                    $q5="SELECT SUM(total_p) from journey_customer Where jo='$ms'";
                    $r5=mysqli_query($db->link, $q5);
                    while ($data = mysqli_fetch_assoc($r5))
                     {
                      $row5=$data;
                     }
                     $row6=array();   
                   $q5="SELECT * from journey_customer Where jo='$ms'";
                    $r5=mysqli_query($db->link, $q5);
                    while ($data = mysqli_fetch_assoc($r5))
                     {
                      $row6=$data;
                     }

                     $row7=array();
                     $ss=$_SESSION['email'];
                     $q6="SELECT * from customer Where email='$ss'";
                    $r6=mysqli_query($db->link, $q6);
                    while ($data = mysqli_fetch_assoc($r6))
                     {
                      $row7=$data;
                     }
                     $cust=$row7['id'];

                      $q7="SELECT COUNT(cu) from journey_customer where jo='$ms' and cu='$cust'";
                      $r7=mysqli_query($db->link, $q7);
                      while ($data = mysqli_fetch_assoc($r7))
                       {
                        $row8=$data;
                       }

                     if($row5['SUM(total_p)']==$row['no_of_passenger'] )
                  {
                    if($row8['COUNT(cu)']==1 && $row['date_of_journey']<=date('Y-m-d'))
                    {echo '             
                                                         <div class="di"><div class="dicom2">
                                                            <form action="#" method="post"> 
                                                            <h1>'. $row['name'] .'</h1>
                                                            <h4>'. $row['desciption'] .'</h4>
                                                            <h3>'. $row['no_of_passenger'] .' passenger</h3>
                                                            <h3>'. $row['date_of_journey'] .'</h3>
                                                            <h3>'. $row['price'] .'$</h3>
                                      
                                                            
                                                            <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                                                         
                                                            
                                                            </form>
                                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                          
                                                            <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                                                            <input type="submit" name="uploud" value="uploud">
                                                            <input  type="file" id="file" name="file" >
                                                            </form>
                                                             ';
                    }
                    else
                    {
                      echo '             
                                                         <div class="di"><div class="dicom2">
                                                            <form action="#" method="post"> 
                                                            <h1>'. $row['name'] .'</h1>
                                                            <h4>'. $row['desciption'] .'</h4>
                                                            <h3>'. $row['no_of_passenger'] .' passenger</h3>
                                                            <h3>'. $row['date_of_journey'] .'</h3>
                                                            <h3>'. $row['price'] .'$</h3>
                                      
                                                            
                                                            <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                                                         
                                                            
                                                            </form>
                                                            
                                                             ';
                    }
                    }
                    else
                    {
                      $total=($row['no_of_passenger'])-($row5['SUM(total_p)']);
                      echo'
                       <div class="di"><div class="dicom2">
                                        <form action="#" method="post"> 
                                        <h1>'. $row['name'] .'</h1>
                                        <h4>'. $row['desciption'] .'</h4>
                                        <h3>'. $row['no_of_passenger'] .' passenger</h3>
                                        <h3>'. $row['date_of_journey'] .'</h3>
                                        <h3>'. $row['price'] .'$</h3>
                  
                                        <input  name="text_comm2" type="password" placeholder="credit number" required="required">
                                        <input  name="total" type="number" placeholder="number of passanger" min="1" max="'.$total.'">
                                        
                                        <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                                        <input  name="online" type="submit"  value="online">
                                        
                                        </form>
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                        <input class="" onclick="aler()" name="cash" type="submit"  value="cash">
                                        <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                                        <input type="submit" name="uploud" value="uploud">
                                        <input  type="file" id="file" name="file" >
                                        </form>
                                         ';
                    }
                    ?>
                    <?php
                    require_once 'db.php';                      

                   $mm= $row['id'];
                   $query_s2="SELECT COUNT(id) FROM comm WHERE Jo='$mm'";
                   $result_q2=  mysqli_query($db->link, $query_s2);
           
        

                    $qs1="SELECT * FROM comm WHERE Jo='$mm'";
                    $row_comm= array();

                    

                    $row_co1=array();
                    $result_q1=  mysqli_query($db->link, $qs1);
                    
                    while ($data = mysqli_fetch_assoc($result_q2))
                     {
                      $row_co1=$data;
                     }

/*        forrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr*/

                      if($row_co1['COUNT(id)']==0)
                            {

                               echo '<div class="dicom com">
                                <form act1ion="#" method="POST">
                               <input class="text_comment" name="text_comm" type="text" placeholder="add comment">
                               <input class="delete" name="comm" type="submit" value="add">
-                               <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                               </form>
                               </div></div>';
                            }
                           


  
                    for ($k=0; $k< $row_co1['COUNT(id)']; $k++) { 
                      
                      $row_comm=mysqli_fetch_assoc($result_q1)
                    ?>
                    

                    <?php
                    $ee=$row_comm['email'];
                      $q_cust = "SELECT * FROM customer Where email = '$ee'" ;
                      $result_cust = mysqli_query($db->link, $q_cust);
                      while ($data = mysqli_fetch_assoc($result_cust)){
                          $row_cust= $data ;
                      }


                         if(strstr($row_comm['email'],'@admin'))
                      {

                         echo '<div class="dicom">
                       <form act1ion="#" method="POST">
                            <p class="cust_name comm_admin">Travelling</p>
                            <p name="comm_txt">'.$row_comm['descraption'].'</p>
                           
                        </div> ';
                      }

                      else{
                              if($k==$row_co1['COUNT(id)']-1 && $row_cust['email']==$_SESSION['email'])
                              {
                              echo '<div class="dicom">
                           <form act1ion="#" method="post">
                           <div class="notact1">
                            <p class="cust_name">'. $row_cust['name'] .'</p>
                            <p class="hiddencomm" name="comm_txt">'.$row_comm['descraption'].'</p>
                           </div> 

                            <input class="comment" name="commentid" type="hidden" value="'.$row_comm['id'] .'">
                          

                          

                           
                            <input class="text_comment" name="text_comm2" type="text" value="'.$row_comm['descraption'].'">
                             <input type="submit" name="editcomment" value="Edit" class="notact1" >
                             <input class="deletec" name="deletecomment" type="submit" value="Delete">
                          
                        </div>';
                              }
                              else

                              {
                                   echo '<div class="dicom">
                       <form act1ion="#" method="POST">
                            <p class="cust_name">'. $row_cust['name'] .'</p>
                            <p name="comm_txt">'.$row_comm['descraption'].'</p>
                            </div>';
                              }

                      
                      }

                    ?>
                            <?php
                            
                            if($k==$row_co1['COUNT(id)']-1)
                            {

                               echo '<div class="dicom com">
                                
                               <input class="text_comment" name="text_comm" type="text" placeholder="add comment">
                               <input class="delete" name="comm" type="submit" value="add">
                               <input class="delete" value="'.$row['id'].'" name="nomber" type="hidden" >
                               </form>
                               </div></div>';
                            }
                            ?>

                   <?php  
                    }
                 echo '</div>';
                  }
                
                      ?>
                </div>
            </div>
        </div>
        
        
     </section>
    <!-- Portfolio End -->
       
       
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
               <p>© Copyright 2017 @HTTT.</p>
               </div>
              
             <div class="col-md-4 uipasta-credit text-right">
                <p>Design By <a href="#" target="_blank" title="UiPasta">HTTT Team</a></p>
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