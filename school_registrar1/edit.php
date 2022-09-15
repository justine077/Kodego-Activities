<?php

include_once ("Connections/connection.php");
connection ();

$con = connection();




if (isset($_POST["submit"])) {

// echo "Submitted";

$fname = $_POST["First_Name"];
$lname = $_POST["Last_Name"];
$gender = $_POST["Gender"];
$birthday = $_POST["Birthday"];
$endrdate = $_POST["Endrolled_Date"];
$course = $_POST["Course"];
$emailadd = $_POST["Email_Address"];
$id = $_GET['ID'];

$sql = "UPDATE `Login_Form` SET `First_Name` = '$fname', `Last_Name` = '$lname', `Gender` = '$gender', `Birthday` = '$birthday', `Endrolled_Date` = '$endrdate', `Course` = '$course', `Email_Address` = '$emailadd' WHERE `Login_Form`.`ID` = '$id'";


$con->query($sql) or die ($con->error);
echo header ('Location: details.php?ID='.$id);

};
$id = $_GET['ID'];

$sql = "SELECT * FROM Login_Form WHERE ID = '$id'";
$students = $con->query($sql) or die ($con->error);
    
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student DataBase</title>
<!-- Bootstrap CDN -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>


<body>

<h1 class="text-center bg-primary text-white">Add New Student</h1>

<div class="container ">
<a href="details.php?ID=<?php echo $row['ID']?>"><button class="btn btn-primary m-2">Back</button></a>
    <div class="row">
        <div class="col-sm-8 m-auto">
    
        <form action="" method="POST" class="m-5" >

            <!-- First Name Label and Input -->
            <div class="mb-3">
                <label for="First_Name" class="form-label" id="First_Name">First Name</label>
                <input type="text" class="form-control" name="First_Name" id="First_Name" value="<?php echo $row['First_Name'];?>" aria-describedby="help" placeholder="Enter your First Name">

                <!-- Help -->
                <div id="help" class="form-text">We'll never share your information with anyone else.</div>
                </div>                  

                <!-- Last Name label and Input -->
                <div class="mb-3">
                    <label for="Last_Name" class="form-label" id="Last_Name">Last Name</label>
                    <input type="text" class="form-control" name="Last_Name"id="Last_Name" placeholder="Enter your Last_name" value="<?php echo $row['Last_Name'];?>">
                </div>


                <!-- Gender -->

                <div class="mb-3">

                    <label for="Gender" class="form-label" id="Gender">Gender</label>
                    <input type="text" class="form-control" name="Gender"id="Gender" placeholder="Enter your Gender"value="<?php echo $row['Gender'];?>" >
                </div>
                
                <!-- Birthday -->

                <div class="mb-3">

                    <label for="Birthday" class="form-label" id="Birthday">Birthday</label>
                    <input type="text" class="form-control" name="Birthday"id="Birthday" placeholder="Enter your Birthday" value="<?php echo $row['Birthday'];?>">
                </div>


                <!--Endrolled_Date -->

                <div class="mb-3">

                    <label for="Endrolled_Date" class="form-label" id="Endrolled_Date">Endrolled Date</label>
                    <input type="text" class="form-control" name="Endrolled_Date"id="Endrolled_Date" placeholder="Endrolled Date" value="<?php echo $row['Endrolled_Date'];?>">
                </div>

                <!--Course -->

                <div class="mb-3">

                    <label for="Course" class="form-label" id="Course">Course</label>
                    <input type="text" class="form-control" name="Course"id="Course" placeholder="Enter your Course" value="<?php echo $row['Course'];?>">
                </div>

                <!--Email Address-->

                <div class="mb-3">

                    <label for="Email_Address" class="form-label" id="Email_Address">Email Address</label>
                    <input type="text" class="form-control" name="Email_Address"id="Email_Address" placeholder="Enter your Email Address" value="<?php echo $row['Email_Address'];?>">
                </div>

                <!-- Checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

  
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
  </div>
</div>


    

</body>
</html>




