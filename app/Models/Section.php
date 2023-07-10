<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function semester(): BelongsTo{
        return $this->belongsTo(Semester::class,'semester_id','id');
    }
    public  function student():HasMany{
        return $this->hasMany( Student::class,'section_id','id');
    }
}
