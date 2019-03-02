/* Membuat Database dan Table */
create database crud_db;

use crud_db;

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100),
  `email` varchar(100),
  `mobile` varchar(15),
  PRIMARY KEY  (`id`)
);

