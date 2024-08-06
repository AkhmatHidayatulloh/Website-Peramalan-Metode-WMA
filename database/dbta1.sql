

/*==============================================================*/
/* Table: AKSES                                                 */
/*==============================================================*/
create table AKSES 
(
   ID_AKSES             varchar(20)                    not null,
   USERNAME             varchar(100)                   null,
   PASSWORD             varchar(100)                   null,
   constraint PK_AKSES primary key (ID_AKSES)
);

/*==============================================================*/
/* Index: USER_PK                                               */
/*==============================================================*/
create unique index USER_PK on AKSES (
ID_AKSES ASC
);

/*==============================================================*/
/* Table: MITRA                                                 */
/*==============================================================*/
create table MITRA 
(
   ID_MITRA             varchar(20)                    not null,
   NAMA_MITRA           varchar(100)                   null,
   ALAMAT_MITRA         varchar(150)                   null,
   KOTA_MITRA           varchar(100)                   null,
   NOHP_MITRA           varchar(15)                    null,
   EMAIL_MITRA          varchar(100)                   null,
   constraint PK_MITRA primary key (ID_MITRA)
);

/*==============================================================*/
/* Index: MITRA_PK                                              */
/*==============================================================*/
create unique index MITRA_PK on MITRA (
ID_MITRA ASC
);

/*==============================================================*/
/* Table: PELANGGAN                                             */
/*==============================================================*/
create table PELANGGAN 
(
   ID_PELANGGAN         varchar(20)                    not null,
   NAMA_PELANGGAN       varchar(100)                   null,
   ALAMAT_PELANGGAN     varchar(150)                   null,
   KOTA_PELANGGAN       varchar(50)                    null,
   NOHP_PELANGGAN       varchar(15)                    null,
   EMAIL_PELANGGAN      varchar(100)                   null,
   constraint PK_PELANGGAN primary key (ID_PELANGGAN)
);

/*==============================================================*/
/* Index: PELANGGAN_PK                                          */
/*==============================================================*/
create unique index PELANGGAN_PK on PELANGGAN (
ID_PELANGGAN ASC
);

/*==============================================================*/
/* Table: PERHITUNGAN_WMA                                       */
/*==============================================================*/
create table PERHITUNGAN_WMA 
(
   ID_PERHITUNGAN       varchar(20)                    not null,
   ID_PRODUK            varchar(20)                    null,
   ID_AKSES             varchar(20)                    null,
   NILAI_PERHITUNGAN    integer                        null,
   PRODUK_TERJUAL       integer                        null,
   TANGGAL_PERHITUNGAN  date                           null,
   NILAI_BULAN_1        integer                        null,
   NILAI_BULAN_2        integer                        null,
   NILAI_BULAN_3        integer                        null,
   NILAI_BULAN_4        integer                        null,
   constraint PK_PERHITUNGAN_WMA primary key (ID_PERHITUNGAN)
);

/*==============================================================*/
/* Index: PERHITUNGAN_WMA_PK                                    */
/*==============================================================*/
create unique index PERHITUNGAN_WMA_PK on PERHITUNGAN_WMA (
ID_PERHITUNGAN ASC
);

/*==============================================================*/
/* Index: MENGHITUNG_FK                                         */
/*==============================================================*/
create index MENGHITUNG_FK on PERHITUNGAN_WMA (
ID_AKSES ASC
);

/*==============================================================*/
/* Index: MENGAMBIL_DATA_PRODUK3_FK                             */
/*==============================================================*/
create index MENGAMBIL_DATA_PRODUK3_FK on PERHITUNGAN_WMA (
ID_PRODUK ASC
);

/*==============================================================*/
/* Table: PRODUK                                                */
/*==============================================================*/
create table PRODUK 
(
   ID_PRODUK            varchar(20)                    not null,
   NAMA_PRODUK          varchar(100)                   null,
   SATUAN_PRODUK        varchar(10)                    null,
   HARGA_PRODUK         integer                        null,
   STOK_PRODUK          integer                        null,
   constraint PK_PRODUK primary key (ID_PRODUK)
);

/*==============================================================*/
/* Index: PRODUK_PK                                             */
/*==============================================================*/
create unique index PRODUK_PK on PRODUK (
ID_PRODUK ASC
);

