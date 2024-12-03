<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platform Kami</title>
</head>
<body>
    <h1>Platform Kami</h1>

    <!-- Flash message -->
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Tampilkan daftar platform -->
    <ul>
        @foreach ($platforms as $platform)
            <li>
                <a href="{{ $platform->url }}" target="_blank">{{ $platform->nama }}</a>
                <form action="{{ route('platformkami.destroy', $platform->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Form tambah platform -->
    <h2>Tambah Platform Baru</h2>
    <form action="{{ route('platformkami.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <label for="url">URL:</label>
        <input type="url" name="url" id="url" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
