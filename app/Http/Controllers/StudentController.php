<?php

namespace App\Http\Controllers;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{

    public function create(Request $request) {
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function getStudents() {
        //nome, idade, mãe, telefone, status
        $students = Student::all('name', 'age', 'mother', 'phone', 'active', 'id');
        return response()->json([
            'students' => $students
        ]);
    }

    public function getStudent(Student $student) {
        return response()->json([
            'student' => $student
        ]);
    }

    public function update(Student $student, Request $request) {
        $student->update($request->all());
        return response()->json($student);
    }

    public function updateStatus(Student $student) {
        $student->update([
            'active' => !$student->active
        ]);
        return response()->json($student);
    }

    public function delete(Student $student) {
        $student->delete();
        return response()->json([
            'message' => 'deleted'
        ], 200);
    }

    public function pdf(Student $student) {
        setlocale(LC_TIME, 'pt_BR');
        Carbon::setLocale('pt');
        $today = Carbon::parse(Carbon::today())->format('d/m/Y');
        $data = [
            'student' => $student,
            'today' => $today
        ];
        $headers = [
            'Content-Type' => 'application/pdf'
        ];
        //$data->created_at = $student->getCreatedAtColumn()->format('d/m/Y');
        $pdf = PDF::loadView('student', $data);
        return response()->view('student', $data);
        //return $pdf->download('aluno.pdf');
//        return response($pdf->download('aluno.pdf'), 200)->withHeaders([
//            'Content-Type' => 'application/pdf',
//            'Content-Disposition' => "attachment; filename=aluno.pdf"
//        ]);
    }
}
