<?php
class Titulaire {
    private string $nom;
    private string $prenom;
    private DateTime $naissance;
    private string $ville;
    // private Compte_bancaire $compte;
    private array $listeComptes;

    public function __construct(string $nom, string $prenom, DateTime $naissance, string $ville, /*Compte_bancaire $compte*/) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->naissance = $naissance;
        $this->ville = $ville;
        $this->listeComptes = [];
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

    public function getNaissance() {
        return $this->naissance;
    }

    public function setNaissance(DateTime $naissance) {
        $this->naissance = $naissance;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille(string $ville) {
        $this->ville = $ville;
    }

    public function ajouterCompte(Compte_bancaire $compte) {
        $this->listeComptes[] = $compte;
    }

    public function age() {
        $now = new DateTime('now');
        $age = date_diff($this->naissance, $now);
        return $age->format('%Y ans');
    }

    public function __toString() {
        return "Titulaire des comptes : $this->nom $this->prenom<br>
        Date de naissance : $this->naissance<br>
        Domicile : $this->ville<br>
        Nombres de comptes :";          /*ajouter la fin*/
    }

    /*fonction Creer un compte*/
}
?>