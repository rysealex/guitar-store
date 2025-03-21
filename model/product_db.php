<?php
// get product corresponding from the product_id
function get_product($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $product = $statement->fetchAll();
    $statement->closeCursor();
    return $product;
}
?>