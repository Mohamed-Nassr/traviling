<?php
require_once 'db.php';
require_once 'personInterface.php';
class person implements personInterface{
    public $name;
    public $pass;
    public $email;
   
    public function setpass($pass){    
    $this->pass=$pass;
    $ret=true;
    return $ret;
    }
    public function LOgout() {
    session_destroy();
    header('Location:/travlling/home.php');
    }
    public function selectname($name){     
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
}
