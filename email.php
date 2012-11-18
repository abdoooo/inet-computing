<?php 

function email_invoice($content,$email){
	
 
//$Name=$_POST['sndname'];
//$Mail=$_POST['sendmail'];
//$Subject=$_POST['subject'];
//$Sendbody=$_POST['sendbody'];
 
$mail= new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465;  
$mail->CharSet = "utf-8"; 
 
$mail->Username = "compproject320@gmail.com";
$mail->Password = "ewq321ewq321";
 
$mail->From = $Mail;
$mail->FromName = "compproject320"; 
 
$mail->Subject ="compproject320";  
$mail->Body = $content; 
 
$mail->IsHTML(true); 
$mail->AddAddress($email); 
//$mail->AddAddress("lawtikshun999@yahoo.com.hk"); 
 
if(!$mail->Send()) {
	echo "Fail!!!";
} else {
	echo "Successful";
}

}

?>