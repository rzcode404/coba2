-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Inang: sql209.epizy.com
-- Waktu pembuatan: 19 Jul 2017 pada 17.29
-- Versi Server: 5.6.35-81.0
-- Versi PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `epiz_20368302_ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `FakultasID` varchar(100) NOT NULL,
  `KodeFakultas` varchar(100) NOT NULL,
  `NamaFakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`FakultasID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `histori` (
  `HistoriID` int(11) NOT NULL AUTO_INCREMENT,
  `KelompokID` varchar(100) NOT NULL,
  `Keterangan` text NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Foto2` varchar(100) NOT NULL,
  `Foto3` varchar(100) NOT NULL,
  PRIMARY KEY (`HistoriID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `histori`
--

INSERT INTO `histori` (`HistoriID`, `KelompokID`, `Keterangan`, `Foto`, `Foto2`, `Foto3`) VALUES
(5, 'K01', 'kegiatan belajar mengajar', '-Chrysanthemum.jpg', '-', '-Penguins.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(15) NOT NULL AUTO_INCREMENT,
  `KelompokID` varchar(100) NOT NULL,
  `nama_penguji 1` varchar(100) NOT NULL,
  `nama_penguji2` varchar(100) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tgl_ujian` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kontak1` varchar(13) NOT NULL,
  `kontak2` varchar(13) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `KelompokID`, `nama_penguji 1`, `nama_penguji2`, `hari`, `tgl_ujian`, `jam`, `kontak1`, `kontak2`) VALUES
(1, 'K01', 'root', 'Nurul Huda', 'Senin', '2017-07-13', '12:00:00', '089098890987', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE IF NOT EXISTS `kelompok` (
  `KelompokID` varchar(100) NOT NULL,
  `NamaKelompok` varchar(100) NOT NULL,
  `PembimbingID` varchar(20) NOT NULL,
  `TempatPPL` varchar(50) NOT NULL,
  `TahunAkademik` varchar(10) NOT NULL,
  PRIMARY KEY (`KelompokID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`KelompokID`, `NamaKelompok`, `PembimbingID`, `TempatPPL`, `TahunAkademik`) VALUES
('K01', 'Kelompok1', '110108101601', 'MA Darussalam Sengon', '2016'),
('K02', 'Kelompok2', '11101001012', 'MAN 5 Jombang', '2016'),
('K03', 'Kelompok3', '11110212217', 'MA Perguruan Mu''alimat Cukir', '2016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `LaporanID` varchar(50) NOT NULL,
  `KelompokID` varchar(100) NOT NULL,
  `File` varchar(100) NOT NULL,
  `Komentar` text NOT NULL,
  PRIMARY KEY (`LaporanID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`LaporanID`, `KelompokID`, `File`, `Komentar`) VALUES
('LAP-170713053145', 'K01', '2017-07-13-gdahsg.docx', 'hsfkjdhfgjkhdfg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `HakAkses` enum('uptppl','mahasiswa','pembimbing') NOT NULL,
  `Status` enum('Aktif','Tidak','','') NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
('5213018', 'c8a26d0e59c3cd8ff382e8b1e7542c55', 'mahasiswa', 'Aktif'),
('1113016', 'a172e80c816162f2854f0b79be290730', 'mahasiswa', 'Aktif'),
('11010115292', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11010901014', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11010614271', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11020113236', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('01150702017', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11141111200', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11011212235', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11010810158', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11190710156', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11110212217', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('11010611190', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif'),
('1106031442641', '827ccb0eea8a706c4c34a16891f84e7b', 'pembimbing', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` char(50) NOT NULL,
  `KelompokID` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `ProdiID` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `No.Telp` varchar(13) NOT NULL,
  `JK` enum('L','P','','') NOT NULL,
  `Foto` varchar(100) NOT NULL,
  PRIMARY KEY (`NIM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
('5213018', '', 'MAKIN NUGROHO', 'd9302598-569a-44fa-54a2-8bcf1109ccd3', '', '', 'L', '2017-07-18-User_icon-cp.png'),
('1113016', '', 'IIS NUR AZIZAH', '', '', '', 'L', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
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
  `Status` enum('Menunggu','Diterima','Ditolak','') NOT NULL,
  PRIMARY KEY (`NilaiID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `pembimbing` (
  `PembimbingID` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Kontak` varchar(15) NOT NULL,
  PRIMARY KEY (`PembimbingID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`PembimbingID`, `Nama`, `Alamat`, `Kontak`) VALUES
('110108101601', 'Dhikrul Hakim, M.pdi', 'Jombang', '082141156392'),
('11101001012', 'Drs. Mukhlisin. M.Pd.i', 'Jombang ', '081330966884'),
('11010115292', 'Ahmad Dzulfikar, M.Pd', 'Jombang', '082327958997'),
('11010901014', 'Drs. H. M. Yahya Ashari, M.Pd', 'Jombang', '08123514064'),
('11010614271', 'Saifudin, M.Pd', 'Jombang', '082335648755'),
('11020113236', 'Hj. Ana Rahmawati, S.Si, M.Pd', 'Jombang', '085730320003'),
('01150702017', 'Dr. H. Ali Muchsin, M.pd.I', 'Jombang', '081332451930'),
('11141111200', 'Adi Yussuf, S.S, M.Pd', 'Jomabng', '085745162670'),
('11011212235', 'Nailul Fauziyah, S.Hum, M.Pd', 'Jombang', '085731158809'),
('11010810158', 'Andik Wahyu M, M.Pd.I', 'Jombang', '09139699763'),
('11110212217', 'Miftahul Ilmi S.P, M.Pd', 'Jombang', '085707049022'),
('11010611190', 'Nur Ulwiyah, M.pd.I', 'jombang', '081230218135'),
('1106031442641', 'Imam Mutaqin, M.Pd.I', 'Jombang', '085731910821');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `ProdiID` varchar(100) NOT NULL,
  `FakultasID` varchar(100) NOT NULL,
  `KodeProdi` varchar(100) NOT NULL,
  `NamaProdi` varchar(100) NOT NULL,
  PRIMARY KEY (`ProdiID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `uptppl` (
  `UptpplID` int(15) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`UptpplID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
