<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>404 - Not Found</title>
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	
	<style>
		body{ margin:0; padding:0; background:#eee; }
		div{ width: 450px; margin-top: 200px;}
	</style>
</head>
<body>
	<div class="center-block">
        <h1 style="font-size: 100px; color: #666;">建商网<small>404</small></h1>
		<h1>Sorry..页面没有找到！</h1>
		<p>
			<p style="color:red;font-size:30px;">服务器访问量过大 -_- </p>
			似乎你所寻找的网页已移动或丢失了。
			<p>或者也许你只是键入错误的一些东西。</p>
			请不要担心，这没事。如果该资源对你很重要，请与管理员联系。
		</p>
		<a href="{{ url($path) }}">
			<button class="btn btn-default">刷新页面</button>
		</a>
		<a href="{{ url('/') }}">
			<button class="btn btn-default">返回首页</button>
		</a>
	</div>
</body>
</html>