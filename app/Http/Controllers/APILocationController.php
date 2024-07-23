<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class APILocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return response()->json([
            'status' => true,
            'message' => "Berhasil Mengambil Data Lokasi",
            'data' => $locations
        ]);
    }
}
