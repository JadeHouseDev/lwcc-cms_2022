<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessContributionSMS;
use App\Models\MemberContribution;
use App\Models\MemberInfo;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributions = MemberContribution::where('active_status', true)->get();
        return view('member_contributions.index', compact('contributions'));
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
    public function store(Request $request, BaseService $baseService)
    {
        $contribution = $request->validate([
            'member_id' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'date' => 'date',
            'con_type_id' => 'required|string',
        ]);

        $contribution['contrib_id'] = $baseService->generate_token();

        $member_details = $baseService->get_member_info($contribution['member_id']);
        $phone = $member_details->member_info->phone;
        $name = $member_details->member_other_names ?? "Hi";


        $cont_type = $baseService->get_cont_type($contribution['con_type_id']);
        $cont_type = $cont_type->comment;

        $msg = $this->form_message(name: $name, amount:$contribution['amount'], date: $contribution['date'], cont_type: $cont_type);

        // dd($msg);

        try {
            MemberContribution::create($contribution);
            ProcessContributionSMS::dispatch($phone, $msg);
            // queue payment receipt sms
            return back()->with('success', 'Contribution Added Successfully.');
        } catch (\Throwable $th) {
            $err = $th->getMessage();
            Log::info("\n\n Error due to : $err \n");
            return back()->with('error', 'Could Not Save Member Contribution');
            return $th->getMessage();
        }
    }

    private function form_message($name, $amount, $date, $cont_type): string
    {
        return $text = "$name, your $cont_type payment of GHc $amount for $date has been received. God bless you.";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberContribution  $memberContribution
     * @return \Illuminate\Http\Response
     */
    public function show(MemberContribution $memberContribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberContribution  $memberContribution
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberContribution $memberContribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberContribution  $memberContribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberContribution $memberContribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberContribution  $memberContribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberContribution $memberContribution)
    {
        //
    }
}
