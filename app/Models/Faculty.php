<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Faculty extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function teacher(): HasMany{
        return $this->hasMany(Teacher::class,'faculty_id','id');
    }
    public function student(): HasMany{
        return $this->hasMany(Student::class,'faculty_id','id');
    }
    public  function semester(): HasMany {
        return $this->hasMany(Semester::class,'faculty_id','id');
    }
    public function grade(): HasMany{
        return $this->hasMany(Grade::class,'faculty_id','id');
    }
}
