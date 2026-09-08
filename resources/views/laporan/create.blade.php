<div style="padding: 20px; font-family: sans-serif;">
    <h2>Buat Laporan Baru</h2>
    <form action="/laporan" method="POST">
        @csrf
        <p>Lokasi Parkir:<br>
            <select name="nama_lokasi" required>
                @foreach($lokasi as $lok)
                    <option value="{{ $lok->nama_tempat }}">{{ $lok->nama_tempat }}</option>
                @endforeach
            </select>
        </p>
        <p>Deskripsi Kejadian:<br><textarea name="deskripsi" required cols="40" rows="5"></textarea></p>
        <button type="submit">Kirim Laporan</button>
        <a href="/laporan">Batal</a>
    </form>
</div>