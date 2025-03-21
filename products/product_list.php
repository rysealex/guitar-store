<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>The Guitar Store</title> 
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/products.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <h1>Product List</h1>
            <form action="?action=products" method="POST">
                <select name="category">
                    <?php foreach($categories as $category) : ?>
                        <?php if($category['category_id'] == $category_id): ?>
                        <option selected value="<?php echo $category_id; ?>" name="category">
                            <?php echo htmlspecialchars($category_name);?>
                        </option>
                        <?php else : ?>
                        <option value="<?php echo $category['category_id']; ?>" name="category">
                            <?php echo htmlspecialchars($category['category_name']) ?>
                        </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <p><==</p>
                <input type="submit" value="Choose">
            </form>
            <h2><?php echo htmlspecialchars($category_name); ?></h2>
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th class="price">Price</th>
                    <th></th>
                    <th class="right"></th>
                </tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['product_id']); ?></td>
                    <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                    <td class="price"><?php echo htmlspecialchars($product['list_price']); ?></td>
                    <td>
                        <form action="?action=edit" method="POST">
                            <input type="submit" value="Edit">
                        </form> 
                    </td>
                    <td class="right">
                        <form action="?action=delete" method="POST">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <a href="?action=add">Add Product</a>
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
    
</body>

</html>
