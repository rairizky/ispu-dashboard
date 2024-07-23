<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class APIDailyController extends Controller
{
    public function index(Request $request)
    {
        $locationId = $request->get('location');

        $dailies = Daily::with(['location', 'category.category_actions'])->where('location_id', $locationId)->orderBy('date', 'desc')->orderBy('time', 'desc')->first();

        $dailies->makeHidden(['location_id', 'category_id']);

        $pollutants = [
            'pm10' => $dailies->pm10,
            'pm25' => $dailies->pm25,
            'so2' => $dailies->so2,
            'co' => $dailies->co,
            'o3' => $dailies->o3,
            'no2' => $dailies->no2,
        ];

        $highestValue = max($pollutants);

        $highestKey = array_search($highestValue, $pollutants);

        $polutant = [
            'name' => $highestKey,
            'value' => $highestValue,
        ];

        $dailies['polutant'] = $polutant;

        return response()->json([
            'status' => true,
            'message' => "Berhasil Mengambil Data Harian",
            'data' => $dailies,
        ]);
    }

    public function parameter(Request $request)
    {
        $parameter = $request->get('parameter');

        $date = $request->get('date');

        $location = $request->get('location_id');

        $startDate = Carbon::createFromFormat('d/m/Y', $date)->subWeek()->format('m/d/Y');
        $endDate = Carbon::createFromFormat('d/m/Y', $date)->format('m/d/Y');

        $dailyRecords = Daily::where('location_id', $location)->whereBetween('date', [$startDate, $endDate])->orderBy('date', 'desc')->orderBy('time', 'desc')->get();

        $dateRange = collect();

        $currentDate = Carbon::parse($startDate);

        while ($currentDate->lte(Carbon::parse($endDate))) {
            $dateRange->push($currentDate->copy());

            $currentDate->addDay();
        }

        $dailyRecordsForDateRange = $dateRange->map(function ($dateData) use ($dailyRecords, $parameter) {
            $record = $dailyRecords->firstWhere('date', $dateData->format('m/d/Y'));

            return [
                'date' => $dateData->format('d-m-Y'),
                'value' => $record ? $record->{$parameter} : null,
            ];
        });

        return response()->json([
            'status' => true,
            'message' => "Berhasil Mengambil Data Harian Parameter",
            'data' => $dailyRecordsForDateRange
        ]);
    }
}
