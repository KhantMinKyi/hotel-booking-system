<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class RoomAnalysisController extends Controller
{
    public function roomAnalysisList(Request $request)
    {
        $start_date = $request->start ?? null;
        $end_date = $request->end ?? null;
        $rooms = Room::all();
        $room_array = [];
        foreach ($rooms as $room) {
            array_push($room_array, [
                'room_id' => $room->room_number,
                'total_score' => round($room->total_score, 2),
            ]);
        }
        $room_bookings = RoomBooking::where('status', 'approved')
            ->when($start_date, function ($query, $start_date) {
                return $query->where('from_date', '>=', $start_date);
            })
            ->when($end_date, function ($query, $end_date) {
                return $query->where('to_date', '<=', $end_date);
            })
            ->get()->groupBy('room_id');
        // $room_bookings = RoomBooking::all()->groupBy('room_id');
        $room_booking_array = [];
        foreach ($room_bookings as $key => $room_booking) {
            array_push($room_booking_array, [
                'room_number' => $room->room_number,
                'booking_count' => count($room_booking),
            ]);
        }
        // return $room_booking_array;
        // $yearlyData = [
        //     [
        //         "name" => "2023 - 2024",
        //         "data" => [
        //             "Fifth Year" => [
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 1,
        //                     "course_name" => "DSP ( Semester - 1)",
        //                     "total_feedback_percentage" => 100,
        //                     "average_feedback_percentage" => 100,
        //                     "average_feedback_percentage_comment" => 53.87
        //                 ],
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 2,
        //                     "course_name" => "DSP ( Semester - 2)",
        //                     "total_feedback_percentage" => 80,
        //                     "average_feedback_percentage" => 80,
        //                     "average_feedback_percentage_comment" => 45.8
        //                 ],
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 1,
        //                     "course_name" => "DSP ( Semester - 1)",
        //                     "total_feedback_percentage" => 100,
        //                     "average_feedback_percentage" => 100,
        //                     "average_feedback_percentage_comment" => 53.87
        //                 ],
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 2,
        //                     "course_name" => "DSP ( Semester - 2)",
        //                     "total_feedback_percentage" => 80,
        //                     "average_feedback_percentage" => 80,
        //                     "average_feedback_percentage_comment" => 45.8
        //                 ],
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 1,
        //                     "course_name" => "DSP ( Semester - 1)",
        //                     "total_feedback_percentage" => 100,
        //                     "average_feedback_percentage" => 100,
        //                     "average_feedback_percentage_comment" => 53.87
        //                 ],
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 2,
        //                     "course_name" => "DSP ( Semester - 2)",
        //                     "total_feedback_percentage" => 80,
        //                     "average_feedback_percentage" => 80,
        //                     "average_feedback_percentage_comment" => 45.8
        //                 ],
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 3,
        //                     "course_name" => "HSS ( Semester - 1)",
        //                     "total_feedback_percentage" => 80,
        //                     "average_feedback_percentage" => 80,
        //                     "average_feedback_percentage_comment" => 45.8
        //                 ]
        //             ],
        //             "Sixth Year" => [
        //                 [
        //                     "year_id" => "Sixth Year",
        //                     "course_id" => 4,
        //                     "course_name" => "AI ( Semester - 2)",
        //                     "total_feedback_percentage" => 100,
        //                     "average_feedback_percentage" => 100,
        //                     "average_feedback_percentage_comment" => 68.8
        //                 ]
        //             ]
        //         ]
        //     ],
        //     [
        //         "name" => "2022 - 2023",
        //         "data" => [
        //             "Fifth Year" => [
        //                 [
        //                     "year_id" => "Fifth Year",
        //                     "course_id" => 1,
        //                     "course_name" => "DSP ( Semester - 1)",
        //                     "total_feedback_percentage" => 80,
        //                     "average_feedback_percentage" => 80,
        //                     "average_feedback_percentage_comment" => 45.8
        //                 ]
        //             ]
        //         ]
        //     ],
        //     [
        //         "name" => "2021 - 2022",
        //         "data" => [
        //             "First Year" => [
        //                 [
        //                     "year_id" => "First Year",
        //                     "course_id" => 1,
        //                     "course_name" => "Mathematics",
        //                     "total_feedback_percentage" => 90,
        //                     "average_feedback_percentage" => 90,
        //                     "average_feedback_percentage_comment" => 67.2
        //                 ],
        //                 [
        //                     "year_id" => "First Year",
        //                     "course_id" => 2,
        //                     "course_name" => "Physics",
        //                     "total_feedback_percentage" => 85,
        //                     "average_feedback_percentage" => 85,
        //                     "average_feedback_percentage_comment" => 72.1
        //                 ],
        //                 [
        //                     "year_id" => "First Year",
        //                     "course_id" => 3,
        //                     "course_name" => "Chemistry",
        //                     "total_feedback_percentage" => 88,
        //                     "average_feedback_percentage" => 88,
        //                     "average_feedback_percentage_comment" => 68.9
        //                 ]
        //             ],
        //             "Second Year" => [
        //                 [
        //                     "year_id" => "Second Year",
        //                     "course_id" => 4,
        //                     "course_name" => "Biology",
        //                     "total_feedback_percentage" => 82,
        //                     "average_feedback_percentage" => 82,
        //                     "average_feedback_percentage_comment" => 70.5
        //                 ]
        //             ],
        //             "Third Year" => [
        //                 [
        //                     "year_id" => "Third Year",
        //                     "course_id" => 5,
        //                     "course_name" => "Computer Science",
        //                     "total_feedback_percentage" => 95,
        //                     "average_feedback_percentage" => 95,
        //                     "average_feedback_percentage_comment" => 85.3
        //                 ]
        //             ],
        //             "Fourth Year" => [
        //                 [
        //                     "year_id" => "Fourth Year",
        //                     "course_id" => 6,
        //                     "course_name" => "Electrical Engineering",
        //                     "total_feedback_percentage" => 87,
        //                     "average_feedback_percentage" => 87,
        //                     "average_feedback_percentage_comment" => 75.6
        //                 ]
        //             ]
        //         ]
        //     ]
        // ];
        return view('admin.room_analysis.room_analysis_list', compact('room_array', 'room_booking_array'));
    }
}
