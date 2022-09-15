<?php
require_once "Callinterface.php";
class Cat implements Callinterface{
    public function Call(){
        echo "meow meow";
    }
}

?>