<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    public function sections()
    {
        // we define manually the foreign key otherwise it will be classes_id, and it doesn't exist in the database. This error occurs in the seeder
        return $this->hasMany(Section::class, 'class_id');
    }
}
