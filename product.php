<?php

session_start();
if(count($_SESSION)>0)
{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshmart</title>
    
    <link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/ionicons.min.css">

 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/grid.css">
    <link rel="stylesheet" href="resources/css/style_index.css">
    <link href='https://fonts.googleapis.com/css?family=Almendra' rel='stylesheet'>
    
    <style>
       header{
            height: 50%;
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("resources/css/img/bgpages.jpg");

        }
        .bcontent {
            margin-top: 10px;
        } 
        .card-text {
            font-family: 'Almendra';
        }
        .card-img{
            width: 450px;
            height:100%;
            margin-right:50%;
            padding-right:40%;
            
        }
        .no-gutters{
            margin-left: 0px;
            padding-left:0px;
        }
        .card-body{
            margin-left:40%;
        }
        
    </style> 
</head>
<body>

    <!-- HEADER AND NAVBAR -->
    <header>

    <nav>
            <div class="row">
                <a href="index.php"><img src="resources/img/logo-white.png" alt="Omnifood Logo" class="logo"></a>
                <a href="index.php"><img src="resources/img/logo-black.png" alt="Omnifood logo" class="logo-black"></a>
                <ul class="main-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="categ.php">Categories</a></li>
                   <?php
                        if(count($_SESSION)>0)
                        {
                            ?>
                            <li><a href="mycart.php"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>
                            
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="myProfile.php"><i class="ion-ios-person-outline icon-small" style="color: #fff;"></i><?php echo $_SESSION["username"];?></a></li>
                            
                            <?php
                        }
                        else
                        {
                   ?>
                    <li><a href="login_sess.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                    <?php
                        }
                    ?>
                 


                </ul>
            </div>
        </nav>

    </header>
    <!-- FEATURES SECTION  -->
    
    <section class="features js--section-features js--wp-1">
        
        <div class="row">


            
            <h2>

               We promise to find the best product for you and get it delivered at your door-step!

            </h2>
        </div>
<br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_freshmart";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$prod_name=$_GET['pro'];
$sql = "SELECT * FROM products WHERE name='$prod_name'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $record = mysqli_fetch_array($resultset) ) {
?>

<center>

<div class="container bcontent">
    

        <form method="post" action="mycart.php?&action=add&id=<?php echo $record["id"]; ?>">
        <div class="card  shadow mb-4 " style="max-width: 700px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src=<?php echo "resources/img/$record[img]";?> class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $record['name']; ?></h5>
        <p class="card-text">Quantity:&nbsp;&nbsp;<?php echo $record['quantity']; ?><br>Seller:&nbsp;&nbsp;<?php echo $record['seller']; ?><br>Price:&nbsp;&nbsp;Rs. </b><?php echo $record['price']; ?></p>
        
        <div class="cart-action"><br>
        <label for="quantity">Enter product quantity:</label>
        <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
        <br><br><input type="submit" value="Add to Cart" class="btn btn-full btnAddAction" /></div>
      </div>
    </div>

  </div>
  </div>
  </form>
    
   
    <br><br><br>

<?php }

?>
</div>
</center>
<br><br><br>

    </section>

    <?php
   include 'C:\xampp\htdocs\freshmart\footer.php';
   ?>


<!-- Js plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="resources/Js/script.js"></script>



</body>

</html>

<?php
}
?>