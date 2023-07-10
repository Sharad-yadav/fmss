<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignmentSubmission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function assignment():BelongsTo{
        return $this->belongsTo(Assignment::class,'assignment_id','id');

    }
    public function student(): BelongsTo{
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
