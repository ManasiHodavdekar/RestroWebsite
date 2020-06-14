<?php
session_start();
$product_ids = array();
//session_destroy();


//check if add to cart button has been submitted
if(filter_input(INPUT_POST,'add_to_cart')){
	if(isset($_SESSION['shopping_cart'])){
		//keep track of how many products are in the shopping cart
		$count = count($_SESSION['shopping_cart']);

		//create sequential array for matching array keys to products ids
		$product_ids = array_column($_SESSION['shopping_cart'],'id');

		if(!in_array(filter_input(INPUT_GET, 'id'),$product_ids))
		{
			$_SESSION['shopping_cart'][$count] = array 
			(
				'id' => filter_input(INPUT_GET, 'id'),
				'name' => filter_input(INPUT_POST, 'name'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
				
			);
		}	
		else{//product alrady exists, increase quantity
			//match array key to id if the product being added to the cart
			for($i=0; $i<count($product_ids); $i++){
				if($product_ids[$i]==filter_input(INPUT_GET,'id')){
				//add item quantity to the existing product to the cart
					$_SESSION['shopping_cart'][$i]['quantity'] +=filter_input(INPUT_POST, 'quantity');
				}
			}
		}
	}
	else{ //if shopping cart doesn't exist first product with array key 0 creat array using submitted form 		data,start from key 0 and fill it with values
		$_SESSION['shopping_cart'][0] = array 
		(
			'id' => filter_input(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'name'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
			
		);

	}
}  
if(filter_input(INPUT_GET,'action') == 'delete'){
	//loop through all products in the shopping cart until it matches with GET id variable
	foreach ($_SESSION['shopping_cart'] as $key => $product) {
		if ($product['id'] == filter_input(INPUT_GET, 'id')){
			//remove product from the shopping cart when it matches with the GET id
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
#pre_r($_SESSION);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';

}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gourmet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
  
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner" class="fix">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark" >
        <div class="container">
          <a class="navbar-brand nav-color" id="html" href="index.html">Gourmet</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">

              <li class="nav-item">
                <a class="nav-link nav-color tada" href="http://localhost/website/gourmet/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active nav-color" href="http://localhost/website/menu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-color" href="http://localhost/website/index.php">Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-color" href="http://localhost/website/gourmet/news.html">News</a> 
              </li>
              <li class="nav-item">
                <a class="nav-link nav-color log" href="http://localhost/website/gourmet/logout.php">LOG OUT</a>

              </li>
            </ul>  
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    <section class="section bg-light  top-slant-white bottom-slant-gray bounceIn" id="menu" >

      	<div class="col-md-12 text-center heading-wrap">
            <h2 >Our Menu</h2>
        </div>
        <br>
            
		<div class="container">
		<?php

			$connect = mysqli_connect('localhost','id11454502_root','12345','id11454502_cart');
			$query = 'SELECT * FROM products ORDER by id ASC';
			$result = mysqli_query($connect,$query);

			if ($result):
				if(mysqli_num_rows($result)>0):
					while($product =  mysqli_fetch_assoc($result)):
					//print_r($product)
					?>
					<div class="col-sm-4 col-md-3">
						<form method="post" action="menu.php?action=add&id=<?php echo $product['id']; ?>">
								<div class="products">
									<img src="<?php echo $product['image']; ?>" class="img-responsive" />
									<h2 class="text-info"><?php echo $product['name']; ?></h2>
									<h6>$ <?php echo $product['price']; ?></h6>
									<input type="text" name="quantity" class="form-control" value="1" />
									<input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
									<input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
									<input type="submit" name="add_to_cart" style="margin-top:2px" class="button button1" value="Add to cart" />
									<br>
									<br>
								</div>
						</form>
					</div>
					<?php
					endwhile;
				endif;
			endif;
			
			//error_reporting(0);

			if (isset($_POST['submit'])){
				//Get form data
				$cust_id = $_SESSION['Userid'];
				$BMode = "COD";
				$checked = 0 ;
				
				$cust_id=(int)$cust_id;
				//echo gettype($cust_id);
				//print_r( $_SESSION['shopping_cart']);

				if(!empty($_SESSION['shopping_cart'])):
						$total = 0;
						$str = "";

						foreach($_SESSION['shopping_cart'] as $key => $product):
							$total = $total + ($product['quantity'] *  $product['price']);
							$str.= $product['name']."(".$product['quantity'].")".",";
						endforeach;
						//echo $total;
						//echo $str;
				endif;
				?>
				<h2 class="text-info"><?php echo "Your Order has been confirmed"; ?>;
				<?php 
				$q = "INSERT INTO bill(total,Items,BMode,customer_id,checked) VALUES($total,'$str','$BMode',$cust_id,$checked)";
				$data = mysqli_query($connect,$q);
				//print_r($q);
			}
		?>
	</section>


		<div style="clear:both"></div>
		<br />
		<div class="table-responsive">
			<table class="table">
				<tr><th colspan="5"><h3>Order Details</h3><th></tr>
				<tr>
					<th width="40%">Product Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
				<tr>
				<?php
				if(!empty($_SESSION['shopping_cart'])):
						$total = 0;

						foreach($_SESSION['shopping_cart'] as $key => $product):

				?>
				<tr>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['quantity']; ?></td>
					<td>$<?php echo $product['price']; ?></td>
					<td>$<?php echo number_format($product['quantity']* $product['price'],2); ?></td>
					<td>
						<a href="menu.php?action=delete&id=<?php echo $product['id']; ?>">
							<div class="btn-danger">Remove</div>
						</a>
					</td>
				</tr>
				<?php
					$total = $total + ($product['quantity'] *  $product['price']);
				endforeach;
				?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right">$<?php echo number_format($total,2); ?></td> 
				<tr>
					<td colspan="5">
						<?php
							if (isset($_SESSION['shopping_cart'])):
							if (count($_SESSION['shopping_cart'])>0):
						?>
						<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
							<input type="submit" name="submit" value="Checkout" class="btn btn-primary">
						</form>
						<?php endif; endif; ?>
					</td>
				</tr>
				<?php
				endif;
				?>
			</table>
		</div>
	</div>
	</body>
</html>
