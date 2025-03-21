<?php
// get the customer info from the database
function get_customer_info($customer_id) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();    
    $customer = $statement->fetch();
    $statement->closeCursor();    
    return $customer; 
}

// get the customer info by email address from the database
function get_customer_info_by_email_address($email_address) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE email_address = :email_address';
    $statement = $db->prepare($query);
    $statement->bindValue(':email_address', $email_address);
    $statement->execute();    
    $customer = $statement->fetch();
    $statement->closeCursor();    
    return $customer; 
}

// update the first name
function update_first_name($customer_id, $first_name) {
    global $db;
    $query = 'UPDATE customers
              SET first_name = :first_name
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}

// update the last name
function update_last_name($customer_id, $last_name) {
    global $db;
    $query = 'UPDATE customers
              SET last_name = :last_name
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}

// update the email address
function update_email_address($customer_id, $email_address) {
    global $db;
    $query = 'UPDATE customers
              SET email_address = :email_address
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':email_address', $email_address);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}

// update the password
function update_password($customer_id, $password) {
    global $db;
    $query = 'UPDATE customers
              SET password = :password
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}
?>