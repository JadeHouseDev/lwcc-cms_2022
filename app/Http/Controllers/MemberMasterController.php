<?php

namespace App\Http\Controllers;

use App\Models\BranchMember;
use App\Models\ContributionType;
use App\Models\MemberInfo;
use App\Services\BaseService;
use App\Models\MemberMaster;
use Illuminate\Http\Request;

class MemberMasterController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new BaseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MemberMaster $members)
    {
        $branches = $this->service->fetch_branches("all");
        $miinistries = $this->service->fetch_miinistries("all");
        $members = MemberMaster::with('member_info')->orderByDesc('created_at')->paginate(100);
        return view('members.index')->with(['members'=>$members, 'branches'=>$branches, 'ministries'=>$miinistries]);
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
        // dd($request->all());
        $member = $request->validate([
            'member_other_names' => 'required | string | min:3',
            'member_surname' => 'required | string | min:3',
            'dob' => 'required | date ',
            'residential_address' => 'required | string ',
            'occupation' => 'nullable | string ',
            'phone' => 'required | string | min:10 ',
            'extra_info' => 'nullable | string',
            'branch' => 'nullable | string',
            'ministry' => 'nullable | string',
        ]);

        $member['member_id'] = $this->service->generate_token();

        // dd($member);

        // save into member master and member info
        try {
            $this->saveMember($member);
            $this->saveMemberInfo($member);
            $this->saveMemberBranch($member['member_id'], $member['branch']);

            return redirect()->back()->with('success', $member['member_other_names']. " Details Created Successfully.");
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', "Member Details Could Not Be Saved. Please Try Again Later.");
        }



    }

    protected function saveMemberBranch(string $member_id, string $branch_id)
    {
        return BranchMember::create([
            'branch_id' => $branch_id,
            'member_id' => $member_id,
        ]);
    }

    protected function saveMember(array $member_basic)
    {
        return MemberMaster::create($member_basic);
    }

    protected function saveMemberInfo(array $member_info)
    {
        return  MemberInfo::create($member_info);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        $cont_types = ContributionType::all(); //contribution_types
        $member = MemberMaster::with(['member_info','contributions'])->where('member_id', $member_id)->first();
        return view('members.show', compact('member', 'cont_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberMaster $memberMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberMaster $memberMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberMaster $memberMaster)
    {
        //
    }
}
