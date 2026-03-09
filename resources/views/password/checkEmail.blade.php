@extends('layouts.layout')

@section('title','check-email')

@section('content')
    <x-check-email />
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

    // Use SUBMIT event instead of CLICK
    $('#checkEmail').submit(function(event){

        // Prevent page reload
        event.preventDefault();

        // Get form data
        let formData = new FormData(this);

        // Send AJAX request
        $.ajax({
            url: "{{ route('checkEmail.submit') }}",
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

                // Redirect to reset password page
                window.location.href =
                    "{{ route('resetPassword', ['token' => ':token', 'email' => ':email']) }}"
                    .replace(':token', response.token)
                    .replace(':email', response.email);

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