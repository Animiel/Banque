<?php
class Compte_bancaire {
    private string $libelle;
    private int $soldeInit;
    private string $devise;
    private Titulaire $personne;

    public function __construct(string $libelle, string $devise, Titulaire $personne) {
        $this->libelle = $libelle;
        $this->soldeInit = 0;
        $this->devise = $devise;
        $this->personne = $personne;
        $this->personne->ajouterCompte($this);
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle(string $libelle) {
        $this->libelle = $libelle;
    }

    public function getSolde() {
        return $this->soldeInit;
    }

    public function setSolde(int $solde) {
        $this->soldeInit = $solde;
    }

    public function getDevise() {
        return $this->devise;
    }

    public function setDevise(string $devise) {
        $this->devise = $devise;
    }

    /*incrémenter nb comptes pour une personne à chaque ouverture de libelle + ajouter à array associative --> liste de tous les comptes (?)*/
}
?>