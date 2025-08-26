<?php
  session_start();
  if(!isset($_SESSION['voterid'])){
    header('location:Voter_login.php');
  }
?>
      <?php
      $con=mysqli_connect("localhost", "root", "", "voter");
      $sql="select * from non_verify_voter where voterid='".$_SESSION['voterid']."'";
      $result=mysqli_query($con,$sql);
      $arr=mysqli_fetch_array($result);
      $image=$arr['image'];
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<style>
    *{
            padding:0;
            margin:0;
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
        .nav_profile{
            font-size: 20px;
            width: 200px;
            height:35px;
            padding-left: 40px;  
        }
        .nav_profile>h3{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .container{
            margin-top: 80px;
        }
       
    
</style>
<body>
<nav class="navbar">
        <div class="titletop">
          <img src="../images/evote-logo.png" alt=""> 
        </div>
        
        <ul class="detail">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="V_candidates.php">Vote</a></li>
            <li><a href="logout.php">Logout</a></li>
            
        </ul>
        <div class="nav_profile">
            <h5>Welcome, <?php echo $arr['voterid']; ?></h5>
        </div>
       </nav>

       <section  style=" background-color:#cbd6e1 ;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <h4><li class="breadcrumb-item" aria-current="page">Voter information</li></h4>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
        <?php   echo' <img src="'.$image.'" alt="avatar"
              class="" style="width: 150px;">';?> 
            
            <h5 class="my-3"> <?php echo $arr['fullname']; ?></h5>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Voter-id</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['voterid']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['gender']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">DOB</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['dob']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['vote_stat']; ?></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['fullname']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email-id</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['emailid']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['mobile']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Aadhar number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['aadhar']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">State</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['state']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['city']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">pin</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['pin']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $arr['address']; ?></p>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</section>
       
    
</body>
</html>