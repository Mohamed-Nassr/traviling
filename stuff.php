<?php
require_once 'db.php';
require_once 'person.php';
class stuff extends person{

     public function Changepassword($phone,$pass,$pass2,$email)
          {
            $ret;
            $row= array();
                $db=new database();
                $query="SELECT * from customer where email='$email' AND phone_num='$phone'";
                $result=mysqli_query($db->link,$query);
                 while ($data = mysqli_fetch_assoc($result)){
                 $row = $data ;
                }
                if(count($row)>0)
                {
                    if($pass==$pass2)
                    {
                        $newquery="UPDATE customer set pass='$pass' where email='$email'";
                        $result=mysqli_query($db->link,$newquery);
                        $ret=1;
                    }
                    else
                    {
                        $ret=0;
                    }
                }
                else
                {
                    $ret=2;
                }
                return $ret;
          }   
}
