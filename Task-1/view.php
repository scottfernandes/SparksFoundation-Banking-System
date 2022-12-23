<?php
$conn=mysqli_connect("localhost", "root", "", "accounts");
// $sql="SELECT * FROM accmoney WHERE ";

if(isset($_GET['viewid']))
{
    $vid=( int ) $_GET['viewid'];
  echo"$vid";
    $sql="SELECT * FROM accountholdersinfo WHERE indexno='$vid'";
   
    $stmt=mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Information</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/style.css">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<div class="container mt-4" id="info">
   <h1 style="text-align: center;">Customer Information</h1> 
   <br>
   <?php 

  
   if(mysqli_num_rows($stmt)>0)
{

 $row=mysqli_fetch_assoc($stmt);
if($row['acc_type']==1)
{
    $acc="Personal";
}
echo"
<p>Name: ".$row['Firstname']." ".$row['Lastname']."</p>";
echo"<p>Email: $row[Email]</p>
<p>Account type: $acc</p>
<p>Address: $row[Address]</p>
<p>Phone Number: $row[phoneno]</p>
<div class='places'>
<p >City: $row[city]</p>
<p>State: $row[state]</p>

<p>Zipcode: $row[zipcode]</p>
";
}
mysqli_close($conn);}
   ?>

</div>
</div>
      <div class="bg-dark text-center text-white p-3 fixed-bottom " id="ff">
        © 2022 Copyright: Scott Fernandes
      </div>
      <!-- Copyright -->
    </footer>  
  </body>
</html>