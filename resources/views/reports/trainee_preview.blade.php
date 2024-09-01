<!DOCTYPE html>
<html>
<head>
    <title>Trainees Report Preview</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Admitted Trainees Report</h1>
    <table>
        <thead>
            <tr>
                <th>S/No</th>
                <th>Name</th>
                <th>ID Number</th>
                <th>Phone Number</th>
                <th>Ward</th>
                <th>Polling Station</th>
                <th>Role</th>
                <th>Admitted By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainees as $trainee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trainee->name }}</td>
                    <td>{{ $trainee->id_number }}</td>
                    <td>{{ $trainee->phone_number }}</td>
                    <td>{{ $trainee->ward }}</td>
                    <td>{{ $trainee->polling_station }}</td>
                    <td>{{ $trainee->role }}</td>
                    <td>{{ $trainee->admittedBy->name ?? '---' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('trainee.download') }}">Download PDF</a>
</body>
</html>
