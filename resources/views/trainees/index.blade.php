<x-app-layout>
    <!-- Sidebar -->
    <x-sidebar />

    <div class="main-content py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Trainees</h1>
                <a href="{{ route('trainees.create') }}" class="btn btn-primary mb-4">
                    <i class="fas fa-user-plus"></i> Add Trainee
                </a>

                <!-- Search Bar -->
                <form method="GET" action="{{ route('trainees.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search trainees..." class="form-input rounded-md shadow-sm">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>

                <table class="table custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Phone Number</th>
                            <th>Ward</th>
                            <th>Polling Station</th>
                            <th>Role</th>
                            <th>Admitted</th>
                            <th>Admitted by</th>
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
                                <td>{{ $trainee->role }}</td>
                                <td>{{ $trainee->admitted? 'Admitted' : 'Not Admitted' }}</td>
                                <td>{{ $trainee->admittedBy->name ?? '---' }}</td>
                                <td class="actions">
                                    <button class="btn btn-link text-dark" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('trainees.show', $trainee->id) }}" class="dropdown-item">View</a>
                                        <a href="{{ route('trainees.edit', $trainee->id) }}" class="dropdown-item">Edit</a>
                                        <form action="{{ route('trainees.destroy', $trainee->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination and Rows per Page Dropdown -->
                <div class="mt-4 flex items-center justify-center gap-4">
                    <!-- Pagination -->
                    <div class="pagination-container">
                        {{ $trainees->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                    
                    <!-- Rows per Page Dropdown -->
                    <div class="rows-per-page-container">
                        <form method="GET" action="{{ route('trainees.index') }}" class="flex items-center">
                            <label for="per_page" class="mr-2">Rows per page:</label>
                            <select name="per_page" id="per_page" class="form-select rounded-md shadow-sm" onchange="this.form.submit()">
                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                                <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                                <option value="40" {{ $perPage == 40 ? 'selected' : '' }}>40</option>
                                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                            </select>
                            <input type="hidden" name="search" value="{{ $search ?? '' }}"> <!-- Preserve search query -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .main-content {
            margin-left: 250px; /* Adjust to match sidebar width */
            transition: margin-left 0.3s;
        }

        table {
            width: 100%;
        }

        .custom-table {
            border-collapse: collapse;
            border-radius: 0.25rem; /* Border radius for table */
            overflow: hidden;
        }

        tr:hover {
            background-color: lightgrey;
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
        }

        .btn-primary:hover {
            background-color: #2a8fdc;
            border-color: #2a8fdc;
        }

        .btn-info {
            background-color: #05243D;
            border-color: #05243D;
        }

        .btn-info:hover {
            background-color: #041c31;
            border-color: #041c31;
        }

        .btn-warning {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }

        .btn-warning:hover {
            background-color: #ec971f;
            border-color: #ec971f;
        }

        .btn-danger {
            background-color: #d9534f;
            border-color: #d9534f;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            border-color: #c9302c;
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
            /* Optional styling for button */
        }
    </style>
</x-app-layout>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>