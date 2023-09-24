-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Sep 2023 pada 09.22
-- Versi server: 8.0.30
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud_jquery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` varchar(8) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` varchar(13) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `tanggal_daftar`, `kelas`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `email`, `whatsapp`, `foto_profil`) VALUES
('ID-00001', '2023-10-01', 'Web Development', 'Indra Styawantoro', 'Laki-laki', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'indra.styawantoro@gmail.com', '081377783334', 'b68f6957cd151ebf5d0536c1219ad480bba62f76.jpg'),
('ID-00002', '2023-10-03', 'Web Design', 'Lindsay Spice', 'Perempuan', 'Kedaton, Kota Bandar Lampung, Lampung', 'lindsay.spice@gmail.com', '0895881122441', '80f0ad336908887789c5783b7bbc0f0b674bfb3e.png'),
('ID-00003', '2023-10-03', 'Digital Marketing', 'Lynda Marquez', 'Perempuan', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'lynda.marquez@gmail.com', '0898557766889', '5abfb8e7dffa25505769fc0a0c2694bb993a88a6.png'),
('ID-00004', '2023-10-07', 'Web Design', 'James Doe', 'Laki-laki', 'Rajabasa, Kota Bandar Lampung, Lampung', 'james.doe@gmail.com', '082380905643', 'd9eff928368bc6f3a19a576d956112e5263b03af.png'),
('ID-00005', '2023-10-11', 'Web Development', 'Mark Parker', 'Laki-laki', 'Kedaton, Kota Bandar Lampung, Lampung', 'mark.parker@gmail.com', '082123459876', '9982a509335389a26f449b13503a40ee113f6c01.png'),
('ID-00006', '2023-10-13', 'Web Development', 'Frank Gibson', 'Laki-laki', 'Kemiling, Kota Bandar Lampung, Lampung', 'frank.gibson@gmail.com', '081379793535', '5b79901c5540cfb02852c8afa43e615ac4ded502.png'),
('ID-00007', '2023-10-15', 'Digital Marketing', 'Ashlyn Jordan', 'Perempuan', 'Langkapura, Kota Bandar Lampung, Lampung', 'ashlyn.jordan@gmail.com', '081381195335', 'b0c724ebc0d23545a7a3ed3d1bc73b0c03b35b11.jpg'),
('ID-00008', '2023-10-15', 'Web Development', 'Patric Green', 'Laki-laki', 'Way Halim, Kota Bandar Lampung, Lampung', 'patric.green@gmail.com', '081366782234', '8e4f473ab3f32f733f6f0a209c4589bb4741644c.png'),
('ID-00009', '2023-10-17', 'Mobile Development', 'Jeffery Riley', 'Laki-laki', 'Labuhan Ratu, Kota Bandar Lampung, Lampung', 'jeffery.riley@gmail.com', '081376891324', '159fdca3f3ecb7656fd53aa1853cb312111cd999.png'),
('ID-00010', '2023-10-17', 'Data Analysis', 'Alice Doe', 'Perempuan', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'alice.doe@gmail.com', '082377883344', '32687ef858bf5501547ce2c5cddc58171c5d19f7.png'),
('ID-00011', '2023-10-21', 'Data Analysis', 'Jonathan Smart', 'Laki-laki', 'Kedaton, Kota Bandar Lampung, Lampung', 'jonathan.smart@gmail.com', '082373378448', 'c36b7a452f95949c70a89c6f96d3d01d63888503.png'),
('ID-00012', '2023-10-23', 'Mobile Development', 'Mike Brown', 'Laki-laki', 'Rajabasa, Kota Bandar Lampung, Lampung', 'mike.brown@gmail.com', '082188669988', 'b810f80c4c8d18d69e804397fe6a04454416549f.png'),
('ID-00013', '2023-10-23', 'Web Design', 'Pauline Smith', 'Perempuan', 'Teluk Betung, Kota Bandar Lampung, Lampung', 'pauline.smith@gmail.com', '085669919779', 'b48a35ae0623c3563d09e9c4ae1a415c3f57f019.png'),
('ID-00014', '2023-10-23', 'Game Development', 'Ronnie Blake', 'Laki-laki', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'ronnie.blake@gmail.com', '082173775544', '1f97467fb2c3c6018c922511f2326fd5049ea570.png'),
('ID-00015', '2023-10-25', 'Data Analysis', 'Marsha Singer', 'Perempuan', 'Teluk Betung, Kota Bandar Lampung, Lampung', 'marsha.singer@gmail.com', '085758857778', '9782db55b500d00de6e881757b31d1f8849dea8f.png'),
('ID-00016', '2023-10-27', 'Web Development', 'Manver Jacobson', 'Laki-laki', 'Rajabasa, Kota Bandar Lampung, Lampung', 'manver.jacobson@gmail.com', '082189897676', '4bcd8b97677dbe75133b77432914972c3ceb2be4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
