<?php
namespace App\Core;

class View {
    public function render(string $template, array $data = []): string {
        extract($data);

        ob_start();

        $viewPath = __DIR__ . "/../Views/{$template}.php";
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$viewPath}");
        }

        require $viewPath;

        return ob_get_clean();
    }
}
