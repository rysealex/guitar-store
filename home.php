<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Guitar Store</title> 
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <h1>Welcome to the Guitar Store!</h1>
            <p>Why buy from the Guitar Store? We have the world's largest selection
                of guitars, plus lots of other musical instruments. We let you try
                before you buy, so you can ensure the instrument is right for you.
                Our website is easy to navigate and, if you need help, an associate
                is seconds away. Finally, we can also help you learn to play an
                instrument. If you already know how, we can help you improve!</p>
            <p>For expert advice, you can call us at 855-770-3373 or click the Live
                Chat button and an associate will be right with you.</p>
            <h2>Featured Product</h2>
            <a href="?action=ludwig_pic">
                <img src="images/drums/LudwigDrumSet.png" alt="Ludwig Drum Set">
            </a>
            <p>
                <a href="?action=ludwig">Ludwig Element Evolution 5-piece Drum Set - Red Sparkle Finish</a>
            </p>
            <h3>Our guarantee</h3>
            <p>If you aren't completely satisfied with anything you buy from our
                store, you can return it for a full refund. 
                <strong>No questions asked!</strong></p> 
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
</body>    
</html>