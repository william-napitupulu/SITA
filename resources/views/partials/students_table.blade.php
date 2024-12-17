<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Batch</th>
            <th>NIM</th>
            <th>Student Name</th>
            <th>Supervisor</th>
            <th>Group</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $key => $student)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $student->batch ?? '-' }}</td>
                <td>{{ $student->nim ?? '-' }}</td>
                <td>{{ $student->student->name ?? '-' }}</td>
                <td>{{ $student->supervisor->name ?? '-' }}</td>
                <td>{{ $student->group ?? 'N/A' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No students found for this supervisor.</td>
            </tr>
        @endforelse
    </tbody>
</table>
