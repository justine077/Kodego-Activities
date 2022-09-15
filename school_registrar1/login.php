<?php

if (!isset($_SESSION)){
    session_start();
}

include_once ("Connections/connection.php");
connection ();

$con = connection();

if (isset($_POST['login'])){
//     // echo "Login";
   $username = $_POST["Username"]; 
   $password = $_POST["Password"]; 

$sql = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'" ;

$User = $con->query($sql) or die ($con->error);
        $row  = $User->fetch_assoc();
       echo $total = $User->num_rows;
        

        if($total>0){

            $_SESSION["UserLogin"] = $row["Username"];
            $_SESSION["access"] = $row["access"];

            echo header("location:index.php");
        }else {
            echo "No User Found";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student DataBase</title>
    <link rel="stylesheet" href="CSS/login.css">
    
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
crossorigin="anonymous">

<!--  -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="mb-3 text-center">Login Page</h1>

    <div class="container">
  <div class="row">
    <div class="col-md-6 m-auto">
 
    
    <form action="" method="POST">
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" name="Username">

    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>




    </div>
  </div>
</div>
</body>
</html>




