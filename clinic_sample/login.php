<?php

if (!isset($_SESSION)){
    session_start();
}


include_once ("Connections/connection.php");
connection ();

$con = connection();




if (isset($_POST['login'])){
 
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $sql = "SELECT * FROM Users WHERE Username = '$username' AND Password ='$password'";

    $User = $con->query($sql) or die ($con->error);
    $row  = $User->fetch_assoc();
    $total = $User->num_rows;
    

    if ($total > 0){
        $_SESSION['UserLogin'] = $row['Username'];
        $_SESSION['Access'] = $row['Access'];

        echo header("Location:index.php");
    }else {
        echo "No User found.";
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
    <link rel="stylesheet" href="CSS/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<div>
<div class="container m-auto">
  <div class="row">
    <div class="col">
    <form action="" method="POST">
  <div class="mb-3">
    <label for="Username" class="form-label">Username</label>
    <input type="text" class="form-control" id="Username" name="Username">

    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" class="btn btn-primary" name="login">Submit</button>
</form>
    </div>
  </div>
</div>

</div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>




