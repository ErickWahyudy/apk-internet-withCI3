#
# TABLE STRUCTURE FOR: tb_bulan
#

DROP TABLE IF EXISTS `tb_bulan`;

CREATE TABLE `tb_bulan` (
  `id_bulan` varchar(2) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('01', 'Januari');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('02', 'Februari');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('03', 'Maret');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('04', 'April');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('05', 'Mei');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('06', 'Juni');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('07', 'Juli');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('08', 'Agustus');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('09', 'September');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('10', 'Oktober');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('11', 'November');
INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES ('12', 'Desember');


#
# TABLE STRUCTURE FOR: tb_email
#

DROP TABLE IF EXISTS `tb_email`;

CREATE TABLE `tb_email` (
  `id_email` varchar(50) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `email_pengirim` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_email` (`id_email`, `nama_pengirim`, `email_pengirim`, `subject`, `isi_pesan`, `tanda_tangan`) VALUES ('E001', 'KASSANDRA WIFI', 'wifi@kassandra.my.id', 'Pergantian program web aplikasi server', '<p>Pelanggan yth dikarenakan ada pergantian program web aplikasi server maka akan ada sedikit noifikasi email yang muncul terkait perubahan password. Karena password yang lama belum terenkripsi jadi masih kemungkinan bisa dibobol maka dengan adanya&nbsp;pergantian program web aplikasi server password akun akan diupdate oleh admin sesuai password yang lama guna untuk menjalankan fungsi enkripsi data sehingga data anda akan terlindungi dengan aman.. Terima kasih</p>\r\n', 'wifi@kassandra.my.id');


#
# TABLE STRUCTURE FOR: tb_feedback
#

DROP TABLE IF EXISTS `tb_feedback`;

CREATE TABLE `tb_feedback` (
  `id_feedback` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `no_hp` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nilai` varchar(6) CHARACTER SET latin1 NOT NULL,
  `feedback` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_feedback` (`id_feedback`, `nama`, `no_hp`, `nilai`, `feedback`, `tanggal`) VALUES ('F002qdbyTw', 'Rini setyaningsih', '62895399274933', '8', 'Pelayanan saat trobel yang memuaskan', '2022-12-25');
INSERT INTO `tb_feedback` (`id_feedback`, `nama`, `no_hp`, `nilai`, `feedback`, `tanggal`) VALUES ('F003ndeyb', 'erik', '1281y831', '8', 'okeey', '2023-03-13');
INSERT INTO `tb_feedback` (`id_feedback`, `nama`, `no_hp`, `nilai`, `feedback`, `tanggal`) VALUES ('F004Ww4wpS', 'Trianto N.A', '6285730799367', '10', 'bagus', '2023-03-23');


#
# TABLE STRUCTURE FOR: tb_informasi
#

DROP TABLE IF EXISTS `tb_informasi`;

CREATE TABLE `tb_informasi` (
  `id_informasi` varchar(100) NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_informasi` (`id_informasi`, `informasi`, `berkas`) VALUES ('I001www2id', 'Cara pembayatran kassandra wifi ada banyak bisa datang kerumah, bisa lewat platfrprm digital seperti shoopepay linkAja Antar bank OvO atau lainya', 'Linkpembayaran.txt');
INSERT INTO `tb_informasi` (`id_informasi`, `informasi`, `berkas`) VALUES ('I002djwwnD', 'internet 24 jam non stop gann loss pokok e', '');
INSERT INTO `tb_informasi` (`id_informasi`, `informasi`, `berkas`) VALUES ('I003TNVeLY', 'aplikasi ini masih dalam pengembangan mohon dukungannya ya', 'LAPORAN_TUGAS_AKHIR_SEKOLAH_Erik1.pdf');


#
# TABLE STRUCTURE FOR: tb_maps
#

DROP TABLE IF EXISTS `tb_maps`;

CREATE TABLE `tb_maps` (
  `id_maps` varchar(100) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  PRIMARY KEY (`id_maps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('0KJxezdrnbrVjUM', '', '');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('1234567qwerty', '-7.953078605019701', '111.42963210080528');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('123456qwerty', '-7.952854799591119', '111.42972921474947');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('12345qwerty', '-7.953517192431525', '111.42987241629686');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('1234qwerty', '-7.952807950568403', '111.43063356674857');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('123qwerty', '-7.952753233582656', '111.43059253692627');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('b9SYxU32aoI4a7I', '', '');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('edef4454356', '-7.953192462102856', '111.43310739700549');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('qwr325Ef2', '-7.952648193916055', '111.42969307499389');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('UmHZnwkeQKphNJz', '', '');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('W4b2su7BqbiUnZx', '', '');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('yggOC9RiDoDcbbJ', '-7.952134545450553', '111.4224120885586');
INSERT INTO `tb_maps` (`id_maps`, `latitude`, `longitude`) VALUES ('ZVtIzDgB5ORxS7L', '', '');


#
# TABLE STRUCTURE FOR: tb_paket
#

DROP TABLE IF EXISTS `tb_paket`;

CREATE TABLE `tb_paket` (
  `id_paket` varchar(6) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `tarif` int(22) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P001', '1 Mb', 50000);
INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P002', '1.8 Mb', 80000);
INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P003', '2 Mb', 100000);
INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P003++', '2.5 Mb', 140000);
INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P004', '3 Mb', 150000);
INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P005', '4 Mb', 200000);
INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES ('P006', '10 Mb', 300000);


#
# TABLE STRUCTURE FOR: tb_pelanggan
#

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `terdaftar_mulai` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'PLG',
  `id_paket` varchar(6) NOT NULL,
  `status_plg` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_maps` varchar(100) NOT NULL,
  `id_token` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_kamar` (`id_paket`),
  CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C001nwfwu', 'Trianto N.A', 'Jl. Agus salim jalen balong ponorogo', '6285730799367', '2019-10-10', 'ululroisya@gmail.com', '202cb962ac59075b964b07152d234b70', 'PLG', 'P003++', 'Aktif', '123qwerty', '', '<p>No HP baru <a href=\"https://wa.me/087758999875\">087758999875</a></p>\r\n');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C002fAuee', 'Mada Al Fatih', 'Etan Serut, Jalen Balong Ponorogo', '886984059823', '2019-12-10', 'mada@rtrw.net', '202cb962ac59075b964b07152d234b70', 'PLG', 'P002', 'Aktif', '1234qwerty', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C003nsdjs', 'Mas Nanang R', 'Jalen Balong Ponorogo', '6281555435593', '2020-01-10', 'erickwahyudy5@gmail.com', '717e08e5c3428a4887d1f6af695187b1', 'PLG', 'P001', 'Aktif', '12345qwerty', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C004laoo2', 'Mas Hadi Susanto', 'Jalen Balong Ponorogo', '6288230517455', '2020-02-15', 'erikwahyudy@gmail.com', 'b4df7b874a081f29bf28cdef473e9113', 'PLG', 'P001', 'Aktif', '123456qwerty', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C005vnwoi', 'Mbak Nurjannah', 'Jalen Balong Ponorogo', '6282301545816', '2020-02-15', 'snurjanah5816@gmail.com', '59a25e358114fd63c53ea86dfdace142', 'PLG', 'P001', 'Aktif', '1234567qwerty', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C006pqkdf', 'Pak Pairin', 'Etan Serut, Jalen Balong Ponorogo', '6289510608125', '2020-04-02', 'pairin@rtrw.net', '3106', 'PLG', 'P001', 'Tidak Aktif', 'fed3rfg', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C007qdmIr', 'Pemdes Jalen', 'Jl. Gajah Mada Ds. Jalen Kec. Balong Kab. Ponorogo', '6285156575371', '2021-12-25', 'landu.paranggi57@gmail.com', '8461', 'PLG', 'P006', 'Aktif', 'qwr325Ef2', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C008ALpqe', 'Mas Herry Pewe', 'Etan Serut, Jalen Balong Ponorogo', '6287758247146', '2020-05-01', 'crewpanserzero@gmail.com', '202cb962ac59075b964b07152d234b70', 'PLG', 'P003', 'Aktif', 'edef4454356', 'T001', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C009ndA7Y', 'Pak Suyoso', 'Kulon Serut, Jalen Balong Ponorogo', '6289666471656', '2020-05-17', 'ekasaputa94@gmail.com', '73f704bdae270d252c74affb3ee40b3e', 'PLG', 'P003', 'Aktif', 'bycfgev36s', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C010dwmNB', 'Pak Mono', 'Tenggong, Jalen Balong Ponorogo', '6289666471656', '2020-06-02', 'ekasaputa94@gmail.com', '73f704bdae270d252c74affb3ee40b3e', 'PLG', 'P003', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C011qwYLM', 'Rini setyaningsih', 'H. Agus salim jalen, balong, ponorogo', '62895399274933', '2022-09-06', 'setyaningsihrini761@gmail.com', '945ef08445973704234a1ee380038051', 'PLG', 'P003', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C012dndYT', 'Mas Imam Wahyudi', 'Etan Serut, Jalen Balong Ponorogo', '6285330598686', '2020-07-07', 'imam@rtrw.net', '202cb962ac59075b964b07152d234b70', 'PLG', 'P001', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C013BVNww', 'Kartiko', 'Jl. H. Agus Salim (Etan Serut), Jalen Balong Ponorogo', '6285608639832', '2020-07-10', 'mahendrakartiko75@gmail.com', '2aa1dd1504bc7e064c12f0a028f98fc8', 'PLG', 'P001', 'Aktif', '', 'T008', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C014dn8eb', 'Sherly', 'Etan Serut, Jalen Balong Ponorogo', '6281259346337', '2020-08-01', 'sherlisaskiamh@gmail.com', '4054ffbb993dad16075284b9d7328b6b', 'PLG', 'P001', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C015dN43W', 'Emma', 'Tenggong, Jalen Balong Ponorogo', '6281337759260', '2020-08-03', 'emaacristiani@gmail.com', '52b253332317b00ee1657d83d498d081', 'PLG', 'P004', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C016dmw2w', 'Boby p', 'Irmas, Jalen Balong Ponorogo', '6285785030865', '2020-10-11', 'botaxskchilljr@gmail.com', '0d83208c443cf778e7be5019b1b6dd36', 'PLG', 'P001', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C017wjwUU', 'Pak Jono', 'Jl. Hassanudin (Kulon serut), Jalen, Balong, Ponorogo', '6282316236826', '2020-10-20', 'riohandoyorio12@gmail.com', '5234', 'PLG', 'P003', 'Tidak Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C018q4khM', 'Pak No', 'Jalen Balong Ponorogo', '6282334015022', '2020-12-01', 'yantobrojo519@gmail.com', '3096', 'PLG', 'P003', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C019wdTQR', 'Mas Suyanto ( Keto )', 'Etan Serut, Jalen Balong Ponorogo', '886970015258', '2021-05-01', 'suyanto@rtrw.net', '4661', 'PLG', 'P001', 'Tidak Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C020fj98B', 'Nurinta Zumrotin Aswaty', 'Jl. H. Agus Salim Rt 007/Rw 003, Jalen, Balong, Ponorogo', '6285852518697', '2021-08-06', 'putraalhafidz23@gmail.com', 'c3484241e92c8e3fe79e924830831d75', 'PLG', 'P002', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C021enfyO', 'Rafika Respitasari', 'Jl. Gajahmada RT 07 RW 03 ds. Jalen kec. Balong Ponorogo', '6285745004092', '2021-09-07', 'rafika.respitasari@gmail.com', '22dd6cf9bb31a976cf2372153d7bb7d0', 'PLG', 'P003', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C022oqpLX', 'Septian Wahyu S', 'Jl. H. Agus Salim RT07 RW03 Dukuh Medelan Desa Jalen Kecamatan Balong', '62881036227698', '2021-09-28', 'sw646678@gmail.com', '91bc8b33bbfd0685dd3109053cc77b71', 'PLG', 'P002', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C023sdwuP1', 'Azzahra', 'Jln. Gajah mada RT 002 RW 003 Ds. Jalen, Kec. Balong Ponorogo ', '85296465009', '2022-11-05', 'wuldar34@gmail.com', '37e2dc658e4d775646187369bd96d872', 'PLG', 'P003', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C024fnMCv', 'Doni Pradana ', 'Jl H Agus Salim RT. 007 RW. 003 Ds. Jalen Kec. Balong Kab. Ponorogo', '6281252155390', '2022-11-05', 'nonetardjha73@gmail.com', '299fddd275b8ca50093585f9fce045ee', 'PLG', 'P002', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C025oeUIZ', 'Triyono', 'Etan Serut, Jalen Balong Ponorogo', '62816567221', '2022-12-31', 'triyono42556@gmail.com', '094f2a31e8042e7113d40b02c76b99a4', 'PLG', 'P003', 'Aktif', '', '', '');
INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`, `status_plg`, `id_maps`, `id_token`, `catatan`) VALUES ('C026wzAXv', 'Agus dwi sofhyan hadi', 'Jl H Agus Salim RT. 007 RW. 003 Ds. Jalen Kec. Balong Kab. Ponorogo', '6281249408554', '2023-01-14', 'ponorogobalong60@gmail.com', '2d6d77256e3ca18ddaa3b0009c089ce1', 'PLG', 'P002', 'Aktif', '', '', '');


#
# TABLE STRUCTURE FOR: tb_pengeluaran
#

DROP TABLE IF EXISTS `tb_pengeluaran`;

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(100) NOT NULL,
  `jenis_pengeluaran` text NOT NULL,
  `biaya_pengeluaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Belum Saya Bayar','LUNAS') NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S001nfwjff', 'Bulanan Indihome 30Mb', '385000', '2021-04-10', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S002njBDdw', 'Bulanan Indihome 40Mb', '410000', '2021-05-10', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S003wfwSWy', 'Bulanan Indihome 40Mb', '410000', '2021-06-07', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S004fge33l', 'Bulanan Indihome 40Mb', '400000', '2021-07-14', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S005ghyjeu', 'Beli AP TP-Link CPE220 + Kabel Lan', '610000', '2021-07-16', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S006FEEgge', 'Bulanan Indihome 40Mb', '400000', '2021-08-09', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S007fefejw', 'Bulanan Indihome 40Mb', '400000', '2021-09-13', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S008adoPAs', 'Bulanan Indihome 40Mb', '400000', '2021-10-11', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S009djfnSn', 'Bulanan Indihome 40Mb', '400000', '2021-11-12', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S010FNNlxm', 'Bulanan Indihome 40Mb', '400000', '2021-12-11', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S011fkeUog', 'Bulanan Indihome 40Mb', '400000', '2022-01-14', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S012jfneQr', 'Bulanan Indihome 40Mb', '400000', '2022-02-13', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S013ffnXZe', 'Bulanan Indihome 40Mb', '400000', '2022-03-11', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S014eenwOp', 'Bulanan indihome 40Mb', '400000', '2022-04-12', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S015ejfMnl', 'Bulanan Indihome 40Mb', '400000', '2022-05-13', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S016wPANCt', 'Bulanan Indihome 40Mb', '400000', '2022-06-13', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S017fekMnq', 'Beli Access Ponit TP Link CPE 220', '515000', '2022-05-07', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S018ASyuKl', 'Bulanan Indihome 50Mb', '406000', '2022-07-14', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S019skwYuL', 'Bulanan Indihome 50Mb', '405000', '2022-08-13', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S020snfowl', 'Bulanan Indihome 40Mb + BeatNet 20Mb', '900000', '2022-09-15', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S021GHjkuT', 'Downgrade speed indihome 10 Mb', '500000', '2022-09-27', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S022deef32', 'Bulanan Indihome 40Mb + BeatNet 30Mb', '900000', '2022-10-20', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S023fw345c', 'Beli converter FO 6 port', '450000', '2022-09-05', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S024fwwkLA', 'Beli tools untuk pemasangan FO + narik kabel FO', '620000', '2022-10-04', 'LUNAS');
INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES ('S025vdkwke', 'Bulanan Indihome 10Mb + BeatNet 30Mb', '700000', '2023-11-15', 'LUNAS');


#
# TABLE STRUCTURE FOR: tb_pengguna
#

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `level`) VALUES (1, 'Erik Wahyudi', 'admin@kassandra.com', 'erick05wahyudy', 'Administrator');
INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `level`) VALUES (2, 'Fannisa Tiara S', 'erik@gmail.com', '202cb962ac59075b964b07152d234b70', 'Administrator');


#
# TABLE STRUCTURE FOR: tb_promo
#

DROP TABLE IF EXISTS `tb_promo`;

CREATE TABLE `tb_promo` (
  `id_promo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `id_pelanggan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` enum('promo','tidak ada promo') CHARACTER SET latin1 NOT NULL,
  `biaya_promo` varchar(50) NOT NULL,
  `signature` text NOT NULL,
  `bukti_ktp` text NOT NULL,
  PRIMARY KEY (`id_promo`),
  UNIQUE KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_promo` (`id_promo`, `id_pelanggan`, `tgl_daftar`, `status`, `biaya_promo`, `signature`, `bukti_ktp`) VALUES ('Z001wwj3B', '', '0000-00-00', 'promo', '200000', '', '');
INSERT INTO `tb_promo` (`id_promo`, `id_pelanggan`, `tgl_daftar`, `status`, `biaya_promo`, `signature`, `bukti_ktp`) VALUES ('Z002wwIIW', 'C024fnMCv', '2022-11-05', 'promo', '', 'Doni Pradana _81252155390.png', 'Doni Pradana _IMG_20200929_232058.jpg');
INSERT INTO `tb_promo` (`id_promo`, `id_pelanggan`, `tgl_daftar`, `status`, `biaya_promo`, `signature`, `bukti_ktp`) VALUES ('Z003Ok0E8', 'C028dqEpc', '2023-02-14', 'promo', '', 'rani dwi_63eb582feb088.png', 'rani dwi_63eb582fa555d.png');


#
# TABLE STRUCTURE FOR: tb_tagihan
#

DROP TABLE IF EXISTS `tb_tagihan`;

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` enum('BL','LS') NOT NULL,
  `tgl_bayar` date NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `id_penghuni` (`id_pelanggan`),
  KEY `bulan` (`bulan`),
  CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`bulan`) REFERENCES `tb_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=727 DEFAULT CHARSET=latin1;

INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (704, '11', '2023', 'C001nwfwu', 140000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (705, '11', '2023', 'C002fAuee', 80000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (706, '11', '2023', 'C003nsdjs', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (707, '11', '2023', 'C004laoo2', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (708, '11', '2023', 'C005vnwoi', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (709, '11', '2023', 'C007qdmIr', 300000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (710, '11', '2023', 'C008ALpqe', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (711, '11', '2023', 'C009ndA7Y', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (712, '11', '2023', 'C010dwmNB', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (713, '11', '2023', 'C011qwYLM', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (714, '11', '2023', 'C012dndYT', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (715, '11', '2023', 'C013BVNww', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (716, '11', '2023', 'C014dn8eb', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (717, '11', '2023', 'C015dN43W', 150000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (718, '11', '2023', 'C016dmw2w', 50000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (719, '11', '2023', 'C018q4khM', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (720, '11', '2023', 'C020fj98B', 80000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (721, '11', '2023', 'C021enfyO', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (722, '11', '2023', 'C022oqpLX', 80000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (723, '11', '2023', 'C023sdwuP1', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (724, '11', '2023', 'C024fnMCv', 80000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (725, '11', '2023', 'C025oeUIZ', 100000, 'LS', '0000-00-00');
INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES (726, '11', '2023', 'C026wzAXv', 80000, 'LS', '0000-00-00');


#
# TABLE STRUCTURE FOR: tb_tagihan_konfirmasi
#

DROP TABLE IF EXISTS `tb_tagihan_konfirmasi`;

CREATE TABLE `tb_tagihan_konfirmasi` (
  `id_konfirmasi` varchar(50) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_tagihan` varchar(50) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_tagihan_konfirmasi` (`id_konfirmasi`, `id_pelanggan`, `id_tagihan`, `bukti_bayar`, `tgl_konfirmasi`) VALUES ('K001RKpuN', 'C001nwfwu', '704', 'Trianto N.A_1.png.png', '2023-11-08');
INSERT INTO `tb_tagihan_konfirmasi` (`id_konfirmasi`, `id_pelanggan`, `id_tagihan`, `bukti_bayar`, `tgl_konfirmasi`) VALUES ('K002LPIaJ', 'C001nwfwu', '704', 'Trianto N.A_5.png.png', '2023-11-08');
INSERT INTO `tb_tagihan_konfirmasi` (`id_konfirmasi`, `id_pelanggan`, `id_tagihan`, `bukti_bayar`, `tgl_konfirmasi`) VALUES ('K003sM0GL', 'C001nwfwu', '704', 'Trianto N.A_timeline-finalproject3.png.png', '2023-11-08');


#
# TABLE STRUCTURE FOR: tb_tagihan_lain
#

DROP TABLE IF EXISTS `tb_tagihan_lain`;

CREATE TABLE `tb_tagihan_lain` (
  `id_tagihan_lain` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` char(6) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tagihan_lain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L002wwniOl', 'C003nsdjs', 150000, 'LS', '2021-08-13', 'Access Point tp-link  indoor');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L003mvnJKa', 'C004laoo2', 200000, 'LS', '2021-10-17', 'Pasang tambahan penguat sinyal / Access Point tp-link  outdoor bekas');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L004fjeior', 'C020fj98B', 790000, 'LS', '2021-08-09', 'Pemasangan baru wifi, free kabel lan 10m dan bulanan pertama 80k');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L005QWRtgh', 'C021enfyO', 800000, 'LS', '2021-09-12', 'Pasang baru wifi.. Alat TP-Link, Tenda F3, Kabel LAN 26 meter, & Pipa besi 3/4 dim');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L006nmkryA', 'C022oqpLX', 20000, 'LS', '2021-10-05', 'membantu jasa pemasangan wifi baru');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L007vddDsf', 'C012dndYT', 600000, 'LS', '2021-10-02', 'Pembayaran iuran bulanan wifi dalam jangka setahun sampai bulan September 2022');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L008wwrfgh', 'C016dmw2w', 320000, 'LS', '2021-10-29', 'Bayar bulanan hotspot kassandrawifi 4 bulan - sampai bulan maret');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L009lqpjkf', 'C007qdmIr', 1500000, 'LS', '2021-12-28', 'Pemasangan baru wifi.. ( Kabel FO 500m, Router Tenda 1, Converter FO to LAN 2, Claim FO 6, Claim Kabel 1, Connector FO 2, Instalasi Wifi )');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L010mcnswe', 'C016dmw2w', 320000, 'LS', '2022-01-31', 'Bayar bulanan hotspot kassandrawifi 4 bulan - sampai bulan Juli');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L011jBFRwm', 'C016dmw2w', 400000, 'LS', '2022-08-05', 'Bayar iuran KassandraWiFi 1Mb untuk 8 Bulan sampai bulan maret 2023');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L012djwe38', 'C011qwYLM', 400000, 'LS', '2022-09-09', 'Pasang baru wifi = 350k + bulan pertama potong ½ harga = 50k');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L013djf6et', 'C016dmw2w', 50000, 'LS', '2022-09-11', 'Speed on Demand 20Mb, masa aktif 1 hari');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L014jdnsd9', 'C012dndYT', 600000, 'LS', '2022-10-08', 'Bayar iuran bulanan kassandra wifi dlm jangka 1 tahun');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L015ddjTYs', 'C023sdwuP1', 350000, 'LS', '2022-11-05', 'Pemasangan baru wifi');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L016swsLKOX', 'C023sdwuP1', 300000, 'LS', '2022-11-05', 'Iuran bulanan hotspor kassandrawifi jangka waktu 3 bulan ( sampai bulan Januari )');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L017wdnwjw2', 'C024fnMCv', 240000, 'LS', '2022-11-05', 'Pemasangan Baru Wifi + bulanan pertama ½ harga');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L018kwndwfw', 'C015dN43W', 150000, 'LS', '2022-12-07', 'Ganti router wifi');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L019ajdnqqw', 'C025oeUIZ', 150000, 'LS', '2022-12-31', 'Pemasangan wifi baru dan aktivasi');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L020ffdwkwk', 'C026wzAXv', 175000, 'LS', '2023-01-14', 'Pasang wifi baru via kabel fiber optic');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L021qpdeqUn', 'C016dmw2w', 900000, 'LS', '2023-01-24', 'bayar bulanan internet untuk 9 bulan, maret sampai bulan November 2023');
