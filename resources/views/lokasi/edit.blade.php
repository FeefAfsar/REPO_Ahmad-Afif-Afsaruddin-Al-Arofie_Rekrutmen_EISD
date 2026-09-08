<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi - TitipKeun</title>
</head>
<body>
    <div style="padding: 20px; font-family: sans-serif;">
        <h2>Edit Lokasi Parkir</h2>
        
        <form action="/lokasi-parkir/{{ $lokasi->id }}" method="POST">
            @csrf 
            @method('PUT') <!-- Wajib untuk proses update di Laravel -->
            
            <div style="margin-bottom: 10px;">
                <label>Nama Tempat:</label><br>
                <!-- Tambahkan atribut value agar terisi otomatis -->
                <input type="text" name="nama_tempat" required value="{{ $lokasi->nama_tempat }}">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Alamat:</label><br>
                <textarea name="alamat" required>{{ $lokasi->alamat }}</textarea>
            </div>

            <button type="submit">Update Data</button>
            <a href="/lokasi-parkir" style="margin-left: 10px;">Batal</a>
        </form>
    </div>
</body>
</html>