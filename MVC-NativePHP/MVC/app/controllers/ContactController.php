<?php
namespace App\Controllers;

use App\Core\Request;

class ContactController extends AbstractController {
    public function index() {
        $data = [
            'title' => 'Контакты',
            'contacts' => [
                'email' => 'info@company.com',
                'phone' => '+7 (999) 123-45-67',
                'address' => 'г. Москва, ул. Примерная, д. 10'
            ]
        ];

        $this->render('contact', $data);
    }

    public function send(Request $request) {
        if ($request->isPost()) {
            $name = $request->post('name');
            $email = $request->post('email');
            $message = $request->post('message');

            error_log("------- НОВОЕ СООБЩЕНИЕ -------");
            error_log("Имя: {$name}");
            error_log("Email: {$email}");
            error_log("Сообщение: {$message}");
            error_log("-------------------------------");

            $data = [
                'status' => 'success',
                'message' => 'Сообщение успешно зарегистрировано в системе!'
            ];

            $this->render('contact_success', $data);
        } else {
            header("HTTP/1.1 405 Method Not Allowed");
            echo "Разрешен только POST-метод";
        }
    }
}
