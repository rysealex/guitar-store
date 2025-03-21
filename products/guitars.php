<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/guitars.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bxslider@4.2.17/dist/jquery.bxslider.min.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <h1>Our Guitars</h1>
            <h3>Check out our fine selection of premium guitars!</h3>
            <div class="slider">
                <div><img src="images\guitars\Caballero11.png" title="Caballero 11"></div>
                <div><img src="images\guitars\FenderStratocaster.png" title="Fender Stratocaster"></div>
                <div><img src="images\guitars\GibsonLesPaul.png" title="Gibson Les Paul"></div>
                <div><img src="images\guitars\GibsonSB.png" title="Gibson SB"></div>
                <div><img src="images\guitars\WashburnD10S.png" title="Washburn D10S"></div>
                <div><img src="images\guitars\YamahaFG700S.png" title="Yamaha FG700S"></div>
            </div>    
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bxslider@4.2.17/dist/jquery.bxslider.min.js"></script>
    <script src="scripts\date.js"></script>
    <script src="scripts\guitars.js"></script>
</body>
</html>

