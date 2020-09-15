<?php
 	if(!isset($_SESSION)){
	    session_start();
	    $_SESSION['username']="";
	}
	$link = mysqli_connect("localhost", "root", "", "mkm");
	if(!$link){
			die ("connection error " . mysqli_connect_error());	
	}

	$username = $_POST['username'];
	$password = $_POST["password"];
	$confirmpass = $_POST["confirmpassword"];
	if ($password == $confirmpass) {
		$sql = "INSERT INTO user (username,password) VALUES ('$username','$password')";
		echo $sql;
		$result = mysqli_query($link, $sql);
		$notif="";
		if ($result == 0) {
			$notif = 'Registrasi Gagal.';
			header("location:../front-end/register.html");
		}	
		else{
			$notif = 'Registrasi Berhasil';
			header("location:../front-end/login.html");
		}
	}
	else{
		$notif = 'Password dan confirm password tidak sesuai';
		header("location:../front-end/register.html");
	}
	
?>