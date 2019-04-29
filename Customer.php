<?php
require_once 'person.php';
require_once 'stuff.php';
require_once 'communication.php';
class Customer  extends person{
    private $master;
    private $repass;
    private $age;
    private $phone;
    public $Gender;
    public $coutry;
     public function setname($name)
    {      
           $ret; 
        if (strlen($name)>=9){

            $this->name=(str_replace(" ","",$name));
            $ret=true;
        }
        else  
           { $ret=false;

           }
      
      return $ret;
    }
    public function setemail($email)
    {    
        $db=new database();
           $ret;
            $row = array();
        $query = "SELECT * FROM customer Where email = '$email'" ;
        $result = mysqli_query($db->link, $query);
        while ($data = mysqli_fetch_assoc($result)){
            $row = $data ;
        }
                
        if (strstr($email, "@HTTT.com")&& count($row) == 0){
            $this->email=$email;
            $ret=true;
            
        }
        else  {
                
            $ret=false;
        }

        return $ret;
      }
    public function checkpass($pass,$repass) {
           
         
            $this->pass=$pass;
            return true;
            
             }
                    public function setage($age)
    {    
           $ret;
        if (is_numeric($age) && str_replace(" ","",$age)>=18 ){
            $this->age=str_replace(" ","",$age);
            $ret=true;
          
        }
        else  
        {
            $ret=false; 
          }  
           return $ret;
      }
      public function setphone($phone)
    {    
           $ret;
        if (is_numeric(str_replace(" ","",$phone))){

            $this->phone=str_replace(" ","",$phone);
            $ret=true;
          
            }
            else
            {
                $ret=false;
                
            }
      return $ret;
        
    }
                public function setgender($gender)
    {    
           $ret;
            if(strlen($gender)>0)
            {
                $this->Gender=$gender;
          
                $ret=true;
            }
            else
            {
                $ret=false;
            }
        
        
        return $ret;
      }

                   public function setCountry($Country)
    {    
            $this->coutry=$Country;
            
        return true;
      }
     
        public function insertDB()
        {
 
        $db=new database();
           $ret;
        
        $que="INSERT INTO customer (country,age,gender,name,phone_num,email,pass,ut) VALUES 
                ('$this->coutry','$this->age','$this->Gender','$this->name','$this->phone','$this->email','$this->pass','2')";
        if(mysqli_query($db->link, $que))
        {
            $ret=$this->email;
        }else  
        { $ret=false;}
        
        return $ret;

        }
          public function forgetpass($phone,$pass,$pass2,$email)
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

          
          public function pay($credit)
          {
              if(is_numeric($credit) && strlen($credit)==14)
              { $this->master=$credit;
              return true;}
              else 
                 return false;
          }
          
          public function submit($id,$email,$total)
          {
              
              $row1=array();
               $row2=array();
              $db=new database();

              $query2="SElECT * FROM customer WHERE email='$email'";
              $result2 = mysqli_query($db->link, $query2);
            
            while ($data=mysqli_fetch_assoc($result2))
            {
                $row1=$data;
               
            }
            $cust=$row1['id'];

              $query3="SElECT * FROM journey_customer WHERE cu='$cust' AND jo='$id'";
              $result3 = mysqli_query($db->link, $query3);
                 while ($data=mysqli_fetch_assoc($result3))
                {
                    $row2=$data;
                   
                }

            if(count($row2)!=0)
            {
                
                $tot=$row2['total_p']+$total;
                 $newquery="UPDATE journey_customer set total_p='$tot' WHERE cu='$cust' AND jo='$id'";
               $result=mysqli_query($db->link,$newquery);           
            }


            else
            {
                if(count($row1) !=0 )
              {                 
                  
                     $var2= $row1['id'];
                  $query="INSERT INTO journey_customer(jo,cu,total_p) VALUES ('$id','$var2','$total')";
                  if (mysqli_query($db->link, $query))
                  {
                      return true;
                  }
                  else { return false;}
              }
            }
          }       
          public function cancleJou($j_id,$email,$total) {
              
              $row1=array();
              $row5=array();
               $row2=array();
              $db=new database();
              $query2="SElECT * FROM customer WHERE email='$email'";
             $result2 = mysqli_query($db->link, $query2);
            while ($data=mysqli_fetch_assoc($result2))
            {
                $row1=$data;
            }
         
                 
                  $mm=$row1['id'];
                  $query3="SElECT * FROM journey_customer WHERE cu='$mm' and jo='$j_id' ";
             $result3 = mysqli_query($db->link, $query3);
            while ($data=mysqli_fetch_assoc($result3))
            {
                $row2=$data;
            }
                        $tot=$row2['total_p'];
                        $all=$tot-$total;
                       $var2=$row1['id'];
                  $query="UPDATE journey_customer set total_p='$all' WHERE cu='$mm' and jo='$j_id'";
                  mysqli_query($db->link, $query);
               
               $query4="SElECT * FROM journey_customer WHERE cu='$mm'";
             $result4 = mysqli_query($db->link, $query4);
            while ($data=mysqli_fetch_assoc($result4))
            {
                $row5=$data;
            }
            if($all==0)
            {
              $query5="DELETE FROM journey_customer WHERE cu='$mm' and jo='$j_id'";
                   if (mysqli_query($db->link, $query5))
                  {
                      return true;
                  }
                  else { return false;}
            }

          
          }
            
