<?php
	require('C:\xampp\htdocs\website\config\dp.php');
	require('C:\xampp\htdocs\website\config\config.php');

	if (isset($_POST['submit'])){
		//Get form data
		$title = mysqli_real_escape_string($conn,$_POST['title']);
		$body = mysqli_real_escape_string($conn,$_POST['body']);
		$author = mysqli_real_escape_string($conn,$_POST['author']);

		$query = "INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";

		if(mysqli_query($conn,$query)){
			header('Location: '.ROOT_URL.'');
		} else{
			echo 'ERROR: ' .mysqli_error($conn);
		}
	}

?>
<?php include('C:\xampp\htdocs\website\inc\header.php'); ?>
			
			<div class="container">
			<h1>Add Post</h1>
			<br>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label>Author</label>
					<input type="text" name="author" class="form-control">
				</div>
				<div class="form-group">
					<label>Body</label>
					<textarea name="body" class="form-control"></textarea>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</form>
			</div>
			
<?php include('C:\xampp\htdocs\website\inc\fotter.php'); ?>
