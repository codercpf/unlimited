<?php 
// $pid=$_GET['pid'];

// print_r($_POST);exit;
/*
	print_r($_POST);
	$pid=intval($_POST['type']);
	print_r($pid);echo "<br/>";
*/
$pid = is_numeric($_POST['type']) ? $_POST['type'] : '';
// $pid = intval($pid);
// print_r($pid);exit;

try {
	$dsn="mysql:host=localhost;dbname=imooc";
	$username="root";
	$passwd="root";
	$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn,$username,$passwd,$options);
	$pdo->query("set names utf8");

	$sql="select * from deepcate where pid=?";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($pid));

	// echo $stmt->rowCount();exit;

	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($data);

} catch (PDOException $e) {
	echo $e->getMessage();
}
