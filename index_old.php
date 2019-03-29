<?php
echo "Working: Sample output<br/>";
if(isset($_POST['kwd'])) {
	$kwd = $_POST['kwd'];
	echo "The keyword is: ".$kwd."<br/>";
}
else
	echo "Data is not passed!<br/>";
if(isset($_FILES["fileToUpload"]))
	upload();
else
	echo "File not passed!<br/>";
function red() {
	header('Location: redirect.html');
}
//red();
function phpconfig() {
	phpinfo();
}
//phpconfig();
function loop() {
	$arr = array(1,2,3,4,5);
	foreach($arr as $val)
		echo "Value is: ".$val."<br/>";
}
//loop();
function splt() {
	$str = "hey hi how are you";
	$arr = explode(" ",$str);
	foreach($arr as $val)
		echo "String is: ".$val."<br/>";
}
//splt();
function write() {
	$myfile = fopen("sample.txt", "w") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $txt);
	$txt = "Jane Doe\n";
	fwrite($myfile, $txt);
	fclose($myfile);
}
//write();
function read() {
	$myfile = fopen("sample.txt", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("sample.txt"));
	fclose($myfile);
}
//read();
function upload() {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			echo "<br/><a href='".$target_file."'>get your file</a>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
?>