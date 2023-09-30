$(document).ready(function() {
    $("#contactForm").submit(function(e) {
        e.preventDefault();

        // Get form data starting from the month field
        var formData = {
            month: $("#month").val(),
            year: $("#year").val(),
            destination: $("#destination").val(),
            adults: $("#adults").val(),
            children: $("#children").val(),
            rooms: $("#rooms").val(),
            budget: $("#budget").val(),
            name: $("#name").val(),
            email: $("#email").val(),
            subject: $("#subject").val(),
            message: $("#message").val()
        };

        $.ajax({
            type: "POST",
            url: "mail.php",
            data: formData,
            success: function(response) {
                if (response == "success") {
                    alert("Message sent successfully!");
                    // Reset the form
                    $("#contactForm")[0].reset();
                } else {
                    alert("Error sending message. Please try again later.");
                }
            }
        });
    });
});