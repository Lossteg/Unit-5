<?php
namespace App\Controllers;

use App\Core\Request;

class HomeController extends AbstractController {
    public function index() {
        $data = [
            'title' => 'Главная страница',
            'welcome' => 'Добро пожаловать на наш сайт!',
            'features' => [
                'Быстрая навигация',
                'Удобный интерфейс',
                'Современный дизайн'
            ]
        ];

        $this->render('home', $data);
    }
}
