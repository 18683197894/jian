<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	*{
		padding:0;
		margin:0;
	}
		.con{
			display: flex;
  			flex-wrap:wrap;
  			width:200px;
  			align-content:space-between;
  			height:200px;
		}
		.hei{
			width:200px;
			height:100px;
			border-radius: 8px;
			background-color: #000;
			border:1px solid #ccc;
			flex-basis: 100%;
  			display: flex;
  			justify-content: space-between;
		}
		
		.hei span{
			width:60px;height:60px;
			border-radius: 999px;
			background-color: #fff;
		}
	</style>
</head>
<body>
<div class="con">
	<div class="hei">
		<span class="item1"></span>
		<span class="item2"></span>
	</div>
	<div class="hei">
		<span class="item1"></span>
		<span class="item2"></span>
	</div>
</div>
</body>
</html>