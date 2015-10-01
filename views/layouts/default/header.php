<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css" />
    <title><?php echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <a href="/"><img src="/content/images/foodstore.jpg"></a>
    <ul class="menu">
        <li><a href="/">Home</a></li>
        <?php if(isset($_SESSION['username']) && $_SESSION['is_admin'] == 1){?>
            <li><a href="/products">Products</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/users">Users</a></li>
        <?php }else{?>
            <li><a href="/products">Products</a></li>
            <li><a href="/categories">Categories</a></li>
        <?php }?>
    </ul>
    <?php if($this->isLoggedIn){?>
    <div id="logged-in-info">
        <h2>Hello, <?php echo htmlspecialchars($_SESSION['username'])?></h2>
        <a href="cart"><img src="../../../content/images/shopping-cart-button.jpg" alt=""></a>
        <form action="/account/logout"><input type="submit" value="Logout"></form>
    </div>
    <?php }?>
</header>
<?php include_once('views/layouts/messages.php'); ?>
