<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set("Asia/Kolkata");

 $con = mysqli_connect("localhost", "root", "", "voter");
 $emailid=$_POST['emailid'];

 $sql="select * from non_verify_voter where emailid='$emailid' and everify='no'";
 $res=mysqli_query($con,$sql);
 if($res)
 {
    $num=mysqli_num_rows($res);
    if($num>0)
    {  
        $no="no";
        $otp=rand(111111,999999);
        $_SESSION['EMAIL']=$emailid;
        sendotp($emailid,$otp);
        mysqli_query($con,"update non_verify_voter set otp='$otp' , everify='$no' where emailid='$emailid'");
        $myobj = new stdClass();
        $myobj->name="yes";
        $myJSON = json_encode($myobj);
        echo $myJSON;
    }
    else
    {
        $myobj = new stdClass();
        $myobj->name="no";
        $myJSON = json_encode($myobj);
        echo $myJSON;
    }
 }
    function sendotp($emailid,$otp)
    {
      require 'includes/Exception.php';
      require 'includes/SMTP.php';
      require 'includes/PHPMailer.php';
      
      $mail = new PHPMailer(true);
      
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('');     
        $mail->addAddress($emailid);               
        $mail->Subject = 'Voter-id verification';
        $mail->Body    = 'your voter-id verification code is '. $otp;
        $mail->send();
    }
?>
