-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2017 pada 00.34
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `FakultasID` varchar(100) NOT NULL,
  `KodeFakultas` varchar(100) NOT NULL,
  `NamaFakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`FakultasID`, `KodeFakultas`, `NamaFakultas`) VALUES
('c41a8d22-0c40-a805-a3ba-6568a93a897e', '2', 'FBS'),
('d9aa4df7-f9cb-e0bf-dbd2-693c92c50e7b', '5', 'MIPA'),
('f74df57f-911f-ae69-8464-876045889bc4', '1', 'FAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori`
--

CREATE TABLE `histori` (
  `HistoriID` int(11) NOT NULL,
  `KelompokID` varchar(100) NOT NULL,
  `Keterangan` text NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Foto2` varchar(100) NOT NULL,
  `Foto3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `histori`
--

INSERT INTO `histori` (`HistoriID`, `KelompokID`, `Keterangan`, `Foto`, `Foto2`, `Foto3`) VALUES
(5, 'K01', 'kegiatan belajar mengajar', '-Chrysanthemum.jpg', '-', '-Penguins.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(15) NOT NULL,
  `KelompokID` varchar(100) NOT NULL,
  `nama_penguji 1` varchar(100) NOT NULL,
  `nama_penguji2` varchar(100) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tgl_ujian` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kontak1` varchar(13) NOT NULL,
  `kontak2` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `KelompokID`, `nama_penguji 1`, `nama_penguji2`, `hari`, `tgl_ujian`, `jam`, `kontak1`, `kontak2`) VALUES
(1, 'K01', 'root', 'Nurul Huda', 'Senin', '2017-07-13', '12:00:00', '089098890987', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `KelompokID` varchar(100) NOT NULL,
  `NamaKelompok` varchar(100) NOT NULL,
  `PembimbingID` varchar(20) NOT NULL,
  `TempatPPL` varchar(50) NOT NULL,
  `TahunAkademik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`KelompokID`, `NamaKelompok`, `PembimbingID`, `TempatPPL`, `TahunAkademik`) VALUES
('K01', 'Kelompok1', '110108101601', 'MAN 1 Jombang', '2016'),
('K02', 'Kelompok2', '12345678', 'SMA Wahid Hasyim Tebuireng', '2016'),
('K03', 'Kelompok3', '12345678', 'peterongan', '2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `LaporanID` varchar(50) NOT NULL,
  `KelompokID` varchar(100) NOT NULL,
  `File` varchar(100) NOT NULL,
  `Komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`LaporanID`, `KelompokID`, `File`, `Komentar`) VALUES
('LAP-170713053145', 'K01', '2017-07-13-gdahsg.docx', 'hsfkjdhfgjkhdfg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `HakAkses` enum('uptppl','mahasiswa','pembimbing') NOT NULL,
  `Status` enum('Aktif','Tidak','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`Username`, `Password`, `HakAkses`, `Status`) VALUES
('11010810160', '827ccb0eea8a706c4c34a16891f84e7b', 'uptppl', 'Aktif'),
('110108101601', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11101001012', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('1113001', '7aa595561ee01748b0e340994625247c', 'mahasiswa', 'Aktif'),
('1313027', '1f32aa4c9a1d2ea010adcf2348166a04', 'mahasiswa', 'Aktif'),
('2313001', 'c4f47d5ddfd1bde90d2a332d2fc214b4', 'mahasiswa', 'Aktif'),
('2313013', '7493d48ce7ada897ed05fd0eec825aea', 'mahasiswa', 'Aktif'),
('2313038', 'b7a09519685f2cef4ad1271c431dbbac', 'mahasiswa', 'Aktif'),
('5213001', '1f32aa4c9a1d2ea010adcf2348166a04', 'mahasiswa', 'Aktif'),
('5213002', '678f7e8a2fef5ea535cf9b35d5f7db37', 'mahasiswa', 'Aktif'),
('5213018', 'c8a26d0e59c3cd8ff382e8b1e7542c55', 'mahasiswa', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(50) NOT NULL,
  `KelompokID` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `ProdiID` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `No.Telp` varchar(13) NOT NULL,
  `JK` enum('L','P','','') NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `KelompokID`, `Nama`, `ProdiID`, `Alamat`, `No.Telp`, `JK`, `Foto`) VALUES
('1113001', '', 'ABDIR ROHIS MUSYAFAK', '99c7b123-d27b-93de-4f31-f5cb9db5ad80', 'Jombang', '088888888888', 'L', '2017-07-18-User_icon-cp.png'),
('1313027', 'K01', 'M ADAM ABDILLAH', 'b381e661-5b18-4e05-1e97-0b0e6e6507a1', 'Sidoarjo', '085645305661', 'L', '2017-07-18-User_icon-cp.png'),
('2313001', '', 'SYLVIA ALMAHBUBAH HAMIM', '26c7f5e9-d38b-d7ce-39cb-046c91fe55be', '', '', 'L', '2017-07-18-User_icon-cp.png'),
('2313013', '', 'DWI PRASETYO', '26c7f5e9-d38b-d7ce-39cb-046c91fe55be', 'Pasuruan', '08585858585', 'L', '2017-07-18-User_icon-cp.png'),
('2313038', '', 'LULUK JANNAH', '26c7f5e9-d38b-d7ce-39cb-046c91fe55be', '', '', 'L', '2017-07-18-User_icon-cp.png'),
('5213001', '', 'ACHMAD CHOTIBUL UMAM', 'd9302598-569a-44fa-54a2-8bcf1109ccd3', '', '', 'L', '2017-07-18-User_icon-cp.png'),
('5213002', '', 'LAILATUL AZIZAH', 'd9302598-569a-44fa-54a2-8bcf1109ccd3', '', '', 'L', '2017-07-18-User_icon-cp.png'),
('5213018', '', 'MAKIN NUGROHO', 'd9302598-569a-44fa-54a2-8bcf1109ccd3', '', '', 'L', '2017-07-18-User_icon-cp.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `NilaiID` varchar(50) NOT NULL,
  `NIM` char(50) NOT NULL,
  `Pancasila/Pend_kewarganegaraan` varchar(50) NOT NULL,
  `IlmuPendidikan` varchar(50) NOT NULL,
  `ProfilTenagaKerja/ProfesiKeguruan` varchar(50) NOT NULL,
  `MetodologiPenelitian/MetodologiPend` varchar(50) NOT NULL,
  `BelajarPembelajaran` varchar(50) NOT NULL,
  `PerencanaanPengajaranMTK` varchar(50) NOT NULL,
  `PenelitianHasilBelajar` varchar(50) NOT NULL,
  `ProfesiKependidikan` varchar(50) NOT NULL,
  `MTKSekolah1` varchar(50) NOT NULL,
  `MTKSekolah2` varchar(50) NOT NULL,
  `PPL1` varchar(50) NOT NULL,
  `IntroductionToEducation` varchar(50) NOT NULL,
  `EducationalProfession` varchar(50) NOT NULL,
  `ResearchSeminar` varchar(50) NOT NULL,
  `PPL1/Microteaching` varchar(50) NOT NULL,
  `KHS1` varchar(100) NOT NULL,
  `KHS2` varchar(100) NOT NULL,
  `Status` enum('Menunggu','Diterima','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`NilaiID`, `NIM`, `Pancasila/Pend_kewarganegaraan`, `IlmuPendidikan`, `ProfilTenagaKerja/ProfesiKeguruan`, `MetodologiPenelitian/MetodologiPend`, `BelajarPembelajaran`, `PerencanaanPengajaranMTK`, `PenelitianHasilBelajar`, `ProfesiKependidikan`, `MTKSekolah1`, `MTKSekolah2`, `PPL1`, `IntroductionToEducation`, `EducationalProfession`, `ResearchSeminar`, `PPL1/Microteaching`, `KHS1`, `KHS2`, `Status`) VALUES
('N-170709045402', '2313013', 'C+', '', '', '', '', '', '', '', '', '', 'B', 'C-', 'B', 'B', 'B', '2017-07-09-110600-093-d-133.jpg', '2017-07-09-110600-2538412_piknometre_315292.jpg', 'Menunggu'),
('N-170709095037', '4113106', '', '', '', '', 'A', 'A-', 'A', 'B+', 'A', 'B+', 'B', '', '', '', '', '2017-07-09-100352-IMG20170124101444.jpg', '2017-07-09-100352-IMG_20170611_215430.jpg', 'Diterima'),
('N-170710080808', '231309', 'A', 'A', 'A', 'A', '', '', '', '', '', '', 'A', '', '', '', '', '2017-07-10-081018-2538412_piknometre_315292.jpg', '2017-07-10-081018-250_250_150_150_JCS-B_LED1.jpg', 'Menunggu'),
('N-170718102450', '1113001', 'B', 'B', 'B+', 'A', '', '', '', '', '', '', 'B+', '', '', '', '', '2017-07-18-102719-documents-158461_1280.png', '2017-07-18-102719-documents-158461_1280.png', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `PembimbingID` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Kontak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`PembimbingID`, `Nama`, `Alamat`, `Kontak`) VALUES
('110108101601', 'Dhikrul Hakim, M.pdi', 'Jombang Bergoyang', '082141156392'),
('11101001012', 'Drs. Mukhlisin. M.Pd.i', 'Jombang ', '0888888888');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `ProdiID` varchar(100) NOT NULL,
  `FakultasID` varchar(100) NOT NULL,
  `KodeProdi` varchar(100) NOT NULL,
  `NamaProdi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`ProdiID`, `FakultasID`, `KodeProdi`, `NamaProdi`) VALUES
('26c7f5e9-d38b-d7ce-39cb-046c91fe55be', 'c41a8d22-0c40-a805-a3ba-6568a93a897e', '3', 'Pend. Bahasa Inggris'),
('99c7b123-d27b-93de-4f31-f5cb9db5ad80', 'f74df57f-911f-ae69-8464-876045889bc4', '1', 'Pend. Agama Islam'),
('b381e661-5b18-4e05-1e97-0b0e6e6507a1', 'f74df57f-911f-ae69-8464-876045889bc4', '3', 'PGMI'),
('d9302598-569a-44fa-54a2-8bcf1109ccd3', 'd9aa4df7-f9cb-e0bf-dbd2-693c92c50e7b', '2', 'Pend. Matematika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uptppl`
--

CREATE TABLE `uptppl` (
  `UptpplID` int(15) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`FakultasID`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`HistoriID`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`KelompokID`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`LaporanID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`NilaiID`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`PembimbingID`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`ProdiID`);

--
-- Indexes for table `uptppl`
--
ALTER TABLE `uptppl`
  ADD PRIMARY KEY (`UptpplID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `HistoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
