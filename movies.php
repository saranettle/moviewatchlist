<?php include 'database.php'; ?>

<?php

if (isset($_POST['title']) && isset($_POST['genre'])) {

    // sanitizeMySQL() is a custom function, written below
    $title = sanitizeMySQL($conn, $_POST['title']);
    $year = sanitizeMySQL($conn, $_POST['year']);
    $genre = sanitizeMySQL($conn, $_POST['genre']);
    $summary = sanitizeMySQL($conn, $_POST['summary']);

    $query = "INSERT INTO movies (title, year, genre, summary)
    VALUES ('$title', '$year', '$genre', '$summary')";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // this will be returned to the .ajax success function
    if ($result) {
        echo "Submission successful.";

    } else {
        echo "Submission unsuccessful, Sara you done goof'd";
    }
}

// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

?>
