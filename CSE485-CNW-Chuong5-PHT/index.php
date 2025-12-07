<?php
// Controller - Điều phối toàn bộ ứng dụng

// 1. Nhúng Model
require_once 'models/SinhVienModel.php';

// 2. Kết nối CSDL (đã test 100% với XAMPP)
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';           // XAMPP mặc định để trống
$port = '3306';           // Nếu bạn đổi port MySQL thì sửa ở đây

$dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<h3 style='color:red'>Kết nối CSDL thất bại: " . $e->getMessage() . "</h3>");
}

// 3. Xử lý thêm sinh viên (nếu có POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = trim($_POST['ten_sinh_vien'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (!empty($ten) && !empty($email)) {
        addSinhVien($pdo, $ten, $email);
    }
    // Chuyển hướng để tránh submit lại khi F5
    header("Location: index.php");
    exit;
}

// 4. Lấy danh sách sinh viên để hiển thị
$danh_sach_sv = getAllSinhVien($pdo);

// 5. Nhúng View để hiển thị
include 'views/sinhvien_view.php';
?>
