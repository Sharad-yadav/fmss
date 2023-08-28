<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function leaveType(): BelongsTo {
        return $this->belongsTo(LeaveType::class,foreignKey: 'leave_type_id',ownerKey: 'id');
    }
    public  function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id','id');
    }
}

