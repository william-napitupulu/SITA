@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Assign Students to Group</h2>
    <form action="{{ route('assign.student') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Assign</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                    <td>
                        <input type="checkbox" name="students[]" value="{{ $student['id'] }}" class="student-checkbox">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Assign Students to Group</button>
    </form>
</div>
@endsection
