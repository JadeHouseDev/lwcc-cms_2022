
<div class="card">
    <div class="card-body">
        <a href="" type="button" class="float-right btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add_ministry_modal">Add New</a>
        <div class="table-responsive mt-4">
            <table id="dt_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="font-weight-bold">#</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Alias</th>
                        <th class="font-weight-bold">Created on</th>
                        <th class="font-weight-bold"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ministries as $ministry)
                        <tr>
                            <td style="width: 5px;">{{ $loop->iteration }}</td>
                            <td class="font-wieght-bold">{{ $ministry->name ?? "" }}</td>
                            <td>{{ $ministry->alias ?? "N / A" }}</td>
                            <td>{{ $ministry->created_at ?? "" }}</td>
                            <td style="min-width: 200px;">
                                <a href="{{ route('ministries.show', ['ministry'=>$ministry->ministry_id]) }}" class="btn btn-sm btn-success">View</a>
                                <a href="{{ route('ministries.edit', ['ministry'=>$ministry->ministry_id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('ministries.show', ['ministry'=>$ministry->ministry_id]) }}" class="btn btn-sm btn-danger">Disable</a>
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


