<?php
  session_start();
  if(!isset($_SESSION['voterid'])){
    header('location:Voter_login.php');
  }
?>
<?php
$conn=mysqli_connect("localhost", "root", "", "voter");
$con=mysqli_connect("localhost", "root", "", "admin");
if(isset($_GET['candid']))
{
  $candid=$_GET['candid'];
 $voterid= $_SESSION['voterid'];
 $sql1="select * from voting where voterid='$voterid'";
 $res=mysqli_query($con,$sql1);
 if($res)
 {
  $num=mysqli_num_rows($res);
  if($num>0)
  {
    $exist=1;
  }
  else
  { $sql2="update non_verify_voter set vote_stat='Voted' where voterid='$voterid'";
    $resu=mysqli_query($conn,$sql2);
    
    $sql="insert into voting (voterid,cand_id) values('$voterid','$candid')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      $success=1;
    }
    else
    {
      $fail=1;
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<style>
    *{
            padding:0;
            margin:0;
        }
        body{
        position: relative;
        background:url('../images/bg.jpg') no-repeat center center/cover;
       }
        .navigate{
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
        .table1>th{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: whitesmoke;
        background-color:#00308F;
        font-size: 20px;
        padding: 10px 10px;
  }
  .whole{
    /* background-color: #cbd6e1; */
    background-color: rgb(247, 242, 239); 
    padding: 30px 45px;
    margin:150px 80px;
   }
   #random {
            width: 90px;
            height: 40px;
        }
</style>
<body>
<?php
  if (isset($voted)) { ?>
    <script>
      Swal.fire({
  title: 'Are you sure,think wisely?',
  text: "You won't be able to vote again",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes,Vote'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Congratulations!',
      'You have voted successfully.',
      'success'
    )
  }
})
    </script>
    <?php
  }
  ?>
  <?php
    if (isset($success)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Successfully Voted',
                text: 'You have successfully Voted',
                button: 'Ok',
            }).then(
            function() {
                    window.location.href = "Voter_home.php";
                }
            )
        </script>
        <?php
    }
    ?>
    <?php
    if (isset($fail)) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Successfully logged in!!',
                text: 'Your Voter-id is approved and you are successfully logged in.',
                button: 'Ok',
            }).then(
            function() {
                    window.location.href = "Voter_home.php";
                }
            )
        </script>
        <?php
    }
    ?>
       <?php
    if (isset($exist)) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Already voted',
                text: 'Sorry you have already voted',
                button: 'Ok',
            }).then(
            function() {
                    window.location.href = "Voter_home.php";
                }
            )
        </script>
        <?php
    }
    ?>
<nav class="navigate">
        <div class="titletop">
          <img src="../images/evote-logo.png" alt=""> 
        </div>
        
        <ul class="detail">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="Voter_home.php">profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            
        </ul>
        <div class="nav_profile">
            <!-- <h5>Welcome, <?php echo $arr['voterid']; ?></h5> -->
        </div>
       </nav>
       <div class="whole">
       <table class="table table-striped mt-4">
  <thead>
    <tr class="table1">
      <th scope="col">Id</th>
      <th scope="col">photo</th>
      <th scope="col">Election type</th>
      <th scope="col">Full name</th>
      <th scope="col">Party</th>
      <th scope="col">States</th>
      <th scope="col">Cities</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $con=mysqli_connect("localhost", "root", "", "voter");
      $sql="select * from non_verify_voter where voterid='".$_SESSION['voterid']."'";
      $result=mysqli_query($con,$sql);
      $arr=mysqli_fetch_array($result);
      $state=$arr['state'];
      $city=$arr['city']; 
      ?>
<?php
$con=mysqli_connect("localhost","root","","admin");
$sql="select * from candidates where states='$state' and cities='$city'";
// $sql="select * from candidates";
$result=mysqli_query($con,$sql);
 if($result)
{
  while($row=mysqli_fetch_assoc($result)){
    $electiontype=$row['electiontype'];
    $fullname=$row['fullname'];
    $party=$row['party'];
    $id=$row['id'];
    $image=$row['image'];
    $states=$row['states'];
    $cities=$row['cities'];

      
    echo'<tr>
    <td>'.$id.'</td>
    <td><img src="../Admin/'.$image.'" alt="avatar"
    class="" style="width: 150px;height:150px;"></td>
    <td>'.$electiontype.'</td>
    <td>'.$fullname.'</td>
    <td>'.$party.'</td>
    <td>'.$states.'</td>
    <td>'.$cities.'</td>
    <td>
        <button type="button" class="btn btn-primary" id="random"><a href="V_candidates.php?candid='.$id.'" class="text-light" style="text-decoration: none">Vote</a></button>
    </td>
  </tr>';
  }
}
?>

  </tbody>
</table>

</div>
</body>
</html>


