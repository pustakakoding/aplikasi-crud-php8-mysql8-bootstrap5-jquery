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
                <li class="breadcrumb-item" aria-current="page">Ubah</li>
            </ol>
        </nav>
    </div>
</div>

<?php
// mengecek data GET "id_siswa"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol ubah
    $id_siswa = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_siswa" berdasarkan "id_siswa"
    $query = $mysqli->query("SELECT * FROM tbl_siswa WHERE id_siswa='$id_siswa'")
                             or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil data hasil query
    $data = $query->fetch_assoc();
}
?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <!-- judul form -->
    <div class="alert alert-primary rounded-4 mb-5" role="alert">
        <i class="fa-solid fa-pen-to-square me-2"></i> Ubah Data Siswa
    </div>
    <!-- form ubah data -->
    <form action="proses_ubah.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-xl-6">
                <div class="row g-0">
                    <div class="mb-3 col-xl-6 pe-xl-3">
                        <label class="form-label">ID Siswa <span class="text-danger">*</span></label>
                        <input type="text" name="id_siswa" class="form-control" value="<?php echo $data['id_siswa']; ?>" readonly>
                    </div>

                    <div class="mb-3 col-xl-6 pe-xl-3">
                        <label class="form-label">Tanggal Daftar <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_daftar" class="form-control datepicker" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($data['tanggal_daftar'])); ?>" required>
                        <div class="invalid-feedback">Tanggal daftar tidak boleh kosong.</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Kelas <span class="text-danger">*</span></label>
                    <select name="kelas" class="form-select" autocomplete="off" required>
                        <option value="<?php echo $data['kelas']; ?>"><?php echo $data['kelas']; ?></option>
                        <option disabled value="">-- Pilih --</option>
                        <option value="Data Analysis">Data Analysis</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="Game Development">Game Development</option>
                        <option value="Mobile Development">Mobile Development</option>
                        <option value="Web Design">Web Design</option>
                        <option value="Web Development">Web Development</option>
                    </select>
                    <div class="invalid-feedback">Kelas tidak boleh kosong.</div>
                </div>
            </div>
        </div>

        <hr class="mb-4-2">

        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" value="<?php echo $data['nama_lengkap']; ?>" required>
                    <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                </div>

                <div class="mb-4 pe-xl-3">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <br>
                    <?php
                    if ($data['jenis_kelamin'] == 'Laki-laki') { ?>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="laki_laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki" checked required>
                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan" required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                            <div class="invalid-feedback invalid-feedback-inline">Pilih salah satu jenis kelamin.</div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="laki_laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki" required>
                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan" checked required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                            <div class="invalid-feedback invalid-feedback-inline">Pilih salah satu jenis kelamin.</div>
                        </div>
                    <?php } ?>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" rows="2" class="form-control" autocomplete="off" required><?php echo $data['alamat']; ?></textarea>
                    <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                    <div class="invalid-feedback">Email tidak boleh kosong.</div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="whatsapp" class="form-control" maxlength="13" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['whatsapp']; ?>" required>
                    <div class="invalid-feedback">WhatsApp tidak boleh kosong.</div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" accept=".jpg, .jpeg, .png" id="foto" name="foto" class="form-control" autocomplete="off">

                    <div class="mt-4">
                        <img id="preview_foto" src="images/<?php echo $data['foto_profil']; ?>" class="border border-2 img-fluid rounded-4 shadow-sm" alt="Foto Profil" width="240" height="240">
                    </div>

                    <div class="form-text mt-4">
                        Keterangan : <br>
                        - Tipe file yang bisa diunggah adalah *.jpg atau *.png. <br>
                        - Ukuran file yang bisa diunggah maksimal 1 Mb.
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button simpan data -->
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary rounded-pill py-2 px-4">
                <!-- button kembali ke halaman tampil data -->
                <a href="?halaman=data" class="btn btn-secondary rounded-pill py-2 px-4">Batal</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // validasi file dan preview foto sebelum diunggah
        $('#foto').change(function() {
            // mengambil value dari file
            var filePath = $('#foto').val();
            var fileSize = $('#foto')[0].files[0].size;
            // tentukan extension file yang diperbolehkan
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            // Jika tipe file yang diunggah tidak sesuai dengan "allowedExtensions"
            if (!allowedExtensions.exec(filePath)) {
                // tampilkan pesan peringatan tipe file tidak sesuai
                $.notify({
                    title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Peringatan!</h5>',
                    message: 'Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png.'
                }, {
                    type: 'warning',
		            allow_dismiss: false,
                });
                // reset input file
                $('#foto').val('');
                // tampilkan file default
                $('#preview_foto').attr('src', 'images/img-default.png');

                return false;
            }
            // jika ukuran file yang diunggah lebih dari 1 Mb
            else if (fileSize > 1000000) {
                // tampilkan pesan peringatan ukuran file tidak sesuai
                $.notify({
                    title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Peringatan!</h5>',
                    message: 'Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.'
                }, {
                    type: 'warning',
		            allow_dismiss: false,
                });
                // reset input file
                $('#foto').val('');
                // tampilkan file default
                $('#preview_foto').attr('src', 'images/img-default.png');

                return false;
            }
            // jika file yang diunggah sudah sesuai, tampilkan preview file
            else {
                // mengambil value dari file
                var fileInput = $('#foto')[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // preview file
                        $('#preview_foto').attr('src', e.target.result);
                    };
                };
                // membaca file sebagai data URL
                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    });
</script>