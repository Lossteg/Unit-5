<?php
namespace App\Controllers;

use App\Core\Request;

class ProductController extends AbstractController {
    private $products = [
        1 => ['id' => 1, 'name' => 'Ноутбук', 'price' => 50000, 'description' => 'Мощный ноутбук для работы и развлечений'],
        2 => ['id' => 2, 'name' => 'Смартфон', 'price' => 30000, 'description' => 'Современный смартфон с отличной камерой'],
        3 => ['id' => 3, 'name' => 'Планшет', 'price' => 25000, 'description' => 'Компактный планшет для мультимедиа']
    ];

    public function index() {
        $data = [
            'title' => 'Каталог продуктов',
            'products' => $this->products
        ];

        $this->render('products', $data);
    }

    public function show($id) {
        $product = $this->products[$id] ?? null;

        if ($product) {
            $data = [
                'title' => $product['name'],
                'product' => $product
            ];

            $this->render('product', $data);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Продукт не найден";
        }
    }
}
