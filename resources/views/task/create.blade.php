@extends('app')

@section('title')
    Create Task
@endsection

@section('content')

    <body class="bg-slate-900 text-slate-200 min-h-screen">
        <div class="container mx-auto p-6">
            <!-- Centered Content Wrapper -->
            <div class="max-w-4xl mx-auto bg-slate-800 shadow-md rounded-lg p-6">
                <!-- Header -->
                <header class="mb-6">
                    <h1 class="text-3xl font-bold">Create Task</h1>
                </header>

                <!-- Form -->
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-slate-300">Title</label>
                        <input type="text" id="title" name="title"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter task title" required value="{{ old('title') }}">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-slate-300">Description</label>
                        <textarea id="description" name="description"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter task description" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <!-- Priority -->
                    <div class="mb-4">
                        <label for="priority" class="block text-sm font-medium text-slate-300">Priority</label>
                        <select id="priority" name="priority"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <!-- Due Date -->
                    <div class="mb-4">
                        <label for="due_date" class="block text-sm font-medium text-slate-300">Due Date</label>
                        <input type="date" id="due_date" name="due_date"
                            class="mt-1 block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Create Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
