<?php
require_once 'stuff.php';
require_once 'communication.php';
class manager extends stuff
{
    public function addAdmin($email,$pass,$name){
        $db=new database();
        if(strstr($email, 'admin.com'))
        { $que="INSERT INTO admin (email,pass,name,ut) VALUES ('$email','$pass','$name','1')";
        if(mysqli_query($db->link, $que))
         return true;
        else 
        return false;}
        else    
            return false;
    }
     public function deleteAdmin($id){
        $db=new database();
        $que="DELETE FROM admin WHERE id='$id'";
        if(mysqli_query($db->link, $que))
         return true;
        else 
          return false; 
    }
    public function addguide($email,$pass,$name){
        $db=new database();
        if(strstr($email, 'guide.com')){
        $que="INSERT INTO guide (email,pass,name,ut) VALUES ('$email','$pass','$name','3')";
        if(mysqli_query($db->link, $que))
             return true;
        else 
        return false;}
        else 
        return false;
    }
     public function deleteguide($id){
        $db=new database();
        $que="DELETE FROM guide WHERE id='$id'";
        if(mysqli_query($db->link, $que))
             return true;
        else 
            return false;
    }
    public function addrep($email,$pass,$name){
        $db=new database();
        if(strstr($email, 'rep.com'))
        { $que="INSERT INTO representative (email,pass,name,ut) VALUES ('$email','$pass','$name','3')";
        if(mysqli_query($db->link, $que))
             return true;
        else 
        return false;}
        else 
         return  false;
    }
     public function deleterep($id){
        $db=new database();
        $que="DELETE FROM representative WHERE id='$id'";
        if(mysqli_query($db->link, $que))
             return true;
        else 
            return false;
    }
      public function generate($CUid){
          $db=new database();
          $arr=array();
          $arr1=array();
          $pri=array();
          $sent=array();
          $que="SELECT f_id FROM report WHERE cust='$CUid'";
          $result=mysqli_query($db->link, $que);
          $query1="SELECT COUNT(id_report) from report";
          $result1=mysqli_query($db->link,$query1);
          while ($data=mysqli_fetch_assoc($result1)) {
                      $arr=$data;
          }           
        while ($arr['COUNT(id_report)']){
            if($row=mysqli_fetch_assoc($result)){
                         for($x=0;$x<$arr['COUNT(id_report)']; $x++){
                         $arr1[$x]=$row["f_id"];
                    }
                        $arr['COUNT(id_report)']--;
                    }
                    else
                        return false;
             }
                    /*arr1 is array of file id*/
             for($i=0;$i< count($arr1);$i++){
          $var=$arr1[$i];
          $sel="SELECT content FROM file WHERE id='$var'";
          $result=mysqli_query($db->link, $sel);
          $data=mysqli_fetch_assoc($result);
          $sent[$i]=$data['content'];
             }
             
              /*array of reports*/      
                    $pdfObj=new communication();
                    if(sizeof($sent))
                $pdfObj->generate($sent);
            else 
            {return false;}
            }
       public function showjourneybymonth($date) {
          $db=new database();
           $S1=array();
           $row=array();
           $arr2= str_split($date);
           for($i=0;$i<count($arr2);$i++)
           { $S1[$i]=$arr2[$i]; }
           if($S1[5]===1 && $S1[6]===0)
              { $S1[5]=0 ;$S1[6]=9;}
            else
            {$S1[6]=$S1[6]-1;}
            $newdate= implode("", $S1);
            
            return $newdate;
      }
       public function generatejoreport($newdate,$date){
           
                $pdfObj=new communication();
                $pdfObj->generatejoreport($newdate,$date);
            }
}
