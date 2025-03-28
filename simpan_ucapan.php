<?php
// Atur zona waktu ke Jakarta
date_default_timezone_set('Asia/Jakarta');

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $namaPengirim = $_POST['namaPengirim'];
    $pesanUcapan = $_POST['pesanUcapan'];
    
    // Buat string untuk disimpan dengan format tanggal Indonesia
    $waktu = date('d/m/Y H:i:s');
    $dataUcapan = "$waktu | $namaPengirim | $pesanUcapan\n";
    
    // Simpan ke file teks
    $file = 'ucapan.txt';
    file_put_contents($file, $dataUcapan, FILE_APPEND);
    
    // Redirect kembali ke halaman utama dengan parameter sukses
    header("Location: index.php?status=sukses");
    exit();
}
?>