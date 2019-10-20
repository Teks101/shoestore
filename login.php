<?php session_start(); ?>

<?php $title = 'login';?>
<?php include 'config/db.php'; ?>
<?php include 'config/user.php'; ?>
<?php include 'config/viewuser.php'; ?>
<?php include 'header.php'; ?>

<?php

$username = '';
$password = '';
$userid = '';



if(isset($_POST['submit'])) {

    //start session after the user clicks the login button
    
    //Set variables from $_POST

    if(isset($_POST['username'])) {

        $username = $_POST['username'];
    } 

    if(isset($_POST['password'])) {

        $password = $_POST['password'];
    }


    $user = new ViewUser();

   $isLoggedIn = $user->processLogin($username, $password);
   $userid = $user->processUserID($username, $password);

    if (! $isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;

        if(isset($_SESSION['username'] ) && isset($_SESSION['userid'] ) ) {
           header("Location: index.php");
        }
        
    }
    
    exit();
}
?>

<form action="login.php" method="post" class="login-form">
    <h1>Login</h1>
    <div class="login-text">
        <input type="text" name="username" id="" required>
        <span data-placeholder="Username"></span>
    </div>

    <div class="login-text">
        <input type="password" name="password" id="" required>
        <span data-placeholder="Password"></span>
    </div>

    <input type="submit" name="submit" value="Login" class="login-button">

    <div class="bottom-text">
        Don't have an account <a href="register.php"> Sign Up </a>
    </div>
</form>




<?php include 'footer.php'; ?>