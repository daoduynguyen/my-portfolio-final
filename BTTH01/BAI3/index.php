<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách điểm danh - 65HTTT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .info {
            text-align: center;
            padding: 15px;
            background: #d5f4e0;
            border-radius: 8px;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }
        th {
            background: #3498db;
            color: white;
            padding: 15px;
            text-align: center;
        }
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f0f8ff;
        }
        .mssv {
            font-weight: bold;
            color: #e74c3c;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #7f8c8d;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>DANH SÁCH ĐIỂM DANH LỚP 65HTTT</h1>

<?php
// TÊN FILE MỚI
$filename = '65HTTT_Danh_sach_diem_danh.csv';

if (!file_exists($filename)) {
    die("<p style='color:red; text-align:center; font-size:18px;'>Không tìm thấy file: <strong>$filename</strong></p>");
}

$students = [];
if (($handle = fopen($filename, 'r')) !== false) {
    // Bỏ qua dòng tiêu đề (header)
    fgetcsv($handle, 1000, ',');

    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
        // Đảm bảo luôn có đủ cột (tránh lỗi undefined key)
        $row = array_pad($row, 7, '');
        $students[] = $row;
    }
    fclose($handle);
}

echo "<div class='info'>Đã đọc thành công <strong>" . count($students) . " sinh viên</strong> từ file <code>$filename</code></div>";
?>

<table>
    <tr>
        <th>STT</th>
        <th>MSSV (Username)</th>
        <th>Mật khẩu</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Lớp</th>
        <th>Email</th>
        <th>Môn học</th>
    </tr>

    <?php foreach ($students as $i => $s): ?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td class="mssv"><?= htmlspecialchars($s[0] ?? '') ?></td>
        <td><?= htmlspecialchars($s[1] ?? '') ?></td>
        <td><?= htmlspecialchars($s[2] ?? '') ?></td>
        <td><?= htmlspecialchars($s[3] ?? '') ?></td>
        <td><?= htmlspecialchars($s[4] ?? '') ?></td>
        <td><?= htmlspecialchars($s[5] ?? '') ?></td>
        <td><?= htmlspecialchars($s[6] ?? '') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="footer">
    Môn học: CSE485 - Lập trình Web & Ứng dụng<br>
    File nguồn: <?= htmlspecialchars($filename) ?> - Đã xử lý bằng PHP
</div>

</body>
</html>