
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
</head>
<style>
     * {
            padding: 0;
            margin: 0;
        }

        /* body {
            position: relative;
            background: url('../images/bg.jpg') no-repeat center center/cover;
        } */

        .navigate{

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
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

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
        .whole{
            margin-top: 150px;
        }
        .container{
            /* display: flex;
            justify-content: center; */
            /* align-items: center; */
      box-shadow: 1px 1px 5px grey;
      border-radius: 5px;
      background-color: rgb(247, 242, 239);
      gap: 10px;
      border: 1px solid grey;
      margin-top: 200px;
      width: 650px;
      height: 300px;
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
      margin-top: 10px;
      outline: none;
      border: 1px solid grey;
      font-size: 18px;
      border-radius: 4px;
      height: 40px;
      width: 450px;
      width: 100%;
    }
    .suv1>button{
      margin-top: 20px;
      height: 40px;
      width: 100%;
      border: none;
      border-radius: 15px;
      font-size: 20px;
      color: whitesmoke;
      background-color:  rgb(26, 105, 202);
      font-weight: 200;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .suv2>button{
      height: 40px;
      width: 100%;
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
    .subitem2{
      gap: 30px;
      /* display: flex;
      flex-direction: row; */
      margin: 20px 20px;
    }
    .subitem2>input{
      width: 200px;
    }
    .subitem2>button {
      margin-top: 25px;
        width: 100%;
      border: none;
      height: 50px;
      border-radius: 15px;
      font-size: 20px;
      color: whitesmoke;
      background-color: rgb(26, 105, 202);
      font-weight: 500;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .subitem2>button:hover {
      cursor: pointer;
      background-color: rgb(1, 41, 134);
    }
    .item>h3{
      color: rgb(11, 13, 80);
      margin-left: 180px;
      margin-top: 20px;
    }

</style>
<body>
<nav class="navigate">
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
  <!-- <div class="head6">
  <div class="item">
          <h3>E-mail verification</h3>
        </div>
        <div class="subitem2">
        <div class="suv3">
          <input type="text" name="emailid" placeholder="Enter E-mail id" />
        </div>
        <div class="suv2">
         <button name="submit">Send otp</button>
        </div>
        </div>
        <div class="subitem2">
        <div class="suv3">
          <input type="text" name="otp" placeholder="Enter OTP sent" />
        </div>
        <div class="suv2">
         <button name="verify">Verify email</button>
        </div>
        </div> -->
  <div class="whole">
    <div class="container">
  <div class="head6">
          <div class="item">
          <h3>E-mail verification</h3>
          </div>
        <!-- <div class="alert alert-danger" role="alert" id="email_error">
        </div> -->
        
        <div class="subitem2 firstbox">
        <div class="suv3 firstbox">
          <input type="text" name="emailid" id="emailid" placeholder="Enter the email-id" /><br>
          <span id="email_error" class="feilderror"></span>
        </div>
        <div class="suv1 firstbox">
         <button  type="submit" onclick="sendotp()" clas="btn"  id="submitButton">Send OTP</button>
         
        </div>
        </div>

        <div class="subitem2 secondbox">
          <div class="alert alert-success" role="alert">
        <h5>OTP is sent to your email,please verify it to get the Voter-id.</h5>
        </div>
        <div class="suv3  secondbox">
          <input type="text" name="otp" id="otp" placeholder="Enter OTP sent" />
          <span id="otp_error" class="feilderror"></span>
        </div>
        <div class="suv1 secondbox">
         <button  type="submit" onclick="submitotp()" class="btn">Verify email</button>
        </div>
        </div>

        <!-- <div class="subitem2">
       <button name="submit">Submit</button>
        </div> -->
      </div>
  </div>
  </div>
  <script>
function sendotp()
{
  var emailid=jQuery('#emailid').val();
  $.post("get_email.php",
  {
    emailid: emailid,
  },
  function(data,status){
    data =JSON.parse(data);
    data =data.name
    if(data==="yes"){
        jQuery('.firstbox').hide();
        jQuery('.secondbox').show();
    }
    else{
        jQuery('#email_error').html('please enter correct email-id');
        jQuery('.secondbox').hide();
    }
    
  });
}

function submitotp()
{
  var otp=jQuery('#otp').val();
  $.post("ver_otp.php",
  {
    otp: otp,
  },
  function(data,status){
    data =JSON.parse(data);
    data =data.name
    if(data==="yes")
    {
       window.location='otp_success.php';
    }
    else{
        jQuery('#otp_error').html('please enter correct OTP');
        jQuery('.secondbox').show();
    }
    
  });
}
  </script>
  <script>
        // JavaScript code to disable the button after one click
        document.getElementById("submitButton").addEventListener("click", function() {
            this.disabled = true; // Disable the button
        });
    </script>
<style>
  .secondbox{display:none;}
  .feilderror{color:red;}
</style>
</body>
</html>