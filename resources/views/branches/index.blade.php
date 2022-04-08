@extends('layouts.base')
@section('title', "Branches")

@section('page_title', 'Branches')

@section('main_content')
    <div class="row">
        <div class="col">
           @if ($branches ?? "")
                @include('branches._branches', ['branches'=>$branches])
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('branches._add_branch_modal')

@endsection


@section('extra_css')

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
