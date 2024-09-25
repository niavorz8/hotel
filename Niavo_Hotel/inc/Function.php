<?php
    include('Connection.php');

    function login($email, $motdepasse) {
        $msg = "SELECT * FROM users WHERE email = '$email' AND password = '$motdepasse'";
        try {
            $ans = null;
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ans = array(
                    'id' => $result['id'],
                    'username' => $result['username'],
                    'email' => $result['email'],
                    'password' => $result['password']
                );
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $ans;
    }

    function getAllUsers() {
        $msg = "SELECT * FROM users";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    'id' => $result['id'],
                    'username' => $result['username'],
                    'email' => $result['email'],
                    'password' => $result['password']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllGenre() {
        $msg = "SELECT * FROM genre";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "libelle" => $result['libelle']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllPays() {
        $msg = "SELECT * FROM pays";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "libelle" => $result['libelle']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllTypeChambre() {
        $msg = "SELECT * FROM typechambre";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "libelle" => $result['libelle']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllPoste() {
        $msg = "SELECT * FROM poste";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "libelle" => $result['libelle']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllCivilite() {
        $msg = "SELECT * FROM civilite";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "libelle" => $result['libelle']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getSommeClientAnne($annee) {
        $msg = "SELECT count(*) as nbrCli FROM client WHERE YEAR(dateentre) = '$annee'";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0]['nbrCli'];
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getRecetteAnne($annee) {
        $msg = "SELECT sum(prix*DATEDIFF(datesortie, dateentre)) as recette FROM v_client WHERE YEAR(dateentre) = '$annee'";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0]['recette'];
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }
    
    function getSommeTravailleur() {
        $msg = "SELECT count(*) as nbrTravail FROM travailleur";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0]['nbrTravail'];
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllChambre() {
        $msg = "SELECT * FROM v_chambre";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "numero" => $result['numero'],
                    "type" => $result['type'],
                    "nbrlit" => $result['nbrlit'],
                    "prix" => $result['prix'],
                    "typechambrelibelle" => $result['typechambrelibelle']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllClient() {
        $msg = "SELECT * FROM v_client";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "nom" => $result['nom'],
                    "prenom" => $result['prenom'],
                    "sexe" => $result['sexe'],
                    "telephone" => $result['telephone'],
                    "pays" => $result['pays'],
                    "carte" => $result['carte'],
                    "dateentre" => $result['dateentre'],
                    "datesortie" => $result['datesortie'],
                    "chambre" => $result['chambre'],
                    "libellesexe" => $result['libellesexe'],
                    "libellepays" => $result['libellepays'],
                    "numerochambre" => $result['numerochambre'],
                    "prix" => $result['prix']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllClientNonPaye() {
        $msg = "SELECT * FROM v_client_non_paye";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "nom" => $result['nom'],
                    "prenom" => $result['prenom'],
                    "sexe" => $result['sexe'],
                    "telephone" => $result['telephone'],
                    "pays" => $result['pays'],
                    "carte" => $result['carte'],
                    "dateentre" => $result['dateentre'],
                    "datesortie" => $result['datesortie'],
                    "chambre" => $result['chambre'],
                    "libellesexe" => $result['libellesexe'],
                    "libellepays" => $result['libellepays'],
                    "numerochambre" => $result['numerochambre'],
                    "prix" => $result['prix']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function getAllPayement() {
        $msg = "SELECT * FROM v_client_paye";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "nom" => $result['nom'],
                    "prenom" => $result['prenom'],
                    "sexe" => $result['sexe'],
                    "telephone" => $result['telephone'],
                    "pays" => $result['pays'],
                    "carte" => $result['carte'],
                    "dateentre" => $result['dateentre'],
                    "datesortie" => $result['datesortie'],
                    "chambre" => $result['chambre'],
                    "libellesexe" => $result['libellesexe'],
                    "libellepays" => $result['libellepays'],
                    "numerochambre" => $result['numerochambre'],
                    "prix" => $result['prix']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }


    function getAllTravailleur() {
        $msg = "SELECT * FROM travailleur";
        try {
            $array = array();
            $stmt = bdbConnection()->prepare($msg);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $result) {
                $ar = array(
                    "id" => $result['id'],
                    "nom" => $result['nom'],
                    "prenom" => $result['prenom'],
                    "sexe" => $result['sexe'],
                    "telephone" => $result['telephone'],
                    "civilite" => $result['civilite'],
                    "datenaissance" => $result['datenaissance'],
                    "poste" => $result['poste'],
                    "adresse" => $result['adresse'],
                    "carte" => $result['carte'],
                    "salaire" => $result['salaire']
                );
                array_push($array, $ar);
            }
            return $array;
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function addChambre($numero, $type, $nbrlit, $prix) {
        $sql = "INSERT INTO `chambre` (`numero`, `type`, `nbrlit`, `prix`) VALUES ('$numero', '$type', '$nbrlit', '$prix')";
        
        try {
            $stmt = bdbConnection()->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }


    function addClient($nomcl, $prenomcl, $sexecl, $telephonecl, $payscl, $cartecl, $dateentre, $datesortie, $chambre) {
        $sql = "INSERT INTO `client` (`nom`, `prenom`, `sexe`, `telephone`, `pays`, `carte`, `dateentre`, `datesortie`, `chambre`) VALUES ('$nomcl', '$prenomcl', '$sexecl', '$telephonecl', '$payscl', '$cartecl', '$dateentre', '$datesortie', '$chambre')";
        
        try {
            $stmt = bdbConnection()->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function payerChambre($client, $datepayement, $montant) {
        $sql = "INSERT INTO `caisse` (`client`, `datepayement`, `montant`) VALUES ('$client', '$datepayement', '$montant')";
        
        try {
            $stmt = bdbConnection()->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

    function addTravailleur($nom, $prenom, $sexe, $telephone, $civilite, $datenaissance, $poste, $adresse, $carte, $salaire) {
        $sql = "INSERT INTO travailleur (nom, prenom, sexe, telephone, civilite, datenaissance, poste, adresse, carte, salaire) VALUES ('$nom', '$prenom', '$sexe', '$telephone', '$civilite', '$datenaissance', '$poste', '$adresse', '$carte', '$salaire')";
        echo $sql;
        try {
            $stmt = bdbConnection()->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
            return "Erreur";
        }
    }

?>
