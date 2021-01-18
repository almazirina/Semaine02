<?php
include("header.php"); 
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET['id'];
//var_dump($pro_id);
$requete = ('SELECT pro_ref, pro_libelle, pro_description, pro_prix, pro_stock,
pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque, cat_nom
FROM produits join categories
on categories.cat_id=produits.pro_cat_id WHERE pro_id='.$pro_id);
$result = $db->query($requete);
      
// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();
?>
</head>

<body>
<div class="row justify-content-center"> 
<div class="col-lg-8 col-sm-10">

<form>
<div class="form-group">
  <label>Référence :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_ref; ?>"><br>
  <label>Catègorie :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->cat_nom; ?>"><br>
  <label>Libellè :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_libelle; ?>"><br>
  <label>Description :</label>
  <textarea rows="3" class="form-control" disabled placeholder="<?php echo $produit->pro_description; ?>"></textarea><br>
  <label>Prix :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_prix; ?>"><br>
  <label>Stock :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_stock; ?>"><br>
  <label>Couleur :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_couleur; ?>"><br>

  <label>Produit bloqué ? :</label>
   <div class="form-row">
    <div class="custom-control custom-control-inline custom-radio">
      <input class="custom-control-input" type="radio" id="oui" disabled>
      <label class="custom-control-label" for="oui">Oui</label>
    </div>

    <div class="custom-control custom-control-inline custom-radio">
      <input class="custom-control-input" type="radio" id="non" disabled>
      <label class="custom-control-label" for="non">Non</label>
    </div>
  </div>

  <label>Date d'ajout :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_d_ajout; ?>"><br>
  <label>Date de modification :</label>
  <input type="text" disabled class="form-control" value="<?php echo $produit->pro_d_modif; ?>"><br>
  
  <a href="liste.php" class="btn btn-secondary mb-3" role="button">Retour</a>
  <a class="btn btn-warning ml-3 mb-3" role="button" href="update_form.php?id=<?php echo intval($_GET['id'])?>">Modifier</a>
  <a class="btn btn-danger ml-3 mb-3" role="button" href="delete_script.php?sta_id=<?php echo $_GET['id'] ?>">Supprimer</a>
</div>
</form>
</div>
</div>

</body>
</html>

<?php
include("footer.php");
?>