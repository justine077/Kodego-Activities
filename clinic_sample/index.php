<?php

if (!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['UserLogin'])){
    echo "<div  class='text-center mb-3 fs-2 text-bold bg-success p-3 m-auto text-white'>". 'Welcome ' .$_SESSION['UserLogin']."</div>";
}else {
    echo '<div class="text-center mb-3 fs-2 text-bold bg-success p-3 m-auto text-white">Welcome Guest</div>';
}


include_once ("Connections/connection.php");
connection ();

$con = connection();


$sql = "SELECT * FROM clinic_appointment ORDER BY ID DESC";
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
    <div>
    <h1>Clinic</h1>
 

    <div class="row">
    <div class="col-8">

    <?php if(isset($_SESSION['UserLogin'])){?>
        <a href="logout.php"><button class="btn btn-success m-2" type="button">Log-out</button></a>
        
    <?php } else{ ?> <a href="login.php"><button class="btn btn-success m-2" type="button">Login</button></a>
        
    <?php } ?>  

    <?php if ($_SESSION['Access']== 'admin'){?>
        <a href="insert.php"><button class="btn btn-success" type="button">Add new</button></a>

    <?php }?>
    </div>

    
    <div class="col-4">
    <form class="d-flex m-2" action="result.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
    
  </div>



    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th></th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>App_Number</th>
        <th>App_Date</th>
        <th>App_Type</th>
        <th>Doctor_Name</th>
     
            </tr>
        </thead>

<tbody>
    <?php do { ?>
        <tr>
            <td><a href="details.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-transparent btn-outline-success text-dark">Details</button></a></td>
            <td><?php echo $row['First_Name'];?></td>
            <td><?php echo $row['Last_Name'];?></td>
            <td><?php echo $row['Gender'];?></td>
            <td><?php echo $row['Phone'];?></td>
            <td><?php echo $row['App_Number'];?></td>
            <td><?php echo $row['App_Date'];?></td>
            <td><?php echo $row['App_Type'];?></td>
            <td><?php echo $row['Doctor_Name'];?></td>
            
        </tr>
        <?php }while($row = $students->fetch_assoc());?>
    
</tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>




