<?php
//f�r att fel ska visas under utvecklingen
//av applikationen. Ta bort dessa kodrader
//n�r applikationen sj�s�tts i 
//produktionsmilj�
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

class ViewHelper{
	private $dataForTemplate;
        
	public function __construct(){
		$this->dataForTemplate=array();
	}

	public function assign($key,$value){
		//om nyckelv�rdet inte finns s� l�gg till det
		if(!array_key_exists($key,$this->dataForTemplate)){
			$this->dataForTemplate[$key]=$value;
		}
		else{
			throw  new Exception('Nyckeln finns redan');
		}
			
	}

	public function display(string $template){
		extract($this->dataForTemplate);
                
		//finns vyfilen
		if(file_exists("./views/" . $template)){
			include("./views/" . $template);
		}
		else{
			throw new Exception('Vyn finns inte');
			
		}
					
	}
}
?>