<html>
<head>
<title>Asynchronous image file upload without AJAX</title>
<style>
body {
	background: url('background.gif');
}
iframe {
	height: auto;
	width: 400px;
}
iframe.hidden {
	visibility: hidden;
	width:0px;
	height:0px;
}

#main {
	overflow: hidden;
	margin: auto;
	width: 410px;
	height: 100%;
	border-style: solid;
	border-width: 1px;
	background-color: white;
}

#images {
	height: 400px;
	width: 250px;
	margin: 20px;
	background: #FFFFFF;
	background-image: url('https://www.benfund.com/images/elements/no-image.png');
	background-repeat: no-repeat;
	background-position: center center;
	border-width: 2px;
}

#images div {
	margin: 10px;
	width: auto;
	height: auto;
	height: 100% !important;
	background: #FFFFFF;
	text-align: center;
	overflow: hidden;
}

#images div:hover {
	border-color: #529EBD;
}

#images img.load {
	margin: 36px;
}
</style>		
</head>
	<body>
		<center>
		<div id="main">
		
			<div id="images"></div>
		<!-- http://javascript.internet.com/bgeffects/fader2.html -->
			<div id="imgupload" style="position: relative; top: -200; visibility: visible;">
				<input type="button" value="Upload your image" style="font-size: 20px; padding: 4px;" onclick="document.getElementById('iframe').style.visibility = 'visible';">
				<div id="iframe" style="visibility: hidden;">
				<iframe src="https://www.benfund.com/acct/functions/upload.php" frameborder="0"></iframe>
				</div>
			</div>
		</center>
	</body>
</html>