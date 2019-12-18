<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>帮助说明</title>
		<base href="/public/" />
		<link rel="stylesheet" href="home/css/mui.min.css" />
		<link rel="stylesheet" href="home/css/common.css" />
		<script src="home/js/mui.min.js"></script>
	</head>
	<style>				
		.title {
			line-height: 30px;
		}		
		img{ max-width: 100%;}
    	video{ max-width: 100%;}
	</style>

	<body>
		<div class="mui-content whiteBackground p-15">
			<p class="c33 font22 title"><?php echo ($infos["baise_name"]); ?></p>

			<div class="content"><?php echo (htmlspecialchars_decode($infos["content"])); ?></div>
		</div>
	</body>

</html>