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

    <div class="main-content">
        <x-app-layout>
        <x-sidebar />

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                        <!-- Summary Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                            <div class="bg-blue-500 text-white p-4 rounded-lg">
                                <h2 class="text-lg font-bold">Total Trainees</h2>
                                <p class="text-xl">{{ $totalTrainees }}</p>
                            </div>
                            <div class="bg-green-500 text-white p-4 rounded-lg">
                                <h2 class="text-lg font-bold">Checked In</h2>
                                <p class="text-xl">{{ $checkedInTrainees }}</p>
                            </div>
                            <div class="bg-red-500 text-white p-4 rounded-lg">
                                <h2 class="text-lg font-bold">Pending Check-Ins</h2>
                                <p class="text-xl">{{ $pendingCheckIns }}</p>
                            </div>
                            <div class="bg-yellow-500 text-white p-4 rounded-lg">
                                <h2 class="text-lg font-bold">Check-In Percentage</h2>
                                <p class="text-xl">
                                    @if($totalTrainees > 0)
                                        {{ number_format(($checkedInTrainees / $totalTrainees) * 100, 2) }}%
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                        </div>

                        
                        <!-- Recent Activity -->
                        <div class="mt-6">
                            <h2 class="text-xl font-semibold mb-4">Recent Activities</h2>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <ul>
                                    @foreach($recentActivities as $activity)
                                        <li class="border-b py-2">{{ $activity->description }} at {{ $activity->created_at->format('H:i:s') }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Detailed Statistics -->
                        <div class="mt-6">
                            <h2 class="text-xl font-semibold mb-4">Detailed Statistics</h2>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p>Total Trainees: {{ $totalTrainees }}</p>
                                <p>Checked In: {{ $checkedInTrainees }}</p>
                                <p>Pending Check-Ins: {{ $pendingCheckIns }}</p>
                                <p>Check-In Percentage:
                                    @if($totalTrainees > 0)
                                        {{ number_format(($checkedInTrainees / $totalTrainees) * 100, 2) }}%
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </div>

    <!-- Bootstrap and Chart.js Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
            // Pie Chart
            var ctxPie = document.getElementById('checkInPieChart').getContext('2d');
            new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: ['Checked In', 'Pending Check-Ins'],
                    datasets: [{
                        label: 'Check-In Status',
                        data: [{{ $checkedInTrainees }}, {{ $pendingCheckIns }}],
                        backgroundColor: ['rgba(255, 205, 86, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                        borderColor: ['rgba(255, 205, 86, 1)', 'rgba(54, 162, 235, 1)'],
                        borderWidth: 1
                    }]
                }
            });

            // Line Chart
            var ctxLine = document.getElementById('checkInLineChart').getContext('2d');
            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: @json($dates),
                    datasets: [{
                        label: 'Check-Ins Over Time',
                        data: @json($checkInCounts),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
