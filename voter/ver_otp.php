<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "voter");
 $otp=$_POST['otp'];
 $emailid=$_SESSION['EMAIL'];
 $sql="select * from non_verify_voter where emailid='$emailid' and otp='$otp'";
 $res=mysqli_query($con,$sql);
 if($res)
 {
    $num=mysqli_num_rows($res);
    if($num>0)
    {  
        $no="yes";
        mysqli_query($con,"update non_verify_voter set everify='$no' where emailid='".$_SESSION['EMAIL']."'");
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
?>