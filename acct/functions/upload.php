<?php
session_start();
$ftmp = $_FILES['image']['tmp_name'];
$oname = $mid.'.jpg';
$fname = 'upload/'.$mid.'.jpg';

$imago = 'upload/'.$mid.'.jpg';

if (file_exists($imago)) {
    echo "The file $imago exists";
} else {
    echo "The file $imago does not exist";
}

if(move_uploaded_file($ftmp, $fname)){
	?>
<html>
	<head>
		<script>				
				var par = window.parent.document;
				var images = par.getElementById('images');
				var imgdiv = images.getElementsByTagName('div')[<?=(int)$_POST['imgnum']?>];
				var image = imgdiv.getElementsByTagName('img')[0];
				imgdiv.removeChild(image);
				var image_new = par.createElement('img');
				image_new.src = 'https://www.benfund.com/acct/functions/resize.php?pic=<?=$oname?>';
				image_new.className = 'loaded';
				imgdiv.appendChild(image_new);
		</script>
	</head>
</html>
<?php
		exit();
		}
?>
<html>
	<head>
		<script language="javascript">
			function upload(){
				// hide old iframe
				var par = window.parent.document;
				var num = par.getElementsByTagName('iframe').length - 1;
				var iframe = par.getElementsByTagName('iframe')[num];
				iframe.className = 'hidden';
				window.parent.document.getElementById('imgupload').style.visibility = 'hidden';
				
				// create new iframe
				//var new_iframe = par.createElement('iframe');
				//new_iframe.src = 'upload.php';
				//new_iframe.frameBorder = '0';
				//par.getElementById('iframe').appendChild(new_iframe);
				
				var main = par.getElementById('main');
				var track_div = par.createElement('div');
				var handle_div = par.createElement('div');
				track_div.id = 'resizeTrack';
				handle_div.id = 'resizeTrack';
				main.appendChild(track_div);
				var tracker = par.getElementById('resizeTrack');
				tracker.appendChild(handle_div);
				
				// add image progress
				var images = par.getElementById('images');
				var new_div = par.createElement('div');
				var new_img = par.createElement('img');
				new_img.src = 'https://www.benfund.com/images/elements/loading.gif';
				new_img.className = 'load';
				new_div.id = 'resizeImage';
				new_div.appendChild(new_img);
				images.appendChild(new_div);
				
				// send
				var imgnum = images.getElementsByTagName('div').length - 1;
				document.iform.imgnum.value = imgnum;
				setTimeout(document.iform.submit(),5000);
			}
		</script>
		<link type="text/css" rel="stylesheet" href="https://www.benfund.com/acct/resize/css/screen.css" media="screen, projection" />
<script src="https://www.benfund.com/includes/js/prototype.js" type="text/javascript"></script>
<script src="https://www.benfund.com/includes/js/slider.js" type="text/javascript"></script>
<script src="https://www.benfund.com/includes/js/init_resize.js" type="text/javascript"></script>
	</head>
	<body>
			<form name="iform" action="" method="post" enctype="multipart/form-data">
			<div style="text-align: center;">
			<input id="file" type="file" name="image" onchange="upload()" style="font-size: 18px;"/>
			<input type="hidden" name="imgnum" />
			<br>
			<div style="border: 1px dashed #C0C0C0; background-color: #F5F5F5; padding: 2px; text-align: center;"
			<span style="font-size: 10px; text-align: left;"><b>Image must be in jpeg format and be a maximum of 1mb (one megabyte).</b><br>
			Images are subject to approval.<br>
			Images may not contain nudity, sexually explicit content, violent, offensive material, or be protected by copyright. Do not upload images of other people without their permission.<br>
			Image approval can take as long as two business days.<br>
			When the image has been approved, you will recieve an email informing you of approval and the image will appear above.</span>
			</div>
	</body>
</html>