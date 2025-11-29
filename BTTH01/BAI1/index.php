<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 Loại Hoa Tuyệt Đẹp Dịp Xuân Hè</title>
    <style>
        body {font-family: Arial, sans-serif; margin:0; padding:20px; background:#f8f9fa;}
        h1 {text-align:center; color:#d35400; margin-bottom:40px;}
        .container {max-width:1200px; margin:auto;}
        .grid {display:grid; grid-template-columns:repeat(auto-fill, minmax(300px,1fr)); gap:25px;}
        .card {background:white; border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.1); text-align:center; transition:transform 0.3s;}
        .card:hover {transform:translateY(-10px);}
        .card img {width:100%; height:250px; object-fit:cover;}
        .card h3 {color:#e74c3c; margin:15px 0 10px; font-size:1.4em;}
        .card p {padding:0 15px 20px; color:#555; font-size:15px;}
        .footer {text-align:center; margin:50px 0; font-size:1.1em;}
        .footer a {color:#2980b9; text-decoration:none; font-weight:bold;}
        .footer a:hover {text-decoration:underline;}
    </style>
</head>
<body>
    <div class="container">
        <h1>14 LOẠI HOA TUYỆT ĐẸP THÍCH HỢP TRỒNG ĐỂ KHOE HƯƠNG SẮC DỊP XUÂN HÈ</h1>

        <div class="grid">
            <?php
            include 'flowers.php';
            foreach($flowers as $hoa) {
                echo '<div class="card">';
                echo '    <img src="images/'.$hoa['anh'].'" alt="'.$hoa['ten'].'">';
                echo '    <h3>'.$hoa['ten'].'</h3>';
                echo '    <p>'.$hoa['mota'].'</p>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="footer">
            <p><a href="admin.php">→ Vào trang quản trị (Admin)</a></p>
        </div>
    </div>
</body>
</html>