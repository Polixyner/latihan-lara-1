<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //$student = Student::all();
        $student = DB::table('students')->get();;
        return view('students',['studentList' => $student]);
    }
}
