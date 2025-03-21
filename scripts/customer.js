/* The JavaScript for the customer page */
"use strict";

const $ = selector => document.querySelector(selector);

// validate the customer information here
const validateCustomerInfo = (email, password, confirm, event) => {
    // validate the email here
    const email_regex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    if (!email_regex.test(email)) {
        alert("Invalid email address");
        event.preventDefault();
        return false;
    }
    // validate the password here
    if (!password) {
        return true;
    } else {
        const pass_regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (!pass_regex.test(password)) {
            console.log(password);
            alert("Invalid password");
            event.preventDefault();
            return false;
        }
    }
    // confirm the password here
    if (password !== confirm) {
        alert("Passwords must match");
        event.preventDefault();
        return false;
    }
    return true;
};

// validate the billing address here
const validateBillingAddress = (zip, phone, event) => {
    // validate the zip code here
    const zip_regex = /^\d{5}(-\d{4})?(?!-)$/;
    if (!zip_regex.test(zip)) {
        alert("Invalid zip code");
        event.preventDefault();
        return false;
    }
    // validate the phone number here
    const phone_regex = /^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/;
    if (!phone_regex.test(phone)) {
        alert("Invalid phone number");
        event.preventDefault();
        return false;
    }
    return true;
};

// validate the shipping address here
const validateShippingAddress = (zip, phone, event) => {
    // validate the zip code here
    const zip_regex = /^\d{5}(-\d{4})?(?!-)$/;
    if (!zip_regex.test(zip)) {
        alert("Invalid zip code");
        event.preventDefault();
        return false;
    }
    // validate the phone number here
    const phone_regex = /^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/;
    if (!phone_regex.test(phone)) {
        alert("Invalid phone number");
        event.preventDefault();
        return false;
    }
    return true;
};  

document.addEventListener("DOMContentLoaded", () => {
   $("#update-customer-info").addEventListener("click", (event) => {
       const email = String($("#email").value);
       const password = String($("#password").value);
       const confirm = String($("#confirm").value);
       // if the validation passes, set the update success message
       if (validateCustomerInfo(email, password, confirm, event)) {
           $("#update_success").textContent = "Customer Information Updated";
       }
   });
   
   $("#update-billing-address").addEventListener("click", (event) => {
       const zip = String($("#billing-zip").value);
       const phone = String($("#billing-phone").value);
       // if the validation passes, set the update success message
       if (validateBillingAddress(zip, phone, event)) {
           $("#update_success").textContent = "Billing Address Updated";
       }
   });
    
   $("#update-shipping-address").addEventListener("click", (event) => {
       const zip = String($("#shipping-zip").value);
       const phone = String($("#shipping-phone").value);
       // if the validation passes, set the update success message
       if (validateShippingAddress(zip, phone, event)) {
            $("#update_success").textContent = "Shipping Address Updated";
       }
   });
   
   // get the action
   const params = new URLSearchParams(window.location.search);
   const action = params.get('action');
   // check which action clicked and update success message accordingly
   if (action === 'update_customer_info') {
       document.getElementById("#update_success").textContent = "Customer Information Updated";
   }
   else if (action === 'update_shipping_address') {
       document.getElementById("#update_success").textContent = "Shipping Address Updated";
   }
   else if (action === 'update_billing_address') {
       document.getElementById("#update_success").textContent = "Billing Address Updated";
   }
});