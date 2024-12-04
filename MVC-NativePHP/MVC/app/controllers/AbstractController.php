<?php
namespace App\Controllers;

use App\Core\Request;
use App\Core\View;

abstract class AbstractController {
    protected Request $request;
    protected View $view;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->view = new View();
    }

    protected function render(string $template, array $data = []) {
        try {
            echo $this->view->render($template, $data);
        } catch (\Exception $e) {
            echo "Ошибка рендеринга: " . $e->getMessage();
        }
    }
}
