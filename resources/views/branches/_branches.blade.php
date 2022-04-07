
<div class="card">
    <div class="card-body">
        <a href="" type="button" class="float-right btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add_branch_modal">Add New</a>
        <div class="table-responsive mt-4">
            <table id="dt_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="font-weight-bold">#</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Phone</th>
                        <th class="font-weight-bold">Location</th>
                        <th class="font-weight-bold"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                        <tr>
                            <td style="width: 5px;">{{ $loop->iteration }}</td>
                            <td class="font-wieght-bold">{{ $branch->name ?? "" }}</td>
                            <td>{{ $branch->phone ?? "N / A" }}</td>
                            <td>{{ $branch->location ?? "" }}</td>
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
                        <th>Location</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


