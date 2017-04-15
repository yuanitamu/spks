-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2015 pada 03.48
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `pelelangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_barang`, `nama_barang`, `id_user`, `deskripsi_barang`, `foto`) VALUES
(30, 'Wayang Pandawa', 127, 'Wayang ini terbuat dari kulit sapi asli dan berkualitas. Buatan pemahat wayang yang terkenal dan pernah digunakan dalam pagelaran-pagelaran wayang Ki Hadi Sugito. Wayang adalah warisan leluhur yang harus kita jaga serta kita banggakan.', 'Wayang-Pandawa.jpg'),
(31, 'Wayang Golek', 128, 'Wayang golek adalah salah satu kesenian khas Indonesia. Dari berbagai macam wayang yang ada, wayang golek berpenampilan lebih mirip dengan manusia ketimbang wayang kulit. Ini adalah koleksi wayang golek saya yang sekarang mingkin sudah berjumlah ratusan buah.', 'Wayang-Golek.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelelangan`
--

CREATE TABLE IF NOT EXISTS `pelelangan` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `batas_pelelangan` date NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `pelelangan`
--

INSERT INTO `pelelangan` (`id_barang`, `nama_barang`, `id_user`, `deskripsi_barang`, `harga_barang`, `batas_pelelangan`, `foto`) VALUES
(13, 'Wayang Arjuna Klitik', 127, 'Arjuna dikenal sebagai tokoh pewayangan yang sangat tampan dan pemberani. Wayang ini dibuat khusus untuk Anda para pecinta wayang yang haus akan detail yang tanpa celah. Dibuat atas permintaan Ki Mantep yang telah melanglang buana di dunia pewayangan. Kini saatnya Anda memiliki wayang yang pernah menjadi salah satu properti dalam pendalangan Ki Mantep.', 1000000, '2015-01-20', 'Wayang-Arjuna-Klitik.JPG'),
(14, 'Mangkuk Kangxi', 128, 'Mangkuk ini berasal dari negeri tirai bambu China. Selain warnanya yang indah, mangkuk ini juga memiliki nilai sejarah yang tinggi. Mangkuk ini berasal dari dinasti Tang peninggalan Kaisar China pada waktu itu. Untuk dapat memilikinya Anda dapat mengikuti pelelangan ini yang akan ditutup dalam beberapa hari. semoga Anda tidak menyesal untuk mendapatkan mangkuk bersejarah ini.', 4999000, '2015-01-18', 'Mangkuk-Kangxi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_seniman` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_seniman`, `id_pembeli`, `id_barang`, `nama_barang`, `harga_barang`, `bukti_pembayaran`, `foto`, `alamat`, `no_tlp`, `type`) VALUES
(128, 125, 10, 'Pisau Kertas', 15000, '10', 'Pisau-Kertas.jpg', 'Jl. Sumber Sari Gang 3B No.201', '085750009100', 'jual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `harga_barang` int(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_barang`, `nama_barang`, `id_user`, `deskripsi_barang`, `harga_barang`, `foto`) VALUES
(9, 'Lukisan Wajah', 127, 'Lukisan ini adalah barang seni yang banyak diminati oleh kalangan menengah ke atas. Dengan memiliki memajang lukisan ini di dalam rumah Anda terutama dirumah tamu, Anda dapat membuat tamu-tamu Anda terkesan atas maha karya ini. Dengan filosofi yang sangat dalam lukisan ini adalah karya seni yang bernilai tinggi. Ciptaan saya sendiri.', 10000000, 'Lukisan-Wajah.jpg'),
(10, 'Pisau Kertas', 128, 'Mungkin dipikiran Anda pisau adalah benda tajam yang tidak seharusnya dijual pada situs ini. Namun ini bukanlah sembarang pisau seperti pisau-pisau tajam pada umumnya. Ini adalah pisau kertas yang tidak tajam dan tidak mebahayakan. Pisau kertas ini digunakan untuk memotong kertas dengan mudah. Selain nilai seninya yang tinggi pisau ini juga murah meriah. Silahkan bagi yang berminat mohon klik tombol beli :)', 15000, 'Pisau-Kertas.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `id_user` int(25) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `no_tlp`, `email`, `level`, `foto`, `id_user`) VALUES
('kikypramesti', '180622d0e88d6f922a941972773783ac', 'Rizky Amalia Pramesti', 'Jl. Sumber Sari Gang 3B No.201', 'P', '1995-06-01', '085750009100', 'kikypramesti@rocketmail.com', 'Pembeli', 'kikypramesti1.jpg', 125),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Rizky Amalia', 'Jl. Sumber Sari Gang 3B No.176', 'P', '1995-06-01', '2147483647', 'kikypramesti@yahoo.com', 'Admin', 'admin.jpg', 126),
('abdwafi', 'a1d0feb7a5fb0560af224f42067cde97', 'Abdul Wafi', 'Jl. Veteran Dalam, Malang', 'L', '1993-07-17', '2147483647', 'abdwafi432@gmail.com', 'Seniman', 'abdwafi.jpg', 127),
('faisal.muhammad', 'f4668288fdbf9773dd9779d412942905', 'Muhammad Faisal', 'Jl. A. Yani Utara, Malang', 'L', '1993-12-01', '2147483647', 'muhammad.faisal@gmail.com', 'Seniman', 'faisalmuhammad.jpg', 128);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE IF NOT EXISTS `verifikasi` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `id_user` int(25) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
