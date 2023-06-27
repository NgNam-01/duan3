create database if not exists xshop;
use xshop;

create table if not	exists loai (
ma_loai int(10) not null auto_increment,
ten_loai varchar(100) not null,
unique(ten_loai),
primary key(ma_loai)
);

create table if not exists hang_hoa (
ma_hh int(10) not null auto_increment,
ten_hh varchar(100) not null,
don_gia int not null default 0,
giam_gia int not null default 0,
hinh varchar(100) null,
ngay_nhap date not null default current_timestamp,
ma_loai int(10) not null,
dac_biet bit(1) not null default 0,
so_luot_xem int(10) not null default 0,
mo_ta varchar(4000) null,
primary key(ma_hh)
);

create table if not exists khach_hang (
ma_kh varchar(20) not null,
ho_ten varchar(50) not null,
mat_khau varchar(100) not null,
email varchar(100) not null,
hinh varchar(100) null,
kich_hoat bit(1) not null default 0,
vai_tro bit(1) not null default 0,
unique(email),
primary key(ma_kh)
);

create table if not exists binh_luan (
ma_bl int(10) not null auto_increment,
noi_dung varchar(1000) not null,
ma_kh varchar(20) not null,
ma_hh int(10) not null,
ngay_bl date not null default current_timestamp,
primary key(ma_bl)
);

alter table hang_hoa
add constraint FK_hang_hoa_loai_hang foreign key (ma_loai) references loai(ma_loai) on delete cascade;

alter table binh_luan
add constraint FK_binh_luan_khach_hang foreign key (ma_kh) references khach_hang(ma_kh) on delete cascade,
add constraint Fk_binh_luan_hang_hoa foreign key (ma_hh) references hang_hoa(ma_hh) on delete cascade;

insert into loai (ten_loai) values
('Đồng hồ đeo tay'),
('Máy tính xách tay'),
('Máy ảnh'),
('Điện thoại');

