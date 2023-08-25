<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function subject(): BelongsTo{
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function teacher(): BelongsTo{
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
    public function submissions(): HasMany{
        return $this->hasMany(AssignmentSubmission::class,'assignment_id','id');
    }
}
