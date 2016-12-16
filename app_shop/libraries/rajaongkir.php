<?php

/**
 * RajaOngkir CodeIgniter Library
 * Digunakan untuk mengkonsumsi API RajaOngkir dengan mudah
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'RajaOngkir/endpoints.php';

 class RajaOngkir extends Endpoints {

    private $api_key;
    private $account_type; 

    public function __construct() {
        // Pastikan bahwa PHP mendukung cURL
        if (!function_exists('curl_init')) {
            log_message('error', 'cURL Class - PHP was not built with cURL enabled. 
			Rebuild PHP with --with-curl to use cURL.');
        }
        $this->_ci = & get_instance();
        $this->_ci->load->config('rajaongkir', TRUE);
        // Pastikan Anda sudah memasukkan API Key di application/config/rajaongkir.php
        if ($this->_ci->config->item('rajaongkir_api_key', 'rajaongkir') == "") {
            log_message("error", "Set your API KEY in config file.");
        } else {
            $this->api_key = $this->_ci->config->item('rajaongkir_api_key', 'rajaongkir');
            $this->account_type = $this->_ci->config->item('rajaongkir_account_type', 'rajaongkir');
        }
        parent::__construct($this->api_key, $this->account_type);
    }
	
	//menampilkan data provinsi
	public function province()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: a58293b93adeb07fe7315f0cc38e0b1e"
				),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}
	//menampilkan data kabupaten/kota berdasarkan id provinsi
	public function city($province)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: a58293b93adeb07fe7315f0cc38e0b1e"
				),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}
	//hitung ongkir
	public function cost($destination,$weight,$courier)
	{
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			/* Origin code 256 is basic city address */
			/* you can find code from json data */
			CURLOPT_POSTFIELDS => "origin=256&destination=$destination&weight=$weight&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"key: a58293b93adeb07fe7315f0cc38e0b1e"
				),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}

	
}
