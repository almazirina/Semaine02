<?php
include("header.php");
?>

<body>
<div class="row justify-content-center"> 
<div class="col-lg-8 col-sm-10">
<h3 class="row justify-content-center">Formulaire d'ajout.</h3><hr>
<form action="produits_ajout_script.php" method="POST">
<div class="form-group">
  <label>Référence :</label>
  <input type="text" class="form-control" name="ref" value=""><br>
  <label>Catègorie :</label>
  <input type="text" class="form-control" name="cat" value=""><br>
  <label>Libellè :</label>
  <input type="text" class="form-control" name="lib" value=""><br>
  <label>Description :</label>
  <textarea rows="3" class="form-control" name="desc" placeholder=""></textarea><br>
  <label>Prix :</label>
  <input type="text" class="form-control" name="prix" value=""><br>
  <label>Stock :</label>
  <input type="text" class="form-control" name="stock" value=""><br>
  <label>Couleur :</label>
  <input type="text" class="form-control" name="coul" value=""><br>

  <label>Produit bloqué ? :</label>
  <div class="form-row">
    <div class="custom-control custom-control-inline custom-radio">
      <input class="custom-control-input" type="radio" id="oui">
      <label class="custom-control-label" for="oui">Oui</label>
    </div>

    <div class="custom-control custom-control-inline custom-radio">
      <input class="custom-control-input" type="radio" id="non">
      <label class="custom-control-label" for="non">Non</label>
    </div>
  </div><br>

  <label>Date d'ajout :</label>
  <input type="date" class="form-control" name="aj" value=""><br>
  <label>Date de modification :</label>
  <input type="text" disabled class="form-control" name="modif" value=""><br>
  
  <input type="reset" class="btn btn-secondary mb-3" value="Annuler">
  <input type="submit" class="btn btn-warning mb-3" value="Modifier">
</div>
</form>
</div>
</div>

</body>
</html>

<?php
include("footer.php");
?>