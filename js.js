window.onload = function () {
	var ip = returnCitySN["cip"];
	var ips = document.getElementById('ip');
	ips.value = ip;

	function setCookie(name,value)
	{
		var Days = 30;
		var exp = new Date();
		exp.setTime(exp.getTime() + Days*24*60*60*1000);
		document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	}
	setCookie("ip",ip);

	var upd = document.getElementById('upd');
	var uping = document.getElementById('uping');
	var up = document.getElementById('up');
	var iner = document.getElementById('iner');
	var pp = document.getElementById('path');
	var timer;
	upd.onclick = function(){

		if (up.value=='') {
			alert("请先选择图片");
			return false;
		}else{
			uping.style.display = 'block';

			var file = document.getElementById('up').files[0];//获取文件
   			var form = new FormData();//新建FormData对象
			form.append('file',file);//添加文件到FormData

			var xhr = new XMLHttpRequest(); //新建XHR对象
			xhr.open('POST','upload.php?time='+new Date().getTime(),true);//请求
			xhr.send(form);//发送文件
			xhr.onreadystatechange = function(){ //监控响应
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 304)) {//请求成功
					//处理对象
        			pp.innerHTML = xhr.responseText;
        			pp.style.display = "block";
        			uping.style.display = 'none';
      			}
			}
			setTimeout(function(){
			iner.innerHTML = "选择图片";
			up.value='';
			},2000);
		}
	}
	up.onmouseout = function(){
		testPath();
	}
	console.log("Dingel v-0.8.2 by 术与道 http://imwj.top");
	function testPath(){
		timer = setInterval(function(){
			if (up.value!='') {
				var index = up.value.lastIndexOf("\\");
				var str = up.value.substring(index+1);
				if (str.indexOf('.png')!=-1||str.indexOf('.jpg')!=-1||str.indexOf('.jpeg')!=-1||str.indexOf('.gif')!=-1) {
					iner.innerHTML = "<marquee>"+str+"</marquee>";
					clearTimeout(timer);
				}else{
					alert("你选择的不是图片");
					clearTimeout(timer);
					iner.innerHTML = "选择图片";
					up.value='';
				}
			}else{
				iner.innerHTML = "选择图片";
				clearTimeout(timer);
			}
		},600)
	}

}
