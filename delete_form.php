<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Delete Movie Recommendation - Confirmation </title>\
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="js/delete.js"></script>
</head>

<body>
<div id="container">

<h1>Delete A Movie Recommendation</h1>
<!-- this page opens if you selected edit or delete
     in socks_edit.php and submitted the form
     and this page chooses which form to show you
-->

<div>

<?php
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

// check if _choice_ was sent here via POST ...
if ( isset($_POST['choice']) ) {
    $choice = $_POST['choice'];


    if ($choice == "delete") {
        // create PHP variables from the hidden form values
        $id = sanitizeMySQL($conn, $_POST['id']);
        // these are simply written into the form on THIS page, below
        // and so I did not sanitize them
        $deleted = $_POST['deleted'];
        $reason_deleted = $_POST['reason_deleted'];
?>
        <!-- switch from PHP to HTML
             show entire form with the PHP values filled in ...
             note: the select options employ abbreviated PHP if-statements
             which are nec. to insert "selected" in the option tag
             -->

        <p class="middle">Make changes in one or more fields. Then
        click the Update Record button.</p>

        <div id="socks">

        <form id="moviedelete" method="post" action="view_update.php" autocomplete="off">
            <!-- retain id to be passed to JS file -->
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="deleted">Are you super-duper sure about this? </label>
            <input type="radio" name="deleted" id="deleted" value="true" required>
            <!-- previously any single quote was escaped with a backslash
                 we use stripslashes() to get rid of the slashes -->
           <label for="reason_deleted">Reason for deleting?</label>
           <textarea type="text" name="reason_deleted" id="reason_deleted" maxlength="140" class="form-control" required></textarea>

         	<input type="submit" id="submit" value="Delete it!">
         </form>
     </div> <!-- close the socks div -->

<?php
    } // end of if ($choice = "update")
} else {
    // if _choice_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>

    <p class='announce'>No record was selected!</p>


<?php
// return to PHP just to close the if-statement
} // end of if-else isset($_POST['choice'])
?>
</div> <!-- close inner_content -->

<!-- below will print no matter what -->

<p class="middle"><a href="view_update.php">View full inventory</a></p>

<p class="middle"><a href="index.php">Add a new sock record</a></p>

</div> <!-- close container -->
</body>
</html>
