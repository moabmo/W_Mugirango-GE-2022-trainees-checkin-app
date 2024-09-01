<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trainees-Checkin Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <!-- Report Section -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Admitted Trainees Report
                        </h3>

                        <!-- Buttons for Report Actions -->
                        <div class="flex space-x-4">
                            <!-- Preview Report Button with Icon -->
                            <button id="previewReportBtn" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                <i class="fas fa-eye mr-2"></i> <!-- Font Awesome Eye Icon -->
                                Preview Report
                            </button>

                            <!-- Download Report Button with Icon -->
                            <a href="{{ route('trainee.download') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-200 disabled:opacity-25 transition">
                                <i class="fas fa-download mr-2"></i> <!-- Font Awesome Download Icon -->
                                Download Report
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Preview Report -->
    <div id="previewModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-4 rounded-lg shadow-lg w-full md:w-2/3 lg:w-1/2">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">Admitted Trainees Report Preview</h3>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800">
                    <i class="fas fa-times"></i> <!-- Font Awesome Close Icon -->
                </button>
            </div>
            <div class="mt-4">
                <!-- The iframe will display the PDF preview -->
                <iframe id="pdfPreview" src="" class="w-full h-80" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <!-- Include Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <!-- JavaScript for Modal Functionality -->
    <script>
        document.getElementById('previewReportBtn').addEventListener('click', function() {
            // Set the URL of the PDF preview
            document.getElementById('pdfPreview').src = '{{ route('trainee.preview') }}';
            document.getElementById('previewModal').classList.remove('hidden');
        });

        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('previewModal').classList.add('hidden');
        });
    </script>
</x-app-layout>
