<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Guitar Store</title> 
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/customer.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <div class="customer-info">
                <h2>Customer Information</h2>
                <form action="?action=update_customer_info" method="POST">
                    <input type="hidden" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>" 
                           name="get_customer_id">
                    <p>
                        <label for="fname">First name:</label>
                        <input type="text" id="fname" value="<?php echo htmlspecialchars($fname); ?>" name="fname">
                    </p>
                    <p>
                        <label for="lname">Last name:</label>
                        <input type="text" id="lname" value="<?php echo htmlspecialchars($lname); ?>" name="lname">
                        <span id="#update_success"></span>
                    </p>
                    <p>
                        <label for="email">Email:</label>
                        <input type="text" id="email" value="<?php echo htmlspecialchars($email_address); ?>" name="email">
                    </p>
                    <p>
                        <label for="password">Password:</label>
                        <input type="password" id="password" value="<?php echo htmlspecialchars($password); ?>" name="password">
                    </p>
                    <p>
                        <label for="confirm">Confirm Password:</label>
                        <input type="password" id="confirm">
                    </p>
                    <p>
                        <input type="submit" id="update-customer-info" 
                               value="Update Customer Information" name="update_customer_info">
                    </p> 
                </form>
                
            </div>
            <div class="billing-address">
                <h2>Billing Address</h2>
                <form action="?action=update_billing_address" method="POST">
                    <input type="hidden" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>" 
                           name="get_customer_id">
                    <p>
                        <label for="billing-address1">Address line 1:</label>
                        <input type="text" id="billing-address1" 
                               value="<?php echo htmlspecialchars($billing_address_1); ?>" name="billing-address1">
                    </p>
                    <p>
                        <label for="billing-address2">Address line 2:</label>
                        <input type="text" id="billing-address2" 
                               value="<?php echo htmlspecialchars($billing_address_2); ?>" name="billing-address2">
                    </p>
                    <p>
                        <label for="billing-city">City:</label>
                        <input type="text" id="billing-city" 
                               value="<?php echo htmlspecialchars($billing_city); ?>" name="billing-city">
                    </p>
                    <p>
                        <label for="billing-state">State:</label>
                        <select name="billing-state" id="billing-state">
                            <?php foreach($states as $state) : ?>
                            <option value="<?php echo htmlspecialchars($state['state']); ?>" name="state"
                                    <?php if (isset($state) && $state['state'] == $billing_state)
                                    { echo 'selected'; } else { echo ""; }?>>
                                    <?php echo htmlspecialchars($state['state']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p>
                        <label for="billing-zip">Zip Code:</label>
                        <input type="text" id="billing-zip" 
                               value="<?php echo htmlspecialchars($billing_zip); ?>" name="billing-zip">
                    </p>
                    <p>
                        <label for="billing-phone">Phone:</label>
                        <input type="text" id="billing-phone" 
                               value="<?php echo htmlspecialchars($billing_phone); ?>" name="billing-phone">
                    </p>
                    <p>
                        <input type="submit" id="update-billing-address" 
                               value="Update Billing Address" name="update_billing_address">
                    </p>
                </form>
                
            </div>
            <div class="shipping-address">
                <h2>Shipping Address</h2>
                <form action="?action=update_shipping_address" method="POST">
                    <input type="hidden" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>" 
                           name="get_customer_id">
                    <p>
                        <label for="shipping-address1">Address line 1:</label>
                        <input type="text" id="shipping-address1" 
                               value="<?php echo htmlspecialchars($shipping_address_1); ?>" name="shipping-address1">
                    </p>
                    <p>
                        <label for="shipping-address2">Address line 2:</label>
                        <input type="text" id="shipping-address2" 
                               value="<?php echo htmlspecialchars($shipping_address_2); ?>" name="shipping-address2">
                    </p>
                    <p>
                        <label for="shipping-city">City:</label>
                        <input type="text" id="shipping-city" 
                               value="<?php echo htmlspecialchars($shipping_city); ?>" name="shipping-city">
                    </p>    
                    <p>
                        <label for="shipping-state">State:</label>
                        <select name="shipping-state"  id="shipping-state">
                            <?php foreach($states as $state) : ?>
                            <option value="<?php echo htmlspecialchars($state['state']); ?>" name="state"
                                    <?php if (isset($state) && $state['state'] == $shipping_state)
                                    { echo 'selected'; } else { echo ""; }?>>
                                    <?php echo htmlspecialchars($state['state']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p>
                        <label for="shipping-zip">Zip Code:</label>
                        <input type="text" id="shipping-zip" 
                               value="<?php echo htmlspecialchars($shipping_zip); ?>" name="shipping-zip">
                    </p>
                    <p>
                        <label for="shipping-phone">Phone:</label>
                        <input type="text" id="shipping-phone" 
                               value="<?php echo htmlspecialchars($shipping_phone); ?>" name="shipping-phone">
                    </p>
                    <p>
                        <input type="submit" id="update-shipping-address" 
                               value="Update Shipping Address" name="update_shipping_address">
                    </p>
                </form>
            </div>
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
    <script src="scripts\customer.js"></script>
</body>    
</html>