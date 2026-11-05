<?php

class Utilisateur
{
    public string $nom;
    public int $age;
    private string $motDePasse;

    public function __construct(string $nom, int $age, string $motDePasse)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->motDePasse = $motDePasse;
    }

    public function __serialize(): array
    {
        return [
            'nom' => $this->nom,
            'age' => $this->age,
        ];
    }

    public function __unserialize(array $data): void
    {
        if (!isset($data['nom'], $data['age'])) {
            throw new InvalidArgumentException('Données utilisateur incomplètes.');
        }

        $this->nom = (string) $data['nom'];
        $this->age = (int) $data['age'];
        $this->motDePasse = '';
    }
}

$u = new Utilisateur('Alice', 25, 'secret123');
$serialise = serialize($u);
echo "Sérialisé : {$serialise}" . PHP_EOL;

$restaure = unserialize($serialise);
var_dump($restaure);

// Le mot de passe est exclu de la sérialisation et est réinitialisé à "".
// Pour des données externes, préférer json_encode/json_decode et valider les données.
