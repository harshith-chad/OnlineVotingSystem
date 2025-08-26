<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:admin login.php');
}
?>
<?php
  $con=mysqli_connect("localhost","root","","admin");
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
      
      $sql="select * from candidates where aadhar='$aadhar'";
      $result=mysqli_query($con,$sql);
      if($result)
      {
        $num=mysqli_num_rows($result);
        if($num>0)
        {
          $danger=1;
        }
        else{
          
         
          $upload_image='candidate_image/'.$filename;
          move_uploaded_file($filetemp,$upload_image);
        
          
          $sql="Insert into candidates(electiontype,fullname,party,aadhar,states,cities,image) values('$electiontype','$fullname','$party','$aadhar','$states','$cities','$upload_image')";
          
          $won=mysqli_query($con,$sql); 
          if($won)
        {
          
        $success=1;
        }
    }
        }
        
      }   

      if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $qul="delete from `candidates` where id=$id";
    $results=mysqli_query($con,$qul);
    if($results)
    {
      $well=1; 
    }
    else
    {
      echo'error';
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
    <style>
                *{
                  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding:0;
            margin:0;
        }
        body{
        position: relative;
        background:url('../images/bg.jpg') no-repeat center center/cover;
       }
       
        .navigate{
          /* position: relative; */
            padding-right: 50px;
            display: flex;
            flex-direction: row;
            height:100px;
            width: 100%;
            align-items: center;
            gap:150px;
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
            padding-left: 50px; 

        }

        .detail{
            padding-left: 50px;
            display:flex;
            flex-direction: row;
            gap:110px;
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
        .searchbox{
          margin-left: 1050px;
          
        }
        .searchbox input{
           outline: none;
            font-size: 20px;
            border-radius: 6px;
            width: 200px;
            height:35px;
            padding-left: 40px;
            border-color:  #d3d3d3;
        }
        .searchbox>img{
            position: absolute;
            height:32px;
            padding:6px 6px;
        }

        .searchbox>input:focus {
            box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
            border: 2px solid #e8f0fe;
        }

   .whole{
    background-color: rgb(247, 242, 239); 
    padding: 30px 45px;
    margin:150px 80px;
   }
   .modal{
    z-index: 10000;
    margin-top: 100px;
   }
   .modal-dialog{
    width: 100%;
    max-width: 60%;
   }
  #random{
    width: 90px;
    height: 40px;
  }
  #random1{
    width: 90px;
    height: 40px;
  }
  .table1>th{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color: whitesmoke;
    background-color:#00308F;
    font-size: 20px;
    padding: 10px 10px;
  }
  #exampleModalLabel{
    text-align: center;
  }
    </style>
</head>
<body>
<?php
  if (isset($success)) { ?>
    <script>
      Swal.fire({
                icon: 'success',
                title: 'Well done!',
                text: 'Election candidate is successfully added',
                button: 'Ok',
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
        text: 'Candidate already exists',
      })
    </script>
    <?php
  }
  ?>
  <?php
if(isset($well))
{ ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Successfull',
        text: 'Candidate has been successfullly deleted'}) 
        // button:'Ok',}).then(function(){window.location="candidate.php";});
    </script>
<?php
}
?> 
  

<nav class="navigate">
       <div class="titletop">
          <img src="../images/evote-logo.png" alt=""> 
        </div>
        
        <ul class="detail">
            <li><a href="../Admin/admin home.php">Home</a></li>
            <li><a href="voter mn.php">Voters</a></li>
            <li><a href="">Results</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
