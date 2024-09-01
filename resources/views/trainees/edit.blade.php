<!DOCTYPE html>
<html>
<head>
    <title>Edit Trainee</title>
</head>
<body>
    <h1>Edit Trainee</h1>
    <form method="POST" action="{{ route('trainees.update', $trainee->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $trainee->name }}" required>
        <br>
        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number" id="id_number" value="{{ $trainee->id_number }}" required>
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" value="{{ $trainee->phone_number }}" required>
        <br>
        <label for="polling_station">Polling Station:</label>
        <input type="text" name="polling_station" id="polling_station" value="{{ $trainee->polling_station }}" required>
        <br>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="polling_clerk" {{ $trainee->role == 'polling_clerk' ? 'selected' : '' }}>Polling Clerk</option>
            <option value="presiding_officer" {{ $trainee->role == 'presiding_officer' ? 'selected' : '' }}>Presiding Officer</option>
            <option value="deputy_presiding_officer" {{ $trainee->role == 'deputy_presiding_officer' ? 'selected' : '' }}>Deputy Presiding Officer</option>
            <option value="SET" {{ $trainee->role == 'SET' ? 'selected' : '' }}>SET</option>
        </select>
        <br>
        <button type="submit">Update Trainee</button>
    </form>
</body>
</html>
