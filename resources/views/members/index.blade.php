@extends('layouts.base')
@section('title', "Members")

@section('page_title', 'Members')

@section('main_content')
    <div class="row">
        <div class="col">
            @if ($members ?? "")
                @include('members._members', ['members'=>$members])
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('members._add_member_modal')

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
