<?php
class database {
    private $dsn;
    private $username;
    private $password;
    public  $db_name;
    public  $link ;
    static public $Counter;
    public function __construct() {
        
        $this->dsn = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->db_name = 'travelling';
        $this->link = mysqli_connect($this->dsn, $this->username, $this->password, $this->db_name);
        
  
    }
  
}