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
        <li><a href="/products">Products</a></li>
        <li><a href="/categories">Categories</a></li>
    </ul>
</header>
<?php include_once('views/layouts/messages.php'); ?>
