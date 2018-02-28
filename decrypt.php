<?php
	$userpubk1=$_POST['pk1'];
	$userpubk2=$_POST['pk2'];
	$userpubk3=$_POST['pk3'];
	$publickey1=array($userpubk1,$userpubk2,$userpubk3);
	//print_r($publickey);
	$publickey=implode($publickey1);
	//echo $publickey;
	$conn = mysqli_connect("localhost","root","","share");
	if ($conn) {
			$data="select * from file_logs";
			$res=mysqli_query($conn,$data)or die(mysqli_error($conn)); ;
		while($row=mysqli_fetch_array($res) ){
			if($publickey==str_replace(',', '', $row['pbkey'])){
				//echo str_replace(',', '', $row['pbkey']);
				$f1=$row['fno'];
				//echo $f1;
				//$data="select * from encryption_detaills";
				//$c=1;
				$data1="select * from encryption_detaills where fno=$f1";
				$res1=mysqli_query($conn,$data1);
				$row1=mysqli_fetch_array($res1);
				//echo $row1['rgb_code'];
				$rgb=explode(',',$row1['rgb_code']);
				//echo $rgbs[1];
				$ascii=explode(',',$row1['file_ascii']);
				$arm=explode(',',$row1['rand_arms']);
					for($i=0;$i<3;$i++){
						$rgbarm[$i]=$rgb[$i]+$arm[$i];			//rgbarm created for step 4
					}
					//print_r($rgbarm);	
	
						//Public key value from user(step1)
	
	
	
	
					for($i=0;$i<3;$i++){
						$privatekey[$i]=$publickey1[$i]-$ascii[$i];			//Getting Private key by  subtracting Ascii value from 		publickey.(step2)
					}
					//print_r($privatekey);
	
	
	
	
	
	
					for($i=0;$i<3;$i++){
						$rgbarmrev1[$i]=$privatekey[$i]/10;			//Dividing privatekey with 10 to get rgbarmrev1.(step3)
					}
					//print_r($rgbarmrev1);
	
	
					for($i=0;$i<3;$i++){
						$rgbasciirevarm31[$i]=$rgbarmrev1[$i]-$rgbarm[$i];			//subtracting rgbarmrev1 from rgbarm to get rgbasciirevarm31.(step4)
					}
					//print_r($rgbasciirevarm31);
	
	
					for($i=0;$i<3;$i++){
						$rgbasciirevarm[$i]=$rgbasciirevarm31[$i]/31;			//Dividing rgbasciirevarm31 with 31 to get rgbasciirevarm.(step5)
					}
					//print_r($rgbasciirevarm);
	
					for($i=0;$i<3;$i++){
						$rgbasciirev[$i]=$rgbasciirevarm[$i]-$arm[$i];			//subtracting rgbasciirevarm from arm to get rgbasciirev.(step6)
					}
					//print_r($rgbasciirev);
	
					$rgbascii=array_reverse($rgbasciirev);			//reverse the array to get rgbascii.
					//print_r($rgbascii);
	
					for($i=0;$i<3;$i++){
						$getrgb[$i]=$rgbascii[$i]-$ascii[$i];
						if($getrgb[$i]==$rgb[$i]){
						$c=1;
						}
					}
	//print_r($getrgb);
	
					echo "<a href='down.php?nama=".$row1['file_name']."'>download</a> ";
					

			}
		}
	}
	else{die("Connection failed: " . mysqli_connect_error());}
	
?>