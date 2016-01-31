$(document).ready(function() {

// if update
$("#moviedelete").on("submit", function(e) {

	$.ajax({
		url:  "delete.php",
		type: "POST",
		data: $(this).serialize(),
		success: function() {
            console.log("Success!");
        },
        error: function (jqXHR, status, err) {
            console.log("Error!");
        }
    });

});

}); // close document ready
