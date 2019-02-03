<meta charset="utf-8">
<?php
// 允许上传的图片后缀
// error_reporting(0);
include 'config.php';
error_reporting(0);
date_default_timezone_set('PRC');
$ip = 'null';
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 10048000)   // 小于 2000 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：" . $_FILES["file"]["error"] . "<br>";
    }
    else
    {

    $path = "upload/".date('Y').'/'.date('m').'/'.date('d').'/';
    if (!is_dir($path)) {
      mkdir ($path,0777,true);
    }
    $date=date('Ymdhis');
		$fileName=$_FILES['file']['name'];
		$name=explode('.',$fileName);
		$i = count($name);
		$newPath=$date.'.'.$name[$i-1];

      move_uploaded_file($_FILES["file"]["tmp_name"],$path.$newPath);
  		#存入数据库
  		$conn_get = mysql_connect($dbserver,$dbuser,$dbpwd);
  		mysql_query('set names utf8',$conn_get);
  		$sql_get = 'use '.$dbname;
  		mysql_query($sql_get);
  		$sql = "INSERT into imgurls(imgpath,ip,timef) VALUES ('$newPath','$ip',CURDATE())";
  		mysql_query($sql);
      $link = $path.$newPath;
  		echo "<p align='center'>外链路径：<a id='link' style='color:red' target='_blank' href='$link'>".$_SERVER['SERVER_NAME'].'/'.$link."</a></p>";
    }
}
else
{
    echo "非法的文件格式或文件过大";
}

?>
