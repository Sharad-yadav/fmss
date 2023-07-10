<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function semester(): BelongsTo{
        return $this->belongsTo(Semester::class,'semester_id','id');
    }
    public function syllabus(): HasOne{
        return $this-> hasOne(Syllabus::class,'subject_id','id');
    }
    public function notes(): HasMany{
        return $this->hasMany(Notes::class,'subject_id','id');
    }
    public function assignment(): HasMany{
        return $this->hasMany(Assignment::class,'subject_id','id');
    }
}
