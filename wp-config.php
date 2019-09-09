<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'bansim' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';d{OK,w9#E^j 2.9i%9L)~NaWs[.EO8({(6eiz=X0}&-A)yDX}e5Q{M_tav1&l9s' );
define( 'SECURE_AUTH_KEY',  ':(6tn91Ec5Kw_|9?/%$N)U.%k+=oI]o68Bc4qu03esTW!LFG=i4 C6@be`%EUwL5' );
define( 'LOGGED_IN_KEY',    'o2$d&D>#9%q.W?>N]qx=[lI9HI*|;+.V ]hWjgPDJGutNQhW3S>c(5sN#a34 B@3' );
define( 'NONCE_KEY',        'm;h;$v+fIwxe>4sO<pmxL1=^zTH96Pf>H0T0kt#?OP|O8y+^GgDD gjbL=9aSVy.' );
define( 'AUTH_SALT',        '308LWD5WK$6Y/+jb9golB3k!.)`Pv2PN~]q#{+F1KbkMqoT!;uBijpw{KbbLg0uH' );
define( 'SECURE_AUTH_SALT', 'W5u0CGW(#G8R3,g;@#Bd}`I;A`%piVY7:(Iq$vdg`HAOWs(<3T atMb3;a0`j/;x' );
define( 'LOGGED_IN_SALT',   '9OL#O=;-.)tYR>_?xIg-Rmo{Db((a?1gK;b58O601!=h=62vXcGLl<VMvf1Zh40j' );
define( 'NONCE_SALT',       '=^v1:RwOtvEhc1G?kh6p=Q}yMb}OO5f>]PwIjrRX5a@EPO%C]ud0JN_F<u<z%mUa' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
