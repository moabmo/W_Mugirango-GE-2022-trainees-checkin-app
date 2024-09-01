@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All Trainees Report</h1>
    <table>
        <thead>
            <tr>
                <th>S/No</th>
                <th>Name</th>
                <th>ID No.</th>
                <th>Phone No.</th>
                <th>Ward</th>
                <th>Polling Station</th>
                <th>Role</th>
                <th>Admitted</th>
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
                    <td>{{ $trainee->admitted ? 'Yes' : 'No' }}</td>
                    <td>{{ $trainee->admittedBy->name ?? '---' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
