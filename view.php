<?php
session_start();
require_once 'Customer.php';
$obj=new Customer();
  if(isset($_POST['view']))
  {
    $jo_id=$_POST['journey_id'];
  }
  if(isset($_POST['online']))
{
  $obj->pay($_POST['text_comm2']);
  $obj->submit($_POST['nomber'],$_SESSION['email'],$_POST['total']);
   $jo_id=$_POST['nomber'];
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
        $jo_id=$_POST['nomber'];
    }
}    


if(isset($_POST['comm']))
{
$obj->addComment('N',$_POST['text_comm'],$_POST['nomber'],$_SESSION['email']);
$jo_id=$_POST['nomber'];
}
if(isset($_POST['deletecomment']))
{
$obj->DELETComm($_POST['commentid']);
$jo_id=$_POST['nomber'];

}
 else if (isset($_POST['editcomment']))
 {
   $obj->EditComm($_POST['commentid'],$_POST['text_comm2']);
   $jo_id=$_POST['nomber'];
 }


?>
<!DOCTYPE html>
<html>

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
                      
                      $que="SELECT * FROM journey where id='$jo_id'"; 
                      $Result=mysqli_query($db->link,$que);
                      while ($data=mysqli_fetch_assoc($Result)) {
                       $arr=$data;
                      }

                      $row5=array();  
                    $q5="SELECT SUM(total_p) from journey_customer Where jo='$jo_id'";
                    $r5=mysqli_query($db->link, $q5);
                    while ($data = mysqli_fetch_assoc($r5))
                     {
                      $row5=$data;
                     }

                     $row8=array();
                     $ss=$_SESSION['email'];
                     $q7="SELECT COUNT(cu) from journey_customer where jo='$jo_id' and cu='$ss'";
                      $r7=mysqli_query($db->link, $q7);
                      while ($data = mysqli_fetch_assoc($r7))
                       {
                        $row8=$data;
                       }



                     if($row5['SUM(total_p)']==$arr['no_of_passenger'] )
                  {
                    if($row8['COUNT(cu)']==1 && $arr['date_of_journey']<date('Y-m-d'))
                    {echo '             
                                                         <div class="di"><div class="dicom2">
                                                            <form action="#" method="post"> 
                                                            <h1>'. $arr['name'] .'</h1>
                                                            <h4>'. $arr['desciption'] .'</h4>
                                                            <h3>'. $arr['no_of_passenger'] .' passenger</h3>
                                                            <h3>'. $arr['date_of_journey'] .'</h3>
                                                            <h3>'. $arr['price'] .'$</h3>
                                      
                                                            
                                                            <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                                                         
                                                            
                                                            </form>
                                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                          
                                                            <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
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
                                                            <h1>'. $arr['name'] .'</h1>
                                                            <h4>'. $arr['desciption'] .'</h4>
                                                            <h3>'. $arr['no_of_passenger'] .' passenger</h3>
                                                            <h3>'. $arr['date_of_journey'] .'</h3>
                                                            <h3>'. $arr['price'] .'$</h3>
                                      
                                                            
                                                            <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                                                         
                                                            
                                                            </form>
                                                            
                                                             ';
                    }
                    }
                    
                  
                  if($arr['last_date_sumbmit']<date('Y-m-d')||$row5['SUM(total_p)']==$arr['no_of_passenger']){
                      echo '             
                                                         <div class="di"><div class="dicom2">
                                                            <form action="#" method="post"> 
                                                            <h1>'. $arr['name'] .'</h1>
                                                            <h4>'. $arr['desciption'] .'</h4>
                                                            <h3>'. $arr['no_of_passenger'] .' passenger</h3>
                                                            <h3>'. $arr['date_of_journey'] .'</h3>
                                                            <h3>'. $arr['price'] .'$</h3>
                                      
                                                            
                                                            <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                                                         
                                                            
                                                            </form>
                                                            
                                                             ';
                    }
                    else
                    {$total=($arr['no_of_passenger'])-($row5['SUM(total_p)']);
                      echo'
                       <div class="di"><div class="dicom2">
                                        <form action="#" method="post"> 
                                        <h1>'. $arr['name'] .'</h1>
                                        <h4>'. $arr['desciption'] .'</h4>
                                        <h3>'. $arr['no_of_passenger'] .' passenger</h3>
                                        <h3>'. $arr['date_of_journey'] .'</h3>
                                        <h3>'. $arr['price'] .'$</h3>
                  
                                        <input  name="text_comm2" type="password" placeholder="credit number" required="required">
                                        <input  name="total" type="number" placeholder="number of passanger" min="1" max="'.$total.'">
                                        
                                        <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                                        <input  name="online" type="submit"  value="online">
                                        
                                        </form>
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                        <input class="" onclick="aler()" name="cash" type="submit"  value="cash">
                                        <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                                        <input type="submit" name="uploud" value="uploud">
                                        <input  type="file" id="file" name="file" >
                                        </form>
                                         ';}
                    ?>
                    <?php
                    require_once 'db.php';                      

                  
                   $query_s2="SELECT COUNT(id) FROM comm WHERE jo='$jo_id'";
                   $result_q2=  mysqli_query($db->link, $query_s2);
           
        

                    $qs1="SELECT * FROM comm WHERE jo='$jo_id'";
                    $row_comm= array();

                    $row_co1=array();
                    $result_q1=  mysqli_query($db->link, $qs1);
                    
                    while ($data = mysqli_fetch_assoc($result_q2))
                     {
                      $row_co1=$data;
                     }



                      if($row_co1['COUNT(id)']==0)
                            {

                               echo '<div class="dicom com">
                                <form act1ion="#" method="POST">
                               <input class="text_comment" name="text_comm" type="text" placeholder="add comment">
                               <input class="delete" name="comm" type="submit" value="add">
-                               <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                               </form>
                               </div>';
                            }
                           


  
                    for ($k=0; $k< $row_co1['COUNT(id)']; $k++) { 
                      
                      $row_comm=mysqli_fetch_assoc($result_q1)
                    ?>
                    

                    <?php
                    $com_email=$row_comm['email'];
                      $q_cust = "SELECT * FROM customer Where email = '$com_email'" ;
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
                              if($k==$row_co1['COUNT(id)']-1)
                              {
                                  echo '<div class="dicom">
                       <form act1ion="#" method="post">
                           <div class="notact1">
                            <p class="cust_name">'. $row_cust['name'] .'</p>
                            <p class="hiddencomm" name="comm_txt">'.$row_comm['descraption'].'</p>
                           </div> 

                            

                            
                            
                            <input class="comment" name="commentid" type="hidden" value="'.$row_comm['id'] .'">
                          

                          
                             <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                           
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
                               <input class="delete" value="'.$arr['id'].'" name="nomber" type="hidden" >
                               </form>
                               </div>';
                            }
                            ?>

                   <?php  
                    }
                 echo '</div>';
                  
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