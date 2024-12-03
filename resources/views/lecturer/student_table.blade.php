<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Position</th>
                <th>Last Update Password</th>
                <th>Updated By</th>
                <th>Update Date</th>
                <th>Create By</th>
                <th>Create Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->user_id }}</td>
                    <td>{{ $student->user_name }}</td>
                    <td>{{ $student->position }}</td>
                    <td>{{ $student->last_update_password }}</td>
                    <td>{{ $student->updated_by }}</td>
                    <td>{{ $student->update_date }}</td>
                    <td>{{ $student->create_by }}</td>
                    <td>{{ $student->create_date }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No students found for this supervisor.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
