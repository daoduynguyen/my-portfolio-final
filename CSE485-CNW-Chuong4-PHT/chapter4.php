<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'cse485_web';     // Đúng tên có gạch dưới
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("LỖI KẾT NỐI: " . $e->getMessage());
}

// Thêm sinh viên
if(isset($_POST['ten_sinh_vien']) && isset($_POST['email'])) {
    $ten = $_POST['ten_sinh_vien'];
    $email = $_POST['email'];
    $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)";
    $pdo->prepare($sql)->execute([$ten, $email]);
    header("Location: chapter4.php");
    exit;
}

// Lấy danh sách
$stmt = $pdo->query("SELECT * FROM sinhvien ORDER BY id DESC");
?>

<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Chapter 4</title></head><body style="font-family:Arial;margin:40px">

<h2>Thêm sinh viên</h2>
<form method="post">
  Tên: <input type="text" name="ten_sinh_vien" required> &nbsp;
  Email: <input type="email" name="email" required> &nbsp;
  <button>Thêm</button>
</form>

<h2>Danh sách sinh viên</h2>
<table border="1" width="100%" cellpadding="10" cellspacing="0">
<tr style="background:#333;color:white"><th>ID</th><th>Tên</th><th>Email</th><th>Ngày tạo</th></tr>
<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
  <td><?=htmlspecialchars($row['id'])?></td>
  <td><?=htmlspecialchars($row['ten_sinh_vien'])?></td>
  <td><?=htmlspecialchars($row['email'])?></td>
  <td><?=htmlspecialchars($row['ngay_tao'])?></td>
</tr>
<?php endwhile; ?>
</table>

</body></html>
