<?php
require_once 'db.php';
class person {
    public $name;
    public $pass;
    public $email;
             public function selectname($name)
    {     
           $ret; 
        if (strlen($name)<=20){

            $this->name=(str_replace(" ","+",$name));
            $ret=true;
        }
        else  
           { $ret=false;
           }
      return $ret;
    }
       public function selectemail($email)
    {    
        $db=new database();
           $ret;
            $row = array();
                 $query;
       if(strstr($email, 'HTTT.com'))
       {$query= "SELECT * FROM `customer` Where email = '$email' AND pass='$pass'";}
        if(strstr($email, 'admin.com'))
        {$query="SELECT * FROM `admin` Where email = '$email' AND pass='$pass'";}
         if(strstr($email, 'guide.com'))
         {$query = "SELECT * FROM `guide` Where email = '$email' AND pass='$pass'" ;}
          if(strstr($email, 'manager.com'))
          {$query = "SELECT * FROM `manager` Where email = '$email' AND pass='$pass'";}
           if(strstr($email, 'rep.com'))
           { $query = "SELECT * FROM `representative` Where email = '$email' AND pass='$pass'";} 
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
       public function selectpass($pass)
    {    
            $this->pass=$pass;
            $ret=true;
    return $ret;
      }
    public function login ($email,$pass){
       $db=new database();
       $row = array();
       $query;
       $hash=$pass;

       if(strstr($email, 'HTTT.com'))

       {$query= "SELECT * FROM `customer` Where email = '$email' AND pass='$hash'";}
        if(strstr($email, 'admin.com'))
        {$query="SELECT * FROM `admin` Where email = '$email' AND pass='$hash'";}
         
          if(strstr($email, 'manager.com'))
          {$query = "SELECT * FROM `manager` Where email = '$email' AND pass='$hash'";}
           if(strstr($email, 'rep.com'))
           { $query = "SELECT * FROM `representative` Where email = '$email' AND pass='$hash'";}
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
    public function LOgout() {
        session_destroy();
       header('Location:/travlling/home.php');
}
}
