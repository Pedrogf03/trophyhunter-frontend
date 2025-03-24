<?php

class Service {
	
	private $baseUrl;
	private $headers;

	public function __construct() {
			//$this->baseUrl = rtrim($baseUrl, '/');
			//$this->headers = $headers;
	}

	private function request($endpoint, $method = 'GET', $data = null) {
			$url = "$this->baseUrl/$endpoint";
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			
			if (!empty($this->headers)) {
					curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
			}
			
			if ($data) {
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
					curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($this->headers, ["Content-Type: application/json"]));
			}
			
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$error = curl_error($ch);
			curl_close($ch);
			
			if ($error) {
					return ["error" => $error];
			}
			
			return ["status" => $httpCode, "response" => json_decode($response, true)];
	}

	public function get($endpoint) {
			return $this->request($endpoint, 'GET');
	}

	public function post($endpoint, $data) {
			return $this->request($endpoint, 'POST', $data);
	}

	public function put($endpoint, $data) {
			return $this->request($endpoint, 'PUT', $data);
	}

	public function delete($endpoint) {
			return $this->request($endpoint, 'DELETE');
	}
}