<?php
require_once "Callinterface.php";
class Dog implements Callinterface{
    public function Call(){
        echo "arf arf <br/>";
    }
}

?>