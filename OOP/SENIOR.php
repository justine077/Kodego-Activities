<?php
require_once "EMPLOYEE.php";
// class SENIOR extends EMPLOYEE {
//     public $hr1;
    
//     public function __construct($name,$department,$hr1){
//         $this->name = $name;
//         $this->department = $department;
//         $this->hr1 = $hr1;
//     }
//         public function getHr1(){
//             echo "This is $this->name $this->department <br/> $this->hr1";
      
//     }
// }



class JUNIOR {
    public $name;

  
    function __construct($name) {
      $this->name = $name; 
    }
    function __destruct() {
      echo "<br/>The new member of the HR Department is $this->name"; 
    }
  }
  
  $hr1 = new JUNIOR("Michael.");
  ?>
