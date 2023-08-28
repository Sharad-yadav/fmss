<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Batch extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function student(): HasMany{
        return $this->hasMany(Student::class,'batch_id','id');
    }
    public function grade(): HasMany{
        return $this->hasMany(Grade::class,'batch_id','id');
    }
    public function syllabi(): HasMany{
        return $this->hasMany(Syllabus::class,'batch_id','id');
    }
    public function routines(): HasMany{
        return $this->hasMany(Routine::class,'batch_id','id');
    }

}
