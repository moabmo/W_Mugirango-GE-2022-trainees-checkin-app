<!-- resources/views/trainees/show_by_role.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trainees for Role: ' . $role) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Trainees for Role: {{ $role }}</h1>

                <!-- Trainees Table -->
                <table class="table custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Phone Number</th>
                            <th>Ward</th>
                            <th>Polling Station</th>
                            <th>Admitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainees as $index => $trainee)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $trainee->name }}</td>
                                <td>{{ $trainee->id_number }}</td>
                                <td>{{ $trainee->phone_number }}</td>
                                <td>{{ $trainee->ward }}</td>
                                <td>{{ $trainee->polling_station }}</td>
                                <td>{{ $trainee->admitted }}</td>
                                <td class="actions">
                                    <form action="{{ route('trainees.admit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="trainee_id" value="{{ $trainee->id }}">
                                        <button type="submit" class="btn-admit">Admit</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Back Button -->
                <a href="{{ route('trainees.admitForm') }}" class="btn btn-primary mt-4">
                    <i class="fas fa-arrow-left"></i> Back to Admit Form
                </a>
            </div>
        </div>
    </div>
    <style>
        table {
            width: 100%;
        }

        .custom-table {
            border-collapse: collapse;
            border-radius: 0.25rem; /* Border radius for table */
            overflow: hidden;
        }

        .custom-table thead {
            background-color: #05243D;
            color: #ffffff;
            text-align: left;
        }

        .custom-table th, .custom-table td {
            border: 1px solid #05243D; /* Border color */
            padding: 0.5rem; /* Reduced padding for cells */
        }

        .custom-table th {
            border-top: none;
            border-bottom: 2px solid #05243D; /* Border for header bottom */
        }

        .custom-table td {
            border-left: none;
            border-right: none;
        }

        .btn-primary {
            background-color: #35A7FB;
            border-color: #35A7FB;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #2a8fdc;
            border-color: #2a8fdc;
        }

        .btn-admit {
            background-color: #28a745; /* Green background for "Admit" button */
            border: 1px solid #28a745; /* Matching border color */
            color: #ffffff; /* White text color */
            padding: 0.5rem 1rem; /* Padding for button */
            border-radius: 0.25rem; /* Rounded corners */
            font-size: 1rem; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.2s ease, border-color 0.2s ease; /* Smooth transition */
        }

        .btn-admit:hover {
            background-color: #218838; /* Darker green on hover */
            border-color: #1e7e34; /* Matching border color on hover */
        }

        .btn-admit:focus {
            outline: none; /* Remove default outline */
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5); /* Box shadow on focus */
        }

        .pagination-container {
            /* Optional styling for pagination */
        }

        .rows-per-page-container {
            /* Optional styling for rows-per-page */
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 0.5rem 0;
        }

        .pagination .page-item {
            margin: 0 2px;
        }

        .pagination .page-link {
            color: #05243D;
            border: 1px solid #05243D;
            border-radius: 0.25rem;
            padding: 0.5rem 0.75rem;
        }

        .pagination .page-link:hover {
            background-color: #e9ecef;
        }

        .pagination .page-item.active .page-link {
            background-color: #35A7FB;
            border-color: #35A7FB;
            color: #ffffff;
        }

        .actions {
            position: relative;
            text-align: right;
        }

        .actions .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            box-shadow: 0 0 0.125rem rgba(0, 0, 0, 0.2);
            z-index: 1000;
            min-width: 160px;
            padding: 0; /* Remove padding from dropdown menu */
        }

        .actions .dropdown-menu .dropdown-item {
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .actions .dropdown-menu .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .actions .btn-link {
            padding: 0;
            font-size: 1.25rem;
            border: none;
            background: none;
        }

        .actions .btn-link:focus {
            outline: none;
        }

        .actions:hover .dropdown-menu {
            display: block;
        }

        .actions .dropdown-menu .dropdown-item {
            display: block; /* Ensure items are vertical */
        }
    </style>
</x-app-layout>
