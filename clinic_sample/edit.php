<?php

include_once ("Connections/connection.php");
connection ();

$con = connection();

if (isset($_POST["submit"])) {

    echo "Submitted";


$fname = $_POST["First_Name"];
$lname = $_POST["Last_Name"];
$gender = $_POST["Gender"];
$phone = $_POST["Phone"];
$appnumber = $_POST["App_Number"];
$appdate = $_POST["App_Date"];
$apptype = $_POST["App_Type"];
$doctname = $_POST["Doctor_Name"];
$id = $_GET['ID'];




$sql = "UPDATE `clinic_appointment` SET `First_Name` = '$fname', `Last_Name` = '$lname ', `Gender` = '$gender', `Phone` = '$phone', `App_Number` = '$appnumber', `App_Date` = '$appdate', `App_Type` = '$apptype', `Doctor_Name` = '$doctname' WHERE `clinic_appointment`.`ID` = '$id'";



$con->query($sql) or die ($con->error);
echo header('Location: details.php?ID='.$id);

}

$id = $_GET['ID'];

$sql = "SELECT * FROM clinic_appointment WHERE ID = '$id'";
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



<div class="container ">
    <div class="row">
        <div class="col-sm-6 m-auto">
    
        <form action="" method="POST" class="m-5" >

            <!-- First Name Label and Input -->
            <div class="mb-3">
                <label for="First_Name" class="form-label" id="First_Name">First Name</label>
                <input type="text" class="form-control" name="First_Name" id="First_Name" aria-describedby="help" placeholder="Enter your First Name" value="<?php echo $row['First_Name'];?>" >

                <!-- Help -->
                <div id="help" class="form-text">We'll never share your information with anyone else.</div>
                </div>                  

                <!-- Last Name label and Input -->
                <div class="mb-3">
                    <label for="Last_Name" class="form-label" id="Last_Name">Last Name</label>
                    <input type="text" class="form-control" name="Last_Name"id="Last Name" placeholder="Enter your Last_name" value="<?php echo $row['Last_Name'];?>" >
                </div>


                <!-- Gender -->

                <div class="mb-3">

                    <label for="Gender" class="form-label" id="Gender">Gender</label>
                    <input type="text" class="form-control" name="Gender"id="Gender" placeholder="Enter your Gender" value="<?php echo $row['Gender'];?>" >
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                            
                <label for="Phone" class="form-label" id="Phone">Phone</label>
                <input type="text" class="form-control" name="Phone"id="Phone" placeholder="Enter your Phone Number" value="<?php echo $row['Phone'];?>">
                </div>

            <!-- App Number -->
                <div class="mb-3">

                <label for="App_Number" class="form-label" id="App_Number">Application Number</label>
                <input type="text" class="form-control" name="App_Number"id="App_Number" placeholder="Enter your Application Number" value="<?php echo $row['App_Number'];?>" >
                </div>

          
                <!-- <div class="mb-3">
             
                <label for="Phone" class="form-label" id="Phone">Phone</label>
                <input type="text" class="form-control" name="Phone"id="Phone" placeholder="Enter your Phone Number">
                </div> -->

                <!-- Application Date -->
                <div class="mb-3">
             
                <label for="App_Date" class="form-label" id="App_Date">Application Date</label>
                <input type="text" class="form-control" name="App_Date"id="App_Date" placeholder="Application Date" value="<?php echo $row['App_Date'];?>">
                </div>


                <!-- Application Type -->
                <div class="mb-3">
             
                <label for="App_Tye" class="form-label" id="App_Type">Application Type</label>
                <input type="text" class="form-control" name="App_Type"id="App_Type" placeholder="Application Type" value="<?php echo $row['App_Type'];?>">
                </div>

                <!-- Doctor Name-->
                <div class="mb-3">
             
                <label for="Doctor_Name" class="form-label" id="Doctor_Name">Doctor Name</label>
                <input type="text" class="form-control" name="Doctor_Name"id="Doctor_Name" placeholder="Doctor Name" value="<?php echo $row['Doctor_Name'];?>">
                </div>
                


                <!-- Checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

  
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
  </div>
</div>


    

</body>
</html>




