<?php 
/*
* 路径link是向上查找，根据当前目录名，查找其祖先目录名
* 新闻》国内新闻》北京新闻》海淀区；根据海淀往上推
*/

require_once("db.inc.php");

//根据当前id，查找其父id
function getCatePath($cid, &$result=array()){
	$sql = "select * from deepcate where id=$cid";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);

	//存在当前id对应的目录，则将其父id作为参数传入，再往上查找
	if ($row) {
		$result[] = $row;
		getCatePath($row['pid'], $result);
	}
	//使用krsort()函数，对传入的数组按键名逆向排序
	krsort($result);

	return $result;
}

//函数封装，显示为路径样式
function displayCatePath($cid, $url="cate.php?id="){
	$rs = getCatePath($cid);
	$str='';
	foreach ($rs as $key => $val) {
		$str .= "<a href='{$url}{$val['id']}'>{$val['catename']}</a> > ";
	}
	return $str;
}

//超链接路径可自定义
echo displayCatePath(10, 'cate.php?page=1&id=');
