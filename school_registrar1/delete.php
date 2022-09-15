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


$sql = "DELETE FROM Login_Form WHERE `ID`='$id'";

$con->query($sql) or die ($con->error);
echo header ('Location: index.php');

?>