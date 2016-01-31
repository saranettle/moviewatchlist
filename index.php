<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sara's Movie Watch List - Add A Movie</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
  <script src="js/enter.js"></script>

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
        <li><p><a href="view_update.php">View All Movies</a><p></lil>
      </ul>



  </div>

</div>
  </header>

<div class="container">
  <div class= "row">
    <section class= "col-sm-12 col-md-4">

    	<h1>What movies should I watch?</h1>

      <p>Hi everyone. The other day I realized I pretend to know a lot about movies when in fact, I don't know very much at all! I would like to become a better conversationalist at parties so people think I'm smart, so please recommend me some movies I can watch. In exchange, I will suggest some of my favorite movies so you can become a better conversationalist too.</p>

  </section>

  <section class="col-sm-12 col-md-8">

    <h2>Submit a Movie</h2>

    <form id="movieform" method="post" action="index.php">

      <div class="form-group">
        <label for="title" class="control-label">
          Movie Title
        </label>
        <input type="text" name="title" id="title" maxlength="20" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="year" class="control-label" >
          Release Year
        </label>
        <input type="number" name="year" id="year" step="1" class="form-control" required>
      </div>

<div class="form-group">
      <label for="genre">Genre</label>
      <select name="genre" id="genre" class="form-control" required>
          <option value=""></option>
          <option value="sci-fi/fantasy">Sci-Fi/Fantasy</option>
          <option value="documentary">Documentary</option>
          <option value="indie">Indie</option>
          <option value="action">Action</option>
          <option value="foreign">Foreign</option>
          <option value="animated">Animated</option>
          <option value="drama">Drama</option>
          <option value="comedy">Comedy</option>
          <option value="other">Other</option>
      </select>
    </div>

  <div class="form-group">
      <label for = "summary">
        Summarize the movie in 140 characters or less.
      </label>
      <textarea type="text" name="summary" id="summary" maxlength="140" class="form-control" required></textarea>
    </div>

  <div class="form-group">
      <input type="submit" value="Submit">
      <input type= "reset" value= "Start Over">
    </div>

    </form>
  </section>
  </div>
  <div class="row">
    <div id="response">
        <p class="announce">Thanks for submitting the form!</p>
        <p class="middle"><a href="index.php">Return to the form</a></p>
    </div>
  </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
