<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Guitar Store</title> 
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/customer_login.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <form action="?action=customer_page" method="POST">
                <h2>Customer Login</h2>
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email">
                <input type="submit" id="login" value="Login">
            </form>
            <form action="home">
                <input type="button" id="cancel" value="Cancel">
            </form>
            <!-- embedded script for invalid email address -->
            <script>
                "use strict";
                
                const $ = selector => document.querySelector(selector);
                
                const checkEmailAddress = (email) => {
                    // check if not in valid email format
                    const regex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                    if (!regex.test(email)) {
                        alert("Invalid email address");
                        $("#email").value = email;
                        $("#email").focus();
                        event.preventDefault();
                    }
                };
                
                document.addEventListener("DOMContentLoaded", () => {
                    $("#login").addEventListener("click", () => {
                        const email = $("#email").value;
                        checkEmailAddress(email);
                    });
                    // clear the email address input field
                    $("#cancel").addEventListener("click", () => {
                        $("#email").value = "";
                        $("#email").focus();
                    });
                });
            </script>
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
</body>    
</html>