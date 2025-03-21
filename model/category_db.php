<?php
// get all categories from the database
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY category_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;    
}

// get specified category from corresponding category_id
function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE category_id = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['category_name'];
    return $category_name;
}
?>