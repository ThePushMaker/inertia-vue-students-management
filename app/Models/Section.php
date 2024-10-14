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
    
    protected function students()
    {
        return $this->hasMany(Student::class);
    } 
    
    protected function sections()
    {
        //we define manually the foreign key otherwise it will be classes_id, and it doesn't exist in the database
        return $this->belongsTo(Section::class, 'class_id'); 
    }
}
