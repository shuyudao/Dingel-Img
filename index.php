<!-- '*':
  date:2019
  Copyright (c) 2019 by 术与道.
  All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dingel图床 - v0.8.2</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/mdui/0.4.2/css/mdui.min.css">
	<script src="https://cdn.bootcss.com/mdui/0.4.2/js/mdui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
	<script type="text/javascript" src="js.js"></script>
</head>
<body style="background-image: url(https://api.yum6.cn/bingimg/bingimg.php);">
	<img id="uping" src="http://img.lanrentuku.com/img/allimg/1212/5-121204193R5-50.gif" alt="">
	<div id="main" class="mdui-container-fluid">
		<div id="body" class="mdui-valign">
			<h1 class="mdui-center" id="title">Dingel图床</h1>
		</div>
		<div id="upload">
			<p id="iner" style="overflow: hidden;">选择图片</p>
			<form>
    			<input id="up" type="file" name="file">
    			<input id="upd" style="width: 100px;background:#fff;color: #656565;border:1px solid #fff;height: 36px;line-height: 36px;" id="btn" type="button" value="上传">
			</form>
		</div>
		<div id="path"></div>
		<div id="footer">
			<p>Copyright © Dingel图床 All Rights Reserved <a target="_blank" href="http://www.imwj.top">术与道</a></p>
		</div>
  	</div>
</body>
</html>
