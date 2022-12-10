<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';

    protected $fillable = [
        'id',
        'name',
        'credits',
        'teacher',
        'asig_pre',
        'aut_hours',
        'dir_hours',
        'semester_id'

    ];
    public function materia(){
        return $this->hashMany(Semester::class);
    }
}
