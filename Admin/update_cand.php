 <?php

  $con=mysqli_connect("localhost","root","","admin");


    $id = $_GET['updateid'];
    $sq="select * from candidates where id='$id'";
    $result=mysqli_query($con,$sq);
    $row=mysqli_fetch_assoc($result);
    $electiontype=$row['electiontype'];
    $fullname=$row['fullname'];
    $party=$row['party'];
    $aadhar=$row['aadhar'];
    $states=$row['states'];
    $cities=$row['cities'];



  if(isset($_POST['submit'])) 
  {
      $electiontype=$_POST['electiontype'];
      $fullname=$_POST['fullname'];
      $party=$_POST['party'];
      $aadhar=$_POST['aadhar'];
      $states=$_POST['states'];
      $cities=$_POST['cities'];
      $image=$_FILES['image'];

      $filename=$image['name'];
      $filetemp=$image['tmp_name'];

      $upload_image='candidate_image/'.$filename;
      move_uploaded_file($filetemp,$upload_image);
      
      
      $sql="UPDATE  `candidates` SET electiontype='$electiontype',fullname='$fullname',party='$party',aadhar=$aadhar,states='$states',cities='$cities',image='$upload_image' WHERE id=$id";
      $res=mysqli_query($con,$sql);
      if($res)
      {
       $success=1;
      }
      else
      {
        $danger=1;
      }
    }
    
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>
    body{
        background-color:  ;
    }
    .container{
        width:70%;
        background-color: rgb(247, 242, 239);
        border: 1px solid black;
        margin-top: 60px;
    }
    .btn{
    margin-left: 175px;
      height: 40px;
      width: 70%;
      border: none;
      border-radius: 10px;
      font-size: 20px;
      color: whitesmoke;
      background-color: rgb(26, 105, 202);
      font-weight: 200;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .form-group>h2{
        color: rgb(11, 13, 80);
        margin: 15px 10px ;

        border-bottom: 1px solid black;
    }
</style>
<body>
<?php
  if (isset($success)) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Updated successfully',
      })
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
    <div class="container">
<div class="form-group">
      <form action="update_cand.php" method="post" enctype="multipart/form-data">
  <div class="form-group mt-4 mb-6">
    <h2 class="text-center">Update Candidate</h2>
  </div>
  <div class="form-group mt-3" >
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control"  name="fullname" value="<?php echo $fullname; ?>" >
  </div>
  <div class="form-group mt-3">
    <label for="exampleInputEmail1">Aadhar number</label>
    <input type="number" class="form-control" name="aadhar" value="<?php echo $aadhar; ?>">
  </div>
  <div class="form-group mt-3 mb-3">
  <label for="exampleInputEmail1">Select State</label>
  <select class="form-select mb-3" name="states">
  <option selected disabled value="x"><?php echo $states; ?></option>
</select>
  </div>
<label for="exampleInputEmail1">Select City</label>
<select class="form-select mb-1" name="cities" >
  <option selected disabled value=""><?php echo $cities; ?></option>
</select>
  <div class="input-group mt-3 mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Election type</label>
  </div>
    <select class="custom-select" id="inputGroupSelect01" name="electiontype" required>
    <option selected disabled value=""><?php echo $electiontype; ?></option>
    <option value="MLA">MLA</option>
    <option value="MP">MP</option>
  </select>
  </div>
  

  <div class="input-group mb-3 mt-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Choose Party</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" name="party" required>
    <option selected disabled value=""><?php echo $party; ?></option>
    <option value="BJP">BJP</option>
    <option value="INC">INC</option>
    <option value="JDA">JDS</option>
    <option value="BSP">BSP</option> 
    <option value="RJD">RJD</option>
  </select>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Profile</span>
  </div>
  <div class="">
    <input type="file" placeholder="Add profile" accept=".jpg,.png,.jpeg" name="image">
  </div>
</div>
  
  <button name="submit"  class="btn btn-primary btn-block mb-3">Update</button>
</form>
      </div>
      
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/gh/Venkatnvs/ContactsApp@deploy/static/statesjs/states_pin.v2.js"></script>
  <script>
    cityOpt = document.getElementsByClassName('form-select mb-1')[0]
    stateOpt = document.getElementsByClassName('form-select mb-3')[0]

    apitoken = "72c9f77e50218e583b6d71533414548239439071"
    statejs_start()
  </script>
</body>
</html>