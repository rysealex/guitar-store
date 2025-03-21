<?php 
require('model/database.php');
require('model/category_db.php');
require('model/product_db.php');
require('model/customer_db.php');
require('model/address_db.php');

// get action
$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
}

if ($action == null) {
    $categories = get_categories();
    include 'home.php';
} else {
    if ($action == 'category_name') {
        $categories = get_categories();
        $category_id = filter_input(INPUT_GET, 'category_id',
        FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false) {
            $category_id = 1;
        }
        if ($category_id == 1) {
            include 'products/guitars.php';
        } else {
            include 'home.php';
        }
    } else if ($action == 'products') {
        $categories = get_categories();
        $category_id = filter_input(INPUT_POST, 'category',
            FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false) {
            $category_id = 1; // default category
            $category_name = get_category_name($category_id);
            $products = get_product($category_id);
        } else {
            // get category name and products
            $category_name = get_category_name($category_id);
            $products = get_product($category_id);
        }
        include 'products/product_list.php';
    } else if ($action == 'shipping') {
        $categories = get_categories();
        include 'shipping.php';
    } else if ($action == 'support') {
        $categories = get_categories();
        include 'support.php';
    } else if ($action == 'customer_login') {
        $categories = get_categories();
        include 'customer/customer_login.php';
    } else if ($action == 'customer_page') {
        $categories = get_categories();
        $email_address = filter_input(INPUT_POST, 'email');
        if ($email_address == null || $email_address == false) {
            $email_address = filter_input(INPUT_GET, 'email');
        }
        $customer_info = get_customer_info_by_email_address($email_address);
        
        if ($customer_info == null || $customer_info == false) {
            $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
            $customer_info = get_customer_info($customer_id);
        }
        
        // check if the customer info can be found in the database
        if ($customer_info == null || $customer_info == false) {
            echo '<script>alert("Customer not found, please use valid credentials");</script>';
            include 'customer/customer_login.php';
        } else {
            // get all the states here
            $states = get_states();
            // customer information here
            $fname = $customer_info['first_name'];
            $lname = $customer_info['last_name'];
            
            $billing_address_id = $customer_info['billing_address_id'];
            $shipping_address_id = $customer_info['shipping_address_id'];
            // billing address information here
            $billing_address_info = get_address($billing_address_id);
            $billing_address_1 = $billing_address_info[0]['line1'];
            $billing_address_2 = $billing_address_info[0]['line2'];
            $billing_city = $billing_address_info[0]['city'];
            $billing_state = $billing_address_info[0]['state'];
            $billing_zip = $billing_address_info[0]['zip_code'];
            $billing_phone = $billing_address_info[0]['phone'];
            // shipping address information here
            $shipping_address_info = get_address($shipping_address_id);
            $shipping_address_1 = $shipping_address_info[0]['line1'];
            $shipping_address_2 = $shipping_address_info[0]['line2'];
            $shipping_city = $shipping_address_info[0]['city'];
            $shipping_state = $shipping_address_info[0]['state'];
            $shipping_zip = $shipping_address_info[0]['zip_code'];
            $shipping_phone = $shipping_address_info[0]['phone'];
            include 'customer/customer.php'; 
        }
    } else if ($action == 'update_customer_info') {
        $categories = get_categories();
        $email_address = filter_input(INPUT_POST, 'email');

        if ($email_address == null || $email_address == false) {
            $email_address = filter_input(INPUT_GET, 'email');
        }
        $customer_info = get_customer_info_by_email_address($email_address);
        
        if ($customer_info == null || $customer_info == false) {
            $customer_id = filter_input(INPUT_POST, 'get_customer_id', FILTER_VALIDATE_INT);
            $customer_info = get_customer_info($customer_id);
        }

        $customer_id = $customer_info['customer_id']; 

        // get customer information from customer page
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $password = filter_input(INPUT_POST, 'password');
        
        // update the customer info
        update_first_name($customer_id, $fname);
        update_last_name($customer_id, $lname);
        update_email_address($customer_id, $email_address);
        // check if the password is not empty and update accordingly
        if ($password != null) {
            update_password($customer_id, md5($password));
        }

        $states = get_states();
        
        // get the billing address id
        $billing_address_id = $customer_info['billing_address_id'];
        $updated_billing_address_info = get_address($billing_address_id);
        // the udpated billing address information array
        $updated_billing_address_arr = array($updated_billing_address_info[0]['line1'], 
                $updated_billing_address_info[0]['line2'], 
                $updated_billing_address_info[0]['city'], 
                $updated_billing_address_info[0]['state'],
                $updated_billing_address_info[0]['zip_code'],
                $updated_billing_address_info[0]['phone']);
        
        $billing_address_1 = $updated_billing_address_arr[0];
        $billing_address_2 = $updated_billing_address_arr[1];
        $billing_city = $updated_billing_address_arr[2];
        $billing_state = $updated_billing_address_arr[3];
        $billing_zip = $updated_billing_address_arr[4];
        $billing_phone = $updated_billing_address_arr[5];
        
        $shipping_address_id = $customer_info['shipping_address_id'];
        $updated_shipping_address_info = get_address($shipping_address_id);

        $updated_shipping_address_arr = array($updated_shipping_address_info[0]['line1'], 
                $updated_shipping_address_info[0]['line2'], 
                $updated_shipping_address_info[0]['city'], 
                $updated_shipping_address_info[0]['state'],
                $updated_shipping_address_info[0]['zip_code'],
                $updated_shipping_address_info[0]['phone']);
        
        $shipping_address_1 = $updated_shipping_address_arr[0];
        $shipping_address_2 = $updated_shipping_address_arr[1];
        $shipping_city = $updated_shipping_address_arr[2];
        $shipping_state = $updated_shipping_address_arr[3];
        $shipping_zip = $updated_shipping_address_arr[4];
        $shipping_phone = $updated_shipping_address_arr[5];
        
        include 'customer/customer.php';
    } else if ($action == 'update_billing_address') {
        $categories = get_categories();

        $customer_id = filter_input(INPUT_POST, 'get_customer_id', FILTER_VALIDATE_INT);

        $customer_info = get_customer_info($customer_id);

        $billing_address_id = $customer_info['billing_address_id'];
        $billing_address_info = get_address($billing_address_id);
        
        // get billing address information from customer page
        $billing_address_1 = filter_input(INPUT_POST, 'billing-address1');
        $billing_address_2 = filter_input(INPUT_POST, 'billing-address2');
        $billing_city = filter_input(INPUT_POST, 'billing-city');
        $billing_state = filter_input(INPUT_POST, 'billing-state');
        $billing_zip = filter_input(INPUT_POST, 'billing-zip');
        $billing_phone = filter_input(INPUT_POST, 'billing-phone');
        
        // new billing address information
        $new_billing_address_info = array($billing_address_1, $billing_address_2,
            $billing_city, $billing_state, $billing_zip, $billing_phone);
        
        // udpate the billing address
        update_address($billing_address_id, $new_billing_address_info);

        $fname = $customer_info['first_name'];
        $lname = $customer_info['last_name'];
        $email_address = $customer_info['email_address'];
        
        $shipping_address_id = $customer_info['shipping_address_id'];
        
        $states = get_states();
        
        $updated_billing_address_info = get_address($billing_address_id);

        $updated_billing_address_arr = array($updated_billing_address_info[0]['line1'], 
                $updated_billing_address_info[0]['line2'], 
                $updated_billing_address_info[0]['city'], 
                $updated_billing_address_info[0]['state'],
                $updated_billing_address_info[0]['zip_code'],
                $updated_billing_address_info[0]['phone']);
        
        $updated_shipping_address_info = get_address($shipping_address_id);

        $updated_shipping_address_arr = array($updated_shipping_address_info[0]['line1'], 
                $updated_shipping_address_info[0]['line2'], 
                $updated_shipping_address_info[0]['city'], 
                $updated_shipping_address_info[0]['state'],
                $updated_shipping_address_info[0]['zip_code'],
                $updated_shipping_address_info[0]['phone']);
        
        $shipping_address_1 = $updated_shipping_address_arr[0];
        $shipping_address_2 = $updated_shipping_address_arr[1];
        $shipping_city = $updated_shipping_address_arr[2];
        $shipping_state = $updated_shipping_address_arr[3];
        $shipping_zip = $updated_shipping_address_arr[4];
        $shipping_phone = $updated_shipping_address_arr[5];
        
        include 'customer/customer.php';
        
    } else if ($action == 'update_shipping_address') {
        $categories = get_categories();
        
        $customer_id = filter_input(INPUT_POST, 'get_customer_id', FILTER_VALIDATE_INT);
        
        $customer_info = get_customer_info($customer_id);

        $shipping_address_id = $customer_info['shipping_address_id'];
        $shipping_address_info = get_address($shipping_address_id);
        
        // get shipping address information from customer page
        $shipping_address_1 = filter_input(INPUT_POST, 'shipping-address1');
        $shipping_address_2 = filter_input(INPUT_POST, 'shipping-address2');
        $shipping_city = filter_input(INPUT_POST, 'shipping-city');
        $shipping_state = filter_input(INPUT_POST, 'shipping-state');
        $shipping_zip = filter_input(INPUT_POST, 'shipping-zip');
        $shipping_phone = filter_input(INPUT_POST, 'shipping-phone');
        
        // new shipping address information
        $new_shipping_address_info = array($shipping_address_1, $shipping_address_2,
            $shipping_city, $shipping_state, $shipping_zip, $shipping_phone);
        
        // udpate the billing address
        update_address($shipping_address_id, $new_shipping_address_info);
        
        $fname = $customer_info['first_name'];
        $lname = $customer_info['last_name'];
        $email_address = $customer_info['email_address'];
        
        $billing_address_id = $customer_info['billing_address_id'];
        
        $states = get_states();
        
        $updated_shipping_address_info = get_address($shipping_address_id);

        $updated_shipping_address_arr = array($updated_shipping_address_info[0]['line1'], 
                $updated_shipping_address_info[0]['line2'], 
                $updated_shipping_address_info[0]['city'], 
                $updated_shipping_address_info[0]['state'],
                $updated_shipping_address_info[0]['zip_code'],
                $updated_shipping_address_info[0]['phone']);      
        
        $updated_billing_address_info = get_address($billing_address_id);

        $updated_billing_address_arr = array($updated_billing_address_info[0]['line1'], 
                $updated_billing_address_info[0]['line2'], 
                $updated_billing_address_info[0]['city'], 
                $updated_billing_address_info[0]['state'],
                $updated_billing_address_info[0]['zip_code'],
                $updated_billing_address_info[0]['phone']);
        
        $billing_address_1 = $updated_billing_address_arr[0];
        $billing_address_2 = $updated_billing_address_arr[1];
        $billing_city = $updated_billing_address_arr[2];
        $billing_state = $updated_billing_address_arr[3];
        $billing_zip = $updated_billing_address_arr[4];
        $billing_phone = $updated_billing_address_arr[5];
        
        include 'customer/customer.php';
    }
    else {
        $categories = get_categories();
        include 'home.php';
    }
}
?>