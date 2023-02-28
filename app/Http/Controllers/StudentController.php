<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('students',['studentList' => $student]);
    }

    public function create()
    {
        $class = Classroom::select('id','name')->get();
        return view('students-add',['class' => $class]);
    }

    public function store(Request $request)
    {
         $request->validate([ 
             'nim'=>'unique:students',
             'gender'=>'required',
             'class'=>'required'
         ]);
        

        $student = new Student;
        $student->nama = $request->nama;
        $student->gender = $request->gender;
        $student->nim = $request->nim;
        $student->class_id = $request->class;
        $student->save();

        if ($student) {
            Session::flash('status','success');
            Session::flash('message','add new student success');
        }

        
        return redirect('students');
    }
    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = Classroom::where('id','!=',$student->class_id)->get(['id','name']);
        return view('students-edit',['student' => $student,'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->nama = $request->nama;
        $student->gender = $request->gender;
        $student->nim = $request->nim;
        $student->class_id = $request->class;
        $student->save();

        return redirect('students');
    }

    public function hapus($id)
    {
        $student = Student::findOrFail($id); 
        return view('students-hapus',['student' => $student]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/students');
    }
}