insert into hang_hoa (ten_hh, don_gia, giam_gia, hinh, ngay_nhap, ma_loai, dac_biet, mo_ta) values
('Điện thoại OPPO Find N2 Flip 5G',19990000,0,'1001.jpg','2023-05-20',4,1,'OPPO Find N2 Flip là mẫu điện thoại gập đầu tiên được nhà OPPO chính thức giới thiệu tại Việt Nam, sản phẩm mang đến một thiết kế độc đáo cho người dùng cũng như hiệu năng mạnh mẽ từ con chip Dimensity 9000+ và màn hình phụ siêu lớn được tích hợp kèm.'),
('MÁY ẢNH FUJIFILM X100V (BẠC)',45490000,1,'1002.jpg','2023-05-21',3,0,'Cảm biến hình ảnh BSI-CMOS APS-C 26mpx. Bộ xử lý hình ảnh Processor X4. ISO 160 – 12800, mở rộng xuống 50 và lên tới 51200. AF: 425 điểm AF, theo pha, tương phản. Tốc độ chụp liên tiếp tối đa: 11 hình/giây. Màn hình cảm ứng lật, 1,62 triệu chấm, 3″. Ống ngắm: lai, quang học và điện tử, dạng rangefinder. Độ phân giải của khung ngắm: 3,69 triệu chấm. Khả năng quay video: 4K DCI 30p 200Mbps, 4K UHD. 17 chế độ Film Simulation. Kết nối Bluetooth, Wi-Fi'),
('Laptop Acer Aspire 7 Gaming A715',20490000,24,'1003.jpg','2023-05-22',2,1,'Laptop Acer Aspire 7 Gaming A715 42G R05G R5 (NH.QAYSV.007) có kiểu dáng hiện đại cùng hiệu năng mạnh mẽ có thể đáp ứng mọi nhu cầu sử dụng từ văn phòng đến đồ hoạ của các bạn sinh viên và nhân viên văn phòng trong cả một ngày.'),
('Đồng hồ Casio 42 mm Nam AE-1200WH-1AVDF',1140000,30,'1004.jpg','2023-05-23',1,0,'Thiết kế trẻ trung, kiểu dáng thể thao thích hợp với các chàng trai năng động, hiện đại'),
('Điện thoại iPhone 14 Pro Max 128GB',29990000,11,'1005.jpg','2023-05-24',4,1,'Điểm nhấn của sự kiện ra mắt sản phẩm tháng 9/2022 của Apple chính là siêu phẩm iPhone 14 Pro Max 128GB với thiết kế mặt trước đổi mới, camera nâng cấp mạnh mẽ và hiệu năng bùng nổ từ chip A16 Bionic, đáp ứng mọi nhu cầu của người dùng.'),
('MÁY ẢNH FUJIFILM X100V (ĐEN)',44990000,7,'1006.jpg','2023-05-25',3,0,'Cảm biến hình ảnh BSI-CMOS APS-C 26mpx. Bộ xử lý hình ảnh Processor X4. ISO 160 – 12800, mở rộng xuống 50 và lên tới 51200. AF: 425 điểm AF, theo pha, tương phản. Tốc độ chụp liên tiếp tối đa: 11 hình/giây. Màn hình cảm ứng lật, 1,62 triệu chấm, 3″. Ống ngắm: lai, quang học và điện tử, dạng rangefinder. Độ phân giải của khung ngắm: 3,69 triệu chấm. Khả năng quay video: 4K DCI 30p 200Mbps, 4K UHD. 17 chế độ Film Simulation. Kết nối Bluetooth, Wi-Fi'),
('Laptop Asus TUF Gaming F15',20990000,26,'1007.jpg','2023-05-26',2,1,'Laptop Asus TUF Gaming F15 FX506LHB i5 (HN188W) với cấu hình ổn định của chip Intel thế hệ 10 và diện mạo chuẩn laptop gaming hầm hố sẵn sàng cùng bạn chinh phục mọi đấu trường ảo.'),
('Đồng hồ CASIO 39.7 mm Nam AE-1200WHD-1AVDF',1373000,42,'1008.jpg','2023-05-27',1,0,'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng'),
('Điện thoại Samsung Galaxy S23 Ultra 5G 256GB',31990000,15,'1009.jpg','2023-05-28',4,1,'Samsung Galaxy S23 Ultra được xác nhận sẽ ra mắt trong sự kiện Galaxy Unpacked diễn ra vào đầu tháng 2 năm nay, theo thông tin từ hãng thì đây sẽ là mẫu điện thoại được nâng cấp mạnh về khả năng chụp ảnh nhờ camera 200 MP cũng như hiệu năng vô đối với con chip Snapdragon 8 Gen 2.'),
('CANON EOS R50 KIT 18-45MM IS STM ( LBM )',26490000,6,'1010.jpg','2023-05-29',3,0,'Cảm biến CMOS APS-C 24.2MP. Bộ xử lý hình ảnh DIGIC X. Quay Video UHD 4K 30p. Dual Pixel CMOS AF II với 651 điểm. Kính ngắm điện tử 2,36m-Dot. Màn hình cảm ứng đa góc 3.0" 1.62m. Màn trập điện tử 15 khung hình/giây. Phim dành cho Chế độ Trình diễn Cận cảnh. Chế độ phim dọc. Ống Kính RF-S 18-45mm f/4.5-6.3 IS STM'),
('Laptop Lenovo Ideapad Gaming 3',20790000,30,'1011.jpg','2023-05-30',2,1,'Laptop Lenovo Ideapad Gaming 3 15IHU6 i5 (82K101F3VN) gây ấn tượng với ngoại hình tối giản nhưng không kém phần cuốn hút, cấu hình mạnh mẽ nhờ CPU Intel Core i5 thế hệ 11 và card đồ họa NVIDIA GeForce GTX 1650 giúp bạn chinh phục mọi đấu trường ảo.'),
('Đồng hồ Casio 40 mm Nam MTP-M300L-7AVDF',3381000,20,'1012.jpg','2023-05-31',1,0,'Đồng hồ Casio 40 mm Nam MTP-M300L-7AVDF thuộc thương hiệu Casio của Nhật Bản. Đồng hồ sở hữu đường kính mặt 40 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính khoáng (Mineral), có độ cứng và độ chịu lực tốt khi bị va đập, dễ dàng đánh bóng khi bị trầy xước nhẹ. Khung viền của đồng hồ làm từ thép không gỉ - sáng bóng, hạn chế chống ăn mòn và trầy xước. Chất liệu dây đeo được làm từ da tổng hợp - mềm mại, mang lại sự thoải mái cho người dùng khi đeo.'),
('Điện thoại Xiaomi Redmi Note 12 4GB',4990000,8,'1013.jpg','2023-06-01',4,1,'Xiaomi Redmi Note 12 4GB chiếc điện thoại tầm trung đáng chú ý với nhiều tính năng ưu việt. Điểm nổi bật của điện thoại này chính là con chip Snapdragon 685 cùng cảm biến máy ảnh có độ phân giải lên đến 50 MP, giúp bạn có thể chụp ảnh sắc nét và chất lượng cao. Ngoài ra, máy sở hữu vẻ ngoài tinh tế cùng màu sắc mới mẻ.'),
('MÁY ẢNH SONY ALPHA A6400 KIT E PZ 16-50MM F3.5-5.6 OSS/ ILCE-6400L/ ĐEN',	23490000,0,'1014.jpg','2023-06-02',3,0,'EVF OLED XGA Tru-Finder 2.36m-Dot. Màn hình cảm ứng, lật 180° 3.0" 921.6k-Dot. Quay video UHD 4K nội bộ, S-Log3, HLG. Hệ thống AF nhận diện pha và tương phản 425 điểm. Real-Time Eye AF; Real-Time Tracking. Chụp liên tiếp đến 11 fps. ISO mở rộng 100-102400. Tích hợp Wi-Fi với NFC. Kích thước: 120 x 66.9 x 59.7 mm. Trọng lượng: 403g. Ống kính kit Sony E PZ 16-50mm f/3.5-5.6 OSS'),
('Laptop MSI Gaming GF63',16490000,0,'1015.jpg','2023-06-03',2,1,'Laptop MSI Gaming GF63 Thin 11SC i5 (664VN) chắc chắn sẽ làm bạn hài lòng về khả năng chiến game và thiết kế đồ họa mượt mà nhờ combo CPU Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce GTX chuyên dụng.'),
('Đồng hồ Casio 44 mm Nam MTD-130-1AVDF',3553000,20,'1016.jpg','2023-06-04',1,0,'Tiện ích lịch ngày và lịch thứ được hãng tích hợp tại vị trí 4 giờ độc đáo của mẫu đồng hồ nam. Đồng thời, nhờ kim dạ quang trên mẫu đồng hồ này mà bạn có thể quan sát thời gian ngay cả trong điều kiện thiếu sáng.'),
('Điện thoại OPPO Reno8 T 5G 128GB',9990000,3,'1017.jpg','2023-06-05',4,1,'Là một sản phẩm trong dòng Reno8, OPPO Reno8 T 5G dự kiến sẽ là một sản phẩm cực kì đáng mua với hàng loạt trang bị cực thời thượng từ OPPO. Thiết bị có thiết kế sang trọng, bắt mắt đi kèm với một cấu hình đủ dùng và bộ ba camera xuất sắc, làm hài lòng mọi nhu cầu quay chụp.'),
('MÁY ẢNH FUJIFILM X-S20 + LENS XC 15-45MM F/3.5-5.6 (CHÍNH HÃNG)',35990000,0,'1018.jpg','2023-06-06',3,0,'Cảm biến X-Trans CMOS 4. Bộ xử lý hình ảnh X-Processor 5. Quay video 6.2K/30fps, 4K/60fps. Ổn định hình ảnh IBIS 5 trục, 7-stops. 19 Chế độ giả lập màu phim. Kính ngắm 2.36 triệu điểm, phóng đại 0.62x. Màn hình LCD xoay đa góc 3.0 inch, 1.84 triệu điểm. Sử dụng pin Fujifilm NP-W235');

insert into khach_hang (ma_kh, ho_ten, mat_khau, email, hinh, kich_hoat, vai_tro) values
('admin','Quản trị viên','root','admin@email.com','user.png',1,1),
('nva','Nguyễn Văn A','12345','nguyenvana@gmail.com','user.png',1,0);