INSERT INTO `tb_tagihan_lain` (`id_tagihan_lain`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`, `keterangan`) VALUES ('L022ejfnwI7', 'C016dmw2w', 50000, 'LS', '2023-01-24', 'Speed on Demand 20Mb, masa aktif 1 hari');


#
# TABLE STRUCTURE FOR: tb_token
#

DROP TABLE IF EXISTS `tb_token`;

CREATE TABLE `tb_token` (
  `id_token` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `expired` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T003', 'NEZPbUi7ZCgOqeXwkbyUn426a', '2023-01-21 12:49:37');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T002', 'wDOxOoyl1Adta45G6KAIbemK1', '2023-01-21 12:49:36');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T001', 'auT8wXpVbSmDTXal6GXESUAlG', '2023-01-20 21:29:49');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T004', 'H4nmB2spRXXgemCDLPFGzELQh', '2023-01-21 12:51:56');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T005', 'VgZ8P5UKWIx0CYZHSxqZW2bls', '2023-01-21 12:52:25');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T006', 'bWlIgd7GAmrj6lG3Tm5MiDFYJ', '2023-01-21 12:53:37');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T007', 'ff7Oa7fSgKAnJfFMXGNKFFP0k', '2023-01-21 12:56:39');
INSERT INTO `tb_token` (`id_token`, `token`, `expired`) VALUES ('T008', 'lEy0G4zVLJoBGDjpjUFHgVVC8', '2023-01-21 13:08:16');


