<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function faculty(): BelongsTo{
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function subject(): BelongsTo {
        return $this->belongsTo(Subject::class,'semester_id','id');
    }
    public function section(): HasMany{
        return $this->hasMany(Section::class,'semester_id','id');
    }
    public function student():HasMany{
        return $this->hasMany(Student::class,'semester_id','id');

    }
    public function grade(): HasMany{
        return $this->hasMany(Grade::class,'semester_id','id');
    }
    public function syllabi(): HasMany{
        return $this->hasMany(Syllabus::class,'semester_id','id');
    }

    public function getSemesterAttribute() {
        return $this->faculty->name.' '.$this->name;
    }
}
