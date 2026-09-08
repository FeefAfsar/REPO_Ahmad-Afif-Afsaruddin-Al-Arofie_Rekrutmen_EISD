<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi - TitipKeun</title>
</head>
<body>
    <div style="padding: 20px; font-family: sans-serif;">
        <h2>Tambah Lokasi Parkir Baru</h2>
        
        <!-- Jangan lupa action dan method-nya! -->
        <form action="/lokasi-parkir" method="POST">
            @csrf <!-- Ini WAJIB ada di Laravel agar aman dari serangan hacker -->
            
            <div style="margin-bottom: 10px;">
                <label>Nama Tempat:</label><br>
                <input type="text" name="nama_tempat" required placeholder="Contoh: Gedung TULT">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Alamat:</label><br>
                <textarea name="alamat" required placeholder="Contoh: Jalan Telekomunikasi..."></textarea>
            </div>

            <button type="submit">Simpan Data</button>
            <a href="/lokasi-parkir" style="margin-left: 10px;">Batal</a>
        </form>
    </div>
</body>
</html>