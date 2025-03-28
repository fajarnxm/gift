<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hadiah Untuk Bagud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan SweetAlert CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0097E0;
            --secondary-color: #FF6B6B;
            --background-color: #F4F4F4;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
        }

        .rekening-img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 10px;
            object-fit: cover;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #FF4F4F;
            border-color: #FF4F4F;
            transform: translateY(-2px);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(106, 90, 205, 0.25);
        }

        .border {
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 15px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: var(--primary-color);">Hadiah Untuk Bagud</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Informasi Rekening
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <img src="BCA.png" alt="Rekening" class="rekening-img">
                        </div>
                        <div>
                            <h5>Bank BCA</h5>
                            <p class="mb-1">No. Rekening: 0070370921</p>
                            <p class="mb-0">Atas Nama: Muhammad Bagus Nugroho</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tambah Ucapan
                    </div>
                    <div class="card-body">
                        <form id="ucapanForm" action="simpan_ucapan.php" method="POST">
                            <div class="mb-3">
                                <label for="namaPengirim" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="namaPengirim" name="namaPengirim" required>
                            </div>
                            <div class="mb-3">
                                <label for="pesanUcapan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="pesanUcapan" name="pesanUcapan" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kirim Ucapan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Ucapan
                    </div>
                    <div class="card-body">
                        <?php include 'tampil_ucapan.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Selamat Datang!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <img src="240700103.png" alt="Rekening" class="rekening-img">
                        </div>
                        <div>
                            <h5>Halo</h5>
                            <p class="mb-1">Saya</p>
                            <p class="mb-0">Bagus</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    
    <script>
	// Tampilkan modal saat halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", function () {
            var myModal = new bootstrap.Modal(document.getElementById("myModal"));
            myModal.show();
        });
    // Tangkap submit form
    document.getElementById('ucapanForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah submit form standar

        // Ambil data form
        const form = e.target;
        const formData = new FormData(form);

        // Kirim data dengan fetch
        fetch('simpan_ucapan.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            // Tampilkan SweetAlert
            Swal.fire({
                title: 'Yeay!',
                text: 'Ucapan berhasil dikirim!',
                icon: 'success',
                confirmButtonText: 'Oke',
                confirmButtonColor: '#6A5ACD'
            }).then(() => {
                // Reload halaman setelah konfirmasi
                location.reload();
            });
        })
        .catch(error => {
            // Tampilkan error jika gagal
            Swal.fire({
                title: 'Oops!',
                text: 'Gagal mengirim ucapan',
                icon: 'error',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#FF6B6B'
            });
        });
    });

    // Cek apakah ada parameter sukses di URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'sukses') {
        Swal.fire({
            title: 'Yeay!',
            text: 'Ucapan berhasil dikirim!',
            icon: 'success',
            confirmButtonText: 'Oke',
            confirmButtonColor: '#6A5ACD'
        });
    }
    </script>
</body>
</html>