<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHT Chương 5 - MVC</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f7f7f7; }
        h2 { color: #333; }
        form { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 30px; }
        input[type=text], input[type=email] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; }
        input[type=submit] { background: #007cba; color: white; padding: 12px 30px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        input[type=submit]:hover { background: #005a87; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #007cba; color: white; }
        tr:hover { background: #f1f1f1; }
    </style>
</head>
<body>

    <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
    <form method="POST">
        <input type="text" name="ten_sinh_vien" placeholder="Nhập tên sinh viên" required>
        <input type="email" name="email" placeholder="Nhập email" required>
        <input type="submit" value="Thêm sinh viên">
    </form>

    <h2>Danh Sách Sinh Viên</h2>
    
    <?php if (empty($danh_sach_sv)): ?>
        <p>Chưa có sinh viên nào.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
            </tr>
            <?php foreach ($danh_sach_sv as $sv): ?>
                <tr>
                    <td><?= htmlspecialchars($sv['id']) ?></td>
                    <td><?= htmlspecialchars($sv['ten_sinh_vien']) ?></td>
                    <td><?= htmlspecialchars($sv['email']) ?></td>
                    <td><?= htmlspecialchars($sv['ngay_tao']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</body>
</html>
