<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'class_id',
        'section_id',
    ];
    
    public function class_id()
    {
        // we define manually the foreign key otherwise it will be classes_id, and it doesn't exist in the database
        return $this->belongsTo(Classes::class, 'class_id');
    }
    
    public function section_id()
    {
        return $this->belongsTo(Section::class);
    }
}
