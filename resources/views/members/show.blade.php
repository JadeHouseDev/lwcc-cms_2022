@extends('layouts.base')
@section('title', "Member Info")

@section('page_title', $member->member_other_names . " " . $member->member_surname )

@section('main_content')
    <div class="row">
        <div class="col">
            <a href="{{ route('members.index') }}" class="btn btn-sm btn-danger float-end">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if ($member ?? "")
                <div class="card">
                    <div class="card-header text-decoration-underline"><h4>Basic Info</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="font-weight-bold"> Date of Birth: </span> {{ $member->member_info->dob ?? "N/A" }}</div>
                            <div class="col"><span class="font-weight-bold"> Residential Address: </span> {{ $member->member_info->residential_address ?? "N/A" }}</div>
                            <div class="col"><span class="font-weight-bold"> Occupation: </span> {{ $member->member_info->occupation ?? "N/A" }}</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-decoration-underline">
                        <h4>Contributions</h4>
                        {{-- <a href="" class="btn btn-success btn-sm" type="button"></a> --}}
                        <button href="" type="button" class="float-right btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add_contribution_modal">Add New Contribution</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dt_tabl" class="table display table-striped" style="width:100%">
                                <thead>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Week</th>
                                    <th>Type</th>
                                    <th>Amount (GHc)</th>
                                    <th>Status</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @if ($member->contributions ?? "")
                                        @forelse ($member->contributions as $contrib)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contrib->date->format('D d M Y') ?? "N/A" }}</td>
                                                <td>Week {{ $contrib->date->weekNumberInMonth ?? "N/A" }}</td>
                                                <td>{{ $contrib->type->comment ?? "N/A" }}</td>
                                                <td>{{ $contrib->amount ?? "N/A" }}</td>
                                                <td>Status</td>
                                                <td>
                                                    <button class="btn  btn-success">Resend SMS</button>
                                                    <button class="btn  btn-info">View</button>
                                                    <button class="btn  btn-warning">Edit</button>
                                                </td>
                                            </tr>
                                        @empty
                                            @include('components.alert', ['alert_type'=>'danger', 'text'=>'No Contributions Recorded Yet.'])
                                        @endforelse
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('members._add_contribution_modal', ['member'=>$member])

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
