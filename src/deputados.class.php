<?php

class deputados{
	
	public $listaDeputados;
	
	private $deputados = array();
	
	public function __construct(){
		
		$curl = new httpconnection("http://www.camara.gov.br/SitCamaraWS/Deputados.asmx/ObterDeputados");
		
		$this->listaDeputados = simplexml_load_string($curl->resposta);
	}
	
	public function getByID($idParlamentar){
		foreach ($this->listaDeputados as $deputado) {
			if ($deputado->idParlamentar == $idParlamentar) {
				return $deputado;
			};
		}
	}
	
	public function findByPartido($sigla){
		$partido = strtoupper($sigla);
		foreach ($this->listaDeputados as $deputado) {
			if ($deputado->partido == $partido) {
				$this->deputados[] = $deputado;
			}
		}
		
		return $this->deputados;
	}
	
	public function findByUF($sigla){
		$uf = strtoupper($sigla);
		foreach ($this->listaDeputados as $deputado) {
			if ($deputado->uf == $uf) {
				$this->deputados[] = $deputado;
			}
		}
		
		return $this->deputados;
	}
	
	public function getComissoesTi($idParlamentar){
		foreach ($this->listaDeputados as $deputado) {
			if ($deputado->idParlamentar == $idParlamentar) {
				return $deputado->comissoes->titular;
			}
		}
	}
	
	public function getComissoesSu($idParlamentar){
		foreach ($this->listaDeputados as $deputado) {
			if ($deputado->idParlamentar == $idParlamentar) {
				return $deputado->comissoes->suplente;
			}
		}
	}
}