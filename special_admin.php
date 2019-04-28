<?php
session_start();
require_once 'Customer.php';
$obj=new Customer();
if(isset($_POST['editcomment']))
{
  $obj->EditComm($_POST['commentid'],$_POST['text_comm2']);
}
if(isset($_POST['comm']))
{
$obj->addComment('s',$_POST['text_comm'],$_POST['nomber'],$_SESSION['email']);

}
if(isset($_POST['deletecomment']))
{
$obj->DELETComm($_POST['commentid']);

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
      .comment

      {

        float: right;
      }


      .add-jou{
        width: 260px;
        border-radius: 5px;
        float: right;
        margin-top:20px;
        margin-right: 100px;

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



      .di
      {
        border-radius: 15px;
        border:3px solid #000;
       width: 1200px;
       float: left;
       padding: 10px;
       margin-left: 0px;
       margin-right: 10px;
       margin-top: 10px;
    
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
         .delete 
      {
      
        width: 150px;
        height: 40px;
        border-radius: 15px;
        margin: 20px;
        float: right;
      }
             .deletesub 
      {
      
        display: none;
      }
      .text_comment
      {
        border-radius: 3px;
        width: 800px;
        height: 60px;
        float :left;
      }
      .com
      {
        padding-top: 20px
      }
      .com .delete
      {
        float:left;
      }
      .act1
      {
        display: none;
      }
   <?php    
    /*  .botton-to-add-jou{
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
          .delete
      {
        width: 310px;
        height: 50px;
        border-radius: 15px;
      }-
      .add-jou{
        width: 310px;
        border-radius: 15px;
      }
      .h
      {
        color: blue;
      }*/
    ?>
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
                                        <li class="act1ive"><a class="smoth-scroll" href="Home_admin.php">Home <div class="ripple-wrapper"></div></a>
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
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Special Journey.</h2>
                        <p></p>
                    </div>
                </div>
            </div>               
                
                <?php  
                require_once 'db.php';
                $db = new database();
                    
                    $query="SELECT COUNT(id) FROM special";
                    $result=  mysqli_query($db->link, $query);

                    $query3="SELECT * FROM special ";
                      $row3= array();
                     $result3=  mysqli_query($db->link, $query3);


                     while ($data = mysqli_fetch_assoc($result))
                     {


                      $row_co=$data;
                     }

                  for ($i=0; $i < $row_co['COUNT(id)']; $i++) {  
                   $row = mysqli_fetch_assoc($result3); 


                  echo '              
                   <div class="di">
                      
                      <h1>'. $row['destination'] .'</h1><br>
                      <h1>'. $row['no_of_passenger'] .' </h1><br>
                      <h1>'. $row['no_of_days'] .'</h1><br>
                       

                    ';
                    ?>
                    <?php
                    require_once 'db.php';                      

                   $mm= $row['id'];
                   $query_s2="SELECT COUNT(id) FROM comm WHERE speJo='$mm'";
                   $result_q2=  mysqli_query($db->link, $query_s2);
           
        

                    $qs1="SELECT * FROM comm WHERE speJo='$mm'";
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
                               </div>';
                            }
                           


  
                    for ($k=0; $k< $row_co1['COUNT(id)']; $k++) { 
                      
                      $row_comm=mysqli_fetch_assoc($result_q1)
                    ?>
                    

                    <?php
                    $row_cust=array();
                    $cu_id= $row['cu'];
                      $q_cust = "SELECT * FROM customer Where id = '$cu_id'" ;
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
                              if($k==$row_co1['COUNT(id)']-1 && $_SESSION['email'] == $row_comm['email'])
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
                               </div>';
                            }
                            ?>

                   <?php  
                    }
                 echo '</div>';
                  }
                  ?>
              
        </div>
        </section>
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
      
     </body>
    <script type="text/javascript" src="jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC0HAKwKinpoFKNGUwRBgkrKhF-sIqFUNA"></script> -->
    
    <!-- Main Javascript File  -->
    <script type="text/javascript" src="js/scripts.js"></script>
     </html>
