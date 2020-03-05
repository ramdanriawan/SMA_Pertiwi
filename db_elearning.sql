-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2019 pada 08.33
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `alamat`, `no_telp`, `email`, `username`, `password`, `pass`) VALUES
(1, 'Muhammad Aslansyah Muis', '', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftarbuku`
--

CREATE TABLE `tb_daftarbuku` (
  `id_dafbuk` int(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL,
  `jml_buku` int(30) NOT NULL,
  `jml_pinjam` int(30) NOT NULL,
  `letak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file_materi`
--

CREATE TABLE `tb_file_materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `tgl_posting` date NOT NULL,
  `pembuat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_file_materi`
--

INSERT INTO `tb_file_materi` (`id_materi`, `judul`, `id_kelas`, `id_mapel`, `nama_file`, `tgl_posting`, `pembuat`) VALUES
(1, 'ul', 8, 7, '400-970-1-SM.pdf', '2019-03-09', '18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `id_tq` int(4) NOT NULL,
  `id_soal` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `wali_kelas` int(5) NOT NULL,
  `ketua_kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `ruang`, `wali_kelas`, `ketua_kelas`) VALUES
(7, 'X IPA 1', 'R-03', 0, 0),
(8, 'X IPA 2', 'R-04', 0, 0),
(9, 'X IPA 3', 'R-01', 0, 0),
(10, 'X IPA 4', 'R-02', 0, 0),
(11, 'X IPS 1', 'R-17', 0, 0),
(12, 'X IPS 2', 'R-05', 0, 0),
(13, 'X IPS 3', 'R-06', 0, 0),
(14, 'X IPS 4', 'R-07', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_ajar`
--

CREATE TABLE `tb_kelas_ajar` (
  `id` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas_ajar`
--

INSERT INTO `tb_kelas_ajar` (`id`, `id_kelas`, `id_pengajar`, `keterangan`) VALUES
(1, 8, 18, ''),
(2, 9, 18, ''),
(3, 10, 18, ''),
(4, 11, 18, ''),
(5, 12, 18, ''),
(6, 13, 18, ''),
(7, 14, 18, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `kode_mapel`, `mapel`) VALUES
(5, 'A1', 'Pendidikan Agama Islam'),
(6, 'A2', 'PKn'),
(7, 'A3', 'Bahasa Indonesia'),
(8, 'A4', 'Matematika'),
(9, 'A5', 'Sejarah Indonesia'),
(10, 'A6', 'Bahasa Inggris'),
(11, 'A7', 'Seni Budaya'),
(12, 'A8', 'Penjaskes'),
(14, 'A9', 'Biologi'),
(15, 'A10', 'Fisika'),
(16, 'A11', 'Kimia'),
(17, 'A12', 'Ekonomi'),
(18, 'A13', 'Sosiologi'),
(19, 'A14', 'Geografi'),
(20, 'A15', 'BK'),
(21, 'A16', 'TIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel_ajar`
--

CREATE TABLE `tb_mapel_ajar` (
  `id` int(11) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel_ajar`
--

INSERT INTO `tb_mapel_ajar` (`id`, `id_mapel`, `id_kelas`, `id_pengajar`, `keterangan`) VALUES
(1, 7, 8, 18, ''),
(2, 7, 9, 18, ''),
(3, 7, 10, 18, ''),
(4, 7, 11, 18, ''),
(5, 7, 12, 18, ''),
(6, 7, 13, 18, ''),
(7, 7, 14, 18, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_essay`
--

CREATE TABLE `tb_nilai_essay` (
  `id` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_pilgan`
--

CREATE TABLE `tb_nilai_pilgan` (
  `id` int(11) NOT NULL,
  `id_tq` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `benar` int(4) NOT NULL,
  `salah` int(4) NOT NULL,
  `tidak_dikerjakan` int(4) NOT NULL,
  `presentase` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_pilgan`
--

INSERT INTO `tb_nilai_pilgan` (`id`, `id_tq`, `id_siswa`, `benar`, `salah`, `tidak_dikerjakan`, `presentase`) VALUES
(1, 6, 39, 1, 0, 0, 100),
(2, 6, 37, 1, 0, 0, 100),
(3, 6, 36, 1, 0, 0, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `web` varchar(60) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `nip`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `email`, `alamat`, `jabatan`, `foto`, `web`, `username`, `password`, `pass`, `status`) VALUES
(16, '-', 'HM. Alamsyah, M.Pd.I', 'xxx', '2019-03-02', 'L', 'Islam', '-', '', '-', 'Guru Pendidikan Agama Islam', 'BBF.png', '', 'Alamsyah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(17, '-', 'Icha Septia Wulandari,S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Pkn', 'faceless-309882_640.png', '', 'Icha', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(18, '195912171988022001', 'Dra. Eflidawati', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Bahasa Indonesia', 'faceless-309882_640.png', '', 'Eflidawati', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(19, '196410051995122001', 'Dra. Aneta', '-', '2019-03-02', 'P', 'Kristen', '-', '', '-', 'Guru Bahasa Indonesia', 'faceless-309882_640.png', '', 'Aneta', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(20, '196510241988122002', 'Lismawati, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Matematika', 'faceless-309882_640.png', '', 'Lismawati', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(21, '196905251997021001', 'Drs. Saenun', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Matematika', 'faceless-309882_640.png', '', 'Saenun', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(22, '197704032007012006', 'Erista Nuria Shanti, S.Pt', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Matematika', 'faceless-309882_640.png', '', 'Erista ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(23, '198609032010012019', 'Kumala Dwi Septiani, S.Pd,M.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Sejarah Indones', 'faceless-309882_640.png', '', 'Kumala', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(24, '-', 'Nia Apriani, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Sejarah Indones', 'faceless-309882_640.png', '', 'Nia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(25, '-', 'Jurhana, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Sejarah Indones', 'faceless-309882_640.png', '', 'Jurhana', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(26, '196909271995122002', 'Rita Rusli, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Bahasa Inggris', 'faceless-309882_640.png', '', 'Rita ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(27, '197009052007011010', 'Mgs. Riza Fahlevi, S.pd', '-', '2019-03-02', 'L', 'Islam', '-', '', '-', 'Guru Bhs dan Sastra Inggris', 'BBF.png', '', 'Riza', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(28, '-', 'Dian Lestari, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Seni Budaya', 'faceless-309882_640.png', '', 'Dian', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(29, '198311032008042001', 'Reminovita, S.Pd, M.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Penjaskes', 'faceless-309882_640.png', '', 'Reminovita', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(30, '198507022010012012', 'Reni Julianti, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Biologi', 'faceless-309882_640.png', '', 'Reni ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(31, '197211011998021001', 'Yohafrinal,S.Pd, M.Pd', '-', '2019-03-02', 'L', 'Kristen', '-', '', '-', 'Guru Fisika', 'BBF.png', '', 'Yohafrinal', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(32, '198112082009022001', 'Yusrita, S.Si', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Fisika', 'faceless-309882_640.png', '', 'Yusrita', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(33, '199107232014032002', 'Iqlima Nabila, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Fisika', 'faceless-309882_640.png', '', 'Iqlima ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(34, '197212161999032003', 'Milawati, S.Pd', '-', '2019-03-06', 'P', 'Islam', '-', '', '-', 'Guru Kimia', 'faceless-309882_640.png', '', 'Milawati', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(35, '197011282007012004', 'Swit Hermita Irianti, S.Pd', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Ekonomi', 'faceless-309882_640.png', '', 'Hermita', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(36, '196408202000122001', 'Dra. Leni Nefrida', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Sosilogi', 'faceless-309882_640.png', '', 'Leni ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(37, '196310281999032003', 'Dra. Soryatini', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru Geografis', 'faceless-309882_640.png', '', 'Soryatini', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(38, '197907232014072003', 'Sriwiyanti, S.Kom', '-', '2019-03-02', 'P', 'Islam', '-', '', '-', 'Guru BK', 'faceless-309882_640.png', '', 'Sriwiyanti', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(39, '-', 'Ristina Sitompul, S.Th', '-', '2019-03-02', 'P', 'Kristen', '-', '', '-', 'Guru Pendidikan Agama Kristen', 'faceless-309882_640.png', '', 'Sriwiyanti', '202cb962ac59075b964b07152d234b70', '123', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `kode_pengunjung` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tahun_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id_pengunjung`, `kode_pengunjung`, `nama_lengkap`, `tempat_lahir`, `tahun_lahir`, `jenis_kelamin`, `no_telp`, `email`, `alamat`, `foto`, `username`, `password`, `pass`, `status`) VALUES
(1, '11', 'asd', 'asd', '2012-10-25', 'P', '980809809898', 'asd@mail.com', 'asd', '31620.jpg', 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `thn_masuk` int(5) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nama_ayah`, `nama_ibu`, `no_telp`, `email`, `alamat`, `id_kelas`, `thn_masuk`, `foto`, `username`, `password`, `pass`, `status`) VALUES
(1, '0038869125', 'Adib Fathurrahman NR', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Adib', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(2, '0031690054', 'Agnes  Putri Yolanda', '-', '2019-03-08', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Agnes  ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(3, '0032073647', 'Amanda Apriyola', '-', '2019-03-08', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Amanda ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(4, '0040310324', 'Ardian Arfianda', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, '', 'Ardian', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(5, '0032213970', 'Asnia Marshela', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Asnia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(6, '0031513713', 'Baginda Sinaga', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Baginda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(7, '0033078742', 'Clarissa Alodia', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Clarissa ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(8, '0022547321', 'Desy', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Desy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(9, '0032871139', 'dhea helna putri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'dhea ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(10, '0031819232', 'Dhea Putri Olivia', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Olivia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(11, '0030495006', 'Erin Dita Dea Octaviana', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Erin', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(12, '0032170323', 'Ersahila Ardhani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Ersahila', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(13, '0047863460', 'Febry Cita Sahputri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Febry', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(14, '0031016148', 'Fitri Agustina', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Fitri', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(15, '0031819169', 'Hasnaa Hemalia Adi Prahesti', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Hasnaa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(16, '0033257863', 'Hobas Vijai Samuel Pagaribuan', '-', '2019-03-01', 'L', 'Kristen', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Hobas', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(17, '0029905810', 'Indah Sri Wulan Sofyan', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Indah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(18, '003189100', 'Kezia.s', '-', '2019-03-30', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Kezia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(19, '0033837897', 'Meiditasya Eka Putri Tarigan', '-', '2019-03-01', 'L', 'Kristen', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Meiditasya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(20, '0031637307', 'Meyliya Anggraini Pratama', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Meyliya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(21, '0031819139', 'Mohammad Rizqy Febryan', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Rizqy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(22, '0037912197', 'Muhammad Anugrah Putra', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Anugrah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(23, '0031637367', 'Muhammad Divo Azzurio', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Divo', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(24, '0031819253', 'Muhammad Fitra Purya Azizi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Fitra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(25, '003387096', 'Nabila Selsilia Monica', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Nabila', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(26, '0031819234', 'Nova Fitriana', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Nova', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(27, '0031637322', 'Pandu Kurniawan Saidi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Pandu', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(28, '0031819250', 'Puja Lestari Sipayung', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Puja', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(29, '003067302', 'R. A. Nabila Putri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Putri', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(30, '0040293123', 'Raihan Ghani Perangin-angin', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Raihan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(31, '0034091472', 'Recha Lidzikrillah Elcorazon Chandra', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Recha', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(32, '0031819165', 'Sally Lerian Edward', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Sally', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(33, '0032352848', 'Sarah Kurnia Oktaviani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Sarah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(34, '0032170392', 'Sasi Eriyanti', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'faceless-309882_640.png', 'Sasi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(35, '0026176923', 'Tri Wicaksono', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '7', 2018, 'BBF.png', 'Wicaksono', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(36, '0039778938', 'Abel Tri Putra Ananda', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Abel', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(37, '0032814297', 'Addini Putri Gusrianda', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Addini', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(38, '0036363493', 'Aditya Eka Putra', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Aditya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(39, '0034865509', 'Alif Ardiansyah', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Alif', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(40, '0034297673', 'Amara Aulia Dara Desmira', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Amara', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(41, '0020850486', 'Butet', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Butet', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(42, '0032170320', 'Debora Enjelina Simarmata', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Debora', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(43, '0031759323', 'Dendy Puja Kusuma', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Dendy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(44, '0030896946', 'Dewi Fadhilatul Mukaromah', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Dewi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(45, '0024470555', 'Dinda Fatimah Sarah', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Dinda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(46, '0022297670', 'Dwiki Efendy', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Dwiki', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(47, '0025955914', 'Eka Oktaviani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Eka', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(48, '0031637333', 'Fathinah Nur\' Abidah', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Fathinah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(49, '0032073732', 'Lora Wain Natalia Putri Simanullang', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Lora', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(50, '0023965783', 'M. Padli Bahtiar', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Padli', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(51, '0031731087', 'M.gilang Gunawan', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'gilang', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(52, '0039114045', 'M.revanza', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'revanza', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(53, '0032490134', 'Marshanda Yovi Virliana', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Marshanda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(54, '0031637357', 'Muhammad Padhil', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Padhil', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(55, '0040119921', 'Muhammad Wahyu Mahesa', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Wahyu', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(56, '0032117406', 'Nabila Fasza Meishita', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Meishita', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(57, '0037304578', 'NASYA APRINA PRATAMA', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'NASYA', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(58, '0034356246', 'Natasya Amalia Kartika', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Natasya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(59, '0031819255', 'Novi Fitriani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Novi ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(60, '0032050280', 'Nurhalimah Tusi Hadiah', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Nurhalimah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(61, '0036945027', 'Priya Adinda', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Priya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(62, '0032115151', 'Rahmah Gustin Handayani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Rahmah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(63, '0025333692', 'Ramdazani', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Ramdazani', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(64, '0031893619', 'Resita Grace Nauly Br Silalahi', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Resita', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(65, '0025333686', 'Reza Muharni', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Reza', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(66, '0028985698', 'RIZKI AMANDA', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'RIZKI', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(67, '0023160078', 'SHEHAN REIHANSYAH', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'SHEHAN', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(68, '0020907819', 'Thesion Marta Sianipar', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Thesion', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(69, '0025450410', 'Wiwid Liansyah Binti Sahrin', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '8', 2018, 'faceless-309882_640.png', 'Wiwid', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(70, '0031819249', 'Zidan Ramadan A', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '8', 2018, 'BBF.png', 'Zidan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(71, '0034541751', 'Afiq Reyhan', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Afiq', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(72, '0040190388', 'Alda Amelia', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Alda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(73, '0032073718', 'Aldi Saputra', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Aldi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(74, '0032115174', 'Ananda Aldi Putra', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Ananda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(75, '0032170377', 'Angelica Defalma', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Angelica', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(76, '0033757825', 'Angelina Putri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Angelina', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(77, '0033813369', 'Argya Rifqy Rizqullah', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Argya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(78, '0033617322', 'Dimas Aji Nugroho', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Dimas', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(79, '0031479723', 'Eka Lestari Br. Perangin-angin', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Lestari', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(80, '0039144847', 'Enjang Purnami Putri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Enjang', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(81, '0031893595', 'Harya Yudha Permana', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Harya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(82, '0027630364', 'Ilham Bagus Kurniawan', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Ilham', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(83, '0040114083', 'Indro Wahyudi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Indro', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(84, '0025570025', 'Lilis Suryani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Lilis', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(85, '0032352957', 'MONICA PUTRI DWI UTAMA', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'MONICA', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(86, '0028286779', 'Muhamad Nurcholis Ramadhan', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Nurcholis', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(87, '0014280403', 'Muhammad Ali', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Ali', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(88, '0033680757', 'Najla Azizah Fairuz', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Azizah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(89, '0030538530', 'Nandria Daffa Khanifi L. Tobing', '-', '2019-03-01', 'L', 'Kristen', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Nandria', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(90, '0012462013', 'Niken Fahrani Salsabila', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Niken', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(91, '0031870217', 'Nur Adilah Nasution', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Nur', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(92, '0030931711', 'NUR AZLIYANA NINGSIH', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'AZLIYANA', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(93, '0033579432', 'Oktaviana Sinaga', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Oktaviana', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(94, '0036330670', 'Precillia Clarrisa Kaban', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Precillia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(95, '0031650995', 'Rafi Riyandi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Rafi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(96, '0031802187', 'Rere Putri Nespi', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Rere ', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(97, '0033477267', 'Ridho Arga Wardana', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Ridho', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(98, '0057518092', 'Riska Amelia Syaffitri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Riska', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(99, '0030776100', 'Rocky Justce Sibuea', '-', '2019-03-01', 'L', 'Kristen', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Rocky', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(100, '\'0031637256', 'Salfa Salsabila', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Salfa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(101, '0031759183', 'Salsa Dilla Recka Azzahra', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Salsa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(102, '0033494090', 'Sindi Haviska', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'Sindi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(103, '0020970066', 'Syahdam Mawardi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Syahdam', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(104, '0030112737', 'TYO FEBRYANTY SIMANUNGKALIT', '-', '2019-03-01', 'P', 'Kristen', '-', '-', '-', '', '-', '9', 2018, 'faceless-309882_640.png', 'TYO', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(105, '0031731082', 'Yusril Aminullah', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '9', 2018, 'BBF.png', 'Yusril', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(106, '0032073729', 'A.yogi Syahreza', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'yogi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(107, '0031818951', 'Adinda Choirunnisa', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Adinda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(108, '0031407916', 'Al Zifta Wiratama.W', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Zifta', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(109, '0032352855', 'Aurellia Jeconia Ramadhana', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Aurellia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(110, '0048492285', 'Dela Febriosa', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Dela', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(111, '0031637345', 'Erlangga Ar Raffi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Erlangga', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(112, '0025450397', 'ERWIN TAMBUNAN', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'ERWIN', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(113, '0031690066', 'Fadia Yani Oktafianti', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Fadia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(114, '0034308414', 'Fassela Gihoni Debora Br Silalahi', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Fassela', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(115, '0031513600', 'Fatresia Valentine Yesica Rumapea', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Fatresia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(116, '0041284063', 'Fazri Surya Riski', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Fazri', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(117, '0037850209', 'Hanifa Azura Nurhamsyah', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Hanifa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(118, '0040136290', 'Ikhsan Rasyid Al Avic', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Ikhsan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(119, '0030896966', 'Khomaria', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Khomaria', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(120, '0031637377', 'Khusnul Khotimah Ramadhani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Khusnul', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(121, '0031890996', 'M. Nico Wahyudi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Nico', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(122, '0039541664', 'Meike Putra Aditama', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Meike', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(123, '0039098892', 'Muhammad Irham', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Irham', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(124, '0032011674', 'Muhammad Rafi\' Arrazzaqu', '-', '2019-03-01', 'L', 'Kristen', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Rafi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(125, '0035180974', 'Mutiara Ramadani Efendi', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Mutiara', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(126, '0032292475', 'Priska Juliana Saputri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Priska', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(127, '0031637339', 'Putri Azzahra Zalsi', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Azzahra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(128, '0035602501', 'Rahel Flora Br Sitorus', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Rahel', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(129, '0030896959', 'Rahmat Rizki Ananda', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Rahmat', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(130, '0049529936', 'Reza Joantara', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Joantara', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(131, '0034113826', 'Rihan Muhammad Fikri', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Rihan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(132, '0031637247', 'Saputra Triansyah', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Saputra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(133, '0031759166', 'Sartika', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Sartika', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(134, '0032019206', 'Shafa Mardhotillah', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Shafa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(135, '0030771126', 'Sovi Van Grace Tampubolon', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Sovi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(136, '0030355938', 'Suci Putri Cahyani', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Suci', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(137, '0025273030', 'Syahrul Rinaldi Putra', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Syahrul', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(138, '0031819227', 'VANESA DYAH PUSPITASARI', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'VANESA', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(139, '0023972949', 'Yolanda Patricia Sitanggang', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Yolanda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(140, '0034366732', 'Yosafat Roni Agustian Siburian', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'BBF.png', 'Yosafat', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(141, '0038105829', 'Yosika Dian Saputri', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '10', 2018, 'faceless-309882_640.png', 'Yosika', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(142, '0020776527', 'Al Talarik Syah Ilmi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Talarik', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(143, '0040117749', 'Alfan Ridho', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Ridho', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(144, '0032214083', 'Amelia Pradisca', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Amelia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(145, '0035924808', 'Ananda Suci Rahayu', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Rahayu', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(146, '0028347784', 'Ari Oktarino', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Ari', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(147, '0040293086', 'Davinna Tiara Meljo', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Davinna', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(148, '0031819205', 'Dedy Rizky Wijaya', '-', '2019-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Dedy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(149, '0038787787', 'Difal Alfarazi Pasya', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Difal', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(150, '0040074357', 'Fehrona Dwi Putri', '-', '2019-03-09', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Fehrona', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(151, '0036186290 ', 'Fitra Arga Rajasa', '-', '2019-03-28', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Rajasa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(152, '0032073701', 'Ihram Septianda Arya', '-', '2019-03-20', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Arya', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(153, '0042209082', 'Insyra Nung Fatikha', '-', '2019-03-13', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Insyra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(154, '0026021617', 'Jean Andrian Maulana', '-', '2019-03-13', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Jean', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(155, '0040136295 ', 'Jovan Meidi Permana Nasution', '-', '2019-03-20', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Jovan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(156, '0040190386', 'Karan Haikal Pramudia', '-', '2019-03-15', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Karan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(157, '0000531065', 'Kessy Erika', '-', '2019-03-13', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Kessy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(158, '0035842614', 'Luzza Ainul Khayya', '-', '2019-03-13', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Luzza', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(159, '0031453909', 'Mhd. Reza Fahlevi. M', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Mhd', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(160, '0031171145', 'Muhammad Raihan Ramadhan', '-', '2019-03-30', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Muhammad', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(161, '0032115177', 'Muhammad Randu Passha', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Passha', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(162, '0029167179', 'Muhammad Septiawan Hadi', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Hadi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(163, '0032275994', 'Nabila April Yanti', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Yanti', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(164, '0031759192', 'Putri Amalia Ramadhani', '-', '2019-03-08', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Ramadhani', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(165, '0031759178', 'Rahayu', '-', '2019-03-05', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Ra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(166, '0031479570', 'Rendi Apriliansyah', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Rendi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(167, '0031891010 ', 'Revelly Anjani', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Revelly', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(168, '0031479731', 'Rico Dafin Sitinjak', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Sitinjak', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(169, '0030896948', 'Salsabilla Aprilia', '-', '2019-02-26', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Aprilia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(170, '0031637276', 'Sri Wulandari', '-', '2019-03-08', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, '', 'Wulandari', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(171, '0027969173 ', 'Tri Wahyu', '-', '2019-03-02', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Wahyu', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(172, '0032730137', 'Widhy Shahara Anysa', '-', '2019-03-14', 'P', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'faceless-309882_640.png', 'Widhy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(173, '0031891044', 'Windra Putra Utama', '-', '2019-03-06', 'L', 'Islam', '-', '-', '-', '', '-', '11', 2018, 'BBF.png', 'Windra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(174, '0032170328', 'Aldi Surya Pratama', '-', '2019-03-13', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Pratama', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(175, '0039031962', 'Aldin Muhardin', '-', '2019-03-02', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Aldin', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(176, '0039104001 ', 'Andhika  Triady Kusuma', '-', '2002-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Kusuma', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(177, '0045739437', 'Anisa Putri Rizqi', '-', '2011-03-01', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, '', 'Rizqi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(178, '0031819151', 'ANTASYA TRI RATU LAUHANI', '-', '2019-03-04', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'ANTASYA', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(179, '0012728673 ', 'Ardiansyah', '-', '2019-03-27', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Ardiansyah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(180, '0031513744', 'Bryan Jovi Nistell Roy Hutagalung', '-', '2019-03-12', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Hutagalung', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(181, '0030470967 ', 'CHELINE NISMETA ROTUA MENDROFA', '-', '2019-03-08', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'CHELINE', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(182, '0023741976', 'Dana Prayoga', '-', '2019-03-01', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Prayoga', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(183, '0032292464', 'Debi Hariyan Syah', '-', '2019-03-07', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Syah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(184, '0017557324', 'Devi Fatmawati Sihotang', '-', '2019-03-11', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Sihotang', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(185, '0030896945 ', 'Dila Apriyanti', '-', '2019-03-13', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Apriyanti', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(186, '0032734023', 'Eksa Putri Yande', '-', '2019-03-12', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Eksa', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(187, '0021571722', 'Erinda Eka Savitri', '-', '2019-03-05', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Erinda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(188, '0021571722 ', 'Erinda Eka Savitri', '-', '2019-03-08', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Savitri', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(189, '0036708834 ', 'Fatur Haikal Ramadan', '-', '2019-03-06', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Ramadan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(190, '0031637382', 'Gabriel Tamba', '-', '2019-02-28', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Gabriel', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(191, '0048800769', 'Imtiyaz Ragbah Fidini', '-', '2019-03-04', 'P', 'Kristen', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Fidini', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(192, '0045739442 ', 'Indah Permata Sabilah', '-', '2019-03-12', 'P', 'Kristen', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Sabilah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(193, '0031513741', 'Lid Wina Sagita Silalahi', '-', '2019-03-12', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Lid', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(194, '0031819191', 'Muhammad Bagas Rizaldy', '-', '2019-03-19', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Rizaldy', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(195, '0049389550', 'Muhammad Reiyandy Putra', '-', '2019-03-21', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Putra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(196, '0036683152 ', 'Muhammad Riyan Fahlefi', '-', '2019-03-05', 'L', 'Katholik', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Fahlefi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(197, '0028427569', 'Muhammad Rohmadan Detri Handani', '-', '2019-03-12', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Handani', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(198, '0021975451', 'Najla Putri Ifajria', '-', '2019-03-18', 'P', 'Kristen', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Najla', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(199, '0031793620', 'Noel Obed Nego Sitompul', '-', '2019-03-12', 'L', 'Kristen', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Noel', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(200, '0033579433', 'Noparian', '-', '2019-03-03', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Noparian', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(201, '0033599294', 'Pedro Prancisco Aturito S', '-', '2019-03-20', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Pedro', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(202, '0036441550', 'Rama Aprianto Panjaitan', '-', '2019-03-20', 'L', 'Kristen', '-', '-', '-', '', '-', '12', 2018, '', 'Rama Aprianto Panjaitan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(203, '0022143870', 'Reflindo Fajar Gulinra', '-', '2019-03-13', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Gulinra', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(204, '0040132457', 'Robby Zacky', '-', '2019-03-14', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Zacky', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(205, '0037956055', 'Sanju Yosua Sitinjak', '-', '2019-03-12', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'BBF.png', 'Sitinjak', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(206, '0032352791', 'Silvi Lani Triana', '-', '2019-03-06', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Triana', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(207, '0089774303', 'SUHANI', '-', '2019-03-12', 'P', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'SUHANI', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(208, '0030896956 ', 'Tasya Rahayu Ningsih', '-', '2019-03-11', 'P', 'Hindu', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Ningsih', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(209, '0020697235', 'WIDIA AFNI ZAI', '-', '2019-03-13', 'P', 'Katholik', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'ZAI', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(210, '0037604860', 'Windy Mardhatilah', '-', '2019-03-18', 'L', 'Islam', '-', '-', '-', '', '-', '12', 2018, 'faceless-309882_640.png', 'Mardhatilah', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(211, '0027459255', 'Adhitia', '-', '2019-03-04', 'L', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Adhitia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(212, '0031876905', 'Andri Winata', '-', '2019-03-04', 'L', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Andri', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(213, '0035924043', 'Anetha Variha', '-', '2019-03-05', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Anetha', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(214, '0023599579 ', 'Bunga Dewi Putri', '-', '2019-03-19', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Bunga', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(215, '0038434607 ', 'Dito Adrian Syafutra', '-', '2019-03-20', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Dito', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(216, '0038434607 ', 'Dito Adrian Syafutra', '-', '2019-03-20', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Dito', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(217, '0048162167', 'Dwi Adela', '-', '2019-03-04', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Adela', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(218, '0034521509', 'Elizabeth Aniza Angelia', '-', '2019-03-05', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Angelia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(219, '0038155702', 'Fadila Nur Salma', '-', '2019-03-04', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Fadila', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(220, '0031650952', 'Farhan Rasyid', '-', '2019-03-10', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Rasyid', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(221, '0040119530 ', 'Gian Fauzi', '-', '2019-03-19', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Fauzi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(222, '0023599561', 'Gilang Wahyu Setyawan', '-', '2019-03-05', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Setyawan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(223, '0031479748', 'Gilbert Nissi Firmaniyo Silitonga', '-', '2019-02-27', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Gilbert Nissi Firmaniyo Silitonga', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(224, '0030896985', 'Indri Annadia', '-', '2019-03-07', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Annadia', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(225, '0032214006', 'Lianda Vita Bastari', '-', '2019-03-20', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Lianda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(226, '0039154192', 'M. Erlangga Putrasyah', '-', '2019-03-05', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'M.', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(227, '0032073689', 'Mian Erica Juliana Siagian', '-', '2019-03-20', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Siagian', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(228, '0050290377', 'Muhamad Gilang', '-', '2019-03-04', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Gilang', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(229, '0035147799', 'Muhammad Badruzzaman', '-', '2019-03-12', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Badruzzaman', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(230, '0040132455 ', 'Muhammad Rafi', '-', '2019-03-04', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Rafi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(231, '0032257241', 'Muhammad Sidiq Yulasa Ahkaf', '-', '2019-03-05', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Ahkaf', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(232, '0024036184', 'Muhammad Wildan Habibie', '-', '2019-02-26', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Habibie', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(233, '0032352728 ', 'Nabila Meisyafalah Putri', '-', '2019-03-04', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, '', 'Putri', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(234, '0027491615', 'Nabila Riski Oktania', '-', '2019-03-11', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Oktania', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(235, '0038731259', 'Narsa Auliana', '-', '2019-03-03', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, '', 'Auliana', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(236, '0014837784', 'Nofin Irwan Doni', '-', '2019-03-12', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Doni', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(237, '0031731129', 'Nur Halis Fatmawati', '-', '2019-03-13', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Fatmawati', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(238, '0032192981', 'Rahmadon Zamzamil', '-', '2019-03-11', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Zamzamil', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(239, '0032011563 ', 'Rahmat Zulirfan', '-', '2019-03-11', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Zulirfan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(240, '0032170324 ', 'Rika Wahyuni', '-', '2019-03-10', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', ' Wahyuni', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(241, '0025356373', 'Rini', '-', '2019-03-13', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Rini', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(242, '0035504781', 'Riski Al Farabi', '-', '2019-03-04', 'L', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'BBF.png', 'Farabi', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(243, '0024086224', 'Risma Mega Silpana', '-', '2019-03-11', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Silpana', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(244, '0039819925', 'Rosalinda', '-', '2019-03-13', 'P', 'Islam', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Rosalinda', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(245, '0031973277', 'Shalsabilla Arma Khairani', '-', '2019-03-10', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Khairani', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(246, '0031237127', 'Siskha Amelia Putri', '-', '2019-03-05', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Siskha', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(247, '0031893600 ', 'Syifa Athaya Rifda', '-', '2019-03-03', 'P', 'Kristen', '-', '-', '-', '', '-', '13', 2018, 'faceless-309882_640.png', 'Rifda', '202cb962ac59075b964b07152d234b70', '123', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_essay`
--

CREATE TABLE `tb_soal_essay` (
  `id_essay` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_pilgan`
--

CREATE TABLE `tb_soal_pilgan` (
  `id_pilgan` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `pil_e` text NOT NULL,
  `kunci` varchar(2) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_pilgan`
--

INSERT INTO `tb_soal_pilgan` (`id_pilgan`, `id_tq`, `pertanyaan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `kunci`, `tgl_buat`) VALUES
(1, 2, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(2, 3, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(3, 4, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(4, 5, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(5, 6, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(6, 7, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(7, 1, 'Dibawah ini merupakan struktur teks editorial\r\n1.	Judul\r\n2.	 Orientasi\r\n3.	Penyampaian pendapat\r\n4.	Penegasan\r\n5.	Pengenalan isu\r\n6.	Pengungkapan peristiwa', '', '1,2,3,5', '1,3,6,5,', '2,3,4,6.', '3.5,2,6,', '1,5,3,4', 'E', '2019-03-09'),
(8, 1, 'Berita yang mengundang perbedaan pendapat di masyarakat .Perbedaan pendapat itu dapat menimbulkan polimik atau perdebatan .Jika muncul di surat kabar polimik ini biasanya ditandai dengan munculnya opini disebut berita....', '', 'Kontroversial', 'Fenomenal', 'Heboh', 'aktual', 'global', 'A', '2019-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik_quiz`
--

CREATE TABLE `tb_topik_quiz` (
  `id_tq` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pembuat` varchar(10) NOT NULL,
  `waktu_soal` int(8) NOT NULL,
  `info` varchar(250) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik_quiz`
--

INSERT INTO `tb_topik_quiz` (`id_tq`, `judul`, `id_kelas`, `id_mapel`, `tgl_buat`, `pembuat`, `waktu_soal`, `info`, `status`) VALUES
(1, 'Ulangan Harian 1', 9, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif'),
(2, 'Ulangan Harian 1', 12, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif'),
(3, 'Ulangan Harian 1', 10, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif'),
(4, 'Ulangan Harian 1', 11, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif'),
(5, 'Ulangan Harian 1', 13, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif'),
(6, 'Ulangan Harian 1', 8, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif'),
(7, 'Ulangan Harian 1', 14, 7, '2019-03-09', '18', 5400, 'Kerjakan dengan Teliti, Jangan sampai ada soal yang tidak terjawab', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_daftarbuku`
--
ALTER TABLE `tb_daftarbuku`
  ADD PRIMARY KEY (`id_dafbuk`);

--
-- Indeks untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  ADD PRIMARY KEY (`id_essay`);

--
-- Indeks untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  ADD PRIMARY KEY (`id_pilgan`);

--
-- Indeks untuk tabel `tb_topik_quiz`
--
ALTER TABLE `tb_topik_quiz`
  ADD PRIMARY KEY (`id_tq`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_daftarbuku`
--
ALTER TABLE `tb_daftarbuku`
  MODIFY `id_dafbuk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  MODIFY `id_essay` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  MODIFY `id_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_topik_quiz`
--
ALTER TABLE `tb_topik_quiz`
  MODIFY `id_tq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
