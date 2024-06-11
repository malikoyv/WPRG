<?php
trait Speed {
    protected $speed = 0;
    protected function increaseSpeed($value){
        $this->speed += $value;
    }
    protected function decreaseSpeed($value){
        $this->speed -= $value;
    }
}

class Car {
    use Speed;
    public function start(){
        $this->speed = 0;
        for ($i = 1; $i <= 10; $i++){
            $this->increaseSpeed(1);
            echo $this->speed . "<br>";
        }
    }
}

$car = new Car();
$car->start();
?>