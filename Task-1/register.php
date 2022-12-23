<?php
$fname=$lname=$email=$acctype=$addr=$phonenum=$aadhar=$city=$state=$zip="";


if ($_SERVER['REQUEST_METHOD']=='POST')
{
  require_once("config.php");
  $sql ="SELECT aadhar from accountholdersinfo where aadhar =?";
  $stmt=mysqli_prepare($conn,$sql);
  $param_fname= trim($_POST['fname']);
  $param_lname=trim($_POST['lname']);
  $param_email=trim($_POST['email']);
  $param_acctype=trim($_POST['acctype']);
  $param_address=trim($_POST['address']);
  $param_phoneno=trim($_POST['phoneno']);
  $param_aadhar= trim($_POST['aadhar']);  
  $param_city=trim($_POST['city']);
  $param_state=trim($_POST['state']);
  $param_zipcode=trim($_POST['zipcode']);
  $timestamp = date("Y-m-d H:i:s");
  $nulll="NULL";
  if($stmt)
  {
   mysqli_stmt_bind_param($stmt,"i",$aadhar);



    }
    else{
      echo"Something went wrong";
    }
mysqli_stmt_close($stmt);
if(empty($aadharerror))
{

  $sql= "INSERT INTO accountholdersinfo values  (?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt= mysqli_prepare($conn,$sql);
  if($stmt)
  {
    mysqli_stmt_bind_param($stmt,"ssssssiissii",$nulll,$param_fname,$param_lname,$param_email,$param_acctype,$param_address,$param_phoneno,$param_aadhar,$param_city,$param_state,$param_zipcode,$timestamp);
    if (mysqli_stmt_execute($stmt))
        {
          //INSERTION
          $stdc=158200*1000000;
          $rando=rand(100000,999999);
          
          $accname=$param_fname." ".$param_lname;
          $branch_code=04;
          $depositmoney=0;
      $insql="SELECT accno FROM accmoney WHERE accno='$rando'";
      $result = mysqli_query($conn, $insql);
      if (mysqli_num_rows($result)== 0)
      {
        
          $insql="INSERT INTO accmoney VALUES('NULL', '$rando','$accname','$branch_code','$depositmoney','$param_acctype')";
          if (mysqli_query($conn, $insql)) {

            echo "New record created successfully";
            header("location: logger.php");
          } else {
            echo "Error: " . $insql . "<br>" . mysqli_error($conn);
          }
          
         
      }
      else
      {
          echo("This number already exists");
          
      }

          //INSERTION END
           
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
  }


//  mysqli_stmt_bind_param($stmt,"sssssiissi",$fname,$lname,$email,$acctype,$addr,$phonenum,$aadhar,$city,$state,$zip);




?>










<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <link rel="stylesheet" href= "CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Add Account</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
          <a href="index.html" class="navbar-brand">
          <img src="img/Logo1.png" height="45" width="150">
          </a>
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav">
                  <a href="#" class="nav-item nav-link active" style="font-size: 20px;"></a>
                  
                  
              </div>
              <div class="navbar-nav ms-auto" style="font-size: 20px;">
                <a href="register.php" class="nav-item nav-link">Add Account</a>
                  <a href="deposit.php" class="nav-item nav-link">Deposit</a>
                  <a href="transfer.php" class="nav-item nav-link">Transaction</a>
                  <a href="transhist.php" class="nav-item nav-link">Customer info</a>
                  <a href="hist.php" class="nav-item nav-link">Transaction History</a>
              </div>
          </div>
      </div>
  </nav>
    <!-- main -->
<div class="container bg-light my-5">

      <form class="row g-4 p-4 formstyle border border-white rounded" action="" method="POST">
      <h1 class="title text-center">Create Bank Account</h1>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">First name</label>
            <input type="text" class="form-control" name="fname" id="inputName" required>
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lname" id="inputEmail4" required>
          </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="inputEmail4" required>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Account Type </label>
            <select id="inputState" name="acctype" class="form-select" required>
              <option selected>Choose...</option>
              <option value="1">Personal</option>
            </select>
          </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St" required>
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phoneno" id="inputAddress" placeholder="Valid Phone Number" required>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Aadhar Number</label>
            <input type="text" class="form-control" name="aadhar" id="inputAddress" placeholder="Enter Aadhar Number" required>
          </div>
       
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" name="city" id="inputCity" required>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="state" name="state" class="form-select" required>
              <option selected value="Choose">Choose</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Bihar">Bihar</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Delhi">Delhi</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Puducherry">Puducherry</option>
              <option value="Goa">Goa</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Manipur">Manipur</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Odisha">Odisha</option>
              <option value="Punjab">Punjab</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Telangana">Telangana</option>
              <option value="Tripura">Tripura</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Uttarakhand">Uttarakhand</option>
              <option value="West Bengal">West Bengal</option>
              </select>
              
        
 
  
        </div>
            <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input type="text" name="zipcode" class="form-control" id="inputZip" required>
        </div>
        <div class="align-self-center mx-auto">
            <button type="submit" class="btn btn-primary">
              Submit
            </button>
        </div>
      </form>
</div>
      <div class="bg-dark text-center text-white p-3  " id="ff">
        © 2022 Copyright: Scott Fernandes
        <!--  -->
      </div>
      <!-- Copyright -->
    </footer>  
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>