<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="styles/shipping.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <h2>Shipping Costs</h2>
            <p>
                <label for="cost">Enter cost of the product:</label>
                <input type="text" id="cost">
                <input type="button" id="calculate" value="Calculate">
            </p>
            <p>
                <label for="totalCost">Total cost, including shipping:</label>
                <input type="text" id="totalCost" disabled>
            </p>
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\shipping.js"></script>
    <script src="scripts\date.js"></script>
</body>

</html>
