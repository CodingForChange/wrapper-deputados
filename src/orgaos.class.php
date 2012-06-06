<?php

class orgaos{
	
	private $objxml;
	
	private $curl;
	
	public function __construct(){
		
		$this->curl = "http://www.camara.gov.br/SitCamaraWS/Orgaos.asmx/";
		
		$con = new httpconnection($this->curl."ObterOrgaos");
		
		$this->objxml = simplexml_load_string($con->resposta);
	}
	
	public function getLista() {
		return $this->objxml;
	}
	
	public function getMembros($idOrgao){
		
		$con = new httpconnection($this->curl."ObterMembrosOrgao?IDOrgao={$idOrgao}");
		
		$membros = simplexml_load_string($con->resposta);
		
		return $membros;
	}
	
	public function getPauta($idOrgao, $dataIni, $dataFim){
		
		$con = new httpconnection($this->curl."ObterPauta?IDOrgao={$idOrgao}&datIni={$dataIni}&datFim={$dataFim}");
		
		$pauta = simplexml_load_string($con->resposta);
		
		return $pauta;
	}
}