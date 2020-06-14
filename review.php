<?php
	require('C:\xampp\htdocs\website\config\dp.php');
	require('C:\xampp\htdocs\website\config\config.php');

	//Create Query
	$query = 'SELECT *FROM posts ORDER BY created_at DESC';

	//get result
	$result = mysqli_query($conn,$query);

	//fecth data
	$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//var_dump($posts);

	//free result
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);
?>
<?php include('C:\xampp\htdocs\website\inc\header.php'); ?>
			<div class="container">
			<h1>Posts &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo ROOT_URL; ?>addpost.php" class="btn btn-outline-primary btn-lg">Add Post</a></h1>
			<br>

			<?php foreach ($posts as $post) :?>
				<div class="well">
					<h3><?php echo $post['title']; ?></h3>
					<small>Created on<?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
					<p><?php echo $post['body']; ?></p>
					<a href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
					<hr>
					<br>
					<br>
				</div>
			<?php endforeach; ?>
		<?php include('C:\xampp\htdocs\website\inc\fotter.php'); ?>
