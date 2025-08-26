<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set("Asia/Kolkata");
session_start();
$con = mysqli_connect("localhost", "root", "", "voter");
$emailid=$_SESSION['EMAIL'];

$sql="select * from non_verify_voter where emailid='$emailid'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$voterid=$row['voterid'];
$success=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
  if (isset($success)) { ?>
    <script>
      Swal.fire({
                icon: 'success',
                title: 'Your voter-id is <?php echo $voterid; ?>', 
                text: 'Your Voter id has been mailed to <?php echo $emailid; ?> ',
                button: 'Ok',
            }).then(
            function()
            { window.location.href = "Voter_login.php";

              try {
                require 'includes/Exception.php';
              require 'includes/SMTP.php';
              require 'includes/PHPMailer.php';
      
      $mail = new PHPMailer(true);
      
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'charanvot@gmail.com';                     //SMTP username
        $mail->Password   = 'xsiunsxshaqjgmik';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('charanvot@gmail.com');     
        $mail->addAddress($emailid);               
        $mail->Subject = 'Voter-id Generation';
        $mail->Body    = 'Congratulations, Your voter-id has been generated, now you can vote as per your wish.The Voter-id is'. $voterid;
    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
            }
            )
    </script>
    <?php
  }
  ?>
</body>
</html>
