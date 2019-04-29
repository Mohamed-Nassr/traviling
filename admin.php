<?php
require_once 'person.php';
require_once 'db.php';
require_once 'stuff.php';
require_once 'communication.php';

class admin  extends person{


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
	 public function addjourney($email,$name,$passenger,$desciption,$normal,$last,$price,$type)
          {
              $row =array();
              $db=new database();
             $query="SElECT * FROM admin WHERE email='$email' ";
             $result = mysqli_query($db->link,$query);
             while($data = mysqli_fetch_assoc($result))
             {
                 $row= $data;
             }
             
                 $var=$row['id'];
                 $query1 = "INSERT INTO journey (ad,desciption,name,price,no_of_passenger,type,date_of_journey,last_date_sumbmit) VALUES ('$var','$desciption','$name','$price','$passenger','$type','$normal','$last')";
                 if( mysqli_query($db->link, $query1))
                 {	
                     return true;
                 }
                 else
                 {
                     return false;
                 }
            
          }
          public function delete_journey($jo_id)
          {
          	$row= array();
          	$db=new database();
          	$query="SELECT COUNT(cu) from journey_customer where jo='$jo_id'";
          	$result=mysqli_query($db->link,$query);
          	while($data = mysqli_fetch_assoc($result))
          	{
          		$row=$data;
          	}

          	$row2= array();
          	
          	$query3="SELECT COUNT(id) from comm where jo='$jo_id' ";
          	$result3=mysqli_query($db->link,$query3);
          	while($data= mysqli_fetch_assoc($result3))
          	{
          		$row2=$data;
          	}

          	if ($row['COUNT(cu)']!=0 ) 
          	{
          		$query1="DELETE  FROM journey_customer where jo='$jo_id' ";
          		
          		
          		
          		if (mysqli_query($db->link,$query1)) 
          		{
          			
          		  }

      

          	}
          	if($row2['COUNT(id)'] != 0)
          	{
          			$query3="DELETE  FROM comm where jo='$jo_id' ";
          			if(mysqli_query($db->link,$query3))
          			 { 

          			  }
          	}

          	$row3= array();
          	
          	$query4="SELECT COUNT(f_id) from report where jo='$jo_id' ";
          	$result4=mysqli_query($db->link,$query4);
          	while($data= mysqli_fetch_assoc($result4))
          	{
          		$row3=$data;
          	}
          	if($row3['COUNT(f_id)']!=0)
          	{
          		$row4= array();
          	
          	      $query5="SELECT * from report where jo='$jo_id' ";
          	      $result5=mysqli_query($db->link,$query5);

          	      for($i=0;$i<$row3['COUNT(f_id)'];$i++)
          	      {
          	      	$row4=mysqli_fetch_assoc($result5);

          	      	$var=$row4['f_id'];
          	      	$q="DELETE from file where id='$var'";
          	      	if(mysqli_query($db->link,$q))
          	      	{}
          	      }
          	      $q2="DELETE from report where jo='$jo_id'";
          	      if(mysqli_query($db->link,$q2))
          	      {}
          	}

          	

      			$query2="DELETE  from journey where id='$jo_id'";
      		      		if (mysqli_query($db->link,$query2))
      		      			 {
      		      				return true;

      		      			 }
      		     
          	

		  }
		  public function selectemail($email)
		  {    
			  $db=new database();
				 $ret;
				  $row = array();
					   $query;
			 $query="SELECT * FROM `admin` Where email = '$email' AND pass='$pass'";
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
		 
				
				 $query="SELECT * FROM `admin` Where email = '$email' AND pass='$hash'";
				  
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