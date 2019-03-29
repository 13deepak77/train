<?php
echo "Working: Sample output<br/>";
if(isset($_POST['name'])) {
	$name = $_POST['name'];
	echo "The name is: ".$name."<br/>";
}
else
	echo "Name is not passed!<br/>";
if(isset($_POST['email'])) {
	$email = $_POST['email'];
	echo "The email is: ".$email."<br/>";
}
else
	echo "Email is not passed!<br/>";
if(isset($_POST['phone'])) {
	$phone = $_POST['phone'];
	echo "The phone is: ".$phone."<br/>";
}
if(isset($_POST['date_of_start'])) {
	$date_of_start = $_POST['date_of_start'];
	echo "The date_of_start is: ".$date_of_start."<br/>";
}if(isset($_POST['date_of_end'])) {
	$date_of_end = $_POST['date_of_end'];
	echo "The date_of_end is: ".$date_of_end."<br/>";
}
if(isset($_POST['source'])) {
	$source = $_POST['source'];
	echo "The source is: ".$source."<br/>";
}if(isset($_POST['destination'])) {
	$destination = $_POST['destination'];
	echo "The destination is: ".$destination."<br/>";
}

if(isset($_POST['bus_number'])) {
	$bus_number = $_Post['bus_number'];
	echo "bus_number is: ".$bus_number."<br/>";
}
if(isset($_POST['pick_up_point'])) {
	$pick_up_point = $_POST['pick_up_point'];
	echo "pick up point is: ".$pick_up_point."<br/>";
}if(isset($_POST['fare'])) {
	$fare = $_POST['fare'];
	echo "fare is: ".$fare."<br/>";
}if(isset($_POST['payement_type'])) {
	$payement_type = $_POST['payement_type'];
	echo "payement_type is: ".$payement_type."<br/>";
}if(isset($_POST['gender'])) {
	$gender = $_POST['gender'];
	echo "The gender is: ".$gender."<br/>";
}if(isset($_POST['coupon'])) {
	$coupon = $_POST['coupon'];
	echo "The coupon is: ".$coupon."<br/>";
}
else

if(isset($_FILES["aadhar"]))
	upload();
else
	echo "File not passed!<br/>";
/*function red() {
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
//read();*/
function upload() {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["aadhar"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["aadhar"]["tmp_name"]);
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
	if ($_FILES["aadhar"]["size"] > 500000) {
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
		if (move_uploaded_file($_FILES["aadhar"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["aadhar"]["name"]). " has been uploaded.";
			echo "<br/><a href='".$target_file."'>get your file</a>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
?>