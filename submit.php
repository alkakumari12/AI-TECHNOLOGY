<?php
$msg="";
if(isset($_POST['name']) && isset($_POST['country_code']) && isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['message'])){
	$name= ($_POST['name']);
	$country_code=($_POST['country_code']);
	$mobile=($_POST['contact']);
	$email=($_POST['email']);
	$message=($_POST['message']);

	// mysqli_query($con,"insert into contact_us(name,email,mobile,comment) values('$name','$email','$mobile','$comment')");
	$msg="Message has been successfully sent!";
	$mobile_no = "+" . $country_code . " " . $mobile;
	
	$html = "<table><tr><td>Name: </td><td>$name</td></tr><tr><td>Contact No:</td><td>$country_code - $mobile</td></tr><tr><td>Email: </td><td>$email</td></tr><tr><td>Message: </td><td>$message</td></tr></table>";
	
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tsl";
	$mail->SMTPAuth=true;
	$mail->Username="roshanipss03@gmail.com";
	$mail->Password="inlx hddo fuzk hzin";
	$mail->SetFrom("roshanipss03@gmail.com");
	$mail->addAddress("roshanipss03@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo $msg;
	}else{
		echo "Please Try again!";
	}
}
?>