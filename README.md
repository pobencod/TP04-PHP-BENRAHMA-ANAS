# TP04-PHP-BENRAHMA-ANAS
TP 04 PHP — Programmation Web 2 — 2026/2027`
# Réponses

## Partie 0

0.1. `$v2` est une seconde instance, indépendante de `$v1`.

0.2. La propriété `couleur` et `setCouleur()` sont ajoutées dans `partie0.php`.

0.3. Non. Chaque objet possède son propre état ; modifier `$v1->marque` ne modifie pas `$v2->marque`.

## Partie 1

1.1. `cin`, `dateNaissance` et `getAge()` provoquent une erreur d'accès, car ils sont privés.

1.2. Un `cin` public pourrait être modifié ou lu directement sans validation ni contrôle.

1.3. Une méthode privée est utilisable par les autres méthodes de sa classe, par exemple `__toString()` peut appeler `getAge()`.

1.4. Depuis l'extérieur, `protected` reste inaccessible. Une classe fille peut toutefois y accéder.

## Partie 2

2.1.a. `new Voiture("Noire")` utilise la vitesse par défaut. `new Voiture(120)` provoque une `TypeError`.

2.1.b. La promotion de propriétés déclare et initialise la propriété dans la signature du constructeur, avec moins de répétition.

2.2.a. PHP n'autorise pas deux méthodes `__construct()` dans une même classe : une erreur fatale est produite.

2.2.b. Un seul constructeur avec des paramètres optionnels permet de créer un objet vide ou renseigné.

2.2.c. Une fabrique nommée est une méthode statique comme `depuisTableau()` qui construit un objet depuis une autre représentation.

2.3. `unset()` détruit immédiatement l'objet. Sans `unset()`, le destructeur est appelé à la fin du script. Plusieurs objets sont généralement détruits dans l'ordre inverse de leur création.

## Partie 3

3.1. Les quatre méthodes magiques sont implémentées dans `partie3.php`. Avec `__unset()` qui remet une chaîne vide, `isset()` reste vrai car la propriété existe et n'est pas `null`.

3.2. Sans `__set()`, une affectation externe à une propriété privée est interdite. Avec `__set()`, elle passe par une validation contrôlée.

3.3. Oui, une implémentation trop permissive de `__set()` peut contourner l'encapsulation. Il faut vérifier le nom, le type et les règles métier.

3.4. Un nom vide ou de moins de deux caractères déclenche `InvalidArgumentException`.

## Partie 4

4.1. `__toString()` est une méthode de `Personne`, donc elle peut appeler sa méthode privée `getAge()`.

4.2. Avec une déclaration `: string`, retourner un entier provoque une `TypeError`.

4.3. `__toString()` permet d'utiliser directement l'objet dans `echo`, une concaténation ou une interpolation.

## Partie 5

5.1. La chaîne contient le nom et l'âge, mais pas le mot de passe.

5.2. Sans `__serialize()`, les propriétés privées peuvent apparaître dans la représentation sérialisée. Cela peut divulguer des données sensibles.

5.3. Après `unserialize()`, le mot de passe vaut une chaîne vide. Une vraie application doit demander une nouvelle authentification ou gérer un secret sécurisé, sans stocker un mot de passe en clair.

5.4. `unserialize()` sur des données utilisateur peut permettre une PHP Object Injection. Pour des échanges de données, utiliser `json_encode()` et `json_decode()` avec validation.

## Partie 6

6.1.a. `Chat extends Animal` avec une méthode `miauler()` est ajouté dans `partie6.php`.

6.1.b. Non, un chien n'est pas un chat et ne possède pas la méthode `miauler()`.

6.2.a. Sans `parent::__construct($nom)`, la propriété obligatoire du parent n'est pas initialisée.

6.2.b. `protected` autorise la classe fille à utiliser `$nom`, tandis que `private` le réserve à `Personne`.

6.3.a. Une méthode `final` ne peut pas être redéfinie, une classe `final` ne peut pas être étendue, et une propriété `readonly` ne peut pas être réaffectée après son initialisation.

6.3.b. `readonly` convient à un identifiant ou une date de création. `final` convient à une méthode de sécurité ou à une classe dont le comportement ne doit pas être modifié.

6.4.a. Une méthode `private` du parent n'est pas accessible dans la fille ; `protected` est la visibilité adaptée.

6.4.b. Une propriété privée appartient uniquement à la classe qui la déclare, même si la fille est une `Personne`.

6.4.c. `parent::__toString()` réutilise la logique commune et évite les duplications.

## Partie 7

7.1. La formule contient une erreur de syntaxe : `$this->montant 1` n'est pas une expression PHP valide.

7.2. La bonne formule est `montant * (1 + interet / 100)`.

7.3. L'énoncé demande montant puis intérêt. Inverser les paramètres peut produire des comptes avec des valeurs incohérentes, sans erreur si les types sont identiques.

7.4. Le code corrigé utilise `float`, des types de retour, la formule des intérêts composés et `number_format()`. Après 10 ans, les montants sont environ 1 037,50 DH et 4 072,24 DH.

## Synthèse

1. Une classe est un modèle ; un objet est une instance concrète de ce modèle.
2. La POO favorise la réutilisation, l'encapsulation et la maintenance du code.
3. `private` et `protected` empêchent les modifications directes non contrôlées et protègent l'état interne.
4. `private` est limité à la classe déclarante ; `protected` est aussi accessible aux classes filles.
5. Les méthodes magiques sont normalement `public`. PHP tolère des exceptions pour certaines méthodes comme `__construct()`, `__destruct()` et `__clone()`, selon les règles de visibilité du langage.
