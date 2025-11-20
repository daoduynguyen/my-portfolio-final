<?php
// TODO 1: Khởi động session (PHẢI ở dòng đầu tiên, trước mọi output)
session_start();

// TODO 2: Kiểm tra xem người dùng đã gửi form chưa
if (isset($_POST['username']) && isset($_POST['password'])) {
    
    // TODO 3: Lấy dữ liệu từ $_POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: Kiểm tra đăng nhập (giả lập)
    if ($user == 'admin' && $pass == '123') {
        
        // TODO 5: Lưu username vào SESSION
        $_SESSION['username'] = $user;
        
        // TODO 6: Chuyển hướng sang trang chào mừng
        header('Location: welcome.php');
        exit;
        
    } else {
        // Đăng nhập sai → quay lại login với thông báo lỗi
        header('Location: login.html?error=1');
        exit;
    }
    
} else {
    // TODO 7: Nếu truy cập trực tiếp file này (không qua POST) → đá về login
    header('Location: login.html');
    exit;
}
?>
