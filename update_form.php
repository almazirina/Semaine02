<?php
include("header.php"); 
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET['id'];

$requete = ('SELECT pro_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock,
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

<form method="POST" action="update_script.php">
<div class="form-group">
  <label>ID :</label>
  <input type="text" id="" class="form-control" readonly value="<?php echo $produit->pro_id; ?>"><br>

  <label>Référence :</label>
  <input type="text" id="refer" class="form-control" value="<?php echo $produit->pro_ref; ?>"><br>

  <label>Catègorie :</label>
  <select id="categ" class="form-control" value="<?php echo $produit->cat_nom; ?>">
  <option value="id1">Outillage</option>
  <option value="id2">Outillage manuel</option>
  <option value="id3">Outillage mécanique</option>
  <option value="id4">Plants et semis</option>
  <option value="id5">Arbres et arbustes</option>
  <option value="id6">Pots et accessoires</option>
  <option value="id7">Mobilier de jardin</option>
  <option value="id8">Matériaux</option>
  <option value="id9">Tondeuses éléctriques</option>
  <option value="id10">Tondeuses à moteur thermique</option>
  <option value="id11">Débroussailleuses</option>
  <option value="id12">Sécateurs</option>
  <option value="id13">Brouettes</option>
  <option value="id14">Tomates</option>
  <option value="id15">Poireaux</option>
  <option value="id16">Salade</option>
  <option value="id17">Haricots</option>
  <option value="id18">Thuyas</option>
  <option value="id19">Oliviers</option>
  <option value="id20">Pommiers</option>
  <option value="id21">Pots de fleurs</option>
  <option value="id22">Soucoupes</option>
  <option value="id23">Supports</option>
  <option value="id24">Transats</option>
  <option value="id25">Parasols</option>
  </select><br>

  <label>Libellè :</label>
  <input type="text" id="libel" class="form-control" value="<?php echo $produit->pro_libelle; ?>"><br>

  <label>Description :</label>
  <textarea rows="3" id="descr" class="form-control" placeholder="<?php echo $produit->pro_description; ?>"></textarea><br>

  <label>Prix :</label>
  <input type="text" id="prix" class="form-control" value="<?php echo $produit->pro_prix; ?>"><br>

  <label>Stock :</label>
  <input type="text" id="stock" class="form-control" value="<?php echo $produit->pro_stock; ?>"><br>

  <label>Couleur :</label>
  <input type="text" id="couleur" class="form-control" value="<?php echo $produit->pro_couleur; ?>"><br>

  <label>Extension de la photo :</label>
  <input type="text" id="photo" class="form-control" value=""><br>

  <label>Produit bloqué ? :</label>
<!-- pour info, un RADIO doit avoir le même name -->
  <div class="form-row" id="bloc">
    <div class="custom-control custom-control-inline custom-radio">
      <input class="custom-control-input" type="radio" id="oui">
<!-- Rappel : le 'for' du label = 'id' de l'input -->
      <label class="custom-control-label" for="oui">Oui</label>
    </div>
    <div class="custom-control custom-control-inline custom-radio">
      <input class="custom-control-input" type="radio" id="non">
      <label class="custom-control-label" for="non">Non</label>
    </div>
  </div><br>

  <label>Date d'ajout :</label>
  <input type="text" id="ajout" readonly class="form-control" value="<?php echo $produit->pro_d_ajout; ?>"><br>

  <label>Date de modification :</label>
  <input type="text" id="modif" readonly class="form-control" value="<?php echo $produit->pro_d_modif; ?>"><br>

  <a href="details.php?id=<?php echo intval($_GET['id'])?>" class="btn btn-secondary mb-3" role="button">Retour</a>
  <input type="submit" class="btn btn-success ml-3 mb-3" value="Enregistrer">
</div>

</form>
</div>
</div>

</body>
</html>

<?php
include("footer.php");
?>