<?php

class httpconnection{
	
	public $resposta;

	public function __construct($url) {
		$curl = curl_init();
		curl_setopt( $curl , CURLOPT_URL , $url );
		curl_setopt( $curl , CURLOPT_SSL_VERIFYPEER , false );
		curl_setopt( $curl , CURLOPT_USERAGENT , isset( $_SERVER[ 'HTTP_USER_AGENT' ] ) ? $_SERVER[ 'HTTP_USER_AGENT' ] : "Mozilla/4.0" );
		curl_setopt( $curl , CURLOPT_RETURNTRANSFER , true );
		
		$this->resposta = curl_exec( $curl );
		
		curl_close( $curl );
	}
}