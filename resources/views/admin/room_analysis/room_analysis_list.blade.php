@extends('admin.layout')
@section('content')
    <div class="grid grid-cols-1">
        <div class="room-section m-4">
            <h2 class="text-md font-semibold text-center">Room Rating Scores</h2>
            <div class="room-charts flex flex-wrap">
                <div class="room-id-section w-1/2 px-2">
                    <canvas id="room-scores-chart"></canvas>
                </div>
            </div>
            <hr class="my-4 border-1 rounded border-red-300">
        </div>
    </div>
    <div class="grid grid-cols-1">
        <div class="room-section m-4">
            <h2 class="text-md font-semibold text-center">Room Booking Count</h2>
            <div class="flex flex-row-reverse">
                <form action="{{ route('admin.room_analysis.index') }}" method="GET">
                    <div date-rangepicker datepicker-buttons datepicker-autoselect-today datepicker-format="yyyy-mm-dd"
                        class="flex items-center">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="start" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start" required>
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="end" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end" required>
                        </div>
                        <div class="ml-4">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="room-charts flex flex-wrap">
                <div class="room-id-section w-1/3 px-2">
                    <canvas id="room-booking-chart"></canvas>
                </div>
            </div>
            <hr class="my-4 border-1 rounded border-red-300">
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var roomData = @json($room_array); // Passing PHP variable to JavaScript

            // Function to generate colors with lower opacity
            function generateColors(count, opacity) {
                var colors = [];
                for (var i = 0; i < count; i++) {
                    colors.push(
                        `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, ${opacity})`
                    );
                }
                return colors;
            }

            // Extract room IDs and scores
            var roomIds = roomData.map(function(room) {
                return 'Room ' + room.room_id;
            });
            var totalScores = roomData.map(function(room) {
                return room.total_score;
            });

            // Generate colors with lower opacity
            var backgroundColors = generateColors(roomData.length, 0.7); // Adjust opacity here (0.7 for example)
            var borderColors = backgroundColors.map(color => color.replace('0.7', '1')); // Make border color opaque

            // Create the chart
            var ctx = document.getElementById('room-scores-chart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: roomIds,
                    datasets: [{
                        label: 'Total Score',
                        data: totalScores,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 10 // Setting the maximum score to 10
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Room Scores'
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var roomData = @json($room_booking_array); // Passing PHP variable to JavaScript

            // Function to generate colors with lower opacity
            function generateColors(count, opacity) {
                var colors = [];
                for (var i = 0; i < count; i++) {
                    var hue = (360 / count) * i;
                    colors.push(
                        `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, ${opacity})`
                    );
                }
                return colors;
            }

            // Extract room IDs and booking counts
            var roomIds = roomData.map(function(room) {
                return 'Room ' + room.room_number;
            });
            var bookingCounts = roomData.map(function(room) {
                return room.booking_count;
            });

            // Generate colors with lower opacity
            var backgroundColors = generateColors(roomData.length, 0.7); // Adjust opacity here (0.7 for example)

            // Create the chart
            var ctx = document.getElementById('room-booking-chart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: roomIds,
                    datasets: [{
                        label: 'Total Booking Count',
                        data: bookingCounts,
                        backgroundColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Room Booking Counts'
                        }
                    }
                }
            });
        });
    </script>
@endsection
