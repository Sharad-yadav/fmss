<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function student(): HasMany{
        return $this->hasMany(Student::class,'batch_id','id');
    }
}
