
$(document).ready(function () {
    $('#new_date').on('change', function() {
        var selectedDate = new Date($(this).val());
        if(selectedDate.getDay() == 0 || selectedDate.getDay() == 6) {
            $(this).val('');
            $("#new_date").addClass("is-invalid");
            $("#date-feedback").html('Please choose a date other than Saturday or Sunday');   
            $("#resched-submit").prop('disabled', true);
        } else {
            $("#resched-submit").prop('disabled', false);
            $("#new_date").removeClass("is-invalid");
            $("#date-feedback").html('');    
        }
    });

   

    function enableSubmitButton() {
        if (
          !$("#new_date").hasClass("is-invalid") &&
          !$("#reason_resched").hasClass("is-invalid") 
        ) {
            $("#resched-submit").prop('disabled', false);
        }
    }
    
    $("#resched").submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        $("#resched-submit").prop('disabled', true); // Disable submit button

        // Perform additional validation if needed

        // Submit the form asynchronously using AJAX
        $.ajax({
            type: "POST",
            url: "path_to_your_php_script.php", // Replace with the actual path to your PHP script
            data: $(this).serialize(), // Serialize form data
            success: function (response) {
                // Handle successful response from the server
                // You may redirect the user or show a success message here
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
});
