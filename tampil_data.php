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
        <table id="myTable" class="table table-bordered table-striped table-hover" style="width:100%">
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
                                        or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
                // ambil data hasil query
                while ($data = $query->fetch_assoc()) { ?>
                    <tr>
                        <td width="30" class="text-center"><?php echo $no++; ?></td>
                        <td width="50" class="text-center">
                            <img src="images/<?php echo $data['foto_profil']; ?>" class="border border-2 img-fluid rounded-3" alt="Foto Profil" width="70" height="70">
                        </td>
                        <td width="70" class="text-center"><?php echo $data['id_siswa']; ?></td>
                        <td width="200"><?php echo $data['nama_lengkap']; ?></td>
                        <td width="80" class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
                        <td width="80" class="text-center"><?php echo tanggal_indo($data['tanggal_daftar']); ?></td>
                        <td width="150"><?php echo $data['kelas']; ?></td>
                        <td width="140" class="text-center">
                            <div>
                                <!-- button form detail data -->
                                <a href="?halaman=detail&id=<?php echo $data['id_siswa']; ?>" class="btn btn-primary btn-sm rounded-pill px-3 me-1 mb-1"> Detail </a>
                                <!-- button form ubah data -->
                                <a href="?halaman=ubah&id=<?php echo $data['id_siswa']; ?>" class="btn btn-success btn-sm rounded-pill px-3 me-1 mb-1"> Ubah </a>
                                <!-- button modal hapus data -->
                                <button type="button" class="btn btn-danger btn-sm rounded-pill px-3 mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id_siswa']; ?>"> Hapus </button>
                                <!-- Modal hapus data -->
                                <div class="modal fade" id="modalHapus<?php echo $data['id_siswa']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                                                <p class="fw-bold mb-2"><?php echo $data['id_siswa']; ?> <span class="fw-normal">-</span> <?php echo $data['nama_lengkap']; ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                                                <!-- button proses hapus data -->
                                                <a href="proses_hapus.php?id=<?php echo $data['id_siswa']; ?>" class="btn btn-danger rounded-pill px-3">Ya, Hapus</a>
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

<script type="text/javascript">
    $(document).ready(function() {
        // dapatkan parameter URL
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString);
        // ambil data dari URL
        let pesan = urlParams.get('pesan');
        let jenis = urlParams.get('jenis');

        // menampilkan pesan sesuai dengan proses yang dijalankan
        // jika pesan = 1
        if (pesan === '1') {
            // tampilkan pesan sukses simpan data
            $.notify({
                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                message: 'Data siswa berhasil disimpan.'
            }, {
                type: 'success',
		        allow_dismiss: false,
            });
        }
        // jika pesan = 2
        else if (pesan === '2') {
            // tampilkan pesan sukses ubah data
            $.notify({
                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                message: 'Data siswa berhasil diubah.'
            }, {
                type: 'success',
		        allow_dismiss: false,
            });
        }
        // jika pesan = 3
        else if (pesan === '3') {
            // tampilkan pesan sukses hapus data
            $.notify({
                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                message: 'Data siswa berhasil dihapus.'
            }, {
                type: 'success',
		        allow_dismiss: false,
            });
        }
    });
</script>