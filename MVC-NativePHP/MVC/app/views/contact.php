<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        h1 { color: #333; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 10px 20px; }
    </style>
</head>
<body>
<h1>📞 <?= htmlspecialchars(strtoupper($title)) ?></h1>

<div class="contact-info">
    <h2>КОНТАКТНАЯ ИНФОРМАЦИЯ:</h2>
    <dl>
        <?php foreach ($contacts as $type => $value): ?>
            <dt><strong><?= htmlspecialchars(strtoupper($type)) ?></strong></dt>
            <dd><?= htmlspecialchars($value) ?></dd>
        <?php endforeach; ?>
    </dl>
</div>

<div class="contact-form">
    <h2>ФОРМА ОБРАТНОЙ СВЯЗИ:</h2>
    <form method="POST" action="/contact/send">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Отправить</button>
    </form>
</div>
</body>
</html>
