<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function create(Request $request) {
        $volunteer = Volunteer::create($request->all());
        return response()->json($volunteer, 201);
    }

    public function getVolunteers() {
        //nome, idade, telefone, status
        $volunteers = Volunteer::all('name', 'age', 'phone', 'active', 'id');
        return response()->json([
            'volunteers' => $volunteers
        ]);
    }

    public function getVolunteer(Volunteer $volunteer) {
        return response()->json([
            'volunteer' => $volunteer
        ]);
    }

    public function update(Volunteer $volunteer, Request $request) {
        $volunteer->update($request->all());
        return response()->json($volunteer);
    }

    public function updateStatus(Volunteer $volunteer) {
        $volunteer->update([
            'active' => !$volunteer->active
        ]);
        return response()->json($volunteer);
    }

    public function delete(Volunteer $volunteer) {
        $volunteer->delete();
        return response()->json([
            'message' => 'deleted'
        ], 200);
    }
}
