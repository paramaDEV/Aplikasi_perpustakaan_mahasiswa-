-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Apr 2021 pada 13.07
-- Versi server: 5.6.49-log
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nomer_induk` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `ttl` date NOT NULL,
  `password` varchar(350) NOT NULL,
  `foto` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nomer_induk`, `email`, `nama`, `jenis_kelamin`, `ttl`, `password`, `foto`) VALUES
(1, '18900003', 'aldebaran@gmail.com', 'Aldebaran Alfahri', 'Laki-laki', '2000-04-11', '$2y$10$ZNQ.aVfQUqdqfXy7rolwQ.K84UVFpMmdTwmoHi4dPBuXxl3UDtN2q', '452edc3e6f42df9c25738b6182fdeb26.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_hilang`
--

CREATE TABLE `buku_hilang` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_hilang` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku_hilang`
--

INSERT INTO `buku_hilang` (`id`, `id_buku`, `tanggal_hilang`, `denda`) VALUES
(1, 6, '2021-04-05', 80000);

--
-- Trigger `buku_hilang`
--
DELIMITER $$
CREATE TRIGGER `buku_hilang` AFTER INSERT ON `buku_hilang` FOR EACH ROW BEGIN
UPDATE data_buku SET jumlah=jumlah-1
WHERE id=new.id_buku ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id`, `kode_buku`, `judul`, `id_tema`, `penulis`, `jumlah_halaman`, `penerbit`, `jumlah`, `thumbnail`, `lokasi`) VALUES
(1, '190348', 'Pemrograman PHP', 1, 'Cahyo Crisdian', 450, 'Elex Media Computindo ', 2, '3640e35392f62d235251050fda8ce2db.jpg', 'B7'),
(2, '140318', 'Aljabar Linear & Aplikasinya Edisi 5', 3, 'Steven J. Leon', 700, 'Panca Benua', 4, '8618d21d4b9081b39f8b5208db67a220.jpg', 'B3'),
(3, '190360', 'Belajar Pemrograman Android Untuk Semua Kebutuhan', 1, 'Ir. Yuniar Supardi', 658, 'Elex Media Computindo ', 2, '50238fae64f805b089cd93e94b6686da.jpg', 'B7'),
(4, '140389', 'Pengantar Metode Numerik', 3, 'Dr. Elis Retna Wulanm S.Si, M.T.', 600, 'Gudang Imu', 4, '8b320dc065a85e55a660c954e68122d9.jpg', 'B3'),
(5, '190377', 'Python Data Science Handbook', 1, 'Jake Vanderplas', 920, 'O\'Reilly', 2, 'bd00e80caa4d362dca65af37035c07ae.jpg', 'B7'),
(6, '728091', 'Biologi Sel', 2, 'B. Sumitro', 800, 'UB Press', 10, '7fd02a3b7204af4364a5786c8da83b85.jpg', 'C6'),
(7, '150437', 'Fisiologi Hewan Edisi 2', 2, 'Maman Rumanta & Soesy Asiah', 748, 'Penerbit Universitas Terbuka', 4, '4f5f3efe7a947ff777a082589346ab8a.jpg', 'C6'),
(8, '120488', 'Biografi Agung Rasulullah', 4, 'Rusydi Ramli', 1637, 'Islamic Press', 2, 'ee0c3e5dafbc4c6470be80044c6c0f70.jpg', 'A3'),
(9, '120481', 'Hukum Ekonomi Syariah', 4, 'Prof. Dr. Drs. H. Abdul Manan, S.H., S.IP, M.Hum', 692, 'Sinar Buana', 3, 'ca9fba3328f3501ce8bf21c84480b3a1.jpg', 'A3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nm_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `nm_fakultas`) VALUES
(1, 'Sains & Teknologi'),
(2, 'Ekonomi'),
(3, 'Humaniora');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tema`
--

CREATE TABLE `jenis_tema` (
  `id` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_tema`
--

INSERT INTO `jenis_tema` (`id`, `tema`) VALUES
(1, 'Teknologi dan Informatika'),
(2, 'Biologi'),
(3, 'Matematika'),
(4, 'Agama Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nm_jurusan` varchar(100) NOT NULL,
  `id_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nm_jurusan`, `id_fakultas`) VALUES
(1, 'Teknik Informatika', 1),
(2, 'Matematika', 1),
(3, 'Manajemen', 2),
(4, 'Akuntansi', 2),
(5, 'Sastra Inggris', 3),
(6, 'Pendidikan Bahasa Arab', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `batas_pinjam` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_buku`, `id_user`, `tanggal_pinjam`, `batas_pinjam`) VALUES
(1, 2, 1, '2021-04-01', '2021-04-15'),
(2, 2, 4, '2021-04-02', '2021-04-16'),
(3, 1, 1, '2021-04-15', '2021-04-30');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `hitung_stok_after_delete` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
	 UPDATE data_buku SET jumlah=jumlah+1
	 WHERE id=OLD.id_buku;
     UPDATE user SET kuota_pinjam=kuota_pinja+1
	 WHERE id=OLD.id_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hitung_stok_after_insert` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
	 UPDATE data_buku SET jumlah=jumlah-1
	 WHERE id=NEW.id_buku;
     UPDATE user SET kuota_pinjam=kuota_pinjam-1
	 WHERE id=NEW.id_user;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `batas_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `ttl` date NOT NULL,
  `id_fakultas` int(11) NOT NULL DEFAULT '1',
  `id_jurusan` int(11) NOT NULL DEFAULT '1',
  `kuota_pinjam` int(11) NOT NULL DEFAULT '5',
  `password` varchar(300) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `jenis_kelamin`, `ttl`, `id_fakultas`, `id_jurusan`, `kuota_pinjam`, `password`, `foto`) VALUES
(1, 'Fany Parama Admaja', '18650063', 'Laki-laki', '2000-06-07', 1, 1, 3, '$2y$10$ZNQ.aVfQUqdqfXy7rolwQ.K84UVFpMmdTwmoHi4dPBuXxl3UDtN2q', 'd0a6e2cb5f05cb451921b961e686a9ac.jpg'),
(2, 'Bayu Afrizal', '17630031', 'Laki-laki', '1999-04-08', 2, 3, 5, '$2y$10$riTK4o5Ekp7RvbBYGgDVZOMiLqJo6eaRLbzTu.E89q26aHbDQcywa', ''),
(3, 'Amanda Kartini Putri', '18630072', 'Perempuan', '2000-05-07', 2, 4, 5, '$2y$10$riTK4o5Ekp7RvbBYGgDVZOMiLqJo6eaRLbzTu.E89q26aHbDQcywa', ''),
(4, 'Adelia Pratiwi', '18120122', 'Perempuan', '2001-01-05', 3, 5, 4, '$2y$10$riTK4o5Ekp7RvbBYGgDVZOMiLqJo6eaRLbzTu.E89q26aHbDQcywa', ''),
(5, 'Khoirul Fazza', '18130002', 'Laki-laki', '1999-09-27', 3, 6, 5, '$2y$10$riTK4o5Ekp7RvbBYGgDVZOMiLqJo6eaRLbzTu.E89q26aHbDQcywa', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `buku_hilang`
--
ALTER TABLE `buku_hilang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_tema`
--
ALTER TABLE `jenis_tema`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku_hilang`
--
ALTER TABLE `buku_hilang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_tema`
--
ALTER TABLE `jenis_tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku_hilang`
--
ALTER TABLE `buku_hilang`
  ADD CONSTRAINT `buku_hilang_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `data_buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD CONSTRAINT `data_buku_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `jenis_tema` (`id`);

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `data_buku` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `data_buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
