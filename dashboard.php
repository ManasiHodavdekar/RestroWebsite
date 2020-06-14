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
                <a class="nav-link active nav-color" href="http://localhost/website/index.php">Dashboard</a>
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


		<div style="clear:both"></div>
		<br />
		<br />
		<br />
		<div class="table-responsive">
			<table class="table">
				<tr><th colspan="5"><h3>Orders</h3><th></tr>
				<tr>
					<th width="10%">Bill Id</th>
					<th width="20%">Items</th>
					<th width="10%">Total</th>
					<th width="20%">BMode</th>
					<th width="15%">Customer Id</th>
					<th width="10%">Checked</th>
				<tr>
				<?php
					$conn = mysqli_connect("localhost","id11454502_root","12345","id11454502_cart");
					if($conn-> connect_error){
						die("Connection failed:".$conn->connect_error);
					}

				$sql = "SELECT Bill_id,Items,total,BMode,customer_id,checked from bill ";
				$result = $conn->query($sql);

				//$RM="Read More";
				
				if($result-> num_rows > 0){
					while($row = $result -> fetch_assoc()){
						echo "<tr><td>".$row["Bill_id"]."</td><td>".$row["Items"]."</td><td>". $row["total"] ."</td><td>". $row["BMode"]."</td><td>". $row["customer_id"]. "</td><td>". $row["checked"]. "</td></tr>";
					}
					echo "</table>";
				}
				else{
					echo "0 result";
				}

				$conn-> close();

				?>
				
			</table>
		</div>
	</div>
	</body>
</html>
