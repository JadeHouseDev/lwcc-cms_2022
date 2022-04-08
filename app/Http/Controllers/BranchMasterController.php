<?php

namespace App\Http\Controllers;

use App\Models\BranchMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BranchMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = BranchMaster::orderBy('created_at', 'desc')->paginate(100);
        return view('branches.index')->with(['branches'=>$branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("########################### STORING BRANCH RECORD");
        $validated = $request->validate([
            'name' => 'required | string | min:3',
            'location' => 'required | string | min:3',
            'phone' => 'required | string | min:10',
        ]);

        // APPEND AUTO GENERATED ID TO VALIDATED DATA
        $validated['branch_id'] = $this->generate_token();

        $branch = BranchMaster::create($validated);

        if ($branch) {
            return redirect()->route('branches.index')->with('success', $branch->name." Branch Saved Successfully");
        } else {
            return redirect()->route('branches.index')->with('error', $branch->name." Branch Could Not Be Created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchMaster  $branchMaster
     * @return \Illuminate\Http\Response
     */
    public function show(BranchMaster $branchMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchMaster  $branchMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchMaster $branchMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchMaster  $branchMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchMaster $branchMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchMaster  $branchMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchMaster $branchMaster)
    {
        //
    }
}
