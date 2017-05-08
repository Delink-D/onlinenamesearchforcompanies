<?php

    include'../includes/server.php';
    include'../includes/database.php';

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

    $email = trim($_POST['email']);
    $pword = trim($_POST['pword']);

    if(isset($_POST['login'])){

        if($email != ""){

            if($pword != ""){

                //  Encrypt email here...
                $email = encrypt($email,$key);

                $get = mysqli_query($connect, "SELECT * FROM admin WHERE user_email = '$email'")or die('<h1>Error:</h1><h2>Could not locate the table at this time. Contact your server providers for help.</h2>');

                $num = mysqli_num_rows($get);

                if($num != 0){

                    while($row = mysqli_fetch_assoc($get)){

                        $id     = $row['id'];
                        $uname  = $row['user_name'];
                        $fname  = $row['first_name'];
                        $lname  = $row['last_name'];
                        $dbpword= $row['user_pass'];
                        $role   = $row['role'];

                       $name = (decrypt($fname,$key) . ' ' . decrypt($lname,$key));

                        //  Hashing password to compare
                        $pword = hashword($pword,$salt);

                        if($dbpword != $pword){
                            header('location: ' . $server . 'admin/index.php?msg=wrong-password');
                            exit();
                        }

                        session_start();
                       @$_SESSION['login_3'] = 'true';
                        $_SESSION['id']     = $id;
                        $_SESSION['uname']  = decrypt($uname,$key);
                        $_SESSION['email']  = decrypt($email,$key);
                        $_SESSION['fname']  = decrypt($fname,$key);
                        $_SESSION['lname']  = decrypt($lname,$key);
                        $_SESSION['role']   = $role;
                        $_SESSION['name']   = $name;

                        header('location: ' . $server . 'admin/panel/');
                        exit();
                    }
                }else
                    header('location: ' . $server . 'admin/index.php?msg=wrong-email');
                    exit();
            }else
                header('location: ' . $server . 'admin/index.php?msg=input-password');
                exit();
        }else
            header('location: ' . $server . 'admin/index.php?msg=input-email');
            exit();
    }else
        header('location: ' . $server . 'admin/index.php');
        exit();