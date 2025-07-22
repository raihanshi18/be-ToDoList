<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return response([
            'message' => 'Activity found',
            'data' => $activities,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'action' => 'required|string|max:255',
        ]);

        Activity::create([
            'action' => $request->action,
        ]);

        return response(["message" => "Activity Created Success"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        $activities = Activity::find($activity->id);
        if (!$activities) {
            return response(['message' => 'Activity not found'], 404);
        }
        return response([
            'message' => 'Activity found',
            'data' => $activities,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $activities = Activity::find($activity->id);
        if (!$activities) {
            return response(['message' => 'Activity not found'], 404);
        }

        $request->validate([
            'action' => 'required|string|max:255',
        ]);

        $activities->update([
            'action' => $request->action,
        ]);

        return response([
            'message' => 'Activity updated successfully',
            'data' => $activities
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activities = Activity::find($activity->id);
        if (!$activities) {
            return response(['message' => 'Activity not found'], 404);
        }
        $activities->delete();

        return response(['message' => 'Activity deleted successfully'], 200);
    }
}
