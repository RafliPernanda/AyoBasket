-- Database: `ayobasket`
CREATE DATABASE IF NOT EXISTS `ayobasket` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ayobasket`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan` (dengan kolom baru)
--
CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lapangan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga_per_jam` decimal(10,2) NOT NULL,
  `jenis` enum('Indoor','Outdoor') NOT NULL DEFAULT 'Indoor',
  `gambar_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_lapangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dummy untuk tabel `lapangan` (dengan data baru)
--
INSERT INTO `lapangan` (`id_lapangan`, `nama_lapangan`, `alamat`, `harga_per_jam`, `jenis`, `gambar_url`) VALUES
(1, 'Gor Basket Cempaka', 'Jl. Cempaka Putih No. 12, Jakarta Pusat', 150000.00, 'Indoor', 'https://placehold.co/600x400/007BFF/white?text=Lapangan+A'),
(2, 'The Hoop Arena', 'Jl. Jendral Sudirman Kav. 5, Jakarta Selatan', 250000.00, 'Indoor', 'https://placehold.co/600x400/0056b3/white?text=Lapangan+B'),
(3, 'Galaxy Court', 'Jl. Galaxy Raya No. 1, Bekasi', 175000.00, 'Outdoor', 'https://placehold.co/600x400/6c757d/white?text=Lapangan+C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--
CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_lapangan` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `tanggal_main` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status_reservasi` enum('Aktif','Batal','Selesai') NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_reservasi`),
  KEY `id_lapangan` (`id_lapangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dummy untuk tabel `reservasi`
--
INSERT INTO `reservasi` (`id_reservasi`, `id_lapangan`, `nama_pemesan`, `no_telepon`, `tanggal_main`, `jam_mulai`, `jam_selesai`, `status_reservasi`) VALUES
(1, 1, 'Andi Wijaya', '081234567890', '2025-11-05', '18:00:00', '19:00:00', 'Aktif'),
(2, 2, 'Budi Santoso', '082345678901', '2025-11-06', '19:00:00', '21:00:00', 'Aktif'),
(3, 1, 'Citra Lestari', '083456789012', '2025-11-07', '17:00:00', '18:00:00', 'Selesai'),
(4, 2, 'Dewi Anggraini', '084567890123', '2025-11-08', '20:00:00', '21:00:00', 'Batal'),
(5, 1, 'Eko Prasetyo', '085678901234', '2025-11-09', '16:00:00', '18:00:00', 'Aktif'),
(6, 2, 'Fitriani', '086789012345', '2025-11-10', '19:00:00', '20:00:00', 'Aktif'),
(7, 1, 'Gilang Ramadhan', '087890123456', '2025-11-11', '18:00:00', '20:00:00', 'Aktif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
