<?php
$con=mysqli_connect("localhost","root","","voter");
if(isset($_POST['submit']))
{
  $aadhar=$_POST['aadhar'];
  $states=$_POST['states'];
  $cities=$_POST['cities'];

  $sql="select * from aadhar_verify where aadhar='$aadhaeeeeer' and states='$states'";
  $res=mysqli_query($con,$sql);
  if($res)
  { $num=mysqli_num_rows($res);
    if($num>0)
    {
    echo "successfully";
  }
  else
  echo "not there";

  }
  
}

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
<body>
<form action="random.php" method="post" enctype="multipart/form-data">
  <!-- <div class="form-group" >
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control"  name="fullname" required>
  </div>
  <div class="form-group mt-3">
    <label for="exampleInputEmail1">Election type</label>
    <input type="text" class="form-control" name="electiontype" required>
  </div> -->
  <div class="form-group mt-3 mb-3">
    <label for="exampleInputEmail1">Aadhar number</label>
    <input type="number" class="form-control" name="aadhar" required>
  </div>
  <label for="exampleInputEmail1">Select State</label>
  <select class="form-select mb-3" name="states">
  <option selected disabled value="">Select State</option>
</select>
<label for="exampleInputEmail1">Select City</label>
<select class="form-select mb-1" name="cities" >
  <option selected disabled value="">Select State</option>
</select>
<button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
<script src="https://cdn.jsdelivr.net/gh/Venkatnvs/ContactsApp@deploy/static/statesjs/states_pin.v2.js"></script>
  <script>
    cityOpt = document.getElementsByClassName('form-select mb-1')[0]
    stateOpt = document.getElementsByClassName('form-select mb-3')[0]

    apitoken = "72c9f77e50218e583b6d71533414548239439071"
    statejs_start()
  </script>
</body>
</html>





<td>
        <button type="button" name="submit" class="btn btn-success" id="random1"><a href="voter mn.php?approveid='.$voterid.'" class="text-light" style="text-decoration: none">Approve</a></button>
        <button type="button" name="submit" class="btn btn-danger" id="random1"><a href="voter mn.php?rejectid='.$voterid.'" class="text-light" style="text-decoration: none">Reject</a></button>
        <button type="button" name="submit" class="btn btn-primary" id=""><a href="voter mn.php?deleteid='.$voterid.'" class="text-light" style="text-decoration: none">Edit</a></button>
        </td>









        $sql1="select * from non_verify_voter where voterid='$voterid' and status='rejected'";
            $result1=mysqli_query($con,$sql1);
            if($result1)
            {
                $num1=mysqli_num_rows($result1);
                if($num1>0)
                {
                    $reject=1;
                }
                else
                {
                   $sql2="select * from non_verify_voter where voterid='$voterid' and everify='yes'";
                   $result2=mysqli_query($con,$sql2);
                   if($result2)
                   {
                    $num2=mysqli_num_rows($result2);
                    if($num2>0)
                    {
                        $process=1;
                    }
                    else
                    {
                        $error=1;
                    }
                   }
                  
                }
            }