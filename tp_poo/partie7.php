<?php

class Compte
{
    private float $montant;
    private float $interet;

    public function __construct(float $montantInitial, float $interet)
    {
        if ($montantInitial < 0 || $interet < 0) {
            throw new InvalidArgumentException('Le montant et le taux doivent être positifs.');
        }

        $this->montant = $montantInitial;
        $this->interet = $interet;
    }

    public function unAn(): void
    {
        $this->montant *= 1 + ($this->interet / 100);
    }

    public function getMontant(): float
    {
        return $this->montant;
    }
}

$c1 = new Compte(400.0, 10.0);
$c2 = new Compte(2500.0, 5.0);

for ($i = 0; $i < 10; $i++) {
    $c1->unAn();
    $c2->unAn();
}

echo 'Valeur du compte 1 = '
    . number_format($c1->getMontant(), 2, ',', ' ')
    . " dirhams" . PHP_EOL;
echo 'Valeur du compte 2 = '
    . number_format($c2->getMontant(), 2, ',', ' ')
    . " dirhams" . PHP_EOL;

// Formule : montant après un an = montant * (1 + taux / 100).
// Le constructeur suit l'énoncé : montant initial puis intérêt.
