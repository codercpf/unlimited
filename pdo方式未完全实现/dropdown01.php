<?php 

require_once "dbcon.php";
$pdo=dbconnect();
// var_dump($pdo);exit;
function getList($pid=0, &$result=array())	//参数引用，前面加&
{
	global $pdo;
	$sql = "select * from deepcate where pid=?";	
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($pid));

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result = $row;
		getList($row['id'],$result);
	}
	var_dump($result);
}

getList();

