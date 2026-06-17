@extends('tasks.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Current Task Board</h1>

    @if($tasks->isEmpty())
        <p class="text-gray-600 text-center py-4">No tasks planned yet. Click "Assign New Task" to start!</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-3">Task Title</th>
                        <th class="p-3">Assigned To</th>
                        <th class="p-3">Due Date</th>
                        <th class="p-3">Status</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3 font-semibold text-gray-800">{{ $task->title }}</td>
                            <td class="p-3 text-gray-600">{{ $task->employee_name }}</td>
                            <td class="p-3 text-gray-600">{{ $task->due_date }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded text-xs font-bold 
                                    {{ $task->status == 'Completed' ? 'bg-green-100 text-green-800' : ($task->status == 'In Progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-rose-100 text-rose-800') }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td class="p-3 flex justify-center space-x-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <span>|</span>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection