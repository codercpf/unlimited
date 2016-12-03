<?php
/*
* 下拉列表是往下查找，根据当前父id，查找其子孙目录名
*/

require_once("db.inc.php");

function getList($pid=0, &$result=array(), $spac=0){
	$spac = $spac+2;
	$sql = "select * from deepcate where pid=$pid";
	$res = mysql_query($sql);
	while($row=mysql_fetch_assoc($res)){
		//str_repeat($a,$num)函数表示重复次数，字符$a重复出现$num次
		$row['catename'] = str_repeat('&nbsp;&nbsp;',$spac).'|--'.$row['catename'];
		//递归实现无限级分类，调用自身
		$result[] = $row;
		getList($row['id'], $result, $spac);
	}
	return $result;
}

//设置下拉列表显示样式，默认查找pid=0即所有分类，默认选中id=0的选项
function displayCate($pid=0, $selectedId=0){
	$rs = getList($pid);
	$str="<select name='cate'>";
	foreach ($rs as $key => $val) {
		//设置默认选中项，选项id为传入id时，默认选中
		$selectedstr='';
		if ($val['id']==$selectedId) {
			$selectedstr = "selected";
		}

		$str.="<option {$selectedstr} id={$val['id']}>{$val['catename']}</option>";
	}	
	$str.="</select>";
	return $str;
}

echo displayCate(0,5);

/*
print_r($rs);
echo "<hr>";
foreach ($rs as $key => $val) {
	echo $val['catename']."<br/>";
}
*/

