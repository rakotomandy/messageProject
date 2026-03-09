@extends('layouts.layout')

@section('title','reset-password')

@section('content')
    <x-reset-password :email="$email" :token="$token" />
@endsection

@push('scripts')

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

    // Add CSRF token automatically to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle reset password form submission
    $('#resetPasswordForm').submit(function(event){

        // Prevent page reload
        event.preventDefault();

        // Get form data
        let formData = new FormData(this);

        // Send AJAX request
        $.ajax({
            url: "{{ route('resetPassword.submit') }}",
            type: "POST",
            
            // Send form data
            data: formData,

            dataType: "json",

            // Required for FormData
            contentType: false,
            processData: false

        })

        // If request succeeds
        .done(function(response){

            if(response.success){

                alert(response.message);

                // Redirect to login page
                window.location.href = "{{ route('login') }}";

            }else{

                alert(response.message);

            }

        })

        // If request fails
        .fail(function(jqXHR, textStatus, errorThrown){

            console.error("AJAX Error: " + textStatus + ": " + errorThrown);

            alert("An error occurred while processing your request.");

        });

    });

});
</script>

@endpush
