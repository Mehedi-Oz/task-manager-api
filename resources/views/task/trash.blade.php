@extends('app')

@section('title')
    Trash
@endsection

@section('content')

    <body class="bg-slate-900 text-slate-200 min-h-screen">
        <div class="container mx-auto p-6">
            <!-- Centered Content Wrapper -->
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <header class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold">Trash</h1>
                    <a href="/tasks" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Back to Tasks
                    </a>
                </header>

                <!-- Trash Table -->
                <div class="overflow-x-auto bg-slate-800 shadow-md rounded-lg">
                    <table class="w-full text-sm table-fixed">
                        <thead class="bg-slate-700 text-slate-300">
                            <tr>
                                <th class="py-3 px-4 text-center w-1/4">Title</th>
                                <th class="py-3 px-4 text-center w-1/4">Deleted At</th>
                                <th class="py-3 px-4 text-center w-1/4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="border-b border-slate-700 hover:bg-slate-800">
                                    <td class="py-3 px-4 text-center">{{ $task->title }}</td>
                                    <td class="py-3 px-4 text-center">{{ $task->due_date }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('tasks.restore', $task->id) }}"
                                                class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                                                Restore
                                            </a>

                                            <a href="javascript:;"
                                                onclick="if(confirm('Are you sure?')) { document.getElementById('form-{{ $task->id }}').submit(); }"
                                                class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                                Delete Permanently
                                            </a>

                                            <form id="form-{{ $task->id }}"
                                                action="{{ route('tasks.permanentDestroy', $task->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection
