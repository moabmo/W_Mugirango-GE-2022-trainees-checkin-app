{{-- resources/views/admin/reports/index.blade.php --}}
<x-app-layout>
    {{-- Extending the layout file from admin.layouts --}}
    @extends('admin.layouts.app') 

    @section('title', 'Reports')

    @section('content')
    <div class="flex h-screen bg-gray-100">
        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <div class="flex-1 p-6 bg-white rounded shadow m-4">
            <h1 class="text-2xl font-semibold text-[#05243D] mb-6">Reports</h1>

            {{-- Example content for reports --}}
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold text-[#05243D] mb-4">Trainees Report</h2>

                @if(isset($trainees) && !$trainees->isEmpty())
                    <table class="min-w-full bg-white border border-[#05243D] rounded-md">
                        <thead>
                            <tr class="bg-[#05243D] text-white uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Role</th>
                                <th class="py-3 px-6 text-left">Training Period</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#05243D] text-sm font-light">
                            @foreach($trainees as $trainee)
                                <tr class="border-b border-gray-200 hover:bg-[#35A7FB] hover:text-white">
                                    <td class="py-3 px-6 text-left">{{ $trainee->id }}</td>
                                    <td class="py-3 px-6 text-left">{{ $trainee->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $trainee->role }}</td>
                                    <td class="py-3 px-6 text-left">{{ $trainee->training_period }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-[#05243D]">No trainees found.</p>
                @endif
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
