<?php

class Calculator{ 
    private $number1 , $number2 , $operator , $output;
    public function setNumbers($number1, $number2){
         
        $this->number1 = $number1;
        $this->number2 = $number2;
    }

    public function setOperator($operator){
        $this->operator = $operator;
    }

    public function calculate(){
       if ($this->operator == '+'){
           $this->output = $this->number1 + $this->number2;
        }
       else if($this->operator == '-'){
       $this->output = $this->number1 - $this->number2;
        }
       else if($this->operator == '*'){
       $this->output = $this->number1 * $this->number2; 
        }   
       else if($this->operator == "/"){
       $this->output = $this->number1 / $this->number2;      
        }
       else {
            $this->output = "Invalid Operator";}
    }

    public function getOutput(){
        return $this->output;
    }
}



?>