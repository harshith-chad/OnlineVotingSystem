<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:admin login.php');
}
?>
<?php
$con = mysqli_connect("localhost", "root", "", "voter");
if (isset($_GET['approveid'])) 
{
    $voterid = $_GET['approveid'];
    $resu="select * from non_verify_voter where voterid='$voterid' and status='rejected'";
    $resul1=mysqli_query($con,$resu);
    if($resul1)
    {
        $num2=mysqli_num_rows($resul1);
        if($num2>0)
        {
            $nones=1;
        }
        else
        {
            $results="select * from non_verify_voter where voterid='$voterid' and status='approved'";
            $qurn=mysqli_query($con,$results);
            if($qurn)
           {
            $num=mysqli_num_rows($qurn);
            if($num>0)
            {
                $none=1;
            }
            else{
                $res="update non_verify_voter set status='approved' where voterid='$voterid'";
                $result=mysqli_query($con,$res);
                if($result)
            {
               $success=1;
               
            }
            }
        }
        }
    }
    
} 

elseif(isset($_GET['rejectid']))
{
    $voterid=$_GET['rejectid'];
    $san="select * from non_verify_voter where voterid='$voterid' and status='approved'";
    $cher=mysqli_query($con,$san);
    if($cher)
    {
        $num3=mysqli_num_rows($cher);
        if($num3>0)
        {
            $nones1=1;
        }
        else
        {
            $sql1="select * from non_verify_voter where voterid='$voterid' and status='rejected'";
            $done=mysqli_query($con,$sql1);
            if($done)
            {
                $num1=mysqli_num_rows($done);
                if($num1>0){
                    $reply=1;
                }
                else
                {
                    $res="update non_verify_voter set status='rejected' where voterid='$voterid'";
                    $results=mysqli_query($con,$res);
                 if($results)
                {
                    $error=1;
                }
                }
            }
        }
    }
    
    
}

elseif(isset($_GET['deleteid']))
{
    $voterid=$_GET['deleteid'];
    $res1="update non_verify_voter set status='' where voterid='$voterid'";
    $results1=mysqli_query($con,$res1);
    // $res2="delete from decline_voter where voterid='$voterid'";
    // $results2=mysqli_query($con,$res2);
    if($results1){
        $success1=1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding: 0;
            margin: 0;
        }

        body {
            position: relative;
            background: url('../images/bg.jpg') no-repeat center center/cover;
        }

        .navigate {
            /* position: relative; */
            padding-right: 50px;
            display: flex;
            flex-direction: row;
            height: 100px;
            width: 100%;
            align-items: center;
            gap: 150px;
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
            padding-left: 50px;

        }

        .detail {
            padding-left: 50px;
            display: flex;
            flex-direction: row;
            gap: 110px;
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

        .searchbox {
            margin-left: 1050px;

        }

        .searchbox input {
            outline: none;
            font-size: 20px;
            border-radius: 6px;
            width: 200px;
            height: 35px;
            padding-left: 40px;
            border-color: #d3d3d3;
        }

        .searchbox>img {
            position: absolute;
            height: 32px;
            padding: 6px 6px;
        }

        .searchbox>input:focus {
            box-shadow: 0 0 0 0.2rem rgba(2, 120, 246, 0.25);
            border: 2px solid #e8f0fe;
        }

        .whole {
            background-color: rgb(247, 242, 239);
            padding: 30px 45px;
            margin: 150px 80px;
        }

        .modal {
            z-index: 10000;
            margin-top: 100px;
        }

        .modal-dialog {
            width: 100%;
            max-width: 60%;
        }

        #random {
            width: 90px;
            height: 40px;
        }

        #random1 {
            width: 90px;
            height: 40px;
        }

        .table1>th {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: whitesmoke;
            background-color: #00308F;
            font-size: 20px;
            padding: 10px 10px;
        }

        #exampleModalLabel {
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
                title: 'Verified!',
                text: 'Voter-id is approved by successfull verification',
                button: 'Ok',
            })
        </script>
        <?php
    }
    ?>
    <?php
    if (isset($error)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Rejected!!',
                text: 'You have rejected the voter-id approval',
            })
        </script>
        <?php
    }
    ?>
    <?php
    if (isset($none)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Already approved!!',
                text: 'You have already approved the voterid',
            })
        </script>
        <?php
    }
    ?>
     <?php
    if (isset($success1)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Edited!!',
                text: 'You have edited the choice, please Approve/decline by successfull verification',
            })
        </script>
        <?php
    }
    ?>
    <?php
    if (isset($reply)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Already Declined!!',
                text: 'You have already declined the voter-id',
            })
        </script>
        <?php
    }
    ?>
    <?php
    if (isset($nones)) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Cannot Approve!!',
                text: 'Approval of voter-id cannot be done because you have already,rejected it.',
            })
        </script>
        <?php
    }
    ?>
      <?php
    if (isset($nones1)) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Cannot Reject!!',
                text: 'You cannot reject voter-id  because you have already,approved it.',
            })
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
            <li><a href="candidate.php">Candidate</a></li>
            <li><a href="">Results</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="whole">
        <button type="button" class="btn btn-warning mt-3 " data-toggle="modal" data-target="#exampleModal"
            data-keyboard="false" data-backdrop="static">
            Manage Voter
        </button>
        <div class="searchbox">
            <img src="data:image/png;base64,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"
                alt="">
            <input type="text" name="search" placeholder="Search here">
        </div>


        <table class="table table-striped mt-4">
            <thead>
                <tr class="table1">
                    <th scope="col">Voter Id</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Date of birth</th>
                    <!-- <th scope="col">Gender</th> -->
                    <th scope="col">Aadhar</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
                $con = mysqli_connect("localhost", "root", "", "voter");
                $sql = "select * from non_verify_voter where everify='yes'";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $voterid = $row['voterid'];
                        $fullname = $row['fullname'];
                        $mobile = $row['mobile'];
                        $emailid = $row['emailid'];
                        $dob = $row['dob'];
                        $gender = $row['gender'];
                        $address = $row['address'];
                        $state = $row['state'];
                        $city = $row['city'];
                        $pin = $row['pin'];
                        $aadhar = $row['aadhar'];
                        $password = $row['password'];
                        $status=$row['vote_stat'];
                        echo '<tr>
   
    <td>' . $voterid . '</td>
    <td>' . $fullname . '</td>
    <td>' . $mobile . '</td>
    <td>' . $dob . '</td>
    
    <td>' . $aadhar . '</td>
    <td>' . $state . '</td>
    <td>' . $city . '</td>
       
        <td>' . $status. '</td>    
  </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/gh/Venkatnvs/ContactsApp@deploy/static/statesjs/states_pin.v2.js"></script>
    <script>
        cityOpt = document.getElementsByClassName('form-select mb-1')[0]
        stateOpt = document.getElementsByClassName('form-select mb-3')[0]

        apitoken = "72c9f77e50218e583b6d71533414548239439071"
        statejs_start()
    </script>GET
</body>


