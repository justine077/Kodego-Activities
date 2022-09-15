<?php

if (!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['Access']) && $_SESSION['Access'] == 'admin'){
  echo "<div  class='text-center mb-3 fs-2 text-bold bg-success p-3 m-auto text-white'>". 'Welcome ' .$_SESSION['UserLogin']."</div>";
}else {
    echo header("Location:index.php");
}


include_once ("Connections/connection.php");
connection ();

$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM clinic_appointment WHERE ID = '$id'";
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
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
   
<div class="container-fluid">
 

    <div class="m-auto">
    <a href="index.php"><button class="btn btn-success m-2">Back</button></a>
<a href="edit.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-success m-2">Edit</button></a>
<a href="delete.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-success m-2">Delete</button></a>
    <h1 class="text-center">Patient Info</h1>
    </div>
    <div class="">
    <h2><?php echo $row['First_Name'];?> <?php echo $row['Last_Name'];?></h2>
    <div class="row">
  <table class="table table-responsive">
  <thead class="m-auto  bg-success text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone</th>
      <th scope="col">App_Number</th>
      <th scope="col">App_Date</th>
      <th scope="col">App_Type</th>
      <th scope="col">Doctor_Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['ID'];?></th>
      <td><?php echo $row['First_Name'];?> </td>
      <td><?php echo $row['Last_Name'];?></td>
      <td><?php echo $row['Gender'];?></td>
      <td><?php echo $row['Phone'];?></td>
      <td><?php echo $row['App_Number'];?></td>
      <td><?php echo $row['App_Date'];?></td>
      <td><?php echo $row['App_Type'];?></td>
      <td><?php echo $row['Doctor_Name'];?></td>
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







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>




