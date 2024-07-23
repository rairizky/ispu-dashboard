<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('location.index', compact('locations'));
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        $post = Location::create([
            'name' => $request->get('name'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng')
        ]);

        if ($post) {
            return redirect()->route('dashboard.location.index')->with('success', 'Location Created!');
        } else {
            return back();
        }
    }

    public function edit($id)
    {
        $location = Location::find($id);

        return view('location.edit', compact('location'));
    }

    public function update($id, Request $request)
    {
        $location = Location::find($id);

        $request->validate([
            'name' => 'required',
            'lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        $update = $location->update([
            'name' => $request->get('name'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng')
        ]);

        if ($update) {
            return redirect()->route('dashboard.location.edit', $location->id)->with('success', 'Location Updated!');
        } else {
            return back();
        }
    }

    public function delete($id)
    {
        $location = Location::find($id);

        $delete = $location->delete();

        if ($delete) {
            return redirect()->route('dashboard.location.index')->with('success', 'Location Deleted!');
        }
    }
}
