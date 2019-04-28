<?php
require_once '\fpdf181\fpdf.php';
require_once 'db.php';
class communication extends FPDF {
      public function addComment($static,$desc,$journey_id,$email)
             {      $db=new database();
                   
                    if($static=='s')
                    {
                           $query="INSERT INTO comm (descraption,email,speJo) VALUES('$desc','$email','$journey_id')";
                           $result=mysqli_query($db->link,$query);
                        
                    }

                     else
                    {
                           $query="INSERT INTO comm (descraption,email,jo) VALUES('$desc','$email','$journey_id')";
                           $result=mysqli_query($db->link,$query);
                        
                    }
             }
             public function DELETComm($id){
                 $db=new database();
           
                 $query="DELETE  FROM comm WHERE id='$id' ";
                    if(mysqli_query($db->link, $query))
                      return true;
                  else
                      return false;
                     
             }
             public function EditComm($id,$comm)
             {       $db=new database();
                  $query="UPDATE comm SET descraption='$comm' WHERE id='$id'";
                  if(mysqli_query($db->link, $query))
                      return true;
                  else
                      return false;        
             }
             public function resetpass($phone, $pass, $pass2, $email)
             {
                 $obj=new stuff();
                 return $obj->Changepassword($phone, $pass, $pass2, $email);
                 
             }
function Header(){
    
    $this->SetFont('Arial','B',15);
    $this->Cell(80);
    $this->Cell(50,10,'HTTT For Travlling',1,0,'C');
    $this->Ln(20);
}

function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
public function generate($file){
$this->AliasNbPages();
$this->AddPage();
$this->SetFont('Times','',12);
for($i=0;$i<= sizeof($file);$i++)
    $this->Cell(0,10,$file[$i]       ."##",0,1);
    $this->Output();
}
  public function generatejoreport($newdate,$date){
                $db=new database();
                $this->AliasNbPages();
                $this->AddPage();
                $this->SetFont('Times','',12);
                $row=array();
             /*select all journey between one month*/
            $que="SELECT * FROM journey WHERE date_of_journey BETWEEN '$newdate' AND '$date'";
            $query1="SELECT COUNT(id) from journey";
            $result1=mysqli_query($db->link,$query1);
            $result=mysqli_query($db->link,$que);
                   
                    while ($data=mysqli_fetch_assoc($result1)) {
                      $arr=$data;
                    }
                $str=["JourneyName","description","price","admin name","date","type","numbers"];
                $str2=["name","desciption","price","ad","date_of_journey","type","no_of_passenger"];
                $str3;
                 while ($arr['COUNT(id)'])
                    {   if($row=mysqli_fetch_assoc($result)){
                         for($x=0; $x<(7*$arr['COUNT(id)']); $x++){
                         $str3[$x]=$row[$str2[$x%7]];
                    }
                        $arr['COUNT(id)']--;
                                     }
                                     else {return false;}
                }
                            for($x=0; $x < count($str3); $x++){
                                if($str[$x%7]!="admin name") 
                                 {$this->Cell(0,10,$str[$x%7]."        ".$str3[$x],0,1);}
                                else 
                                 {                 $var=$str3[$x%7];
                                        $que="SELECT * FROM admin WHERE id='$var'";
                                          $result= mysqli_query($db->link, $que);
                                          while($data = mysqli_fetch_assoc($result))
                                              {
                                                $name= $data;
                                              }
                                                         $adminname=$name['name'];
                                                         /*select admin name*/
                                    $this->Cell(0,10,$str[$x%7]."        ".$adminname,0,1);
                                              }    
                                } 
                                
                               $this->Output();  

           }
       public function addreport ($customer_email,$journey_id,$fname,$fsize,$ftype,$fcontent){
                 $row1=array();
                 $row2=array(); 
              

                 $db= new database();
                 $q1="SELECT * FROM customer WHERE email='$customer_email'";
                 if($var=mysqli_query($db->link,$q1))
                 {                     echo 'ff';
                    while($data= mysqli_fetch_assoc($var)){
                 $row1=$data;}
                  $q_insert="INSERT INTO file(name,type,size,content) VALUES ('$fname','$ftype','$fsize','$fcontent')";
                  if($var1=mysqli_query($db->link,$q_insert))
                  {
                    $q_sel="SElECT * FROM file WHERE name='$fname' AND content='$fcontent'";
                   
                    
                    if($var2=mysqli_query($db->link,$q_sel))
                    {
                    while($data1= mysqli_fetch_assoc($var2)){
                     $row2=$data1;
                   }
                      $p1=$row2['id'];
                      $p2=$row1['id'];
                      $q_in="INSERT INTO report (jo,cust,f_id) VALUES ('$journey_id','$p2','$p1')";
                      if($var3=mysqli_query($db->link,$q_in))
                      {
                      }else{
                          return false;
                    } 
                    
                    }else{ return false ; }
 
                  }
                }
                 else{   echo false;}

                 
             }
}

