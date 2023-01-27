<?php
include 'Titulaire.php';
include 'Compte_bancaire.php';

$p1 = new Titulaire("NOM", "PRENOM", $var = new DateTime("1999-11-23"), "Strasbourg");
$c1 = new Compte_bancaire("Livret A", "euros", $p1);
$c2 = new Compte_bancaire("LEP", "euros", $p1);

echo $c1->detailCompte();
?>