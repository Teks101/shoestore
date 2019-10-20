<?php session_start(); ?>

<?php $title = 'register';?>
<?php include 'config/db.php'; ?>
<?php include 'config/user.php'; ?>
<?php include 'config/viewuser.php'; ?>
<?php include 'header.php'; ?>

<?php


$email = '';
$username = '';
$password = '';
$password_r = '';
$errors = "";
$alert_message = "";
$error_count = 0;


    if(isset($_POST['submit'])) {

        //start session after the user clicks the login button
        session_start();


        //Set variables from $_POST

        if(isset($_POST['email'])) {

            $email = $_POST['email'];

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $error_count++;
            }
                ;
        } 

        if(isset($_POST['username'])) {

            $username = $_POST['username'];
        } 

        if(isset($_POST['pass'])) {

            $password = $_POST['pass'];
        }

        if(isset($_POST['pass_r'])) {

            $password_r = $_POST['pass_r'];
        }

        if($password != $password_r) {
            $message = "Passwords don't match";
            echo "<script type='text/javascript'>alert(\"$message\");</script>";
        }

        $user = new ViewUser();
        $emailExists = $user->checkEmailExists($email);
        $usernameExists = $user->checkUsernameExists($username);


        if($usernameExists) {
            $message = "User name exists in database";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $error_count++;
        }

        if($emailExists) {
            $message = "Email exists in database";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $error_count++;
        }


        if($error_count == 0) {
            $user->addUser($username, $email, $password);
            $message = "Successully added user";
            echo "<script type='text/javascript'>alert('$message');</script>";
            

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
        
    }
?>

<form action="register.php" method="post" class="login-form">
    <h1>Sign Up</h1>

    <div class="login-text">
        <input type="email" name="email" id="" value="<?php echo $email;?>" required > 
        <span data-placeholder="Email"></span>
    </div>

    <div class="login-text">
        <input type="text" name="username" id="" value="<?php echo $username;?>"required >
        <span data-placeholder="Username"></span>
    </div>

    <div class="login-text">
        <input type="password" name="password" id="" required>
        <span data-placeholder="Password"></span>
    </div>

    <div class="login-text">
        <input type="password" name="password_r" id="" required>
        <span data-placeholder="Repeat Password"></span>
    </div>

    <input type="submit" name="submit" value="Register" class="login-button">

    <div class="bottom-text">
        Already have an account <a href="login.php"> Login </a>
    </div>
</form>


<?php include 'footer.php'; ?>