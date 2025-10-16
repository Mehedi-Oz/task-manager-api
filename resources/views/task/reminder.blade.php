@extends('app')

@section('title')
    Reminders
@endsection

@section('content')

    <body class="bg-slate-900 text-slate-200 min-h-screen">
        <div class="container mx-auto p-6">
            <!-- Centered Content Wrapper -->
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <header class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold">Reminders</h1>
                    <a href="/tasks" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Back to Tasks
                    </a>
                </header>

                <!-- Reminder Table -->
                <div class="overflow-x-auto bg-slate-800 shadow-md rounded-lg">
                    <table class="w-full text-sm table-fixed">
                        <thead class="bg-slate-700 text-slate-300">
                            <tr>
                                <th class="py-3 px-4 text-center w-1/4">Title</th>
                                <th class="py-3 px-4 text-center w-1/4">Priority</th>
                                <th class="py-3 px-4 text-center w-1/4">Due Date</th>
                                <th class="py-3 px-4 text-center w-1/4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Reminder Row -->
                            <tr class="border-b border-slate-700 hover:bg-slate-800">
                                <td class="py-3 px-4 text-center">Task 1</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-red-600 text-white text-xs font-medium px-2 py-1 rounded">High</span>
                                </td>
                                <td class="py-3 px-4 text-center">2025-10-20</td>
                                <td class="py-3 px-4 text-center">
                                    <a href="/tasks/1/remind"
                                        class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                        Send Reminder
                                    </a>
                                </td>
                            </tr>
                            <!-- Repeat for more tasks -->
                            <tr class="border-b border-slate-700 hover:bg-slate-800">
                                <td class="py-3 px-4 text-center">Task 2</td>
                                <td class="py-3 px-4 text-center">
                                    <span
                                        class="bg-yellow-600 text-white text-xs font-medium px-2 py-1 rounded">Medium</span>
                                </td>
                                <td class="py-3 px-4 text-center">2025-10-25</td>
                                <td class="py-3 px-4 text-center">
                                    <a href="/tasks/2/remind"
                                        class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                        Send Reminder
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection
