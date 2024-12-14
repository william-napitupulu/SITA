@extends('adminlte::page')

@section('title', 'Approve Eligibility')

@section('content_header')
<div class="d-flex flex-column align-items-center p-3 bg-white w-100">
    <h1 class="text-primary">Approve Eligibility</h1>
    <small class="text-muted">Manage eligibility status of students</small>
</div>
@stop

@section('content')
<div class="container mt-4">
    <h2>Student Data</h2>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Eligibility</th>
                <th>Status Eligibility</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Start index at 1 -->
                <td>{{ $request->user->name }}</td>
                <td>
                    @if($request->eligibility === 'All Fulfilled')
                    <span class="badge badge-success">All Fulfilled</span>
                    @else
                    <span class="badge badge-danger">Some Not Fulfilled</span>
                    @endif
                </td>
                <td>
                    @if($request->status === 'approved')
                    <span class="badge badge-success">Accepted</span>
                    @elseif($request->status === 'rejected')
                    <span class="badge badge-danger">Rejected</span>
                    @else
                    <span class="badge badge-warning text-dark">Pending</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-sm preview-btn" data-key="{{ $loop->iteration }}" data-toggle="modal" data-target="#previewModal-{{ $loop->iteration }}">Preview</button>
                    <div id="action-buttons-{{ $request->id }}" class="d-inline">
                        @if($request->status === 'pending')
                        <form action="{{ route('request.approve', $request->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('request.reject', $request->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                        @else
                        <button type="button" class="btn btn-warning btn-sm edit-btn" data-id="{{ $request->id }}">Edit</button>
                        @endif
                    </div>
                </td>
            </tr>

            <!-- Preview Modal -->
            <div class="modal fade" id="previewModal-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="previewModalLabel-{{ $loop->iteration }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="previewModalLabel-{{ $loop->iteration }}">Form Eligibility Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Name:</strong> {{ $request->user->name }}</p>
                            <p><strong>Eligibility:</strong> 
                                @if($request->eligibility === 'All Fulfilled')
                                Semua Terpenuhi
                                @else
                                Beberapa Tidak Terpenuhi
                                @endif
                            </p>
                            <p><strong>Details:</strong></p>
                            <ul>
                                @foreach(explode(',', $request->criteria) as $criteria)
                                <li>{{ $criteria }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const actionButtons = document.getElementById(`action-buttons-${id}`);
                actionButtons.innerHTML = `
                    <form action="{{ route('request.approve', '') }}/${id}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                    </form>
                    <form action="{{ route('request.reject', '') }}/${id}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                    </form>
                `;
            });
        });
    });
</script>
@stop
