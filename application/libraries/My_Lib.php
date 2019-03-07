<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_Lib {
    public function hashing($pwd) {
		$options = [
		'cost' => 11,
		'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];

		return password_hash($pwd, PASSWORD_BCRYPT, $options);
	}
}

?>