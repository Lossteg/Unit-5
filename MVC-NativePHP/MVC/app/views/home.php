<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        h1 { color: #333; }
        ul { padding-left: 20px; }
        li { margin: 10px 0; }
    </style>
</head>
<body>
<h1>🏠 <?= htmlspecialchars(strtoupper($title)) ?></h1>

<div class="welcome">
    <p><?= nl2br(htmlspecialchars($welcome)) ?></p>
</div>

<div class="features">
    <h2>НАШИ ПРЕИМУЩЕСТВА:</h2>
    <ul>
        <?php foreach ($features as $feature): ?>
            <li><?= htmlspecialchars($feature) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
