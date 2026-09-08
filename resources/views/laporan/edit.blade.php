<div style="padding: 20px; font-family: sans-serif;">
    <h2>Update Status Laporan</h2>
    <form action="/laporan/{{ $laporan->id }}" method="POST">
        @csrf @method('PUT')
        <p>Lokasi: {{ $laporan->nama_lokasi }}</p>
        <p>Status Saat Ini:<br>
            <select name="status">
                <option value="pending" {{ $laporan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </p>
        <button type="submit">Update Status</button>
        <a href="/laporan">Batal</a>
    </form>
</div>