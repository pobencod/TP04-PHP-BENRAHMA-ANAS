<?php

class Voiture
{
    public function __construct(
        public string $couleur = 'Blanche',
        public int $vitesse = 0
    ) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function afficher(): void
    {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

$v1 = new Voiture();
$v2 = new Voiture('Rouge', 50);
$v1->afficher();
$v2->afficher();

unset($v1);
echo "Fin du script." . PHP_EOL;

// new Voiture('Noire') est valide : la vitesse garde sa valeur par défaut.
// new Voiture(120) déclenche une TypeError : 120 n'est pas une chaîne.
// La promotion de propriétés réduit la répétition de déclaration et d'initialisation.
// PHP ne surcharge pas les constructeurs : un seul __construct() est autorisé.
