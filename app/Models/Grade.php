<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Grade extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function faculty(): BelongsTo {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function semester():BelongsTo{
        return $this->belongsTo(Semester::class,'semester_id','id');
    }
    public function section():BelongsTo{
        return  $this->belongsTo(Section::class,'Section_id','id');
    }
    public function batch():BelongsTo {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }
}
