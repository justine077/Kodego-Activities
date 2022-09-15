<?php

if (!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'admin 1'){
    
    echo "<div class='text-center mb-5 fs-2 text-bold bg-primary p-3 m-auto text-white'>". 'Welcome '.$_SESSION['access']."</div>";

    
   
}else {
    echo header("location:index.php");  

} 


include_once ("Connections/connection.php");
connection ();

$con = connection();

$id = $_GET['ID'];


$sql = "SELECT * FROM Login_Form WHERE ID = '$id'";
$students = $con->query($sql) or die ($con->error);

$row = $students->fetch_assoc();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student DataBase</title>
    <link rel="stylesheet" href="CSS/style.css">

    <!-- Bootstrap CDN -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


</head>
<body>


<!--  -->
<div class="container-fluid">
 

    <div class="m-auto">
    <a href="index.php"><button class="btn btn-primary m-2">Back</button></a>
<a href="edit.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-primary m-2">Edit</button></a>
<a href="delete.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-primary m-2">Delete</button></a>
    <h1 class="text-center">Student Info</h1>
    </div>
    <div class="">
    <h2><?php echo $row['First_Name'];?> <?php echo $row['Last_Name'];?></h2>
    <div class="row">
  <table class="table table-responsive">
  <thead class="m-auto  bg-primary text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Birthday</th>
      <th scope="col">Endrolled Date</th>
      <th scope="col">Course</th>
      <th scope="col">Email_Address</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['ID'];?></th>
      <td><?php echo $row['First_Name'];?> </td>
      <td><?php echo $row['Last_Name'];?></td>
      <td><?php echo $row['Gender'];?></td>
      <td><?php echo $row['Birthday'];?></td>
      <td><?php echo $row['Endrolled_Date'];?></td>
      <td><?php echo $row['Course'];?></td>
      <td><?php echo $row['Email_Address'];?></td>
    </tr>
  </tbody>
  </table>
</div>
    </div>
  
  </div>
</div>


<footer class="bg-light text-center text-lg-start mt-5 pt-5">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="#">Admin</a>
  </div>
  <!-- Copyright -->
</footer>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>




