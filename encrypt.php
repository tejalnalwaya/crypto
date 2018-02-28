<?php
$receiver=$_POST['sendto'];
$filename=$_FILES['file']['name'];
//echo $filename;

$r=$_POST['R'];
$g=$_POST['G'];
$b=$_POST['B'];

$ascii1=$_POST['ascii1'];
$ascii2=$_POST['ascii2'];
$ascii3=$_POST['ascii3'];

$ascii=array("$ascii1","$ascii2","$ascii3");	//ascii numbers array
//print_r($ascii)."<br/>";

$rgb=array("$r","$g","$b");		// RGB numbers array
//print_r($rgb);

$arm=array("153","370","371","407","1634");
$rarm=array();
	for($i=0;$i<3;$i++){
		$rarm[$i]=$arm[array_rand($arm)];}			//Randomly armstrong numbers
//print_r($rarm);
if(!is_dir("Proposals/")) {
    mkdir("Proposals/");
}
$file1=$_FILES["file"]["tmp_name"];
$target = basename($_FILES['file']['name']);

// Move the uploaded file
move_uploaded_file($file1,"Proposals/".$target);

// Output location
//echo "Stored in: " . "Proposals/".$_FILES["file"]["name"];
//Algorithm Starts From here........

//Part 1 start......

for($i=0;$i<3;$i++){
$rgbascii[$i]=$rgb[$i]+$ascii[$i];			//STEP1:adding array rgb and ascii
}
//print_r($rgbascii)."<br/>";
//echo implode($rgbascii)."<br/>";



$rgbasciirev=array_reverse($rgbascii);
//print_r($rgbasciirev)."<br/>";
//echo implode($rgbasciirev)."<br/>";						//STEP2:reverse array $rgbascii



for($i=0;$i<3;$i++){
$rgbasciirevarm[$i]=$rgbasciirev[$i]+$rarm[$i];			//STEP3:adding array rgbasciirev and rarm;
}
//print_r($rgbasciirevarm)."<br/>";



for($i=0;$i<3;$i++){
$rgbasciirevarm31[$i]=$rgbasciirevarm[$i]*31;				//STEP4:Multiplying array rgbasciirevarm5 with 31;
}
//print_r($rgbasciirevarm31)."<br/>";



//Part 2 start......


for($i=0;$i<3;$i++){
$rgbarm[$i]=$rgb[$i]+$rarm[$i];			//STEP5:adding array rgb and arm;
}
//print_r($rgbarm)."<br/>";



for($i=0;$i<3;$i++){
$rgbarmrev1[$i]=$rgbasciirevarm31[$i]+$rgbarm[$i];			//STEP7:adding array rgbasciirevarm31 and rgbarm Array;
}
//print_r($rgbarmrev1)."<br/>";




for($i=0;$i<3;$i++){
$privatekey[$i]=$rgbarmrev1[$i]*10;			//STEP8:Multiplying array rgbarmrev1 with 10;
}
//print_r($privatekey)."<br/>";
//echo implode($privatekey);


for($i=0;$i<3;$i++){
$publickey[$i]=$privatekey[$i]+$ascii[$i];			//STEP9: Adding privatekey with ascii to get public key
}
$public=implode($publickey);


$path_parts = pathinfo($filename);
//echo $path_parts['extension'], "\n";
$fileurl=$_FILES['file']['tmp_name'];
//echo $fileurl;
$enc_file_name=implode($publickey).".".$path_parts['extension'];
//echo $enc_file_name;

// Create connection
$conn = mysqli_connect("localhost","root","","share");

// Check connection
if ($conn) {
$sql= "INSERT into `encryption_detaills`(`receiver`, `rgb_code`, `file_name`, `file_ascii`, `rand_arms`, `enc_file _name`, `file_url`,`publickey`) VALUES ('$receiver','$rgb[0],$rgb[1],$rgb[2]','$filename','$ascii[0],$ascii[1],$ascii[2]','$rarm[0],$rarm[1],$rarm[2]','$enc_file_name','$fileurl','$public')";
mysqli_query($conn,$sql);
$key="Insert into `file_logs` (`pbkey`,`prkey`) VALUES ('$publickey[0],$publickey[1],$publickey[2]','$privatekey[0],$privatekey[1],$privatekey[2]')";
mysqli_query($conn,$key);
}
else{die("Connection failed: " . mysqli_connect_error());}


echo "Your public key is:- (".$publickey[0].",".$publickey[1].",".$publickey[2].")<br/>"."Please note it down for future reference";
?>