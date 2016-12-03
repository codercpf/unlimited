<?php 

function dbconnect()
{
	try {
		$dsn = "mysql:host=localhost;dbname=imooc";
		$username="root";
		$passwd="root";
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		$pdo = new PDO($dsn,$username,$passwd,$options);

		$pdo->query("set names utf8");

		return $pdo;

	} catch (PDOException $e) {
		echo $e->getMessage();	
	}
}

	