</nav>
        <div class="whole">
        <button type="button" class="btn btn-warning mt-3 " data-toggle="modal" data-target="#exampleModal" data-keyboard="false" data-backdrop="static">
        Add candidate
        </button>
        <div class="searchbox">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOMAAADeCAMAAAD4tEcNAAAAYFBMVEX///+AgIB0dHR9fX15eXl3d3dzc3P4+Pj7+/uNjY3y8vKcnJyHh4eioqK0tLT19fXLy8vi4uLY2Ni8vLzr6+upqamTk5PBwcHs7OzR0dGtra2/v7/c3NzHx8eenp7k5OSbNGvAAAAKeUlEQVR4nO1d22KrKhDdckk0GmO8pdqY/P9fHpM0rYOoCIPiaddL+9AqS4aZxQDDv3/ION3T5DMubmFZBkFZhrcizpr0fsB+zzo4XS9FQAhnjD7gPfH8lTHOSXTM0k0zzZujRx7kvGG0XAm7Xe5rt1UH+6pgnI2x6xJtu/SWbKs/D01JVPn98CRR9rF2yxXhJ/MJftGkJLqc1m7/NM6FJsHv3gzTtTmMI4m4AcEvmty7+GsTGYKfMZMu7IDx2kmT9WPOUAg+QUnhnpvNzI20x9KtvmwYYh/+sIzX5vWDq2eB4QOMJmtze+EUkukuadXpQ54+hSt7/Hj8HBV5L/AgX5tfiwsZbWnLjhMvrC/VNT98hwT/lJ+rJr5FLedxpnS3usEeghEzfejtoE7uY9Eur+KSjApb5p0XoyPDZTfYOMp2QXZVe8z9Mir/drVdFmPYl0Od2BrosdrPelhas8Hww6K1xPp16NMzctPSnNdiyGgpWcfBZjt5c3jUzOvBLqpgwIXxI2LTVRFK7ZSSUHEMDiEv5CxptLTsOXiyhrT6C2Hg7GPpwKRs2YTIWdYKPB3tx9K+3FU4j1dCJRmKlNwQZwr7WsaSZHhvmMBFQpFFyJH6o+T9t/ClImXW16eUN/jvSSUqjy3jXuP+9+WhfrQYQ93/miy08ibhvT2KlFvzBee++16AZL8XWWkzcB3777NNMuu9cmfZ1yU9e7U8JhvxhZQbypppfPTslRUWX9eLizRaInvWm95we7ZzFymy0tq7AApxhFibhpx6n9OmzQD0QvLOUm4gEsYFXzDTkogmxK0481CguKB4bJEKJGlk4SWZYKnk08JLRtAjiR9BzsIrLLq2AYgk0SWyv+JYfKMSHA9BTmQJg9FqFB7EBYYQ5CHZCE9fKC6KqKFPYJizyQO0Eis+TQmCORFEIVnCR/P1lj9F7Yr2YMFSd9Zl+DBEi8Ky1j2kyBaPGl0IznWHlI88AvtYy9+8UcDW4LiGM/xydoTiDMAByVCUAJTi9nI3qhBmeAxhL08CYhJdIi02gRi2CMHtCGHDTpJxHqC17owj2Sf4aDjWbwroIcwnICBurCdwIKCn3xlqczhrJOvuPvjGCbUj4fC+4TTRHPDTm3XkBT7LnW168NsbzfQo3qNw0cAxZKBLKtiNayucLuDXN5DQQfdJLnWjOIqY9nPuwH2ZumhkQI7aCrMG3eiAiusiA43TngyB+M8diY1vwBipm6ODHscRifMDIHZ0vQ5IELmhVLu4wvSE1jP20BjcO3IBKOoNJTBxtLC6YAzodbQS99BUHTwg9AGVucYTfPAEjt5CBACJwjUydJXrpirM33U8KxAA+jrCJvKuZ6XB/AcA0eugV30AeFYyO9UEBvTaeeMh1GZuMTG19SWQgkbOjh4g5e6aVn0DyJT5AxKauo0GYiAyaeV+C8NRGJBzre1qZulLAXiNudMGkEpwMzo+ACPkzGQMdDkunEGUw8TpQClop30YMHE6YP7pXArgByAZMG8vBkiWuCnIXwBzSDZrM8YdjGVn3aowO2Kzdu6m+v+6LM6gM2ZJThh3HMwBvHEAHGctm2emM+ylALIV89Lctb67WhhAj80KkEACODpBfsEDmPOf4UYkgCBWZokAsNFRf+FrAZTaHIOuAehkLhfDTXtUARnosJQTxNystNUfR5egL8o3yvE39OMsn7Mdvxr+xccR3H6BzvkNejXezLxDf3luo/PHWXtPN5MH+NDPA2wnn6O/hPgb8nIbza/OW7j6BXlyg9C6LEzWO37DulXzC9Yfz79gHfk37Acw2zGxGMxauYn9OSez/Tmb2GdVmXmNwxYGpOF+OdM9hYvAdG/m5vavatha6v4+ZLhpXqdmkfv7yUHk0BKcoevGmsPiDDqPgNHDsRNlDyCc7xDO6bjnWWH9Cb3EGjTWC3ILjYFx3ko4N4dXjgcJIJevrcQAR/sFOufhAEqTEN08t9PnWEEqX19sQudM3Mp4gNFoENrAwpdbWgfWSjFYIk3Bx3KozIN4rNxk7gccq0sdCbvRKHgLJSPcqRCAWQrJuUJPLwCnajqIYMkIzNqDJjjgFkKCWseRlY8Qsxt7tT+cUK1X2I3mtVKESpku1JcBLcIoeVPBql0OZOiAxMRZqAjgPG31hXOhNiPKDilYRUdf4WMBWirSNxcqZWqcUcfE0UprfKEK8aordYlQ7xZrMiQ8l6y4X0fIxSF+b6Ee8opD0hOA9+STULp7tdyO8LGxKgU/UblRn7yw6hlu8AMudM2UgMxqnXlR0uGWeFeEeJkPw04wiffMLH8pQv+CJA/b9wmF2BcnKbnHj6L35JGuSbJ32cwT6JP23n06C47Jy8A909hXQu57d2ktVlc3HrxKe4c8a8/FN7FymSMDx5GLprEvbr/27inzFkhH+mN3aePfstX338T6Ivp96up27IsE+2OfWPY8jfwaZmBNyFPa/uWILLA4DfFDya2sfZIR7kp+nyQl1uqWpmMX0nebQHG/s+TKWV5a6Ur/OBgyeiSRL4iWxGNq42a2SrETX0CWPDJdxTxkWZUHKiOxA2TJc5XZEC8RFfLhOHD//FhP4kqeXBazKDkiKYKT9CbvaZK4kuckCvQvljeEoX/QY+jhpyf6Fxe/WJaGmcnzTZehZ0HyyAUIZV6mHUn2TcTlDEcla+ftyJJnUEi2nZnoTEjSGxmgQnklHRySv0SWPP8GhRZlJExm9ea+OvLBePiQi6cpaf5+NbLkaechgy9uaUZxqrT+6V+zgAwHfPq6Lnyv2pPY56dP5Vikbnl6RXMeIbq/J3XU8htpPovecTdQdEboWZ5kwEn88GSElUWWpOf88DVW/NPHPU2yoqRk2EC//r1753uo6HmwszwP5Tz5fSltqXLOyRfaX1nbedP9Iqj9saQHIIkun89zpaUqmCd2SKz4JguJ0YQqfuA5oFzSG0NJSBE2VmQuDJklJbE0xkry5XKSNtbWPjFZtgyHYrl00iN7hJWNC403a1Y7DMayEZ10V02ARFY2TFWlgaB+N41HE/tRDsqSx072N6+ZSWe2quE4fWhWVfLYKxlThSPCbIKgqphXljzW9qD4GjQfBBt1Oa0seWzufUtrT5knZZwW1bxJUaGoBmxkDDs4VK3e5qOC+6HxWt2eaDiH4fU6CPvLpP45qZ/S+6lPu2gFbCvW6+aqO6kdSET0sNAmFD+/Vpe4OIZl0KIMb0X8maS54ZR9VcmzFNQlj8vl4yaQq0oez4U94ppYW/IsgvUlzxJQlTw7h8vkTcIJyWMbypLH0fIxSnBH8liEwuaPJ9bZd4uEP8nTwZ/kcR0H70/y/IBvmKR4/GO4Kzc8JlUljzuHx3WgKHlcOTyuBzXJ48JxXAOoSZ7VT6qaQUnyzK1j6hrOCuaKcOB+XahInm0PyH9KkseRihUG8Cclz/Y5tpJnQg1s3lYfuI2S3LzPeWFU8mw9drwhOcDwDYdKOplhWPKsXawCEYOSh285nyzgLB+TG5fkAuSSh7lXaNUEJ4nkIVte3pGhd0IU+2iWE4h3na6kpPx/GeoX8uPuubmEUkaCTWc5xrCv4jAIyrpzVuE/zmdw/fDzUrwAAAAASUVORK5CYII=" alt="">
        <input type="text" name="search"  placeholder="Search here">
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Candidate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="candidate.php" method="post" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control"  name="fullname" required>
  </div>
  <div class="form-group mt-3">
    <label for="exampleInputEmail1">Election type</label>
    <input type="text" class="form-control" name="electiontype" required>
  </div>
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

  <div class="input-group mb-3 mt-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Choose Party</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" name="party" required>
    <option selected disabled value="">Choose...</option>
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
    <!-- <input type="file" class="custom-file-input"  accept=".jpg,.png,.jpeg," required name="image"> -->
    <input type="file" placeholder="Add profile" accept=".jpg,.png,.jpeg" name="image">
  </div>
