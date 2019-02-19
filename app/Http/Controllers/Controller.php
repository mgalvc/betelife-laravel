<?php

namespace App\Http\Controllers;

use App\Student;
use App\Volunteer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getGeneralCount() {
        $studentsCount = Student::all()->count();
        $volunteersCount = Volunteer::all()->count();

        $studentsActive = Student::where('active', true)->count();
        $volunteersActive = Volunteer::where('active', true)->count();

        return response()->json([
            'students' => [
                'total' => $studentsCount,
                'active' => $studentsActive
            ],
            'volunteers' => [
                'total' => $volunteersCount,
                'active' => $volunteersActive
            ]
        ]);
    }
}
