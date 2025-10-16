@extends('app')

@section('title')
    Update Task
@endsection

@section('content')

    <body class="bg-slate-900 text-slate-200 min-h-screen">
        <div class="container mx-auto p-6">
            <!-- Centered Content Wrapper -->
            <div class="max-w-4xl mx-auto bg-slate-800 shadow-md rounded-lg p-6">
                <!-- Message Popup -->
                @if (session('message'))
                    <div class="mb-6">
                        <div class="bg-green-600 text-white px-4 py-3 rounded-lg shadow text-center">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif

                <!-- Header -->
                <header class="mb-6 flex items-center justify-between">
                    <h1 class="text-3xl font-bold">Update Task</h1>
                    <a href="{{ route('tasks.index') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                        ← Back
                    </a>
                </header>

                <!-- Form -->
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf @method('PUT')
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-slate-300">Title</label>
                        <input type="text" id="title" name="title"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter task title" required value="{{ $task->title }}">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-slate-300">Description</label>
                        <textarea id="description" name="description"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter task description" rows="4">{{ $task->description }}</textarea>
                    </div>

                    <!-- Priority -->
                    <div class="mb-4">
                        <label for="priority" class="block text-sm font-medium text-slate-300">Priority</label>
                        <select id="priority" name="priority"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500">
                            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ $task->priority == 'low' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <!-- Due Date -->
                    <div class="mb-4">
                        <label for="due_date" class="block text-sm font-medium text-slate-300">Due Date</label>
                        <input type="date" id="due_date" name="due_date"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $task->due_date }}">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Update Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
