<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'subcategory_id' => 1,
        'brand_id' => 1,
        'product_name' => 'Product 1',
        'product_code' => '2222',
        'product_quantity' => '50',
        'product_size' => '64G,128G,256G',
        'product_color' => 'white,black,yellow',
        'selling_price' => '30000000',
        'discount_price' => '28000000',
        'product_detail' => '<p>Tất cả iPhone ch&iacute;nh h&atilde;ng VN/A được ph&acirc;n phối tại Ho&agrave;ng H&agrave; Mobile đều được nhập trực tiếp từ C&ocirc;ng ty TNHH Apple Việt Nam.&nbsp;HoangHa Mobile l&agrave; nh&agrave; b&aacute;n lẻ ủy quyền ch&iacute;nh thức của Apple tại Việt Nam.</p>

        <p><img alt="" src="https://cdn.hoanghamobile.com/Uploads/Content/2020/10/14/apple--dien-thoai-di-dong-apple-iphone-12-mini-64gb-chinh-hang-vn-a-1.JPG" style="margin:0px" /></p>
        
        <p>Tem ICT c&oacute; tr&ecirc;n c&aacute;c sản phẩm iPhone ch&iacute;nh h&atilde;ng VN/A</p>
        
        <p><strong>Mua điện thoại iPhone 14 ch&iacute;nh h&atilde;ng VN/A gi&aacute; rẻ tại Ho&agrave;ng H&agrave; Mobile</strong>&nbsp;</p>
        
        <p>Mới đ&acirc;y, Apple đ&atilde; tổ chức sự kiện Far Out ra mắt c&aacute;c sản phẩm mới của năm 2022. C&ocirc;ng ty đ&atilde; giới thiệu d&ograve;ng iPhone 14 Series được rất nhiều người d&ugrave;ng chờ đợi kể từ khi những tin đồn đầu ti&ecirc;n xuất hiện v&agrave;o hồi đầu năm. Sản phẩm năm nay kh&ocirc;ng chỉ cải tiến về thiết kế m&agrave; c&ograve;n được cung cấp sức mạnh vượt trội từ con chip A15 Bionic. H&atilde;y c&ugrave;ng Ho&agrave;ng H&agrave; Mobile kh&aacute;m ph&aacute; những ưu điểm của chiếc iPhone 14 ch&iacute;nh h&atilde;ng VN/A nh&eacute;.</p>
        
        <p><img src="https://admin.hoanghamobile.com/Uploads/2022/09/09/11_637983373143243781.jpg" /></p>
        
        <p>&nbsp;</p>
        
        <p>&nbsp;</p>
        
        <p><strong>Thiết kế sang trọng, m&agrave;n h&igrave;nh 6.1 inch sắc n&eacute;t, sống động</strong></p>
        
        <p>Từ d&ograve;ng iPhone 12 Series, Apple đ&atilde; mang đến cho iPhone kiểu d&aacute;ng thiết kế sang trọng từ những g&oacute;c cạnh vu&ocirc;ng vức. Năm nay, d&ograve;ng iPhone 14 Series c&oacute; thiết kế kh&ocirc;ng thay đổi qu&aacute; nhiều. Phần lưng m&aacute;y phẳng, c&aacute;c cạnh vu&ocirc;ng mang phong c&aacute;ch của những chiếc iPhone 5 đời đầu. M&aacute;y c&oacute; trọng lượng chỉ khoảng 172g v&agrave; độ d&agrave;y 7.8mm, tạo cảm gi&aacute;c thoải m&aacute;i khi cầm tr&ecirc;n tay sử dụng. iPhone 14 ch&iacute;nh h&atilde;ng VN/A &aacute;nh l&ecirc;n vẻ đẹp hiện đại, sang trọng từ mọi g&oacute;c nh&igrave;n.</p>
        
        <p>&nbsp;</p>
        
        <p>&nbsp;<img src="https://admin.hoanghamobile.com/Uploads/2022/09/09/22_637983373143243781.jpg" /></p>
        
        <p>Phi&ecirc;n bản iPhone 14 ch&iacute;nh h&atilde;ng VN/A ti&ecirc;u chuẩn sẽ vẫn c&oacute; thiết kế m&agrave;n h&igrave;nh tương tự như iPhone 13. M&agrave;n h&igrave;nh của iPhone 14 ch&iacute;nh h&atilde;ng VN/A c&oacute; k&iacute;ch thước 6.1 inch, độ ph&acirc;n giải 2532 x 1170 pixels. Tấm nền OLED được t&iacute;ch hợp c&ocirc;ng nghệ Super Retina XDR quen thuộc sẽ mang đến chất lượng hiển thị h&igrave;nh ảnh sắc n&eacute;t, m&agrave;u sắc rực rỡ. iPhone 14 cũng được t&iacute;ch hợp c&aacute;c dải m&agrave;u P3, HRD10, v&agrave; độ s&aacute;ng tối đa l&ecirc;n tới 1200 nits. Nhờ đ&oacute;, người d&ugrave;ng c&oacute; thể l&agrave;m việc, giải tr&iacute; với từng khung h&igrave;nh r&otilde; n&eacute;t v&agrave; ch&acirc;n thực. Độ tương phản m&agrave;n h&igrave;nh cao gi&uacute;p c&aacute;c h&igrave;nh ảnh hiển thị tự nhi&ecirc;n nhất trong mọi điều kiện &aacute;nh s&aacute;ng d&ugrave; ở trong nh&agrave; hay ngo&agrave;i trời.</p>
        
        <p><strong>Hiệu năng đỉnh cao với chip A15 Bionic, thời lượng pin cải thiện</strong></p>
        
        <p>H&agrave;ng năm, bốn phi&ecirc;n bản trong d&ograve;ng iPhone mới sẽ sở hữu c&ugrave;ng một con chip. Tuy nhi&ecirc;n năm nay, iPhone 14 ch&iacute;nh h&atilde;ng VN/A được trang bị con chip A15 Bionic. Nếu bạn nghĩ rằng n&oacute; kh&ocirc;ng kh&aacute;c g&igrave; với chip A15 Bionic tr&ecirc;n iPhone 13 th&igrave; kh&ocirc;ng phải đ&acirc;u. Con chip n&agrave;y được n&acirc;ng cấp với 5 nh&acirc;n, nhờ đ&oacute; n&oacute; n&acirc;ng cai hiệu suất xử l&yacute; cho điện thoại. Đồng thời, khả năng xử l&yacute; đồ họa tr&ecirc;n iPhone 14 cũng sẽ được cải thiện đ&aacute;ng kể. Đối với iPhone 14 ch&iacute;nh h&atilde;ng VN/A, m&aacute;y sẽ c&oacute; ba t&ugrave;y chọn dung lượng bộ nhớ 128GB, 256GB v&agrave; 512GB. Điện thoại chạy tr&ecirc;n hệ điều h&agrave;nh iOS 16 mới nhất.</p>
        
        <p>&nbsp;</p>
        
        <p>&nbsp;<img src="https://admin.hoanghamobile.com/Uploads/2022/09/09/33_637983373143243781.png" /></p>
        
        <p>Kh&ocirc;ng chỉ c&oacute; hiệu năng được n&acirc;ng cấp, thời lượng pin của iPhone 14 ch&iacute;nh h&atilde;ng VN/A cũng được cải thiện đ&aacute;ng kể. Đ&acirc;y ch&iacute;nh l&agrave; điểm cộng cho Apple khi chiếc iPhone 14 ch&iacute;nh h&atilde;ng VN/A c&oacute; thể sử dụng tối đa l&ecirc;n tới 20 giờ khi ph&aacute;t video. Apple cũng trang bị cho m&aacute;y khả năng sạc nhanh tối đa 20W, người d&ugrave;ng c&oacute; thể sạc đầy 50% vi&ecirc;n pin chỉ trong v&ograve;ng 30 ph&uacute;t. Với chiếc iPhone 14 ch&iacute;nh h&atilde;ng VN/A, bạn c&oacute; thể y&ecirc;n t&acirc;m xử l&yacute; c&aacute;c c&ocirc;ng việc trong suốt một ng&agrave;y d&agrave;i. Nếu điện thoại hết pin, bạn cũng kh&ocirc;ng cần phải chờ đợi qu&aacute; l&acirc;u để c&oacute; thể tiếp tục sử dụng. Chiếc điện thoại iPhone 14 ch&iacute;nh h&atilde;ng VN/A v&ocirc; c&ugrave;ng tiện lợi v&agrave; ph&ugrave; hợp để hỗ trợ người d&ugrave;ng mọi l&uacute;c mọi nơi.</p>
        
        <p><strong>Nhiếp ảnh chuy&ecirc;n nghiệp với camera k&eacute;p 12MP mới</strong></p>
        
        <p>Năm ngo&aacute;i, Apple lần đầu giới thiệu đến người d&ugrave;ng kiểu thiết kế cụm camera xếp ch&eacute;o v&ocirc; c&ugrave;ng độc đ&aacute;o. Chiếc iPhone 14 ch&iacute;nh h&atilde;ng VN/A năm nay vẫn giữ lại phong c&aacute;ch thiết kế của người tiền nhiệm. M&ocirc;-đun camera vu&ocirc;ng ở mặt sau chứa cụm camera k&eacute;p độ ph&acirc;n giải 12MP, khẩu độ f/1.5 gi&uacute;p ổn định h&igrave;nh ảnh quang học. Trong khi đ&oacute;, ống k&iacute;nh g&oacute;c rộng c&ograve;n lại c&oacute; khẩu độ f/2.4, gi&uacute;p người d&ugrave;ng c&oacute; thể chụp được những bức ảnh với kh&ocirc;ng gian được mở rộng l&ecirc;n tới 120 độ. Mặc d&ugrave; tr&ocirc;ng c&oacute; vẻ kh&ocirc;ng c&oacute; g&igrave; thay đổi nhưng c&aacute;c cảm biến tr&ecirc;n iPhone 14 ch&iacute;nh h&atilde;ng VN/A lớn hơn, cải thiện khả năng chụp thiếu s&aacute;ng l&ecirc;n tới 49%.</p>
        
        <p>&nbsp;</p>
        
        <p><img src="https://admin.hoanghamobile.com/Uploads/2022/09/09/44.jpg" /></p>
        
        <p>Với cụm camera k&eacute;p n&agrave;y, iPhone 14 ch&iacute;nh h&atilde;ng VN/A c&oacute; thể cải thiện chất lượng chụp h&igrave;nh ở mọi chế độ: chụp ch&acirc;n dung, x&oacute;a ph&ocirc;ng, zoom quang học 2x, hay thậm ch&iacute; l&agrave; khả năng chụp đ&ecirc;m cũng nhanh hơn gấp 2 lần. Điện thoại cũng c&oacute; khả năng quay video với độ chi tiết tốt, ổn định, chất lượng 4K, HD 1080P,..., gi&uacute;p người d&ugrave;ng ghi lại mọi khoảnh khắc đ&aacute;ng nhớ trong cuộc sống. Với chiếc iPhone 14 ch&iacute;nh h&atilde;ng VN/A, bạn c&oacute; thể thỏa sức s&aacute;ng tạo chụp những bức ảnh ở đa chế độ, hiệu ứng phong ph&uacute;. Mặt trước của điện thoại l&agrave; camera selfie 12MP, gi&uacute;p người d&ugrave;ng chụp những bức ảnh &ldquo;tự sướng&rdquo; hoặc tham gia v&agrave;o những cuộc họp trực tuyến, cuộc gọi video với chất lượng tốt nhất.</p>
        
        <p>iPhone 14 ch&iacute;nh h&atilde;ng VN/A c&oacute; 5 t&ugrave;y chọn m&agrave;u, được b&aacute;n tr&ecirc;n hệ thống của Ho&agrave;ng H&agrave; Mobile với mức gi&aacute; ưu đ&atilde;i v&agrave; chế độ bảo h&agrave;nh ch&iacute;nh h&atilde;ng 12 th&aacute;ng. Tham khảo th&ocirc;ng tin v&agrave; đặt mua sản phẩm ngay h&ocirc;m nay.</p>',
        'image_1' => '2222_1665389314.png',
        'image_2' => 'anh-chup-man-hinh-2022-09-08-luc-01-57-13-removebg-preview_1665389314.png',
        'image_3' => 'anh-chup-man-hinh-2022-09-08-luc-01-59-53-removebg-preview_1665389314.png',
        'video_link' => 'https://www.youtube.com/watch?v=Zii2V9zk0oM',
        'main_slider' => 1,
        'hot_deal' => 1,
        'best_rated' => 1,
        'mid_slider' => 1,
        'hot_new' => 1,
        'trend' => 1,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
