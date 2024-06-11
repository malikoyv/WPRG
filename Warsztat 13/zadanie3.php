<?php
    trait A {
        public function smallTalk() {
            echo 'a';
        }
        public function bigTalk() {
            echo 'A';
        }
    }
    
    
    trait B {
        public function smallTalk() {
            echo 'b';
        }
        public function bigTalk() {
            echo 'B';
        }
    }
    
    class AB {
        use A, B {
            A::smallTalk insteadof B;
            B::bigTalk insteadof A;
      }
    }

$talker = new AB();
$talker->smallTalk();
$talker->bigTalk();
?>