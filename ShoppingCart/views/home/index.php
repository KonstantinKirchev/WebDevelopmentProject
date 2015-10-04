<?php if(!isset($_SESSION['username'])){?>
<h1>Welcome! <br/> Please register to our site or if you are already registered please login!</h1>
<?php } else { ?>
<h1>Welcome <?= htmlspecialchars($_SESSION['username'])?>! <br/> Please make your choice from above menu!</h1>
<?php }
if(!isset($_SESSION['username'])){?>
    <div>
<a href="/account/register">Register</a>
<br/>
<a href="/account/login">Login</a>
    </div>
<?php }?>

