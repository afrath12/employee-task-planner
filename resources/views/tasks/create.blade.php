@extends('tasks.layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Assign a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-1">Task Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea name="description" class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Employee Name</label>
            <input type="text" name="employee_name" value="{{ old('employee_name') }}" class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('employee_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Due Date</label>
            <input type="date" name="due_date" value="{{ old('due_date') }}" class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('due_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition">Save Task</button>
    </form>
</div>
@endsection