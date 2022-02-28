<?php
require ('model/database.php');
require('model/category_db.php');
require('model/item_db.php');


    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title' , FILTER_UNSAFE_RAW); 
    $description = filter_input(INPUT_POST, 'description' , FILTER_UNSAFE_RAW);
    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_UNSAFE_RAW);
    $itemNum = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
        $action = 'list_items';
    }
}

if( $action == 'list_items') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $todoItems = get_items_by_category($category_id);
    include('view/item_list.php');
} else if ($action == 'delete_item'){
    $itemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE || $itemNum == NULL || $itemNum == FALSE) { 
        $error = "Missing or incorrect item id or category id."; include('database_error.php');
    } else { 
        delete_item($itemNum); 
        header("Location: .?category_id=$category_id"); 
    } 
} else if ($action == 'show_add_form') { 
    $categories = get_categories(); 
    include('add_item_form.php'); 
} else if ($action == 'add_item') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title' , FILTER_UNSAFE_RAW); 
    $description = filter_input(INPUT_POST, 'description' , FILTER_UNSAFE_RAW);
    if ($category_id == NULL || $category_id == FALSE || $title == NULL || $title == NULL || $description == NULL || $description == FALSE) { 
        $error = "Invalid item data. Check all fields and try again."; include('model/error.php');
    } else {
    add_item($category_id, $title, $description); 
    header("Location: .?category_id=$category_id");
    include('add_item_form.php');
    }
} else if ($action == 'add_category'){

} else if ($action == 'delete_category'){

}
