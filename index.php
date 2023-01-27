<?php
include 'Titulaire.php';
include 'Compte_bancaire.php';

$var = new DateTime("1999-11-23");
$p1 = new Titulaire("NOM", "PRENOM", $var, "Strasbourg");
$c1 = new Compte_bancaire("Libelle", "euros", $p1);

// echo $p1->listeComptes;
?>