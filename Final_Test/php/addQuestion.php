<?php

	session_start();
	$_SESSION ["regState"] = 7;
	header("location: ../index.php");
	exit();


?>