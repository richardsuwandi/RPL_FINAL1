CREATE DATABASE optoelektronik;
USE optoelektronik;

CREATE TABLE `barang` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) DEFAULT NULL,
  `spesifikasi_barang1` varchar(255) DEFAULT NULL,
  `spesifikasi_barang2` varchar(255) DEFAULT NULL,
  `gambar_barang1` varchar(255) DEFAULT NULL,
  `gambar_barang2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;
