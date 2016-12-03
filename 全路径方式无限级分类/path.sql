
CREATE TABLE IF NOT EXISTS `likecate`(
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`path` VARCHAR(200) NOT NULL,		# 全路径
	`catename` VARCHAR(30) NOT NULL,
	`cateorder` INT(10) NOT NULL DEFAULT 0,
	`createtime` INT(10) NOT NULL
)CHARSET=utf8;

INSERT INTO likecate(id,path,catename,cateorder,createtime) VALUES
(1,'','手机',0,0),
(2,'1','功能手机',0,0),
(3,'1,2','老人手机',0,0),
(4,'1,2','儿童手机',0,0),
(5,'1','智能手机',0,0),
(6,'1,5','Android手机',0,0),
(7,'1,5','IOS手机',0,0),
(8,'1,5','Winphone手机',0,0),
(9,'1,2,4','色盲手机',0,0),
(10,'1,2,3','大字手机',0,0);