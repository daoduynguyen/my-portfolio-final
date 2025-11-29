<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01 - Bài 4</title>
    <style>
        body {font-family: Arial; background: linear-gradient(135deg, #667eea, #764ba2); margin:0; padding:50px; min-height:100vh;}
        .container {max-width:1000px; margin:auto; text-align:center;}
        h1 {color:white; font-size:3em;}
        .cards {display:flex; flex-wrap:wrap; gap:30px; justify-content:center; margin-top:50px;}
        .card {background:white; width:280px; padding:30px; border-radius:15px; box-shadow:0 15px 30px rgba(0,0,0,0.3); transition:0.3s;}
        .card:hover {transform:translateY(-15px);}
        .card h3 {color:#3498db;}
        a {text-decoration:none; color:inherit;}
        .btn {display:block; background:#e74c3c; color:white; padding:15px; border-radius:50px; margin-top:20px; font-weight:bold;}
    </style>
</head>
<body>
<div class="container">
    <h1>BTTH01 - BÀI TẬP 4</h1>
    <p style="color:white; font-size:1.5em;">Nâng cấp + Upload + Lưu vào MySQL</p>
    <div class="cards">
        <a href="bai1/index.php">
            <div class="card">
                <h3>Bài 1 - Danh sách hoa</h3>
                <p>Hiển thị hoa từ MySQL</p>
                <div class="btn">Vào ngay</div>
            </div>
        </a>
        <a href="bai2/quiz.php">
            <div class="card">
                <h3>Bài 2 - Trắc nghiệm</h3>
                <p>Upload file câu hỏi → MySQL</p>
                <div class="btn">Vào ngay</div>
            </div>
        </a>
        <a href="bai3/index.php">
            <div class="card">
                <h3>Bài 3 - Sinh viên</h3>
                <p>Upload file CSV → MySQL</p>
                <div class="btn">Vào ngay</div>
            </div>
        </a>
    </div>
</div>
</body>
</html>