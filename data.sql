
CREATE TABLE IF NOT EXISTS `deepcate`(
	`id` INT(10) UNSIGNED NOT NULL PRIMARY KEY,
	`pid` INT(11) UNSIGNED NOT NULL,
	`catename` VARCHAR(30) NOT NULL,
	`cateorder` INT(11) UNSIGNED NOT NULL DEFAULT 0,
	`createtime` INT(10) UNSIGNED NOT NULL
)CHARSET=utf8;

INSERT INTO deepcate(id,pid,catename,cateorder,createtime) VALUES
(1,0,'新闻',0,0),
(2,0,'图片',0,0),
(3,1,'国内新闻',0,0),
(4,1,'国际新闻',0,0),
(5,3,'北京新闻',0,0),
(6,4,'美国新闻',0,0),
(7,2,'美女图片',0,0),
(8,2,'风景图片',0,0),
(9,7,'日韩明星',0,0),
(10,9,'日本AV',0,0);