<?php
	class Test{
		//muutujad ehk properties
		private $secretNumber;
		public $publicNumber;
		
		//funktsioonid on meetodid (methods)
		//constructor, mis käivitub klassi kasutuselevõtmisele
		function __construct($givenNumber) {
			$this->$secretNumber = 7;
			$this->$publicNumber = $givenNumber * $secretNumber;
		}
		
		//destructor, mis käivitub classi eemaldamisel
		function __destruct(){
			echo "Klass lõpetab tegevuse"
		}
		
		public function showValuse(){
			echo "Salajane nr on: " .$this->secretNumber;
			$this->tellInfo();
		}
		
		private function tellInfo(){
			echo "See siin on väga salajane!";
		}
		
	}//class lõppeb

?>