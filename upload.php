<?php
// Upload directory
$target_dir = "upload/";

$request = 1;
if(isset($_POST['request'])){
	$request = $_POST['request'];
}

// Upload file
if($request == 1){
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	$msg = "";
	$file = $_FILES["file"];
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
		$file['path'] = $target_file;
		$file['timestamp'] = time();
	    $msg = "Successfully uploaded";
	}else{
	    $msg = "Error while uploading";
	}

	$file['msg'] = $msg;

	echo json_encode($file);
	exit;
}

