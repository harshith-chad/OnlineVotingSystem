
<?php
$con=mysqli_connect("sql105.infinityfree.com", "if0_35058882", "vtN2fyxRPPLG", "if0_35058882_vote");
$sel="SELECT * FROM `non_verify_voter` ORDER BY voterid DESC LIMIT 1";
$res=mysqli_query($con,$sel);
if($res)
{
  $fetch=mysqli_fetch_assoc($res);
  $lastvoterid=$fetch['voterid'];

  if($lastvoterid==null)
  {
    $newvoterid="VID1800000";
  }
  else
  {
     $newvoterid=str_replace("VID18","",$lastvoterid);
     $newvoterid=str_pad($newvoterid+1,5,0,STR_PAD_LEFT);
     $newvoterid="VID18".$newvoterid;
  }
}
?>
<?php
$con=mysqli_connect("sql105.infinityfree.com", "if0_35058882", "vtN2fyxRPPLG", "if0_35058882_vote");
if (isset($_POST['submit'])) 
{
  $voterid = $_POST['voterid'];
  $fullname = $_POST['fullname'];
  $mobile = $_POST['number'];
  $emailid = $_POST['emailid'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $pin = $_POST['pin'];
  $aadhar = $_POST['aadhar'];
  $password= $_POST['password'];
  $confirmpassword=$_POST['confirmpassword'];
  $image=$_FILES['image'];

$imagefilename=$image['name'];
$imagefiletemp=$image['tmp_name'];

$otp=rand(100000,999999);
if(!($confirmpassword===$password))
{
  $errorpass=1;
}
else
{
  $qur="select * from non_verify_voter where emailid='$emailid'";
  if($result1=mysqli_query($con,$qur))
  {
    $exis=mysqli_num_rows($result1);
    if($exis>0)
    {
      $danger = 1;
    }
    else
    {
      $sql = "select * from `non_verify_voter` where aadhar='$aadhar'";
      $result = mysqli_query($con, $sql);
      if ($result) 
      {
        $num = mysqli_num_rows($result);
        if ($num > 0) 
        {
          $danger = 1;
        } else
        { 
         $sal="select * from aadhar_verify where aadhar='$aadhar' and cities='$city'";
          $ver=mysqli_query($con,$sal);
          if($ver)
          {
            $tot=mysqli_num_rows($ver);
            if($tot>0)
            {
              
          $upload_image='voter_img/'.$imagefilename;
          move_uploaded_file($imagefiletemp,$upload_image);
          $statuss="no";
          $sql = "insert into non_verify_voter(voterid,fullname,mobile,dob,gender,address,state,city,pin,aadhar,password,image,emailid,vote_stat,everify)  values('$voterid','$fullname','$mobile','$dob','$gender','$address','$state','$city','$pin','$aadhar',md5('".$password."'),'$upload_image','$emailid','Not Voted','no')";
          $won = mysqli_query($con, $sql);
          if ($won) 
          {
            $message=1;
          }
        }
        else
        {
          $nonver=1;
        }
      }
      }
    }
    }  
  }
  
}
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>Document</title>
  <script>
    function pass_check()
     {
        var password = document.getElementById('password').value;
        var confirmpassword = document.getElementById('confirmpassword').value;
        var message = document.getElementById('message');

        if (password === confirmpassword) {
                message.innerHTML = "";
                confirmpassword.style.border = "1px solid green"; // Reset border
            } else {
                message.innerHTML = "*Passwords do not match";
                message.style.color = "red";
            }
    }

    function age_check()
    {
      var dob=new Date(document.getElementById('dob').value);
      var today=new Date();
      var age=today.getFullYear()-dob.getFullYear();
      var message1 = document.getElementById('message1');

      if(age>=18)
      {
        message1.innerHTML = "";
      }
      else{
        message1.innerHTML = "*Invalid age(below 18)";
        message1.style.color = "red";
      }
    }
</script>

  <style>
    * {
      padding: 0;
      margin: 0;
    }

    body {
      position: relative;
      background: url('../images/bg.jpg') no-repeat center center/cover;
    }

    .navbar {
      padding-right: 50px;
      display: flex;
      flex-direction: row;
      height: 100px;
      width: 100%;
      align-items: center;
      gap: 220px;
      background-color: rgb(247, 242, 239);
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9999;
    }

    .titletop>img {
      cursor: pointer;
      position: relative;
      width: 185px;
      padding-left: 100px;
    }

    .detail {
      display: flex;
      flex-direction: row;
      gap: 80px;
    }

    .detail>li {
      list-style: none;
    }

    .detail>li>a {
      text-decoration: none;

      font-size: 20px;
      color: rgb(11, 13, 80);
      font-weight: bold;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
    }

    .searchbox input {
      font-size: 20px;
      border-radius: 6px;
      width: 200px;
      height: 35px;
      padding-left: 40px;
      border-color: rgb(87, 87, 106);
    }

    .searchbox>img {
      position: absolute;
      height: 25px;
      padding: 6px 6px;
    }

    .container {
      box-shadow: 1px 1px 5px grey;
      border-radius: 5px;
      background-color: rgb(247, 242, 239);
      gap: 10px;
      border: 1px solid grey;
      margin: 180px 300px;
    }

    .head1 {
      margin: 35px 40px;
      text-align: center;
      border-bottom: 1px solid grey;
      padding-bottom: 20px;
    }

    .head1>h2 {
      color: rgb(11, 13, 80);
      font-size: 50px;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
    }

    .profile {
      margin-left: 360px;
      display: flex;
      flex-direction: column;
    }

    .profile>img {
      height: auto;
      width: 150px;
    }

    .profile>h3 {

      margin-left: 15px;
      margin-top: 5px;
      color: rgb(11, 13, 80);

    }

    .subitem {

      font-size: 18px;
      gap: 200px;
      display: flex;
    }

    .suv>input:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }

    .suv>select:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }

    .suv>input,
    select {
      outline: none;
      border: 1px solid grey;
      font-size: 18px;
      border-radius: 4px;
      height: 40px;
      width: 200px;
    }
    .suv3>input:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }
    .suv3>select:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }
    .suv3>input{
      outline: none;
      border: 1px solid grey;
      font-size: 18px;
      border-radius: 4px;
      height: 40px;
      width: 600px;
    }

    .class {
      display: flex;
      flex-direction: column;
    }

    .item,
    .item1,
    .item2,
    .item3 {
      display: flex;
      flex-direction: column;
    }

    .head3,
    .head4,
    .head5,.head6 {
      border-top: 1px solid grey;
    }

    .head1,
    .head2,
    .head3,
    .head4,
    .head5,.head6 {

      margin: 10px 20px;
    }

    .item>span {
      color: rgb(11, 13, 80);
      font-size: 18px;
    }

    .item {
      margin: 20px 20px;
    }

    .item>input:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }

    .item>input {
      padding-left: 10px;
      font-size: 20px;
      border: 1px solid grey;
      height: 40px;
      border-radius: 4px;
      font-size: 15px;
      outline: none;
      border-color: rgb(164, 163, 163);
    }

    .item,
    .item1,
    .item2>h3 {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: 25px;
      color: rgb(3, 3, 72);
    }

    .item1 {

      margin: 20px 20px;
    }

    .item2 {
      margin: 20px 20px;
    }

    .item3 {
      margin: 20px 20px;
    }

    .itemq {
      margin: 0px 20pxpx;
    }

    .subitem1 {

      margin: 10px 30px;
      display: flex;
      flex-direction: column;
    }

    .itemm {
      gap: 60px;

      display: flex;
      flex-direction: row;
    }

    .subitem1>span {

      color: rgb(11, 13, 80);
      font-size: 18px;
    }

    .subitem1>input {

      border: 1px solid grey;
      height: 40px;
      border-radius: 4px;
      font-size: 15px;
      outline: none;
      border-color: rgb(164, 163, 163);
    }

    .subitem1>select:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }

    .subitem1>input:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }

    .itemq {
      margin: 20px 20px;
    }

    .itemq,
    .item3 {
      font-size: 19px;

    }

    .itemq>input:focus {
      box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
      border: 2px solid #e8f0fe;
    }

    .item3>button {
      border: none;
      height: 50px;
      border-radius: 15px;
      font-size: 20px;
      color: whitesmoke;
      background-color: rgb(26, 105, 202);
      font-weight: 500;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .item3>button:hover {
      cursor: pointer;
      background-color: rgb(1, 41, 134);
    }

    .profile>p {
      margin-left: 11px;
      color: red;
      font-size: 13px;
    }
    #unvid{
      background-color: lightgrey;
      color:green;
      font-weight: 500;
    }
    .subitem2{
      gap: 30px;
      display: flex;
      flex-direction: row;
      margin: 20px 20px;
    }
    .subitem2>input{
      width: 200px;
    }
    .suv1>button{
      height: 40px;
      width: 180px;
      border: none;
      border-radius: 15px;
      font-size: 20px;
      color: whitesmoke;
      background-color: rgb(26, 105, 202);
      font-weight: 200;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .suv2>button{
      height: 40px;
      width: 180px;
      border: none;
      border-radius: 15px;
      font-size: 20px;
      color: whitesmoke;
      background-color: #49bc52;
      font-weight: 200;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .suv2>button:hover {
      cursor: pointer;
      background-color: #2d8634;
    }
    .suv1>button:hover {
      cursor: pointer;
      background-color: rgb(1, 41, 134);
    }
    #message{
      font
    }

  </style>

</head>

<body>
<?php
    if (isset($message)) { ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Email Verification!!',
                text: 'Please verify your email to generate your voter-id',
                button: 'Ok',
            }).then(
            function() {
                    window.location.href = "email_verify.php";
                }
            )
        </script>
        <?php
    }
    ?>  
  <?php
  if (isset($danger)) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Sorry!!',
        text: 'User already exists',
      })
    </script>
    <?php
  }
  ?>
   <?php
  if (isset($nonver)) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Invalid aadhar details',
        text: 'Entered state and city does not match with your aadhar details ',
      })
    </script>
    <?php
  }
  ?>
  <?php
  if (isset($errorpass)) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Password Mismatch',
        text: 'please confirm correct password',
      })
    </script>
    <?php
  }
  ?>
  <nav class="navbar">
    <div class="titletop">
      <img src="../images/evote-logo.png" alt="" />
    </div>

    <ul class="detail">
      <li><a href="../Home/home.php">Home</a></li>
      <li><a href="">About</a></li>
      <li><a href="../voter/Voter_home.php">Voter</a></li>
      <li><a href="">Contact us</a></li>
    </ul>
    <div class="searchbox">
      <img
        src="data:image/png;base64,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"
        alt="" />
      <input type="text" name="search" placeholder="Search here" />
    </div>
  </nav>
  <div class="container">
    <form action="register.php" method="post" class="class" enctype="multipart/form-data">
      <div class="firstbox">
      <div class="head1">
        <h2>Register</h2>
      </div>
      <div class="head2">
        <div class="profile">
          <img src="https://img.freepik.com/free-icon/user_318-159711.jpg?w=2000" alt="" />
          <input type="file" placeholder="Add profile" accept=".jpg,.png,.jpeg" name="image">
          <p>(* in jpg/png below 100kb)</p>
        </div>
        <div class="san">
          <div class="item">
            <h3>Basic Information</h3>   
          </div>
        </div>
        <div class="item" >
          <span>Voter-id</span>
          <input type="text" id="unvid" name="voterid" value="<?php echo $newvoterid;?>" readonly/>
        </div>
        <div class="item">
          <span>Full Name</span>
          <input type="text" name="fullname" placeholder="Enter full name" />
        </div>

        <div class="item">
          <span>Mobile Number</span>
          <input type="number" name="number" placeholder="Enter Mobile Number"/>
        </div>
        <div class="item">
          <div class="subitem">
            <div class="suv">
              <span>Date of Birth</span>
              <input type="date" name="dob" id="dob" oninput="age_check()"/>
              <p id="message1"></p>
            </div>
            <div class="suv">
              <span>Gender</span>
              <select name="gender" id="" required>
                <option selected hidden=>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="head3">
        <div class="item1">
          <h3>Address</h3>
        </div>
        <div class="item">
          <span>Line 1</span>
          <input type="text" name="address" placeholder="Enter Full address"/>
        </div>
        <div class="itemm">
          <div class="subitem1">
            <span>State</span>
            <select class="All_states" name="state">
              <option selected hidden=>Select State</option>
            </select>
          </div>
          <div class="subitem1">
            <span>City</span>
            <select class="All_cities" name="city" >
              <option selected>Select State</option>
            </select>
          </div>
          <div class="subitem1">
            <span>Pincode</span>
            <input type="number" name="pin" placeholder="Enter 5 digit pincode"/>
          </div>
        </div>
      </div>
      <div class="head4">
        <div class="item">
          <h3>Personal information</h3>
        </div>
        <div class="item">
          <span>Aadhar</span>
          <input type="number" name="aadhar" placeholder="12-digit Aadhar number" />
        </div>
        <div class="item">
          <span>Password</span>
          <input type="password" name="password" id="password" placeholder="Enter password" />
        </div>
        <div class="item">
          <span>Confirm Password</span>
          <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Re-enter Password" onkeyup="pass_check()"/>
        </div>
        <div>
        <p id="message"></p>
        </div>
        <div class="item">
          <span>Enter Email-id</span>
          <input type="text" id="emailid" name="emailid" placeholder="Enter E-mail id" />
        </div>
      </div>

      <div class="head5">
        <div class="itemq">
          <input type="checkbox" name="cond" id=""  />Terms and Conditions
        </div>
        <div class="item3">
          <button  name="submit" onclick="fun()">Register</button>
        </div>
        <div class="item3">
          <p>
            Already have an account?<a style="text-decoration: none;" href="../voter/Voter_home.php">Login</a>
          </p>
        </div>
      </div>
      </div>
         
  </div>
  </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/gh/Venkatnvs/ContactsApp@deploy/static/statesjs/states_pin.v2.js"></script>
  <script>
    cityOpt = document.getElementsByClassName('All_cities')[0]
    stateOpt = document.getElementsByClassName('All_states')[0]

    apitoken = "72c9f77e50218e583b6d71533414548239439071"
    statejs_start()
  </script>


</body>

</html>