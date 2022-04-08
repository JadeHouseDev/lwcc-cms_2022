
<div class="card">
    <div class="card-body">
        <a href="" type="button" class="float-right btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add_member_modal">Add New</a>
        <div class="table-responsive mt-4">
            <table id="dt_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="font-weight-bold">#</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Phone</th>
                        <th class="font-weight-bold">Residential Address</th>
                        <th class="font-weight-bold">D.O.B</th>
                        <th class="font-weight-bold"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td style="width: 5px;">{{ $loop->iteration }}</td>
                            <td>{{ $member->member_other_names ?? "" }} {{ $member->member_surname ?? "" }}</td>
                            <td>{{ $member->member_info->phone ?? "N / A" }}</td>
                            <td>{{ $member->member_info->residential_address ?? "" }}</td>
                            <td>{{ $member->member_info->dob ?? "" }}</td>
                            <td style="min-width: 200px;">
                                <button class="btn btn-sm btn-success">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Disable</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Residential Address</th>
                        <th>D.O.B</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
