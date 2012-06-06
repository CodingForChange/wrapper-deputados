<?php

class depLideres{
	
	public $lideres;
	
	private $deputados = array();
	
	public function __construct() {
		
		$curl = new httpconnection("http://www.camara.gov.br/SitCamaraWS/Deputados.asmx/ObterLideresBancadas");
		
		$this->lideres = simplexml_load_string($curl->resposta);
	}
	
	public function getLideres(){
		foreach ($this->lideres as $lider) {
			if ($lider->lider) {
				$this->deputados[] = $lider->lider;
			}
		}
		
		return $this->deputados;
	}
	
	public function getViceLideres(){
		foreach ($this->lideres as $lider) {
			if ($lider->vice_lider) {
				foreach ($lider->vice_lider as $vice) {
					$this->deputados[] = $vice;
				}
			}
		}
		
		return $this->deputados;
	}
	
	public function getRepresentantes(){
		foreach ($this->lideres as $lider) {
			if ($lider->representante) {
				$this->deputados[] = $lider->representante;
			}
		}
		
		return $this->deputados;
	}

	public function getByPartido($sigla){
		foreach ($this->lideres as $bancada) {
			if ($bancada['sigla'] == $sigla) {
				return $bancada;
			}
		}
	}
}