<?php
$pro_id=$_GET['id'];
require "connexion_bdd.php";

// Construction de la requête DELETE sans injection SQL
$requete = $db->prepare("DELETE FROM produits WHERE pro_id=:pro_id");

$requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);

$requete->execute();

// Libération de la connexion au serveur de BDD
$requete->closeCursor();

// Redirection vers index.php
header("Location: liste.php");
exit;

?>