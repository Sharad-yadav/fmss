<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=['id'];

    public function faculty(): BelongsTo{
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
public function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id','id');
}
public function batch(): BelongsTo{
        return $this->belongsTo(Batch::class,'batch_id','id');
}
public function assignment_submission(): HasMany{
        return $this->hasMany(AssignmentSubmission::class,'student_id','id');
}
public function semester(): BelongsTo{
        return $this->belongsTo(Semester::class,'semester_id','id');
}
public function section(): BelongsTo{
        return  $this->belongsTo(Section::class,'section_id','id');
}
public function leaves():HasMany{
        return $this->hasMany(Leave::class,'student_id','id');
}

    



}
