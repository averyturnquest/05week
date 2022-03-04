<?php
function get_items_by_category($category_id){
    global $db;
    if($category_id){
        $query = 'SELECT T.ItemNum, T.Title, T.Description, C.categoryName FROM todoitems T 
        LEFT JOIN categories C ON T.categoryID = C.categoryID
        WHERE T.categoryID = :category_id ORDER BY ItemNum';        
    } else{
        $query = 'SELECT T.ItemNum, T.Title, T.Description, C.categoryName FROM todoitems T 
        LEFT JOIN categories C ON T.categoryID = C.categoryID ORDER BY C.categoryID';
    }
    $statement = $db->prepare($query);
    if($category_id){
        $statement->bindValue(':category_id', $category_id);
    }
        $statement->execute();
        $todoItems = $statement->fetchAll();
        $statement->closeCursor();
        return $todoItems;
}

function delete_item($itemNum){
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($category_id, $title, $description){
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES (:newtitle,:newdescription,:categoryID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':newtitle', $title);
    $statement->bindValue(':newdescription', $description);
    $statement->bindValue(':categoryID', $category_id);
    $statement->execute();
    $statement->closeCursor();
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

?>