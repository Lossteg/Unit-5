<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        h1 { color: #333; }
        .team-list { list-style-type: none; padding: 0; }
        .team-list li { margin: 10px 0; }
    </style>
</head>
<body>
<h1>ℹ️ <?= htmlspecialchars(strtoupper($title)) ?></h1>
<div class="description">
    <p><?= nl2br(htmlspecialchars($description)) ?></p>
</div>

<div class="team-section">
    <h2>КОМАНДА КОМПАНИИ:</h2>
    <ul class="team-list">
        <?php foreach ($team as $member): ?>
            <li>
                <strong><?= htmlspecialchars($member['name']) ?></strong> -
                <?= htmlspecialchars($member['role']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
