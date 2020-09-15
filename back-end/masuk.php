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
	$sql = "SELECT * FROM user WHERE username='$username' AND password = '$password'";

	$result = mysqli_query($link, $sql);
	$obj = mysqli_fetch_array($result);
	if (mysqli_num_rows($result) > 0) {

		$_SESSION['username']= $obj["username"];
		$userna = $obj["username"];
		setcookie("username", $userna, time()+60*60*7);
		$date = date("H:i:s");
		setcookie("waktulogin", $date , time()+60*60*7);
		header("location:../front-end/home.html");
	}
	else{
		$notif="USERNAME DAN PASSWORD ANDA SALAH";
		header("location:../front-end/login.html");
	}
?>