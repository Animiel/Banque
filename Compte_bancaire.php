<?php
class Compte_bancaire {
    private string $libelle;
    private int $soldeInit;
    private int $soldeTotal;
    private string $devise;
    private Titulaire $personne;

    public function __construct(string $libelle, string $devise, Titulaire $personne) {
        $this->libelle = $libelle;
        $this->soldeInit = 0;
        $this->soldeTotal = 0;
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

    public function crediterCompte(Compte_bancaire $compte, int $montant) {
        if ($this->libelle != $compte->libelle) {
            echo "Mauvais compte à créditer.<br>";
        }
        elseif ($montant <= 0) {
            echo "Veuillez entrer un montant positif et non nul à créditer.<br>";
        }
        else {
            $this->soldeTotal += $montant;
            echo "Vous avez crédité le compte $this->libelle de $montant $this->devise. Vous avez actuellement $this->soldeTotal $this->devise sur votre compte.<br>";
        }
    }

    public function debiterCompte(Compte_bancaire $compte, int $montant) {
        if ($this->libelle != $compte->libelle) {
            echo "Mauvais compte à débiter.<br>";
        }
        elseif ($montant <= 0) {
            echo "Veuillez entrer un montant positif et non nul à débiter.<br>";
        }
        elseif ($this->soldeTotal - $montant <= 0) {
            echo "Vous avez retiré $this->soldeTotal $this->devise de votre compte $this->libelle. Votre compte est donc vide.<br>";
        }
        elseif ($this->soldeTotal >= $montant) {
            $this->soldeTotal -= $montant;
            echo "Vous avez débité votre compte $this->libelle de $montant $this->devise. Il vous reste $this->soldeTotal $this->devise sur votre compte.<br>";
        }
    }

    public function virement(Compte_bancaire $compte1, Compte_bancaire $compte2, int $montant) {
        if ($montant > $compte1->soldeTotal) {
            echo "Solde insuffisant sur votre compte $compte1->libelle pour effectuer le virement.<br>";
        }
        elseif ($montant <= 0) {
            echo "Veuillez saisir un montant positif et non nul pour effectuer le virement.<br>";
        }
        else {
            $compte1->soldeTotal -= $montant;
            $compte2->soldeTotal += $montant;
            echo "Vous avez effectué un virement de $montant $this->devise de votre compte $compte1->libelle vers votre compte $compte2->libelle. Voici vos soldes actuels :<br>
            $compte1->libelle : $compte1->soldeTotal $compte1->devise<br>
            $compte2->libelle : $compte2->soldeTotal $compte2->devise<br>";
        }
    }

    public function detailCompte() {
        return $this;
    }

    public function __toString() {
        return "Le $this->libelle appartenant à $this->personne ayant pour solde initial : $this->soldeInit $this->devise comprend actuellement un solde de $this->soldeTotal $this->devise.<br>";
    }
}
?>