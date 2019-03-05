<?php 
require_once('function_admin.php');
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="admin.css" />

<body>
    <div class="container">
        <h1 class="category-name">
            <?php echo $displayCategory['category'] ?>
        </h1>
        <form method="post" action="" class="form-add">
            <div class="form-align">
                <label for="newItem">Nom de l'objet</label>
                <input type="text" name="newItem" class="input-cat"><br>
            </div>
            <div class="form-align">
                <label for="itemQuantity">Quantité</label>
                <input type="number" name="itemQuantity" class="input-cat"><br>
            </div>
            <input type="submit" name="valider" value="Valider" class="button">
            <table>
                <caption>Objet</caption>
                <?php while($display_item = $req_display_item->fetch()){?>
                <tr>
                    <td>
                        <?php echo htmlentities($display_item['quantity']) ?>
                        <?php echo htmlentities($display_item['item_name'])?>

                    </td>
                    <td><button type="button" class="delete-item delete-button" data-id="<?php echo $display_item['id']?>"><i
                                class="fas fa-trash-alt"></i></button></td>
                </tr>

                <?php
}
$req_display_item->closeCursor();
?>
        </form>
        </table>
        <div id="return"><a href="index.php">Retour</a></div>
    </div>

    <script src="main.js"></script>

</body>