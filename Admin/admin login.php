<?php

$con=mysqli_connect("localhost","root","","admin");
if(isset($_POST['submit']))
{
    $admin=$_POST['admin'];
    $password=$_POST['password'];

    $sql="select * from `admin_login` where admin='$admin' and password='$password'";

    $result=mysqli_query($con,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num>0)
        {
           
           session_start();
           $_SESSION['admin']=$admin;
           $success=1;
        }
        else
        {
           $error=1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
           *{
            padding:0;
            margin:0;
        }
       body{
        position: relative;
        background:url('../images/bg.jpg') no-repeat center center/cover;
       }
        .navbar{
            
            padding-right: 50px;
            display: flex;
            flex-direction: row;
            height:100px;
            width: 100%;
            align-items: center;
            gap:220px;
            background-color: rgb(247, 242, 239);  
            position: fixed;
            top:0;
            left: 0;
            z-index: 9999;
        }
        

        
        .titletop>img{
            cursor: pointer;
            position:relative;
            width: 185px;
            padding-left: 100px; 

        }

        .detail{
            display:flex;
            flex-direction: row;
            gap:80px;
        }
        .detail>li{
            list-style: none;
        }

        .detail>li>a{
            
            text-decoration: none;
           
            font-size: 20px;
            color: rgb(11, 13, 80);
            font-weight:bold;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        }
        .searchbox input{
            font-size: 20px;
            border-radius: 6px;
            width: 200px;
            height:35px;
            padding-left: 40px;
            border-color: rgb(87, 87, 106);
        }
        .searchbox>img{
            position: absolute;
            height:25px;
            padding:6px 6px;
        }
        .hpimg{
            /* height: 800px; */
            /* width: auto; */
            /* background:url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGRhcmslMjBibHVlJTIwJTIwYmFja2dyb3VuZHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60') no-repeat center center/cover; */
            position:relative;
        }
        .icon{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            padding:10px;
            color: white;
            background: rgb(2, 2, 94);
        }
        .container{
            
            background-color: rgb(247, 242, 239);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            margin: 200px 100px;
            padding: 20px 0px;
            width: 500px;
            margin-left: 500px;
            box-shadow: 1px 2px 3px;
        }
        .title{
            padding-bottom: 20px;
        }
        .title>h2{
            color: rgb(11, 13, 80);
            text-align: center;
            font-size: 50px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 500;
        }
        .item2>input:focus {
            box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
            border: 2px solid #e8f0fe;
        }

        .item1>input:focus {
            box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
            border: 2px solid #e8f0fe;
        }

        .item1>input,
        .item2>input {
            border-radius: 4px;
            border: 1px solid grey;
            outline: none;
            background-color: #ffffff;
            padding-left: 5px;
            height: 35px;
            width: 300px;
            /* margin: 15px; */
            font-size: 18px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .item1,.item2{
            margin-bottom: 15px;

        }
        .item1{
            
            padding-top: 50px;
            border-top: 1px solid black;
        }
        .item2>img{
            position: absolute;
            height: auto;
            width: 36px;
            padding-top: 16.5px;
            padding-left: 16px;

        }
        .item1>img{
            padding-top: 16px;
            padding-left: 18px;
            position:absolute;
            height: 36px;
            width:auto;
        }
        .btn>button{
            border: none;
            cursor: pointer;
            height: 38px;
            width: 150px;
            border-radius: 10px;
            font-size: 20px;
            background-color: rgb(26, 105, 202);
            color: white;
            font-weight: 500;
            

        }
        button:hover{
            background-color: rgb(1, 41, 134);
        }
        .btn{
            margin-top: 25px;
            padding-left: 110px;
        }
        .new{
            padding-left: 100px;
            margin-top: 25px;
        }
        .new>p,a{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
        }
    </style>
</head>
<body>
<?php
if(isset($success))
{ ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Welcome Admin',
        text: 'You are successfully logged in' ,
        button:'Ok',}).then(function(){window.location="admin home.php";});
    </script>
<?php
}
?>

<?php
if(isset($error))
{?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Ohh sorry!',
        text:'You are not admin',}).then(function(){window.location="admin login.php";});
        
    </script>
<?php
}
?>
    <nav class="navbar">
        <div class="titletop">
          <img src="../images/evote-logo.png" alt=""> 
        </div>
        
        <ul class="detail">
            <li><a href="../Home/home.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Admin</a></li>
            <li><a href="">Contact us</a></li>
        </ul>
        <div class="searchbox">
            <img src="data:image/png;base64,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" alt="">
        <input type="text" name="search"  placeholder="Search here">
        </div>
       </nav>
      
      <div class="container">
        <form action="admin login.php" method="post" class="login">
            <div class="title">
                <h2>Login</h2>
            </div>
            <div class="items">
               
                <div class="item1">
                    <i class="fa fa-user icon"></i>
                    <!-- <img src="data:image/png;base64,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" alt="" srcset=""> -->
                <input type="text" name="admin" id="vid" placeholder="Enter Admin id" required>
            </div>
            <div class="item2">
                <i class="fa fa-key icon"></i>
                <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjZ5pv9BGgczYd67MwxOBKPIOlj4AsOelLsQ&usqp=CAU" alt="" srcset=""> -->
                <input type="text" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="btn">
                <button name="submit">Login</button>
            </div>
            <div class="new">
            <!-- <p>New User?<a style="text-decoration: none" href="../voter/register.html"> Register here</a><p> -->
            </div>
            </div>
            
        </form>
      </div>
</body>
</html>