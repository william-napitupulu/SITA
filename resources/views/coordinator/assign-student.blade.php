@extends('adminlte::page')

@section('title', 'Assign Students')

@section('content')
<div class="container">
    <h2>Assign Students to Supervisors</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Supervisor Selection -->
    <div class="form-group">
        <label for="supervisorSelect"><strong>Select Supervisor:</strong></label>
        <form method="POST" action="{{ route('assign.students.submit') }}">
            @csrf
            <select id="supervisorSelect" name="supervisor_id" class="form-control" required>
                <option value="">Select Supervisor...</option>
                @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                @endforeach
            </select>

            <!-- Table of Students -->
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Batch</th>
                        <th>NIM</th>
                        <th>Student Name</th>
                        <th>Supervisor</th>
                        <th>Group</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $key => $student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->student->batch ?? '-' }}</td>
                            <td>{{ $student->student->nim ?? '-' }}</td>
                            <td>{{ $student->student->name ?? '-' }}</td>
                            <td>{{ $student->supervisor->name ?? '-' }}</td>
                            <td>{{ $student->group ?? '-' }}</td>
                            <td>
                                <input type="checkbox" name="students[]" value="{{ $student->student_id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Assign</button>
        </form>
    </div>
</div>
@stop
