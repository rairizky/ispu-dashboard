<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIModelController extends Controller
{
    public function predict(Request $request)
    {
        $pm10 = $request->get('pm10');
        $pm25 = $request->get('pm25');
        $so2 = $request->get('so2');
        $co = $request->get('co');
        $o3 = $request->get('o3');
        $no2 = $request->get('no2');
        $category_max = $request->get('category_max');

        $url = 'http://localhost:5000/api/classification/predict';

        $params = [
            'pm10' => $pm10,
            'pm25' => $pm25,
            'so2' => $so2,
            'co' => $co,
            'o3' => $o3,
            'no2' => $no2
        ];

        $response = Http::withBody(json_encode($params), 'application/json')->post($url);

        $data = json_decode($response->getBody(), true);

        $category = Category::with('category_actions')->where('name',  $category_max) ->first();

        return response()->json([
            'status' => true,
            'message' => "Berhasil Mengambil Data Prediksi",
            'data' => $category
        ]);
    }

    public function forecast(Request $request)
    {
        $location = $request->get('location');

        $url = 'http://localhost:5000/api/forecast/list';

        $params = [
            'location' => $location
        ];

        $response = Http::withBody(json_encode($params), 'application/json')->get($url);

        return response()->json([
            'status' => true,
            'message' => "Berhasil Mengambil Data Forecast",
            'data' => $response->json()
        ]);
    }
}
