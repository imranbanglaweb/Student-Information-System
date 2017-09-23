<?php
	// this connection only for delete table
	$DBhost = "localhost";
	$DBuser = "imranweb";
	$DBpass = "#w7vD!0d32Nz$";
	$DBname = "imranweb_sis";
	
	try{
		
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
		$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $ex){
		
		die($ex->getMessage());
	}