/*==============================================================*/
/* Table: TRANSAKSI_PRODUK_KELUAR                               */
/*==============================================================*/
create table TRANSAKSI_PRODUK_KELUAR 
(
   ID_TRANSAKSI_KELUAR  varchar(20)                    not null,
   ID_PELANGGAN         varchar(20)                    null,
   ID_PRODUK            varchar(20)                    null,
   TGL_KELUAR           date                           null,
   JUMLAH_PRODUK_KELUAR integer                        null,
   STOK_AWAL_KELUAR     integer                        null,
   STOK_AKHIR_KELUAR    integer                        null,
   constraint PK_TRANSAKSI_PRODUK_KELUAR primary key (ID_TRANSAKSI_KELUAR)
);

/*==============================================================*/
/* Index: TRANSAKSI_PRODUK_KELUAR_PK                            */
/*==============================================================*/
create unique index TRANSAKSI_PRODUK_KELUAR_PK on TRANSAKSI_PRODUK_KELUAR (
ID_TRANSAKSI_KELUAR ASC
);

/*==============================================================*/
/* Index: MENGAMBIL_DATA_PRODUK1_FK                             */
/*==============================================================*/
create index MENGAMBIL_DATA_PRODUK1_FK on TRANSAKSI_PRODUK_KELUAR (
ID_PRODUK ASC
);

/*==============================================================*/
/* Index: MENGAMBIL_DATA_PELANGGAN_FK                           */
/*==============================================================*/
create index MENGAMBIL_DATA_PELANGGAN_FK on TRANSAKSI_PRODUK_KELUAR (
ID_PELANGGAN ASC
);

/*==============================================================*/
/* Table: TRANSAKSI_PRODUK_MASUK                                */
/*==============================================================*/
create table TRANSAKSI_PRODUK_MASUK 
(
   ID_TRANSAKSI_MASUK   varchar(20)                    not null,
   ID_MITRA             varchar(20)                    null,
   ID_PRODUK            varchar(20)                    null,
   TGL_MASUK            date                           null,
   JUMLAH_PRODUK_MASUK  integer                        null,
   STOK_AWAL_MASUK      integer                        null,
   STOK_AKHIR_MASUK     integer                        null,
   constraint PK_TRANSAKSI_PRODUK_MASUK primary key (ID_TRANSAKSI_MASUK)
);

/*==============================================================*/
/* Index: TRANSAKSI_PRODUK_MASUK_PK                             */
/*==============================================================*/
create unique index TRANSAKSI_PRODUK_MASUK_PK on TRANSAKSI_PRODUK_MASUK (
ID_TRANSAKSI_MASUK ASC
);

/*==============================================================*/
/* Index: MENGAMBIL_DATA_MITRA_FK                               */
/*==============================================================*/
create index MENGAMBIL_DATA_MITRA_FK on TRANSAKSI_PRODUK_MASUK (
ID_MITRA ASC
);

/*==============================================================*/
/* Index: MENGAMBIL_DATA_PRODUK2_FK                             */
/*==============================================================*/
create index MENGAMBIL_DATA_PRODUK2_FK on TRANSAKSI_PRODUK_MASUK (
ID_PRODUK ASC
);

alter table PERHITUNGAN_WMA
   add constraint FK_PERHITUN_MENGAMBIL_PRODUK3 foreign key (ID_PRODUK)
      references PRODUK (ID_PRODUK)
      on update restrict
      on delete restrict;

alter table PERHITUNGAN_WMA
   add constraint FK_PERHITUN_MENGHITUN_AKSES foreign key (ID_AKSES)
      references AKSES (ID_AKSES)
      on update restrict
      on delete restrict;

alter table TRANSAKSI_PRODUK_KELUAR
   add constraint FK_TRANSAKS_MENGAMBIL_PELANGGA foreign key (ID_PELANGGAN)
      references PELANGGAN (ID_PELANGGAN)
      on update restrict
      on delete restrict;

alter table TRANSAKSI_PRODUK_KELUAR
   add constraint FK_TRANSAKS_MENGAMBIL_PRODUK1 foreign key (ID_PRODUK)
      references PRODUK (ID_PRODUK)
      on update restrict
      on delete restrict;

alter table TRANSAKSI_PRODUK_MASUK
   add constraint FK_TRANSAKS_MENGAMBIL_MITRA foreign key (ID_MITRA)
      references MITRA (ID_MITRA)
      on update restrict
      on delete restrict;

alter table TRANSAKSI_PRODUK_MASUK
   add constraint FK_TRANSAKS_MENGAMBIL_PRODUK2 foreign key (ID_PRODUK)
      references PRODUK (ID_PRODUK)
      on update restrict
      on delete restrict;

