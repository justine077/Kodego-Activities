<?php

class EMPLOYEE {
    public $name;
    public $department;

    public function __construct($name,$department){
        $this->name = $name;
        $this->department = $department;
    }

    public function intro(){
        echo "This is $this->name $this->department <br/>";
    }
}
?>