<meta charset="utf-8">
<?php
// 允许上传的图片后缀
error_reporting(0);
include 'config.php';
error_reporting(0);
$ip = $_COOKIE["ip"];
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2048000)   // 小于 2000 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：" . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"],"./upload/".iconv("UTF-8", "gbk",$_FILES["file"]["name"]));
        $date=date('Ymdhis');
		$fileName=$_FILES['file']['name'];
		$name=explode('.',$fileName);
		$i = count($name);
		$newPath=$date.'.'.$name[$i-1];
		$oldPath="./upload/".iconv("UTF-8", "gbk",$_FILES["file"]["name"]);
        rename($oldPath, "./upload/".$newPath);
  		
  		#存入数据库
  		$conn_get = mysql_connect($dbserver,$dbuser,$dbpwd);
		mysql_query('set names utf8',$conn_get);
		$sql_get = 'use '.$dbname;
  		mysql_query($sql_get);
  		$sql = "INSERT into imgurls(imgpath,ip,timef) VALUES ('$newPath','$ip',CURDATE())";
  		mysql_query($sql);
  		echo "<p align='center'>外链路径：<a style='color:red' target='_blank' href='http://".$_SERVER['SERVER_NAME']."/t/upload/".$newPath."'>"."http://".$_SERVER['SERVER_NAME']."/t/upload/".$newPath."</a></p>";
    }
}
else
{
    echo "非法的文件格式或文件过大";
}

?>
