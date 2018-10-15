<?php 

session_start();

if (isset($_POST['submit'])) {
	$file=$_FILES['file'];	
	//print_r($file);
	//$fileName = $_FILES['file']['name'];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$_SESSION['imgname']=$fileName;

	echo "$fileName <br>";
	echo "$fileTmpName <br>";
	echo "$fileSize <br>";
	echo "$fileError <br>";
	echo "$fileType <br>";

	$fileExt = explode('.',$fileName);
	$fileActualExt= strtolower(end($fileExt));

	$allowed=array('jpg','jpeg','png', 'pdf');

	if (in_array($fileActualExt,$allowed)) {
		if ($fileError === 0) {
			if ($fileSize<5000000) {
				//$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);
				$_SESSION['upload']='success';
				header("Location: index.php");
			}
			else{
				echo "Your file is too big";
			}
		}
		else{
			echo "There was an error uploading your file";
		}
	}
	else{
		echo "You cannot upload files of this type";
	}
	
}

?>