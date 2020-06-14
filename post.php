<?php
	require('C:\xampp\htdocs\website\config\dp.php');
	require('C:\xampp\htdocs\website\config\config.php');

	if (isset($_POST['delete'])){
		//Get form data
		$delete_id=mysqli_real_escape_string($conn,$_POST['delete_id']);
		
		$query = "DELETE FROM posts WHERE id = {$delete_id}";

		if(mysqli_query($conn,$query)){
			header('Location: '.ROOT_URL.'');
		} else{
			echo 'ERROR: ' .mysqli_error($conn);
		}
	}

	//get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//Create Query
	$query = 'SELECT *FROM posts WHERE id ='.$id;

	//get result
	$result = mysqli_query($conn,$query);

	//fecth data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	//free result
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);
?>

	<?php include('C:\xampp\htdocs\website\inc\header.php'); ?>
			<div class="container">
				<br>
				<a href="<?php echo ROOT_URL; ?>"><h5><<-Back</h5></a>
				<br>
				<br>
				<h1><?php echo $post['title']; ?></h1>	
				<small>Created on<?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
				<p><?php echo $post['body']; ?></p>
				<hr>

				<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
					
				</form>
				<br>

				<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>
			</div>

	<?php include('C:\xampp\htdocs\website\inc\fotter.php'); ?>
