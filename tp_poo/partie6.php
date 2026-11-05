<?php

class Personne
{
    public function __construct(
        protected string $nom,
        protected string $prenom,
        protected string $dateNaissance
    ) {
    }

    protected function getAge(): int
    {
        return (new DateTime($this->dateNaissance))->diff(new DateTime())->y;
    }

    public function __toString(): string
    {
        return "{$this->prenom} {$this->nom} ({$this->getAge()} ans)";
    }
}

class Etudiant extends Personne
{
    private string $cne;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $cne
    ) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->cne = $cne;
    }

    public function getCne(): string
    {
        return $this->cne;
    }

    public function __toString(): string
    {
        return parent::__toString() . " | CNE : {$this->cne}";
    }
}

class Animal
{
    public function manger(): void
    {
        echo "Je mange." . PHP_EOL;
    }
}

class Chien extends Animal
{
    public function aboyer(): void
    {
        echo "Wouf !" . PHP_EOL;
    }
}

class Chat extends Animal
{
    public function miauler(): void
    {
        echo "Miaou !" . PHP_EOL;
    }
}

$chien = new Chien();
$chien->manger();
$chien->aboyer();

$etudiants = [
    new Etudiant('Alaoui', 'Ahmed', '2001-02-10', 'CNE001'),
    new Etudiant('Bennani', 'Sara', '2000-07-22', 'CNE002'),
    new Etudiant('Chakir', 'Youssef', '2002-01-15', 'CNE003'),
    new Etudiant('El Amrani', 'Nora', '2001-11-03', 'CNE004'),
    new Etudiant('Fathi', 'Omar', '2000-09-18', 'CNE005'),
];

foreach ($etudiants as $etudiant) {
    echo $etudiant . PHP_EOL;
}

// Un Chien n'a pas accès à miauler(), car cette méthode appartient à Chat.
// protected permet à Etudiant d'utiliser getAge() et dateNaissance.
// Avec private, ces membres restent accessibles uniquement à Personne.
// parent::__toString() évite de dupliquer la logique d'affichage commune.
