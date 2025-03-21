<?php
// get the address information from the database
function get_address($address_id) {
    global $db;
    $query = 'SELECT * 
              FROM addresses
              WHERE address_id = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->execute();    
    $address = $statement->fetchAll();
    $statement->closeCursor();    
    return $address; 
}

// update the adress information
function update_address($address_id, $address_info) {
    global $db;
    $query = 'UPDATE addresses
              SET line1 = :line1,
                  line2 = :line2,
                  city = :city,
                  state = :state,
                  zip_code = :zip_code,
                  phone = :phone
              WHERE address_id = :address_id';
    $statement = $db->prepare($query);
    $size = count($address_info);
    $address_array = array('line1', 'line2', 'city', 'state', 'zip_code', 'phone');
    for ($i = 0; $i < $size; $i++) {
        $statement->bindValue(':'.$address_array[$i], $address_info[$i]);
    }
    $statement->bindValue(':address_id', $address_id);
    $statement->execute();
    $statement->closeCursor();
}

// get all the states from the state_tax_rates table
function get_states() {
    global $db;
    $query = 'SELECT state 
              FROM state_tax_rates
              ORDER BY state';
    $statement = $db->prepare($query);
    $statement->execute();
    $states = $statement->fetchAll();
    $statement->closeCursor();
    return $states;
}
     
?>