<?php 
/*
	//方案一
	function deeploop(&$i=1)
	{
		echo $i;
		$i++;
		if ($i<10) {
			deeploop($i);
		}
	}
*/

/*	
	//方案二
	$i=1;
	function deeploop()
	{
		global $i;
		echo $i;
		$i++;
		if ($i<10) {
			deeploop($i);
		}
	}
*/
	function deeploop()
	{
		static $i=1;		//静态变量使用过后资源不释放
		echo $i;
		$i++;
		if ($i<10) {
			deeploop($i);
		}
	}	

	deeploop();

//用循环实现
	echo "<br/>";
	for ($i=1; $i < 10; $i++) { 
		echo $i;
	}	

