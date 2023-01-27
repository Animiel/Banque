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

    public function crediterCompte(Compte_bancaire $compte, int $montant) {
        // if ($compte->getLibelle() != 0) {
        //     echo "Mauvais compte à créditer.<br>";
        // }
        if ($montant <= 0) {
            echo "Veuillez entrer un montant positif et non nul à créditer.<br>";
        }
        else {
            $compte->setSoldeTotal($montant);
            echo "Vous avez crédité le compte ".$compte->getLibelle()." de $montant ".$compte->getLibelle().". Vous avez actuellement ".$compte->getSoldeTotal()." ".$compte->getDevise()." sur votre compte.<br>";
        }
    }

    public function debiterCompte(Compte_bancaire $compte, int $montant) {
        // if ($compte->getLibelle() != 0) {
        //     echo "Mauvais compte à débiter.<br>";
        // }
        if ($montant <= 0) {
            echo "Veuillez entrer un montant positif et non nul à débiter.<br>";
        }
        elseif ($compte->getSoldeTotal() - $montant <= 0) {
            echo "Vous avez retiré ".$compte->getSoldeTotal()." ".$compte->getDevise()." de votre compte ".$compte->getLibelle()." Votre compte est donc vide.<br>";
        }
        elseif ($compte->getSoldeTotal() >= $montant) {
            $compte->setSoldeTotal2($montant);
            echo "Vous avez débité votre compte ".$compte->getLibelle()." de $montant ".$compte->getDevise().". Il vous reste ".$compte->getSoldeTotal()." ".$compte->getDevise()." sur votre compte.<br>";
        }
    }

    public function virement(Compte_bancaire $compte1, Compte_bancaire $compte2, int $montant) {
        if ($montant > $compte1->getSoldeTotal()) {
            echo "Solde insuffisant sur votre compte ".$compte1->getLibelle()." pour effectuer le virement.<br>";
        }
        elseif ($montant <= 0) {
            echo "Veuillez saisir un montant positif et non nul pour effectuer le virement.<br>";
        }
        else {
            $compte1->setSoldeTotal2($montant);
            $compte2->setSoldeTotal($montant);
            echo "Vous avez effectué un virement de $montant ".$compte1->getDevise()." de votre compte ".$compte1->getLibelle()." vers votre compte ".$compte2->getLibelle().".<br> Voici vos soldes actuels :<br>
            ".$compte1->getLibelle()." : ".$compte1->getSoldeTotal()." ".$compte1->getDevise()."<br>
            ".$compte2->getLibelle()." : ".$compte2->getSoldeTotal()." ".$compte2->getDevise()."<br>";
        }
    }

    public function afficherTituComptes() {
        
        return $this."<br>";
    }

    public function detailComptes() {
        $result= "<br>";
        foreach ($this->listeComptes as $compte) {
            $result.= $compte."<br>";
        }
        return $result;
    }

    public function __toString() {
        return "Titulaire des comptes : $this->nom $this->prenom<br>
        Date de naissance : ".$this->naissance->format("d/m/Y")."<br>
        Age : ".$this->age()."<br>
        Domicile : $this->ville<br>
        Nombres de comptes : ".count($this->listeComptes)."<br>
        Detail des comptes : ".$this->detailComptes();
    }
}
?>