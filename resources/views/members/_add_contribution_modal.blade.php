<!-- Modal -->
<div class="modal fade" id="add_contribution_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Contribution</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('member_contributions.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="con_type_id">Select Contribution Type:* </label>
                                <select name="con_type_id" id="con_type_id" class="form-control" required>
                                    <option value="">Select Type</option>
                                    @if ($cont_types)
                                        @forelse ($cont_types as $type)
                                            <option value="{{ $type->con_type_id }}">{{ $type->comment }}</option>
                                        @empty
                                            <option value="tithes">No Cotribution Types Yet.</option>
                                        @endforelse
                                    @endif
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="amount">Amount:* </label>
                                <input type="number" pattern="[0-9]" step="0.01" title="Enter Only Numbers" name="amount" placeholder="First name and Middle Names"  value="{{ old('amount') }}" class="form-control" id="amount" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="date">Date:* </label>
                                <input type="date" name="date" value="{{ old('date') }}" placeholder="Choose a sunday in the week" class="form-control" id="date" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="comment">Comment:* </label>
                                <textarea name="comment" id="comment" rows="2" class="form-control">{{ old('comment') }}</textarea>
                            </div>

                            <input type="hidden" name="member_id" value="{{ $member->member_id }}">

                        </div>


                    </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success" value="Save Member Contribution">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
