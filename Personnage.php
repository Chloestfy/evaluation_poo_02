<?php
class Personnage
{
    public string $nom;
    public int $pointSante;
    public int $endurance;
    public int $force;

    public function __construct(string $n = "inconnu", int $pv = 10, int $e = 1, int $f = 1)
    {
        $this->nom = $n;
        $this->pointSante = $pv;
        $this->endurance = $e;
        $this->force = $f;
    }

    public function attaquer(Personnage $cible)
    {
        $degats = $this->force;
        $cible->pointSante -= $degats;
        if ($cible->pointSante < 0) {
            $cible->pointSante = 0;
        }
        echo $this->nom . " attaque " . $cible->nom . " et inflige " . $degats . " dégâts.<br>";
    }
}

class Orc extends Personnage
{
    public function __construct(string $n = "inconnu", int $pv = 18, int $e = 2, int $f = 10)
    {
        parent::__construct($n, $pv, $e, $f);
    }
}

class Humain extends Personnage
{
    public function __construct(string $n = "inconnu", int $pv = 20, int $e = 4, int $f = 7)
    {
        parent::__construct($n, $pv, $e, $f);
    }
}

class Elfe extends Personnage
{
    public function __construct(string $n = "inconnu", int $pv = 22, int $e = 5, int $f = 6)
    {
        parent::__construct($n, $pv, $e, $f);
    }
}

$personnage = [
    new Orc("Storm"),
    new Humain("Bloom"),
    new Elfe("Musa"),
];


$personnage[0]->attaquer($personnage[1]);
$personnage[1]->attaquer($personnage[2]);
$personnage[2]->attaquer($personnage[0]);
