<?php 
require_once('function_admin.php');
?>
<link rel="stylesheet" type="text/css" href="admin.css" />
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">

<body>
  <div class="container">

    <h1 id="app-title">La liste des petits pieds</h1>
    <form method="post" action="index.php" id="form-add-cat" class="form-add">
      <label for="newCategory">Ajouter une nouvelle catégorie:</label><br>
      <input type="text-area" name="newCategory" class="input-cat"><br>
      <input type="submit" name="valider" value="Valider" class="button">
    </form>

    <table>
      <caption>Catégorie</caption>
      <?php while ($donne = $req_get_category->fetch()){
    ?>
      <tr>
        <form method="get" action="#">
          <td>
            <?php echo '<a href="listbycategorie.php?id=' . $donne['id']. '">'?>
            <?php echo htmlentities($donne['category']) ?></a>
          </td>
        </form>
      </tr>
  </div>
</body>
<?php
}?>