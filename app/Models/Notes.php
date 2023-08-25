<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function faculty(): BelongsTo {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function semester(): BelongsTo {
        return $this->belongsTo(Semester::class,'semester_id','id');
    }
    public function subject(): BelongsTo {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
