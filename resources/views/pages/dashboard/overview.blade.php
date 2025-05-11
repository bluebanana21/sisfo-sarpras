@extends('layouts/dashboard-layout')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="flex-1 flex flex-col">
        <div class="">
            <h2>Dashboard > Overview</h2>
            <select class="border rounded px-2 py-1 text-sm">
                <option>Daily</option>
                <option>Weekly</option>
                <option>Monthly</option>
            </select>
        </div>
        <!-- CONTENT GRID -->
        <main class="p-6 flex-1 grid grid-cols-4 gap-6">
            <!-- CARDS AND CHART    -->
            <div class="col-span-3 grid gap-6">
                <!-- CARDS -->
                <div class="grid grid-cols-3 gap-6">
                    <div
                        class="bg-gradient-to-r from-blue-400 to-blue-200 text-white rounded-lg p-6 flex flex-col justify-between">
                        <p class="font-medium">Borrow</p>
                        <h2 class="text-6xl font-bold">500</h2>
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-400 to-green-200 text-white rounded-lg p-6 flex flex-col justify-between">
                        <p class="font-medium">Returns</p>
                        <h2 class="text-4xl font-bold">500</h2>
                    </div>
                    <div
                        class="bg-gradient-to-br from-yellow-400 to-yellow-200 text-white rounded-lg p-6 flex flex-col justify-between">
                        <p class="font-medium">In Use</p>
                        <h2 class="text-4xl font-bold">500</h2>
                    </div>
                </div>

                <!-- CHART -->
                <div class="bg-white rounded-lg shadow p-6">
                    <!-- CHART HERE -->
                    <p class="text-gray-400">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    </p>
                </div>
            </div>

            <!-- RECENT ACTIVITY -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col">
                <h3 class="font-semibold mb-4">Recent Activity</h3>
                <ul class="space-y-4 overflow-y-auto">

                    <li class="flex items-start">
                        <span class="h-3 w-3 bg-blue-500 rounded-full mt-1 mr-2"></span>
                        <div>
                            <p class="text-sm font-medium">Borrowed</p>
                            <p class="text-sm text-gray-600">09214523 Borrowed Projector 15</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="h-3 w-3 bg-yellow-400 rounded-full mt-1 mr-2"></span>
                        <div>
                            <p class="text-sm font-medium">Returned</p>
                            <p class="text-sm text-gray-600">09214523 Returned Projector 15</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="h-3 w-3 bg-red-500 rounded-full mt-1 mr-2"></span>
                        <div>
                            <p class="text-sm font-medium">Broken</p>
                            <p class="text-sm text-gray-600">09214523 Broke Projector 15</p>
                        </div>
                    </li>

                </ul>
            </div>
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
