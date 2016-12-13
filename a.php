<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<?php 
	//无限级分类实验…………联动菜单
try {
	$dsn = "mysql:host=localhost;dbname=imooc";
	$username="root";
	$passwd="root";
	$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn,$username,$passwd,$options);

	$pdo->query("set names utf8");
	$sql = "select * from deepcate where pid=?";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array(0));

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// print_r($data);
?>
	<select name="type" size="1" id="type">
		<option>请选择：</option>
<?php 
	foreach ($data as $k => $v) {
?>
		<option value="<?php echo $v['id'] ?>"><?php echo $v['catename'] ?></option>
<?php			
	}
 ?>
	</select>
	标签：
	<select name="lable" size="1" id="lables"></select>

<?php
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>

<script type="text/javascript">
	$('#type').click(function(){
		$(this).change(function(){
			var obj={};
			var value=$(this).val();
			var id =$(this).attr('id');

			// alert(value);			

			obj[id]=value;
			console.log(obj);

			var data=obj;
			
			var url="http://unlimit.com/b.php";

			$.post(url,data,function(result){
				$("#lables").empty();
				var count=result.length;
				var i=0;
				var b="";
				for (var i = 0; i < count; i++) {
					b += "<option value='"+result[i].id+"'>"+result[i].catename+"</option>";
				};
				$("#lables").append(b);
			},"json");

		});
	});
</script>
	
</body>
</html>

