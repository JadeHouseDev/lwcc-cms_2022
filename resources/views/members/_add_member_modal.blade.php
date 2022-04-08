<!-- Modal -->
<div class="modal fade" id="add_member_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('members.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="member_other_names">Other Names:^ </label>
                                <input type="text" name="member_other_names" placeholder="First name and Middle Names"  value="{{ old('member_other_names') }}" class="form-control" id="member_other_names" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="phone">Phone Numbers:* </label>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Separate numbers with Comma (,)" class="form-control" id="phone" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="ministry">Ministry: </label>
                                <select name="ministry" id="ministry" class="form-control">
                                    <option value="">Select Ministries</option>
                                    @if ($ministries ?? "")
                                        @foreach ($ministries as $ministry)
                                            <option value="{{ $ministry->ministry_id }}">{{ $ministry->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                            <div class="form-group mt-3">
                                <label for="residential_address">Residential Address:* </label>
                                <input type="text" name="residential_address" value="{{ old('residential_address') }}" placeholder="Residential Address" class="form-control" id="residential_address" required>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="member_surname">Last Name:* </label>
                                <input type="text" name="member_surname" value="{{ old('member_surname') }}" placeholder="Surname" class="form-control" id="member_surname" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="dob">Date of Birth:* </label>
                                <input name="dob" value="{{ old('dob') }}" type="date" class="form-control" id="dob" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="branch">Branch:* </label>
                                <select name="branch" id="branch" class="form-control" required>
                                    <option value="">Select Branch</option>
                                    @if ($branches ?? "")
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->branch_id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="occupation">Occupation: </label>
                                <input name="occupation" value="{{ old('occupation') }}" type="text" class="form-control" id="occupation" required>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <label for="extra_info">Extra Information: </label>
                            <textarea name="extra_info" class="form-control" id="extra_info" rows="3">{{ old('extra_info') }}</textarea>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success" value="Save Member Details">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
