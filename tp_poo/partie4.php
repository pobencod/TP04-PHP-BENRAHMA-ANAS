<?php

class Personne
{
    private string $nom;
    private string $prenom;
    private string $dateNaissance;

    public function __construct(string $nom, string $prenom, string $dateNaissance)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    private function getAge(): int
    {
        return (new DateTime($this->dateNaissance))->diff(new DateTime())->y;
    }

    public function __toString(): string
    {
        return "{$this->prenom} {$this->nom} ({$this->getAge()} ans)";
    }
}

$p = new Personne('Hachimi', 'Sara', '2000-05-14');
echo $p . PHP_EOL;

// __toString() appartient à la classe : elle peut donc appeler getAge().
// La méthode doit retourner une chaîne ; un entier provoque une TypeError.
