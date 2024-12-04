<?php

namespace App\Controllers;

use App\Core\Request;

class AboutController extends AbstractController {
    public function index() {
        $data = [
            'title' => 'О нас',
            'company_name' => 'Наша Компания',
            'description' => 'Мы молодая и динамично развивающаяся компания, которая...',
            'team' => [
                ['name' => 'Иван Петров', 'role' => 'Генеральный директор'],
                ['name' => 'Анна Смирнова', 'role' => 'Технический директор'],
                ['name' => 'Михаил Иванов', 'role' => 'Руководитель отдела продаж']
            ]
        ];

        $this->render('about', $data);
    }
}
