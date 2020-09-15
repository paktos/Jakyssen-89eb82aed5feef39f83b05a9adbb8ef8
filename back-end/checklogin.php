<?php
 // 	if(!isset($_SESSION)){
	    session_start();
	//     $_SESSION['username']="";
	// }
	// else{
	// 	echo $_SESSION['username'];
	// }

	if($_COOKIE) {
		$username=$_COOKIE["username"];
		$waktulogin=$_COOKIE["waktulogin"];
		$arr = array($username, $waktulogin);
		$ar1 = array('username'=>$username,'waktulogin'=>$waktulogin);
	  	echo json_encode($ar1);
	} else {
	  echo "";
	}

?>