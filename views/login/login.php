<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div id="wrapper">
    <header>
        <h1>Hello, Customer</h1>
    </header>
    <main>
        <form class="left-form" action="login.php" method="post">
            <h3>Login</h3>
            <div class="input-group">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <label for="pass">
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </label
                    ><input type="password" id="pass" class="form-control" placeholder="Password">
            </div>
            <button>
                <span class="glyphicon glyphicon-send"></span>
                <span>Send</span>
            </button>
            <button>
                <span class="glyphicon glyphicon-cog"></span>
                <span>Options</span>
            </button>
        </form>
        <form class="right-form" action="login.php" method="post">
            <h3>Register</h3>
            <div class="input-group">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="input-group">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                <input type="password" class="form-control" placeholder="Confirm password">
            </div>
            <button>
                <span class="glyphicon glyphicon-send"></span>
                <span>Send</span>
            </button>
        </form>
    </main>
</div>
</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 24.9.2015 ã.
 * Time: 16:24
 */