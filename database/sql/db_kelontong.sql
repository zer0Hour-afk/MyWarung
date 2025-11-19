-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2025 pada 10.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelontong`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barcode` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_jual` bigint(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_pemasok` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barcode`, `nama_barang`, `id_kategori`, `id_satuan`, `harga_beli`, `harga_jual`, `stok`, `id_pemasok`, `id_pengguna`) VALUES
(1, '899123456001', 'Indomie Goreng', 1, 1, 2500, 3000, 200, 1, 1),
(2, '899456789002', 'Aqua 600ml', 2, 3, 3000, 4000, 150, 2, 2),
(3, '899789123003', 'Sabun Lifebuoy', 4, 1, 3500, 5000, 100, 3, 2),
(4, '899456123004', 'Sikat Gigi Formula', 4, 1, 6000, 8000, 75, 3, 3),
(5, '899321654005', 'Beras 5Kg', 3, 5, 60000, 70000, 50, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `id_pembelian`, `id_barang`, `jumlah`, `harga_satuan`, `subtotal`) VALUES
(1, 1, 1, 100, 2500, 250000),
(2, 2, 2, 80, 3000, 240000),
(3, 3, 3, 60, 3500, 210000),
(4, 4, 4, 50, 6000, 300000),
(5, 5, 5, 30, 60000, 180000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_barang`, `jumlah`, `harga_satuan`, `subtotal`) VALUES
(1, 1, 1, 4, 3000, 12000),
(2, 2, 5, 1, 70000, 70000),
(3, 3, 3, 1, 5000, 5000),
(4, 4, 4, 1, 8000, 8000),
(5, 5, 2, 15, 4000, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Kebutuhan Rumah Tangga'),
(4, 'Perawatan Tubuh'),
(5, 'Elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(11) NOT NULL,
  `nama_pemasok` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kontak_person` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama_pemasok`, `alamat`, `telepon`, `email`, `kontak_person`) VALUES
(1, 'PT Indofood Sukses Makmur', 'Pelaihari', '0211234567', 'info@gmail.com', 'Jack Schrinder'),
(2, 'PT Aqua Danone', 'Martapura', '0217654321', 'sales@gmail.com', 'Baihaqqi'),
(3, 'PT Unilever Indonesia', 'Paringin', '0218889990', 'cs@gmail.co.id', 'Bambang Kadapatan'),
(4, 'CV Sejahtera Abadi', 'Banjarmasin', '0511321456', 'cvsejahtera@gmail.com', 'Yuuki Yuuna'),
(5, 'UD Maju Bersama', 'Banjarbaru', '0511738492', 'udmaju@gmail.com', 'Wahyu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `kode_faktur` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pemasok` int(11) DEFAULT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `kode_faktur`, `tanggal`, `id_pemasok`, `total_harga`, `id_pengguna`) VALUES
(1, 'V01', '2025-10-01', 1, 500000, 1),
(2, 'V02', '2025-10-02', 2, 450000, 2),
(3, 'V03', '2025-10-03', 3, 300000, 3),
(4, 'V04', '2025-10-04', 4, 800000, 2),
(5, 'V05', '2025-10-05', 5, 250000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `kata_sandi` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `peran` varchar(20) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `kata_sandi`, `nama_lengkap`, `peran`, `telepon`, `email`, `status_aktif`) VALUES
(1, 'admin', '12345', 'Budi Kelontong', 'admin', '081234567890', 'admin@gmail.com', 1),
(2, 'staff1', '12345', 'Joko Lengser', 'staff', '082134567891', 'joko@gmail.com', 1),
(3, 'staff2', '12345', 'Snake Wibawa', 'staff', '083134567892', 'ular@gmail.com', 1),
(4, 'kasir1', '12345', 'Elizabeth White', 'kasir', '084134567893', 'eli@gmail.com', 1),
(5, 'kasir2', '12345', 'Luna Bulan', 'kasir', '085134567894', 'bln@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `kode_faktur` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `jumlah_bayar` bigint(20) DEFAULT NULL,
  `kembalian` bigint(20) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode_faktur`, `tanggal`, `total_harga`, `jumlah_bayar`, `kembalian`, `id_pengguna`) VALUES
(1, 'P01', '2025-10-10', 12000, 20000, 8000, 4),
(2, 'P02', '2025-10-11', 70000, 100000, 30000, 5),
(3, 'P03', '2025-10-12', 5000, 10000, 5000, 4),
(4, 'P04', '2025-10-13', 8000, 10000, 2000, 5),
(5, 'P05', '2025-10-14', 60000, 70000, 10000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_stok`
--

CREATE TABLE `riwayat_stok` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jenis_transaksi` varchar(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_stok`
--

INSERT INTO `riwayat_stok` (`id`, `id_barang`, `jenis_transaksi`, `jumlah`, `tanggal`, `keterangan`, `id_pengguna`) VALUES
(1, 1, 'masuk', 100, '2025-11-01 09:43:59', 'Pembelian dari Indofood', 1),
(2, 2, 'masuk', 80, '2025-11-02 10:33:42', 'Pembelian dari Aqua', 2),
(3, 3, 'keluar', 5, '2025-11-12 14:24:42', 'Penjualan ke pelanggan', 4),
(4, 4, 'masuk', 50, '2025-11-04 11:41:00', 'Stok baru dari Unilever', 3),
(5, 5, 'keluar', 1, '2025-11-11 16:32:00', 'Penjualan ke pelanggan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Pcs', 'Satuan per item'),
(2, 'Dus', 'Berisi beberapa item'),
(3, 'Botol', 'Untuk minuman atau cairan'),
(4, 'Pack', 'Kemasan isi banyak'),
(5, 'Kg', 'Berat per kilogram');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_kategori` (`id_kategori`),
  ADD KEY `fk_barang_satuan` (`id_satuan`),
  ADD KEY `fk_barang_pemasok` (`id_pemasok`),
  ADD KEY `fk_barang_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_pembelian_pembelian` (`id_pembelian`),
  ADD KEY `fk_detail_pembelian_barang` (`id_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_penjualan_penjualan` (`id_penjualan`),
  ADD KEY `fk_detail_penjualan_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelian_pemasok` (`id_pemasok`),
  ADD KEY `fk_pembelian_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualan_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `riwayat_stok`
--
ALTER TABLE `riwayat_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_riwayat_stok_barang` (`id_barang`),
  ADD KEY `fk_riwayat_stok_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat_stok`
--
ALTER TABLE `riwayat_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `fk_barang_pemasok` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id`),
  ADD CONSTRAINT `fk_barang_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `fk_barang_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `fk_detail_pembelian_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_detail_pembelian_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `fk_detail_penjualan_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_detail_penjualan_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_pemasok` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id`),
  ADD CONSTRAINT `fk_pembelian_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_stok`
--
ALTER TABLE `riwayat_stok`
  ADD CONSTRAINT `fk_riwayat_stok_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_riwayat_stok_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
