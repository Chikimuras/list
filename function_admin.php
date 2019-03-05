<?php

/* iNFO of DB
table list_items

id
name
quantity

table list_category
id
category

*/


//DataBase Connection
try{
    $bdd = new PDO('mysql:host=localhost;dbname=wishlist;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{

    die('Erreur: '. $e->getMessage());
}



//Add a category
if(!empty($_POST['newCategory'])){
    $newCat = $_POST["newCategory"];

    $req_add_category = $bdd->prepare("INSERT INTO `wishlist`.`list_category` (`category`) VALUES (:newCat);");
    $req_add_category->execute(array(':newCat' => $newCat));
    $req_add_category->closeCursor();

    header("Location: index.php");
    exit();
}


//Category displaying
$req_get_category = $bdd->query('SELECT category, id FROM list_category;');


if(isset($_GET['id'])){
    $categoryID = intval(($_GET['id']));
    //Add an item
    if(!empty($_POST['newItem'])){

        $categoryID = intval(($_GET['id']));

        $newItem = $_POST['newItem'];
        $itemQuantity = intval($_POST['itemQuantity']);

        if(!empty($newItem) && $itemQuantity > 0){

        $req_add_item = $bdd->prepare("INSERT INTO `wishlist`.`list_items` (item_name, quantity, link_to_cat) 
        VALUES (:itemName, :itemQuantity, :categoryID);
        ");
        $req_add_item->execute(array(
        ':itemName' => $newItem,
        ':itemQuantity' => $itemQuantity,
        ':categoryID' => $categoryID
        ));
        $req_add_item->closeCursor();

        header("Location: listbycategorie.php?id=$categoryID");
        exit();
        }
    }


//Obtain id of category


    $req_display_category = $bdd->prepare("SELECT id, category 
    FROM list_category 
    WHERE id = :categoryID;");

    $req_display_category->execute(array(':categoryID' => $categoryID));
    $displayCategory = $req_display_category->fetch();
    $req_display_category->closeCursor();

    //Displaying items from the right category

    $req_display_item = $bdd->prepare('SELECT item_name, quantity, id FROM list_items WHERE link_to_cat = :categoryID;');
    $req_display_item->execute(array(':categoryID' => $categoryID));
}

