@extends('layouts.base')
@section('title', "Ministries")

@section('page_title', 'Ministries')

@section('main_content')
    <div class="row">
        <div class="col">
           @if ($ministries ?? "")
                @include('ministries._ministries', ['ministries'=>$ministries])
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('ministries._add_ministry_modal')

@endsection


@section('extra_css')

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
