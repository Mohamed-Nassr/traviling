<?php

class journey 
{
	
	public $name_of_journey;
	public $date_of_journey;
	public $price_of_journey;
	public $type_of_journey;
	public $Description_of_journey;
		
		public function check_Attribute_of_journey($Description_of_jour,$name_of_jour,$date_of_jour,$type_of_jour,$price_of_jour){

			if ( isset($Description_of_jour) && strlen($Description_of_jour) < 250 && ltrim($Description_of_jour)) {
				
				$this->Description_of_journey = $Description_of_jour;
			}

			if (is_numeric($price_of_jour) && strlen($price_of_jour) <= 5) {
				
				$this->price_of_journey=$price_of_jour;
			
			}

			if (isset($name_of_jour)) {
				
				$this->name_of_journey=$name_of_jour;
			}	

			
				
				$this->date_of_journey=$date_of_jour;

			if (isset($type_of_jour)) {
				
				$this->date_of_journey=$type_of_jour;
			}

		}
}



?>