          public function addspecial($email,$name,$passenger,$days)
          {
              $row =array();
              $db=new database();
             $query="SElECT * FROM customer WHERE email='$email' ";
             $result = mysqli_query($db->link,$query);
             while($data = mysqli_fetch_assoc($result))
             {
                 $row= $data;
             }
             if(count($row)!=0)
             {
                 $var=$row['id'];
                 $query1 = "INSERT INTO special (cu,no_of_passenger,no_of_days,destination) VALUES ('$var','$passenger','$days','$name')";
                 if( mysqli_query($db->link, $query1))
                 {
                     return true;
                 }
                 else
                 {
                     return false;
                 }
             }
            else {
                 return false;
            } 
          }
          public function canclespecialJou($id,$email) {
              
              $row1=array();
              $db=new database();
            
              $query2="SElECT * FROM customer WHERE email='$email'";
            
            $result2 = mysqli_query($db->link, $query2);
            while ($data=mysqli_fetch_assoc($result2))
            {
                $row1=$data;
            }
              if(count($row1) !=0)
              {    
                       $var2=$row1['id'];
                      
                  $query="DELETE  FROM special WHERE id='$id' AND cu='$var2'";
                  if (mysqli_query($db->link, $query))
                  {
                      return true;
                  }
                  else { return false;}
              }
          }
              public function addComment($static,$desc,$journey_name,$email)
             {      $cumobj=new communication();
                   $cumobj->addComment($static,$desc, $journey_name, $email);
              }
                 
             public function DELETComm($id){
                 $cumobj=new communication();
                    $cumobj->DELETComm($id); 
             }
             public function EditComm($id,$comm)
             {            
                 $cumobj=new communication();
                    $cumobj->EditComm($id,$comm); 
             }
             public function resetpass($phone, $pass, $pass2, $email)
             {
                 $obj=new stuff();
                 return $obj->Changepassword($phone, $pass, $pass2, $email);
                 
             }


             public function editspecial($email,$j_id,$destination,$passenger,$days)
             {



              $row1=array();
              $db=new database();
            
              $query2="SElECT * FROM customer WHERE email='$email'";
            
            $result2 = mysqli_query($db->link, $query2);
            while ($data=mysqli_fetch_assoc($result2))
            {
                $row1=$data;
            }
              if(count($row1) !=0)
              {    
                       $var2=$row1['id'];
                      
                  $query="UPDATE special set destination='$destination', no_of_passenger='$passenger', no_of_days='$days'  WHERE id='$j_id' AND cu='$var2'";
                  if (mysqli_query($db->link, $query))
                  {
                      return true;
                  }
                  else { return false;}
              }



              }






           public function addreport ($customer_email,$journey_id,$fname,$fsize,$ftype,$fcontent){
                                $cumobj=new communication();
                                $cumobj->addreport($customer_email,$journey_id,$fname,$fsize,$ftype,$fcontent);
                 
             }
             public function selectemail($email)
            {    
                $db=new database();
                   $ret;
                    $row = array();
                         $query;
               $query="SELECT * FROM `customer` Where email = '$email' AND pass='$pass'";
                   $result = mysqli_query($db->link, $query);
                while ($data = mysqli_fetch_assoc($result)){
                    $row[] = $data ;
                }
                        
                if ( count($row) != 0){
                    $this->email=$email;
                    $ret=true;
                }
                else  {
                    $ret=false;
                }
                return $ret;
              }
              public function login ($email,$pass){
                  $db=new database();
                  $row = array();
                  $query;
                  $hash=$pass;
           
                  
                   $query="SELECT * FROM `customer` Where email = '$email' AND pass='$hash'";
                    
                  $result = mysqli_query($db->link, $query);
            
                   while ($data = mysqli_fetch_assoc($result)){
                       $row = $data ;
                   }
                   if(count($row) !== 0){
                       return true;
                        
                   }else{
                       return false ;
                   }
               }
}
