<?php
session_start();
include "db_conn_signin.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
    $email = validate($_POST['email']);
	$pass = validate($_POST['password']);
    //$name

    if (empty($email)) {
        //error message comes here if email is empty
        header("Location: login.php?error=email is required");
	    exit();
	}else if(empty($pass)){
        //error message comes here if password is empty
        header("Location: login.php?error=Password is required");
	    exit();
    }else{
        $sql = "SELECT * FROM registration WHERE email ='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
                $_SESSION['email'] = $row['email'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: dashboard.php");
		        exit();
            }else{
				header("Location: signup.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: signup.php?error=Incorect User name or password");
	        exit();
		}
	}

    
	}else{
        header("Location: login.php");
        exit();
    }
