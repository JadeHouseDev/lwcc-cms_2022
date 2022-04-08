<?php
namespace App\Services;

use App\Models\BranchMaster;
use App\Models\Ministry;
use Illuminate\Support\Str;

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

}
