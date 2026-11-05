<?php

class Voiture
{
    public string $marque = '';
    public string $couleur = '';

    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    public function setCouleur(string $couleur): void
    {
        $this->couleur = $couleur;
    }

    public function afficher(): void
    {
        echo "Marque : {$this->marque} | Couleur : {$this->couleur}" . PHP_EOL;
    }
}

$v1 = new Voiture();
$v1->setMarque('Toyota');
$v1->setCouleur('Bleue');

$v2 = new Voiture();
$v2->setMarque('Renault');
$v2->setCouleur('Rouge');

$v1->afficher();
$v2->afficher();

// Chaque objet possède sa propre valeur de $marque.
