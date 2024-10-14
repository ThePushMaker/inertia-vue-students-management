<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'class_id',
    ];
    
    public function students()
    {
        return $this->hasMany(Student::class);
    } 
    
    public function class()
    {
        //we define manually the foreign key otherwise it will be classes_id, and it doesn't exist in the database
        return $this->belongsTo(Classes::class, 'class_id'); 
    }
}
