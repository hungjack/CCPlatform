<?php
	$server='localhost';
	$id='root';
	$pwd='123456789';
	$dbname='member';   
	$con = mysqli_connect($server , $id , $pwd);
	if (!$con){
  		die("Could not connect: " . mysql_error());
  	}
	mysqli_select_db($con , $dbname);
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
?>