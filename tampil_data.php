<?php
// Deklarasi strict types
declare(strict_types=1);
// memulai session
session_start();

// menampilkan pesan sesuai dengan proses yang dijalankan
// jika pesan tersedia
if (isset($_SESSION['pesan'])):
?>
    <script type="text/javascript">
        $(document).ready(function() {
            $.notify({
                title: '<h6 class="font-weight-bold mb-1"><?= $_SESSION['pesan']['icon']; ?><?= $_SESSION['pesan']['judul']; ?></h6>',
                message: '<?= $_SESSION['pesan']['isi']; ?>'
            }, {
                type: '<?= $_SESSION['pesan']['status']; ?>',
                allow_dismiss: false,
            });
        });
    </script>
<?php
    // hapus pesan setelah ditampilkan
    unset($_SESSION['pesan']);
endif;
?>

<div class="d-flex flex-column flex-lg-row mt-5 mb-3">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fa-regular fa-user icon-title"></i>
        <h3>Siswa</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Siswa</a></li>
                <li class="breadcrumb-item" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="d-grid gap-2 d-md-block bg-white rounded-4 shadow-sm p-4 mb-3">
    <!-- button entri data -->
    <a href="?halaman=entri" class="btn btn-primary rounded-pill py-2 px-4 me-md-2">
        <i class="fa-solid fa-plus me-2"></i> Entri Siswa
    </a>
</div>

<div class="d-grid gap-2 d-md-block bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped table-hover" style="width:100%;">
            <thead class="table-light">
                <th class="text-center">No.</th>
                <th class="text-center">Foto</th>
                <th class="text-center">ID Siswa</th>
                <th class="text-center">Nama Lengkap</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Tanggal Daftar</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                <?php
                // variabel untuk nomor urut tabel
                $no = 1;
                // sql statement untuk menampilkan data dari tabel "tbl_siswa"
                $query = $mysqli->query("SELECT id_siswa, tanggal_daftar, kelas, nama_lengkap, jenis_kelamin, foto_profil FROM tbl_siswa ORDER BY id_siswa DESC")
                                        or die("Ada kesalahan pada query tampil data : {$mysqli->error}");
                // ambil data hasil query
                while ($data = $query->fetch_assoc()) { ?>
                    <tr>
                        <td width="5%" class="text-center"><?= $no++ ?></td>
                        <td width="7%" class="text-center">
                            <img src="images/<?= basename($data['foto_profil']) ?>" class="border border-2 img-fluid rounded-3" alt="Foto Profil" width="70" height="70" loading="lazy">
                        </td>
                        <td width="8%" class="text-center"><?= $data['id_siswa'] ?></td>
                        <td width="24%"><?= $data['nama_lengkap'] ?></td>
                        <td width="10%" class="text-center"><?= $data['jenis_kelamin'] ?></td>
                        <td width="12%" class="text-center"><?= tanggal_id($data['tanggal_daftar']) ?></td>
                        <td width="16%"><?= $data['kelas'] ?></td>
                        <td width="16%" class="text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                <!-- button form detail data -->
                                <a href="?halaman=detail&id=<?= $data['id_siswa'] ?>" class="btn btn-primary btn-sm rounded-pill px-3"> Detail </a>
                                <!-- button form ubah data -->
                                <a href="?halaman=ubah&id=<?= $data['id_siswa'] ?>" class="btn btn-success btn-sm rounded-pill px-3"> Ubah </a>
                                <!-- button modal hapus data -->
                                <button type="button" class="btn btn-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['id_siswa'] ?>"> Hapus </button>
                                <!-- Modal hapus data -->
                                <div class="modal fade" id="modalHapus<?= $data['id_siswa'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    <i class="fa-regular fa-trash-can me-2"></i> Hapus Data Siswa
                                                </h1>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="mb-2">Anda yakin ingin menghapus data siswa?</p>
                                                <!-- informasi data yang akan dihapus -->
                                                <p class="fw-bold mb-2"><?= $data['id_siswa'] ?> <span class="fw-normal">-</span> <?= $data['nama_lengkap'] ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                                                <!-- button proses hapus data -->
                                                <a href="proses_hapus.php?id=<?= $data['id_siswa'] ?>" class="btn btn-danger rounded-pill px-3">Ya, Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>