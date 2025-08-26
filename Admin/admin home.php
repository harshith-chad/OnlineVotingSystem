<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:admin login.php');
}
?>
<?php
$conn=mysqli_connect("localhost", "root", "", "voter");
$con=mysqli_connect("localhost", "root", "", "admin");

$sql="select * from non_verify_voter where everify='yes'";
if($result1=mysqli_query($conn,$sql)){
    $tvote=mysqli_num_rows($result1);  
}
$sql1="select * from voting ";
if($result=mysqli_query($con,$sql1)){
    $tvoted=mysqli_num_rows($result);  
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
          rel="stylesheet">
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js">
    </script>
    <style>
        *{
            padding:0;
            margin:0;
        }
       body{
        /* display: block; */
        position: relative;
        background-color: #cbd6e1;
        /* background-color:#e5ebf1; */
       }
        .navbar{
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
        .whole{
            /* background-color: lightgray; */
            margin: 50px 50px;
            margin-top: 130px;
        }
        .sec{
          margin-left: 200px;
          gap:300px;
          display:flex;
          flex-direction: row;  
        }
        .t_voter{
            height: 200px;
            width: 400px;
            background-color:#2ac5d6;
            border-radius: 18px;
        }
        .t_voted{
            height: 200px;
            width: 400px;
            background-color:#da75df;
            border-radius: 18px;
        }
        .t_voter>h2{
            margin-top: 20px;
            margin-left: 20px;
            font-size: 30px;
            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .t_voted>h2{
            margin-top: 20px;
            margin-left: 20px;
            font-size: 30px;
            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .clas{
            display:flex;
            flex-direction: row;
        }
        .clas>h1{
            color: white;
            margin-left: 180px;
            margin-top: 67px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .icon {
            font-size: 100px;
            display: inline-flex;
            margin-top:38px ;
            width: 100px;
            padding: 10px;
            color: white;
        }
        .contain{
           height: 280px;
            border-radius: 20px;
            margin-top:80px ;
            margin-left: 220px;
            width: 1000px;
            background-color: white;
        }
.form-group{
    margin: 20px 40px ;
}
.form-group>h3{
    color: rgb(11, 13, 80);
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
#but{
    height: 40px;
    border-radius: 18px;
    width: 100%;
}
.modal{
    z-index: 10000;
    margin-top: 100px;
   }
   .mod{
    display: flex;
    flex-direction: row;
   }
   #exampleModalLabel1{
    margin-left: 100px;
   }
   #exampleModalLabel{
    margin-left: 70px;
   }
   #value{
    margin-left: 150px;
   }
   .no>span{
    font-size: 20px;
    margin-left: 150px;
    display: flex;

   }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Candidates</h5>
        <h5 class="modal-title" id="exampleModalLabel1" >Total Votes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div id="modal-body" class="modal-body">
      </div>
      <div class="modal-footer">
        <button id="close_btn" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </div>
</div>
    <nav  class="navbar">
        <div class="titletop">
          <img src="../images/evote-logo.png" alt=""> 
        </div>
        
        <ul class="detail">
            <li><a href="../Admin/admin home.php">Home</a></li>
            <li><a href="../Admin/candidate.php">Candidates</a></li>
            <li><a href="../Admin/voter mn.php">Voters</a></li>
            <!-- <li><a href="">Results</a></li> -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="searchbox">
            <img src="data:image/png;base64,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" alt="">
        <input type="text" name="search"  placeholder="Search here">
        </div>
       </nav>
       <div class="whole">
       <div class="sec">
        <div class="t_voter">
        <h2>Total Voters:</h2>
        <div class="clas">
        <i class="fa fa-user fa-lg icon"></i>
        <h1><?php echo $tvote;?></h1>
        </div>
        </div>
        <div class="t_voted">
        <h2>Total Voted:</h2>
        <div class="clas">
        <i class="fa fa-user fa-lg icon"></i>
        <h1><?php echo $tvoted;?></h1>
        </div>
        </div>

       </div>
       <div class="contain">
       <form action="admin home.php" method="post">
        <div class="form-group mt-2">
            <h3 class="text-center">Check Results</h3>
        </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Select State</label>
  <select class="form-select mb-3" name="states">
  <option selected disabled value="">Select State</option>
</select>
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Select City</label>
<select class="form-select mb-1" name="cities" >
  <option selected disabled value="">Select State</option>
</select>
  </div>
  <div class="form-group">
  <button name="submit" class="btn btn-primary" id="but" data-keyboard="false" data-backdrop="static">Submit</button>
  </div>
  <script>
   var dataRes = 
      <?php
        $con=mysqli_connect("localhost", "root", "", "admin");
        if(isset($_POST['submit']))
        {
            $states=$_POST['states'];
            $cities=$_POST['cities'];
            
            $sql2="select * from candidates where states='$states' and cities='$cities'";
            if($result2=mysqli_query($con,$sql2))
            {
                $myobj = new stdClass();    
                while($row=mysqli_fetch_array($result2)){
                    $name=$row['fullname'];
                $id=$row['id'];
                
                $sql3="select * from voting where cand_id='$id'";
                if($result4=mysqli_query($con,$sql3))
                {
                    $tvote=mysqli_num_rows($result4);  
                }
                $myobj->$name=$tvote;
            }
            $myJSON = json_encode($myobj);
            echo $myJSON;
        }
        }  
?>;
let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('exampleModal'))
if(dataRes){
    document.getElementById("modal-body").innerHTML =""
    for (const key in dataRes) {
    if (dataRes.hasOwnProperty(key)) {
        const value = dataRes[key];
        document.getElementById("modal-body").innerHTML += `
        <div class="mod">
        <div class="yes">
            <h3>${key}</h3>
        </div>
        <div class="no">   
            <span>${value}</span>
        </div>
        </div>
        `
    }
}
    modal.show();
}
document.getElementById("close_btn").addEventListener("click",function(e){
    modal.hide();
})
</script>

</form>
</div>
       </div>
       <script src="https://cdn.jsdelivr.net/gh/Venkatnvs/ContactsApp@deploy/static/statesjs/states_pin.v2.js"></script>
  <script>
    cityOpt = document.getElementsByClassName('form-select mb-1')[0]
    stateOpt = document.getElementsByClassName('form-select mb-3')[0]

    apitoken = "72c9f77e50218e583b6d71533414548239439071"
    statejs_start()
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
<div class="yes"></div>