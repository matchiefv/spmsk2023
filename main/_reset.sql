CREATE TABLE `penjual` (
  `idpenjual` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `namapenjual` varchar(255) NOT NULL
  PRIMARY KEY (idpenjual)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pembeli` (
  `idpembeli` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `namapembeli` varchar(255) NOT NULL
  PRIMARY KEY (idpembeli)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE `produk` (
  `idproduk` varchar(255) NOT NULL,
  `namaproduk` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `idpenjual` varchar(255) NOT NULL,
  PRIMARY KEY (idproduk),
  FOREIGN KEY (idpenjual) REFERENCES penjual(idpenjual)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bandingan` (
  `idbandingan` int NOT NULL,
  `idpembeli` varchar(255) NOT NULL,
  `idproduk` varchar(255) NOT NULL,
  PRIMARY KEY (idbandingan),
  FOREIGN KEY (idpembeli) REFERENCES pembeli(idpembeli),
  FOREIGN KEY (idproduk) REFERENCES produk(idproduk)
) DEFAULT CHARSET=utf8mb4;
