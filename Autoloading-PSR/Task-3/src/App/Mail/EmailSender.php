<?php
namespace Task3\App\Mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EmailSender
{
    private PHPMailer $mailer;
    private array $config;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->loadConfig();
        $this->setupMailer();
    }

    private function loadConfig(): void
    {
        $this->config = [
            'smtp_host' => $_ENV['MAIL_HOST'],
            'smtp_port' => (int)$_ENV['MAIL_PORT'],
            'smtp_username' => $_ENV['MAIL_USERNAME'],
            'smtp_password' => $_ENV['MAIL_PASSWORD'],
            'from_email' => $_ENV['MAIL_FROM_ADDRESS'],
            'from_name' => $_ENV['MAIL_FROM_NAME'],
            'encryption' => $_ENV['MAIL_ENCRYPTION'] ?? 'ssl'
        ];
    }

    private function setupMailer(): void
    {
        try {
            $this->mailer->isSMTP();
            $this->mailer->SMTPDebug = 0;
            $this->mailer->Host = $this->config['smtp_host'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $this->config['smtp_username'];
            $this->mailer->Password = $this->config['smtp_password'];
            $this->mailer->SMTPSecure = $this->config['encryption'];
            $this->mailer->Port = $this->config['smtp_port'];
            $this->mailer->setFrom($this->config['from_email'], $this->config['from_name']);
            $this->mailer->CharSet = 'UTF-8';
        } catch (Exception $e) {
            throw new Exception("Mail setup error: " . $e->getMessage());
        }
    }

    public function send(string $to, string $subject, string $type, array $data = []): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $this->getEmailContent($type, $data);

            return $this->mailer->send();
        } catch (Exception $e) {
            throw new Exception("Mail sending error: " . $e->getMessage());
        }
    }

    private function getEmailContent(string $type, array $data): string
    {
        return match ($type) {
            'welcome' => $this->getWelcomeTemplate($data),
            'reminder' => $this->getReminderTemplate($data),
            'notification' => $this->getNotificationTemplate($data),
            default => throw new Exception("Unknown email type: $type"),
        };
    }

    private function getWelcomeTemplate(array $data): string
    {
        $name = $data['name'] ?? 'пользователь';
        return "
            <h1>Добро пожаловать, {$name}!</h1>
            <p>Мы рады приветствовать вас в нашей системе.</p>
            <p>Спасибо за регистрацию!</p>
        ";
    }

    private function getReminderTemplate(array $data): string
    {
        $event = $data['event'] ?? '';
        $date = $data['date'] ?? '';
        return "
            <h1>Напоминание</h1>
            <p>Напоминаем вам о предстоящем событии: {$event}</p>
            <p>Дата: {$date}</p>
            <p>Не пропустите!</p>
        ";
    }

    private function getNotificationTemplate(array $data): string
    {
        $message = $data['message'] ?? '';
        return "
            <h1>Уведомление</h1>
            <p>{$message}</p>
        ";
    }
}