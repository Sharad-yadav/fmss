<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Routine extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function batch(){
        return $this->belongsTo(Batch::class,'batch_id','id');
    }
    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id','id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }
}
