<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>The Guitar Store</title> 
        <link rel="stylesheet" href="../styles/main.css">
        <link rel="stylesheet" href="../styles/products.css">
</head>

<body>
    
    <?php include "../view/header/php"; ?>
    <?php include "../view/nav/php"; ?>
    
    <main>
        <?php include '../view/aside.php'; ?>
       <section>
            <h1>Database Error</h1>
            <p class="first_paragraph">There was an error connecting to the database.</p>
            <p>The database must be installed as described in the appendix.</p>
            <p>MySQL must be running as described in chapter 1.</p>
            <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
       </section>
    </main>
    
    <?php include '../view/footer.php'; ?>

</body>

</html>