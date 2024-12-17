@extends('adminlte::page')

@section('title', 'Approve Eligibility')

@section('content_header')
<div class="p-3 bg-white w-100">
    <h1 class="text-primary font-weight-bold text-left">Approve Eligibility</h1>
</div>
@stop

@section('content')
<div class="container-fluid mt-4">
    <!-- Judul dengan Latar Biru -->
    <h4 class="text-white p-3 rounded" style="background-color: #4285f4;">Student Data</h4>
    
    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th class="text-black" style="background-color: #D6E4F0; text-align: left;">#</th>
                    <th class="text-black" style="background-color: #D6E4F0; text-align: left;">Student Name</th>
                    <th class="text-black" style="background-color: #D6E4F0; text-align: left;">Eligibility</th>
                    <th class="text-black" style="background-color: #D6E4F0; text-align: left;">Status Eligibility</th>
                    <th class="text-black" style="background-color: #D6E4F0; text-align: left;">Action</th>
                </tr>
            </thead>
            <!-- Tambahkan di sini -->
<style>
/* Warna Baris Ganjil dan Genap */
.table-bordered tbody tr:nth-child(odd) {
    background-color: #f1f1f1; /* Putih untuk baris ganjil */
}

.table-bordered tbody tr:nth-child(even) {
    background-color: #ffffff; /* Abu-abu untuk baris genap */
}
.modal-body {
    background-color: #ffffff !important; /* Warna putih */
}

/* Pastikan modal header tetap kuning */
.modal-header.bg-warning {
    background-color: #ffff !important; /* Kuning Bootstrap */
}

.btn-warning.edit-btn {
    background-color: #F58220 !important; /* Warna oranye */
    color: #ffffff !important; /* Warna teks putih */
    border-color: #F58220 !important; /* Warna border */
}

</style>
            <tbody>
                @foreach($requests as $request)
                <tr>
                    <td style="text-align: left;">{{ $loop->iteration }}</td>
                    <td style="text-align: left;">{{ $request->user->name }}</td>
                    <td style="text-align: left;">
                        @if($request->criteria === 'Terdaftar di PD-DIKTI,Lulus evaluasi tahun pertama,minimal 90% SKS terpenuhi,IPK >= 2.0,Perilaku C atau lebih,TOEFL >= 460')
                        <span class="badge badge-success">All Fulfilled</span>
                        @else
                        <span class="badge badge-danger">Some Not Fulfilled</span>
                        @endif
                    </td>
                    <td style="text-align: left;">
                        @if($request->status === 'approved')
                        <span class="badge badge-success">Accepted</span>
                        @elseif($request->status === 'rejected')
                        <span class="badge badge-danger">Rejected</span>
                        @else
                        <span class="badge badge-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td style="text-align: left;">
                        <button type="button" class="btn btn-info btn-sm preview-btn" data-toggle="modal" data-target="#previewModal-{{ $loop->iteration }}">Preview</button>
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
        <div class="modal-content" style="background-color: #ffffff;"> <!-- Tambahkan style -->
            <div class="modal-header bg-warning">
                <h5 class="modal-title font-weight-bold" id="previewModalLabel-{{ $loop->iteration }}">Form Eligibility Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong> Nama Mahasiswa:</strong> {{ $request->user->name }}</p>
                <p><strong>Kelengkapan syarat:</strong> 
                    @if($request->eligibility === 'All Fulfilled')
                    Semua Terpenuhi
                    @else
                    Beberapa Tidak Terpenuhi
                    @endif
                </p>
                <p><strong>Detail form</form>:</strong></p>
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
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id; // Ambil ID dari tombol Edit
            const actionButtons = document.getElementById(`action-buttons-${id}`); // Targetkan elemen tombol

            // Ganti tombol menjadi Approve dan Reject
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
