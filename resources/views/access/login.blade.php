@extends('layouts.layout')

@section('title','login')

@section('content')
<x-login />
@endsection


@push('scripts')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data correctly
        let formData = new FormData(this);

        // Send AJAX request
        $.ajax({
            url: "{{ route('login.submit') }}",
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false
        })
        .done(function(response) {
            // Handle success response
            if (response.success) {
                alert(response.message); // Show success message
                window.location.href = "{{ route('dashboard') }}"; // Redirect
            } else {
                alert(response.message); // Show error message
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // Handle AJAX errors
            console.error("AJAX Error: " + textStatus + ": " + errorThrown);
            alert("An error occurred while processing your request. Please try again.");
        });

    });

});
</script>
@endpush

