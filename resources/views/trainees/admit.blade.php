<!-- resources/views/trainees/admit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admit Trainee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Admit Trainee</h1>

                <!-- Role Selection Form -->
                <form method="GET" action="{{ route('trainees.showByRole') }}">
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Select Role</label>
                        <select name="role" id="role" class="form-select rounded-md shadow-sm">
                            @foreach($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">View Trainees</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
