<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
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
        
        return inertia( 'Students/Create', compact('classes'));
    }
    
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());
        
        return redirect()->route('students.index');
    }
    
    public function edit(Student $student)
    {
        $classes = ClassesResource::collection(Classes::all());
        
        return inertia('Students/Edit', [
            'classes' => $classes,
            'student' => StudentResource::make($student)
        ]);
    }
    
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        
        return redirect()->route('students.index');
    }
}
