<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassesResource;
use App\Http\Resources\StudentResource;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentResource::collection(Student::paginate(10));
        
        return inertia('Students/Index', compact('students'));
    }
    

    public function create()
    {
        $classes = ClassesResource::collection(Classes::all());
        
        return inertia('Students/Create', compact('classes'));
    }
}
