<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $class = Classroom::all();
       // $class = DB::table('class')->get();;
        return view('classroom',['classList' => $class]);
    }
}

