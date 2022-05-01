<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class MemberContribution extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function type()
    {
        return $this->hasOne(ContributionType::class, 'con_type_id', 'con_type_id');
    }
    public function member()
    {
        return $this->hasOne(MemberMaster::class, 'member_id', 'member_id');
    }
}
