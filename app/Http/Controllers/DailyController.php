<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Daily;
use App\Models\Location;
use Illuminate\Http\Request;

class DailyController extends Controller
{
    public function index()
    {
        $dailies = Daily::all();

        return view('daily.index', compact('dailies'));
    }

    public function create()
    {
        $locations = Location::all();

        $categories = Category::all();

        return view('daily.create', compact('locations', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'category' => 'required',
            'date' => 'required',
            'time' => 'required',
            'pm10' => 'required|numeric|gte:0',
            'pm25' => 'required|numeric|gte:0',
            'so2' => 'required|numeric|gte:0',
            'co' => 'required|numeric|gte:0',
            'o3' => 'required|numeric|gte:0',
            'no2' => 'required|numeric|gte:0',
        ]);

        $post = Daily::create([
            'location_id' => $request->get('location'),
            'category_id' => $request->get('category'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'pm10' => $request->get('pm10'),
            'pm25' => $request->get('pm25'),
            'so2' => $request->get('so2'),
            'co' => $request->get('co'),
            'o3' => $request->get('o3'),
            'no2' => $request->get('no2'),
        ]);

        if ($post) {
            return redirect()->route('dashboard.daily.index')->with('success', 'Daily Data Created!');
        } else {
            return back();
        }
    }

    public function edit($id)
    {
        $daily = Daily::find($id);

        $locations = Location::all();

        $categories = Category::all();

        return view('daily.edit', compact('daily', 'locations', 'categories'));
    }

    public function update($id, Request $request)
    {
        $daily = Daily::find($id);

        $request->validate([
            'location' => 'required',
            'category' => 'required',
            'date' => 'required',
            'time' => 'required',
            'pm10' => 'required|numeric|gte:0',
            'pm25' => 'required|numeric|gte:0',
            'so2' => 'required|numeric|gte:0',
            'co' => 'required|numeric|gte:0',
            'o3' => 'required|numeric|gte:0',
            'no2' => 'required|numeric|gte:0',
        ]);

        $update = $daily->update([
            'location_id' => $request->get('location'),
            'category_id' => $request->get('category'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'pm10' => $request->get('pm10'),
            'pm25' => $request->get('pm25'),
            'so2' => $request->get('so2'),
            'co' => $request->get('co'),
            'o3' => $request->get('o3'),
            'no2' => $request->get('no2'),
        ]);

        if ($update) {
            return redirect()->route('dashboard.daily.edit', $daily->id)->with('success', 'Daily Data Updated!');
        } else {
            return back();
        }
    }

    public function delete($id)
    {
        $daily = Daily::find($id);

        $delete = $daily->delete();

        if ($delete) {
            return redirect()->route('dashboard.daily.index')->with('success', 'Daily Data Deleted!');
        }
    }
}
