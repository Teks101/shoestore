
<?php $title = 'login';?>
<?php include 'header.php'; ?>


<form action="process_login.php" class="login-form">
    <h1>Login</h1>
    <div class="login-text">
        <input type="text" name="" id="">
        <span data-placeholder="Username"></span>
    </div>

    <div class="login-text">
        <input type="password" name="" id="">
        <span data-placeholder="Password"></span>
    </div>

    <input type="submit" value="Login" class="logbtn">

    <div class="bottom-text">
        Don't have an account <a href="register.php"> Sign Up </a>
    </div>
</form>


<?php include 'footer.php'; ?>