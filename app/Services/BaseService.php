<?php
namespace App\Services;

use App\Models\BranchMaster;
use App\Models\MemberInfo;
use App\Models\Ministry;
use Illuminate\Support\Str;
use App\Models\ContributionType;
use App\Models\MemberContribution;
use App\Models\MemberMaster;
use App\Models\SystemProperty;
use Illuminate\Support\Facades\Log;

class BaseService {
    public function generate_token(string $prefix="")
    {
        $uniq_key = Str::upper(uniqid());
        $shuffle_key = str_shuffle($uniq_key);
        $final_key = Str::substr($shuffle_key, 0, 8);
        return $prefix.$final_key;
    }

    // fetch all branches
    public function fetch_branches($how_many = "all") {
        if (is_numeric($how_many)) {
            return BranchMaster::orderBy('name')->paginate($how_many);
        }
        return BranchMaster::orderBy('name')->get();
    }

    // fetch all ministries
    public function fetch_miinistries($how_many = "all") {
        if (is_numeric($how_many)) {
            return Ministry::orderBy('name')->paginate($how_many);
        }
        return Ministry::orderBy('name')->get();
    }

    public function get_member_info($member_id)
    {
        return MemberMaster::with('member_info')->where([['member_id', $member_id], ['active_status', true]])->first();
    }

    public function get_cont_type($cont_type_id)
    {
        return ContributionType::where('con_type_id', $cont_type_id)->first();
    }

    public function update_sms_count_in_db(array $value)
    {
        $value = $value['summary'];
        try {
            SystemProperty::create([
                'previous_sms_balance' =>(int)$value['credit_left'] - (int)$value['credit_used'],
                'last_sms_used' =>$value['credit_used'],
                'sms_balance' =>$value['credit_left'],
            ]);
            Log::info("\n SMS - System Properties Updated Successfully");
        } catch (\Throwable $th) {
            Log::info("\n Error Updating System Properties");
            //throw $th;
        }

    }

    public function get_sms(): int
    {
        $response = SystemProperty::all();
        return $response->sms_balance;
    }

    public function update_sms_status_of_last_contribution(string $phone_number)
    {
        $member = $this->get_member_by_phone_number($phone_number);
        $member_id = $member->member_id;

        try {
            $last_cont = MemberContribution::where('member_id', $member_id)->latest()->first();
            $last_cont->sms_sent = true;
            $last_cont->save();

            Log::info("\n SMS Sent column updated successfully");
        } catch (\Throwable $th) {
            Log::info("\n Error Updating SMS Sent column");
        }
    }

    public function get_member_by_phone_number(string $phone_number): mixed
    {
        return MemberInfo::where('phone', $phone_number)->first();
    }

}