</div>
  
  <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </div>
</div>

<table class="table  mt-4">
  <thead>
    <tr class="table1">
      <th scope="col">Id</th>
      <th scope="col">Photo</th>
      <th scope="col">Election type</th>
      <th scope="col">Full name</th>
      <th scope="col">Party</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql="select * from candidates";
$result=mysqli_query($con,$sql);
 if($result)
{
  while($row=mysqli_fetch_assoc($result)){
    $electiontype=$row['electiontype'];
    $fullname=$row['fullname'];
    $party=$row['party'];
    $id=$row['id'];
    $aadhar=$row['aadhar'];
    $states=$row['states'];
    $cities=$row['cities'];
    $image=$row['image'];

    echo'<tr>
    
    <td>'.$id.'</td>
    <td><img src="'.$image.'" alt="avatar"
    class="" style="width: 100px;height:100px;"></td>
    <td>'.$electiontype.'</td>
    <td>'.$fullname.'</td>
    <td>'.$party.'</td>
    <td>'.$states.'</td>
    <td>'.$cities.'</td>
    <td><button type="button" class="btn btn-success" id="random"><a href="update_cand.php?updateid='.$id.'" class="text-light" style="text-decoration: none">Update</a></button>
        <button type="button" class="btn btn-danger" id="random1"><a href="candidate.php?deleteid='.$id.'" class="text-light" style="text-decoration: none">Delete</a></button>
    </td>
  </tr>';
  }
}
?>

  </tbody>
</table>
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