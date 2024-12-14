@extends('adminlte::page')

@section('title', 'Academic Year')

@section('content')
<div class="container">
    <h1 class="mb-4">Academic Year</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select to View</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($years as $year)
                    <li class="list-group-item">
                        <a href="{{ route('academic.years.details', ['year' => 2017]) }}">{{ $year }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
