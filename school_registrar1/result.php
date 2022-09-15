<?php

if (!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['UserLogin'])){
    echo "<div  class='text-center mb-3 fs-2 text-bold bg-primary p-3 m-auto text-white'>". 'Welcome ' .$_SESSION['UserLogin']."</div>";
} else {
    // echo 'Welcome Guest';
    echo '<div class="text-center mb-3 fs-2 text-bold bg-primary p-3 m-auto text-white">Welcome Guest</div>';
 
    
} 


include_once ("Connections/connection.php");
connection ();

$con = connection();

$search1 = $_GET['search'];

$sql = "SELECT * FROM Login_Form WHERE First_Name LIKE '%$search1%' || Last_Name LIKE '%$search1%'  ORDER BY ID DESC";
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
    
    <div class="m-auto p-5">
   
            
    <h1>Students Information</h1>
 

    <div class="row">
    <div class="col-8"><?php if(isset($_SESSION['UserLogin'])){?>
        <a href="index.php"><button class="btn btn-primary m-2">Back</button></a>
        <a href="logout.php"><button class="btn btn-primary m-2" type="button">Log-out</button></a>
        
    <?php } else{ ?> <a href="login.php"><button class="btn btn-primary m-2" type="button">Login</button></a>
        
        <?php } ?>  

<?php if ($_SESSION['access']== 'admin 1'){?>
    <a href="insert.php"><button class="btn btn-primary" type="button">Add new</button></a>

<?php }?></div>

    <div class="col-4">
    <form class="d-flex" action="result.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
    </div>
  </div>

    <!-- <a href="insert.php"><button class="btn btn-primary" type="button">Add new</button></a> -->
        
    <br>
    <br>
 <div class="col-sm-12 m-auto
 ">
    <table class="table table-hover table-responsive{-sm}">
        <thead>
        <tr>
            <th></th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Birthday</th>
        <th>Endrolled Date</th>
        <th>Course</th>
        <th>Email_Address</th>
        </tr>
        </thead>

<tbody>
    <?php do { ?>
        <tr>
            <td><a href="details.php?ID=<?php echo $row['ID']?>">Details</a></td>

            <td><?php echo $row['First_Name'];?></td>
            <td><?php echo $row['Last_Name'];?></td>
            <td><?php echo $row['Gender'];?></td>
            <td><?php echo $row['Birthday'];?></td>
            <td><?php echo $row['Endrolled_Date'];?></td>
            <td><?php echo $row['Course'];?></td>
            <td><?php echo $row['Email_Address'];?></td>
        </tr>
        <?php }while($row = $students->fetch_assoc());?>
    
</tbody>
    </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>




