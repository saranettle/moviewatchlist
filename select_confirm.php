<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta title=viewport content="width=device-width, initial-scale=1">
    <title>Delete a Movie Recommendation</title>
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
<div id="container">

<h1>Confirm Movie to Delete</h1>
<p>Is this the movie you would like to delete?</p>
<!-- this page opens if you selected a record
     from view_update.php
     and submitted the form - it lets you choose to delete or update
-->

<div>
<?php
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

// check if _id_ was sent here via POST ...
if ( isset($_POST['id']) ) {
?>

    <!-- write into the HTML - table headings -->

            


<?php
    // this calls the function above to make sure id is clean
    $id = sanitizeMySQL($conn, $_POST['id']);

    // get the row indicated by the id
    $query = "SELECT * FROM movies WHERE id = ?";

    // another if-statement inside the first one ensures that
    // code runs only if the statement was prepared
    if ($stmt = mysqli_prepare($conn, $query)) {
        // bind the id that came from inventory_update.php
        mysqli_stmt_bind_param($stmt, 'i', $id);
        // execute the prepared statement
        mysqli_stmt_execute($stmt);
        // next line handles the row that was selected - all fields
        // it is "_result" because it is the result of the query
        mysqli_stmt_bind_result($stmt, $id, $title, $year, $genre, $summary, $deleted, $reason_deleted);

        // handle the data we fetched with the SELECT statement ...
        while (mysqli_stmt_fetch($stmt)) {


            printf ("<h2>%s</h2>", $title);

        } // end while-loop

        // writing into the HTML to close the table and add a small form
        // note: single quotes are needed because double quotes surround
        // the entire set of echoed lines
?>

        <!-- write into the HTML - end of table, then form -->

        </tr>
        </table>

        <form id="deletemovie_confirm" method="post" action="delete_form.php" autocomplete="off">
            <p>Delete this item?
            <label>
            <input type="radio" name="choice" id="delete" value="delete" required> Yes</label>

            <!-- pass all values to the next script -->
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="title" value="<?php echo $title ?>">
            <input type="hidden" name="year" value="<?php echo $year ?>">
            <input type="hidden" name="genre" value="<?php echo $genre ?>">
            <input type="hidden" name="summary" value="<?php echo $summary ?>">
            <input type="hidden" name="deleted" value="<?php echo $deleted ?>">
            <input type="hidden" name="reason_deleted" value="<?php echo $reason_deleted ?>">


            <input type="submit" id="submit" value="Submit">
        </form>


<?php
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);

} else {
    // if _id_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>


    <p class='announce'>No record was selected!</p>


<?php
// return to PHP just to close the if-statement
}  // end of if-else isset($_POST['id'])
?>
</div> <!-- close inner_content -->

<!-- below will print no matter what -->

<p class="middle"><a href="view_update.php">View movie recommendations</a></p>

<p class="middle"><a href="index.php">Add a movie recommendation</a></p>


</div> <!-- close container -->
</body>
</html>
