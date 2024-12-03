@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Eligibility Form</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Fill in the details below</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('eligibility.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_number">ID Number</label>
                    <input type="text" id="id_number" name="id_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="eligibility_status">Eligibility Status</label>
                    <select id="eligibility_status" name="eligibility_status" class="form-control">
                        <option value="eligible">Eligible</option>
                        <option value="not_eligible">Not Eligible</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea id="comments" name="comments" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@stop
