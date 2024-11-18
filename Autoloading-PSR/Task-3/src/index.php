<?php

namespace Task3;

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Task3\App\Mail\EmailSender;

try {
    $dotenv = Dotenv::createImmutable('..');
    $dotenv->load();

    $dotenv->required([
        'MAIL_HOST',
        'MAIL_PORT',
        'MAIL_USERNAME',
        'MAIL_PASSWORD',
        'MAIL_FROM_ADDRESS',
        'MAIL_FROM_NAME'
    ]);

    $emailSender = new EmailSender();

    $welcomeData = [
        'name' => 'Иван Петров'
    ];
    if($emailSender->send(
        'losteg29@yandex.ru',
        'Добро пожаловать в нашу систему!',
        'welcome',
        $welcomeData
    )) {
        echo "Приветственное письмо успешно отправлено!\n";
    }

    $reminderData = [
        'event' => 'Важная встреча с клиентом',
        'date' => '20 января 2024, 15:00'
    ];
    if($emailSender->send(
        'losteg29@yandex.ru',
        'Напоминание о встрече',
        'reminder',
        $reminderData
    )) {
        echo "Напоминание успешно отправлено!\n";
    }

    $notificationData = [
        'message' => 'Ваш заказ №12345 успешно обработан и передан в доставку.'
    ];
    if($emailSender->send(
        'losteg29@yandex.ru',
        'Статус вашего заказа',
        'notification',
        $notificationData
    )) {
        echo "Уведомление успешно отправлено!\n";
    }

} catch (\Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage() . "\n";
}