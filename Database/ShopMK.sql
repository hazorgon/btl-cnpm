create database shop
go
use  shop

create table NhanVien(
	MaNV int IDENTITY(1,1),
	Hoten varchar(50),
	NgaySinh Date,
	Diachi varchar(256),
	SDT char(10),
	Ngaybatdau date,
	Luong int,
	primary key(MaNV))

create table Account(
	ID int IDENTITY(1,1),
	MaNV int,
	Username varchar(20),
	Password varchar(50),
	Access varchar(20),
	primary key(ID),
	constraint fk_account_nhanvien foreign key (MaNV) references NhanVien(MaNV) on delete cascade on update cascade) 

create table HoaDon(
	MaHD int IDENTITY(1,1),
	MaNV int,
	NgayLap date,
	primary key (MaHD),
	constraint fk_hoadon_nhanvien foreign key (MaNV) references NhanVien(MaNV) on delete cascade on update cascade) 

create table LoaiSP(
	MaloaiSP char(5) primary key,
	TenloaiSP varchar(30))

create table SanPham(
	MaSP varchar(20),
	MaLoaiSP char(5),
	TenSP varchar(256),
	Soluong int,
	Hinhanh varchar(512),
	DVT varchar(32),
	Gia int
	primary key(masp),
	constraint fk_sanpham_Loaisp foreign key (MaLoaiSP) references LoaiSP(MaloaiSP) on delete cascade on update cascade) 

create table Chitiethoadon(
	MaHD int,
	maSP varchar(20),
	Soluongban int
	primary key(MaHD,MaSP),
	constraint fk_CTHD_SP foreign key (MaSP) references SanPham(maSP) on delete cascade on update cascade, 
	constraint fk_CTHD_HD foreign key (MaHD) references Hoadon(MaHD) on delete cascade on update cascade)
