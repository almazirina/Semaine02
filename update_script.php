<?php

$ref=$_POST['refer'];
$categorie=$_POST['categ'];
$libelle=$_POST['libel'];
$descrip=$_POST['descr'];
$prix=$_POST['prix'];
$sto=$_POST['stock'];
$coul=$_POST['couleur'];
$ph=$_POST['photo'];
$block=$_POST['bloc'];
$aj=$_POST['ajout'];
$modif=$_POST['modif'];

require "connexion_bdd.php"; 
$db = connexionBase();

try {
// Construction de la requête Update sans injection SQL

$requete = $db->prepare("UPDATE produits SET pro_ref=:pro_ref, pro_cat_id=:pro_cat_id, pro_libelle=:pro_libelle,
pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock,
pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_ajout=:pro_d_ajout, pro_d_modif=:pro_d_modif,
pro_bloque=:pro_bloque");

$requete->bindValue(':pro_ref', $ref, PDO::PARAM_STR);
$requete->bindValue(':pro_cat_id', $categorie, PDO::PARAM_STR);
$requete->bindValue(':pro_libelle', $libelle, PDO::PARAM_INT);
$requete->bindValue(':pro_description', $descrip, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', $prix, PDO::PARAM_STR);
$requete->bindValue(':pro_stock', $sto, PDO::PARAM_STR);
$requete->bindValue(':pro_couleur', $coul, PDO::PARAM_STR);
$requete->bindValue(':pro_photo', $ph, PDO::PARAM_STR);
$requete->bindValue(':pro_bloque', $block, PDO::PARAM_STR);
$requete->bindValue(':pro_d_ajout', $aj, PDO::PARAM_STR);
$requete->bindValue(':pro_d_modif', $modif, PDO::PARAM_STR);


$requete->execute();

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