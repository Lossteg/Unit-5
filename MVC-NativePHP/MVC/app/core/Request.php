<?php
namespace App\Core;

class Request {
    private string $uri;
    private string $method;
    private array $getParams;
    private array $postParams;

    public function __construct() {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->getParams = $_GET;
        $this->postParams = $_POST;
    }

    public function getUri(): string {
        return $this->uri;
    }

    public function getMethod(): string {
        return $this->method;
    }

    public function get(string $key, $default = null) {
        return $this->getParams[$key] ?? $default;
    }

    public function post(string $key, $default = null) {
        return $this->postParams[$key] ?? $default;
    }

    public function isPost(): bool {
        return $this->method === 'POST';
    }

    public function isGet(): bool {
        return $this->method === 'GET';
    }
}
