<?php 

require_once("db.inc.php"); 

function likecate($path='') {     
	$sql = "select id,catename,path,concat(path,',',id) as fullpath 
			from likecate order by fullpath asc";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {
		//1、用trim($str,',')去掉字段左右多余的','
		//2、用explode(',',$str)将$str以逗号分隔为数组
		//3、用count()得出数组元素的数目，即深度，作为缩进个数
		$deep = count(explode(',',trim($row['fullpath'],',')));

		$row['catename'] = str_repeat('&nbsp;&nbsp;',$deep*2).'|--'.$row['catename'];
		$result[] = $row;
	}
	return $result;
}

function showcate($selectedId=0){
	$str='';
	$rs = likecate();
	$str.="<select name='cate'>";
	foreach ($rs as $key => $val) {
		//设置默认选中项，选项id为传入id时，默认选中
		$selectedStr = '';
		if ($val['id'] == $selectedId) {
			$selectedStr = "selected";
		}

		$str .= "<option {$selectedStr} id={$val['id']}>{$val['catename']}</optioin>";
	}
	$str .= "</select>";
	return $str;
}

echo showcate(5);




