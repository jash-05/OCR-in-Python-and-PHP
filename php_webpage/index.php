<!DOCTYPE html>
<html>
<head>
	<title>SpiceTech India task</title>
</head>
<body>

<h1><b>SpiceTech India task:</b></h1><br>
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<button type="submit" name="submit">UPLOAD</button>
</form>
<?php 

session_start();

if (isset($_SESSION['upload'])) {
	$img=$_SESSION['imgname'];
	//echo "$img";
	echo "Original image";
	echo "<img src='uploads/$img'>";
	$im = imagecreatefrompng('uploads/'.$img);
	
	// $img_tc=imagecreatetruecolor('200', '150');
	// imagecopy($img_tc, $im, 0, 0, 20, 20, 200, 150);
	// imagepng($img_tc,'cropped/'.$img_tc);
	// imagedestroy($img_tc);
	// echo "<img src='cropped/$img_tc'>";
	$size = min(imagesx($im), imagesy($im));
	$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
	echo "<br>Cropped image<br>";
	if ($im2 !== FALSE) {
		imagepng($im2, 'cropped/'.$img);
    	echo "<img src='cropped/$img'>";
      	imagedestroy($im2);
	}
	imagedestroy($im);
	session_unset();
}

 ?>
</body>
</html>