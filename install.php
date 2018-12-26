<meta charset="utf-8">
<?php
error_reporting(0);
$file=fopen("install.lock","r");
include 'config.php';

if (!$file) {
	$conn = mysql_connect($dbserver,$dbuser,$dbpwd);
	if (!$conn) {
		echo "<h2 align='center'>数据库连接失败 请检查信息是否正确</h2>";
	}else{
		// $creatku = 'CREATE DATABASE '.$dbname; //创建库  可删
		$sql_useku = 'use '.$dbname;
		mysql_query($sql_useku);

		$sql_Table = "CREATE table imgurls (
		uid BIGINT primary key auto_increment,
		imgpath varchar(255),
		ip varchar(100),
		timef date
		);";
		if (mysql_query($sql_Table)) {
			echo "<h1 align='center'>安装成功</h1>";
			fopen("install.lock","w");
		}
	}
}else{
	echo "<h1 align='center'>已安装过 重复安装请删除install.lock文件</h1>";
}

?>
