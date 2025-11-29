<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị - Danh sách hoa</title>
    <style>
        body {font-family: Arial; background:#ecf0f1; padding:20px;}
        h1 {color:#27ae60; text-align:center;}
        table {width:100%; max-width:1200px; margin:20px auto; border-collapse:collapse; background:white; box-shadow:0 0 15px rgba(0,0,0,0.1);}
        th, td {padding:15px; text-align:center; border:1px solid #ddd;}
        th {background:#27ae60; color:white;}
        img {width:100px; height:100px; object-fit:cover; border-radius:8px; border:2px solid #ddd;}
        .back {display:block; max-width:1200px; margin:20px auto; color:#2980b9; font-size:1.1em; text-align:center;}
        .back:hover {text-decoration:underline;}
    </style>
</head>
<body>
    <h1>TRANG QUẢN TRỊ - DANH SÁCH CÁC LOÀI HOA</h1>
    <a href="index.php" class="back">← Quay lại trang khách</a>

    <table>
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
        </tr>
        <?php
        include 'flowers.php';
        foreach($flowers as $i => $hoa) {
            echo "<tr>";
            echo "<td>".($i+1)."</td>";
            echo "<td><img src='images/".$hoa['anh']."' alt='".$hoa['ten']."'></td>";
            echo "<td><strong>".$hoa['ten']."</strong></td>";
            echo "<td>".$hoa['mota']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>