<?php 
/*
* 获取link路径是向上查找，根据当前目录id，查找其路径上经过的父id
* 明星》女明星》日韩明星》日本
*/

require_once("db.inc.php");

function getPathCate($catid){
	$result = array();
	$sql = "select *,concat(path,',',id) as fullpath from likecate where id=$catid";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);

	//获取单条记录的fullpath全路径上经过的id
	$ids = $row['fullpath'];
	//获取fullpath上的每项元素的名称，正序排列即为全路径link
	$sql02 = "select * from likecate where id in ($ids) order by id asc";
	$res02 = mysql_query($sql02);
	while ($row02 = mysql_fetch_assoc($res02)) {
		$result[] = $row02;
	}
	return $result;
}

function displayCatePath($catid, $link='cate.php?cid='){
	$rs = getPathCate($catid);
	$str='';
	foreach ($rs as $key => $val) {
		$str.="<a href='{$link}{$val['id']}'>{$val['catename']}</a> > ";
	}
	return $str;
}

echo displayCatePath(9, 'cate.php?page=1&id=');
