<?php

function connection () {

    // echo "This is a function";

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "Student_Record";
    
    
    $con = new mysqli($host, $username, $password, $database);
    
    if($con->connect_error){
        
        echo $con->connect_error;
    }else {
        return $con;
    }

}?>
   