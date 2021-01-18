<?php
include("header.php");

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion

$requete = $db->prepare("SELECT pro_id, pro_ref, pro_libelle, pro_prix, pro_couleur, pro_stock,
pro_d_ajout, pro_d_modif, pro_bloque FROM produits WHERE ISNULL(pro_bloque) ORDER BY pro_d_ajout DESC");
$requete->execute();

$produit = $requete->fetch(PDO::FETCH_OBJ);


if (empty($produit->pro_id)) 
    {
        // Pas d'enregistrement
       echo "La table est vide";
}else{

echo "<table>";
?>
<div class="row mx-3 table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="table-secondary">
                <td>Photo</td>
                <td>ID</td>
                <td>Référence</td>
                <td>Libellé</td>
                <td>Prix</td>
                <td>Couleur</td>
                <td>Stock</td>
                <td>Ajout</td>
                <td>Modif</td>
                <td>Bloqué</td>
            </tr>
        </thead>

        <?php
while(isset($produit->pro_id)){
    echo"<tr>";
    echo"<td></td>";
    echo"<td>".$produit->pro_id."</td>";
    echo"<td>".$produit->pro_ref."</td>";
    echo '<td class="bg-warning"><b><u><a class="text-danger" href="details.php?id='.$produit->pro_id.'" title='.$produit->pro_libelle.'>'.strtoupper($produit->pro_libelle).'</a></u></b></td>';
    echo"<td>".$produit->pro_prix."</td>";
    echo"<td>".$produit->pro_couleur."</td>";
    echo"<td>".$produit->pro_stock."</td>";
    echo"<td>".$produit->pro_d_ajout."</td>";
    echo"<td>".$produit->pro_d_modif."</td>";
    echo"<td>".$produit->pro_bloque."</td>";
    echo"</tr>";
    $produit=$requete->fetch(PDO::FETCH_OBJ);
} 
echo "</table>"; 
}
$requete->closeCursor();
?>
    </table>
</div>


<?php
include("footer.php");
?>