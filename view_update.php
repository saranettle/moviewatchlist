<?php include 'database.php'; ?>
<?php
	$query = "SELECT * FROM movies ORDER BY title";
	$movies = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>List of Movie Recommendations</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<header>
	<div class="container">
	  <div class="row">

	<section class="col-sm-12 col-md-8">
<h1>Movie Recommendations</h1>
</section>
<section class="col-sm-12 col-md-4">
	<ul>
		<li><a href="index.php">Recommend a movie</a>
		</section>

	</div>
</div>
	</header>

</div>

<div class="container">
  <div class= "row">
    <section class= "col-sm-12 col-md-4">

			<p>Here is a list of all the movie recommendations I have received so far.</p>
			<p>COMING SOON: An option to delete movies off this list!</p>

		</section>

		<section class="col-sm-12 col-md-8">


<div class="table-responsive">
  <table class="table table-striped table-condensed">
    <tr>
        <th>Title</th>
        <th>Release Date</th>
        <th>Genre</th>
        <th>Summary</th>
    </tr>


<?php while( $row = mysqli_fetch_assoc($movies) ) :  ?>

<tr>

    <td><?php echo stripslashes($row['title']); ?></td>
    <td><?php echo $row['year']; ?></td>
    <td><?php echo $row['genre']; ?></td>
    <td><?php echo $row['summary']; ?></td>
</tr>

<?php endwhile;  ?>


</table>
</section>
</div>
</div>
</div>



</div>
</body>
</html>
