<?php

	session_start();
	error_reporting(0);

	include 'config/database.php';
	include 'config/server.php';

	if ($_SESSION['login_3'] == false) {

		header('location: /namesearch/admin/');
		exit();

	}

	// encripting data and passwords using.
    $key 	= md5('australia');
    $salt 	= md5('australia');

    // Encrypt
    function encrypt($string, $key) {

        $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
        return $string;
    }

    // Decrypt
    function decrypt($string, $key) {

        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
        return $string;
    }

     // hashing passwords
    function hashword($string, $salt) {

        $string = crypt($string, '$1$' . $salt . '$');
        return $string;
    }

	$uname 	= $_SESSION['uname'];
	$email 	= $_SESSION['email'];
    $role   = $_SESSION['role'];
    $fname  = $_SESSION['fname'];
	$lname 	= $_SESSION['lname'];
	$name 	= $_SESSION['name'];