<?php session_start(); ?>

<?php $title = 'add product'; ?>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<?php 

$username = '';

$product = '';

//check if user id is set
if(! isset($_SESSION['userid'])) {
  header("Location: login.php");
}

//check if username is set
if(! isset($_SESSION['username'])) {
  header("Location: login.php");
}


$alert_message = "product successfully added";

if(isset($_SESSION['username'])){
  $alert_message = "username = " . $_SESSION['username'];
  $username = $_SESSION['username'];
} else {
  $alert_message = "username not set";
}


if(isset($_GET['product'])) {
  $alert_message = "product successfully added to shopping cart";
  echo "<script type='text/javascript'>alert(\"$alert_message\");</script>";
  
  header: 'products.php';
}

  //change header
?>
<div class="user-header">Hello <?php echo $username; ?>,</div>


<div class="product-card">
  <h1>Original Shoes</h1>
  <p>Custom made shoes</p>
  <div class="product-pic"></div>
  <div class="product-colors">
      <span class="blue active" data-color="#7ed6df" data-pic="url(img/1.png)" name="1"></span>
      <span class="green" data-color="#badc58" data-pic="url(img/2.png)" name="2"></span>
      <span class="yellow" data-color="#f9ca24" data-pic="url(img/3.png)" name="3"></span>
      <span class="rose" data-color="#ff7979" data-pic="url(img/4.png)" name="4"></span>
    </div>
    <div class="product-info">
      <div class="product-price">R999</div>
      <!-- <input type="button" class="product-button" name="submit" value="Add to Cart"> -->
      <a href="products.php?product=1" id="add-to-cart" class="product-button">Add to Cart</a>
    </div>
  </div>

  <script>
    $(".product-colors span").click(function(){
        $(".product-colors span").removeClass("active");
        $(this).addClass("active");
        $("body").css("background",$(this).attr("data-color"));
        $(".product-price").css("color",$(this).attr("data-color"));
        $(".product-button").css("color",$(this).attr("data-color"));
        
        $(".product-pic").css("background-image",$(this).attr("data-pic"));

        $("#add-to-cart").attr("href", 'products.php?product=' + $(this).attr("name"));
        //$.post('process_add_to_cart.php',{'product':product});
      });
  </script>

    
<?php include 'footer.php'; ?>
