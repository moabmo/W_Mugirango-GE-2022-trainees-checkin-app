<!-- resources/views/trainees/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trainees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Add Trainees</h1>
    <form method="POST" action="{{ route('trainees.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number" id="id_number" required>
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" required>
        <br>
        <label for="ward">Ward:</label>
        <select name="ward" id="ward" required>
            <option value="">Select Ward</option>
            @foreach($wards as $ward)
                <option value="{{ $ward->ward }}">{{ $ward->ward }}</option>
            @endforeach
        </select>
        <br>
        <label for="polling_station">Polling Station:</label>
        <select name="polling_station" id="polling_station" required>
            <option value="">Select Polling Station</option>
            @foreach($pollingStations as $pollingStation)
                <option value="{{ $pollingStation->polling_station }}">{{ $pollingStation->polling_station }}</option>
            @endforeach
        </select>
        <br>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="polling_clerk">Polling Clerk</option>
            <option value="presiding_officer">Presiding Officer</option>
            <option value="deputy_presiding_officer">Deputy Presiding Officer</option>
            <option value="SET">SET</option>
        </select>
        <br>
        <button type="submit">Add Trainee</button>
    </form>

 <!-- Font Awesome (for icons) -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</x-app-layout>