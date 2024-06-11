<?php
interface Animal {
    public function makeSound();
    public function eat();
}

class Dog implements Animal {
    public function makeSound(){
        echo "Woof! <br>";
    }

    public function eat(){
        echo "The dog is eating";
    }
}

$dog = new Dog();
$dog->makeSound();
$dog->eat();
?>