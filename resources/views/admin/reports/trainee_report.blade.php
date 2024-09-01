<!DOCTYPE html>
<html>
<head>
    <title>Trainee Report</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <h1>Trainee Report</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>ID Number</th>
                <th>Phone Number</th>
                <th>Ward</th>
                <th>Polling Station</th>
                <th>Role</th>
                <th>Admitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainees as $trainee)
                <tr>
                    <td>{{ $trainee->name }}</td>
                    <td>{{ $trainee->id_number }}</td>
                    <td>{{ $trainee->phone_number }}</td>
                    <td>{{ $trainee->ward }}</td>
                    <td>{{ $trainee->polling_station }}</td>
                    <td>{{ $trainee->role }}</td>
                    <td>{{ $trainee->admitted ? 'Admitted' : 'Not Admitted' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
