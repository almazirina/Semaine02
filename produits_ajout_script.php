<?php

$ref=$_POST['ref'];
$cat=$_POST['cat'];
$lib=$_POST['lib'];
$desc=$_POST['desc'];
$prix=$_POST['prix'];
$stock=$_POST['stock'];
$coul=$_POST['coul'];
//$ph=$_POST['photo'];
$block=$_POST['block'];
$aj=$_POST['aj'];
$modif=$_POST['modif'];

require "connexion_bdd.php"; 
$db = connexionBase();

try {
// Construction de la requête INSERT sans injection SQL

$requete = $db->prepare("INSERT INTO produits () VALUES (?,?,?,?,?,?,?,?,?)");

//Exécution de la requête :
$req->execute(array($pro_ref, $pro_libelle, $pro_description, $pro_prix, $pro_stock, $pro_couleur, $pro_bloque, $pro_d_ajout, $pro_d_modif));

// Libération de la connexion au serveur de BDD
$requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {

        echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

// Redirection vers la page liste.php
header("Location: liste.php");
exit;
?>