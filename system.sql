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

CREATE TABLE `account` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;


-- Login untuk admin
INSERT INTO account (name, email, password, nomor_telepon) VALUES ("Administrator", "opto08mks@gmail.com", "$2y$12$hpLziUH4VNn9l6tAOttEQe.fo69t/FMvsMa41vfsOdI1xCxc2hKE6", "081242133333");
