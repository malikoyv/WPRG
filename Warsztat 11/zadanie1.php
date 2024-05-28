<?php
    class NoweAuto {
        protected $model;
        protected $cena;
        private $kurs;

        public function __construct($model, $cena, $kurs)
        {
            $this->model = $model;
            $this->cena = $cena;
            $this->kurs = $kurs;
        }

        public function obliczCene(){
            return $this->cena * $this->kurs;
        }
    }

    class AutoZDodatkami extends NoweAuto {
        protected $alarm;
        protected $radio;
        protected $klima;

        public function __construct($model, $cena, $kurs, $alarm, $radio, $klima)
        {
            parent::__construct($model, $cena, $kurs);
            $this->alarm = $alarm;
            $this->radio = $radio;
            $this->klima = $klima;
        }

        public function obliczCene(){
            $cena = parent::obliczCene();
            $cena += $this->alarm + $this->radio + $this->klima;
            return $cena;
        }
    }

    class Ubezpieczenie extends AutoZDodatkami {
        protected $procentowaWartosc;
        protected $liczbaLat;

        public function __construct($model, $cena, $kurs, $alarm, $radio, $klima, $procentowaWartosc, $liczbaLat)
        {
            parent::__construct($model, $cena, $kurs, $alarm, $radio, $klima);
            $this->procentowaWartosc = $procentowaWartosc;
            $this->liczbaLat = $liczbaLat;
        }

        public function obliczCene(){
            $cena = parent::obliczCene();
            return $this->procentowaWartosc * ($cena * ((100-$this->liczbaLat) / 100));
        }
    }

    // Tworzenie instancji klasy NoweAuto
    $noweAuto = new NoweAuto("Model auta", 20000, 4.5);

    // Wywołanie metody obliczCene() dla klasy NoweAuto
    $cenaNowegoAutu = $noweAuto->obliczCene();
    echo "Cena nowego auta: " . $cenaNowegoAutu . " PLN";

    // Tworzenie instancji klasy AutoZDodatkami
    $autoZDodatkami = new AutoZDodatkami("Model auta", 20000, 4.5, 1000, 500, 1500);

    // Wywołanie metody obliczCene() dla klasy AutoZDodatkami
    $cenaAutoZDodatkami = $autoZDodatkami->obliczCene();
    echo "Cena auta z dodatkami: " . $cenaAutoZDodatkami . " PLN";

    // Tworzenie instancji klasy Ubezpieczenie
    $ubezpieczenie = new Ubezpieczenie("Model auta", 20000, 4.5, 1000, 500, 1500, 0.1, 2);

    // Wywołanie metody obliczCene() dla klasy Ubezpieczenie
    $cenaUbezpieczenia = $ubezpieczenie->obliczCene();
    echo "Cena ubezpieczenia: " . $cenaUbezpieczenia . " PLN";

?>