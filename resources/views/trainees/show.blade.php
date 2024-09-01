<!DOCTYPE html>
<html>
<head>
    <title>Trainee Details</title>
</head>
<body>
    <h1>Trainee Details</h1>
    <p><strong>Name:</strong> {{ $trainee->name }}</p>
    <p><strong>ID Number:</strong> {{ $trainee->id_number }}</p>
    <p><strong>Phone Number:</strong> {{ $trainee->phone_number }}</p>
    <p><strong>Ward:</strong> {{ $trainee->ward }}</p>
    <p><strong>Polling Station:</strong> {{ $trainee->polling_station }}</p>
    <p><strong>Role:</strong> {{ $trainee->role }}</p>
    <a href="{{ route('trainees.edit', $trainee->id) }}">Edit</a>
    <a href="{{ route('trainees.index') }}">Back to List</a>
</body>
</html>
