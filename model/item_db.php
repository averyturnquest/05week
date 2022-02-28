<?php
function get_items_by_category($category_id){
    global $db;
    $query = 'SELECT * FROM todoitems
    WHERE categoryID = :category_id
    ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $todoItems = $statement->fetchAll();
    $statement->closeCursor();
    return $todoItems;
}

function get_item($itemNum){
    global $db;
    $query = 'SELECT * FROM todolist
    WHERE ItemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
}

function add_item($category_id, $title, $description){
    global $db;
    $query = 'INSERT INTO `todoitems`(`Title`, `Description`, `categoryID`) VALUES (:newtitle,:newdescription,:categoryID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':newtitle', $title);
    $statement->bindValue(':newdescription', $description);
    $statement->bindValue(':categoryID', $category_id);
    $statement->execute();
    $statement->closeCursor();
    echo "<meta http-equiv='refresh' content='0'>";
}

function delete_item($itemNum){
    global $db;
    $query = 'DELETE FROM `todoitems` WHERE `ItemNum` = :itemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemNum', $itemNum);
        $statement->execute();
        $statement->closeCursor();
        echo "<meta http-equiv='refresh' content='0'>";
}



?>