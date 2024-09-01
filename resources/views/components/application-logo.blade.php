<!-- application-logo.blade.php -->
<div class="logo-container">
    <img src="{{ asset('images/logo.png') }}" alt="Application Logo" class="logo-image">
</div>

<style>
    .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .logo-image {
        max-width: 50px; /* Adjust width as needed */
        max-height: auto; /* Adjust height as needed */
    }
</style>
