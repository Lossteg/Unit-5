<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['name']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        h1 { color: #333; }
        .price-value { font-size: 24px; font-weight: bold; }
    </style>
</head>
<body>
<h1>🏷️ <?= htmlspecialchars(strtoupper($product['name'])) ?></h1>

<div class="product-details">
    <div class="description">
        <h2>Описание:</h2>
        <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
    </div>

    <div class="price">
        <h2>Цена:</h2>
        <p class="price-value">
            <?= number_format($product['price'], 0, ',', ' ') ?> руб.
        </p>
    </div>
</div>
</body>
</html>
