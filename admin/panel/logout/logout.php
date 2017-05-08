<?php

	// 	LOGOUT PAGE
	
	include '../config/server.php';
	session_start();

	$_SESSION['login_3'];
    $_SESSION['id'];
    $_SESSION['uname'];
    $_SESSION['email'];
    $_SESSION['role'];
    $_SESSION['name'];

    session_destroy();

    header('location:'.$server);
    exit();
