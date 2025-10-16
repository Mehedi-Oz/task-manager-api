@extends('app')

@section('title')
    Task Details
@endsection

@section('content')

    <body class="bg-slate-900 text-slate-200 min-h-screen">
        <div class="container mx-auto p-4 sm:p-6 flex items-center justify-center min-h-screen">
            <div class="w-full max-w-2xl bg-slate-800 shadow-xl rounded-2xl p-8">
                <!-- Header -->
                <header class="mb-8 flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-slate-100">Task Details</h1>
                    <a href="{{ route('tasks.index') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                        ← Back
                    </a>
                </header>

                <!-- Task Details Card -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Title -->
                    <div class="bg-slate-700 rounded-lg p-6 flex flex-col justify-center shadow">
                        <h2 class="text-base font-semibold text-slate-300 mb-2">Title</h2>
                        <p class="text-lg font-bold text-slate-100 break-words">{{ $task->title }}</p>
                    </div>

                    <!-- Priority -->
                    <div class="bg-slate-700 rounded-lg p-6 flex flex-col justify-center shadow">
                        <h2 class="text-base font-semibold text-slate-300 mb-2">Priority</h2>
                        <span
                            class="
                            px-3 py-1 rounded-full text-xs font-semibold
                            @if ($task->priority === 'high') bg-red-600 text-white
                            @elseif($task->priority === 'medium') bg-yellow-500 text-white
                            @else bg-green-600 text-white @endif
                        ">
                            {{ ucfirst($task->priority) }}
                        </span>
                    </div>

                    <!-- Description -->
                    <div class="bg-slate-700 rounded-lg p-6 flex flex-col justify-center shadow md:col-span-2">
                        <h2 class="text-base font-semibold text-slate-300 mb-2">Description</h2>
                        <p class="text-slate-200 break-words">{{ $task->description }}</p>
                    </div>

                    <!-- Due Date -->
                    <div class="bg-slate-700 rounded-lg p-6 flex flex-col justify-center shadow md:col-span-2">
                        <h2 class="text-base font-semibold text-slate-300 mb-2">Due Date</h2>
                        <p class="text-slate-100">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('F j, Y') : 'No due date' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
