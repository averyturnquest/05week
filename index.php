<?php
require ('model/database.php');
require('model/category_db.php');
require('model/item_db.php');


    $itemNum = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title' , FILTER_UNSAFE_RAW); 
    $description = filter_input(INPUT_POST, 'description' , FILTER_UNSAFE_RAW);
    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_UNSAFE_RAW);
    
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if(!$category_id){
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    }
    

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'list_items';
    }
}

switch($action){
    case "list_categories":
        $categories = get_categories();
        include('view/category_list.php');
        break;
    case "add_category":
        add_category($category_name);
        header("Location: .?action=list_categories");
        break;
    case "add_item":
        if($category_id && $description && $title){
            add_item($category_id, $title, $description);
            header("Location .?category_id=$category_id");
        } else {
            $error = "Invalid ToDo item data. Check all fields and try again.";
            include('view/error.php');
            exit();
        }
        break;
    case "delete_category":
        if($category_id){
            try{
                delete_category($category_id);
            } catch(PDOException $e){
                $error = "You cannot delete a category if items exist in the category";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_categories");
        }
        break;
    case "delete_item":
        if($itemNum){
            delete_item($itemNum);
            header("Location: .?category_id=$category_id");
        } else{
            $error = "Missing or incorrect item num";
            include('view/error.php');
        }
    default:
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $todoItems = get_items_by_category($category_id);
        include('view/item_list.php');
}


?>