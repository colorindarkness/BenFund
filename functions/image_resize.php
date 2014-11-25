<?
// this function scales an image if it's bigger then the maxwidth or the maxheigth
function scale($img,$maxwidth,$maxheight) {
    $imginfo = getimagesize($img);
    $imgwidth = $imginfo[0];
    $imgheight = $imginfo[1];

	if ($imgwidth > $maxwidth) {
        $ration = $maxwidth/$imgwidth;
        $newwidth = round($imgwidth*$ration);
        $newheight = round($imgheight*$ration);
        if ($newheight > $maxheight) {
            $ration = $maxheight/$newheight;
            $newwidth = round($newwidth*$ration);
            $newheight = round($newheight*$ration);

			$dst_img = ImageCreateTrueColor($newwidth,$newheight); 
			$image = imagecreatefromjpeg($img);
			ImageCopyResampled($dst_img, $image, 0, 0, 0, 0, $newwidth, $newheight, $imgwidth, $imgheight); 
			ImageJpeg($dst_img, $img, 90); 
			ImageDestroy($dst_img); 
        } else {
			$dst_img = ImageCreateTrueColor($newwidth,$newheight); 
			$image = imagecreatefromjpeg($img);
			ImageCopyResampled($dst_img, $image, 0, 0, 0, 0, $newwidth, $newheight, $imgwidth, $imgheight); 
			ImageJpeg($dst_img, $img, 90); 
			ImageDestroy($dst_img); 
        }
    } else if ($imgheight > $maxheight) {
        $ration = $maxheight/$imgheight;
        $newwidth = round($imgwidth*$ration);
        $newheight = round($imgheight*$ration);
        if ($newwidth > $maxwidth) {
            $ration = $maxwidth/$newwidth;
            $newwidth = round($newwidth*$ration);
            $newheight = round($newheight*$ration);
            
			$dst_img = ImageCreateTrueColor($newwidth,$newheight); 
			$image = imagecreatefromjpeg($img);
			ImageCopyResampled($dst_img, $image, 0, 0, 0, 0, $newwidth, $newheight, $imgwidth, $imgheight); 
			ImageJpeg($dst_img, $img, 90); 
			ImageDestroy($dst_img); 
        } else {
			$dst_img = ImageCreateTrueColor($newwidth,$newheight); 
			$image = imagecreatefromjpeg($img);
			ImageCopyResampled($dst_img, $image, 0, 0, 0, 0, $newwidth, $newheight, $imgwidth, $imgheight); 
			ImageJpeg($dst_img, $img, 90); 
			ImageDestroy($dst_img); 
        }
    } else {
			$dst_img = ImageCreateTrueColor($newwidth,$newheight); 
			$image = imagecreatefromjpeg($img);
			ImageCopyResampled($dst_img, $image, 0, 0, 0, 0, $newwidth, $newheight, $imgwidth, $imgheight); 
			ImageJpeg($dst_img, $img, 90); 
			ImageDestroy($dst_img); 
    }
}
?> 