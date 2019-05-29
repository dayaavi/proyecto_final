<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

class Security {

    protected function secure_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    protected function secure_form($form) {

        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }

    }

	protected function en_de_cryptIt($string, $action) {
   
	    $secret_key = '32452c24d2e5242394f51L24eEr210';
	    $secret_iv = 'A)2C!u427z^';
	 
	    $output = false;
	    $encrypt_method = 'AES-256-CBC';
	    $key = hash('sha256', $secret_key);
	    $iv = substr(hash('sha256', $secret_iv ), 0, 16);
	 
	    if($action == 'en') {
	        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
	    } else if($action == 'de') {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
 
   		return $output;
	}

}
