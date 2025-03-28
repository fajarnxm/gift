<?php
// Atur zona waktu ke Jakarta
date_default_timezone_set('Asia/Jakarta');

// Baca file teks
$file = 'ucapan.txt';

if (file_exists($file)) {
    $ucapanList = file($file, FILE_IGNORE_NEW_LINES);
    
    // Balik urutan agar ucapan terbaru di atas
    $ucapanList = array_reverse($ucapanList);
    
    // Tampilkan ucapan
    foreach ($ucapanList as $ucapan) {
        // Pisahkan data
        $detail = explode(' | ', $ucapan);
        
        // Pastikan data lengkap
        if (count($detail) == 3) {
            echo "<div class='border p-2 mb-2'>";
            echo "<strong>" . htmlspecialchars($detail[1]) . "</strong> ";
            echo "<small class='text-muted'>(" . htmlspecialchars($detail[0]) . ")</small>";
            echo "<p>" . htmlspecialchars($detail[2]) . "</p>";
            echo "</div>";
        }
    }
} else {
    echo "<p>Belum ada ucapan.</p>";
}
?>