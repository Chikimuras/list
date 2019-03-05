<?php
header("Content-type: application/json");
//DataBase Connection
try{
    $bdd = new PDO('mysql:host=localhost;dbname=wishlist;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{

    die(json_encode(array("error" => 'Erreur: '. $e->getMessage())));
}


//Delete item
if(isset($_POST['id'])){
    
    $itemID = intval($_POST['id']);

    $req_delete_item = $bdd->prepare("DELETE FROM list_items  WHERE id = :itemID;");
    $req_delete_item->execute(array(':itemID' => $itemID));

    $affected_rows = $req_delete_item->rowCount();
    if($affected_rows > 0) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array('error' => "No matching record found for that ID (".htmlentities($itemID).")"));
    }
}else{

    echo json_encode(array("error" => 'Id don\'t exist'));
}