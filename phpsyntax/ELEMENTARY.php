<?php

require_once "STUDENT.php";
class ELEMENTARY extends STUDENT {
    public $grade1;

    public function __construct($name,$age,$grade1){
        $this->name = $name;
        $this->age = $age;
        $this->grade1 = $grade1;
    }

    public function getGrade1() {
        echo "This is $this->name $this->age <br/> $this->grade1 ";
    }

}

?>