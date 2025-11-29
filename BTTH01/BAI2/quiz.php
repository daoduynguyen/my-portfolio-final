<?php
// quiz.php - Trang làm bài thi
$base_path = __DIR__;
$file = $base_path . '/cauhoi.txt';

$questions = [];
$current   = [];

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') continue;

        if (strpos($line, 'ANSWER:') === 0) {
            $current['dung'] = trim(substr($line, 7));
        } elseif (preg_match('/^[A-D]\.\s*(.+)$/', $line, $m)) {
            $current['dapan'][] = $m[1];
        } else {
            if (!empty($current)) {
                $questions[] = $current;
                $current = [];
            }
            $current['cauhoi'] = $line;
            $current['dapan'] = [];
            $current['dung'] = '';
        }
    }
    if (!empty($current)) {
        $questions[] = $current;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Trắc Nghiệm Android</title>
    <style>
        body {font-family: Arial, sans-serif; background: linear-gradient(135deg, #42a5f5, #478ed1); margin:0; padding:20px; min-height:100vh;}
        .container {max-width: 960px; margin: auto; background:#fff; padding:40px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.3);}
        h1 {text-align:center; color:#1a237e; margin-bottom:10px;}
        h2 {text-align:center; color:#3949ab; margin-top:0;}
        .question {background:#f5f7fa; padding:25px; margin:30px 0; border-radius:15px; border-left:8px solid #3949ab;}
        label {display:block; margin:18px 0; font-size:19px; padding:10px; border-radius:8px; cursor:pointer; transition:0.3s;}
        label:hover {background:#e8eaf6;}
        input[type="radio"] {transform:scale(1.5); margin-right:15px; accent-color:#3949ab;}
        .btn {display:block; width:250px; margin:40px auto; background:#3949ab; color:white; padding:18px; font-size:20px; border:none; border-radius:50px; cursor:pointer;}
        .btn:hover {background:#1a237e; transform:scale(1.05);}
        .center {text-align:center;}
    </style>
</head>
<body>
<div class="container">
    <h1>KIỂM TRA TRẮC NGHIỆM - LẬP TRÌNH ANDROID</h1>
    <h2><?= count($questions) ?> câu hỏi</h2>

    <?php if (empty($questions)): ?>
        <p style="color:red; text-align:center; font-size:20px;">Không tìm thấy file cauhoi.txt hoặc lỗi định dạng!</p>
    <?php else: ?>
    <form method="post" action="ketqua.php">
        <?php foreach ($questions as $i => $q): ?>
            <div class="question">
                <p><strong><?= ($i+1) ?>. <?= htmlspecialchars($q['cauhoi']) ?></strong></p>
                <?php foreach ($q['dapan'] as $j => $dap): ?>
                    <?php $letter = chr(65 + $j); ?>
                    <label>
                        <input type="radio" name="ans[<?= $i ?>]" value="<?= $letter ?>" required>
                        <?= $letter ?>. <?= htmlspecialchars($dap) ?>
                    </label>
                <?php endforeach; ?>
                <input type="hidden" name="correct[<?= $i ?>]" value="<?= $q['dung'] ?>">
            </div>
        <?php endforeach; ?>

        <div class="center">
            <button type="submit" class="btn">NỘP BÀI</button>
        </div>
    </form>
    <?php endif; ?>
</div>
</body>
</html>