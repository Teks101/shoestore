<?php session_start(); ?>

<?php $title = 'index'; ?>
<?php include 'config/db.php'; ?>
<?php include 'config/user.php'; ?>
<?php include 'config/viewuser.php'; ?>

<?php include 'config/loggedin.php'; ?>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>


<?php header("Location: products.php")?>



<?php include 'footer.php'; ?>
