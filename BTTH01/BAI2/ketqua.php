<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi</title>
    <style>
        body {font-family: Arial, sans-serif; background:#f4f6f9; padding:40px; text-align:center;}
        h1 {color:#2c3e50;}
        .correct {color:green; font-size:20px; font-weight:bold;}
        .wrong {color:red; font-size:20px; font-weight:bold;}
        .result {font-size:32px; margin:30px; color:#e74c3c; font-weight:bold;}
        .back {display:inline-block; margin-top:30px; padding:15px 30px; background:#3498db; color:white; text-decoration:none; border-radius:8px; font-size:18px;}
        .back:hover {background:#2980b9;}
        .container {max-width:800px; margin:auto; background:white; padding:40px; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.1);}
    </style>
</head>
<body>
<div class="container">
    <h1>KẾT QUẢ BÀI THI TRẮC NGHIỆM ANDROID</h1>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_POST && isset($_POST['ans']) && isset($_POST['correct'])) {
        $userAnswers    = $_POST['ans'];
        $correctAnswers = $_POST['correct'];
        $score = 0;
        $total = count($correctAnswers);

        foreach ($correctAnswers as $i => $correct) {
            $user = $userAnswers[$i] ?? '';
            if ($user === $correct) {
                $score++;
                echo "<p class='correct'>Câu " . ($i+1) . ": ĐÚNG</p>";
            } else {
                $chosen = $user ? $user : "không chọn";
                echo "<p class='wrong'>Câu " . ($i+1) . ": SAI (Đáp án đúng: <strong>$correct</strong> | Bạn chọn: <strong>$chosen</strong>)</p>";
            }
        }

        $percent = round(($score / $total) * 100);
        echo "<div class='result'>ĐIỂM: $score / $total ($percent%)</div>";
        if ($score == $total) {
            echo "<div class='result' style='color:green;'>XUẤT SẮC! 100% CHÍNH XÁC!</div>";
        } elseif ($score >= $total * 0.7) {
            echo "<div class='result' style='color:#f39c12;'>KHÁ TỐT! CỐ GẮNG HƠN NỮA!</div>";
        } else {
            echo "<div class='result' style='color:red;'>CỐ LÊN BẠN ƠI!</div>";
        }
    } else {
        echo "<p style='color:red;'>Không có dữ liệu để chấm điểm!</p>";
    }
    ?>

    <br>
    <a href="quiz.php" class="back">Làm lại bài thi</a>
</div>
</body>
</html>