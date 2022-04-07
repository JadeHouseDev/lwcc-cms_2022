<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberMaster extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function member_info()
    {
        return $this->hasOne(MemberInfo::class, 'member_id', 'member_id');
    }

}
