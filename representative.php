<?php
require_once'db.php';
require_once 'stuff.php';
	/**
	* 
	*/
	class rep extends stuff
	{
		
		function addcustomer($email,$j_id,$no_of_passenger)
		{
			$row=array();
			$row1=array();
			$db=new database();
			$query="SELECT * FROM customer WHERE email='$email'";
			$result=mysqli_query($db->link,$query);
			while ($data=mysqli_fetch_assoc($result)) {
				$row=$data;

			}
			if(count($row) != 0)
			{


				$id=$row['id'];
				$query1="SELECT * FROM journey_customer WHERE jo='$j_id' AND cu='$id'";
				$result1=mysqli_query($db->link,$query1);
				while ($data=mysqli_fetch_assoc($result1)) {
					$row1=$data;

				}
			if(count($row1)!=0)
			{
				

			$total = $row1['total_p'] + $no_of_passenger;
			$q="UPDATE journey_customer set total_p='$total' WHERE cu='$id' AND jo='$j_id'";
				if(mysqli_query($db->link,$q))
				{
					return true;
				}
				else
				{
					return false;
				}
			}

			else{
				$q="INSERT INTO journey_customer(jo,cu,total_p) VALUES('$j_id','$id','$no_of_passenger')";
				if(mysqli_query($db->link,$q))
				{
					return true;
				}
				else
				{
					return false;
				}

			}
		}
			else
			{
				return false;
			}
		
	
	}

		public function delete_customer($email,$j_id,$no_of_passenger)
		{

			
		
			$row=array();
			$row1=array();
			$db=new database();
			$query="SELECT * FROM customer WHERE email='$email'";
			$result=mysqli_query($db->link,$query);
			while ($data=mysqli_fetch_assoc($result)) {
				$row=$data;

			}
			if(count($row) != 0)
			{


				$id=$row['id'];
				$query1="SELECT * FROM journey_customer WHERE jo='$j_id' AND cu='$id'";
				$result1=mysqli_query($db->link,$query1);
				while ($data=mysqli_fetch_assoc($result1)) {
					$row1=$data;

				}
			if(count($row1)!=0)
			{
				

			$total = $row1['total_p'] - $no_of_passenger;
			$q="UPDATE journey_customer set total_p='$total' WHERE cu='$id' AND jo='$j_id'";
				if(mysqli_query($db->link,$q))
				{
					return true;
				}
				else
				{
					return false;
				}
			}

			else{
				
				return false;
			}
		}
			else
			{
				return false;
			}
		
	
	}
		

}

?>