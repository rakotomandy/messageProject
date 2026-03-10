 $(document).ready(function() {
        // Your script here
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $('#logout').click(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Send AJAX request
            $.ajax({
                url: "{{ route('logout') }}",
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false
            }).done(function(response) {
                // Handle success response
                if (response.success) {
                    alert(response.message); // Show success message
                    window.location.href = "{{ route('login') }}"; // Redirect to login page
                } else {
                    alert(response.message); // Show error message
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                // Handle AJAX errors
                console.error("AJAX Error: " + textStatus + ": " + errorThrown);
                alert("An error occurred while processing your request. Please try again.");
        });
    });
    });