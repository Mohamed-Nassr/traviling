<?php
session_start();
require_once 'representative.php';
$obj=new rep();

if (isset($_POST['add'])) {

  $db=new database();
  $email=$_POST['email'];
  $number=$_POST['number'];
  $id=$_POST['select'];

                      $query="SELECT SUM(total_p) FROM journey_customer WHERE jo='$id'";
                       $res=mysqli_query($db->link,$query);

                      while ($data=mysqli_fetch_assoc($res)) {
                         $count=$data;
                       }

                        $query1="SELECT * FROM journey WHERE id='$id'";
                       $res1=mysqli_query($db->link,$query1);

                      while ($data=mysqli_fetch_assoc($res1)) {
                         $count1=$data;
                       }

              if(($count1['no_of_passenger']-$count['SUM(total_p)'])>=$number)
              {
               if($obj->addcustomer($email,$id,$number));
          else{ echo "nothing"; }
              }
              else
              {
                echo '<script> alert("Sorry the number is huge for journey"); </script>';
              }

  

}
if (isset($_POST['delete'])) {

  
  $email=$_POST['email'];
  $number=$_POST['number'];
  $db=new database();
  $id=$_POST['select'];

  $query="SELECT * FROM customer WHERE email='$email'";
                       $res=mysqli_query($db->link,$query);

                      while ($data=mysqli_fetch_assoc($res)) {
                         $count=$data;
                       }

                       $m=$count['id'];
                       $query1="SELECT * FROM journey_customer WHERE cu='$m'AND jo='$id'";
                       $res1=mysqli_query($db->link,$query1);

                      while ($data=mysqli_fetch_assoc($res1)) {
                         $count1=$data;
                       }
                       if(count($count1)!=0)
                       {
                       $tot=$count1['total_p'];
                       if($number<=$tot)
                       {
                         if($obj->delete_customer($email,$id,$number))
                         {
                          $query2="SELECT * FROM journey_customer WHERE cu='$m'AND jo='$id'";
                       $res2=mysqli_query($db->link,$query2);

                      while ($data=mysqli_fetch_assoc($res2)) {
                         $count3=$data;
                       }
                       if($count3['total_p']==0)
                       {
                         $query4="DELETE  FROM journey_customer WHERE cu='$m'AND jo='$id'";
                       $res4=mysqli_query($db->link,$query4);
                       }
                         }

                         else
                         {
                          echo "nothing";
                         }
                       }
                       else
                       {
                         echo '<script> alert("Sorry the number is wrong"); </script>';
                       }
                     }
                     else
                     {
                      echo '<script> alert("Sorry the email not found"); </script>';
                     }


}



?>


<!DOCTYPE html>
<html lang="en">

  <head>
      <style>

      .form
      {
        margin-left: 280px;

      }

      span
      {
        margin-left:102px;
      }

      .em
      {
        margin:15px;

      }
      .add
      {
        margin-left:  190px;
          margin-top: 15px;
        width: 80px;
      }

      .del
      {
        margin-left: 10px;
        margin-top: 15px;
        width: 80px;

      }

      .select
      {

        margin-left: 178px;
        margin-top: 15px;
        width: 200px;
        height: 30px;

      }
      .show
      {
        margin-top: 40px;
        text-align: center;
        padding: 10px;
        width: 500px;
        height: 50px;
        background-color: aqua;
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
              

 

                    <?php

                   
                   echo '
                   <h3 class="labelrep"> </h3>

                    <form class="form" method="POST" action="#">

                 <span> Email : </span>
                  <input class="em" name="email" type="email" required="required" placeholder="example@HTTT.com"><br>
                  Nmber of passenger :
                 <input  type="number" name="number" placeholder="number of passenger" required="required" min=1><br>
                     <select name="select" class="select">
           
                    
                     ';?>

                     <?php 
                     require_once 'db.php';
                     $db= new database();
                     $c=0;
                     $count=array();
                     $arr=array();
                     $j_id=array();
                      $j_name=array();

                      $q1="SELECT COUNT(id) FROM journey";

                      $query="SELECT * FROM journey";
                       $res=mysqli_query($db->link,$query);
                       $res1=mysqli_query($db->link,$q1);

                      while ($data=mysqli_fetch_assoc($res1)) {
                         $count=$data;
                       }
                 
                       


                       for ($k=0; $k<$count['COUNT(id)']; $k++)
                       {
                        $arr=mysqli_fetch_assoc($res);
                        if($arr['last_date_sumbmit']>date('Y-m-d'))
                        {
                           $j_id[$c]=$arr['id'];
                           $j_name[$c]=$arr['name'];
                           $c++;


                        }
                       }


                      for ($i=0; $i<$c; $i++) { 

                      

                       echo ' : <option required="required" value="'.$j_id[$i].'">'. $j_name[$i].' </option>';
                        
                  ?> <?php   
                }
                     echo ' </select>
                     <br>
                    
                      <input class="add"  type="submit" name="add" value="add">
                      <input class="del"  type="submit" name="delete" value="delete">';
                      if(isset($_POST['delete']) || isset($_POST['add'])){
                        $row=array();
                        $row1=array();
                                  $db=new database();
                                  $query="SELECT * FROM customer WHERE email='$email'";
                                $result=mysqli_query($db->link,$query);
                                while ($data=mysqli_fetch_assoc($result)) {
                                  $row=$data;
                                }
                                $m=$row['id'];

                                 $query2="SELECT * FROM journey_customer WHERE cu='$m'";
                                $result2=mysqli_query($db->link,$query2);
                                while ($data=mysqli_fetch_assoc($result2)) {
                                  $row1=$data;
                                }

                                   
                                      
                                       
                                        
                                          $k=$row1['total_p'];
                                       
                                    
                                    if(is_null($k))
                                    {
                                      $k=0;
                                    }

                               echo ' <div class="show"> This email '.$_POST['email']  .' has '. $k .''. ' passenger' .' </div>';

                      }

                      
                     echo '  </form>';
                    ?>
                       <!-- delete member -->
            

                       
                </div>
            </div>
            
            
        </div>
        
        
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
  
    <script type="text/javascript" src="js/scripts.js"></script>
  </body>
 </html>